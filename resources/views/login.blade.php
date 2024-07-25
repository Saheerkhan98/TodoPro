<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Auth in Laravel</title>
</head>
<body>
    <h1>Login</h1>
    <form id="loginForm" method="POST" action="{{ route('login1') }}">
        @csrf
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <h1>Dashboard</h1>
    <div id="dashboardContent"></div>

</body>
</html>

