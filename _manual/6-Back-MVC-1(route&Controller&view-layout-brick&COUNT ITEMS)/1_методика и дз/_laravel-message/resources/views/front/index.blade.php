@extends('front.layout')

@section('css')

@endsection

@section('main')

@php
//print_r($messages);
//print_r($users);
@endphp

<div class="row margin">
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="type" class="size">Select messages of user</label>
            <select class="form-control input-size" style="height: auto;" name="user_id" id="user_id">
                <option value="0" class="input-size" 
                   >-----</option> 
                @foreach($users as $user)
                   <option value="{{$user->id}}">{{$user->name}}</option>
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
      $('#user_id').change(function(){
         BaseRecord.userSelect($(this).val());
      });
   });
</script>
@endsection

