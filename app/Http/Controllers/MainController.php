<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Etiket;
use App\Models\Event;
use App\Models\Hakkimizda;
use App\Models\Iletisim;
use App\Models\IletisimForm;
use App\Models\Langs;
use App\Models\Sayfa;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index()
    {
        $event = Event::where('status',1)->get();
        $langs = Langs::orderBy('name','asc')->get();
        $country = Country::orderBy('country_name','asc')->get()->unique('id');
        $slider = Slider::get();
        $sayfa = Sayfa::get();
        $etiket = Etiket::where('status',1)->get();
        return view('front.index',compact('slider','langs','event','sayfa','country','etiket'));
    }

    public function contact()
    {
        $iletisim = Iletisim::first();
        return view('front.iletisim',compact('iletisim'));
    }

    public function sayfa($page)
    {
        $sayfa = Sayfa::get();
        return view('front.sayfa',compact('sayfa'))->with('id', $page);
    }

    public function about()
    {
        $hakkimizda = Hakkimizda::first();
        return view('front.hakkimizda',compact('hakkimizda'));
    }

    public function event()
    {
        $iletisim = Iletisim::first();
        $langs = Langs::orderBy('name','asc')->get();
        $etiket = Etiket::where('status',1)->get();
        $country = Country::orderBy('country_name','asc')->get();
        return view('front.etkinlik-ekle',compact('langs','country','etiket','iletisim'));
    }

    public function etkinlik_detay($etkinlik)
    {
        $event = Event::where('url',$etkinlik)->first();
        $user = User::where('id',$event->user_id)->first();
        return view('front.detay',compact('event','user'))->with('etkinlik', $etkinlik);
    }



    public function sayfa_detay($sayfa)
    {
        $sayfa = Sayfa::where('url',$sayfa)->first();
        return view('front.sayfa',compact('sayfa'))->with('sayfa', $sayfa);
    }

    public function events()
    {
        $iletisim = Iletisim::first();
        $event = Event::get();
        $langs = Langs::orderBy('name','asc')->get();
        $country = Country::orderBy('country_name','asc')->get();
        return view('front.etkinlik',compact('langs','event','country','iletisim'));
    }

    public function events_tag()
    {
        $event = Event::get();
        $langs = Langs::orderBy('name','asc')->get();
        $country = Country::orderBy('country_name','asc')->get();
        return view('front.etiket',compact('langs','event','country'));
    }

    public function event_post(Request $request)
    {
        $url = Str::slug($request->input('title'), '-');
        $event = new Event();
        $event->title = $request->input("title");
        $event->website = $request->input("website");
        $event->date = $request->input("date");
        $event->date1 = $request->input("date1");
        $event->email = $request->input("email");
        $event->country = $request->input("country");
        $event->text = $request->input("text");
        $event->etiket = implode(',',$request->input('etiket'));
        $event->url = $url;
        $event->user_id = Auth::user()->id;


        if ($request->hasFile('image')) {
            $resim = 'image';
            $title = 'title';
            $imageName = Str::slug($request->input($title)) . '.' . $request->$resim->getClientOriginalExtension();
            $request->$resim->move(public_path('uploads/event/'), $imageName);
            $event->image = 'uploads/event/' . $imageName;
        }
        $event->save();

        toastr()->success('Kullanıcı Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');
        return redirect()->route('event');
    }


    public function iletisim_post(Request $request)
    {

        $form = new IletisimForm();
        $form->ad = $request->input("ad");
        $form->email = $request->input("email");
        $form->text = $request->input("text");


        $form->save();

        toastr()->success('Kullanıcı Yazısı Başarılı Şekilde Oluşturuldu.', 'Başarılı');
        return redirect()->route('contact')->with('message', 'İletişim Formu Başarılı Şekilde Gönderildi.');
    }

    public function profil()
    {

        $iletisim = Iletisim::first();
        return view('front.profil',compact('iletisim'));
    }

    public function profil_post(Request $request)
    {

        $user = User::where('id', Auth::user()->id)->first();

        $user->name = $request->input("name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        $user->password = bcrypt(request()->password);
        $user->save();

        toastr()->success('Kullanıcı Başarılı Şekilde Güncellendi.', 'Başarılı');

        return redirect()->route('profil')->with('message', 'Bilgileriniz Başarılı Bir Şekilde Güncellendi.');
    }
}
