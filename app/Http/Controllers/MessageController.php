<?php

namespace App\Http\Controllers;

use App\Models\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->authorize('messages.index');
      return view('admin.messages.index');
    }

    public function open(Message $message){
       $this->authorize('messages.open');
       $message->update(['read'=>true]);
       return view('admin.messages.open',compact('message'));
    }

    public function send(Request $request){
       Message::create([
          'nom' => $request->nom ,
          'email' => $request->email ,
          'phone' => $request->phone ,
          'message' => $request->message ,
       ]);

       return redirect()->back();
    }

   
    public function destroy(Message $message)
    {
      $message->delete() ;
      toast('Message supprime avec success','success') ;
      return redirect()->back();
    }
}
