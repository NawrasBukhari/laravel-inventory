<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Product;
use App\Models\Kenzhekhan;
use Maatwebsite\Excel\Facades\Excel;
use Nette\Utils\Random;

class SettingsController extends Controller
{
    public function index()
    {
        $themes = Settings::all();
        return view('settings.index', compact('themes'));
    }
    public function export()
    {
        $nick_name = Random::generate(6).'_'.'товар.xlsx';
        return Excel::download(new ProductExport,$nick_name );
    }

}
