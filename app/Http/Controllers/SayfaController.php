<?php

namespace App\Http\Controllers;

use App\Models\Sayfa;
use App\Models\SayfaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SayfaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sayfa = Sayfa::get();
        return view('back.sayfa.list', compact('sayfa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sayfa = Sayfa::where('kategori_tree', 0)->get();
        return view('back.sayfa.create', compact('sayfa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sayfa = new Sayfa();
        $sayfa->title = $request->input("title");
        $sayfa->type = $request->input("type");

        $sayfa->save();
        toastr()->success('Blog Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('sayfa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sayfa = Sayfa::find($id) ?? abort(404, 'Veri Bulunamadi');
        return view('back.sayfa.update1', compact('sayfa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sayfa = Sayfa::find($id) ?? abort(404, 'Veri Bulunamadi');
        $sayfalar = Sayfa::get();
        $sayfacategory = SayfaCategory::get();
        return view('back.sayfa.update', compact('sayfa', 'sayfalar', 'sayfacategory'));
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
        $sayfa = Sayfa::where('id', $id)->first();
        $sayfa->title = $request->input("title");
        $sayfa->kategori = $request->kategori;
        $sayfa->sira = $request->sira;
        $sayfa->link = $request->link;
        $sayfa->type = $request->type;
        $sayfa->text = $request->input("text");
        $sayfa->url = $request->input("url");

        $sayfa->save();


        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/sayfa/', $imageName);

                DB::table('sayfa_gorsel')->insert([
                    'gorsel' => "/uploads/sayfa/$imageName",
                    'sayfa_id' => $sayfa->id,

                ]);
                $i = $i + 1;
            }
        }

        toastr()->success('Sayfa Yazısı Başarılı Şekilde Güncellendi.', 'Başarılı');
        return redirect()->route('sayfa.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Sayfa::where('id', $id)->first() ?? abort(404, 'Veri Bulunamadi');


        if (isset($user->image)) {
            $imageName = DB::table('sayfa')->where('id', $id);
            foreach ($imageName->get() as $RefImage) {
                $kapakFoto = public_path($RefImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }
            }
        }

        Sayfa::where('id', $id)->delete();
        toastr()->success('Sayfa Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('sayfa.index');
    }

    public function status(Request $request)
    {

        Sayfa::where('id', $request->id)->update(['status' => $request->status]);

        echo $request->status;
    }
}
