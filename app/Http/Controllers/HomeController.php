<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Appointment;
use DB;
use Cache;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function daysToMinutes($days)
    {
        $hours = $days * 24;
        return $hours * 60;
    }

    public function index()
    {
        // 1=Sunday, 2=Monday, 3=Tuesday, 4=Wednesday, 5=Thursday, 6=Friday, 7=Saturday
        $minutes = $this->daysToMinutes(7);
        
        $appointmentsByDay = Cache::remember('appointments_by_day', $minutes, function () {
            $results = Appointment::select([
                    DB::raw('DAYOFWEEK(scheduled_date) as day'),
                    DB::raw('COUNT(*) as count')
                ])
                ->groupBy(DB::raw('DAYOFWEEK(scheduled_date)'))
                ->whereIn('status', ['Confirmada', 'Atendida'])
                ->get(['day', 'count'])
                ->mapWithKeys(function ($item) {
                    return [$item['day'] => $item['count']];
                })->toArray();

            $counts = [];
            for ($i=1; $i<=7; ++$i) {
                if (array_key_exists($i, $results))
                    $counts[] = $results[$i];
                else
                    $counts[] = 0;
            }

            return $counts;
        }); // jue, vie -> [..., 1, 1, ...]
        
    
        // dd($appointmentsByDay);
        return view('home', compact('appointmentsByDay'));
    }
}
