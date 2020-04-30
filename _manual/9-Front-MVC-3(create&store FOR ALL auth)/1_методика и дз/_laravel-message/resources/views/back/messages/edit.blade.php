@extends('back.messages.template')

@section('form-open')
    <form method="post" action="{{ route('messages.update', [$message->id]) }}">
                     {{ csrf_field() }}
                  {{ method_field('PUT') }}   
@endsection
