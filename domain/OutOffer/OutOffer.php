<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-12-01
 * Time: 22:29
 */

namespace Domain\OutOffer;


class OutOffer
{
    private $imagePath;
    private $comment;
    private $area;

    public function __construct(OutOfferImagePath $imagePath, OutOfferComment $comment, OutOfferArea $area)
    {
        $this->imagePath = $imagePath;
        $this->comment = $comment;
        $this->area = $area;
    }

    /**
     * @return OutOfferImagePath
     */
    public function getImagePath(): OutOfferImagePath
    {
        return $this->imagePath;
    }

    /**
     * @return OutOfferComment
     */
    public function getComment(): OutOfferComment
    {
        return $this->comment;
    }

    /**
     * @return OutOfferArea
     */
    public function getArea(): OutOfferArea
    {
        return $this->area;
    }
}