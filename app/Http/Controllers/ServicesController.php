<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

use App\Equipe;
use App\User;
use App\Projet;

class ServicesController extends Controller
{
    //
     public function indexEquipe($id)
       {
         $equi = Equipe::all(); 
        $rowEquipe = Equipe::find($id);
         $membres = DB::table('users')
                ->join('equipes', 'equipes.id', '=', 'users.equipe_id')
                ->select('*', DB::raw('users.id as userId'))
                ->where('users.equipe_id', '=',$id)

                  ->get();
          $publications = DB::table('article_user')
                ->join('users', 'users.id', '=', 'article_user.user_id')
                ->join('articles', 'articles.id', '=', 'article_user.article_id')
                ->where('users.equipe_id', '=',$id)
                ->orderBy('annee', 'desc')
                  ->get();
                
          $projets = DB::table('projets')
                   ->join('users', 'users.id', '=', 'projets.chef_id')
                ->select('*', DB::raw('projets.id as projetId'))
                ->where('users.equipe_id', '=',$id)
                ->get();

                        foreach ($projets as $projet) {
        $membreProjets = DB::table('projet_user')
                ->join('users', 'users.id', '=', 'projet_user.user_id')
                ->where('projet_user.projet_id', '=',$projet->projetId)
               ->get();
                                                      }
        //return view('frontView.services' , ['equipe' => $rowEquipe ],['membres' => $membres]);
                  return view('frontView.services')->with([
                    'equipe' => $rowEquipe,
                    'membres' => $membres,
                    'publications'=>$publications,
                    'equi' => $equi,
                    'projets'=>$projets,'membreProjets'=>$membreProjets]);
       }

 
      

}
