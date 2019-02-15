<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\equipeRequest;
use App\Parametre;
use App\Equipe;
use App\User;
use Auth;

class EquipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {  
    $labo = Parametre::find('1'); 
    $equipes = Equipe::all();
     // $nbr = DB::table('users')
     //            ->groupBy('equipe_id')
     //            ->count('equipe_id');

    $nbr = DB::table('users')
             ->select( DB::raw('count(*) as total,equipe_id'))
             ->groupBy('equipe_id')
             ->get();
 
        return view('equipe.index')->with([
            'equipes' => $equipes,
            'nbr' => $nbr,
            'labo'=>$labo,
        ]);;
    }

    public function create()
    {
        $labo = Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
            	$membres = User::all(); 
                return view('equipe.create', ['membres' => $membres] ,['labo'=>$labo]);
            }
            else{
                return view('errors.403' ,['labo'=>$labo]);
            }
    }

    /*

    public function details($id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);
        $membres = User::where('equipe_id', $id)->get();

        return view('equipe.details')->with([
            'equipe' => $equipe,
            'membres' => $membres,
            'labo'=>$labo,
        ]);
    } 
    */
    public function details($id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);
        
        $membres = User::where('equipe_id', $id)->get();
        
        $var = \DB::table('articles') ->groupBy('type')
            ->join('article_user','article_user.article_id','=','articles.id')
        ->join('users','article_user.user_id','=','users.id')
        ->select( \DB::raw('count(type) as total,type'))
            ->where('equipe_id', '=', $id)
         ->orderBy('annee')
        ->get();
  
        
    $var2 = \DB::table('articles') ->groupBy('annee','type')
        ->join('article_user','article_user.article_id','=','articles.id')
        ->join('users','article_user.user_id','=','users.id')
        ->select( \DB::raw('count(type) as total,annee,type'))
        ->where('equipe_id', '=', $id)
         ->orderBy('annee')
        ->get();
     $vars = \DB::table('articles') ->groupBy('annee')
             ->join('article_user','article_user.article_id','=','articles.id')
        ->join('users','article_user.user_id','=','users.id') 
       ->select( \DB::raw('annee'))
         ->where('equipe_id', '=', $id)// ->where('votes', '=', 100)
        ->orderBy('annee')
        ->get();
        
         $vars4 = \DB::table('article_user') ->groupBy ('annee')
        
        ->join('users', 'article_user.user_id', '=', 'users.id')
        ->join('articles', 'articles.id', '=', 'article_user.article_id')
        ->select( \DB::raw('annee '))
        ->where('equipe_id', '=', $id)
        ->get();


        return view('equipe.details')->with([
            
            'equipe' => $equipe,
            'membres' => $membres,
            'labo'=>$labo,
            'var' => $var,
            'vars4' => $vars4,
            'var2' => $var2,
            'vars' => $vars,
     
        ]);
    }


    public function store(equipeRequest $request)
    {
        $labo = Parametre::find('1');
        $equipe = new equipe();
           if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/equipe'),$file_name);

        }
        else{
            $file_name="equipe3.jpg";
        }
        $equipe->intitule = $request->input('intitule');
        $equipe->resume = $request->input('resume');
        $equipe->achronymes = $request->input('achronymes');
        $equipe->axes_recherche = $request->input('axes_recherche');
        $equipe->chef_id = $request->input('chef_id');
        $equipe->photoEquipe = 'uploads/equipe/'.$file_name;

        $equipe->save();

        return redirect('equipes');

    }

    public function update(equipeRequest $request,$id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);

        if( Auth::user()->role->nom == 'admin')
            {

            $equipe->intitule = $request->input('intitule');
            $equipe->resume = $request->input('resume');
            $equipe->achronymes = $request->input('achronymes');
            $equipe->axes_recherche = $request->input('axes_recherche');
            $equipe->chef_id = $request->input('chef_id');

            $equipe->save();

            return redirect('equipes/'.$id.'/details');
            }   
        else{
                return view('errors.403',['labo'=>$labo]);
            }

    }

    public function destroy($id)
    {
        if( Auth::user()->role->nom == 'admin')
            {
        $equipe = Equipe::find($id);
        $equipe->delete();
        return redirect('equipes');
            }
    }

   
    /*******
    public function afficherMembreEquipe($id)
       {
   
      /* $membres = User::where('equipe_id', $id)->get();
   return view('frontView.services' , ['membres' => $membres ]);*/

  /* $membres = User::where('equipe_id', $id)->get();
   return view('frontView.services' , ['membres' => $membres ]);




       }*/
}