<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $blogcategory = BlogCategory::get()->unique('lang_id');
        return view('back.blogcategory.list', compact('blogcategory','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $blogcategory = BlogCategory::get()->unique('lang_id');
        return view('back.blogcategory.create', compact('blogcategory','lang'));
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
            $blogcategory = new BlogCategory();
            $blogcategory->kategori = $request->input("kategori_" . $langs->lang);
            $blogcategory->kategori_tree = $request->kategori_tree;
            $blogcategory->sira = $request->sira;
            $blogcategory->lang = $langs->lang;
            $blogcategory->lang_id =  $time;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'kategori_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/blogcategory/'), $imageName);
                $blogcategory->image = 'uploads/blogcategory/' . $imageName;
            }
            $blogcategory->save();
        }

        toastr()->success('Blog Kategorisi Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('blog-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogcategorysingle = BlogCategory::where('lang_id','!=',$id)->get()->unique('lang_id');
        $blogcategory = BlogCategory::where('blog_kategori.lang_id',$id)->select('blog_kategori.*')->join('langs','langs.lang', '=','blog_kategori.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.blogcategory.update',compact('blogcategory','blogcategorysingle'));

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
            $blogcategory = BlogCategory::where('lang_id',$id)->where('lang', $langs->lang)->first();
            $blogcategory->kategori = $request->input("kategori_" . $langs->lang);
            $blogcategory->kategori_tree = $request->kategori_tree;
            $blogcategory->sira = $request->sira;

            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'kategori_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/blogcategory/'), $imageName);
                $blogcategory->image = 'uploads/blogcategory/' . $imageName;
            }
            $blogcategory->save();
        }

        toastr()->success('Blog Kategorisi Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('blog-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lang = Lang::get();
        $blogcategory = BlogCategory::where('lang_id', $id)->first() ?? abort(404, 'Veri Bulunamadi');

        if (isset($blogcategory->image)) {
            $imageName = DB::table('blog_kategori')->where('lang_id', $id);
            foreach ($imageName->get() as $BlogCategoryImage) {
                $kapakFoto = public_path($BlogCategoryImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }


            }
        }

        BlogCategory::where('lang_id',$id)->delete();
        toastr()->success('Blog Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('blog-category.index');
    }

    public function status (Request $request ){
        $lang = Lang::get();
        foreach ($lang as $langs) {
            BlogCategory::where('lang_id', $request->id)->update(['status' => $request->status]);
        }

        echo $request->status;

    }
}
