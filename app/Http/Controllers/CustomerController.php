<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    //

    // public function AllCust(){


    //     $customers = DB::table('customers')

    //     ->join('films','customers.film_id','=','films.id')
    //     ->join('payments', 'customers.payment_id','=','payments.id')
    //     ->select('customers.nama', 'customers.email','customers.noTelepon','films.namaFilm', 'payments.jenispembayaran')
    //     ->latest('customers.created_at')->paginate(5);
        
    //     return view('allcustomers', compact('customers'));
    // }

    public function index(Request $request){
        if($request->has('search')){
            $data = Customer::where('nama','LIKE','%'.$request->search.'%')->paginate(5);
   
        }else{
            $data = Customer::paginate(5);

        }

        return view('customers', compact('data'));

        $data = Customer::paginate(5);
        return view('customers', compact('data'));
    }

    public function tambahdata(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        Customer::create($request->all());
        return redirect() -> route('customers')-> with('success', 'Data berhasil ditambahkan');
    }

    public function tampilkandata($id){

        $data = Customer::find($id);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Customer::find($id);
        $data -> update($request->all());
        return redirect() -> route('customers')-> with('success', 'Data berhasil diupdate');

    }

    public function softDelete($id){

        Customer::find($id)->delete();

        return back();
    }

    public function trashed(){

        $data = Customer::onlyTrashed()->get();


        return view('trashcustomer', compact('data'));
    }

    public function restore($id){

        Customer::whereId($id)->restore();

        return back();


    }

    public function forceDelete($id){

        Customer::find($id)->forceDelete();


        return back();

    }
}
