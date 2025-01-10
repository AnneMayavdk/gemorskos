<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Successful</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="success-container">
        <h1>Welcome to Gemorskos</h1>
        <p>You have successfully logged in as <span id="user-role">
            <?php 
                $role = isset($_GET['role']) ? htmlspecialchars($_GET['role']) : 'Guest';
                echo $role; 
            ?>
        </span>.</p>
        <form method="POST" action="inloggen.php">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
