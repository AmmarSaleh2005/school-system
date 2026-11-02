<?php

namespace App\Http\Controllers\Dashboard\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HrController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.pages.hr.index');
    }
}
