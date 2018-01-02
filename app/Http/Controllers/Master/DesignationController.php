<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationController extends Controller
{
    public function index(){
        $designations = Designation::all();
        return view('master.designations')->with([
            'designations'   => $designations
        ]);
    }

    public function store(Request $request){
        $designation = Designation::create($request->only('name'));
        $message = [
            'status' => true,
            'text' => 'Successfully created this information'
        ];

        return redirect()->back()->with('message', $message);
    }

    public function delete($id){
        Designation::findOrFail($id)->delete();
        $message = [
            'status' => true,
            'text' => 'Successfully deleted this information'
        ];

        return redirect()->back()->with('message', $message);
    }
}
