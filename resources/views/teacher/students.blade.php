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
                <a href="{{ route('teacher.profile') }}"><button class="btn btn-sm btn-primary">Go Back</button></a>
            </div>
            <form class="text-right" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger btn-sm" type="submit">Logout</button>
            </form>
        
            <div class="container">
                <h1>List of Students</h1>
                @foreach ($students as $student)
                <div class="border rounded p-1 m-1 d-flex justify-content-between">
                    <h6 class="text-uppercase">{{ $student->name }}</h6><a class="btn btn-sm btn-secondary" href="{{ route('message', $student->id) }}">Message</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html>
