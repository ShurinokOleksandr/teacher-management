<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Schedule;
class ScheduleController extends Controller
{
    public function index($id)
    {
        $subjects = Schedule::find($id)->subject;
        return response()->json($subjects);
    }
}
