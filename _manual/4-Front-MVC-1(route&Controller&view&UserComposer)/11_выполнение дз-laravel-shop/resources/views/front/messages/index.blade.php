@extends('front.messages.layout')

@section('css')

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
                          <tbody id="pannel" class="back-pannel">
                             @//include('front.messages.brick-standard')
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
<script src="{{ asset('public/js/main.js') }}"></script>
<script>
$(document).ready(function(){
   //...
});
</script>  
@endsection