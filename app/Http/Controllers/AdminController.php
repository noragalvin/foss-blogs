<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\Post;
use App\User;
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

        $users = User::orderBy("first_name")->get();
        $total = 0;
        if($request->user_id) {
            $total = Post::where("user_id", $request->user_id)->count();
        } else {
            $total = Post::all()->count();
        }

        if($request->from_date && $request->to_date) {
            $begin = new DateTime($request->from_date);
            $end = new DateTime($request->to_date);

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                $full_date = $dt->format("Y-m-d");
                $date = $dt->format("d/m");
                $labels->push($date);

                $post_count = 0;
                if($request->user_id) {
                    $post_count = Post::withTrashed()->whereRaw('date(created_at) = ?', [date($full_date)])->where("user_id", $request->user_id)->count();
                } else {
                    $post_count = Post::withTrashed()->whereRaw('date(created_at) = ?', [date($full_date)])->count();
                }
                $data->push($post_count);
                // dd($date);
            }
        } else {
            $labels = collect(['Today', 'Week', 'Month']);
            if($request->user_id) {
                $data->push(Post::withTrashed()->where("user_id", $request->user_id)->whereDate('created_at', Carbon::today())->count());
                $data->push(Post::withTrashed()->where("user_id", $request->user_id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count());
                $data->push(Post::withTrashed()->where("user_id", $request->user_id)->whereBetween('created_at', [Carbon::today()->startOfMonth(), Carbon::today()->endOfMonth()])->count());
            } else {
                $data->push(Post::withTrashed()->whereDate('created_at', Carbon::today())->count());
                $data->push(Post::withTrashed()->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count());
                $data->push(Post::withTrashed()->whereBetween('created_at', [Carbon::today()->startOfMonth(), Carbon::today()->endOfMonth()])->count());
            }
        }

        $chart = new SampleChart;
        $chart->labels($labels);
        $chart->dataset('Total Posts', 'line', $data);


        return view("admin.chart", compact("chart", "users", "total"));
    }
}
