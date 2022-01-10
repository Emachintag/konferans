<?php

namespace App\Http\Controllers;

use App\Models\Ayarlar;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AyarlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $ayarlarlogo = Ayarlar::where('lang','tr')->first();
        $ayarlar = Ayarlar::where('ayarlar.lang_id', 1635233954)->select('ayarlar.*')->join('langs', 'langs.lang', '=', 'ayarlar.lang')->get() ?? abort(404, 'Veri Bulunamadi');
        return view('back.ayarlar.update', compact('ayarlar','ayarlarlogo', 'lang'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lang = Lang::get();
        foreach ($lang as $index =>$langs) {
            $time = time();
            $ayarlar = Ayarlar::where('lang_id', 1635233954)->where('lang', $langs->lang)->first();
            $ayarlar->footer_text = $request->input("footer_text_" . $langs->lang);
            $ayarlar->footer_hakkimizda = $request->input("footer_hakkimizda_" . $langs->lang);
            if ($index == 0) {
                if ($request->hasFile('logo')) {
                    $resim = 'logo';
                    $imageName = $time . '.' . $request->$resim->getClientOriginalExtension();
                    $request->$resim->move(public_path('uploads/ayarlar/'), $imageName);
                    $ayarlar->logo = 'uploads/ayarlar/' . $imageName;
                }
            }

            if ($index == 0) {
                if ($request->hasFile('logo_footer')) {
                    $resim = 'logo_footer';
                    $imageName = $time . '.' . $request->$resim->getClientOriginalExtension();
                    $request->$resim->move(public_path('uploads/ayarlar/'), $imageName);
                    $ayarlar->logo_footer = 'uploads/ayarlar/' . $imageName;
                }
            }

            if ($index == 0) {
                if ($request->hasFile('favicon')) {
                    $resim = 'favicon';
                    $imageName = $time . '.' . $request->$resim->getClientOriginalExtension();
                    $request->$resim->move(public_path('uploads/ayarlar/'), $imageName);
                    $ayarlar->favicon = 'uploads/ayarlar/' . $imageName;
                }
            }
            $ayarlar->save();
        }

        toastr()->success('Ayarlar Yazısı Başarılı Şekilde Güncellendi.', 'Başarılı');
        return redirect()->route('ayarlar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
