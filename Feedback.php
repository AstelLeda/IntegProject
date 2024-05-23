<!DOCTYPE html>
<html>
<head>
    <title>Project TimberTech</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .feedback-panel {
            max-width: 400px;
            margin-top: 50px;
        }
        .error-message {
            color: red;
        }
        .success-message {
            color: green;
        }
    </style>
</head>
<body>
    <header>
        <h1>TimberTech Hardware Hub</h1>
    </header>

    <main>
        <div class="feedback-panel">
            <h2>Feedback</h2>
            <form id="feedbackForm">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit" class="submit-button">Submit</button>
            </form>
            <p id="errorMessage" class="error-message"></p>
            <p id="successMessage" class="success-message" style="display: none;">Thank you for your feedback!</p>
        </div>
    </main>

    <script>
        document.getElementById('feedbackForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const name = document.getElementById('name').value.trim();
            const message = document.getElementById('message').value.trim();
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');

            // Clear previous error/success messages
            errorMessage.textContent = '';
            successMessage.style.display = 'none';

            // Validate name and message
            if (name === '' || message === '') {
                errorMessage.textContent = 'Name and message are required.';
                return;
            }

            // Simulate form submission (you can replace this with actual form submission)
            setTimeout(function() {
                // Clear form fields
                document.getElementById('name').value = '';
                document.getElementById('message').value = '';
                // Show success message
                successMessage.style.display = 'block';
            }, 1000); // Simulate 1 second delay
        });
    </script>
</body>
</html>
