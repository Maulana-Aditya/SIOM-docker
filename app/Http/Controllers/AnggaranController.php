<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    public function index()
    {
        return view('anggaran.index');
    }
}
