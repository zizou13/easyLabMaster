<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Equipe;
use App\User;
use App\These;
use App\Projet;



class InfoMembreController extends Controller
{
    
   
    public function showDetails($id_user,$id_equipe)
    {
                 
                  
                    $mumber= User::find($id_user);
                    $equipe = Equipe::find($id_equipe);
                    $equi = Equipe::all();
                    /*$projets = DB::table('projets')
                  ->where('projets.chef_id', '=',$id_user)
                  ->get();*/
              $projets = DB::table('projets')
                ->join('projet_user', 'projet_user.projet_id', '=', 'projets.id')
                ->select('*', DB::raw('projets.id as ghie'))
                  ->where('projet_user.user_id', '=',$id_user)
                  ->get();

                  $publications = DB::table('article_user')
                ->join('users', 'users.id', '=', 'article_user.user_id')

                ->join('articles', 'articles.id', '=', 'article_user.article_id')
                ->select('*', DB::raw('article_user.article_id as id_pub'))
                ->where('users.equipe_id', '=',$id_equipe)
                ->where('users.id', '=',$id_user)
                ->orderBy('annee', 'desc')
                ->get();




                
                        
                        
                          
               
                 return view('frontView.info_membre')->with([
                  'mumber' => $mumber,
                  'equipe' => $equipe,
                  'equi' => $equi,
                  'id_membre'=>$id_user,
                  'id_equipe'=>$id_equipe,
                  'publications'=>$publications,
                  'projets'=>$projets]);

    }

   function detailsProjet($id_projet)
   {
   
               $equi = Equipe::all();  
          $projet=Projet::find($id_projet);
       
        $membreProjets = DB::table('projet_user')
                ->join('users', 'users.id', '=', 'projet_user.user_id')
                ->where('projet_user.projet_id', '=',$id_projet)
               ->get();

     return view('frontView.projet')->with([
                 'projet'=> $projet,
                  'equi' => $equi,  
                'membreProjets'=>$membreProjets
                 ]);

    }
   }



