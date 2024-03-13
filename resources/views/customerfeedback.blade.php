<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-top: 0;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    textarea {
        width: 90%;
        height: 100px;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" action="{{ url('/feedback') }}">
            @csrf
            <h2>Send SMS feedback request to customers</h2>
            <label for="phone">Phone:</label>
            <textarea name="phones" id="phone" placeholder="Enter phone numbers..."></textarea>

            <label for="message">Feedback request message:</label>
            <textarea name="message" id="message" placeholder="Enter feedback request message..."></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>