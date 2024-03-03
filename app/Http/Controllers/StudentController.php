<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function showProfile()
    {
        $student = auth()->user();
        return view('student.index', compact('student'));
    }

    public function edit()
    {
        $student = auth()->user();
        return view('student.edit', compact('student'));
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


        $student = auth()->user();

        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->uniId = $validatedData['uid'];
        $student->phoneNo = $validatedData['phoneNo'];
        $student->dept = $validatedData['dept'];
        $student->save();

        return view('student.index', compact('student'));
    }
}
