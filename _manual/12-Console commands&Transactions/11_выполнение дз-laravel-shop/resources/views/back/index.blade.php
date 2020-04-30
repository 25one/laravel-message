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

                            <td>
                               <table>
                                 <tr>
                                   <td rowspan="2">Price</td>
                                   <td ><a href="#" class="sort" data-order="price" data-direction="asc"> <!-- like config\parameters.php -->
                                      <img src="{{ asset('public/images/top.jpg') }}" alt />
                                   </a></td>
                                 </tr>
                                 <tr>   
                                   <td><a href="#" class="sort" data-order="price" data-direction="desc"> <!-- like config\parameters.php -->
                                      <img src="{{ asset('public/images/bottom.jpg') }}" alt />
                                   </a></td>  
                                 </tr>
                               </table>                    
                            </td>

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
                     <div id="pagination" class="box-footer">
                        {{ $links }}
                     </div>
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
    $('.sort').click(function(){
       BaseRecord.order=$(this).attr('data-order');
       BaseRecord.direction=$(this).attr('data-direction');
       BaseRecord.dashboardparameters();
       return false;
    });
});
</script>  
@endsection