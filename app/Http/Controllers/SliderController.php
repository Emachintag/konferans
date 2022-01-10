<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $slider = Slider::where('lang','tr')->get()->unique('lang_id');
        return view('back.slider.list', compact('slider', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $slider = Slider::get();
        return view('back.slider.create', compact('slider', 'lang'));
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

            $time = time();
            $slider = new Slider();
            $slider->title = $request->input("title_" . $langs->lang);
            $slider->title_2 = $request->input("title_2_" . $langs->lang);
            $slider->buton = $request->input("buton_" . $langs->lang);
            $slider->url = $request->input("url_" . $langs->lang);

            $slider->lang = $langs->lang;
            $slider->lang_id = $time;
            if ($request->hasFile('image_' . $langs->lang)) {
                $resim = 'image_' . $langs->lang;
                $title = 'title_' . $langs->lang;
                $imageName = Str::slug($request->input($title)) .'.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/slider/'), $imageName);
                $slider->image = 'uploads/slider/' . $imageName;
            }
            if ($request->hasFile('video_' . $langs->lang)) {
                $video = 'video_' . $langs->lang;
                $title = 'title_' . $langs->lang;
                $videoName = Str::slug($request->input($title)) . '.' . $request->$video->getClientOriginalExtension();
                $request->$video->move(public_path('uploads/video_slider/'), $videoName);
                $slider->video = 'uploads/video_slider/' . $videoName;
            }
            $slider->save();
        }
        toastr()->success('Slider Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('slider.index');
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
        $slider = Slider::where('slider.lang_id', $id)->select('slider.*')->join('langs', 'langs.lang', '=', 'slider.lang')->get() ?? abort(404, 'Veri Bulunamadi');
        return view('back.slider.update', compact('slider', 'id'));
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

            $slider = Slider::where('lang_id', $id)->where('lang', $langs->lang)->first();
            $slider->title = $request->input("title_" . $langs->lang);
            $slider->title_2 = $request->input("title_2_" . $langs->lang);
            $slider->buton = $request->input("buton_" . $langs->lang);
            $slider->url = $request->input("url_" . $langs->lang);

            $slider->lang = $langs->lang;
            if ($request->hasFile('image_' . $langs->lang)) {
                $resim = 'image_' . $langs->lang;
                $title = 'title_' . $langs->lang;
                $imageName = Str::slug($request->input($title)) .'.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/slider/'), $imageName);
                $slider->image = 'uploads/slider/' . $imageName;
            }
            if ($request->hasFile('video_' . $langs->lang)) {
                $video = 'video_' . $langs->lang;
                $title = 'title_' . $langs->lang;
                $videoName = Str::slug($request->input($title)) . '.' . $request->$video->getClientOriginalExtension();
                $request->$video->move(public_path('uploads/video_slider/'), $videoName);
                $slider->video = 'uploads/video_slider/' . $videoName;
            }
            $slider->save();
        }
        toastr()->success('Slider Yazısı Başarılı Şekilde Güncellendi.', 'Başarılı');
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::where('lang_id', $id)->first() ?? abort(404, 'Veri Bulunamadi');


        if (isset($slider->image)) {
            $imageName = DB::table('slider')->where('lang_id', $id);
            foreach ($imageName->get() as $SliderImage) {
                $kapakFoto = public_path($SliderImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }
            }
        }

        Slider::where('lang_id', $id)->delete();
        toastr()->success('Slider Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('slider.index');
    }

    public function status(Request $request)
    {
        $lang = Lang::get();
        foreach ($lang as $langs) {
            Slider::where('lang_id', $request->id)->update(['status' => $request->status]);
        }
        echo $request->status;
    }
}
