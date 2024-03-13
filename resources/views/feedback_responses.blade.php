<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Responses</title>
    <style>
    /* Reset default margin and padding */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        max-width: 800px;
        width: 90%;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin-bottom: 15px;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    li:last-child {
        margin-bottom: 0;
    }

    li span {
        font-weight: bold;
        color: #007bff;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Customer Feedback Responses</h1>
        <ul>
            @foreach($feedbackResponses as $feedback)
            <li><span>Customer phone:</span> {{ $feedback->phone }},<br><br> <span>Feedback Response:</span>
                {{ $feedback->response }}</li>
            @endforeach
        </ul>
    </div>
</body>

</html>