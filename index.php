<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="dist/output.css" rel="stylesheet">

</head>

<body class="font-serif">
    <h1 class="text-red-500">Hello World</h1>
    <h1 class="text-info text-center p-3">Book Library System</h1>
    <div class="bg-info">
        <h2 class="text-center">Login</h2>
        <div class="container text-center">
            <form action="./actions/login.php" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="username" placeholder="Enter your name"
                        required="required">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control w-50 m-auto" name="mobile" placeholder="Enter your mobile"
                        required="required" maxLength="10" minlength="10">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" name="password"
                        placeholder="Enter your password" required="required">
                </div>
                <select name="group">
                    <option value="Administrator">Administrator</option>
                    <option value="User">User</option>
                </select> </br>
                <button type="submit" class="btn btn-dark my-4">Login</button>
                <p>Don't have an account? <a href="./partials/registration.php" class="text-white">Register here</a></p>
            </form>
        </div>
    </div>
</body>

.

</html>