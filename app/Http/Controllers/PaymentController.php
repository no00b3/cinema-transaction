<?php

namespace App\Http\Controllers;

use App\Models\payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request){
        if($request->has('search')){
            $datapayment = payment::where('namaFilm','LIKE','%'.$request->search.'%')->paginate(5);
   
        }else{
            $datapayment = payment::paginate(5);

        }

        return view('payment', compact('datapayment'));

        $datapayment = datapayment::paginate(5);
        return view('payment', compact('datapayment'));
    }
    
    public function tambahdatapayment(){
        return view('tambahdatapayment');
    }

    public function insertdatapayment(Request $request){
        payment::create($request->all());
        return redirect() -> route('payment')-> with('success', 'Data berhasil ditambahkan');
    }

    public function tampilkandatapayment($id){

        $datapayment = payment::find($id);
        return view('tampildatapayment', compact('datapayment'));
    }

    public function updatedatapayment(Request $request, $id){
        $datapayment = payment::find($id);
        $datapayment -> update($request->all());
        return redirect() -> route('payment')-> with('success', 'Data berhasil diupdate');

    }

    public function deletepayment($id){
        $datapayment = payment::find($id);
        $datapayment -> delete();
        return redirect() -> route('payment')-> with('success', 'Data berhasil dihapus');

    }
}
