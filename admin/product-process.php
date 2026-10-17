<?php
include 'header.php';
include '../admin/db.php';

/* =========================
   CONFIG & LABELS
========================= */
$stepNames = [
    1 => 'Harvesting',
    2 => 'Processing',
    3 => 'Packing'
];
$selectedCategory = $_GET['category'] ?? '';

/* =========================
   DELETE LOGIC
========================= */
if (isset($_GET['delete_product_steps'])) {
    $pid = (int)$_GET['delete_product_steps'];
    mysqli_query($conn, "DELETE FROM product_process WHERE product_id=$pid");
    echo "<script>alert('All steps for this product deleted!'); window.location.href='product-process.php';</script>";
}

/* =========================
   BULK SAVE LOGIC (Add/Update)
========================= */
if (isset($_POST['save_all_steps'])) {
    $pid = mysqli_real_escape_string($conn, $_POST['product_id']);
    
    foreach ($stepNames as $order => $label) {
        $title   = mysqli_real_escape_string($conn, $_POST['title_'.$order]);
        $content = mysqli_real_escape_string($conn, $_POST['content_'.$order]);
        
        // Image Handling
        $imgPath = $_POST['existing_img_'.$order] ?? ''; 
        if (!empty($_FILES['image_'.$order]['name'])) {
            $imgName = time() . "_step" . $order . "_" . $_FILES['image_'.$order]['name'];
            if (move_uploaded_file($_FILES['image_'.$order]['tmp_name'], "../assest/products/" . $imgName)) {
                $imgPath = "assest/products/$imgName";
            }
        }

        // Check if exists
        $check = mysqli_query($conn, "SELECT id FROM product_process WHERE product_id='$pid' AND step_order='$order'");
        
        if (mysqli_num_rows($check) > 0) {
            $query = "UPDATE product_process SET step_title='$title', step_image='$imgPath', step_content='$content' 
                      WHERE product_id='$pid' AND step_order='$order'";
        } else {
            $query = "INSERT INTO product_process (product_id, step_order, step_title, step_image, step_content) 
                      VALUES ('$pid', '$order', '$title', '$imgPath', '$content')";
        }
        mysqli_query($conn, $query);
    }
    echo "<p class='bg-green-500/20 text-green-400 p-4 rounded mb-6 text-center font-bold border border-green-500/50'>All 3 Steps Updated Successfully!</p>";
}

/* =========================
   FETCH EDIT DATA
========================= */
$editProductSteps = [];
if (isset($_GET['edit_product'])) {
    $editPid = (int)$_GET['edit_product'];
    $res = mysqli_query($conn, "SELECT * FROM product_process WHERE product_id=$editPid");
    while($row = mysqli_fetch_assoc($res)) {
        $editProductSteps[$row['step_order']] = $row;
    }
}
?>

