<?php

?>

<html>
<head>
    {{-- TODO ここはページを増やす時には共通化する--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>

<header>
    <div class="login-container">
        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="logged-in-user">
                <img class="logged-in-icon" src="{{ \Illuminate\Support\Facades\Auth::user()->icon_url }}" height="200" width="200"/>
                <div class="logged-in-name">
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    <div>
                        <a href="{{ route('auth.twitter.logout') }}" role="button">Logout</a>
                    </div>
                </div>
            </div>

        @else
            <a class="btn btn-info" href="{{ route('auth.twitter') }}" role="button">Twitterログイン</a>
        @endif
    </div>
</header>


<section class="eye-catch-section">
    <h1 class="eye-catch-title">技術書バトン</h1>
    <div class="eye-catch-desc">
        読み終わった技術書、沢山ありますよね <br>
        これから学ぶ人に渡して、技術のバトンを繋げましょう
    </div>
</section>

<section class="out-section">
    <h1 class="out-title">
        出品一覧
        <a class="btn btn-default" href="{{ route('offer.add') }}">追加する</a>
    </h1>
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
    <a class="btn btn-danger" href="{{ route('offer.add') }}">追加する</a>
    <div>
    </div>
</section>

{{-- TODO　交換は必須ではなくて、一つもらったら何か一つ出品することを推奨。技術書バトンのイメージ。--}}
{{-- TODO　パネル情報は、以下のもの
* 技術書タイトルと表紙（Amazonから引っ張ってくるか同人などなら画像アップロード）
* 出品者名： 本に対する一言コメント（100文字以内くらい）
* 応募ボタン

TODO メッセージ機能などは初期はとりあえずTwitterのタイムラインやDMに任せてしまうと良い--}}


</body>
</html>
