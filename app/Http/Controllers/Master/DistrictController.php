<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function index(){
        $districts = District::all();
        return view('master.districts')->with([
            'districts'   => $districts
        ]);
    }

    public function store(Request $request){
        $district = District::firstOrCreate($request->only('name'));
        $message = [
            'status' => true,
            'text' => 'Successfully created this information'
        ];

        return redirect()->back()->with('message', $message);
    }

    public function delete($id){
        District::findOrFail($id)->delete();
        $message = [
            'status' => true,
            'text' => 'Successfully deleted this information'
        ];

        return redirect()->back()->with('message', $message);
    }
}
