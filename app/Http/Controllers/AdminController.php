<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\Post;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;

class AdminController extends Controller
{
    public function index(){
        return redirect()->route('users.index');
    }

    public function analyst(Request $request) {
        $data = collect([]); // Could also be an array
        $labels = collect([]);

        if($request->from_date && $request->to_date) {
            $begin = new DateTime($request->from_date);
            $end = new DateTime($request->to_date);

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                $full_date = $dt->format("Y-m-d");
                $date = $dt->format("d/m");
                $labels->push($date);
                $data->push(Post::whereRaw('date(created_at) = ?', [date($full_date)])->count());
                // dd($date);
            }
        } else {
            $labels = collect(['Today', 'Week', 'Month']);
            $data->push(Post::whereDate('created_at', Carbon::today())->count());
            $data->push(Post::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count());
            $data->push(Post::whereBetween('created_at', [Carbon::today()->startOfMonth(), Carbon::today()->endOfMonth()])->count());
        }

        $chart = new SampleChart;
        $chart->labels($labels);
        $chart->dataset('Total Posts', 'line', $data);


        return view("admin.chart", compact("chart"));
    }
}
