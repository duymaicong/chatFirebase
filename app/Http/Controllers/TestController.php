<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $database;

    public function __construct()
    {
        $this->database = FirebaseService::connect();
    }

    public function index()
    {
        return response()->json(['data' => $this->database->getReference('test/blogs')->getValue(), 'message' => 'Get data successful'], 200);
    }


    public function create(Request $request)
    {
        
        $newPostKey = $this->database->getReference('test/blogs/')->push()->getKey();
        $postData = [
            'key'       => $newPostKey ,
            'title'     => $request['title'],
            'content'   => $request['content'],
        ];
        $updates = [
            'test/blogs/' . $newPostKey => $postData,
        ];
        $this->database->getReference() // this is the root reference
            ->update($updates);

        return response()->json('blog has been created');
    }
   

    public function edit(Request $request)
    {
        return response()->json('blog has been edited');
    }

    public function delete(Request $request)
    {
        $this->database
            ->getReference('test/blogs/' . $request['key'])
            ->remove();

        return response()->json('blog has been deleted');
    }

    public function display(Request $request)
    {
        $data = $this->database->getReference('test/blogs')->getValue();
            return view('livewire.chats',['data'=>$data])->extends('layouts.app')
            ->section('content');
    }

    public function create_user (Request $request)
    {

        $newPostKey = $this->database->getReference('users/')->push()->getKey();
        $postData = [
            'name'      => $request['name'],
            'content'   => $request['content'],
        ];
        $updates = [
            'users/' . $newPostKey => $postData,
        ];
        $this->database->getReference() // this is the root reference
            ->update($updates);

        return response()->json('blog has been created');
    }
    
}
