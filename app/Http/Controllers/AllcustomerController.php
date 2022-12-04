<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AllcustomerController extends Controller
{
    public function AllCust(){


        $data = DB::table('customers')

        ->join('films','customers.film_id','=','films.id')
        ->join('payments', 'customers.payment_id','=','payments.id')
        ->select('customers.nama', 'customers.email','customers.noTelepon','films.namaFilm', 'payments.jenispembayaran')
        ->latest('customers.created_at')->paginate(5);
        
        return view('allcustomers', compact('data'));
    }
}
