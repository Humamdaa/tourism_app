<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login Page</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="{{asset('admin_dashboard/css/login/login.css')}}">
</head>

<body>

@if(session('error'))
    <div class="error-message">
        {{ session('error') }}
    </div>
@endif

<section>
    <div class="form-box">
        <div class="form-value">
            <form action="{{route('login')}}" method="post">
                @csrf
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button class="btn">Log In</button>
            </form>
        </div>
    </div>
</section>
</body>

</html>
