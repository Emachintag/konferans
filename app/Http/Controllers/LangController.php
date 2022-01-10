<?php

namespace App\Http\Controllers;

use App\Models\Langs;
use Illuminate\Http\Request;
use App\Models\Lang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $langs = Langs::get();
        return view('back.ayarlar.lang', compact('lang','langs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lang=new Lang();
        $lang->lang=$request->lang;
        $lang->langName=$request->langName;

        $lang->save();
        toastr()->success('Blog Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('lang.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $lang = Lang::where('id', $id)->first() ?? abort(404, 'Veri Bulunamadi');
        Lang::where('id',$id)->delete();
        toastr()->success('Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('lang.index');
    }
}
