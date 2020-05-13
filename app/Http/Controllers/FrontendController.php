<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appartement;
use App\Commune;
use App\Image;
use App\User;
use App\Reservation;

use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function __construct($value='')
    {
        # code...
    }



    public function index($value='')
    {
        $title = 'Logez Bien | Bienvenue';
        $communes = Commune::all();
        $data = [
            'communes'=>$communes,
            'title'=>$title,
        ];
        return view('frontend/index')->with($data);
    }

    private function getRequest(Request $request)
    {
        $data = $request->all();
        return $data;
    }

    public function search(Request $request)
    {
       
        // $this->validate($request, $this->rules);
        // $data = $this->getRequest($request);
        // dd($data);
        $communes = Commune::all();
        // $pdate_debut = date('Y-m-d', strtotime($data['pdate_debut']));
        // $pdate_fin = date('Y-m-d', strtotime($data['pdate_fin']));
        $commune_id = $request->commune_id;

        //dd($pdate_debut);

        // $appartements = Appartement::where('pdate_fin','>=',$pdate_fin)->where('pdate_debut','>=',$pdate_debut)
        //                                                                ->where('commune_id','=',$commune_id)
        //                                                                ->get();
         $appartements = Appartement::where('commune_id',$commune_id)->where('statut','verified')->get();
    
        // dd($appartements);
        
      
        $data1 = [
            'title'=>'Logez bien | votre Agence immobilière',
            'appartements'=>$appartements,
            'communes'=>$communes
        ];
        return view('frontend/resultat')->with($data1);
    }

    public function propriete(Request $request)
    {
          // $this->validate($request, $this->rules);
        // $data = $this->getRequest($request);
        // dd($data);
        $communes = Commune::all();
        // $pdate_debut = date('Y-m-d', strtotime($data['pdate_debut']));
        // $pdate_fin = date('Y-m-d', strtotime($data['pdate_fin']));
        $commune_id = $request->commune_id;

        //dd($pdate_debut);

        // $appartements = Appartement::where('pdate_fin','>=',$pdate_fin)->where('pdate_debut','>=',$pdate_debut)
        //                                                                ->where('commune_id','=',$commune_id)
        //                                                                ->get();
        $appartements = Appartement::where('etat','active')->orderBy('id')->get();
        $data1 = [
            'title'=>'Logez bien | votre Agence immobilière',
            'appartements'=>$appartements,
            'communes'=>$communes
        ];

        return view('frontend/propriete')->with($data1);
    }


    public function comment_marche($value='')
    {
       $title = 'Logez Bien | Bienvenue';
        $data = [
            'title'=>$title,
        ];
        return view('frontend/comment_marche')->with($data);
    }

    public function proprietaire($value='')
    {
        $title = 'Logez Bien | Bienvenue';
        $data = [
            'title'=>$title,
        ];
        return view('frontend/proprietaire')->with($data);
    }

    public function congratulations($value='')
    {
        $title = 'Logez Bien | Bienvenue';
        $data = [
            'title'=>$title,
        ];
        return view('frontend/congratulations')->with($data);
    }

    public function reservation($appartement_id)
    {
        $title = 'Logez Bien | Bienvenue';
        $appartement = Appartement::find($appartement_id);
        $imagefirst = Image::where('appartement_id','=',$appartement->id)->first();
        $reservation= Reservation::where('appartement_id',$appartement_id)->get();
        
        $data = [
            'title'=>$title,
            'appartement'=>$appartement,
            'imagefirst'=>$imagefirst,
            'reservation'=>$reservation
        ];
        return view('frontend/reservation')->with($data);
    }


    public function login()
    {
        $title = 'Logez Bien | Bienvenue';
        $data = [
            'title'=>$title,
        ]; 
        return view('frontend/login')->with($data);
    }
    public function properties_details($appartement_id)
    {
        $title = 'Logez Bien | Bienvenue';
        $appartement = Appartement::find($appartement_id);
        // dd($appartement);
        $imagefirst = Image::where('appartement_id',$appartement->id)->first();
        // dd($imagefirst);
        $images = Image::where('appartement_id','=',$appartement->id)->where('id','>=',$imagefirst->id)->get();
        //dd($images);
        $data = [
            'appartement'=>$appartement,
            'images'=>$images,
            'imagefirst'=>$imagefirst,
            'title'=>$title,
        ];
        return view('frontend/properties_details')->with($data);
    }


    public function register($appartement_id='')
    {
        $title = 'Logez Bien | Bienvenue';
        
        $data = [
           
            'title'=>$title,
        ];
        return view('frontend/register')->with($data);
    }

    // public function resultats($value='')
    // {
    //     $title = 'Logez Bien | Votre agence Immobilière';
    //     $appartements = Appartement::all();
    //     $data = [
    //         'title'=>$title,
    //         'appartements'=>$appartements
    //     ];
    //     return view('frontend/resultats')->with($data);
    // }
    
}
