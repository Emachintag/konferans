<?php

namespace App\Http\Controllers;

use App\Models\Hakkimizda;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HakkimizdaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $hakkimizda = Hakkimizda::where('hakkimizda.lang_id',1635233954)->select('hakkimizda.*')->join('langs','langs.lang', '=','hakkimizda.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.hakkimizda.update', compact('hakkimizda','lang'));
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
            $hakkimizda = Hakkimizda::where('lang_id',1635233954)->where('lang', $langs->lang)->first();
            $hakkimizda->title = $request->input("title_" . $langs->lang);
            $hakkimizda->text = $request->input("text_" . $langs->lang);
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/hakkimizda/'), $imageName);
                $hakkimizda->image = 'uploads/hakkimizda/' . $imageName;
            }
            $hakkimizda->save();
        }

        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/hakkimizdaimages/', $imageName);

                DB::table('hakkimizda_gorsel')->insert([
                    'gorsel' => "/uploads/hakkimizdaimages/$imageName",
                    'hakkimizda_id' =>  1635233954,

                ]);
                $i = $i + 1;
            }
        }

        toastr()->success('Hakkımızda Yazısı Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('hakkimizda.index');
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
        $imagedelete = DB::table('hakkimizda_gorsel')->where('id', $request->id);
        $gorsel = public_path( $imagedelete->first()->gorsel);
        if (File::exists($gorsel)) {
            File::delete($gorsel);

        }
        $imagedelete->delete();
        return;
    }
}
