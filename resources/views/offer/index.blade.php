<html>
<header>
    {{-- TODO ここはページを増やす時には共通化する--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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
    <div class="out-item-container">
        <?php /** @var \App\Domain\OutOffer\OutOffer $offer */ ?>
        @foreach($offerList as $offer)
            <div class="out-item">
                {{-- TODO 画像URLではなくて実体の投稿もしくはAmazonリンクを投稿できるようにする--}}
                <img src="{{ $offer->getImagePath() }}" alt="画像">
                <div class="out-item-desc">
                    <div class="out-item-comment">
                        コメント：{{ $offer->getComment() }}
                    </div>
                    <div class="out-item-user">
                        by <a href="">yamotuki</a>
                    </div>
                    <div>
                        場所：{{ $offer->getArea() }}
                    </div>
                </div>
                {{-- TODO ボタンの一番下の高さが画像の一番下の高さに合うようにしたい--}}
                <div class="btn btn-primary out-item-btn">
                    応募する
                </div>
            </div>
        @endforeach
    </div>

    <div>
        <a class="btn btn-danger" href="{{ route('offer.add') }}">追加</a>
    </div>
</section>

{{-- TODO　交換は必須ではなくて、一つもらったら何か一つ出品することを推奨。技術書バトンのイメージ。--}}
{{-- TODO　パネル情報は、以下のもの
* 技術書タイトルと表紙（Amazonから引っ張ってくるか同人などなら画像アップロード）
* 出品者名： 本に対する一言コメント（100文字以内くらい）
* 応募ボタン --}}


</body>
</html>
