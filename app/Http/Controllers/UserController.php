<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return view('back.user.list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::get();
        return view('back.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->input("name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        $user->role = $request->input("role");
        $user->password = bcrypt(request()->password);

        if ($request->hasFile('image')) {
            $resim = 'image';
            $title = 'name';
            $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
            $request->$resim->move(public_path('uploads/user/'), $imageName);
            $user->image = 'uploads/user/' . $imageName;
        }
        $user->save();

        toastr()->success('Kullanıcı Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');

        return redirect()->route('user.index');
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
        $user = User::find($id) ?? abort(404, 'Veri Bulunamadi');
        return view('back.user.update', compact('user'));
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


        $user = User::where('id', $id)->first();

        $user->name = $request->input("name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        $user->role = $request->input("role");
        $user->password = bcrypt(request()->password);

        if ($request->hasFile('image')) {
            $resim = 'image';
            $title = 'name';
            $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
            $request->$resim->move(public_path('uploads/user/'), $imageName);
            $user->image = 'uploads/user/' . $imageName;
        }
        $user->save();

        toastr()->success('Kullanıcı Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first() ?? abort(404, 'Veri Bulunamadi');


        if (isset($user->image)) {
            $imageName = DB::table('users')->where('id', $id);
            foreach ($imageName->get() as $RefImage) {
                $kapakFoto = public_path($RefImage->image);
                if (File::exists(str_replace('/', DIRECTORY_SEPARATOR, $kapakFoto))) {
                    unlink(str_replace(DIRECTORY_SEPARATOR, '/', $kapakFoto));
                }


            }
        }

        User::where('id', $id)->delete();
        toastr()->success('Kullanıcı Yazısı Başarılı Şekilde Silindi.', 'Başarılı');
        return redirect()->route('user.index');
    }

    public function status(Request $request)
    {
        $lang = User::get();
        foreach ($lang as $langs) {
            User::where('id', $request->id)->update(['status' => $request->status]);
        }
        echo $request->status;
    }
}
