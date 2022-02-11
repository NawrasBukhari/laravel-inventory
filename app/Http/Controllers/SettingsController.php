<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        $themes = Settings::all();
        return view('settings.index', compact('themes'));
    }
    public function create()
    {

    }
    public function store(Request $request, Settings $model)
    {

    }
    public function edit()
    {

    }
    public function update(Request $request)
    {

    }
}
