<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\Models\Post;
use DB;
use Session;
use App\Models\Excel;

class ExcelController extends Controller
{
    public function downloadExcel($type)
    {
        $data = Post::get()->toArray();
        return Excel::create('laravelcode', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel(Request $request)
    {
        if ($request->hasFile('import_file')) {
            Excel::load($request->file('import_file')->getRealPath(), function ($reader) {
                foreach ($reader->toArray() as $key => $row) {
                    $data['title'] = $row['title'];
                    $data['description'] = $row['description'];

                    if (!empty($data)) {
                        DB::table('post')->insert($data);
                    }
                }
            });
        }
        Session::put('success', 'Your file successfully import in database!!!');

        return back();

    }
}
