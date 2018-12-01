<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-11-25
 * Time: 18:34
 */

namespace App\Services\Offer;


//TODO あとで複雑になってくればQueryServiceとCommandService経由でModel叩くようにする。今はElooquentをここで直接叩いてしまう
use Domain\OutOffer\OutOffer;
use Domain\OutOffer\OutOfferArea;
use Domain\OutOffer\OutOfferComment;
use Domain\OutOffer\OutOfferImagePath;
use Infra\OfferEloquentModel;

class OfferScenarioService
{
    public function addOffer(array $data)
    {
        $model = new OfferEloquentModel();
        $model->image_path = $data['image_path'];
        $model->comment = $data['comment'];
        $model->area = $data['area'];

        $model->save();
    }

    public function getOfferList()
    {
        $model = OfferEloquentModel::get();

        $offers = [];
        foreach ($model as $data) {
            $offers[] = new OutOffer(
                new OutOfferImagePath($data->image_path),
                new OutOfferComment($data->comment),
                new OutOfferArea($data->area)
            );

        }

        return $offers;
    }
}