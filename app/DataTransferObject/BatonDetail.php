<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-12-16
 * Time: 21:30
 */

namespace App\DataTransferObject;


use Domain\Baton\Baton;

class BatonDetail
{
    /**
     * @var Baton
     */
    private $baton;
    /**
     * @var string
     */
    private $twitter_name;

    public function __construct(Baton $baton, string $twitter_name)
    {
        $this->baton = $baton;
        $this->twitter_name = $twitter_name;
    }

    /**
     * @return Baton
     */
    public function getEntity(): Baton
    {
        return $this->baton;
    }

    /**
     * @return string
     */
    public function getTwitterName(): string
    {
        return $this->twitter_name;
    }

}