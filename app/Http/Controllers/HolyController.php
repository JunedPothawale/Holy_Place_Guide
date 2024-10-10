<?php

namespace App\Http\Controllers;

use App\Models\HolyPlace;
use Illuminate\Http\Request;

class HolyController extends Controller
{
    public function view(HolyPlace $holyPlace){
        $places = $holyPlace->get('*');
        return view('index')->with('places',$places);
    }
    // app/Http/Controllers/PlaceController.php

public function show(Request $request)
{
    if($request->has('id')){

        $place = HolyPlace::findOrFail($request->id)->get('*');
    }else{
        $place = HolyPlace::get('*');
    }


    return view('places', compact('place'));
}

}
