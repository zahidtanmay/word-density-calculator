<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class DashboardController
{
    public function index()
    {
        return view('dashboard');
    }
}
