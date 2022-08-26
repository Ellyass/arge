<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;

class TestController extends Controller
{
    public function test()
    {
        $richText = "<h1>fdsfds</h1>";
        $export = view('export', compact('richText'));
        Storage::put('teklif_saves/' . Customer::$customer->id, 0777, true, true, $export);
    }
}
