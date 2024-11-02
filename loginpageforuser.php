<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="icon" href="img/icon.avif" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Books </h1>
    <div class="container-fluid">
        <div class="row">
            <!-- User Info Sidebar -->
            <div class="col-md-3 p-3 bg-light">
                <h3>User Information</h3>
                <div id="user-info">
                    <?php
                    session_start();
                    if (isset($_SESSION['username'])) {
                        echo "<p><strong>Name:</strong> " . htmlspecialchars($_SESSION['username']) . "</p>";
                        echo "<p><strong>Mobile:</strong> " . htmlspecialchars($_SESSION['mobile']) . "</p>";
                        echo "<a href='actions/logout.php' class='btn btn-danger'>Logout</a>";
                    } else {
                        echo "<p>Please log in to see user information.</p>";
                    }
                    ?>
                    <h5>Change Password</h5>
                    <form action="./actions/change_password.php" method="POST">
                        <div class="mb-2">
                            <input type="password" class="form-control" name="current_password"
                                placeholder="Current Password" required>
                        </div>
                        <div class="mb-2">
                            <input type="password" class="form-control" name="new_password" placeholder="New Password"
                                required>
                        </div>
                        <div class="mb-2">
                            <input type="password" class="form-control" name="confirm_password"
                                placeholder="Confirm New Password" required>
                        </div>
                        <button id="change-password-form" type="submit" class="btn btn-primary">Change Password</button>
                    </form>


                    <?php


                    // Check if there are any messages to display
                    if (isset($_SESSION['password_change_messages']) && !empty($_SESSION['password_change_messages'])) {
                        echo '<div class="alert alert-info">';
                        foreach ($_SESSION['password_change_messages'] as $message) {
                            echo '<p>' . htmlspecialchars($message) . '</p>'; // Output message securely
                        }
                        echo '</div>';
                        // Clear messages after displaying them
                        unset($_SESSION['password_change_messages']);
                    }
                    ?>


                    <!-- User info will be displayed here -->
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <h1>Books Available for Download</h1>
                <button class="btn btn-primary" onclick="window.location.href='userbooks.php'">
                    Upload your e-books to contribute our library
                </button>
                <div class="mt-3 mb-3">
                    <input type="text" id="search-bar" class="form-control" placeholder="Search for a book by name...">
                </div>
                <div id="books-container" class="mt-3"></div>
            </div>
        </div>
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
                bookCard.classList.add('card', 'mb-3', 'p-3');
                bookCard.innerHTML = `
                    <h3>${book.name}</h3>
                    <p>${book.description}</p>
                    <a href="${book.download_link}" target="_blank">Download</a>
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

    </script>
</body>

</html>