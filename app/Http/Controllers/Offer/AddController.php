<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-11-25
 * Time: 18:17
 */

namespace App\Http\Controllers\Offer;


use App\Http\Controllers\Controller;
use App\Services\Offer\OfferScenarioService;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class AddController extends Controller
{
    private $scenarioService;

    public function __construct(OfferScenarioService $scenarioService)
    {
        $this->scenarioService = $scenarioService;
    }

    public function showAddForm()
    {
        return view('offer.add_form');
    }

    // TODO ブラウザ戻るで戻って再度投稿すると多重投稿されてしまうのでそれを防ぎたい
    public function add(Request $request, Redirector $redirector)
    {
        $this->scenarioService->addOffer($request->all());

        return $redirector->route('offer.list');
    }
}