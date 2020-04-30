@foreach($products as $product)
<tr>
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" id="{{$product->id}}" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="{{route('products.edit', $product->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
<td><img src="{{ asset('public/img/' . $product->image) }}" alt /></td>
<td>{{$product->name}}</td>  
<td>{{$product->price}}</td>
<td>{{$product->top9}}</td>
</tr>
@endforeach