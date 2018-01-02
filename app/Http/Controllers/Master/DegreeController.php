<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\Degree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DegreeController extends Controller
{
    public function index(){
        $degrees = Degree::all();
        return view('master.degrees')->with([
            'degrees'   => $degrees
        ]);
    }

    public function store(Request $request){
        $degree = Degree::create($request->only('name'));
        $message = [
            'status' => true,
            'text' => 'Successfully created this information'
        ];

        return redirect()->back()->with('message', $message);
    }

    public function delete($id){
        Degree::findOrFail($id)->delete();
        $message = [
            'status' => true,
            'text' => 'Successfully deleted this information'
        ];

        return redirect()->back()->with('message', $message);
    }
}
