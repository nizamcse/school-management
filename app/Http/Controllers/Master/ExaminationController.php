<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\Examination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExaminationController extends Controller
{
    public function index(){
        $examinations = Examination::all();
        return view('master.examinations')->with([
            'examinations'   => $examinations
        ]);
    }

    public function store(Request $request){
        $examination = Examination::firstOrCreate($request->only('name'));
        $message = [
            'status' => true,
            'text' => 'Successfully created this information'
        ];

        return redirect()->back()->with('message', $message);
    }

    public function delete($id){
        Examination::findOrFail($id)->delete();
        $message = [
            'status' => true,
            'text' => 'Successfully deleted this information'
        ];

        return redirect()->back()->with('message', $message);
    }
}
