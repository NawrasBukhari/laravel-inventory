<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

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
        $request->validate([
            'theme' => 'required',
        ]);
        $model->theme = $request->theme;
        $model->save($model);
        return redirect()
            ->route('theme.index')
            ->withStatus('Theme successfully Changed.');
    }
    public function edit()
    {

    }
    public function update(Request $request)
    {

    }
}
