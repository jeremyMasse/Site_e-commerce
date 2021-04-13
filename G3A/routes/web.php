<?php

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

Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function () {
    Route::post('/password_modification', 'App\Http\Controllers\UserAccountController@password_modification');
    Route::get('/password_modification', 'App\Http\Controllers\UserAccountController@form_password_modification');
    Route::get('/profil', 'App\Http\Controllers\ProfilController@profil');
    Route::post('/profil/update', 'App\Http\Controllers\ProfilController@modifier_profil');
    Route::delete('/profil/sup/{Id}', 'App\Http\Controllers\ProfilController@sup_membre');
    Route::get('/deconnexion', 'App\Http\Controllers\UserAccountController@deconnexion');
});

Route::get('/', function () {
    return view('index'); //affichage page index
});

Route::get('/contact', function () {
    return view('contact'); //affichage page contact
});

Route::get('/produit/{id}', [
    'as' => 'produit',
    'uses' => '\App\Http\Controllers\ProduitController@produit'
] ); //affichage d'un produit selon son id

Route::post('/connexion', 'App\Http\Controllers\ConnexionController@formulaire'); //affichage de la page connexion
Route::get('/connexion', 'App\Http\Controllers\ConnexionController@connexion'); //validation du formulaire connexion

Route::post('/inscription', 'App\Http\Controllers\inscriptionController@formulaire'); //validation du formulaire pour inscription
Route::get('/inscription', 'App\Http\Controllers\inscriptionController@inscription'); //affichage page inscription


Route::get('/users', 'App\Http\Controllers\UsersController@index');


Route::get('/catalogue', 'App\Http\Controllers\CatalogueController@catalogue'); //affichage de tous les produits
route::get('/catalogue/rechercher', 'App\Http\Controllers\CatalogueController@rechercher'); //recherche d'un produit 

//essaie d'importer une photo pour cloudinary mais problème certificat SSL
//Route::get('/upload', 'App\Http\Controllers\FileUploadController@showUploadForm');
//Route::post('/upload', 'App\Http\Controllers\FileUploadController@storeUploads');

route::get('/panier', 'App\Http\Controllers\PanierController@panier'); //affichage du panier
route::post('/panier/ajouter', 'App\Http\Controllers\PanierController@store');//ajouter un produit
route::get('/paniervider', 'App\Http\Controllers\PanierController@supprimer_cart'); //suprimer le panier
Route::delete('/panier/{rowId}', 'App\Http\Controllers\PanierController@supprimer'); //suprimer un produit

route::get('/card', 'App\Http\Controllers\cardcontroller@card'); //Afficher carte;