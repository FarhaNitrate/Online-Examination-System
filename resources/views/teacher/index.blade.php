<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
    
</head>
<body>
    <div class="container p-5">
        <div class="profile card p-5 rounded">
            <div>
                <a href="{{ route('students') }}"><button class="btn btn-sm btn-primary">Students</button></a>
                <a href="{{ route('registration') }}"><button class="btn btn-sm btn-secondary">Registration</button></a>
            </div>
            <form class="text-right" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger btn-sm" type="submit">Logout</button>
            </form>
        
            <h3 class="text-center">Teacher Profile</h3>

            <p>Name: {{ $teacher->name }}</p>
            <p>Teacher Id: {{ $teacher->uniId }}</p>
            <p>Email: {{ $teacher->email }}</p>
            <p>Phone No: {{ $teacher->phoneNo }}</p>
            <p>Department: {{ $teacher->dept }}</p>

            <div>
                <a class="d-inline" href="{{ route('teacher.edit') }}"><button class="btn btn-info btn-sm d-inline">Edit</button></a>
            </div>
        </div>
    </div>
</body>
</html>
