<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 - Unathorized Access</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <img class="logo" src="{{ Vite::asset('resources/img/logo_1.png') }}" alt="">
        </div>
        <h1>Error 403 - Unathorized Access</h1>
        <p>You are not authorized to access this resource.</p>
        <p>Return to the <a href="{{ route('user.dashboard') }}">homepage</a>.</p>
    </div>
</body>

</html>
