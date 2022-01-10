<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Referans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ReferansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $referans = Referans::get()->unique('lang_id');
        return view('back.referans.list', compact('referans', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $referans = Referans::get();
        return view('back.referans.create', compact('referans', 'lang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
            $referans = new Referans();
            $referans->title = $request->input("title_" . $langs->lang);
            $referans->link = $request->input("link_" . $langs->lang);

            $referans->lang = $langs->lang;
            $referans->lang_id = $time;
            if ($request->hasFile('image_' . $langs->lang)) {
                $resim = 'image_' . $langs->lang;
                $title = 'title_' . $langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/referans/'), $imageName);
                $referans->image = 'uploads/referans/' . $imageName;
            }
            $referans->save();
        }
        toastr()->success('Blog Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('referans.index');
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

        $referans = Referans::where('referans.lang_id', $id)->select('referans.*')->join('langs', 'langs.lang', '=', 'referans.lang')->get() ?? abort(404, 'Veri Bulunamadi');
        return view('back.referans.update', compact('referans', 'id'));
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
        foreach ($lang as $langs) {

            $referans = Referans::where('lang_id', $id)->where('lang', $langs->lang)->first();
            $referans->title = $request->input("title_" . $langs->lang);
            $referans->link = $request->input("link_" . $langs->lang);

            if ($request->hasFile('image_' . $langs->lang)) {
                $resim = 'image_' . $langs->lang;
                $title = 'title_' . $langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/referans/'), $imageName);
                $referans->image = 'uploads/referans/' . $imageName;
            }
            $referans->save();
        }
        toastr()->success('Referans Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('referans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $referans = Referans::where('lang_id', $id)->first() ?? abort(404, 'Veri Bulunamadi');


        if (isset($referans->image)) {
            $imageName = DB::table('referans')->where('lang_id', $id);
            foreach ($imageName->get() as $RefImage) {
                $kapakFoto = public_path($RefImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }


            }
        }

        Referans::where('lang_id', $id)->delete();
        toastr()->success('Blog Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('referans.index');
    }

    public function status(Request $request)
    {
        $lang = Lang::get();
        foreach ($lang as $langs) {
            Referans::where('lang_id', $request->id)->update(['status' => $request->status]);
        }
        echo $request->status;
    }
}
