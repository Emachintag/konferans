<?php

namespace App\Http\Controllers;

use App\Models\Iletisim;
use App\Models\Lang;
use Illuminate\Http\Request;

class IletisimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $iletisim = Iletisim::where('iletisim.lang_id',1635233954)->select('iletisim.*')->join('langs','langs.lang', '=','iletisim.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.ayarlar.update4', compact('iletisim','lang'));
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
            $iletisim = Iletisim::where('lang_id',1635233954)->where('lang', $langs->lang)->first();
            $iletisim->tel_1 = $request->input("tel_1_" . $langs->lang);
            $iletisim->tel_2 = $request->input("tel_2_" . $langs->lang);
            $iletisim->tel_3 = $request->input("tel_3_" . $langs->lang);
            $iletisim->email_1 = $request->input("email_1_" . $langs->lang);
            $iletisim->email_2 = $request->input("email_2_" . $langs->lang);
            $iletisim->adres = $request->input("adres_" . $langs->lang);
            $iletisim->iframe = $request->input("iframe_" . $langs->lang);
            $iletisim->save();
        }
        toastr()->success('İletişim Bilgileri Başarılı Şekilde Güncellendi.', 'Başarılı');
        return redirect()->route('iletisim.index');
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