<div class="container mx-auto px-4 py-8 max-w-7xl">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <div>
            <h1 class="lg:text-3xl text-2xl font-bold text-[#d4a574]">Product Process Manager</h1>
            <p class="text-gray-400 text-sm mt-1">Manage Harvesting, Processing, and Packing in one go.</p>
        </div>
        
        <div class="w-full md:w-72">
            <label class="text-[10px] uppercase text-gray-500 font-bold mb-1 block">Filter View By Category</label>
            <form method="GET">
                <select name="category" onchange="this.form.submit()" 
                        class="w-full p-3 bg-black border border-white/10 rounded-lg text-sm text-gray-300 focus:outline-none focus:border-[#d4a574]">
                    <option value="">Show All Categories</option>
                    <?php 
                    $catQuery = mysqli_query($conn, "SELECT DISTINCT category FROM products WHERE category IS NOT NULL ORDER BY category ASC");
                    while($catRow = mysqli_fetch_assoc($catQuery)){
                        $catName = $catRow['category'];
                        $selected = ($selectedCategory == $catName) ? 'selected' : '';
                        echo "<option value='$catName' $selected>" . ucfirst($catName) . "</option>";
                    }
                    ?>
                </select>
            </form>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data" class="space-y-8">
        
        <div class="bg-white/5 border border-white/10 p-6 rounded-2xl shadow-xl">
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-white/10 text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">1</span>
                <label class="text-[#d4a574] font-bold">Select Product to Configure</label>
            </div>
            <select name="product_id" required 
                    class="w-full md:w-1/2 p-4 bg-black border border-white/10 rounded-xl focus:border-[#d4a574] outline-none transition-all text-white">
                <option value="">-- Choose a Product --</option>
                <?php 
                // Product list filtered by selected category
                $where = $selectedCategory ? "WHERE category='$selectedCategory'" : "";
                $pq = mysqli_query($conn,"SELECT id,name,category FROM products $where ORDER BY name ASC");
                while($p=mysqli_fetch_assoc($pq)){ 
                    $sel = (isset($editPid) && $editPid == $p['id']) ? 'selected' : '';
                    $catLabel = $selectedCategory ? "" : " (".ucfirst($p['category']).")";
                    echo "<option value='{$p['id']}' $sel>{$p['name']}$catLabel</option>"; 
                } 
                ?>
            </select>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <?php foreach($stepNames as $num => $label): 
                $currentStep = $editProductSteps[$num] ?? null;
            ?>
            <div class="bg-white/5 border border-white/10 p-6 rounded-2xl flex flex-col hover:border-[#d4a574]/30 transition-colors">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white"><?= $label ?></h3>
                    <span class="text-[10px] bg-[#d4a574]/20 text-[#d4a574] px-3 py-1 rounded-full font-bold uppercase tracking-widest">Step <?= $num ?></span>
                </div>

                <div class="space-y-5 flex-grow">
                    <div>
                        <label class="text-[10px] text-gray-500 uppercase font-bold mb-1 block tracking-wider">Title</label>
                        <input type="text" name="title_<?= $num ?>" 
                               value="<?= $currentStep['step_title'] ?? '' ?>"
                               placeholder="e.g. Quality Sorting" required
                               class="w-full p-3 bg-black/40 border border-white/10 rounded-lg text-sm focus:border-[#d4a574] outline-none">
                    </div>

                    <div>
                        <label class="text-[10px] text-gray-500 uppercase font-bold mb-1 block tracking-wider">Description</label>
                        <textarea name="content_<?= $num ?>" rows="4" required placeholder="Explain the <?= strtolower($label) ?> process..."
                                  class="w-full p-3 bg-black/40 border border-white/10 rounded-lg text-sm focus:border-[#d4a574] outline-none"><?= $currentStep['step_content'] ?? '' ?></textarea>
                    </div>

                    <div class="pt-2">
                        <label class="text-[10px] text-gray-500 uppercase font-bold mb-2 block tracking-wider">Step Image</label>
                        <?php if(!empty($currentStep['step_image'])): ?>
                            <div class="relative group mb-3">
                                <img src="../<?= $currentStep['step_image'] ?>" class="h-28 w-full object-cover rounded-lg border border-white/10 group-hover:opacity-75 transition-opacity">
                                <input type="hidden" name="existing_img_<?= $num ?>" value="<?= $currentStep['step_image'] ?>">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="image_<?= $num ?>" class="w-full text-xs text-gray-400 cursor-pointer
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-xs file:font-semibold
                            file:bg-[#d4a574] file:text-black
                            hover:file:bg-[#b88e5d]">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="flex flex-col md:flex-row gap-4 items-center pt-6">
            <button name="save_all_steps" class="w-full md:w-auto bg-[#d4a574] hover:bg-[#b88e5d] text-black px-12 py-4 rounded-xl font-black shadow-xl shadow-[#d4a574]/10 transition-all uppercase tracking-tighter">
                Save All Process Steps
            </button>
            <?php if(isset($editPid)): ?>
                <a href="product-process.php" class="text-gray-500 hover:text-white transition-colors underline text-sm font-medium">Cancel Editing</a>
            <?php endif; ?>
        </div>
    </form>

    <div class="my-16 border-t border-white/10"></div>

    <div class="flex flex-col md:flex-row justify-between items-end mb-6 gap-4">
        <h2 class="text-2xl font-bold">Existing Product Cycles</h2>
        <span class="text-[10px] bg-white/5 border border-white/10 px-4 py-2 rounded-lg text-gray-400 uppercase font-bold">
            Currently Showing: <?= $selectedCategory ?: 'All Categories' ?>
        </span>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-white/10 shadow-2xl">
        <table class="w-full text-left border-collapse">
            <thead class="bg-white/5 text-[#d4a574] text-[10px] uppercase font-black tracking-widest">
                <tr>
                    <th class="p-5 border-b border-white/10">Product Information</th>
                    <th class="p-5 border-b border-white/10">Harvesting</th>
                    <th class="p-5 border-b border-white/10">Processing</th>
                    <th class="p-5 border-b border-white/10">Packing</th>
                    <th class="p-5 border-b border-white/10 text-center">Manage</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php
                $listQuery = "SELECT p.id as pid, p.name as pname, p.category,
                              GROUP_CONCAT(pp.step_title ORDER BY pp.step_order SEPARATOR '||') as titles
                              FROM product_process pp
                              JOIN products p ON pp.product_id = p.id
                              " . ($selectedCategory ? "WHERE p.category='$selectedCategory'" : "") . "
                              GROUP BY p.id ORDER BY p.category ASC, p.name ASC";
                
                $listResult = mysqli_query($conn, $listQuery);
                if(mysqli_num_rows($listResult) > 0){
                    while($r = mysqli_fetch_assoc($listResult)){
                        $titles = explode('||', $r['titles']);
                ?>
                <tr class="hover:bg-white/[0.03] transition-colors group">
                    <td class="p-5">
                        <div class="font-bold text-white group-hover:text-[#d4a574] transition-colors"><?= $r['pname'] ?></div>
                        <div class="text-[10px] text-gray-500 font-mono uppercase mt-1"><?= $r['category'] ?></div>
                    </td>
                    <td class="p-5 text-xs text-gray-400"><?= $titles[0] ?? '<span class="opacity-20">N/A</span>' ?></td>
                    <td class="p-5 text-xs text-gray-400"><?= $titles[1] ?? '<span class="opacity-20">N/A</span>' ?></td>
                    <td class="p-5 text-xs text-gray-400"><?= $titles[2] ?? '<span class="opacity-20">N/A</span>' ?></td>
                    <td class="p-5">
                        <div class="flex justify-center gap-4">
                            <a href="?edit_product=<?= $r['pid'] ?>&category=<?= $selectedCategory ?>" class="text-blue-400 hover:text-blue-200 text-xs font-bold uppercase tracking-tighter">Edit All</a>
                            <a href="?delete_product_steps=<?= $r['pid'] ?>" 
                               onclick="return confirm('Attention: This will delete ALL 3 steps for this product. Continue?')"
                               class="text-red-500 hover:text-red-300 text-xs font-bold uppercase tracking-tighter">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php } 
                } else {
                    echo "<tr><td colspan='5' class='p-20 text-center text-gray-500 italic'>No product processes found. Select a product above to start.</td></tr>";
                } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>