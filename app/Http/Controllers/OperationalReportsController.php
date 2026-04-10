<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;

class OperationalReportsController extends Controller
{
    public function index(): View
    {
        abort_unless(Gate::allows('reports.view'), 403);

        $reports = [
  
            [
              
                'title' => 'Rapport 01',
                'description' => 'Suivi des actifs mis en rebut',
                'src'   => 'https://app.powerbi.com/view?r=eyJrIjoiOTQ1ODA3MTctNjQ1Yi00ZDljLTljMGYtYmIxOWVmNjYxYzQ3IiwidCI6ImZmOWJlNTQxLTVlNmItNGFmMi1hZmZmLTY5NWUyOTY4MzlmMCIsImMiOjl9'
                                
                ],
          
        ];

        return view('reports.operational.index', compact('reports'));
    }
}