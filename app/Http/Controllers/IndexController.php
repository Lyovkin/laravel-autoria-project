<?php

namespace App\Http\Controllers;

use App\Services\AutoRia\AutoRiaService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @param AutoRiaService $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(AutoRiaService $service)
    {
        $typeTrans = $service->getTypeCar();
       // dd($typeTrans);
        return view('index.index', compact('typeTrans'));
    }


    public function submit(Request $request)
    {
        dd($request->all());
    }
}
