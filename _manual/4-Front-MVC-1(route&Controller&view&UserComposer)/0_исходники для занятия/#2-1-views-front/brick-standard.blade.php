@foreach($cards as $card)
<article class="brick entry format-standard animate-this margin-top">

    <div class="entry-text">
        <div class="entry-header">
            <h5 class="entry-title"><a href="#">{{ $card->name }}</a> <span class="red">({{ $card->type->name }})</span></h5>
        </div>
        <div class="entry-excerpt">
            {{ $card->title }}
        </div>
    </div>

</article>
@endforeach