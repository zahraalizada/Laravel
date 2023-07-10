<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
    * Route::get - sayfanin link kismindaki alani kast ediyor
    * '/' - bos slash anasayfada acilacak anlamina geliyor
    * return view('front.homepage'); - fonksiyon calistigi zaman resources->views klasorunde bulunan front->homepage.blade.php dosyasini cagiriyor

    Route::get('/', function () {
        return view('front.homepage');
    });

 */

/*
 * burada / slash isareti - anasayfaya gitdiyi anlamaina geliyor
 * App\Http\Controllers\Front\Homepage - bu kisim controller kalsorundeki Homepage controllerinin yolunu gosteriyor
 * @index - Homepage Controlleri icerisinde index fonksiyonunu calisdiriyor
 * name('homepage') - bu rotayi isimlendiriyor farkli bir alanda kullana bilmek icin.
 * Ornegin logo uzerine tiklandiginda {{route('homepage')}} - yazarak ilgili sayfaya yonlendirme yapa biliyoruz
 */
Route::get('/', 'App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/iletisim', 'App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::get('/iletisim', 'App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
