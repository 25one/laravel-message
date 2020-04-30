@foreach($cards as $joined)
<tr>
@auth
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="{{route('cards.destroy', [$joined->id])}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="{{ route('cards.edit', [$joined->id]) }}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
@endauth
   <td>{{ $joined->user->name }}</td> <!-- card->user->name -->
   <td>{{ $joined->number }}</td>      <!-- card->number -->
   <td>{{ $joined->card->name }}</td>   
   <td>{{ $joined->card->type->name }}</td>
</tr>
@endforeach


