@extends($namespace . '.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
@endsection

@section('main')

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div id="spinner" class="text-center"></div>
                    <div class="table-responsive">
                      @if (session('card-updated'))
                          @component('back.components.alert')
                              @slot('type')
                                  success
                              @endslot
                              {!! session('card-updated') !!}
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
                            <td>Date of visite</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             @include($namespace . '.brick-standard')
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
    <script src="{{ asset('public/js/mine.js') }}"></script>
    <script>
       /*
       var url = "{{ route('dashboard') }}"; 
       var errorAjax = '@lang('Looks like there is a server issue...')';
       var swalTitle = '@lang('Really destroy card ?')';
       var confirmButtonText = '@lang('Yes')';
       var cancelButtonText = '@lang('No')'; 
       $(document).ready(function(){
          $(".listbuttonremove").click(function(){
             BaseRecord.destroy(this, url, swalTitle, confirmButtonText, cancelButtonText, errorAjax);
             return false;
          }); 
       })
       */
    </script>
@endsection    
