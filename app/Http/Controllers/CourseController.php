<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('user')
            ->select('courses.*', DB::raw(
                '(SELECT COUNT(DISTINCT(user_id))
                      FROM completions
                      INNER JOIN episodes on completions.episode_id = episodes.id
                      WHERE episodes.course_id = courses.id
                ) AS participants'
            ))
            ->withCount('episodes')->latest()->get();

        return Inertia::render('Courses/Index',[
            'courses' => $courses
        ]);
    }

    public function show(int $id)
    {
         $course = Course::where('id',$id)->with('episodes')->first();
//         watched contiendra les episodes terminer par l'utilisateur
         $watched = auth()->user()->episodes;
         return Inertia::render('Courses/Show',[
             'course'=> $course,
             'watched' => $watched,
         ]);
    }

    public function toggleProgress(Request $request)
    {
        $id = $request->input('episodeId');
        $user = auth()->user();
        $user->episodes()->toggle($id);
        return $user->episodes;
    }
}
