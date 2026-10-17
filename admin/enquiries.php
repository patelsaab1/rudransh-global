<?php 
include 'header.php'; 

// --- DELETE LOGIC (Same Page) ---
if (isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']);
    if (mysqli_query($conn, "DELETE FROM enquiries WHERE id = $id")) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
    exit; // Stop executing further HTML for AJAX requests
}
?>

<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 p-4">
    <div>
        <h2 class="text-3xl font-bold text-white">Contact Enquiries</h2>
        <p class="text-gray-400 text-sm mt-1">Manage all your incoming business leads in one place.</p>
    </div>
    <div id="statusToast" class="hidden animate-bounce bg-green-500/20 text-green-400 border border-green-500/50 px-4 py-2 rounded-xl text-sm font-bold">
        <i class="fa-solid fa-check-double mr-2"></i> Enquiry Deleted!
    </div>
</div>

<div class="bg-zinc-900/50 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden mx-4">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5 text-gold text-xs uppercase tracking-widest border-b border-white/10">
                    <th class="px-6 py-4">Client</th>
                    <th class="px-6 py-4">Interest</th>
                    <th class="px-6 py-4">Message Snippet</th>
                    <th class="px-6 py-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                <?php
                $res = mysqli_query($conn, "SELECT * FROM enquiries ORDER BY id DESC");
                while ($e = mysqli_fetch_assoc($res)) {
                ?>
                <tr id="row-<?= $e['id'] ?>" class="hover:bg-white/[0.02] transition-all duration-300">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-gold/20 flex items-center justify-center text-gold font-bold border border-gold/30">
                                <?= strtoupper(substr($e['name'], 0, 1)) ?>
                            </div>
                            <div>
                                <p class="font-bold text-white"><?= htmlspecialchars($e['name']) ?></p>
                                <p class="text-[11px] text-gray-500"><?= htmlspecialchars($e['email']) ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-white/5 text-gray-300 border border-white/10 rounded text-[10px] font-bold">
                            <?= $e['product_interest'] ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-400 italic text-xs truncate max-w-[200px]">
                        "<?= htmlspecialchars($e['message']) ?>"
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-3">
                            <a href="mailto:<?= $e['email'] ?>" class="text-blue-400 hover:text-blue-300 transition">
                                <i class="fa-solid fa-paper-plane"></i>
                            </a>
                            <button onclick="confirmDelete(<?= $e['id'] ?>)" class="text-red-500 hover:text-red-400 transition">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
/**
 * AJAX DELETE FUNCTION
 */
async function confirmDelete(id) {
    if (confirm('Permanently delete this enquiry?')) {
        const row = document.getElementById(`row-${id}`);
        const toast = document.getElementById('statusToast');

        // Create Form Data for same page request
        const formData = new FormData();
        formData.append('delete_id', id);

        try {
            const response = await fetch('enquiries.php', {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                // Row delete animation
                row.classList.add('opacity-0', '-translate-x-10');
                setTimeout(() => {
                    row.remove();
                    // Show success toast
                    toast.classList.remove('hidden');
                    setTimeout(() => toast.classList.add('hidden'), 3000);
                }, 400);
            }
        } catch (error) {
            alert('Error deleting enquiry.');
        }
    }
}
</script>

<?php include 'footer.php'; ?>