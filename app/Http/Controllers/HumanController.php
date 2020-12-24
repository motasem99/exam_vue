<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Human;

class HumanController extends Controller
{
    //
    public function index () {
        return view('welcome');
    }

    public function addPage (){
        return view("add");
    }
    public function getData() {
        $data = Human::all();
        return response()->json(compact('data'));
    }

    public function updateData(Request $request, $id) {
        $sample = Human::find($id);
        $sample->update($request->all());
    }

    public function add_user(Request $request) {
        Human::create($request-> all());
    }

}
