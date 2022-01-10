<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\UrunCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UrunCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $uruncategory = UrunCategory::get()->unique('lang_id');
        return view('back.uruncategory.list', compact('uruncategory','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $uruncategory = UrunCategory::get()->unique('lang_id');
        return view('back.uruncategory.create', compact('uruncategory','lang'));
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
            $uruncategory = new UrunCategory();
            $uruncategory->kategori = $request->input("kategori_" . $langs->lang);
            $uruncategory->kategori_tree = $request->kategori_tree;
            $uruncategory->sira = $request->sira;
            $uruncategory->lang = $langs->lang;
            $uruncategory->lang_id =  $time;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'kategori_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/uruncategory/'), $imageName);
                $uruncategory->image = 'uploads/uruncategory/' . $imageName;
            }
            $uruncategory->save();
        }
        toastr()->success('Ürün Kategorisi Başarılı Şekilde Oluşturuldu.', 'Başarılı');
        return redirect()->route('urun-category.index');
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
        $uruncategorysingle = UrunCategory::where('lang_id','!=',$id)->get()->unique('lang_id');
        $uruncategory = UrunCategory::where('urun_kategori.lang_id',$id)->select('urun_kategori.*')->join('langs','langs.lang', '=','urun_kategori.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.uruncategory.update',compact('uruncategory','uruncategorysingle'));
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
            $uruncategory = UrunCategory::where('lang_id',$id)->where('lang', $langs->lang)->first();
            $uruncategory->kategori = $request->input("kategori_" . $langs->lang);
            $uruncategory->kategori_tree = $request->kategori_tree;
            $uruncategory->sira = $request->sira;

            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'kategori_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/uruncategory/'), $imageName);
                $uruncategory->image = 'uploads/uruncategory/' . $imageName;
            }
            $uruncategory->save();
        }

        toastr()->success('Ürün Kategorisi Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('urun-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $uruncategory = UrunCategory::where('lang_id', $id)->first() ?? abort(404, 'Veri Bulunamadi');

        if (isset($uruncategory->image)) {
            $imageName = DB::table('urun_kategori')->where('lang_id', $id);
            foreach ($imageName->get() as $UrunCategoryImage) {
                $kapakFoto = public_path($UrunCategoryImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }
            }
        }

        UrunCategory::where('lang_id',$id)->delete();
        toastr()->success('Ürün Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('urun-category.index');
    }

    public function status (Request $request ){
        $lang = Lang::get();
        foreach ($lang as $langs) {
            UrunCategory::where('lang_id', $request->id)->update(['status' => $request->status]);
        }

        echo $request->status;

    }
}
