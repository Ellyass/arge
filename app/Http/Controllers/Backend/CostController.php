<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cost;

class CostController extends Controller
{
    public function index()
    {
        $costs = Cost::all();
        return view('backend.cos.index',compact('costs'));
    }
}
