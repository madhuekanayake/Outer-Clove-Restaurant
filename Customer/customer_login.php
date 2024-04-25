<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Styles/register3.css">
    <link rel="stylesheet" href="../Styles/adminnav.css">
</head>
<body>
    <div class="LOG IN">
        <h1>LOGIN</h1>
        <form method="post" action="customer_loginadd.php">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" name="submit" value="Submit"> 
        </form>
        <p>Don't have an account? <a href="./customer_registration.php">Sign up here</a></p>
    </div>
</body>
</html>