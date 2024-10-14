<?php

namespace App\Http\Controllers;

use App\Models\HolyPlace;
use Illuminate\Http\Request;

class HolyController extends Controller
{
    public function view(HolyPlace $holyPlace)
    {
        $places = $holyPlace->distinct('location')->get('*');
        return view('index')->with(['places' => $places]);
    }
    // app/Http/Controllers/PlaceController.php

    public function show(Request $request)
    {
        $place = HolyPlace::where('id', '=', $request->id)->get('*');

        return view('places', compact('place'));
    }
    public function getLocation(HolyPlace $holyPlace, Request $request)
    {
        $holyPlacemodel = $holyPlace->query();

        $holyplaces = $holyPlacemodel->where('location', 'like', '%' . $request->search_location . '%')->orWhere('name', 'like', '%' . $request->search_location . '%')->get('*');

        return view('suggestion-page')->with(['holyplaces' => $holyplaces]);
    }

}
