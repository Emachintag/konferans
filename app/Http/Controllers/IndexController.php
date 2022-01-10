<?php

namespace App\Http\Controllers;

use App\Models\Etiket;
use App\Models\Event;
use App\Models\Referans;
use App\Models\Sayfa;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $user = User::get();
        $referans = Referans::get();
        $etiket = Etiket::get();
        $sayfa = Sayfa::get();
        $event = Event::get();
        $slider = Slider::get();
        return view('back.index',compact('user','referans','etiket','sayfa','event','slider'));
    }
}
