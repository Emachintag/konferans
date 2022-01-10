<?php

namespace App\Http\Controllers;

use App\Models\Belge;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BelgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $belge = Belge::where('lang','tr')->get()->unique('lang_id');
        return view('back.belge.list', compact('belge','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $belge = Belge::get();
        return view('back.belge.create', compact('belge', 'lang'));
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
                'title_'.$langs->lang => 'required|min:7',
                'image_'.$langs->lang => 'required|image|mimes:jpeg,png,jpg|max:5048'
            ]);
        }
        foreach ($lang as $langs) {
            $time = time();
            $belge = new Belge();
            $belge->title = $request->input("title_" . $langs->lang);
            $belge->sira = $request->sira;
            $belge->lang = $langs->lang;
            $belge->lang_id =  $time;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/belge/'), $imageName);
                $belge->image = 'uploads/belge/' . $imageName;
            }
            if ($request->hasFile('pdf_'.$langs->lang)) {
                $pdf = 'pdf_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $pdfName = Str::slug($request->input($title)) . '.' . $request->$pdf->getClientOriginalExtension();
                $request->$pdf->move(public_path('uploads/belgepdf/'), $pdfName);
                $belge->pdf = 'uploads/belgepdf/' . $pdfName;
            }
            $belge->save();
        }

        toastr()->success('Belge Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('belge.index');
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
        $belge = Belge::where('belge.lang_id',$id)->select('belge.*')->join('langs','langs.lang', '=','belge.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.belge.update',compact('belge','id'));
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
            $belge = Belge::where('lang_id',$id)->where('lang', $langs->lang)->first();

            $belge->title = $request->input("title_" . $langs->lang);
            $belge->sira = $request->sira;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/belge/'), $imageName);
                $belge->image = 'uploads/belge/' . $imageName;
            }
            if ($request->hasFile('pdf_'.$langs->lang)) {
                $pdf = 'pdf_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $pdfName = Str::slug($request->input($title)) . '.' . $request->$pdf->getClientOriginalExtension();
                $request->$pdf->move(public_path('uploads/belgepdf/'), $pdfName);
                $belge->pdf = 'uploads/belgepdf/' . $pdfName;
            }
            $belge->save();
        }



        toastr()->success('Belge Yazısı Başarılı Şekilde Güncellendi.', 'Başarılı');
        return redirect()->route('belge.index');
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

    public function status (Request $request ){

        $lang = Lang::get();
        foreach ($lang as $langs) {
            Belge::where('lang_id', $request->id)->update(['status' => $request->status]);
        }

        echo $request->status;
    }
}
