<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login </title>
    <link rel="icon" href="img/icon.avif" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Books </h1>
    <div id="books-container"></div>

    <!-- Upload Form -->
    <div class="container mt-4">
        <h2>Upload New Book</h2>
        <form id="upload-form-user">
            <div class="mb-3">
                <label for="bookName" class="form-label">Book Name</label>
                <input type="text" class="form-control" id="bookName" required>
            </div>
            <div class="mb-3">
                <label for="bookDescription" class="form-label">Description</label>
                <textarea class="form-control" id="bookDescription" required></textarea>
            </div>
            <div class="mb-3">
                <label for="downloadLink" class="form-label">Download Link</label>
                <input type="url" class="form-control" id="downloadLink" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload Book</button>
        </form>
    </div>
    <script>

        // Handling the upload form submission
        document.getElementById('upload-form-user').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission

            const bookName = document.getElementById('bookName').value;
            const bookDescription = document.getElementById('bookDescription').value;
            const downloadLink = document.getElementById('downloadLink').value;

            // Sending the book data to the server
            fetch('./actions/userbooks.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    name: bookName,
                    description: bookDescription,
                    download_link: downloadLink
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Book uploaded successfully!');
                        window.location = "loginpageforuser.php";
                    } else {
                        alert('Error uploading book: ' + data.error);
                    }
                })
                .catch(error => console.error('Error uploading book:', error));
        });
    </script>


</body>

</html>