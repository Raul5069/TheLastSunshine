<link rel="stylesheet" href="{{ asset('css/messages.css') }}">
@extends('chatlayout')
@section('chatcontent')
    <div class="chat-content shadow">
        <div class="d-flex justify-content-center h-100">
            <div class="main">
                <div class="px-2 scroll">




                    @foreach ($messages as $message)
                        @if ($message->senderid == Auth::user()->id)
                            <div class="d-flex align-items-center text-right justify-content-end ">
                                <div class="pr-2 message-box"> <span class="name">{{ $message->sender_name }}</span>
                                    <p class="msg self">{{ $message->message }}</p>
                                </div>
                            </div>
                        @else
                            <div class="d-flex align-items-center">
                                <div class="pr-2 pl-1 message-box"> <span class="name">{{ $message->sender_name }}</span>
                                    <p class="msg guest">{{ $message->message }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <form action="/send/{{ $receiver }}" method="POST">
                    @csrf
                    <div class="bg-white d-flex align-items-center mt-4">
                        <input type="text" name="uzi" class="mx-2 form-control" placeholder="Type a message...">
                        <button type="submit" class="button"> <i class="fa fa-arrow-circle-right icon2"></i></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
