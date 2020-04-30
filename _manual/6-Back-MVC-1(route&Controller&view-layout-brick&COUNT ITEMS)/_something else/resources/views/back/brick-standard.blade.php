@foreach($messages as $message)
<tr>
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="{{ route('messages.destroy', [$message->id]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="{{ route('messages.edit', [$message->id]) }}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
   <td>{{ $message->user->name }}</td>
   <td>{{ $message->title }}</td>  
   <td>{{ $message->message }}</td>   
   <td>{{ $message->datevisit }}</td>
</tr>
@endforeach


