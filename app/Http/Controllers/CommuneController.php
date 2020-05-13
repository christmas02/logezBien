<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Commune;

class CommuneController extends Controller
{
      protected $rules = [
       'libelle'=>'required'
    ];

    public function __construct($value='')
    {
        # code...
    }
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
        $communes = Commune::orderBy('created_at','desc')->paginate();
        //dd($communes);
        $data = [
            'title'=>'Logez bien | Commune',
            'communes'=>$communes,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd,
        ];
        return view('commune/index')->with($data);
    }

    private function getRequest(Request $request)
    {
        $data = $request->all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');    
             $commune = [];
         $data = [
            'title'=>'Logez bien | Commune',
            'commune'=>$commune,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd,
        ];
        return view('commune/create')->with($data); 
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
        Commune::create($data);
        return redirect('Dashboard-administration/commune')->with('message','Votre Commune à bien été posté');
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
    public function edit($id, Request $request)
    {
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
                 $commune = Commune::find($id);
         //dd($commune);
         $data = [
            'title'=>'Logez bien | Commune',
            'commune'=>$commune,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd,
        ];
        return view('commune/edit')->with($data);
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
        $this->validate($request, $this->rules);
        $data = $this->getRequest($request);
        $commune = Commune::find($id);
        $commune->update($data);
       
        return redirect('Dashboard-administration/commune')->with('message','la commune a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commune = Commune::find($id);
        $commune->delete();
        return redirect('Dashboard-administration/commune')->with('message','Cette commune a bien été suprimer');
    }
}
