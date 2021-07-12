<?php

use App\Models\Projet;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetController;

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

Route::get('/', function () {
    $projets=Projet::orderBy("nom",'desc')
                    ->take(3)
                    ->get();
//    $campagnesPop=DB::table("user_projet")->where()->sum()
    return view('interfaces.template.index',["projets"=>$projets]);
})->name('accueil');

Route::get('/campagnes', function () {
    return view(
        'interfaces.template.campaigns',
        ["projets"=>Projet::
            where(
              [
                ["duree",'>=',now()],
                ["etat",1]
              ]
            )
            ->get()]
    );
})->name('campagnes');

Route::get('/campagnes/{id}', [ProjetController::class,"showSingle"])->name('projet')->whereNumber("id");

Route::get('/financer/{id}', [ProjetController::class,'financerview'])->middleware(["auth"])->name('financer');

Route::post('/financer/{id}',[ProjetController::class,'financerprojet'])->middleware(["auth"])->name('financer');


Route::get('/profile/{utilisateur}', function () {
    return view('interfaces.template.profile');
})->name('profil');

Route::get('/comment-entreprendre', function () {
    return view('interfaces.template.index');
})->name('comment-entreprendre');

Route::get('/comment-financer', function () {
    return view('interfaces.template.index');
})->name('comment-financer');

Route::get('/soumettre-un-projet', function () {
    return view('interfaces.template.submit_project',);
})->middleware(["auth"])->name('soumettre-un-projet');

Route::post('/soumettre-un-projet',[ProjetController::class,"create"])->middleware(["auth"])->name('soumettre-un-projet');

Route::get('/contact', function () {
    return view('interfaces.template.contact');
})->name('contact');

Route::get('/admin/projets', function () {
    return view('interfaces.admin.projets');
})->middleware(['auth'])->name('admin.projets');

Route::get('/admin/utilisateurs', function () {
    return view('interfaces.admin.utilisateurs');
})->middleware(['auth'])->name('admin.utilisateurs');

require __DIR__.'/auth.php';
