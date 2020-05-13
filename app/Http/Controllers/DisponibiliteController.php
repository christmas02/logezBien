<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disponibilite;

class DisponibiliteController extends Controller
{
     protected $rules = [
       'date_debut'=>'required',
       'date_fin'=>'required'
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($appartement_id)
    {
        $title = 'Logez Bien | Administration ';
        $disponibilite = [];
        $data = [
            'title'=>$title,
            'disponibilite'=>$disponibilite,
            'appartement_id'=>$appartement_id,
        ];
        return view('disponibilite/create')->with($data);

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
        $data['date_debut']=date('Y-m-d', strtotime($data['date_debut']));
        $data['date_fin']=date('Y-m-d', strtotime($data['date_fin']));
        Disponibilite::create($data);
        return redirect('appartement')->with('message','la disponibilité de l\'arpartement a bien été renseigné');
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
    public function edit($id, $appartement_id)
    {
        $title = 'Logez Bien | Administration ';
        $disponibilite = Disponibilite::find($id);
        $data = [
            'appartement_id'=>$appartement_id,
            'title'=>$title,
            'disponibilite'=>$disponibilite
        ];
        return view('disponibilite/edit')->with($data);
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
        $data['date_debut']=date('Y-m-d', strtotime($data['date_debut']));
        $data['date_fin']=date('Y-m-d', strtotime($data['date_fin']));
        $disponibilite = Disponibilite::find($id);
        $disponibilite->update($data);
        return redirect('appartement')->with('message','la disponibilité de l\'arpartement a bien été modifié');
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
}
