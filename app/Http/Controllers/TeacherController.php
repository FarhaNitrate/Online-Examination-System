<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Message;
use App\Models\User;

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

    public function students()
    {
        $students = User::where('role', 'student')->get();
        
        return view('teacher.students', compact('students'));
    }

    public function message($id)
    {
        $to = $id;
        $messages = Message::where('sender_id', $id)
                        ->where('receiver_id', Auth::id())
                        ->orWhere('sender_id', Auth::id())
                        ->where('receiver_id', $id)
                        ->get();

        return view('teacher.message', compact('messages','to'));
    }

    public function registration()
    {
        return view('teacher.registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|in:teacher,student',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'uid' => 'required|string|unique:users,uniId',
            'phoneNo' => 'required|string',
            'dept' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->role = $request->input('role');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->uniId = $request->input('uid');
        $user->phoneNo = $request->input('phoneNo');
        $user->dept = $request->input('dept');
        $user->password = Hash::make($request->input('password')); 

        $user->save();

        return redirect()->back()->with('success', 'User created successfully');
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
