<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Langs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event= Event::get();
        return view('back.event.list', compact('event'));
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
        $event = Event::find($id) ?? abort(404,'Veri Bulunamadi');
        $langs = Langs::get();
        return view('back.event.update', compact('event','langs'));

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
        $user = Event::where('id', $id)->first() ?? abort(404, 'Veri Bulunamadi');


        if (isset($user->image)) {
            $imageName = DB::table('etkinlik')->where('id', $id);
            foreach ($imageName->get() as $RefImage) {
                $kapakFoto = public_path($RefImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }
            }
        }

        Event::where('id', $id)->delete();
        toastr()->success('Etkinlik Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('event.index');
    }

    public function status(Request $request)
    {

            Event::where('id', $request->id)->update(['status' => $request->status]);

        echo $request->status;
    }
}
