<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class DashboardController extends Controller
{
    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        $totalKonsul = $reference = $this->database->getReference('konsultasi')->getSnapshot()->numChildren();
        $totalJanjiTemu = $reference = $this->database->getReference('booking_appointments')->getSnapshot()->numChildren();
        $totalOwner = $reference = $this->database->getReference('users')->getSnapshot()->numChildren();
        $totaldrh = $reference = $this->database->getReference('drh')->getSnapshot()->numChildren();

        return view('home', compact('totalKonsul','totalJanjiTemu','totalOwner','totaldrh'));
    }
}
