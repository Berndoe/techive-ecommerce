<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login_signup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>


<body>


<form action="../actions/register_proc.php" method="post">
    <div class="container">
        <p style="font-size:20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: black;">Sign up with your email</p>

        <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><p>Already have an account? <a href="./login.php"style="text-decoration: none; color:blue;">Sign in</a></p></div>
        <input class="form-control" type="text" name="customer_name" placeholder="Full name" autocomplete="on" required><br>
        <input class="form-control" type="email" name="customer_email" placeholder="Email address" autocomplete="on" required><br>
        <input class="form-control" type="password" name="customer_pass" placeholder="Password" autocomplete="on" required><br>  
        <input class="form-control" type="text" name="customer_country" placeholder="Country" autocomplete="on" required><br>
        <input class="form-control" type="text" name="customer_city" placeholder="City" autocomplete="on" required><br>
        <input class="form-control" type="text" name="customer_contact" placeholder="Contact" autocomplete="on" required><br>
        <input class="form-control" type="file" name="customer_image" placeholder="Image" autocomplete="on"><br>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="checkBox" required>
            <label class="form-check-label" for="checkBox">I agree to the <a href="./terms&condtions.php" style="text-decoration: none;">Terms of Service and Privacy Policy</a></label>
        </div>
        <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
            <button class="btn btn-primary" name="register_customer" type="submit">Create account</button></a>
        </div><br>
        <!-- <p style="color:red;" type="hidden">Account already exists</p> -->
    </div>
</form> 
</body>
</html>


