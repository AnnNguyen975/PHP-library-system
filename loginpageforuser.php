.
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Books Available for Download</h1>
    <div id="books-container"></div>

    <script>
        fetch('./actions/books.php') // Adjust the path if needed
            .then(response => response.text()) // Get raw text response
            .then(text => {
                console.log('Raw response:', text); // Log the raw text response

                // Check if the response includes "Connection successful"
                if (text.includes("Connection successful")) {
                    // Extract the JSON part
                    const jsonPart = text.split("Connection successful")[1].trim();
                    // Parse it as JSON
                    const data = JSON.parse(jsonPart); // Then parse it as JSON

                    console.log('Parsed data:', data); // Log parsed data to verify it's correct
                    const booksContainer = document.getElementById('books-container');

                    data.forEach(book => {
                        const bookCard = document.createElement('div');
                        bookCard.innerHTML = `
                    <h3>${book.name}</h3>
                    <p>${book.description}</p>
                    <a href="${book.download_link}" target="_blank">Download</a>
                `;
                        booksContainer.appendChild(bookCard);
                    });
                } else {
                    console.log("Connection failed or message not found.");
                }
            })
            .catch(error => console.error('Error fetching books:', error));

    </script>
</body>

</html>


</html>