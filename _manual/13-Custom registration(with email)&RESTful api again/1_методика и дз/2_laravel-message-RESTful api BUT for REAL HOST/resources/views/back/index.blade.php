@extends('back.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/datatables/datatables.min.css') }}">
<style>
.content {
width: 50%;  
}
</style>  
@endsection

@section('main')

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div id="spinner" class="text-center"></div>
                    <div class="table-responsive">
                    @if (session('message-updated'))
                        @component('back.components.alert')
                            @slot('type')
                                success
                            @endslot
                            {!! session('message-updated') !!}
                        @endcomponent
                    @endif  
                    
                    @admin 
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
                    @endadmin  

                      <table class="table-wrapper">
                         <thead>
                          <tr>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>

                            <td>
                               <table>
                                 <tr>
                                   <td rowspan="2">User Name</td>
                                   <td ><a href="#" class="sort" data-order="user_id" data-direction="asc"> <!-- like config\parameters.php -->
                                      <img src="{{ asset('public/images/top.jpg') }}" alt />
                                   </a></td>
                                 </tr>
                                 <tr>   
                                   <td><a href="#" class="sort" data-order="user_id" data-direction="desc"> <!-- like config\parameters.php -->
                                      <img src="{{ asset('public/images/bottom.jpg') }}" alt />
                                   </a></td>  
                                 </tr>
                               </table>                    
                            </td>

                            <td>Title</td>                            
                            <td>Message</td>

                            <td>
                               <table>
                                 <tr>
                                   <td rowspan="2">Date of visit</td>
                                   <td ><a href="#" class="sort" data-order="datevisit" data-direction="asc"> <!-- like config\parameters.php -->
                                      <img src="{{ asset('public/images/top.jpg') }}" alt />
                                   </a></td>
                                 </tr>
                                 <tr>   
                                   <td><a href="#" class="sort" data-order="datevisit" data-direction="desc"> <!-- like config\parameters.php -->
                                      <img src="{{ asset('public/images/bottom.jpg') }}" alt />
                                   </a></td>  
                                 </tr>
                               </table>                    
                            </td>

                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             @include('back.brick-standard')
                         </tbody>    
                       </table>
                     </div>
                     <hr> 

                     <div id="pagination" class="box-footer">
                       {{ $links }}
                     </div>   
                                           
                   </div>  
                 </div>
              </div> 
           </div>         

@endsection

@section('js')
<script src="{{ asset('public/datatables/datatables.min.js') }}"></script> 
<script src="{{ asset('public/js/mine.js') }}"></script>
<script>
   //var messages='<?php echo json_encode($messages); ?>';
   $(document).ready(function(){
      //BaseRecord.datatable();
      $('.listbuttonremove').click(function(){
         BaseRecord.destroy($(this).attr('id'));
         return false;
      });
      $('#user_id').change(function(){
         BaseRecord.userSelect($(this).val(), './dashboard');
      }); 
      $('.sort').click(function(){
         BaseRecord.order=$(this).attr('data-order');
         BaseRecord.direction=$(this).attr('data-direction');
         BaseRecord.userSelect(0, './dashboard');
         return false;
      });           
   });
</script>
@endsection
