<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Service\RequestAPI;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var RequestAPI
     */
    protected $requestAPIService;

    /**
     * @param RequestAPI $RequestAPIService
     */
    public function __construct(RequestAPI $RequestAPIService)
    {
        $this->requestAPIService = $RequestAPIService;
    }
}
