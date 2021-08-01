<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'link' => 'required|url'
        ]);

        $random_code = Str::random(6);

        ShortLink::create([
            'link' => $request->link,
            // 'code' => str_random(6),
        ]);
    }
}
