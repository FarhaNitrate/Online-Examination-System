<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(url('css/style.css')); ?>">

</head>
<body>
    <div class="container p-5">
        <div class="profile card p-5 rounded text-center">

            <div class="text-center">
                <img class="logo" src="https://www.bracu.ac.bd/sites/default/files/resources/media/bracu_logo.png">
            </div>
    
            <h3 class="text-center my-5 text-uppercase">Welcome to Student Management System</h3>

            <a class="mt-4" href="<?php echo e(route('login')); ?>"><button class="btn btn-info btn-sm d-inline">Login</button></a>
        </div>
    </div>
</body>
</html>
<?php /**PATH F:\New folder\htdocs\Websites\cse470V2\resources\views/index.blade.php ENDPATH**/ ?>