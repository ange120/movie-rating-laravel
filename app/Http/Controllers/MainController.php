<?php

namespace App\Http\Controllers;

use App\Helpers\StateCodesHelpers;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $lists = StateCodesHelpers::getListStateCodes();
        return view('welcome',compact('lists'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function getListToRegin(Request $request)
    {
        $region = $request->get('region');

        $dataList = $this->requestAPIService->getTopRatedMovies($region);

        $info = StateCodesHelpers::getTextStateCodes($region);
        return view('list', compact('dataList', 'info'));
    }
}
