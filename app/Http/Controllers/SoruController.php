<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Soru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SoruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $soru = Soru::get()->unique('lang_id');
        return view('back.soru.list', compact('soru','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $soru = Soru::get();
        return view('back.soru.create', compact('soru','lang'));
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
            ]);
        }
        foreach ($lang as $langs) {
            $time = time();
            $soru = new Soru();
            $soru->title = $request->input("title_" . $langs->lang);
            $soru->sira = $request->sira;
            $soru->text = $request->input("text_" . $langs->lang);
            $soru->lang = $langs->lang;
            $soru->lang_id =  $time;
            $soru->save();
        }

        toastr()->success('Soru Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('soru.index');
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
        $soru = Soru::where('soru.lang_id',$id)->select('soru.*')->join('langs','langs.lang', '=','soru.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.soru.update',compact('soru','id'));
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
        //
    }

    public function status (Request $request ){

        $lang = Lang::get();
        foreach ($lang as $langs) {
            Soru::where('lang_id', $request->id)->update(['status' => $request->status]);
        }

        echo $request->status;
    }
}
