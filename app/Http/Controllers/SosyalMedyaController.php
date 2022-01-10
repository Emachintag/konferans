<?php

namespace App\Http\Controllers;

use App\Models\SosyalMedya;
use Illuminate\Http\Request;

class SosyalMedyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosyal = SosyalMedya::where('id',1)->first() ?? abort(404,'Veri Bulunamadi');
        return view('back.ayarlar.update5', compact('sosyal'));
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
        $sosyal = SosyalMedya::where($id) ?? abort(404,'Veri Bulunamadı');
        SosyalMedya::where('id',$id)->update($request->except(['_method','_token']));
        toastr()->success('Sosyal Başarılı Şekilde Güncellendi.', 'Başarılı');
        return redirect()->route('sosyal.index');
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
