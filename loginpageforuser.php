<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset=" UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login </title>
    <link rel="icon" href="img/icon.avif" type="image/png">
    <link href="dist/outputad.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body class=" flex  h-full m-0 min-h-screen bg-cover bg-center" style="background-image: url('img/image.jpg');">
    <div
        class=" basis-[300px] flex-shrink-0  h-full  text-white p-4  border-2 border-white/20 backdrop-blur-lg shadow-lg rounded-lg">
        <h3 class="text-[#d87093] text-xl font-bold text-center mb-6">User Information</h3>
        <div id="user-info" class="flex-col">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "<p class='text-[#d87093]'><strong>Name:</strong> " . htmlspecialchars($_SESSION['username']) . "</p></br>";
                echo "<p class='text-[#d87093]'><strong>Mobile:</strong> " . htmlspecialchars($_SESSION['mobile']) . "</p></br>";
                echo "<a href='actions/logout.php' class='bg-pink-500 font-bold py-2 px-5 ml-14 text-white rounded hover:bg-pink-600'><i class='bx bxs-log-out'></i>
        Logout
    </a>";
            } else {
                echo "<p>Please log in to see user information.</p>";
            }
            ?>


            <h5 class="text-[#d87093] text-xl font-bold text-center mb-6 mt-7">Change Password</h5>
            <form action="./actions/change_password.php" method="POST">
                <div class="relative mb-6">
                    <input type=" password"
                        class="text-[#d87093] w-full h-12 px-4 pr-10 bg-transparent border border-white/20 rounded-full  placeholder-white focus:outline-none"
                        name="current_password" placeholder="Current Password" required>
                </div>
                <div class="relative mb-6">
                    <input type=" password"
                        class="text-[#d87093] w-full h-12 px-4 pr-10 bg-transparent border border-white/20 rounded-full  placeholder-white focus:outline-none"
                        name="new_password" placeholder="New Password" required>
                </div>
                <div class="relative mb-6">
                    <input type=" password"
                        class="text-[#d87093] w-full h-12 px-4 pr-10 bg-transparent border border-white/20 rounded-full  placeholder-white focus:outline-none"
                        name="confirm_password" placeholder="Confirm New Password" required>
                </div>
                <button type="submit" id="change-password-form"
                    class="text-[#d87093] w-full h-11 bg-white  rounded-full font-semibold shadow hover:bg-gray-200 transition">Change
                    Password</button>
            </form>

            <?php
            if (isset($_SESSION['password_change_message'])) {
                echo "<p class='text-success mt-3'>" . $_SESSION['password_change_message'] . "</p>";
                unset($_SESSION['password_change_message']); // Clear message after display
            }
            ?>
            <!-- User info will be displayed here -->
        </div>
        <button
            class="text-[#d87093] w-full h-11 bg-white  rounded-full font-semibold shadow hover:bg-gray-200 transition mt-11"
            onclick="window.location.href='userbooks.php'">
            Upload your e-books
        </button>
    </div>

    <!-- Main Content -->
    <div class="">
        <h1 class="text-[#d87093] text-xl font-bold text-center mb-6 mt-7">Books Available for Download</h1>

        <div class="">
            <input type="text" id="search-bar"
                class="text-[#d87093] w-full h-12 px-4 pr-10 bg-transparent border border-white/20 rounded-full  placeholder-white focus:outline-none"
                placeholder="Search for a book by name...">
        </div>
        <div id="books-container" class="mt-3"></div>
    </div>




    <script>


        document.getElementById('change-password-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
        });

        // Fetch and display books
        let booksData = []; // To store fetched books

        fetch('./actions/books.php')
            .then(response => response.text())
            .then(text => {
                console.log('Raw response:', text);
                let jsonPart = text.includes("Connection successful") ? text.split("Connection successful")[1].trim() : text;

                try {
                    booksData = JSON.parse(jsonPart); // Parse the JSON part
                    displayBooks(booksData); // Display books initially
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                }
            })
            .catch(error => console.error('Error fetching books:', error));

        // Function to display books
        function displayBooks(books) {
            const booksContainer = document.getElementById('books-container');
            booksContainer.innerHTML = ''; // Clear existing content

            books.forEach(book => {
                const bookCard = document.createElement('div');
                bookCard.classList.add(
                    'bg-white',         // Background color
                    'shadow-md',        // Shadow for elevation
                    'rounded-lg',       // Rounded corners
                    'p-4',              // Padding
                    'm-2',              // Margin around the card
                    'transition',        // For smooth hover effects
                    'hover:shadow-lg'   // Elevate shadow on hover
                );

                bookCard.innerHTML = `
            <h3 class="text-[#d87093] text-xl font-bold mb-2">${book.name}</h3>
            <p class="text-[#d87093]  mb-4">${book.description}</p>
            <a href="${book.download_link}" target="_blank" class="bg-pink-500 font-bold py-2 px-5  text-white rounded hover:bg-pink-600">Download</a>
        `;

                booksContainer.appendChild(bookCard);
            });
        }

        // Filter books based on search query
        document.getElementById('search-bar').addEventListener('input', function () {
            const query = this.value.toLowerCase();
            const filteredBooks = booksData.filter(book => book.name.toLowerCase().includes(query));
            displayBooks(filteredBooks);
        });

    </script>
</body>

</html>