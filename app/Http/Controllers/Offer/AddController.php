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

class AddController extends Controller
{
    private $scenarioService;
    public function __construct(OfferScenarioService $scenarioService)
    {
        $this->scenarioService = $scenarioService;
    }

    public function showAddForm(){
        return view('offer.add_form');
    }

    public function add(Request $request)
    {
        $this->scenarioService->addOffer($request->all());
    }
}