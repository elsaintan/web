<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Factory;
use Session;

class VetControllr extends Controller
{

    private $database;

    public function __construct()
    {
        $this->middleware('auth');
        $this->database = \App\Services\FirebaseService::connect();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drh = $this->database->getReference('drh')->getValue();
        return view('dashboard.drh.index', compact('drh'));
        //return $drh;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.drh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factory = (new Factory)
        ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
        ->withDatabaseUri(env("FIREBASE_DATABASE_URL"));

        $auth = $factory->createAuth();

        $user = $auth->createUser([
            'email' => $request['email'],
            'password' => $request['nama'],
        ]);

        //
        $request->validate([
            'image' => 'required',
        ]);
        $input = $request->all();
        $image = $request->file('image'); //image file from frontend

        $firebase_storage_path = 'Images/';
        $name     = $user->uid;
        $localfolder = public_path('firebase-temp-uploads') .'/';
        $extension = $image->getClientOriginalExtension();
        $file      = $name. '.' . $extension;
        if ($image->move($localfolder, $file)) {
            $uploadedfile = fopen($localfolder.$file, 'r');
            app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
            //will remove from local laravel folder
            unlink($localfolder . $file);
        }

        $imageReference = app('firebase.storage')->getBucket()->object("Images/".$file);
        $expiresAt = new \DateTime('tomorrow');

        $this->database
        ->getReference('drh/'.$user->uid)
        ->set([
            'Name' => $request['nama'],
            'Contact' => $request['kontak'],
            'SIP' => $request['sip'],
            'STR' => $request['str'],
            'WorkExp' => $request['pengalaman'],
            'alamat' => $request['alamat'],
            'id' => $user->uid,
            'email' => $request['email'],
            'harga' => $request['harga'],
            'tempat' => $request['tempat_praktik'],
            'booking' => " ",
            'photoProfile' => $imageReference->signedUrl($expiresAt),
            'status' => "0",
        ]);

        return redirect('/dashboard/dokter-hewan')->with('success', 'Data has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $value = $this->database->getReference('drh/'.$id)->getValue();
        return view('dashboard.drh.edit', compact('value'));

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
        $this->database->getReference('drh/' . $request['id'])
        ->update([
            'Name/' => $request['nama'],
            'Contact/' => $request['kontak'],
            'SIP/' => $request['SIP'],
            'STR/' => $request['STR'],
            'WorkExp/' => $request['pengalaman'],
            'alamat/' => $request['alamat'],
            'email/' => $request['email'],
            'harga/' => $request['harga'],
            'tempat/' => $request['tempat_praktik'],

        ]);

        return redirect('/dashboard/dokter-hewan')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factory = (new Factory)
        ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
        ->withDatabaseUri(env("FIREBASE_DATABASE_URL"));

        $auth = $factory->createAuth();

        $update = $auth->disableUser($id);

        return redirect('/dashboard/dokter-hewan')->with('success', 'Account has been disabled!');
    }
}
