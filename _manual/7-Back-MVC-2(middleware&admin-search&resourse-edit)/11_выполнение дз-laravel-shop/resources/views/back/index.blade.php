@extends('back.layout')

@section('css')
<style>
.back-pannel img {
width: 120px; 
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
                      @if (session('product-updated'))
                          @component('back.components.alert')
                              @slot('type')
                                  success
                              @endslot
                              {!! session('product-updated') !!}
                          @endcomponent
                      @endif                      
                      <table>
                         <thead>
                          <tr>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>
                            <td>Image</td>
                            <td>Name</td>                            
                            <td>Price</td>
                            <td>Top9</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel" class="back-pannel">
                             @include('back.brick-standard')
                             @php
                             //print_r($products)
                             @endphp
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
    $('.listbuttonremove').click(function(){
       BaseRecord.destroy($(this).attr('id'));
       return false;
    });
});
</script>  
@endsection