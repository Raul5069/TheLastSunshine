<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\message;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessageController extends Controller
{
    public function NewMsg($id){
        if(Auth::check()){
            return view('new-msg',[
                'id' => $id
            ]);
        }else{
            return redirect('/');
        }
    }
    public function NewMsgData(Request $request){
        if(Auth::check()){
            $request->validate([
                'uzi' => 'required|min:5'
            ],[
                'required' => 'Nem lehet üres az üzenet',
                'min'      => 'Legalább 5 karaktert írj!'
            ]);
            $data               = new message;
            $data->senderid     = Auth::user()->id;
            $data->receiverid   = $request->receiverid;
            $data->message      = $request->uzi;
            $data->date         = date("Y-m-d");

            $data->prevmessage  = null;
            $data->status       = 'n';
            $data->Save();
            return redirect('/uzenetek');
        } else{
            return redirect('/');
        }
    }


    public function Uzenetek(){
        if(Auth::check()){
            return view('uzenetek',[
                'result' => message::select('users.name','users.id','messages.message',
                                            'messages.date','messages.status')
                                            ->join('users','users.id','messages.senderid')
                                            ->where('receiverid',Auth::user()->id)
                                            ->get()
            ]);
        } else{
            return redirect('/');
        }
    }

    public function MsgRead($id){
        if(Auth::check()){

            $userId1 = Auth::user()->id;
            $userId2 = $id;
            $messages = message::query()
            ->select('messages.*', 'sender.name as sender_name', 'receiver.name as receiver_name')
            ->leftJoin('users as sender', 'messages.senderid', '=', 'sender.id')
            ->leftJoin('users as receiver', 'messages.receiverid', '=', 'receiver.id')
            ->where(function ($query) use ($userId1, $userId2) {
        $query->where(function ($q) use ($userId1, $userId2) {
            $q->where('senderid', $userId1)
              ->where('receiverid', $userId2);
        })->orWhere(function ($q) use ($userId1, $userId2) {
            $q->where('senderid', $userId2)
              ->where('receiverid', $userId1);
        });
        $data = message::where(function($query) {
            $query->where('senderid','like', Auth::user()->id)
            ->orWhere('receiverid','like', Auth::user()->id);
        })->where(function ($query) use ($userId2) {
            $query->where('senderid','like', $userId2)
            ->orWhere('receiverid','like', $userId2);
        })->first();

        if ($data == null)
        return;

        $data->status = "o";
        $data->Save();

    })
    ->orderBy('messages.date', 'asc')
    ->get();

                return view('msg-read',[
                    'messages' => $messages,
                    'receiver' => $id
        ]);

        } else{
            return redirect('/');
        }
    }










    public function SendMessage(Request $request,$id){
        // dd(url()->current());
        if(Auth::check()){

            $request->validate([
                'uzi' => 'required|min:5'
            ],[
                'required' => 'Nem lehet üres az üzenet',
                'min'      => 'Legalább 5 karaktert írj!'
            ]);

            $data               = new message;
            $data->senderid     = Auth::user()->id;
            $data->receiverid   = $id;
            $data->message      = $request->uzi;
            $data->date         = date("Y-m-d");
            $data->status       = 'n';
            $data->Save();
            return redirect('/msg-read/'.$id);
        }
    }
}
