<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-11-25
 * Time: 18:34
 */

namespace App\Services\Baton;


//TODO あとで複雑になってくればQueryServiceとCommandService経由でModel叩くようにする。今はElooquentをここで直接叩いてしまう
use App\DataTransferObject\BatonDetail;
use App\User;
use Domain\Baton\Baton;
use Domain\Baton\BatonExchangeArea;
use Domain\Baton\BatonComment;
use Domain\Baton\BatonImagePath;
use Infra\BatonEloquentModel;

class BatonScenarioService
{
    public function addBaton(User $user, array $data)
    {
        $model = new BatonEloquentModel();
        $model->image_path = $data['image_path'];
        $model->comment = $data['comment'];
        $model->area = $data['area'];
        $model->twitter_id = $user['twitter_id'];

        $model->save();
    }

    public function getBatonList()
    {
        $model = BatonEloquentModel::get();

        $batons = [];
        foreach ($model as $data) {
            $batons[] = new Baton(
                $data->twitter_id,
                new BatonImagePath($data->image_path),
                new BatonComment($data->comment),
                new BatonExchangeArea($data->area)
            );

        }

        $batonDetails = [];
        foreach ($batons as $baton) {
            $batonDetails[] = $this->buildDetail($baton);
        }

        return $batonDetails;
    }

    private function buildDetail(Baton $baton)
    {
        $user = User::where('twitter_id', $baton->getTwitterId())->first();

        return new BatonDetail(
            $baton,
            $user->name
        );
    }

}