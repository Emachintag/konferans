<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogImage;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Lang::get();
        $blog = Blog::get()->unique('lang_id');
        return view('back.blog.list', compact('blog','lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Lang::get();
        $blog = Blog::get();
        $blogcategory = BlogCategory::where('status',1)->get()->unique('lang_id');
        return view('back.blog.create', compact('blog', 'lang','blogcategory'));
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
                'title_'.$langs->lang => 'required|min:7',
                'image_'.$langs->lang => 'required|image|mimes:jpeg,png,jpg|max:5048'
            ]);
        }
        foreach ($lang as $langs) {
            $time = time();
            $url = Str::slug($request->input('title_' . $langs->lang), '-');
            $blog = new Blog();
            $blog->title = $request->input("title_" . $langs->lang);
            $blog->title_2 = $request->input("title_2_" . $langs->lang);
            $blog->kategori = $request->kategori;
            $blog->sira = $request->sira;
            $blog->text = $request->input("text_" . $langs->lang);
            $blog->url = $url;
            $blog->lang = $langs->lang;
            $blog->lang_id =  $time;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/blog/'), $imageName);
                $blog->image = 'uploads/blog/' . $imageName;
            }
            $blog->save();
        }
        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/blogimages/', $imageName);

                DB::table('blog_gorsel')->insert([
                    'blog_id' =>  $time,
                    'gorsel' => "/uploads/blogimages/$imageName"
                ]);
                $i = $i + 1;
            }
        }
        toastr()->success('Blog Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('blog.index');
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
        $blogcategorysingle = BlogCategory::get()->unique('lang_id');
        $blog = Blog::where('blog.lang_id',$id)->select('blog.*')->join('langs','langs.lang', '=','blog.lang')->get() ?? abort(404,'Veri Bulunamadi');
        return view('back.blog.update',compact('blog','id','blogcategorysingle'));
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
            $blog = Blog::where('lang_id',$id)->where('lang', $langs->lang)->first();

            $url = Str::slug($request->input('title_' . $langs->lang), '-');
            $blog->title = $request->input("title_" . $langs->lang);
            $blog->title_2 = $request->input("title_2_" . $langs->lang);
            $blog->kategori = $request->kategori;
            $blog->sira = $request->sira;
            $blog->text = $request->input("text_" . $langs->lang);
            $blog->url = $url;
            if ($request->hasFile('image_'.$langs->lang)) {
                $resim = 'image_'.$langs->lang;
                $title = 'title_'.$langs->lang;
                $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
                $request->$resim->move(public_path('uploads/blog/'), $imageName);
                $blog->image = 'uploads/blog/' . $imageName;
            }
            $blog->save();
        }

        if ($request->hasfile('images')) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $info = getimagesize($image);
                $extension = image_type_to_extension($info[2]);
                $imageName = time() . $i . $extension;
                $image->move(public_path() . '/uploads/blogimages/', $imageName);

                DB::table('blog_gorsel')->insert([
                    'gorsel' => "/uploads/blogimages/$imageName",
                    'blog_id' =>  $blog->lang_id,

                ]);
                $i = $i + 1;
            }
        }

        toastr()->success('Blog Yazısı Başarılı Şekilde Güncellendi.', 'Başarılı');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lang = Lang::get();
        $blog = Blog::where('lang_id',$id)->first() ?? abort(404,'Veri Bulunamadi');

        foreach (DB::table('blog_gorsel')->where('blog_id', $blog->lang_id)->get() as $u) {
            $gorsel = public_path( $u->gorsel);
            if (File::exists($gorsel)) {
                File::delete($gorsel);

            }
            DB::table('blog_gorsel')->where('id', $u->id)->delete();
        }

        if (isset($blog->image)) {
            $imageName = DB::table('blog')->where('lang_id', $id);
            foreach ($imageName->get() as $BlogImage){
                $kapakFoto = public_path($BlogImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
            }


        }
    }
//        if(isset($blog->pdf)){
//            $imageNamePdf = DB::table('blog')->where('id',$id);
//            $kapakFoto = public_path($imageNamePdf->first()->pdf);
//            if (File::exists(str_replace('public/',DIRECTORY_SEPARATOR,$kapakFoto))) {
//                unlink(str_replace(DIRECTORY_SEPARATOR,'/',$kapakFoto));
//            }
//        }
        Blog::where('lang_id',$id)->delete();


        toastr()->success('Blog Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('blog.index');
    }

    function blogsira (Request $r)
    {
        for ($i = 0; $i < count($r->id); $i++) {
            DB::table('blog')->where("id", $r->id[$i])->update(["sira" => $i + 1]);
        }
        echo 1;
    }

    public function status (Request $request ){

        $lang = Lang::get();
        foreach ($lang as $langs) {
            Blog::where('lang_id', $request->id)->update(['status' => $request->status]);
        }

        echo $request->status;
    }

    public function imagedelete (Request $request )
    {
        $imagedelete = DB::table('blog_gorsel')->where('id', $request->id);
        $gorsel = public_path( $imagedelete->first()->gorsel);
        if (File::exists($gorsel)) {
            File::delete($gorsel);

        }
        $imagedelete->delete();
        return;
    }

}
