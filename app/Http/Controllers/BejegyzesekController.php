<?php

namespace App\Http\Controllers;

use App\Models\Bejegyzesek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BejegyzesekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bejegyzesek = Bejegyzesek::all();
        return $bejegyzesek;
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
        $bejegyzes = new Bejegyzesek();
        $bejegyzes->tevekenyseg_id = $request->tevekenyseg_id;
        $bejegyzes->osztaly_id = $request->osztaly_id;
        $bejegyzes->allapot = $request->allapot;
        $bejegyzes->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bejegyzesek  $bejegyzesek
     * @return \Illuminate\Http\Response
     */
    public function show($bejegyzesekId)
    {
        $bejegyzes = Bejegyzesek::find($bejegyzesekId);
        return $bejegyzes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bejegyzesek  $bejegyzesek
     * @return \Illuminate\Http\Response
     */
    public function edit(Bejegyzesek $bejegyzesek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bejegyzesek  $bejegyzesek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bejegyzesId)
    {
        $bejegyzes = Bejegyzesek::find($bejegyzesId);
        $bejegyzes->allapot = $request->allapot;
        $bejegyzes->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bejegyzesek  $bejegyzesek
     * @return \Illuminate\Http\Response
     */
    public function destroy($bejegyzesekId)
    {
        $bejegyzes = Bejegyzesek::find($bejegyzesekId);
        $bejegyzes->delete();
    }

    public function expandOsztaly(){
        $bejegyzes = Bejegyzesek::with('osztaly')->get();
        return $bejegyzes;
    }

    public function expand(){
        $bejegyzes = Bejegyzesek::with('osztaly')->with('tevekenyseg')->get();
        return $bejegyzes;
    }

    public function sortByTevekenyseg(Request $request)
    {
        $column = $request->_sort;
        if ($request->has('_order')){
            $order = $request->_order;
            $bejegyzes = Bejegyzesek::select('bejegyzesek.id','bejegyzesek.osztaly_id','bejegyzesek.tevekenyseg_id','bejegyzesek.allapot')
            ->join('tevekenyseg','bejegyzesek.tevekenyseg_id','=','tevekenyseg.id')
            ->orderBy($column, $order)->with('osztaly')->with('tevekenyseg')->get();
        }
        else{
            $bejegyzes = Bejegyzesek::select('bejegyzesek.id','bejegyzesek.osztaly_id','bejegyzesek.tevekenyseg_id','bejegyzesek.allapot')
            ->join('tevekenyseg','bejegyzesek.tevekenyseg_id','=','tevekenyseg.id')
            ->orderBy($column)->with('osztaly')->with('tevekenyseg')->get();
        }
        return $bejegyzes;
    }

    public function filterByOsztaly(){
        $bejegyzes = Bejegyzesek::selectRaw('sum(tevekenyseg.pontszam) as pontszam, osztaly.nev as osztaly')
        ->join('tevekenyseg','bejegyzesek.tevekenyseg_id','=','tevekenyseg.id')
        ->join('osztaly','bejegyzesek.osztaly_id','=','osztaly.id')
        ->groupBy('osztaly.nev')->get();
        return $bejegyzes;
    }

    public function filterByOsztalyId($osztalyId){
        $bejegyzes = Bejegyzesek::selectRaw('sum(tevekenyseg.pontszam) as pontszam')
        ->join('tevekenyseg','bejegyzesek.tevekenyseg_id','=','tevekenyseg.id')
        ->groupBy('osztaly_id')->having('osztaly_id','=',$osztalyId)->get();
        return $bejegyzes->first();
    }

    public function userBejegyzes(){
        $user = Auth::user();
        $bejegyzesek = Bejegyzesek::with('osztaly')->with('tevekenyseg')->where('osztaly_id','=',$user->osztaly_id)->where('allapot','=','jóváhagyásra vár')->get();
        return $bejegyzesek;
    }


}
