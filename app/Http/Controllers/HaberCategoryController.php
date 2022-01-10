<?php

namespace App\Http\Controllers;

use App\Models\Haber;
use App\Models\HaberCategory;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HaberCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $habercategory = HaberCategory::get()->unique('lang_id');
        return view('back.habercategory.list', compact('habercategory','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $habercategory = HaberCategory::get()->unique('lang_id');
        return view('back.habercategory.create', compact('habercategory','lang'));
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
            $time = time();
            $habercategory = new HaberCategory();
            $habercategory->kategori = $request->input("kategori_" . $langs->lang);
            $habercategory->kategori_tree = $request->kategori_tree;
            $habercategory->sira = $request->sira;
            $habercategory->lang = $langs->lang;
            $habercategory->lang_id =  $time;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'kategori_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/habercategory/'), $imageName);
                $habercategory->image = 'uploads/habercategory/' . $imageName;
            }
            $habercategory->save();
        }

        toastr()->success('Haber Kategorisi Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('haber-category.index');
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
        $habercategorysingle = HaberCategory::where('lang_id','!=',$id)->get()->unique('lang_id');
        $habercategory = HaberCategory::where('haber_kategori.lang_id',$id)->select('haber_kategori.*')->join('langs','langs.lang', '=','haber_kategori.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.habercategory.update',compact('habercategory','habercategorysingle'));
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
            $habercategory = HaberCategory::where('lang_id',$id)->where('lang', $langs->lang)->first();
            $habercategory->kategori = $request->input("kategori_" . $langs->lang);
            $habercategory->kategori_tree = $request->kategori_tree;
            $habercategory->sira = $request->sira;

            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'kategori_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/habercategory/'), $imageName);
                $habercategory->image = 'uploads/habercategory/' . $imageName;
            }
            $habercategory->save();
        }

        toastr()->success('Haber Kategorisi Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('haber-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habercategory = HaberCategory::where('lang_id', $id)->first() ?? abort(404, 'Veri Bulunamadi');

        if (isset($habercategory->image)) {
            $imageName = DB::table('haber_kategori')->where('lang_id', $id);
            foreach ($imageName->get() as $HaberCategoryImage) {
                $kapakFoto = public_path($HaberCategoryImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }


            }
        }

        HaberCategory::where('lang_id',$id)->delete();
        toastr()->success('Haber Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('haber-category.index');
    }

    public function status (Request $request ){
        $lang = Lang::get();
        foreach ($lang as $langs) {
            HaberCategory::where('lang_id', $request->id)->update(['status' => $request->status]);
        }
        echo $request->status;

    }
}
