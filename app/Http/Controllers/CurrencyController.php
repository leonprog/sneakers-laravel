<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function setCurrency(Request $request)
    {
        session(['currency' => $request->currency]);

        return back();
    }
}
