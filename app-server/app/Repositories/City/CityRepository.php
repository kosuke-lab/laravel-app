<?php

namespace App\Repositories\City;
use App\Repositories\City\CityRepositoryInterface;
use App\Models\City;
use Illuminate\Support\Collection;

class CityRepository implements CityRepositoryInterface
{
          public function __construct(
                    City $city
          )
    {
        $this->city = $city;
    }
          public function getAllCity(): Collection
          {
                    return $this->city->get();
          }

}