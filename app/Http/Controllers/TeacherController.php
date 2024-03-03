<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function showProfile()
    {
        $teacher = auth()->user();
        return view('teacher.index', compact('teacher'));
    }

    public function edit()
    {
        $teacher = auth()->user();
        return view('teacher.edit', compact('teacher'));
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'uid' => 'required|string|max:255',
            'phoneNo' => 'required|string|max:20',
            'dept' => 'required|string|max:100',
        ]);


        $teacher = auth()->user();

        $teacher->name = $validatedData['name'];
        $teacher->email = $validatedData['email'];
        $teacher->uniId = $validatedData['uid'];
        $teacher->phoneNo = $validatedData['phoneNo'];
        $teacher->dept = $validatedData['dept'];
        $teacher->save();

        return view('teacher.index', compact('teacher'));
    }
}
