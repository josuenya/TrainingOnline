<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Course;


class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('user')->withCount('episodes')->get();
        return Inertia::render('Courses/Index',[
            'courses' => $courses
        ]);
    }

    public function show(int $id)
    {
         $course = Course::where('id',$id)->with('episodes')->first();
         //watched contiendra les episodes terminer par l'utilisateur
         $watched = auth()->user()->episodes;
         dd($course);
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
