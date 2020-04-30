@extends('front.layout')

@section('main')

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">

@php
//print_r($products);
@endphp
            
            <div class="amado-pro-catagory clearfix">

               @include('front.brick-standard')

            </div>
        </div>
        <!-- Product Catagories Area End -->

@endsection

@section('js')
<!-- <script src="{{ asset('public/js/main.js') }}"></script> -->
<script>
$(document).ready(function(){
   $('.button_search').click(function(){
   	  BaseRecord.search($('#search').val());
   });
});   
</script>
@endsection