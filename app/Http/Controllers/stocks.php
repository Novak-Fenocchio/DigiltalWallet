<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;

class stocks extends Controller
{
    public function show()
    {
        return view('expense_controller.stocks', [
            'stocks' => stock::all()
        ]);
    }
}
