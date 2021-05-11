<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        
    $cities = City::all();
    
    return view('index',['cities' =>$cities]);
}
     public function show($id)
    {
    $city = City::find($id);
    
    $categories = config('category.caterories');
    return view('category',['categories' =>$categories,'city' => '$city','id' =>$id]);
}
}
