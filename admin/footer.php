</main>
        <footer class="h-12 bg-zinc-900/50 backdrop-blur-xl border-t border-white/10 flex items-center justify-center text-xs text-gray-500 shrink-0">
            © <?= date('Y') ?> Rudransh Global Admin Panel
        </footer>
    </div>
</div>

<div id="passwordModal" class="fixed inset-0 z-[60] flex items-center justify-center bg-black/80 backdrop-blur-sm hidden px-4">
    <div class="bg-zinc-900 border border-white/10 w-full max-w-md rounded-2xl p-6 shadow-2xl relative">
        
        <div id="modalContent">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gold flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved"></i> Reset Password
                </h2>
                <button onclick="toggleModal(false)" class="text-gray-400 hover:text-white transition">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>
            
            <form id="resetForm" class="space-y-5">
                <div class="relative">
                    <label class="text-xs text-gray-400 uppercase mb-1.5 block font-semibold tracking-wider">Current Password</label>
                    <input type="password" id="currentPass" name="current" required 
                        class="w-full p-3.5 bg-white/5 rounded-xl border border-white/10 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition pr-12 text-white" placeholder="••••••••">
                    <button type="button" onclick="togglePasswordVisibility('currentPass', 'eye1')" class="absolute right-4 top-[38px] text-gray-500 hover:text-gold transition">
                        <i id="eye1" class="fa-solid fa-eye"></i>
                    </button>
                </div>

                <div class="relative">
                    <label class="text-xs text-gray-400 uppercase mb-1.5 block font-semibold tracking-wider">New Password</label>
                    <input type="password" id="newPass" name="new" required 
                        class="w-full p-3.5 bg-white/5 rounded-xl border border-white/10 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition pr-12 text-white" placeholder="••••••••">
                    <button type="button" onclick="togglePasswordVisibility('newPass', 'eye2')" class="absolute right-4 top-[38px] text-gray-500 hover:text-gold transition">
                        <i id="eye2" class="fa-solid fa-eye"></i>
                    </button>
                </div>

                <button type="submit" id="submitBtn" class="w-full bg-gold text-black font-bold py-3.5 rounded-xl hover:bg-[#c49463] active:scale-95 transition-all mt-4 flex justify-center items-center gap-2 shadow-lg shadow-gold/10">
                    <i class="fa-solid fa-lock-open"></i>
                    <span>Update Password</span>
                </button>
            </form>
            <div id="errorMsg" class="mt-4 text-center text-sm text-red-400 font-medium"></div>
        </div>

        <div id="successState" class="hidden text-center py-10 animate-in fade-in zoom-in duration-300">
            <div class="w-20 h-20 bg-green-500/20 text-green-500 rounded-full flex items-center justify-center mx-auto mb-5 border border-green-500/30 shadow-lg shadow-green-500/10">
                <i class="fa-solid fa-check text-4xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-white mb-2">Updated!</h3>
            <p class="text-gray-400">Your security settings have been saved.</p>
        </div>
    </div>
</div>

<script>
/**
 * 1. Password Visibility Toggle
 */
function togglePasswordVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

/**
 * 2. Sidebar Toggle (For Mobile)
 */
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('-translate-x-full');
}

/**
 * 3. Modal Controls
 */
function toggleModal(show) {
    const modal = document.getElementById('passwordModal');
    if (show) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Stop scrolling background
    } else {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
        // Reset state for next opening
        setTimeout(() => {
            document.getElementById('modalContent').classList.remove('hidden');
            document.getElementById('successState').classList.add('hidden');
            document.getElementById('resetForm').reset();
            document.getElementById('errorMsg').innerText = "";
        }, 300);
    }
}

/**
 * 4. AJAX Form Submission
 */
document.getElementById('resetForm').onsubmit = async function(e) {
    e.preventDefault();
    const btn = document.getElementById('submitBtn');
    const errorMsg = document.getElementById('errorMsg');
    const modalContent = document.getElementById('modalContent');
    const successState = document.getElementById('successState');

    // Loading state
    btn.disabled = true;
    const originalBtnText = btn.innerHTML;
    btn.innerHTML = '<i class="fa-solid fa-circle-notch animate-spin"></i> Processing...';

    const formData = new FormData(this);
    
    try {
        const res = await fetch('reset-password.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await res.json();

        if(data.status === 'success') {
            // Success animation dikhao
            modalContent.classList.add('hidden');
            successState.classList.remove('hidden');
            
            // 2.5 second baad modal khud band ho jayega
            setTimeout(() => {
                toggleModal(false);
            }, 2500);
        } else {
            // Error dikhao
            errorMsg.innerText = data.message;
            btn.disabled = false;
            btn.innerHTML = originalBtnText;
        }
    } catch (err) {
        errorMsg.innerText = "Connection error. Please try again.";
        btn.disabled = false;
        btn.innerHTML = originalBtnText;
    }
}

// Sidebar ko baahar click karne par band karne ke liye (Mobile)
document.addEventListener('mousedown', (e) => {
    const sidebar = document.getElementById('sidebar');
    if (!sidebar.contains(e.target) && !e.target.closest('button[onclick="toggleSidebar()"]') && window.innerWidth < 768) {
        sidebar.classList.add('-translate-x-full');
    }
});
</script>

</body>
</html>