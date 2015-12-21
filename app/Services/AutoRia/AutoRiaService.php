<?php

namespace App\Services\AutoRia;

/**
 * Class AutoRiaService
 * @package App\Services\AutoRia
 */
class AutoRiaService {

    public function getTypeCar()
    {

    }

    public function getTypeBodyCar()
    {

    }

    /**
     * Получаем бренды автомобилей
     *
     * @return mixed
     */
    public function getCarBrand()
    {
        try {
            $jsonData = file_get_contents('http://api.auto.ria.com/categories/1/marks');
            $data = json_decode($jsonData, true);
            return $data;
        } catch (\Exception $e) {
            if($e) die($e->getMessage());
        }
    }

    public function getModelCar()
    {

    }

    public function getGearboxType()
    {

    }
}