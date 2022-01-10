<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GaleriController extends Controller
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
        $lang = Lang::get();
        $galeri = Galeri::get();

        return view('back.galeri.index', compact('galeri', 'lang'));
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





        if ($request->hasfile('images')) {

                $i = 0;
                foreach ($request->file('images') as $image) {

                    $time = time() + $i;
                    $info = getimagesize($image);
                    $extension = image_type_to_extension($info[2]);
                    $imageName = time() . $i . $extension;
                    $image->move(public_path() . '/uploads/galeri/', $imageName);
                    foreach ($lang as $langs) {
                    DB::table('galeri')->insert([
                        'title' => $request->input('title'),
                        'title_2' => $request->input('title_2'),
                        'lang_id' => $time,
                        'lang' => $langs->lang,
                        'gorsel' => "/uploads/galeri/$imageName"


                    ]);
                    $i = $i + 1;
                }
            }

        }
        toastr()->success('Blog Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('galeri.create');
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
        //
    }

    public function imagedelete (Request $request )
    {
        $lang = Lang::get();
        foreach ($lang as $langs) {
            $imagedelete = DB::table('galeri')->where('lang_id', $request->id)->where('lang', $langs->lang);
            $gorsel = public_path($imagedelete->first()->gorsel);
            if (File::exists($gorsel)) {
                File::delete($gorsel);

            }
            $imagedelete->delete();
        }
        return;
    }
}
