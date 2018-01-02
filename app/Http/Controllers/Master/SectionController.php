<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    public function index(){
        $sections = Section::all();
        return view('master.sections')->with([
            'sections'   => $sections
        ]);
    }

    public function store(Request $request){
        $section = Section::create($request->only('name'));
        $message = [
            'status' => true,
            'text' => 'Successfully created this information'
        ];

        return redirect()->back()->with('message', $message);
    }

    public function delete($id){
        Section::findOrFail($id)->delete();
        $message = [
            'status' => true,
            'text' => 'Successfully deleted this information'
        ];

        return redirect()->back()->with('message', $message);
    }
}
