<?php
include 'header.php';
include '../admin/db.php';

// --- 1. HANDLE DELETE ---
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $query = mysqli_query($conn, "SELECT image FROM hero_slides WHERE id=$id");
    $row = mysqli_fetch_assoc($query);
    if ($row && file_exists("../" . $row['image'])) {
        unlink("../" . $row['image']);
    }
    mysqli_query($conn, "DELETE FROM hero_slides WHERE id=$id");
    echo "<script>window.location.href='hero-slider.php';</script>";
}

// --- 2. HANDLE ADD NEW ---
if (isset($_POST['add'])) {
    $heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    
    $imgName = time() . '_' . $_FILES['image']['name'];
    $target = "../assest/hero/" . $imgName;
    $dbPath = "assest/hero/" . $imgName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO hero_slides (image, heading, description) VALUES ('$dbPath', '$heading', '$desc')";
        mysqli_query($conn, $sql);
        echo "<script>window.location.href='hero-slider.php';</script>";
    }
}

// --- 3. HANDLE UPDATE ---
if (isset($_POST['update'])) {
    $id = intval($_POST['edit_id']);
    $heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    
    if (!empty($_FILES['image']['name'])) {
        $oldQ = mysqli_query($conn, "SELECT image FROM hero_slides WHERE id=$id");
        $oldRow = mysqli_fetch_assoc($oldQ);
        if ($oldRow && file_exists("../" . $oldRow['image'])) unlink("../" . $oldRow['image']);

        $imgName = time() . '_' . $_FILES['image']['name'];
        $target = "../assest/hero/" . $imgName;
        $dbPath = "assest/hero/" . $imgName;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sql = "UPDATE hero_slides SET heading='$heading', description='$desc', image='$dbPath' WHERE id=$id";
    } else {
        $sql = "UPDATE hero_slides SET heading='$heading', description='$desc' WHERE id=$id";
    }
    mysqli_query($conn, $sql);
    echo "<script>window.location.href='hero-slider.php';</script>";
}

// --- 4. FETCH DATA ---
$editData = null;
if (isset($_GET['edit'])) {
    $editId = intval($_GET['edit']);
    $editQ = mysqli_query($conn, "SELECT * FROM hero_slides WHERE id=$editId");
    $editData = mysqli_fetch_assoc($editQ);
}

$slides = mysqli_query($conn, "SELECT * FROM hero_slides ORDER BY id DESC");
$totalSlides = mysqli_num_rows($slides);
?>

