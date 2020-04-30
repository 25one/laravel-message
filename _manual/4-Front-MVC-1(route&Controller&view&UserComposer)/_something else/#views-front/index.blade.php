@extends('front.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
@endsection

@section('main')

<h3>Home</h3>

@php
//print_r($cards);
//print_r($types);
@endphp

<div class="row margin">
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="type" class="size">Select type of card</label>
            <select class="form-control input-size" style="height: auto;" name="type_id" id="type_id">
                <option value="0" class="input-size" 
                   >-----</option> 
                @foreach($types as $type)
                <option value="{{$type->id}}" class="input-size" 
                   >{{$type->name}}</option>                 
                @endforeach                              
            </select>
        </div>
    </div>
</div>   

<!-- brick-wrapper -->
<div class="bricks-wrapper">

    <div id="pannel">
       @include('front.brick-standard')
    </div>   

</div>

@endsection

@section('js')
    <script src="{{ asset('public/js/mine.js') }}"></script>
    <script>
       $(document).ready(function(){
          $('#type_id').change(function(){
             BaseRecord.typeSelect($(this).val(), '/');
          });
       });
    </script>
@endsection    
