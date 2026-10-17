<?php
include 'db.php';
if (session_status() === PHP_SESSION_NONE) { session_start(); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT id, password FROM admins WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $admin = mysqli_fetch_assoc($result);
        if ($password === $admin['password']) {
            $_SESSION['admin_id'] = $admin['id'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login | Rudransh Global</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600&display=swap" rel="stylesheet">

<style>
:root {
    --gold: #d4a574;
}
body {
    font-family: 'Instrument Sans', sans-serif;
    background: #000; /* ADMIN THEME BLACK */
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* GLASS CARD – SAME AS ADMIN */
.login-card {
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 20px;
}

/* INPUT FOCUS */
.gold-glow:focus {
    border-color: var(--gold);
    box-shadow: 0 0 0 1px rgba(212,165,116,.6),
                0 0 18px rgba(212,165,116,.25);
}
</style>
</head>

<body class="p-4">

<div class="w-full max-w-md login-card p-8 md:p-10 shadow-2xl">

    <!-- LOGO -->
    <div class="text-center mb-8">
        <img src="../assest/rohit-logo.png" alt="Rohit" class="h-20 mx-auto mb-3">
        <h2 class="text-3xl font-bold text-white tracking-tight">
            Admin <span class="text-[#d4a574]">Portal</span>
        </h2>
        <p class="text-gray-400 text-sm mt-1">
            Rudransh Global Management System
        </p>
    </div>

    <!-- ERROR -->
    <?php if (isset($error)): ?>
    <div class="bg-red-500/10 border border-red-500/40 text-red-400 text-sm p-3 rounded-lg mb-6 text-center">
        <i class="fas fa-exclamation-circle mr-2"></i> <?= $error ?>
    </div>
    <?php endif; ?>

    <!-- FORM -->
    <form method="POST" autocomplete="off" class="space-y-6">

        <!-- EMAIL -->
        <div>
            <label class="block text-gray-400 text-xs font-semibold uppercase tracking-widest mb-2 ml-1">
                Email Address
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500">
                    <i class="fas fa-envelope"></i>
                </span>
                <input type="email" name="email" required
                    class="w-full bg-white/5 border border-white/10 rounded-xl py-4 pl-12 pr-4 text-white placeholder-gray-500 outline-none transition-all gold-glow"
                    placeholder="admin@exapmle.com">
            </div>
        </div>

        <!-- PASSWORD -->
        <div>
            <label class="block text-gray-400 text-xs font-semibold uppercase tracking-widest mb-2 ml-1">
                Password
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password" id="passwordInput" required
                    class="w-full bg-white/5 border border-white/10 rounded-xl py-4 pl-12 pr-12 text-white placeholder-gray-500 outline-none transition-all gold-glow"
                    placeholder="••••••••">

                <button type="button" onclick="togglePassword()"
                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-[#d4a574] transition">
                    <i class="fas fa-eye" id="toggleIcon"></i>
                </button>
            </div>
        </div>

        <!-- BUTTON -->
        <button type="submit"
            class="w-full bg-[#d4a574] hover:bg-[#b88e5d] text-black font-bold py-4 rounded-xl transition-all transform hover:-translate-y-0.5 active:scale-95 uppercase tracking-widest text-sm">
            Secure Login <i class="fas fa-arrow-right ml-2"></i>
        </button>

        <!-- BACK LINK -->
        <div class="text-center mt-6">
            <a href="../index.php"
               class="text-gray-500 hover:text-[#d4a574] text-xs transition underline">
                Back to Website
            </a>
        </div>

    </form>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('passwordInput');
    const toggleIcon = document.getElementById('toggleIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>

</body>
</html>
