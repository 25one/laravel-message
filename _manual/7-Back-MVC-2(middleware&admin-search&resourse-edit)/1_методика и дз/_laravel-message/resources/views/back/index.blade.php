@extends('back.layout')

@section('css')
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

                      <table>
                         <thead>
                          <tr>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>
                            <td>User Name</td>
                            <td>Title</td>                            
                            <td>Message</td>
                            <td>Date of visit</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             @include('back.brick-standard')
                         </tbody>    
                       </table>
                     </div>
                     <hr>                       
                   </div>  
                 </div>
              </div> 
           </div>         

@endsection

@section('js')
<script src="{{ asset('public/js/mine.js') }}"></script>
<script>
   $(document).ready(function(){
      //$('.listbuttonremove').click(function(){
      //   BaseRecord.destroy($(this).attr('id'));
      //   return false;
      //});
      $('#user_id').change(function(){
         BaseRecord.userSelect($(this).val(), './dashboard');
      });      
   });
</script>
@endsection
