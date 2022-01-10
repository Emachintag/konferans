<?php

use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SayfaController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SayfaCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\EtiketController;
use App\Http\Controllers\ReferansController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HaberController;
use App\Http\Controllers\HaberCategoryController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\SoruController;
use App\Http\Controllers\HakkimizdaController;
use App\Http\Controllers\AyarlarController;
use App\Http\Controllers\MetaTitleController;
use App\Http\Controllers\MisyonController;
use App\Http\Controllers\VizyonController;
use App\Http\Controllers\HizmetController;
use App\Http\Controllers\HizmetCategoryController;
use App\Http\Controllers\UrunController;
use App\Http\Controllers\UrunCategoryController;
use App\Http\Controllers\EkipController;
use App\Http\Controllers\BelgeController;
use App\Http\Controllers\YorumController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\MetaDescController;
use App\Http\Controllers\IletisimController;
use App\Http\Controllers\SosyalMedyaController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('anasayfa');
Route::get('/iletisim', [MainController::class, 'contact'])->name('contact');
Route::get('/profil', [MainController::class, 'profil'])->name('profil');
Route::post('/profil', [MainController::class, 'profil_post'])->name('profil_post');
Route::get('/etkinlikler', [MainController::class, 'events'])->name('events');
Route::get('/etkinlikler-etiket', [MainController::class, 'events_tag'])->name('events_tag');
Route::get('/etkinlik-ekle', [MainController::class, 'event'])->name('event');
Route::post('/etkinlik-ekle', [MainController::class, 'event_post'])->name('event_post');
Route::get('/hakkimizda', [MainController::class, 'about'])->name('about');
Route::get('/etkinlik/{etkinlik}', [MainController::class, 'etkinlik_detay'])->name('etkinlik_detay');
Route::post('/iletisim-post', [MainController::class, 'iletisim_post'])->name('iletisim_post');
Route::get('/sayfa/{sayfa}', [MainController::class, 'sayfa_detay'])->name('sayfa_detay');
Route::get('/admin', function () {
    return view('back.index');
});

Route::get('/blog', function () {
    return view('back.blog.create');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_post']);
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup_post'])->name('signup_post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('panel')->middleware('auth')->group(function () {

    Route::get('/', [IndexController::class, 'index'])->name('index');


#Referans Start
    Route::get('referans/{id}', [ReferansController::class, 'destroy'])->whereNumber('id')->name('referans.destroy');
    Route::post('/referans-status', [ReferansController::class, 'status'])->name('referans.status');
    Route::resource('referans', ReferansController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#Referans End
#Hakkimizda Start
    Route::get('hakkimizda/{id}', [HakkimizdaController::class, 'destroy'])->whereNumber('id')->name('soru.destroy');
    Route::post('/hakkimizda-gorsel-sil', [HakkimizdaController::class, 'imagedelete'])->name('hakkimizda.imagedelete');
    Route::resource('hakkimizda', HakkimizdaController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#Hakkimizda End
#Slider Start
    Route::get('slider/{id}', [SliderController::class, 'destroy'])->whereNumber('id')->name('slider.destroy');
    Route::post('/slider-status', [SliderController::class, 'status'])->name('slider.status');
    Route::post('/slider-gorsel-sil', [SliderController::class, 'imagedelete'])->name('slider.imagedelete');
    Route::resource('slider', SliderController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#Slider End
#Ayarlar Start
    Route::get('ayarlar/{id}', [AyarlarController::class, 'destroy'])->whereNumber('id')->name('ayarlar.destroy');
    Route::post('/ayarlar-gorsel-sil', [AyarlarController::class, 'imagedelete'])->name('ayarlar.imagedelete');
    Route::resource('ayarlar', AyarlarController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#Ayarlar End#Meta Description End
#İletişim Start
    Route::get('iletisim/{id}', [IletisimController::class, 'destroy'])->whereNumber('id')->name('iletisim.destroy');
    Route::post('/iletisim-gorsel-sil', [IletisimController::class, 'imagedelete'])->name('iletisim.imagedelete');
    Route::resource('iletisim', IletisimController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#İletişim End
#Sosyal Medya Start
    Route::get('sosyal/{id}', [SosyalMedyaController::class, 'destroy'])->whereNumber('id')->name('sosyal.destroy');
    Route::post('/sosyal-gorsel-sil', [SosyalMedyaController::class, 'imagedelete'])->name('sosyal.imagedelete');
    Route::resource('sosyal', SosyalMedyaController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#Sosyal Medya End
#User Start
    Route::get('user/{id}', [UserController::class, 'destroy'])->whereNumber('id')->name('user.destroy');
    Route::post('/user-status', [UserController::class, 'status'])->name('user.status');
    Route::resource('user', UserController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#User End
#Lang Start
    Route::get('lang/{id}', [LangController::class, 'destroy'])->whereNumber('id')->name('lang.destroy');
    Route::resource('lang', LangController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#Lang End
#Event Start
    Route::get('event/{id}', [EventController::class, 'destroy'])->whereNumber('id')->name('event.destroy');
    Route::post('/event-status', [EventController::class, 'status'])->name('event.status');
    Route::post('/event-gorsel-sil', [EventController::class, 'imagedelete'])->name('event.imagedelete');
    Route::resource('event', EventController::class)->only(['index', 'show', 'edit',  'delete', 'create', 'store', 'update', 'destroy']);
#Event End
#Sayfa Start
    Route::get('sayfa/{id}', [SayfaController::class, 'destroy'])->whereNumber('id')->name('sayfa.destroy');
    Route::post('/sayfa-status', [SayfaController::class, 'status'])->name('sayfa.status');
    Route::post('/sayfa-gorsel-sil', [SayfaController::class, 'imagedelete'])->name('sayfa.imagedelete');
    Route::resource('sayfa', SayfaController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#Sayfa End
#Sayfa Category Start
    Route::get('sayfa-category/{id}', [SayfaCategoryController::class, 'destroy'])->whereNumber('id')->name('sayfa-category.destroy');
    Route::post('/sayfa-category-status', [SayfaCategoryController::class, 'status'])->name('sayfa-category.status');
    Route::resource('sayfa-category', SayfaCategoryController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#Sayfa Category End
#Etiket Category Start
    Route::get('etiket/{id}', [EtiketController::class, 'destroy'])->whereNumber('id')->name('etiket-category.destroy');
    Route::post('/etiket-status', [EtiketController::class, 'status'])->name('etiket.status');
    Route::resource('etiket', EtiketController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#Etiket Category End
#İletişim Start
    Route::get('form/{id}', [FormController::class, 'destroy'])->whereNumber('id')->name('form.destroy');
    Route::post('/form-status', [FormController::class, 'status'])->name('form.status');
    Route::resource('form', FormController::class)->only(['index', 'show', 'edit', 'delete', 'create', 'store', 'update', 'destroy']);
#İletişim End
});
