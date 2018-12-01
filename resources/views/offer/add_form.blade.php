<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-11-25
 * Time: 18:22
 */
?>

<form action="{{ route('offer.add') }}" method="POST">
    {{ csrf_field() }}
    <div>
        <label for="out">出品する本の画像URL</label>
        <input type="text" name="image_path">
    </div>
    <div>
        <label for="want">本に対する一言コメント</label>
        <input type="text" name="comment">
    </div>
    <div>
        <label for="area">おところ</label>
        <input type="text" name="area">
    </div>

    <input type="submit">
</form>