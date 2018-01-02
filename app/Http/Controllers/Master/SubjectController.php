<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('master.subjects')->with([
            'subjects'   => $subjects
        ]);
    }

    public function store(Request $request){
        $subject = Subject::firstOrCreate($request->only('name'));
        $message = [
            'status' => true,
            'text' => 'Successfully created this information'
        ];

        return redirect()->back()->with('message', $message);
    }

    public function delete($id){
        Subject::findOrFail($id)->delete();
        $message = [
            'status' => true,
            'text' => 'Successfully deleted this information'
        ];

        return redirect()->back()->with('message', $message);
    }
}
