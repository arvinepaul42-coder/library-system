<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Login / Signup</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.1); width: 350px; }
        h2 { margin-top: 0; color: #333; text-align: center; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #007bff; border: none; color: white; border-radius: 6px; font-weight: bold; cursor: pointer; }
        button:hover { background: #0056b3; }
        .toggle-link { text-align: center; margin-top: 15px; font-size: 14px; color: #007bff; cursor: pointer; }
    </style>
</head>
<body>
<div class="card">
    <div id="login-view">
        <h2>Library Login</h2>
        <form action="auth.php" method="POST">
            <input type="hidden" name="action" value="login">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign In</button>
        </form>
        <div class="toggle-link" onclick="toggleView()">Don't have an account? Sign up here</div>
    </div>
    <div id="signup-view" style="display: none;">
        <h2>Create Account</h2>
        <form action="auth.php" method="POST">
            <input type="hidden" name="action" value="register">
            <input type="text" name="username" placeholder="Choose Username" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="password" name="password" placeholder="Create Password" required>
            <select name="role">
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit">Register</button>
        </form>
        <div class="toggle-link" onclick="toggleView()">Already registered? Login here</div>
    </div>
</div>
<script>
    function toggleView() {
        const login = document.getElementById('login-view');
        const signup = document.getElementById('signup-view');
        if (login.style.display === 'none') {
            login.style.display = 'block';
            signup.style.display = 'none';
        } else {
            login.style.display = 'none';
            signup.style.display = 'block';
        }
    }
</script>
</body>
</html>