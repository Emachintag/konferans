<?php

namespace App\Http\Controllers;

use App\Models\HizmetCategory;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HizmetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $hizmetcategory = HizmetCategory::get()->unique('lang_id');
        return view('back.hizmetcategory.list', compact('hizmetcategory','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $hizmetcategory = HizmetCategory::get()->unique('lang_id');
        return view('back.hizmetcategory.create', compact('hizmetcategory','lang'));
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
            $hizmetcategory = new HizmetCategory();
            $hizmetcategory->kategori = $request->input("kategori_" . $langs->lang);
            $hizmetcategory->kategori_tree = $request->kategori_tree;
            $hizmetcategory->sira = $request->sira;
            $hizmetcategory->lang = $langs->lang;
            $hizmetcategory->lang_id =  $time;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'kategori_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/hizmetcategory/'), $imageName);
                $hizmetcategory->image = 'uploads/hizmetcategory/' . $imageName;
            }
            $hizmetcategory->save();
        }

        toastr()->success('Hizmet Kategorisi Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('hizmet-category.index');
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
        $hizmetcategorysingle = HizmetCategory::where('lang_id','!=',$id)->get()->unique('lang_id');
        $hizmetcategory = HizmetCategory::where('hizmet_kategori.lang_id',$id)->select('hizmet_kategori.*')->join('langs','langs.lang', '=','hizmet_kategori.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.hizmetcategory.update',compact('hizmetcategory','hizmetcategorysingle'));
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
            $hizmetcategory = HizmetCategory::where('lang_id',$id)->where('lang', $langs->lang)->first();
            $hizmetcategory->kategori = $request->input("kategori_" . $langs->lang);
            $hizmetcategory->kategori_tree = $request->kategori_tree;
            $hizmetcategory->sira = $request->sira;

            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'kategori_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/hizmetcategory/'), $imageName);
                $hizmetcategory->image = 'uploads/hizmetcategory/' . $imageName;
            }
            $hizmetcategory->save();
        }

        toastr()->success('Hizmet Kategorisi Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('hizmet-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hizmetcategory = HizmetCategory::where('lang_id', $id)->first() ?? abort(404, 'Veri Bulunamadi');

        if (isset($hizmetcategory->image)) {
            $imageName = DB::table('hizmet_kategori')->where('lang_id', $id);
            foreach ($imageName->get() as $HizmetCategoryImage) {
                $kapakFoto = public_path($HizmetCategoryImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }
            }
        }
        HizmetCategory::where('lang_id',$id)->delete();
        toastr()->success('Hizmet Kategori Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('hizmet-category.index');
    }

    public function status (Request $request ){
        $lang = Lang::get();
        foreach ($lang as $langs) {
            HizmetCategory::where('lang_id', $request->id)->update(['status' => $request->status]);
        }

        echo $request->status;

    }
}
