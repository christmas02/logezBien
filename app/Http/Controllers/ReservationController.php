<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;;
use App\Notifications\ReservationAdd;
use App\Notifications\newReservation;
use App\Notifications\AnnonceAcceptedonline;
use Illuminate\Http\Request;
use App\Reservation;
use App\Appartement;
use App\User;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
       protected $rules = [
       'nom_prenoms'=>'required',
       'email'=>'required',
       'nbre_personnes'=>'required|integer',
       'genre'=>'required',
       'phone'=>'required',
       'pdate_fin'=> 'required',
       'pdate_debut'=>'required'
    ];

   
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
        
        $limit = 1000;
        $reservations = Reservation::orderBy('created_at','desc')->paginate();
        //dd($communes);
        $data = [
            'title'=>'Logez bien | Reservations',
            'reservations'=>$reservations,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd, 
        ];
        return view('reservations/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    private function getRequest(Request $request)
    {
        $data = $request->all();
        $date_naiss = $data['date_naissance'];
        $data['date_naissance'] = date('Y-m-d', strtotime($date_naiss));
        $pdate_debut = $data['pdate_debut'];
        $data['pdate_debut'] = date('Y-m-d', strtotime($pdate_debut));
        $pdate_fin = $data['pdate_fin'];
        $data['pdate_fin'] = date('Y-m-d', strtotime($pdate_fin));
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
        $appart= Appartement::find($request->appartement_id);
        $user= User::Join('appartements','appartements.user_id','=','users.id')->where('appartements.id',$appart->id)->get();
        $data = $this->getRequest($request);
        Notification::send(User::whereRole('admin')->first(), new newReservation($request->nom_prenoms));
        Notification::send($user, new newReservation($request->nom_prenoms));
        Notification::send(User::whereRole('admin')->first(), new ReservationAdd($request->nom_prenoms));
        Notification::send($user, new ReservationAdd($request->nom_prenoms));
        Reservation::create($data);
        return redirect('congratulations')->with('message','Votre réservation à bien été éffectué nous vous contacterons pour la confirmation');
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
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return back();
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
   
}
