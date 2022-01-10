<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lang;
use App\Models\Yorum;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class YorumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $yorum = Yorum::where('lang','tr')->get()->unique('lang_id');
        return view('back.yorum.list', compact('yorum', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $yorum = Yorum::get();
        return view('back.yorum.create', compact('yorum', 'lang'));
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
                'title_'.$langs->lang => 'required|min:3',
                'image_'.$langs->lang => 'image|mimes:jpeg,png,jpg|max:5048'
            ]);
            $time = time();
            $yorum = new Yorum();
            $yorum->title = $request->input("title_" . $langs->lang);
            $yorum->title_2 = $request->input("title_2_" . $langs->lang);
            $yorum->text = $request->input("text_" . $langs->lang);
            $yorum->lang = $langs->lang;
            $yorum->lang_id = $time;
            if ($request->hasFile('image_' . $langs->lang)) {
                $resim = 'image_' . $langs->lang;
                $title = 'title_' . $langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/yorum/'), $imageName);
                $yorum->image = 'uploads/yorum/' . $imageName;
            }
            $yorum->save();
        }
        toastr()->success('Yorum Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('yorum.index');
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
        $yorum = Yorum::where('yorum.lang_id',$id)->select('yorum.*')->join('langs','langs.lang', '=','yorum.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.yorum.update',compact('yorum','id'));
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

            $yorum = Yorum::where('lang_id', $id)->where('lang', $langs->lang)->first();
            $yorum->title = $request->input("title_" . $langs->lang);
            $yorum->title_2 = $request->input("title_2_" . $langs->lang);
            $yorum->text = $request->input("text_" . $langs->lang);

            if ($request->hasFile('image_' . $langs->lang)) {
                $resim = 'image_' . $langs->lang;
                $title = 'title_' . $langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/yorum/'), $imageName);
                $yorum->image = 'uploads/yorum/' . $imageName;
            }
            $yorum->save();
        }
        toastr()->success('Yorum Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('yorum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $yorums = Yorum::where('lang_id', $id)->first() ?? abort(404, 'Veri Bulunamadi');


        if (isset($yorums->image)) {
            $imageName = DB::table('yorum')->where('lang_id', $id);
            foreach ($imageName->get() as $YorumImage) {
                $kapakFoto = public_path($YorumImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }


            }
        }

        Yorum::where('lang_id', $id)->delete();
        toastr()->success('Yorum Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('yorum.index');
    }

     public function status (Request $request ){

        $lang = Lang::get();
        foreach ($lang as $langs) {
            Yorum::where('lang_id', $request->id)->update(['status' => $request->status]);
        }

        echo $request->status;
    }

}
