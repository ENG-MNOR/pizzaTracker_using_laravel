<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Inertia\Inertia;

class publicpizzaController extends Controller
{
    public function show(Pizza $pizza)
    {
        return Inertia::render('pizza/show', ['pizza' => $pizza]);
    }
}
