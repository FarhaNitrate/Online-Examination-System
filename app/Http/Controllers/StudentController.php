<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Message;
use App\Models\User;


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

    public function teachers()
    {
        $teachers = User::where('role', 'teacher')->get();
        
        return view('student.teachers', compact('teachers'));
    }

    public function message($id)
    {
        $to = $id;
        $messages = Message::where('sender_id', $id)
                        ->where('receiver_id', Auth::id())
                        ->orWhere('sender_id', Auth::id())
                        ->where('receiver_id', $id)
                        ->get();

        return view('student.message', compact('messages','to'));
    }

    public function messageStore(Request $request){
        $request->validate([
            'to' => 'required',
            'content' => 'required|string',
        ]);

        $message = new Message();
        $message->receiver_id = $request->input('to');
        $message->sender_id = auth()->id();
        $message->content = $request->input('content');

        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully');
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
