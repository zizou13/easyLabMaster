<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\PDO;
use App\Projet;
use App\User;
use App\Equipe;
use App\Materiel;
use Auth;
use Illuminate\support\Facades\DB;
use App\ProjetUser;
use App\MaterielUser;
use App\MaterielEquipe;
use App\Parametre;
use App\CategorieMaterial;
use Illuminate\Http\UploadedFile;
class MaterielController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
      
    }

	//permet de lister les articles
    public function index(){
    	$materiels = Materiel::all();
        $projets = Projet::all();
        $labo =  Parametre::find('1');

        // $membres = Projet::find($id)->users()->orderBy('name')->get();

    	return view('materiel.index' )->with(
            ['materiels' => $materiels,
            'labo'=>$labo,
            'projets'=>$projets
            ]); 
    	
    }

 public function details($id)
    {
       $materiel=Materiel::find($id);
       $membres=User::all();
       $equipes=Equipe::all();
        $labo = Parametre::find('1');
         $categorieMateriels=CategorieMaterial::all();
        

        return view('materiel.details')->with([
            'materiel' => $materiel,
            'membres'=>$membres,
            'equipes'=>$equipes,
             'categorieMateriels'=> $categorieMateriels,
           
            'labo'=>$labo
            
        ]);
    } 

    //affichage de formulaire de creation d'articles
	 public function create()
     {
        $labo =  Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
              $equipes=Equipe::all();
    	 	 $membres = User::all();
             $projet = Projet::all();
             $categorieMateriels=CategorieMaterial::all();
    	 	return view('materiel.create')->with(['membres' => $membres,
                'labo'=>$labo,'equipes'=>$equipes,'categorieMateriels'=>$categorieMateriels]) ;
            }
             else{
                return view('errors.403',['labo'=>$labo]);
            }
    }


	 public function store(Request $request){

	 	 $materiel= new Materiel();
        $labo =  Parametre::find('1');

	 	 if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        else{
            $file_name="defaultMateriel.png";
        }

          $materiel->cat_mat_id= $request->input('categorie');
	 	 $materiel->nom = $request->input('name_mat');
	 	 $materiel->description = $request->input('description');
         
         $materiel->photo = 'uploads/photo/'.$file_name;
         $date_retour= $request->input('date_retour');
         $date_emprunt= $request->input('date_emprunt');
         $user=$request->input('user');
         $equipe=$request->input('equipe');
          
           $materiel->autorisation_pret = "0";
           $materiel->save();
                  
                   
               return redirect('materiels');


	 }
/******************************************************************
     public function affectToUser(Request $request,$id)
     {
       
         $labo = Parametre::find('1');
        
         $materiel_user = new MaterielUser();
        
        //$date_retour= $request->input('date_retour');
         $date_emprunt= $request->input('date_emprunter');
         $user=$request->input('equipe');
         
   
        
            $materiel_user->materiel_id = $id;
            $materiel_user->user_id = "2";
            $materiel_user->date_emprunter = $date_emprunt;
            $materiel_user->date_rendu="-";
            $materiel_user->save();
            //return redirect('materiels/$id/details');



           return redirect('materiels/'.$id.'/edit');


     }*/
 
    //récuperer un article puis le mettre dans le formulaire
	 public function edit($id){

	 	     $materiel = Materiel::find($id);
             $labo =  Parametre::find('1');
             $categorieMateriels=CategorieMaterial::all();
            $membres=User::all();
            $equipes=Equipe::all();
              

        // $this->authorize('update', $materiel);

        return view('materiel.edit')->with([
            'materiel' => $materiel,
            'labo' => $labo,
             'membres'=>$membres,
             'equipes'=>$equipes,
            'categorieMateriels'=>$categorieMateriels,
        ]);
        	 	
    }

    //modifier et inserer
    public function update(Request $request , $id){
    
    	$materiel = Materiel::find($id);
        $labo =  Parametre::find('1');
        /* if($request->hasFile('img')){
        $file = $request->file('img');
        $file_name = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/uploads/photo'),$file_name);
}
         $materiel->photo = 'uploads/photo/'.$file_name;*/
        
        $materiel->nom = $request->input('name');
        $materiel->description = $request->input('description');
        $materiel->cat_mat_id = $request->input('categorie_id');
        

	 	$materiel->save();

        


	 	return redirect('materiels/'.$id.'/details');

    }
    //supprimer un article
    public function destroy($id){

    	$materiel = Materiel::find($id);
        $materiel->delete();
        return redirect('materiels');

    }
   

}

