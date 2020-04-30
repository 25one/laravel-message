@foreach($messages as $message)
<article class="brick entry format-standard animate-this margin-top">

    <div class="entry-text">
        <div class="entry-header">
            <h1 class="entry-title"><a href="#">{{ $message->title }}</a> <span class="red">({{ $message->user->name }})</span></h1>
            <h3>{{ $message->datevisit }}</h3>
        </div>
        <div class="entry-excerpt">
            {{ $message->message }}
        </div>
    </div>

</article>
@endforeach