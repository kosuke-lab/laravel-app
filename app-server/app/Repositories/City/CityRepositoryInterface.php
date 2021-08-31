<?php

namespace App\Repositories\City;
use App\Models\City;
use Illuminate\Support\Collection;

interface  CityRepositoryInterface{

          public function getAllCity(): Collection; 

}

