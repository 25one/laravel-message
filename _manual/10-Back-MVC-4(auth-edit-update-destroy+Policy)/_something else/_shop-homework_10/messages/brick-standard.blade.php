@foreach($messages as $message)
<tr>
@admin
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="{{ 'restmessages/' . $message->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="{{route('restmessages.edit', $message->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
@endadmin	
@if(auth()->user()->role !== 'admin' && $message->user_id == auth()->user()->id)
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="{{ 'restmessages/' . $message->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="{{route('restmessages.edit', $message->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
@elseif(auth()->user()->role !== 'admin')
<td class="center widthbutton"></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"></td>
@endif
   <td>{{ $message->user->name }}</td>
   <td>{{ $message->title }}</td>  
   <td>{{ $message->message }}</td>   
   <td>{{ $message->datevisit }}</td>
</tr>
@endforeach


