@extends('front.layout')

@section('css')
   <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
@endsection

@section('main')

<?php 
//print_r($users); 
//die;
?>

<div class="row margin">
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="user" class="size">Select user</label>
            <select class="form-control input-size" style="height: auto;" name="user_id" id="user_id">
                <option value="0" class="input-size" 
                   >-----</option> 
                @foreach ($users as $key => $user)
                   <option value="{{ $user->id }}" class="input-size" 
                   >@lang($user->name)</option>
                @endforeach      
            </select>
        </div>
    </div>
</div>   

<?php 
//print_r($messages); 
?>

<!-- brick-wrapper -->
<div class="bricks-wrapper">

    <div class="grid-sizer"></div>

    <div id="pannel">
       @//include('front.brick-standard')
    </div>   

</div>

</div> <!-- end row -->

@endsection

@section('js')
    <script src="{{ asset('public/js/mine.js') }}"></script>
    <script>
       /*
       var url = "{{ route('home') }}";
       var errorAjax = '@lang('Looks like there is a server issue...')';
       $(document).ready(function(){
          $('#type_id').change(function(){
             BaseRecord.typeSelect(this.value, url, errorAjax); 
          });
       }); 
       */
    </script>
@endsection    
