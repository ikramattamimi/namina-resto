<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pendingAndProses(){
        return view('order/pending-and-proses');
    }

    public function dibayar(){
        return view('order/dibayar');
    }

    public function dibatalkan(){
        return view('order/dibatalkan');
    }

    public function detail(){
        return view('order/detail');
    }
}
