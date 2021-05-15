<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
    $cities = City::all();
    return view('index',['cities' =>$cities]);
}


     public function show(Request $request, $id)
    {
    $city_name = City::find($id)->name;
    $categories = config('category.caterories');
    $request->session()->put('city_id', $id);
    return view('category',[
        'city_name' => $city_name,
        'categories' =>$categories,
        'id' =>$id,
        ]);
}
}
