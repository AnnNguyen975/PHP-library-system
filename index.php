<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Library System</title>
    <link rel="icon" href="img/icon.avif" type="image/png">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/output.css">

</head>

<body class="flex items-center justify-center min-h-screen bg-cover bg-center"
    style="background-image: url('img/image.jpg');">
    <div class="w-96 p-8 bg-transparent border-2 border-white/20 backdrop-blur-lg shadow-lg rounded-lg text-white">

        <form action="./actions/login.php" method="POST">
            <h1 class=" text-[#d87093] text-3xl font-bold text-center mb-6">Login</h1>

            <div class="relative mb-6">
                <input
                    class="text-[#d87093] w-full h-12 px-4 pr-10 bg-transparent border border-white/20 rounded-full  placeholder-white focus:outline-none"
                    type="text" name="username" placeholder="Username" required>
                <i class='text-[#d87093] bx bxs-user absolute right-4 top-1/2 transform -translate-y-1/2 text-lg'></i>
            </div>
            <div class="relative mb-6">
                <input
                    class="text-[#d87093] w-full h-12 px-4 pr-10 bg-transparent border border-white/20 rounded-full  placeholder-white focus:outline-none"
                    type="password" name="password" placeholder="Password" required>
                <i
                    class='text-[#d87093] bx bxs-lock-alt absolute right-4 top-1/2 transform -translate-y-1/2 text-lg'></i>
            </div>

            <div class="flex justify-between items-center mb-4 text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="text-[#d87093] mr-2">
                    Remember Me
                </label>
                <a href="#" class="text-[#d87093] hover:underline">Forgot Password?</a>
            </div>

            <button
                class="text-[#d87093] w-full h-11 bg-white  rounded-full font-semibold shadow hover:bg-gray-200 transition"
                type="submit">Login</button>

            <div class="text-center text-sm mt-6">
                <p>Don't have an account? <a href="./partials/registration.php"
                        class="text-[#d87093] font-semibold hover:underline">Register here</a></p>

            </div>
        </form>
    </div>
</body>