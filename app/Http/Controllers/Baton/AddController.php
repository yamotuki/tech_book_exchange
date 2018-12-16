<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-11-25
 * Time: 18:17
 */

namespace App\Http\Controllers\Baton;


use App\Http\Controllers\Controller;
use App\Services\Baton\BatonScenarioService;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class AddController extends Controller
{
    private $scenarioService;

    public function __construct(BatonScenarioService $scenarioService)
    {
        $this->scenarioService = $scenarioService;
    }

    public function showAddForm()
    {
        return view('baton.add_form');
    }

    // TODO ブラウザ戻るで戻って再度投稿すると多重投稿されてしまうのでそれを防ぎたい
    public function add(Request $request, Redirector $redirector)
    {
        $user = $request->user();
        $inputData = $request->all();

        $this->scenarioService->addBaton($user, $inputData);

        return $redirector->route('baton.list');
    }
}