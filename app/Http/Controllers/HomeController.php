<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param    $month
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(
            route(
                'roadmap',
                [(new Carbon())->year, (new Carbon())->month]
            )
        );
    }

    public function roadmap(int $year, int $month)
    {
        /** @var User $user */
        $user = Auth::user();
        $projects = Project::all();
        $startDate = Carbon::createFromDate($year, $month);
        $endDate = (clone $startDate)->endOfMonth();
        $previous = (clone $startDate)->subMonth();
        $next = (clone $endDate)->addDay();

        return view(
            'home.index',
            compact('user', 'projects', 'startDate', 'endDate', 'previous', 'next')
        );
    }
}
