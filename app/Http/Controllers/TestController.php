<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function test()
    {
        $richText = "<h1>fdsfds</h1>";
        $export = view('export', compact('richText'));
        Storage::put('aa.docx', $export);
    }
}
