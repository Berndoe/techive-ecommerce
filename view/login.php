<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login_signup.css">

    <title>Login</title>
</head>

<body>

    <form method="POST" action="../actions/login_proc.php">
        <div class="container">
            <p style="font-size:20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Sign in with your email</p>
            <p id="signup">Don't have an account? <a href="register.php" style="text-decoration: none;">Sign up</a></p>
            <div class="mb-3">
                <input name="customer_email" type="email" class="form-control" id="inputEmail" placeholder="Email address" required><br>
            </div>
            <input name="customer_pass" type="password" class="form-control" id="inputPassword" placeholder="Password" required><br>
            <div class="d-grid gap-2 col-12 mx-auto">
                <button id="login" name="loginBtn" class="btn btn-primary" type="submit">Continue</button><br>
            </div>
            <a href="#" style="font-size: 12px;" id="newPass">Forgot your password?</a>
        </div>
    </form>
</body>

</html>