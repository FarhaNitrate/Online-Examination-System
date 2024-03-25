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
    <div class="card p-5 rounded">
        <h3 class="text-center">Edit Teacher Profile</h3>

        <div>
            <a class="d-inline" href="{{ route('teacher.profile') }}"><button class="btn btn-secondary btn-sm mb-3 d-inline">Back</button></a>
        </div>

        <form method="POST" action="{{ route('teacher.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Teacher Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $teacher->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Teacher Email</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ $teacher->email }}" required>
            </div>

            <div class="form-group">
                <label for="uid">Teacher ID</label>
                <input type="text" id="uid" name="uid" class="form-control" value="{{ $teacher->uniId }}" required>
            </div>

            <div class="form-group">
                <label for="phoneNo">Phone No</label>
                <input type="text" id="phoneNo" name="phoneNo" class="form-control" value="{{ $teacher->phoneNo }}" required>
            </div>

            <div class="form-group">
                <label for="dept">Department</label>
                <input type="text" id="dept" name="dept" class="form-control" value="{{ $teacher->dept }}" required>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
