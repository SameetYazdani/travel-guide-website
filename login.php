 
<?php
include('includes/header.php');
include 'db.php';
 



$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['name']; // Use the same key used in header.php
            $_SESSION['email'] = $user['email'];
            header("Location: index.php"); // Redirect to homepage or welcome
            exit;
        } else {
            $message = "Invalid credentials.";
        }
    } else {
        $message = "User not found.";
    }
}
?>


<div class="container mt-5 col-md-4" style="margin-bottom: 300px;">
    <h3>Login</h3>
    <p class="text-primary"><?= $message ?></p>
    <form method="post">
        <input type="email" name="email" class="form-control mt-5" placeholder="Email" required>
        <input type="password" name="password" class="form-control mt-4" placeholder="Password" required>
        <button type="submit" class="btn btn-primary mt-4">Login</button>
        <div class="text-end mt-2">
        <small>Don't have an account? <a href="signup.php">Sign up</a></small>
      </div>
    </form>
</div>
