<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class MetierController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('metier', compact('services'));
    }
}
