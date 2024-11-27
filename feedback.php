<?php


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the POST request
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $rating = intval($_POST['rating']);
    $therapists = $conn->real_escape_string($_POST['therapists']);
    $comments = $conn->real_escape_string($_POST['comments']);

    // SQL query to insert data into the feedback table
    $sql = "INSERT INTO feedback (name, email, rating, therapists, comments)
            VALUES ('$name', '$email', $rating, '$therapists', '$comments')";


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .feedback-message {
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>

<!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h2 class="text-uppercase text-white font-weight-bold">Feedback Form</h2>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>

    <section class="page-section">
        <div class="container">
        <form method="post" >
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="rating">Rating (1 to 5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required>

        <label for="therapists"> Therapists Name: </label>
        <input type="text" id="therapists" name="therapists" required>

        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" rows="4"></textarea>

        <input type="submit"name="submit">
    </form>


</div>
        </div>