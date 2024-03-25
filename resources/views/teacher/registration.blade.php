<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
    
</head>
<body>
<div class="container p-5">
    <div class="card p-5 rounded">
        <div>
            <a class="d-inline" href="{{ route('teacher.profile') }}"><button class="btn btn-secondary btn-sm mb-3 d-inline">Back</button></a>
        </div>
        <form class="text-right" method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger btn-sm" type="submit">Logout</button>
        </form>
        <h3 class="text-center">Create User</h3>

        <form method="POST" action="{{ route('registration.store') }}">
            @csrf

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role">
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="uid">ID</label>
                <input type="text" id="uid" name="uid" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phoneNo">Phone No</label>
                <input type="text" id="phoneNo" name="phoneNo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="dept">Department</label>
                <input type="text" id="dept" name="dept" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-sm">Create</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
