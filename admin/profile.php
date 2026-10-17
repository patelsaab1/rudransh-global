<?php include 'header.php';

$id = $_SESSION['admin_id'];
$admin = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT email FROM admins WHERE id=$id")
);
?>

<h2 class="text-2xl font-bold mb-6">My Profile</h2>

<div class="glass p-6 rounded-xl max-w-md">
  <label class="text-sm text-gray-400">Email</label>
  <input value="<?= $admin['email'] ?>" disabled
    class="w-full mt-2 p-3 bg-white/5 rounded-xl border border-white/10 text-white">
</div>

<?php include 'footer.php'; ?>
