<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-11-25
 * Time: 18:15
 */

namespace App\Http\Controllers\Baton;


use App\Http\Controllers\Controller;
use App\Services\Baton\BatonScenarioService;

class IndexController extends Controller
{
    private $scenarioService;

    public function __construct(BatonScenarioService $scenarioService)
    {
        $this->scenarioService = $scenarioService;
    }

    public function getList()
    {
        return view('baton.index', [
            'batonDetails' => $this->scenarioService->getBatonList()
        ]);
    }
}