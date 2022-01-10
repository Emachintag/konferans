<?php

namespace App\Http\Controllers;

use App\Models\Etiket;
use Illuminate\Http\Request;

class EtiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiket = Etiket::get();
        return view('back.etiket.create', compact('etiket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etiket = new Etiket();
        $etiket->title = $request->input("title");

        $etiket->save();
        toastr()->success('Etiket Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->back();
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


        Etiket::where('id',$id)->delete();
        toastr()->success('Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->back();
    }

    public function status(Request $request)
    {

        Etiket::where('id', $request->id)->update(['status' => $request->status]);

        echo $request->status;
    }
}
