<?php
use App\User;
use App\Notifications\NotificationAuteurIdee;
use App\Notifications\NotificationNuisance;
use App\Notifications\NotificationCommandePassee;

//Connexion + Enregistrement de compte + Mot de passe oublié
Auth::routes();
Route::get('create','zipController@create');
Route::get('/forget2',function(){return View::make('Home/forget_deprecated');});
Route::get('/login2',function(){return View::make('Home/login_deprecated');});
Route::get('/signin2',function(){return View::make('Home/signin_deprecated');});
Route::get('/forget2',function(){return View::make('Home/forget_deprecated');});
Route::get('/legal',function(){return View::make('home/legal');});



//Page d'accueil que tout le monde peut voir 
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');


//Evenements
Route::resource('evenements', 'EvenementsController')->middleware('auth');
Route::get('/evenements/{n}/export', ['uses' => 'EvenementsController@export_users_registered', 'as' => 'export'])->where('n', '[0-9]+')->middleware('auth');
Route::get('/create_event',function(){return View::make('Evenements/create_event');})->middleware('auth');
Route::get('/event',function(){return View::make('Evenements/event');})->middleware('auth');
Route::get('/pass_event',function(){return View::make('home/pass_event');})->middleware('auth');
Route::get('evenements/participation/{n}', ['uses' => 'EvenementsController@participation_evenement_by_user', 'as' => 'evenements.participation'])->where('n', '[0-9]+')->middleware('auth');

//Boite à idées
Route::resource('box', 'BoxController')->middleware('auth');
Route::get('/create_idea',function(){return View::make('Idees/create_idea');})->middleware('auth');



//Photos
Route::resource('photos', 'PhotosController')->middleware('auth');
Route::resource('commentaires', 'CommentairesController')->middleware('auth');
Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);
Route::post('image-upload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost']);
Route::get('/ajout_photos',function(){return View::make('Photos/ajout_photos');})->middleware('auth');
Route::resource('imgup', 'ImageUploadController');
Route::get('/imageUpload',function(){return View::make('Photos/imageUpload');});
Route::get('/picture',function(){return View::make('Photos/picture');})->middleware('auth');
Route::get('like/{n}',['uses' => 'PhotosController@like_photo', 'as' => 'like'])->where('n', '[0-9]+')->middleware('auth');
Route::get('photos/add_commentaire/{n}',['as'=>'add_commentaire','uses'=>'CommentairesController@create_com_photo'])->where('n', '[0-9]+')->middleware('auth');




//Compte
Route::get('/compte','UserController@edituser')->middleware('auth');




//Boutique
Route::resource('shop', 'ProduitsController')->middleware('auth');
Route::resource('categories', 'CategoriesController')->middleware('auth');
Route::get('shop/add/{n}', ['uses' => 'ProduitsController@add_to_cart', 'as' => 'shop.add'])->where('n', '[0-9]+')->middleware('auth');
Route::get('/create_article',function(){return View::make('Boutique/Produits/create_article');})->middleware('auth');
Route::get('/gestion_article',function(){return View::make('Boutique/Produits/gestion_article');});
Route::get('/edit_article',function(){return View::make('Boutique/Produits/edit_article');});
Route::get('/delete_article',function(){return View::make('Boutique/Produits/delete_article');});


//Panier
Route::get('/Boutique/Panier', function(){
//user::find(1)->notify(new NotificationCommandePassee);
    $users = User::find(1);Notification::send($users, new NotificationCommandePassee());
});
Route::get('checkout', ['uses' => 'ProduitsController@checkout', 'as' => 'shop.checkout'])->middleware('auth');
Route::get('cart/delete/{n}', ['uses' => 'ProduitsController@delete_to_cart', 'as' => 'shop.delete'])->where('n', '[0-9]+')->middleware('auth');
Route::get('cart','ProduitsController@cart')->middleware('auth');


//Contact
Route::get('/contact',function(){return View::make('Contact/contact');})->middleware('auth');




//Utilisateurs
Route::resource('utilisateurs', 'UserController')->middleware('auth');




//Fonctionnalités
Route::get('like/{n}',['uses' => 'PhotosController@like_photo', 'as' => 'like'])->where('n', '[0-9]+')->middleware('auth');
Route::get('create','zipController@create');
Route::get('box/vote/{n}', ['uses' => 'BoxController@vote_evenement_by_user', 'as' => 'box.vote'])->where('n', '[0-9]+')->middleware('auth');
Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');
Route::get('/pagination', 'PaginationController@index');
Route::get('pagination/fetch_data', 'PaginationController@fetch_data');
Route::get('/filter', 'FilterController@index');
Route::get('/filter/action', 'FilterController@action')->name('filter.action');
Route::get('gestion',['as'=>'gestion','uses'=>'PhotosController@management_photo'])->middleware('auth');
//Route::get('/', function(){//user::find(1)->notify(new NotificationAuteurIdee);
    //$users = User::find(1);Notification::send($users, new NotificationAuteurIdee());});