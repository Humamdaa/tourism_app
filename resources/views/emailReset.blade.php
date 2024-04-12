<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f7f7f7; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background: #fff; }
        .form-group { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; }
        input[type=email], button { width: 100%; padding: 10px; margin-top: 5px; }
        button { background-color: #3498db; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #2980b9; }
    </style>
</head>
<body>
<div class="container">
    <h2>Reset Password</h2>
    <form action="{{route('password.email')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit">Send Password Reset Link</button>
    </form>
</div>

</body>
</html>
