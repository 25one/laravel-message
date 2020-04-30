@foreach($messages as $message)
<article class="brick entry format-standard animate-this margin-top">

    <div class="entry-text">
        <div class="entry-header">
            <h5 class="entry-title"><a href="#">{{$message->title}}</a> <span class="red">({{$message->user->name}})</span></h5>
        </div>
        <h3>{{ $message->datevisit }}</h3>        
        <div class="entry-excerpt">
            {{$message->message}}
        </div>
    </div>

</article>
@endforeach