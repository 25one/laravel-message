@extends('front.messages.template')

@section('form-open')
    <form method="post" action="{{ route('newmessages.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }}   
@endsection