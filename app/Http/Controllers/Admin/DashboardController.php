<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Essay;
use App\Models\Film;
use App\Models\Program;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index()
    {
        $chart_options_essay = [
            'chart_title'     => 'Essay by months',
            'report_type'     => 'group_by_date',
            'model'           => 'App\Models\Essay',
            'group_by_field'  => 'created_at',
            'group_by_period' => 'month',
            'chart_type'      => 'bar',
            'filter_period'   => 'year',
        ];

        $chart_essay = new LaravelChart($chart_options_essay);

        $chart_options_film = [
            'chart_title'     => 'Film or Movies by months',
            'report_type'     => 'group_by_date',
            'model'           => 'App\Models\Film',
            'group_by_field'  => 'created_at',
            'group_by_period' => 'month',
            'chart_type'      => 'line',
            'filter_period'   => 'year',
        ];

        $chart_film = new LaravelChart($chart_options_film);

        return view('admin.dashboard', [
            'activeMenu'    => 'dashboard',
            'total_program' => Program::count(),
            'total_essay'   => Essay::count(),
            'total_film'    => Film::count(),
            'chart_essay'   => $chart_essay,
            'chart_film'    => $chart_film,
        ]);
    }
}
