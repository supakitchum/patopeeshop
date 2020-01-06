<?php

namespace App\Http\Controllers\API;

use App\Model\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatController extends Controller
{
    function lineChart()
    {
        $results = [];
        $year = Carbon::now()->year;
        for ($i = 0;$i < 12;$i++){
            $sum = Order::where('status','>',2)->whereMonth('created_at',$i+1)->sum('total');
            $results[] = [
                'm' => $year.'-'.($i+1 > 9 ? $i+1:'0'.($i+1)),
                'item1' => $sum
            ];
        }
        return response()->json($results);
    }
}
