@extends('front.messages.restmessages.template')

@section('form-open')
    <form method="post" action="{{ route('restmessages.update', [$message->id]) }}">
                     {{ csrf_field() }}
                  {{ method_field('PUT') }}   
@endsection
