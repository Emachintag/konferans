<?php

namespace App\Http\Controllers;

use App\Models\Hizmet;
use App\Models\Lang;
use App\Models\HizmetCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HizmetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $hizmet = Hizmet::orderBy('id','asc')->get()->unique('lang_id');
        return view('back.hizmet.list', compact('hizmet','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $hizmet = Hizmet::get();
        $hizmetcategory = HizmetCategory::where('status',1)->get()->unique('lang_id');
        return view('back.hizmet.create', compact('hizmet', 'lang','hizmetcategory'));
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
            $hizmet = new Hizmet();
            $hizmet->title = $request->input("title_" . $langs->lang);
            $hizmet->title_2 = $request->input("title_2_" . $langs->lang);
            $hizmet->kategori = $request->kategori;
            $hizmet->sira = $request->sira;
            $hizmet->text = $request->input("text_" . $langs->lang);
            $hizmet->url = $url;
            $hizmet->lang = $langs->lang;
            $hizmet->lang_id =  $time;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/hizmet/'), $imageName);
                $hizmet->image = 'uploads/hizmet/' . $imageName;
            }
            $hizmet->save();
        }
        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/hizmetimages/', $imageName);

                DB::table('hizmet_gorsel')->insert([
                    'hizmet_id' =>  $time,
                    'gorsel' => "/uploads/hizmetimages/$imageName"
                ]);
                $i = $i + 1;
            }
        }
        toastr()->success('Hizmet Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('hizmet.index');
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
        $hizmetcategorysingle = HizmetCategory::get()->unique('lang_id');
        $hizmet = Hizmet::where('hizmet.lang_id',$id)->select('hizmet.*')->join('langs','langs.lang', '=','hizmet.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.hizmet.update',compact('hizmet','id','hizmetcategorysingle'));
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
            $hizmet = Hizmet::where('lang_id',$id)->where('lang', $langs->lang)->first();

            $url = Str::slug($request->input('title_' . $langs->lang), '-');
            $hizmet->title = $request->input("title_" . $langs->lang);
            $hizmet->title_2 = $request->input("title_2_" . $langs->lang);
            $hizmet->kategori = $request->kategori;
            $hizmet->sira = $request->sira;
            $hizmet->text = $request->input("text_" . $langs->lang);
            $hizmet->url = $url;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/hizmet/'), $imageName);
                $hizmet->image = 'uploads/hizmet/' . $imageName;
            }
            $hizmet->save();
        }

        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/hizmetimages/', $imageName);

                DB::table('hizmet_gorsel')->insert([
                    'gorsel' => "/uploads/hizmetimages/$imageName",
                    'hizmet_id' =>  $hizmet->lang_id,

                ]);
                $i = $i + 1;
            }
        }

        toastr()->success('Hizmet Yazısı Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('hizmet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lang = Lang::get();
        $hizmet = Hizmet::where('lang_id',$id)->first() ?? abort(404,'Veri Bulunamadi');

        foreach (DB::table('hizmet_gorsel')->where('hizmet_id', $hizmet->lang_id)->get() as $u) {
            $gorsel = public_path( $u->gorsel);
            if (File::exists($gorsel)) {
                File::delete($gorsel);

            }
            DB::table('hizmet_gorsel')->where('id', $u->id)->delete();
        }

        if (isset($blog->image)) {
            $imageName = DB::table('hizmet')->where('lang_id', $id);
            foreach ($imageName->get() as $BlogImage){
                $kapakFoto = public_path($BlogImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }


            }
        }

        Hizmet::where('lang_id',$id)->delete();


        toastr()->success('Hizmet Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('hizmet.index');
    }

    public function status (Request $request ){

        $lang = Lang::get();
        foreach ($lang as $langs) {
            Hizmet::where('lang_id', $request->id)->update(['status' => $request->status]);
        }

        echo $request->status;
    }

    public function imagedelete (Request $request )
    {
        $imagedelete = DB::table('hizmet_gorsel')->where('id', $request->id);
        $gorsel = public_path( $imagedelete->first()->gorsel);
        if (File::exists($gorsel)) {
            File::delete($gorsel);

        }
        $imagedelete->delete();

    }
}
