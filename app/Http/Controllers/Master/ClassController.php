<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;
use App\Model\Master\SchoolClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(){
        $classes = SchoolClass::all();
        return view('master.classes')->with([
            'classes'   => $classes
        ]);
    }

    public function store(Request $request){
        $class = SchoolClass::create($request->only('name'));
        $message = [
            'status' => true,
            'text' => 'Successfully created this information'
        ];

        return redirect()->back()->with('message', $message);
    }

    public function delete($id){
        SchoolClass::findOrFail($id)->delete();
        $message = [
            'status' => true,
            'text' => 'Successfully deleted this information'
        ];

        return redirect()->back()->with('message', $message);
    }
}
