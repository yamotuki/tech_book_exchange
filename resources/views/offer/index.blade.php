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
        <?php /** @var \App\Domain\OutOffer\OutOffer $offer */ ?>
        @foreach($offerList as $offer)
            <div class="out-item">
                {{-- TODO 投稿したImagePathから画像表示--}}
                <img src="https://images-fe.ssl-images-amazon.com/images/I/81l9I4SLMtL._AC_SY200_.jpg" alt="画像">
                yamotuki: {{ $offer->getComment() }} <br>
                {{ $offer->getArea() }}
                <div class="btn btn-primary">応募する</div>
            </div>
        @endforeach
    </div>
    <div>
        <a href="{{ route('offer.add') }}">追加</a>
    </div>
</section>

{{-- TODO　交換は必須ではなくて、一つもらったら何か一つ出品することを推奨。技術書バトンのイメージ。--}}
{{-- TODO　パネル情報は、以下のもの
* 技術書タイトルと表紙（Amazonから引っ張ってくるか同人などなら画像アップロード）
* 出品者名： 本に対する一言コメント（100文字以内くらい）
* 応募ボタン --}}


</body>
</html>
