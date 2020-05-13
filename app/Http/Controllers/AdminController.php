<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Appartement;
use App\reservation;
use App\User;

class AdminController extends Controller
{
    public function __construct($value='')
    {
       $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
       


        $nbre_appart = Appartement::all();
        $nbre_user = User::all();
        $nbre_reservation = Reservation::all();
        $data = [
            'title'=>'Logez Bien | Administration',
            'nbre_appart'=>$nbre_appart->count(),
            'nbre_user'=>$nbre_user->count(),
            'nbre_reservation'=>$nbre_reservation->count(),
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd,

            ];
        return view('Admin/index')->with($data);
    }


    public function updatenoti($id,DatabaseNotification $notification)
    {
        
        $noti= $notification::find($id);
            $noti->update(['read_at' => now()]);    
            return back();
        
    }
}
