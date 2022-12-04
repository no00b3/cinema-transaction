<?php

namespace App\Http\Controllers;

use App\Models\film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function film(Request $request){
        if($request->has('searchfilm')){
            $datafilm = film::where('namaFilm','LIKE','%'.$request->searchfilm.'%')->paginate(5);
   
        }else{
            $datafilm = film::paginate(5);

        }

        return view('film', compact('datafilm'));

        $datafilm = film::paginate(5);
        return view('film', compact('datafilm'));
    }

    public function tambahdatafilm(){
        return view('tambahdatafilm');
    }

    public function insertdatafilm(Request $request){
        film::create($request->all());
        return redirect() -> route('film')-> with('success', 'Data berhasil ditambahkan');
    }
    public function tampilkandatafilm($id){

        $datafilm = film::find($id);
        return view('tampildatafilm', compact('datafilm'));
    }
    
    public function updatedataFilm(Request $request, $id){
        $datafilm = film::find($id);
        $datafilm -> update($request->all());
        return redirect() -> route('film')-> with('success', 'Data berhasil diupdate');

    }

    public function softdeletefilm($id){

        film::find($id)->delete();

        return back();
    }

    public function forcedeletefilm($id){

        film::find($id)->forceDelete();


        return back();

    }

    public function trashedfilm(){

        $datafilm = film::onlyTrashed()->get();


        return view('trashfilm', compact('datafilm'));
    }

    public function restorefilm($id){

        film::whereId($id)->restore();

        return back();


    }
}







