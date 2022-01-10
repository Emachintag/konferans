<?php

namespace App\Http\Controllers;

use App\Models\Haber;
use App\Models\HaberCategory;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HaberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $haber = Haber::orderBy('id','asc')->get()->unique('lang_id');
        return view('back.haber.list', compact('haber','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $haber = Haber::get();
        $habercategory = HaberCategory::where('status',1)->get()->unique('lang_id');
        return view('back.haber.create', compact('haber', 'lang','habercategory'));
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
            $haber = new Haber();
            $haber->title = $request->input("title_" . $langs->lang);
            $haber->title_2 = $request->input("title_2_" . $langs->lang);
            $haber->kategori = $request->kategori;
            $haber->sira = $request->sira;
            $haber->text = $request->input("text_" . $langs->lang);
            $haber->url = $url;
            $haber->lang = $langs->lang;
            $haber->lang_id =  $time;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/haber/'), $imageName);
                $haber->image = 'uploads/haber/' . $imageName;
            }
            $haber->save();
        }
        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/haberimages/', $imageName);

                DB::table('haber_gorsel')->insert([
                    'haber_id' =>  $time,
                    'gorsel' => "/uploads/haberimages/$imageName"
                ]);
                $i = $i + 1;
            }
        }
        toastr()->success('Haber Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('haber.index');
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
        $habercategorysingle = HaberCategory::get()->unique('lang_id');
        $haber = Haber::where('haber.lang_id',$id)->select('haber.*')->join('langs','langs.lang', '=','haber.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.haber.update',compact('haber','id','habercategorysingle'));
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
            $haber = Haber::where('lang_id',$id)->where('lang', $langs->lang)->first();

            $url = Str::slug($request->input('title_' . $langs->lang), '-');
            $haber->title = $request->input("title_" . $langs->lang);
            $haber->title_2 = $request->input("title_2_" . $langs->lang);
            $haber->kategori = $request->kategori;
            $haber->sira = $request->sira;
            $haber->text = $request->input("text_" . $langs->lang);
            $haber->url = $url;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/haber/'), $imageName);
                $haber->image = 'uploads/haber/' . $imageName;
            }
            $haber->save();
        }

        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/haberimages/', $imageName);

                DB::table('haber_gorsel')->insert([
                    'gorsel' => "/uploads/haberimages/$imageName",
                    'haber_id' =>  $haber->lang_id,

                ]);
                $i = $i + 1;
            }
        }

        toastr()->success('Haber Yazısı Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('haber.index');
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
        $haber = Haber::where('lang_id',$id)->first() ?? abort(404,'Veri Bulunamadi');

        foreach (DB::table('haber_gorsel')->where('haber_id', $haber->lang_id)->get() as $u) {
            $gorsel = public_path( $u->gorsel);
            if (File::exists($gorsel)) {
                File::delete($gorsel);

            }
            DB::table('haber_gorsel')->where('id', $u->id)->delete();
        }

        if (isset($blog->image)) {
            $imageName = DB::table('haber')->where('lang_id', $id);
            foreach ($imageName->get() as $BlogImage){
                $kapakFoto = public_path($BlogImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }


            }
        }
//        if(isset($blog->pdf)){
//            $imageNamePdf = DB::table('blog')->where('id',$id);
//            $kapakFoto = public_path($imageNamePdf->first()->pdf);
//            if (File::exists(str_replace('public/',DIRECTORY_SEPARATOR,$kapakFoto))) {
//                unlink(str_replace(DIRECTORY_SEPARATOR,'/',$kapakFoto));
//            }
//        }
        Haber::where('lang_id',$id)->delete();


        toastr()->success('Haber Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('haber.index');
    }

    public function status (Request $request ){

        $lang = Lang::get();
        foreach ($lang as $langs) {
            Haber::where('lang_id', $request->id)->update(['status' => $request->status]);
        }

        echo $request->status;
    }

    public function imagedelete (Request $request )
    {
        $imagedelete = DB::table('haber_gorsel')->where('id', $request->id);
        $gorsel = public_path( $imagedelete->first()->gorsel);
        if (File::exists($gorsel)) {
            File::delete($gorsel);

        }
        $imagedelete->delete();
        return;
    }
}
