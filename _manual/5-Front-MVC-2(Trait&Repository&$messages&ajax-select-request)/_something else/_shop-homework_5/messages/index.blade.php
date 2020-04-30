@extends('front.messages.layout')

@section('css')
  
@endsection

@section('main')

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                      @if (session('message-updated'))
                          @component('back.components.alert')
                              @slot('type')
                                  success
                              @endslot
                              {!! session('message-updated') !!}
                          @endcomponent
                      @endif                  
                      <div class="row">
                         <div class="col-md-3 col-sm-3 col-xs-8">  
                            <input type="text" class="form-control search_text" placeholder="Search for Messages" />
                         </div>   
                         <div class="col-md-3 col-sm-3 col-xs-4">    
                            <button type="button" class="btn btn-primary search_button">Search</button> 
                          </div> 
                      </div>                    
                    <div id="spinner" class="text-center"></div>
                    <div class="table-responsive">
                      <table>
                         <thead>
                          <tr>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>
                            <td>User Name</td>
                            <td>Title</td>                            
                            <td>Message</td>
                            <td>Date of visite</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             @include('front.messages.brick-standard')
                         </tbody>    
                       </table>
                     </div>
                   </div>  
                 </div>
              </div> 
           </div>  
</section>  

@endsection

@section('js')
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script>
       $(document).ready(function(){
          $('.search_button').click(function(){
             BaseRecord.searchMessages($('.search_text').val());    
          });
       });
    </script>
@endsection    
