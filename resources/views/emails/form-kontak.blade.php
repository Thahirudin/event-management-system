<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Notification</title>
    <!-- Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
       <img src="https://drive.google.com/uc?id=1AfUUyQRiU0o7RMe7fiYnHxyKNe-tPB8P" alt="Logo" class="img-fluid">
        <h1 class="mt-3">Email Notification</h1>
        <p class="lead"><strong>Dari:</strong> {{ $data['email'] }}</p>
        <p class="lead"><strong>Subjek:</strong> {{ $data['subjek'] }}</p>
        <p><strong>Pesan:</strong></p>
        <p>{{ $data['pesan'] }}</p>
    </div>
    <div class="footer">
        <p>&copy; 2023 Gamevent. All rights reserved.</p>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <!-- Make sure to include Bootstrap's JavaScript if you plan to use it in your template -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>
