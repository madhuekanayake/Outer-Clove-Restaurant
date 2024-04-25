<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../Styles/adminnav.css">
    <link rel="stylesheet" href="../Styles/register3.css">
</head>
<body>
    <div>
        <img src="../Images/st.jpg" alt="">
    </div>
    <div class="SIGNUP">
        <h1>SIGN UP</h1>
        <form method="post" action="./customer_registeradd.php">
            <label>First Name</label>
            <input type="text" name="first_name" required>
            <label>Last Name</label>
            <input type="text" name="last_name" required>
            <label>Gender</label>
            <input type="text" name="gender" required>
            <label>Contact Number</label>
            <input type="tel" name="contact_number" required>
            <label>Address</label>
            <input type="text" name="address" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" name="submit" value="Submit"> 
        </form>
        <p>Already have an account? <a href="customer_login.php">Login Here</a></p>
    </div>
    
</body>
</html>