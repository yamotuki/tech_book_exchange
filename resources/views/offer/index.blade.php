<html>
<header>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</header>

<body>
<section class="eye-catch-section">
    <h1 class="eye-catch-title">技術書を交換して知識を交換しよう</h1>
    <div class="eye-catch-desc">
        読み終わった技術書、沢山ありますよね <br>
        交換を通して学習仲間を増やしましょう
    </div>
</section>

<section class="out-section">
    <h1 class="out-title">出品一覧</h1>
    <div class="out-items">
        @foreach($offerList as $offer)
            <div class="out-item">
                @foreach($offer as $content)
                    {{ $content }}
                @endforeach
            </div>
        @endforeach
    </div>
    <div>
        <a href="{{ route('offer.add') }}">追加</a>
    </div>
</section>



</body>
</html>
