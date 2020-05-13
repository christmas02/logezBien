<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\User;
use App\Reservation;
use Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $lastReservation = Reservation::where('email',$request->user()->email)->Join('appartements','appartements.id','=','reservations.appartement_id')->latest('reservations.idReservation')->first();
        $reservations= Reservation::where('email',$request->user()->email)->join('appartements','appartements.id','=','reservations.appartement_id')->orderBy('reservations.idReservation')->get();
    foreach ($reservations as $reservation)
    {
        $user= Auth::user($reservation->user_id);
    }
  
    return view('user.reserve',compact('reservations','user'));

        
     
        return view('user.dashboard');
    }
public function reserve(Request $request)
{
    $reservations= Reservation::where('email',$request->user()->email)->join('appartements','appartements.id','=','reservations.appartement_id')->orderBy('reservations.idReservation')->get();
    foreach ($reservations as $reservation)
    {
        $user= Auth::user($reservation->user_id);
    }
  
    return view('user.reserve',compact('reservations','user'));
    
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)

    {
        $users= $request->user();
        $notificationAdds= $users->unreadNotifications();
        $notificationAdd= $users->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $users->unreadNotifications->where('type','App\Notifications\newReservation');
                    $user = User::orderBy('created_at','desc');
        $role = ['admin','proprietaire'];
        $data =[
            'title'=>'Logez bien | Image',
            'selected'=>'',
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd, 
        ];
        return view('user.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $user= new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();
        return redirect('user.index')->with('success','vous avez créer un nouveau proprietaire');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function listePro(Request $request)
    {
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');    
            $limit = 95;
        $title = 'Logez bien | Administration';
        $data = [
            'title'=>$title,
            'users'=>User::orderBy('created_at','desc')->where('role', 'proprietaire')->paginate($limit),
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd, 
        ];
        return view('user.index')->with($data);

    }
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
    public function delete($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return back();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();

    }
}
