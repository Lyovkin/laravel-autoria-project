<?php

namespace App\Http\Controllers;

use App\Services\AutoRia\AutoRiaService;
use GettyImages\Api\GettyImages_Client;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Sunra\PhpSimple\HtmlDomParser;
use Symfony\Component\DomCrawler\Crawler;

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
        $typeTrans = $service->getCarBrand();

        return view('index.index', compact('typeTrans'));
    }

    /**
     * Получаем модели автомобилей
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @internal param Session $session
     */
    public function getModel(Request $request)
    {
        $mark = (int) $request->input('transport');

        $jsonData = file_get_contents("http://api.auto.ria.com/categories/1/marks");
        $typeTrans = json_decode($jsonData, true);
        $name = '';

        Session::put('mark', $mark);

        foreach($typeTrans as $trans) {

           if ($trans['value'] == $mark){
               if(!empty($name)) {
                   unset($name);
               }
               $name = $trans['name'];
           }
        }
            try {
                $jsonData = file_get_contents("http://api.auto.ria.com/categories/1/marks/$mark/models");
                $models = json_decode($jsonData, true);

                Session::put('name', $name);

                return view('index.index', compact('models', 'typeTrans', 'name'));

            } catch (\Exception $e) {
                if($e) die($e->getMessage());
         }

        return redirect()->back(404);
    }

    /**
     * Получаем авто
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAuto(Request $request)
    {
        Session::put('models', $request->input('model'));

        $model = Session::get('models');

        $mark = Session::get('mark');

        $jsonData = file_get_contents("http://api.auto.ria.com/categories/1/marks/$mark/models");
        $models = json_decode($jsonData, true);

        $nameAuto = '';

        foreach($models as $mod) {

            if ($mod['value'] == $model){
                if(!empty($nameAuto)) {
                    unset($nameAuto);
                }
                $nameAuto = $mod['name'];
            }
        }

        Session::put('nameAuto', $nameAuto);

        $jsonData = file_get_contents("http://api.auto.ria.com/categories/1/marks");
        $typeTrans = json_decode($jsonData, true);

        //$mark = Session::get('mark');
        $name = Session::get('name');

        if(Session::has('mark') && Session::has('models')) {

            $apiKey = "nf87gm4kggpc6xpff4huawx7";
            $apiSecret = "qXpdWXq3yzYmHJsDb4yCpUM3wKcBKevPbcfFnPHvVWvuC";

            $client = new GettyImages_Client($apiKey, $apiSecret);

            $response = $client->Search()->Images()->withPhrase($name)->execute();

            $data = json_decode($response);
            //dd($data->images);

            $imgArr = [];
            foreach($data->images as $images) {
                foreach($images->display_sizes as $img) {
                    $imgArr[] = ($img->uri);
                }
            }

        }
        return view('index.index', compact('typeTrans', 'data', 'imgArr'));
    }

}