<div class="min-h-screen bg-black p-6 font-sans text-gray-100">
    
    <div class="max-w-7xl mx-auto mb-8">
        <h1 class="text-3xl font-bold text-white">Hero Section Manager</h1>
        <p class="text-gray-400 mt-1">Manage the sliding banners on your homepage.</p>
    </div>

    <div class="max-w-7xl mx-auto grid lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-1">
            <div class="bg-[#111] border border-gray-800 rounded-xl shadow-2xl p-6 sticky top-6">
                <h2 class="text-xl font-bold text-[#d4a574] mb-6 border-b border-gray-800 pb-2">
                    <?= $editData ? 'Edit Slide' : 'Add New Slide' ?>
                </h2>

                <form method="POST" enctype="multipart/form-data" class="space-y-5">
                    
                    <?php if($editData): ?>
                        <input type="hidden" name="edit_id" value="<?= $editData['id'] ?>">
                    <?php endif; ?>

                    <div>
                        <label class="block text-sm font-semibold text-gray-400 mb-2">Heading</label>
                        <input type="text" name="heading" 
                               value="<?= $editData ? htmlspecialchars($editData['heading']) : '' ?>"
                               class="w-full px-4 py-3 bg-[#1a1a1a] border border-gray-700 rounded-lg focus:ring-1 focus:ring-[#d4a574] focus:border-[#d4a574] focus:outline-none text-white placeholder-gray-600 transition" 
                               placeholder="Enter slide heading" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-400 mb-2">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full px-4 py-3 bg-[#1a1a1a] border border-gray-700 rounded-lg focus:ring-1 focus:ring-[#d4a574] focus:border-[#d4a574] focus:outline-none text-white placeholder-gray-600 transition" 
                                  placeholder="Enter slide description"><?= $editData ? htmlspecialchars($editData['description']) : '' ?></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-400 mb-2">Hero Image</label>
                        
                        <div class="mb-3 p-2 border border-gray-700 rounded bg-[#1a1a1a] text-center <?= $editData ? '' : 'hidden' ?>" id="preview-container">
                            <img id="preview-img" src="<?= $editData ? '../'.$editData['image'] : '' ?>" class="h-32 mx-auto rounded object-cover">
                            <span id="preview-label" class="text-xs text-[#d4a574] block mt-2 font-bold">
                                <?= $editData ? 'Current Image' : 'New Image Preview' ?>
                            </span>
                        </div>

                        <input type="file" name="image" id="file-input"
                               onchange="previewImage(this)"
                               class="block w-full text-sm text-gray-400
                               file:mr-4 file:py-2 file:px-4
                               file:rounded-md file:border-0
                               file:text-xs file:font-bold file:uppercase
                               file:bg-[#d4a574] file:text-black
                               hover:file:bg-[#c39665] cursor-pointer bg-[#1a1a1a] border border-gray-700 rounded-lg"
                               <?= $editData ? '' : 'required' ?>>
                    </div>

                    <div class="pt-4">
                        <?php if($editData): ?>
                            <button type="submit" name="update" 
                                    class="w-full bg-[#d4a574] hover:bg-[#c39665] text-black font-bold py-3 rounded-lg shadow-lg transition duration-200 uppercase tracking-widest text-sm">
                                Update Slide
                            </button>
                            <a href="hero-slider.php" class="block text-center mt-4 text-sm text-gray-500 hover:text-white transition">Cancel Edit</a>
                        <?php else: ?>
                            <button type="submit" name="add" 
                                    class="w-full bg-[#d4a574] hover:bg-[#c39665] text-black font-bold py-3 rounded-lg shadow-lg transition duration-200 uppercase tracking-widest text-sm">
                                + Add Slide
                            </button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="bg-[#111] border border-gray-800 rounded-xl shadow-2xl overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-800 flex justify-between items-center bg-[#111]">
                    <h3 class="font-bold text-white text-lg tracking-wide">Current Hero Slides</h3>
                    <span class="bg-[#1a1a1a] text-[#d4a574] text-xs font-bold px-3 py-1 rounded border border-gray-700">
                        Total: <?= $totalSlides ?>
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#161616] border-b border-gray-800 text-[#d4a574]">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Image</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Content</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            <?php if($totalSlides > 0): ?>
                                <?php while($s = mysqli_fetch_assoc($slides)){ ?>
                                <tr class="hover:bg-[#1a1a1a] transition duration-200">
                                    <td class="px-6 py-4 align-top w-40">
                                        <div class="h-20 w-32 rounded-lg overflow-hidden border border-gray-700 shadow-md">
                                            <img src="../<?= $s['image'] ?>" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 align-top">
                                        <h4 class="font-bold text-white text-base mb-2"><?= $s['heading'] ?></h4>
                                        <p class="text-sm text-gray-400 leading-relaxed line-clamp-2">
                                            <?= $s['description'] ?>
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 align-middle text-right">
                                        <div class="flex items-center justify-end gap-3">
                                            <a href="hero-slider.php?edit=<?= $s['id'] ?>" 
                                               class="text-blue-400 hover:text-blue-300 transition transform hover:scale-110" title="Edit">
                                               <i class="fa-solid fa-paper-plane text-lg"></i>
                                            </a>
                                            <a href="hero-slider.php?delete=<?= $s['id'] ?>" 
                                               class="text-red-500 hover:text-red-400 transition transform hover:scale-110" 
                                               onclick="return confirm('Delete this slide?');" title="Delete">
                                               <i class="fa-solid fa-trash text-lg"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-600">
                                            <i class="fa-regular fa-folder-open text-5xl mb-4 opacity-50"></i>
                                            <p class="text-base italic">No slides added yet.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
function previewImage(input) {
    const previewContainer = document.getElementById('preview-container');
    const previewImg = document.getElementById('preview-img');
    const previewLabel = document.getElementById('preview-label');

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            // Show the container if it was hidden (like in Add mode)
            previewContainer.classList.remove('hidden');
            // Update the image source to the selected file
            previewImg.src = e.target.result;
            // Update the label text
            previewLabel.innerText = "Selected New Image";
            previewLabel.classList.add('text-green-400'); // Optional: make text green
        }
        
        reader.readAsDataURL(input.files[0]); // Read the file
    }
}
</script>

<?php include 'footer.php'; ?>