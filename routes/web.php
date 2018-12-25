<?php
use App\User;
use App\These;
use App\Projet;
use App\Article;
use App\Equipe;
use App\Parametre;
use Illuminate\Support\Facades\Input;
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
    return view('auth/login');
});



Route::get('dashboard','dashController@index');
Route::get('parametre','ParametreController@create');
Route::post('parametre','ParametreController@store');

Route::get('theses','TheseController@index');
Route::get('theses/create','TheseController@create');
Route::post('theses','TheseController@store')->middleware('thesecond');
Route::get('theses/{id}/details','TheseController@details');
Route::get('theses/{id}/edit','TheseController@edit');
Route::put('theses/{id}','TheseController@update');
Route::delete('theses/{id}','TheseController@destroy');

Route::get('articles','ArticleController@index');
Route::get('articles/create','ArticleController@create');
Route::post('articles','ArticleController@store');
Route::get('articles/{id}/details','ArticleController@details');
Route::get('articles/{id}/edit','ArticleController@edit');
Route::put('articles/{id}','ArticleController@update');
Route::delete('articles/{id}','ArticleController@destroy');

Route::get('membres','UserController@index');
Route::get('membres/create','UserController@create');
Route::post('membres','UserController@store');
Route::get('membres/{id}/details','UserController@details');
Route::get('trombinoscope','UserController@trombi');
Route::get('membres/{id}/edit','UserController@edit');
Route::put('membres/{id}','UserController@update');
Route::delete('membres/{id}','UserController@destroy');


Route::get('test','EquipeController@index');

Route::get('equipes','EquipeController@index');
Route::get('equipes/create','EquipeController@create');
Route::post('equipes','EquipeController@store');
Route::get('equipes/{id}/details','EquipeController@details');
Route::put('equipes/{id}','EquipeController@update');
Route::delete('equipes/{id}','EquipeController@destroy');

Route::get('projets','ProjetController@index');
Route::get('projets/create','ProjetController@create');
Route::post('projets','ProjetController@store');
Route::get('projets/{id}/details','ProjetController@details');
Route::get('projets/{id}/edit','ProjetController@edit');
Route::put('projets/{id}','ProjetController@update');
Route::delete('projets/{id}','ProjetController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/statistics',function(){

	$year = date('Y');
	 $a1 = DB::table('articles')->distinct('id')->where('annee',$year)->count();
	 $a2 = DB::table('articles')->distinct('id')->where('annee',$year-1)->count();
	 $a3 = DB::table('articles')->distinct('id')->where('annee',$year-2)->count();
	 $a4 = DB::table('articles')->distinct('id')->where('annee',$year-3)->count();
	 $a5 = DB::table('articles')->distinct('id')->where('annee',$year-4)->count();
	 $a6 = DB::table('articles')->distinct('id')->where('annee',$year-5)->count();
	 $a7 = DB::table('articles')->distinct('id')->where('annee',$year-6)->count();

	 $b1 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year)->count();
	 $b2 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-1)->count();
	 $b3 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-2)->count();
	 $b4 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-3)->count();
	 $b5 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-4)->count();
	 $b6 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-5)->count();
	 $b7 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-6)->count();

	 //$date = new Carbon( $these->date_debut );  

	 //$t1 = DB::table('theses')->distinct('id')->where(,$year)->count();

    $annee = [$year-6,$year-5,$year-4,$year-3,$year-2,$year-1,$year];
    $article = [$a7, $a6, $a5,$a4,$a3,$a2,$a1];
    $these = [$b7, $b6, $b5,$b4,$b3,$b2,$b1];
  
	return response()->json(["annee"=>$annee,
							 "article"=> $article,
							 "these"=> $these
							]);
});

Route::any('/search',function(){

	$labo = Parametre::find('1'); 
    $q = Input::get ( 'q' );
    $membres = User::where('name','LIKE','%'.$q.'%')->orWhere('prenom','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    $theses = These::where('titre','LIKE','%'.$q.'%')->orWhere('sujet','LIKE','%'.$q.'%')->get();
    $articles = Article::where('titre','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $projets = Projet::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $equipes = Equipe::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('achronymes','LIKE','%'.$q.'%')->get();

        // return view('search')->withDetails($user)->withQuery ( $q );
        return view('search')->with([
            'membres' => $membres,
            'theses' => $theses,
            'articles' => $articles,
            'projets' => $projets,
            'equipes' => $equipes,
            'labo'=>$labo,
            
        ]);;

});




Route::get('/equipe',function(){
	$equipe = Equipe::all();
	return view('frontView.equipe')->with(['equi' => $equipe]);
});
Route::get('/membre',function(){
	$membres= User::all();
	$equipe = Equipe::all();
	return view('frontView.membre')->with(['membres' => $membres,'equi' => $equipe]);;
});
Route::get('/projet',function(){
	$equipe = Equipe::all();
	return view('frontView.projet')->with(['equi' => $equipe]);
});
Route::get('/info_membre',function(){
	$equipe = Equipe::all();
	return view('frontView.info_membre')->with(['equi' => $equipe]);
});

Route::get('/about',function(){
	$equipe = Equipe::all();
	return view('frontView.about')->with(['equi' => $equipe]);
});



//recupérer la list des equipe
Route::get('/index1',function(){
	$equipe = Equipe::all();
	$listeEquie = Equipe::all(); 
	
    return view('frontView.index')->with(['equipes' => $listeEquie,'equi' => $equipe]);
});
//la liste des menu des equipe
/*Route::get('/master2',function(){
	
	$listeEquie = Equipe::all(); 
	
    return view('layouts.master2')->with(['equipes' => $listeEquie]);
});*/
Route::get('services/{id}','ServicesController@indexEquipe');
Route::get('/news',function(){
	$allProjets = Projet::all(); 
	$equipe = Equipe::all();
	return view('frontView.news')->with(['allProjets' => $allProjets,'equi' => $equipe]);
});

//recupérerr le nom de chef d'equipe en page services
Route::get('services/{id}/details',function ($id){
        $equipe = Equipe::find($id);
        $equi = Equipe::all();
        $membres = User::where('equipe_id', $id)->get();

        return view('frontView.services')->with([
        	'equi' => $equi,
            'equipe' => $equipe,
            'membres' => $membres,
                                                ]);                       
                                               });

Route::get('info_membre/{id_user}/id/{id_equipe}','InfoMembreController@showDetails');

Route::get('projet/{id_projet}','InfoMembreController@detailsProjet');

Route::post('/contactStore','ContactController2@store');	       
Route::get('/contact',function(){
	$equipe = Equipe::all();
	$adress=Parametre::find(2);
	return view('frontView.contact')->with(['equi' => $equipe,'adress'=>$adress]);;
});


