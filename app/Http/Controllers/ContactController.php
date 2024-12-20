<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        //
        $my_name = "kone hadou";
        var_dump($my_name);
    }

    /**
     * Store a newly created resource in storage.
     * @date : 19-12-2024 22:52
    */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ],[
            'name.required'=>'the name is require',
            'email.required'=>'your e-mail is require',
            'message.required'=>'message must be null'
        ]);

        // Enregistrer dans la base de données
        $contact = Contact::create($validatedData);
        if(!$contact){
            return response()->json([
                'message'=>'impossible de créer',
                'data'=>$contact,
                'status'=>400
            ]);
        }
        // // Envoyer l'email
        Mail::to(['konehadou0201@gmail.com', 'hadoukone0102@gmail.com'])
        ->send(new ContactMail($validatedData));

        return response()->json([
            'message' => 'Votre message a été envoyé avec succès !',
            'data' => $contact,
            'status' => true,
            'code' => 200
        ], 200);
    }

    /**
     * Display the specified resource.
    */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
