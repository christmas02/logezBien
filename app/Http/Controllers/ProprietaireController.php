<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;
use App\Notifications\annonceAdd;
use App\Notifications\annonceAdds;
use App\Notifications\annonceAddDatabase;
use Illuminate\Http\Request;
use App\Appartement;
use App\Disponibilite;
use App\Commune;
use App\Image;
use App\User;
use Auth;
use App\reservation;
class ProprietaireController extends Controller
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
        $nbre_appart = Appartement::where('user_id',Auth::user()->id)->count();
        $nbre_apparts = Appartement::where('user_id',Auth::user()->id)->get();
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAccepted');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
                    $nbre_reservation = Reservation::where('appartement_id',$nbre_apparts->find('id'));

        $data = [
            'title'=>'Logez Bien | Administration',
            'nbre_appart'=>$nbre_appart,
            'nbre_reservation'=>$nbre_reservation->count(),
            'nbre_reservation'=>$nbre_reservation->count(),
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd,
            ];
        return view('proprietaire.index')->with($data);
    }

public function ListAppart(Request $request)
{
    $limit = 1000;
    $appartements = Appartement::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate();
    //dd($appartements);
    $user= $request->user();
    $notificationAdds= $user->unreadNotifications();
    $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAccepted');
    $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
        $data = [
        'title'=>'Logez bien | Appartements',
        'appartements'=>$appartements,
        'notificationAdds'=>$notificationAdds->count(),
        'notificationAdd'=>$notificationAdd,
        'notificationAd'=>$notificationAd,
    ];
    return view('proprietaire.appartement')->with($data);
}

public function add(Request $request)
{
        $appartement = [];
        $communes = Commune::pluck('libelle','id');
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();

        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAccepted');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
             //dd($communes);
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
    return view('proprietaire.create')->with($data); 
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
    
    $request->user()->notify(new AnnonceAdds($request->user()->name));
    Notification::send(User::whereRole('admin')->first(), new AnnonceAdd($request->user()->name));
    Notification::send(User::whereRole('admin')->first(), new annonceAddDatabase($request->libelle));
    return redirect('Dashboard-Proprietaire/Liste_Apparts')->with('message','Votre Appartement à bien été posté');
}

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ListeReservation(Request $request)
    {
        $limit = 1000;
        $reservations = Reservation::join('appartements','appartements.id','=','reservations.appartement_id')->where('appartements.user_id',Auth::user()->id)->orderBy('reservations.created_at','desc')->paginate();
        //dd($communes);
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();

        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAccepted');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
                $data = [
            'title'=>'Logez bien | Reservations',
            'reservations'=>$reservations,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd,
        ];
        return view('proprietaire.reservation')->with($data);
    }


    public function updatenoti($id,DatabaseNotification $notification)
    {
        
        $noti= $notification::find($id);
            $noti->update(['read_at' => now()]);    
            return back();
        
    }
}
