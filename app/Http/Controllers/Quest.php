<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;

class Quest extends Controller
{
    public $database;


    public function __construct()
    {
        $this->database = FirebaseService::connect();
    }
    /**
     * create question
     */

    public function create_quest (Request $request){

        $newPostKey = $this->database->getReference('question/')->push()->getKey();

        $postData = [
            'key'               => $newPostKey ,
            'question'          => $request['question'],
            'description'       => $request['description'],
            'answer'            => $request['answer'],
            'time'              => $request['time'],
        ];

        $updates = [
            'question/' . $newPostKey => $postData,
        ];
        $this->database->getReference() // this is the root reference
            ->update($updates);

        return response()->json(['message'=>'create question successful'],200);
    }

    /**
     * list quest
     */


    public function list_quest (){

        return response()->json(['data' => $this->database->getReference('question')->getValue(), 'message' => 'Get data successful'], 200);
    }

    /**
     * update index
     */

    public function update_index (Request $request){
        $updates = [
            'index/'=> $request['index'],
        ];
        $this->database->getReference() // this is the root reference
            ->update($updates);


        return response()->json(['message' => 'update index successful'],201);
    }
}
