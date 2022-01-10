<?php

namespace App\Http\Controllers;

use App\Models\Ekip;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EkipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $ekip = Ekip::where('lang','tr')->get()->unique('lang_id');
        return view('back.ekip.list', compact('ekip', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $ekip = Ekip::get();
        return view('back.ekip.create', compact('ekip', 'lang'));
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
                'title_' . $langs->lang => 'required|min:7',
                'image_' . $langs->lang => 'required|image|mimes:jpeg,png,jpg|max:5048'
            ]);
            $time = time();
            $ekip = new Ekip();
            $ekip->title = $request->input("title_" . $langs->lang);
            $ekip->title_2 = $request->input("title_2_" . $langs->lang);
            $ekip->lang = $langs->lang;
            $ekip->lang_id = $time;
            if ($request->hasFile('image_' . $langs->lang)) {
                $resim = 'image_' . $langs->lang;
                $title = 'title_' . $langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/ekip/'), $imageName);
                $ekip->image = 'uploads/ekip/' . $imageName;
            }
            $ekip->save();
        }
        toastr()->success('Ekip Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');
        return redirect()->route('ekip.index');
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
        $ekip = Ekip::where('ekip.lang_id', $id)->select('ekip.*')->join('langs', 'langs.lang', '=', 'ekip.lang')->get() ?? abort(404, 'Veri Bulunamadi');
        return view('back.ekip.update', compact('ekip', 'id'));
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

            $ekip = Ekip::where('lang_id', $id)->where('lang', $langs->lang)->first();
            $ekip->title = $request->input("title_" . $langs->lang);
            $ekip->title_2 = $request->input("title_2_" . $langs->lang);

            if ($request->hasFile('image_' . $langs->lang)) {
                $resim = 'image_' . $langs->lang;
                $title = 'title_' . $langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/ekip/'), $imageName);
                $ekip->image = 'uploads/ekip/' . $imageName;
            }
            $ekip->save();
        }
        toastr()->success('Ekip Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('ekip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekip = Ekip::where('lang_id', $id)->first() ?? abort(404, 'Veri Bulunamadi');


        if (isset($ekip->image)) {
            $imageName = DB::table('ekip')->where('lang_id', $id);
            foreach ($imageName->get() as $EkipImage) {
                $kapakFoto = public_path($EkipImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }


            }
        }

        Ekip::where('lang_id', $id)->delete();
        toastr()->success('Ekip Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('ekip.index');
    }

    public function status(Request $request)
    {
        $lang = Lang::get();
        foreach ($lang as $langs) {
            Ekip::where('lang_id', $request->id)->update(['status' => $request->status]);
        }
        echo $request->status;
    }


}
