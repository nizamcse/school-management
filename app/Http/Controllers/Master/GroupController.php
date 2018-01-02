<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index(){
        $groups = Group::all();
        return view('master.groups')->with([
            'groups'   => $groups
        ]);
    }

    public function store(Request $request){
        $group = Group::firstOrCreate($request->only('name'));
        $message = [
            'status' => true,
            'text' => 'Successfully created this information'
        ];

        return redirect()->back()->with('message', $message);
    }

    public function delete($id){
        Group::findOrFail($id)->delete();
        $message = [
            'status' => true,
            'text' => 'Successfully deleted this information'
        ];

        return redirect()->back()->with('message', $message);
    }
}
