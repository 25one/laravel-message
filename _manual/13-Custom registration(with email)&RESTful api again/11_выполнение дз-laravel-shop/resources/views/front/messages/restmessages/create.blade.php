@extends('front.messages.restmessages.template')

@section('form-open')
    <form method="post" action="{{ route('restmessages.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }}   
@endsection