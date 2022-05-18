<?php

namespace App\Http\Controllers;

use App\Models\Team;

class NbaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::with('rosters.statistic')->get();

        return response()->json([
            'result' => true,
            'teams' => $teams
        ], 200);
    }
}
