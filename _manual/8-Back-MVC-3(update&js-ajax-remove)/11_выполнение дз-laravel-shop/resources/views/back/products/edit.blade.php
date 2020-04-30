@extends('back.products.template')

@section('form-open')
    <form method="post" action="{{ route('products.update', $product->id) }}">
                     {{ csrf_field() }}
                 {{ method_field('PUT') }}                     
@endsection
