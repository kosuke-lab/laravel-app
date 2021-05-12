<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
    $cities = City::all();

    $value = $request->session()->get('key', 'default');
    $request->session()->regenerate();
    $request->session()->put('key', 'value');
    $data = $request->session()->all();

   
    return view('index',['cities' =>$cities,'data' =>$data]);
}


     public function show($id)
    {
    $city = City::find($id);
    $categories = config('category.caterories');
    $_token = session()->get('_token');

    return view('category',[
        'categories' =>$categories,
        'city' => $city,
        'id' =>$id,
        '_token' =>$_token
        ]);
}
}
