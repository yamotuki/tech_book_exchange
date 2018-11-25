<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-11-25
 * Time: 18:15
 */

namespace App\Http\Controllers\Offer;


use App\Http\Controllers\Controller;
use App\Services\Offer\OfferScenarioService;

class IndexController extends Controller
{
    private $scenarioService;

    public function __construct(OfferScenarioService $scenarioService)
    {
        $this->scenarioService = $scenarioService;
    }

    public function getList()
    {
        return view('offer.index', [
            'offerList' => $this->scenarioService->getOfferList()
        ]);
    }
}