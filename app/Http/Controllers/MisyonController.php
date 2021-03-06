<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Misyon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MisyonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $misyon = Misyon::where('misyon.lang_id',1635233954)->select('misyon.*')->join('langs','langs.lang', '=','misyon.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.misyon.update', compact('misyon','lang'));
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
            $misyon = Misyon::where('lang_id',1635233954)->where('lang', $langs->lang)->first();
            $misyon->title = $request->input("title_" . $langs->lang);
            $misyon->text = $request->input("text_" . $langs->lang);
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/misyon/'), $imageName);
                $misyon->image = 'uploads/misyon/' . $imageName;
            }
            $misyon->save();
        }

        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/misyonimages/', $imageName);

                DB::table('misyon_gorsel')->insert([
                    'gorsel' => "/uploads/misyonimages/$imageName",
                    'misyon_id' =>  1635233954,

                ]);
                $i = $i + 1;
            }
        }

        toastr()->success('Misyon Yaz??s?? Ba??ar??l?? ??ekilde G??ncellendi.', 'Ba??ar??l??');

        return redirect()->route('misyon.index');
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
        $imagedelete = DB::table('misyon_gorsel')->where('id', $request->id);
        $gorsel = public_path( $imagedelete->first()->gorsel);
        if (File::exists($gorsel)) {
            File::delete($gorsel);

        }
        $imagedelete->delete();
        return;
    }
}
