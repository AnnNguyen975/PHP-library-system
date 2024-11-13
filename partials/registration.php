<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="icon" href="../img/icon.avif" type="image/png">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../dist/output.css">
</head>

<body class="flex items-center justify-center min-h-screen bg-cover bg-center"
    style="background-image: url('../img/image.jpg');">

    <div class="w-96  p-4 bg-transparent border-2 border-white/20 backdrop-blur-lg shadow-lg rounded-lg text-white">
        <form action="../actions/register.php" method="POST">
            <h1 class="text-[#d87093] text-3xl font-bold text-center mb-6">Registration Page</h1>

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
            <div class="relative mb-6">
                <input
                    class="text-[#d87093] w-full h-12 px-4 pr-10 bg-transparent border border-white/20 rounded-full  placeholder-white focus:outline-none"
                    type="password" name="cpassword" placeholder="Confirm Password" required>
                <i
                    class='text-[#d87093] bx bxs-lock-alt absolute right-4 top-1/2 transform -translate-y-1/2 text-lg'></i>
            </div>
            <div class="flex relative mb-6 items-center"> <!-- Added flex and items-center -->
                <select name="group"
                    class="text-[#d87093] w-full h-12 px-4 pr-10 bg-transparent border border-white/20 rounded-full  placeholder-white focus:outline-none">
                    <option value="Administrator">Administrator</option>
                    <option value="User">User</option>
                </select>
            </div>

            <button
                class="text-[#d87093] w-full h-11 bg-white  rounded-full font-semibold shadow hover:bg-gray-200 transition"
                type="submit">Register</button>

            <div class="text-center text-sm mt-6">
                <p>Already have an account?<a href="../index.php"
                        class="text-[#d87093] font-semibold hover:underline">Login here</a></p>

            </div>
        </form>
    </div>
</body>

</html>