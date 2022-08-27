<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;

class TestController extends Controller
{
    public function test(Request $request)
    {
        dd($request->toArray());
        $customer = Customer::where('id')->first();

        $summary_ckeditor = "summary_ckeditor";
        $export = view('export', compact('summary_ckeditor'));
        Storage::put('teklif_saves/'.$customer->id  , 0777, true, true, $export);
        return response()->download($export);
    }
}
