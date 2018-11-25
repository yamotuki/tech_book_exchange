@foreach($offerList as $offer)
    @foreach($offer as $content)
        {{ $content }}
    @endforeach
    <br>
@endforeach