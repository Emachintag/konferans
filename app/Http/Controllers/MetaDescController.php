<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\MetaDesc;
use Illuminate\Http\Request;

class MetaDescController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $meta = MetaDesc::where('meta_description.lang_id',1635233954)->select('meta_description.*')->join('langs','langs.lang', '=','meta_description.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.ayarlar.update3', compact('meta','lang'));
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
        //
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
        $lang = Lang::get();
        foreach ($lang as $langs) {
            $meta = MetaDesc::where('lang_id',1635233954)->where('lang', $langs->lang)->first();
            $meta->haber = $request->input("haber_" . $langs->lang);
            $meta->blog = $request->input("blog_" . $langs->lang);
            $meta->hizmet = $request->input("hizmet_" . $langs->lang);
            $meta->urun = $request->input("urun_" . $langs->lang);
            $meta->referans = $request->input("referans_" . $langs->lang);
            $meta->belge = $request->input("belge_" . $langs->lang);
            $meta->ekip = $request->input("ekip_" . $langs->lang);
            $meta->sorular = $request->input("sorular_" . $langs->lang);
            $meta->slider = $request->input("slider_" . $langs->lang);
            $meta->hakkimizda = $request->input("hakkimizda_" . $langs->lang);
            $meta->vizyon = $request->input("vizyon_" . $langs->lang);
            $meta->misyon = $request->input("misyon_" . $langs->lang);
            $meta->yorum = $request->input("yorum_" . $langs->lang);
            $meta->iletisim = $request->input("iletisim_" . $langs->lang);
            $meta->save();
        }
        toastr()->success('Meta Description Yazısı Başarılı Şekilde Güncellendi.', 'Başarılı');
        return redirect()->route('desc.index');
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
}
