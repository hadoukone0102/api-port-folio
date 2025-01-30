<?php

namespace App\Http\Controllers;

use App\Models\second_test;
use App\Http\Controllers\Controller;
use App\Http\Requests\Updatesecond_testRequest;
use Illuminate\Http\Request;
class SecondTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          //
          $All_message = second_test::get();
          return response()->json([
               "message"=>"La liste à été recupérer avec succès",
               "data"=>$All_message,
               "status"=>true,
               "code"=>200
          ],200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
          // Validation des données
          $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required|string',
          ]);

        // Enregistrer dans la base de données
        $test = second_test::create($validatedData);
        if($test){
        return response()->json([
            'data'=>$test,
            "status"=>true,
            "code"=>200
        ]);
    }else{
        return response()->json([
            "code" => 0000,
        ]);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(second_test $second_test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(second_test $second_test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $user = second_test::findOrFail($id);
        $user->update($request->only('desc'));
        return response()->json([
            'message' =>"Mise à jour effectuer avec succès",
            'data'=>$user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        //
        $del= second_test::findOrFail($id);
        if(!$del){
            return response()->json([
                'status'=>0,
                'message'=>'Introuvable',
            ], 404);
        }
        $result = $del->delete();
        if($result){
            return response()->json([
                'status' => 1,
                'message' => 'user supprimée avec succès'
            ], 200);
        }
    }
}
