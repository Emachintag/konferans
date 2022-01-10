<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Urun;
use App\Models\UrunCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $urun = Urun::orderBy('id','asc')->get()->unique('lang_id');
        return view('back.urun.list', compact('urun','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $urun = Urun::get();
        $uruncategory = UrunCategory::where('status',1)->get()->unique('lang_id');
        return view('back.urun.create', compact('urun', 'lang','uruncategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lang = Lang::get();
        foreach ($lang as $langs) {
            $request->validate([
                'title_'.$langs->lang => 'required|min:7',
                'image_'.$langs->lang => 'required|image|mimes:jpeg,png,jpg|max:5048'
            ]);
        }
        foreach ($lang as $langs) {
            $time = time();
            $url = Str::slug($request->input('title_' . $langs->lang), '-');
            $urun = new Urun();
            $urun->title = $request->input("title_" . $langs->lang);
            $urun->title_2 = $request->input("title_2_" . $langs->lang);
            $urun->kategori = $request->kategori;
            $urun->sira = $request->sira;
            $urun->text = $request->input("text_" . $langs->lang);
            $urun->url = $url;
            $urun->lang = $langs->lang;
            $urun->lang_id =  $time;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/urun/'), $imageName);
                $urun->image = 'uploads/urun/' . $imageName;
            }
            $urun->save();
        }
        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/urunimages/', $imageName);

                DB::table('urun_gorsel')->insert([
                    'urun_id' =>  $time,
                    'gorsel' => "/uploads/urunimages/$imageName"
                ]);
                $i = $i + 1;
            }
        }
        toastr()->success('Ürün Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('urun.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uruncategorysingle = UrunCategory::get()->unique('lang_id');
        $urun = Urun::where('urun.lang_id',$id)->select('urun.*')->join('langs','langs.lang', '=','urun.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.urun.update',compact('urun','id','uruncategorysingle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lang = Lang::get();
        foreach ($lang as $langs) {
            $urun = Urun::where('lang_id',$id)->where('lang', $langs->lang)->first();

            $url = Str::slug($request->input('title_' . $langs->lang), '-');
            $urun->title = $request->input("title_" . $langs->lang);
            $urun->title_2 = $request->input("title_2_" . $langs->lang);
            $urun->kategori = $request->kategori;
            $urun->sira = $request->sira;
            $urun->text = $request->input("text_" . $langs->lang);
            $urun->url = $url;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/urun/'), $imageName);
                $urun->image = 'uploads/urun/' . $imageName;
            }
            $urun->save();
        }

        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/urunimages/', $imageName);

                DB::table('urun_gorsel')->insert([
                    'gorsel' => "/uploads/urunimages/$imageName",
                    'urun_id' =>  $urun->lang_id,

                ]);
                $i = $i + 1;
            }
        }

        toastr()->success('Ürün Yazısı Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('urun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $urun = Urun::where('lang_id',$id)->first() ?? abort(404,'Veri Bulunamadi');

        foreach (DB::table('urun_gorsel')->where('urun_id', $urun->lang_id)->get() as $u) {
            $gorsel = public_path( $u->gorsel);
            if (File::exists($gorsel)) {
                File::delete($gorsel);

            }
            DB::table('urun_gorsel')->where('id', $u->id)->delete();
        }

        if (isset($blog->image)) {
            $imageName = DB::table('urun')->where('lang_id', $id);
            foreach ($imageName->get() as $BlogImage){
                $kapakFoto = public_path($BlogImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }
            }
        }
//
        Urun::where('lang_id',$id)->delete();


        toastr()->success('Ürün Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('urun.index');
    }

    public function status (Request $request ){

        $lang = Lang::get();
        foreach ($lang as $langs) {
            Urun::where('lang_id', $request->id)->update(['status' => $request->status]);
        }

        echo $request->status;
    }

    public function imagedelete (Request $request )
    {
        $imagedelete = DB::table('urun_gorsel')->where('id', $request->id);
        $gorsel = public_path( $imagedelete->first()->gorsel);
        if (File::exists($gorsel)) {
            File::delete($gorsel);

        }
        $imagedelete->delete();

    }
}
