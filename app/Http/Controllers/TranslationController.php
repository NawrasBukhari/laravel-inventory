<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranslationController extends Controller
{
    function index()
    {
        $this->authorize('access_translator');
        $content = require resource_path('views/vendor/translation-manager/index.php');
        return $content;
    }
}
