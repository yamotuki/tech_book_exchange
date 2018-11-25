@foreach($offerList as $offer)
    @foreach($offer as $content)
        {{ $content }}
    @endforeach
    <br>
@endforeach

<a href="{{ route('offer.add') }}">追加</a>