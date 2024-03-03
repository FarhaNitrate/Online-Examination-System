<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(url('css/style.css')); ?>">

</head>
<body>
    <div class="container p-5">
        <div class="profile card p-5 rounded">
            <form class="text-right" method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button class="btn btn-danger btn-sm" type="submit">Logout</button>
            </form>
        
            <h3 class="text-center">Student Profile</h3>

            <p>Name: <?php echo e($student->name); ?></p>
            <p>Student Id: <?php echo e($student->uniId); ?></p>
            <p>Email: <?php echo e($student->email); ?></p>
            <p>Phone No: <?php echo e($student->phoneNo); ?></p>
            <p>Department: <?php echo e($student->dept); ?></p>

            <div>
                <a class="d-inline" href="<?php echo e(route('student.edit')); ?>"><button class="btn btn-info btn-sm d-inline">Edit</button></a>
            </div>
        </div>
    </div>

</body>
</html>
<?php /**PATH F:\New folder\htdocs\Websites\cse470V2\resources\views/student/index.blade.php ENDPATH**/ ?>