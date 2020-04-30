@extends('back.products.template')

@section('form-open')
    <form method="post" action="{{ route('products.store') }}">
                    {{ csrf_field() }}
@endsection