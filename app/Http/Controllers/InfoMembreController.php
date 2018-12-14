<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Equipe;
use App\User;
use App\These;


class InfoMembreController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

   /* public function index($id)
    {
        $membres = User::find($id);
       
        return view('frontView.info_membre' , ['membres' => $membres]);
    }*/
    public function showDetails($id,$idequipe)
    {
             /*  $publications = DB::table('article_user')
                ->join('users', 'users.id', '=', 'article_user.user_id')
                ->join('articles', 'articles.id', '=', 'article_user.article_id')
                ->where('users.equipe_id', '=',$idequipe)
                 //->where('users.id', '=',$id)
                ->orderBy('annee', 'desc')
                  ->get();
                  ,['$publications'=>$publications]*/
    return view('frontView.info_membre',['id_membre'=>$id],['id_equipe'=>$idequipe]);
    }
    

}
