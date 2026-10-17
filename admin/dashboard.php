<?php 
include 'header.php'; 

// Database se live counts nikaalne ke liye
$total_res = mysqli_query($conn, "SELECT COUNT(id) as total FROM enquiries");
$total_data = mysqli_fetch_assoc($total_res);
$total_count = $total_data['total'];

// Aaj ki enquiries count karne ke liye
$today_res = mysqli_query($conn, "SELECT COUNT(id) as today FROM enquiries WHERE DATE(created_at) = CURDATE()");
$today_data = mysqli_fetch_assoc($today_res);
$today_count = $today_data['today'];

// Latest enquiry ka naam nikaalne ke liye
$latest_res = mysqli_query($conn, "SELECT name FROM enquiries ORDER BY id DESC LIMIT 1");
$latest_data = mysqli_fetch_assoc($latest_res);
$latest_name = $latest_data['name'] ?? 'No Enquiries';
?>

<div class="mb-8">
    <h2 class="text-3xl font-bold text-white">Welcome Back, <span class="text-gold">Admin</span></h2>
    <p class="text-gray-400 text-sm">Here's what's happening with Rudransh Global today.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    
    <div class="relative overflow-hidden bg-white/5 border border-white/10 rounded-3xl p-6 group hover:border-gold/50 transition-all duration-500">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-gold/10 rounded-full blur-2xl group-hover:bg-gold/20 transition-all"></div>
        <div class="flex items-center gap-5">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-gold to-[#b38a5d] flex items-center justify-center text-black shadow-lg shadow-gold/20">
                <i class="fa-solid fa-envelope-open-text text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-400 text-xs uppercase tracking-widest font-bold">Total Enquiries</p>
                <p class="text-4xl font-black text-white mt-1"><?= $total_count ?></p>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2 text-[10px] text-green-400 font-bold bg-green-500/10 w-fit px-2 py-1 rounded-lg">
            <i class="fa-solid fa-chart-line"></i> ALL TIME DATA
        </div>
    </div>

    <div class="relative overflow-hidden bg-white/5 border border-white/10 rounded-3xl p-6 group hover:border-blue-500/50 transition-all duration-500">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-all"></div>
        <div class="flex items-center gap-5">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                <i class="fa-solid fa-calendar-day text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-400 text-xs uppercase tracking-widest font-bold">Today's Leads</p>
                <p class="text-4xl font-black text-white mt-1"><?= $today_count ?></p>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2 text-[10px] text-blue-400 font-bold bg-blue-500/10 w-fit px-2 py-1 rounded-lg">
            <i class="fa-solid fa-clock"></i> UPDATED JUST NOW
        </div>
    </div>

    <div class="relative overflow-hidden bg-white/5 border border-white/10 rounded-3xl p-6 group hover:border-purple-500/50 transition-all duration-500">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition-all"></div>
        <div class="flex items-center gap-5">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center text-white shadow-lg shadow-purple-500/20">
                <i class="fa-solid fa-user-tag text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-400 text-xs uppercase tracking-widest font-bold">Latest Client</p>
                <p class="text-xl font-bold text-white mt-2 truncate w-40"><?= htmlspecialchars($latest_name) ?></p>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2 text-[10px] text-purple-400 font-bold bg-purple-500/10 w-fit px-2 py-1 rounded-lg">
            <i class="fa-solid fa-bolt"></i> RECENT ACTIVITY
        </div>
    </div>

</div>

<div class="bg-white/5 border border-white/10 rounded-3xl p-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-bold text-white flex items-center gap-3">
            <i class="fa-solid fa-bolt-lightning text-gold"></i> Quick Actions
        </h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="enquiries.php" class="p-4 bg-white/5 rounded-2xl border border-white/5 hover:bg-gold hover:text-black transition-all group">
            <i class="fa-solid fa-list-check mb-3 text-xl text-gold group-hover:text-black"></i>
            <p class="font-bold text-sm">View Enquiries</p>
            <p class="text-[10px] opacity-60">Manage leads</p>
        </a>
        <button onclick="toggleModal(true)" class="p-4 bg-white/5 rounded-2xl border border-white/5 hover:bg-gold hover:text-black transition-all group text-left">
            <i class="fa-solid fa-shield-halved mb-3 text-xl text-gold group-hover:text-black"></i>
            <p class="font-bold text-sm">Security</p>
            <p class="text-[10px] opacity-60">Update Password</p>
        </button>
    </div>
</div>

<?php include 'footer.php'; ?>