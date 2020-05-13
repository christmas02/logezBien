<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImagesController extends Controller
{
     protected $rules = [
        'name'=>'required',
        'appartement_id'=>'required',
        'filename'=>['mimes:jpg,jpeg,png,gif,bmp']
    ];

     protected $upload_dir = 'public/images';

     public function __construct()
     {
        //$this->middleware('auth');
        $this->upload_dir = base_path().'/'.$this->upload_dir;
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
        $title= 'Logez bien | Image';
        $data = [
            'title'=>$title,
            'images'=>Image::orderBy('created_at','desc')->paginate($limit),
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd, 
            
        ];
        return view('image/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($value='', Request $request)
    {
        $user= $request->user();
        $notificationAdds= $user->unreadNotifications();
        $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
        $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
                 $image = [];
         $appartement_id = $value;
         
         $data = [
            'title'=>'Logez bien | Image',
            'image'=>$image,
            'appartement_id'=>$appartement_id,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd, 
        ];
        //dd($appartement_id);
        return view('image/create')->with($data); 
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
        //dd($data);
        Image::create($data);
        return redirect('Dashboard-administration/appartement/'.$request->appartement_id)->with('message','Votre image à bien été posté');
    }

    private function getRequest(Request $request)
    {
        if ($request->hasFile('filename')) {
        
            $image = $request->file('filename');
            $fileName = time().'_'.$image->getClientOriginalName();
            $destination =  $this->upload_dir;
            $image->move($destination, $fileName); 
            $data = $request->all();
            $data['filename'] = $fileName;
            }else{
            $fileName = '';
            $data = $request->all();
            $data['filename'] =  $fileName;
           }
        return $data;
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
    public function edit($id, $appartement_id, Request $request)
    {
         $image = Image::find($id);
         $user= $request->user();
         $notificationAdds= $user->unreadNotifications();
         $notificationAdd= $user->unreadNotifications->where('type','App\Notifications\AnnonceAddDatabase');
         $notificationAd= $user->unreadNotifications->where('type','App\Notifications\newReservation');
                  $data = [
            'title'=>'Logez bien | Image',
            'image'=>$image,
            'appartement_id'=>$appartement_id,
            'notificationAdds'=>$notificationAdds->count(),
            'notificationAdd'=>$notificationAdd,
            'notificationAd'=>$notificationAd, 
        ];
        return view('image/edit')->with($data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $appartement_id)
    {
        $this->validate($request, $this->rules);
        $data = $this->getRequest($request);
        $image = Image::find($id);
        if (empty($data['filename'])) {
            $data['filename']= $image->filename;
        }
        $image->update($data);
        return redirect('Dashboard-administration/appartement/'.$appartement_id)->with('message','Votre image à bien été modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $appartement_id)
    {
        $image = Image::find($id);
        $this->removeImage($image->filename);
        $image->delete();
        return redirect('Dashboard-administration/appartement/'.$appartement_id)->with('message','Cette image a bien été suprimer');
    }

    private function removeImage($image)
    {
        if (! empty($image) && $image != 'default.png') {
            $file_path = $this->upload_dir.'/'.$image;

            if(file_exists($file_path)) unlink($file_path);
        }
    }

}
