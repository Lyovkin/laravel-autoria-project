<?php

namespace App\Services\AutoRia;

/**
 * Class AutoRiaService
 * @package App\Services\AutoRia
 */
class AutoRiaService {

    public function getTypeCar()
    {
        try {
            $jsonData = file_get_contents('http://api.auto.ria.com/categories');
            $data = json_decode($jsonData, true);
            return $data;
        } catch (\Exception $e) {
           if($e) die($e->getMessage());
        }
    }

    public function getTypeBodyCar()
    {

    }

    public function getCarBrand()
    {

    }

    public function getModelCar()
    {

    }

    public function getGearboxType()
    {

    }
}