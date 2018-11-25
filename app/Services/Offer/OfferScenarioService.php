<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-11-25
 * Time: 18:34
 */

namespace App\Services\Offer;


//TODO あとで複雑になってくればQueryServiceとCommandService経由でModel叩くようにする。今はElooquentをここで直接叩いてしまう
use Infra\OfferEloquentModel;

class OfferScenarioService
{
    public function addOffer(array $data)
    {
        $model = new OfferEloquentModel();
        $model->out = $data['out'];
        $model->want = $data['want'];
        $model->area = $data['area'];

        $model->save();
    }

    public function getOfferList()
    {
        $model = OfferEloquentModel::get();

        $offers = [];
        foreach ($model as $data) {
            $offers[] = [
                $data->out,
                $data->want,
                $data->area
            ];

        }

        return $offers;
    }
}