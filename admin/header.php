<?php
include 'db.php';
include 'auth.php';

$currentPage = basename($_SERVER['PHP_SELF']);
function isActive($page) {
    global $currentPage;
    return $currentPage === $page
        ? 'bg-gold/20 text-gold'
        : 'text-gray-300 hover:bg-gold/20 hover:text-gold';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Rudransh Global</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { gold: '#d4a574' }, fontFamily: { sans: ['Instrument Sans', 'sans-serif'] } } }
        }
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        }
        function toggleModal(show) {
            const modal = document.getElementById('passwordModal');
            if (show) modal.classList.remove('hidden');
            else modal.classList.add('hidden');
        }
    </script>
</head>
<body class="bg-black text-white font-sans overflow-hidden">

<div class="flex h-screen relative">
    <aside id="sidebar" class="w-64 bg-zinc-900/95 backdrop-blur-xl border-r border-white/10 flex flex-col fixed inset-y-0 left-0 z-50 transition-transform duration-300 -translate-x-full md:translate-x-0">
        <div class="p-2 text-center border-b border-white/10 relative">
            <button onclick="toggleSidebar()" class="md:hidden absolute right-4 top-4 text-gray-400"><i class="fa-solid fa-xmark"></i></button>
            <img src="../assest/rohit-logo.png" alt="Rohit" class="h-16 mx-auto">
        </div>
        <nav class="flex-1 p-4 space-y-2 text-sm">
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= isActive('dashboard.php') ?>">
                <i class="fa-solid fa-chart-line"></i> Dashboard
            </a>
             <a href="hero-slider.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= isActive('hero-slider.php') ?>">
                <i class="fa-solid fa-envelope-open-text"></i> Hero section
            </a>
            <a href="enquiries.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= isActive('enquiries.php') ?>">
                <i class="fa-solid fa-envelope-open-text"></i> Enquiries
            </a>
            <a href="products.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= isActive('products.php') ?>">
                <i class="fa-solid fa-envelope-open-text"></i> Product
            </a>
             <a href="product-process.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= isActive('product-process.php') ?>">
                <i class="fa-solid fa-envelope-open-text"></i> Sub Product
            </a>
            <a href="testimonials.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= isActive('testimonials.php') ?>">
                <i class="fa-solid fa-envelope-open-text"></i>  Testimonials
            </a>
 
            <a href="logout.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 mt-auto">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </nav>
    </aside>

    <div class="flex-1 md:ml-64 flex flex-col h-screen w-full">
        <header class="h-16 bg-zinc-900/50 backdrop-blur-xl border-b border-white/10 flex items-center justify-between px-6 shrink-0">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="md:hidden text-gold text-xl"><i class="fa-solid fa-bars"></i></button>
                <h1 class="text-lg font-semibold text-gold">Admin Portal</h1>
            </div>

            <div class="flex items-center gap-4">
                <button onclick="toggleModal(true)" class="p-2 hover:bg-white/10 rounded-full transition text-gray-300" title="Reset Password">
                    <i class="fa-solid fa-key"></i>
                </button>
                <div class="flex items-center gap-2 text-sm text-gray-300 border-l border-white/10 pl-4">
                    <i class="fa-solid fa-circle-user text-2xl text-gold"></i>
                    <span class="hidden sm:inline">Admin</span>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 md:p-8">