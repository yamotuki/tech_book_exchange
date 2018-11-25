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
        <label for="out">出品する本</label>
        <input type="text" name="out">
    </div>
    <div>
        <label for="want">欲しい本のジャンル</label>
        <input type="text" name="want">
    </div>
    <div>
        <label for="area">場所</label>
        <input type="text" name="area">
    </div>

    <input type="submit">
</form>