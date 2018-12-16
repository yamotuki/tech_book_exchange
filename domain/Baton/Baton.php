<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-12-01
 * Time: 22:29
 */

namespace Domain\Baton;


class Baton
{
    private $imagePath;
    private $comment;
    private $area;
    private $twitterId;

    // TODO あとでUserのTwitterIdもドメイン化するか
    public function __construct(
        int $twitterId,
        BatonImagePath $imagePath,
        BatonComment $comment,
        BatonExchangeArea $area
    ) {
        $this->imagePath = $imagePath;
        $this->comment = $comment;
        $this->area = $area;
        $this->twitterId = $twitterId;
    }

    /**
     * @return BatonImagePath
     */
    public function getImagePath(): BatonImagePath
    {
        return $this->imagePath;
    }

    /**
     * @return BatonComment
     */
    public function getComment(): BatonComment
    {
        return $this->comment;
    }

    /**
     * @return BatonExchangeArea
     */
    public function getArea(): BatonExchangeArea
    {
        return $this->area;
    }

    public function getTwitterId(): int
    {
        return $this->twitterId;
    }
}