<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $projek = DB::table('projek')->count();
        $tim = DB::table('tim')->count();
        $clients = DB::table('clients')->count();
        return view('pages.dashboard.index', compact(['projek', 'tim', 'clients']));
    }
}
