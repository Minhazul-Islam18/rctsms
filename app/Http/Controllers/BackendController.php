<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    function index()
    {
        return view('backend.admin.index');
    }
    function settings()
    {
        return view('backend.admin.settings');
    }
}
