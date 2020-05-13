<?php

namespace App\Http\Controllers;
   
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AnnonceAccepted;
use App\Notifications\AnnonceAcceptedonline;

use Illuminate\Http\Request;
use App\Appartement;
use App\Disponibilite;
use App\Commune;
use App\Image;
use App\User;
use Illuminate\Auth\AuthManager;

class AppartementController extends Controller
{
     protected $rules = [
       'commune_id'=>'required',
       'user_id'=>'required',
       'ref'=>'required',
       'designation'=>'required',
       'superficie'=>'required',
       'salon'=>'required',
       'chambre'=>'required',
       'salle_eau'=>'required',
       'type'=>'required',
       'montant_journalier'=> 'required'
    ];
    
    public function __construct($value='')
    {
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 1000;
        $appartements = Appartement::orderBy('created_at','desc')->paginate();
        //dd($appartements);
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');    
        $data = [
            'title'=>'Logez bien | Appartements',
            'appartements'=>$appartements,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd,
        ];
        return view('appartement/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $appartement = [];
         $communes = Commune::pluck('libelle','id');
         //dd($communes);
         $user= $request->user();
         $notificationAdds= $user->unreadNotifications();
         $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
         $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
       
         $selected = ''; 
         $data = [
            'title' => 'Logez bien | Appartement',
            'appartement' => $appartement,
            'communes' => $communes,
            'selected'=> $selected,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd,
        ];
        return view('appartement/create')->with($data); 
    }

    private function getRequest(Request $request)
    {
        $data = $request->all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $data = $this->getRequest($request);
        Appartement::create($data);
        return redirect('appartement')->with('message','Votre Appartement à bien été posté');
    }



    public function desactived (Request $request, $id)
    {
        $appart= Appartement::find($id);
    if($request->has('statut'))
    { 
        $appart->statut = $request->statut;
        $appart->etat = $request->etat;
    }
    $appart->save();
    return back();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $appartement = Appartement::find($id);
        $images = Image::where('appartement_id',$appartement->id)->get();
        //dd($images);
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
      
        $title = 'Logez bien | Appartement';
        $data = [
            'title'=>$title,
            'appartement'=>$appartement,
            'images'=>$images,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd,
        ];
        return view('appartement/show')->with($data);
    }
    
    public function saved (Request $request, $id)
    {
        $appart= Appartement::find($id);
        $user= User::find($appart->user_id);
    if($request->has('statut'))
    { 
        $appart->statut = $request->statut;
        $appart->etat = $request->etat;
    }
    $user->notify(new AnnonceAccepted($request->statut));
    $user->notify(new AnnonceAcceptedonline($request->libelle));
    $appart->save();
    return back();
}
public function reserved (Request $request, $id)
{
    $appart= Appartement::find($id);
if($request->has('etat'))
{ 
    $appart->etat = $request->etat;
}
$appart->save();
return back();
}

public function expirer (Request $request, $id)
{
    $appart= Appartement::find($id);
if($request->has('etat'))
{ 
    $appart->etat = $request->etat;
}
$appart->save();
return back();
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request,$id)
    {
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
        
              $appartement = Appartement::find($id);
         $communes = Commune::pluck('libelle','id');
         $selected = '';
          foreach ($communes as $key => $value) {
            if ($key == $appartement->commune_id) {
                $selected= $key; 
            }
        }

         $data = [
            'title'=>'Logez bien | appartement',
            'appartement'=>$appartement,
            'communes'=>$communes,
            'selected'=>$selected,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd,
        ];
        return view('appartement/edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');

        $this->validate($request, $this->rules);
        $data = $this->getRequest($request);
        
        $appartement = Appartement::find($id);
        $appartement->update($data);
        return redirect('Dashboard-administration/appartement/'.$id)->with('message','l\'appartement a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user= $request->user();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $appartement = Appartement::find($id);
        $appartement->delete();
        return redirect('Dashboard-administration/appartement')->with('message','Cet appartement a bien été suprimer');
    }
}
