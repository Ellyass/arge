<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\Cost;

class CostController extends Controller
{
    public function index()
    {
        $costs = Cost::all();
        return view('backend.cost.index',compact('costs'));
    }


    public function add()
    {
        $costs = Cost::with(['user'])->get();
//        dd($costs->toArray());
        return view('backend.cost.create',compact('costs'));
    }


    public function create(Request $request)
    {

       $create = Cost::create([
           'user_id' => $request->user_id,
           'cost_money' => $request->cost_money,
           'cost_date' => $request->cost_date,
           'cost_explanation' => $request->cost_explanation,
           'cost_status' => 0,
           'end_status' => 1
       ]);
        if ($create){
            return redirect(route('cost_index'));
        }
    }


    public function delete(Request $request)
    {
        $costs = Cost::where('id', $request->id)->delete();

        if ($costs) {
            return back()->with('success', 'İşlem Başarılı');
        }
    }
}
