<?php

namespace App\Http\Controllers\Publication_Group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Publication;
use App\InvestigationGroup;
use App\User;
use App\Researcher;

class Publication_GroupController extends Controller
{
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user() != null){
            $currentUser = User::find(Auth::user()->id);
        }else{ $currentUser = null; }
        $publications = Publication::orderBy('id','ASC')->get();
        $ids = InvestigationGroup::find($id)->researchers()->pluck('researcher_id');
        $researchers = array();
        foreach ($ids as $clave => $valor) {
            $researcher = Researcher::find($valor);
            $researchers[$researcher->id] = $researcher;
        }
        return view('publication_group.show', compact('publications','currentUser','researchers','id'));
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
}
