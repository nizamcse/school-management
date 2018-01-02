<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\District;
use App\Model\Master\PoliceStation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PoliceStationController extends Controller
{
    public function index(){
        $police_stations = PoliceStation::all();
        $districts = District::all();
        return view('master.police-stations')->with([
            'police_stations'   => $police_stations,
            'districts'         => $districts
        ]);
    }

    public function store(Request $request){
        $district = District::findOrFail($request->input('district'));
        $police_station = PoliceStation::firstOrCreate([
            'name'          => $request->input('name'),
            'district_id'   => $district->id
        ]);
        $message = [
            'status' => true,
            'text' => 'Successfully created this information'
        ];

        return redirect()->back()->with('message', $message);
    }

    public function getPoliceStation($id){
        $police_station = PoliceStation::findOrFail($id);
        return response()->json($police_station,200);
    }

    public function update(Request $request,$id){
        $district = District::findOrFail($request->input('district'));
        $police_station = PoliceStation::findOrFail($id)->update([
            'name'          => $request->input('name'),
            'district_id'   => $district->id
        ]);
        $message = [
            'status' => true,
            'text' => 'Successfully updated this information'
        ];

        return redirect()->back()->with('message', $message);
    }

    public function delete($id){
        PoliceStation::findOrFail($id)->delete();
        $message = [
            'status' => true,
            'text' => 'Successfully deleted this information'
        ];

        return redirect()->back()->with('message', $message);
    }
}
