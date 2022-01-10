<?php

namespace App\Http\Controllers;

use App\Models\SayfaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SayfaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sayfacategory = SayfaCategory::get();
        return view('back.sayfacategory.list', compact('sayfacategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sayfacategory = SayfaCategory::where('kategori_tree',0)->get();
        return view('back.sayfacategory.create', compact('sayfacategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sayfacategory = new SayfaCategory();
        $sayfacategory->kategori = $request->input("kategori");
        $sayfacategory->kategori_tree = $request->input("kategori_tree");

        $sayfacategory->save();
        toastr()->success('Kategori Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('sayfa-category.index');
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
        $sayfacategory = SayfaCategory::find($id) ?? abort(404,'Veri Bulunamadi');
        $sayfacategorysingle = SayfaCategory::get();
        return view('back.sayfacategory.update', compact('sayfacategory','sayfacategorysingle'));
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


            $sayfacategory = SayfaCategory::where('id',$id)->first();
        $sayfacategory->kategori = $request->input("kategori");
        $sayfacategory->kategori_tree = $request->input("kategori_tree");

        $sayfacategory->save();
        toastr()->success('Kategori Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('sayfa-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status(Request $request)
    {

        SayfaCategory::where('id', $request->id)->update(['status' => $request->status]);

        echo $request->status;
    }
}
