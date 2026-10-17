<?php
include 'header.php';
include '../admin/db.php';

/* =========================
   CATEGORY FILTER
========================= */
$selectedCategory = $_GET['category'] ?? '';

/* =========================
   DELETE PRODUCT
========================= */
if (isset($_GET['delete'])) {
    $did = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id=$did");
    echo "<p class='text-red-400 mb-4'>Product deleted</p>";
}

/* =========================
   EDIT MODE
========================= */
$edit = null;
if (isset($_GET['edit'])) {
    $eid = (int)$_GET['edit'];
    $res = mysqli_query($conn, "SELECT * FROM products WHERE id=$eid");
    $edit = mysqli_fetch_assoc($res);
}

/* =========================
   UPDATE PRODUCT
========================= */
if (isset($_POST['update'])) {

    $id   = $_POST['id'];
    $cat  = $_POST['category'];
    $name = $_POST['name'];
    $desc = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {
        $img = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assest/products/".$img);
        $imgPath = "assest/products/$img";

        mysqli_query($conn,"
          UPDATE products SET
            category='$cat',
            name='$name',
            description='$desc',
            image='$imgPath'
          WHERE id='$id'
        ");
    } else {
        mysqli_query($conn,"
          UPDATE products SET
            category='$cat',
            name='$name',
            description='$desc'
          WHERE id='$id'
        ");
    }

    echo "<p class='text-green-400 mb-4'>Product updated</p>";
}

/* =========================
   ADD PRODUCT
========================= */
if (isset($_POST['add'])) {

    $cat  = $_POST['category'];
    $name = $_POST['name'];
    $desc = $_POST['description'];

    $img = time().'_'.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../assest/products/".$img);
    $imgPath = "assest/products/$img";

    mysqli_query($conn,"
      INSERT INTO products (category, name, image, description)
      VALUES ('$cat','$name','$imgPath','$desc')
    ");

    echo "<p class='text-green-400 mb-4'>Product added successfully</p>";
}
?>

<!-- CATEGORY FILTER -->
<form method="GET" class="max-w-sm mb-8">
  <select name="category" onchange="this.form.submit()"
          class="w-full p-3 bg-black border border-white/10 rounded">
    <option value="">All Categories</option>
    <option value="rice"   <?= $selectedCategory=='rice'?'selected':'' ?>>Indian Rice</option>
    <option value="spices" <?= $selectedCategory=='spices'?'selected':'' ?>>Indian Spices</option>
    <option value="fruits" <?= $selectedCategory=='fruits'?'selected':'' ?>>Fresh Fruits</option>
    <option value="dryfruits" <?= $selectedCategory=='dryfruits'?'selected':'' ?>>Dry Fruits</option>
    <option value="herbs" <?= $selectedCategory=='herbs'?'selected':'' ?>>herbs</option>
    <option value="tea" <?= $selectedCategory=='tea'?'selected':'' ?>>Premium Tea</option>

  </select>
</form>

<h1 class="text-2xl font-bold mb-6">
<?= $edit ? 'Edit Product' : 'Add Product' ?>
</h1>

<!-- PRODUCT FORM -->
<form method="POST" enctype="multipart/form-data"
      class="max-w-xl bg-white/5 p-6 rounded-xl space-y-4 mb-14">

<input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">

<select name="category" required
        class="w-full p-3 rounded bg-black border border-white/10">
<option value="">Select Category</option>
<?php
$cats = ['rice'=>'Indian Rice','spices'=>'Indian Spices','fruits'=>'Fresh Fruits','dryfruits' => 'Dry Fruits','herbs'=>'herbs', 'tea'=>'Premium Tea'];
foreach($cats as $k=>$v){
  $sel = ($edit && $edit['category']==$k) ? 'selected' : '';
  echo "<option value='$k' $sel>$v</option>";
}
?>
</select>

<input type="text" name="name" placeholder="Product Name" required
       value="<?= $edit['name'] ?? '' ?>"
       class="w-full p-3 rounded bg-black border border-white/10">

<textarea name="description" rows="4" placeholder="Product Description" required
          class="w-full p-3 rounded bg-black border border-white/10"><?= $edit['description'] ?? '' ?></textarea>

<?php if($edit){ ?>
<img src="../<?= $edit['image'] ?>" class="h-24 rounded">
<?php } ?>

<input type="file" name="image" class="w-full p-2 bg-black text-gray-300">

<button name="<?= $edit ? 'update' : 'add' ?>"
        class="bg-[#d4a574] text-black px-6 py-3 rounded-xl font-bold">
<?= $edit ? 'Update Product' : 'Add Product' ?>
</button>

<?php if($edit){ ?>
<a href="products.php<?= $selectedCategory ? '?category='.$selectedCategory : '' ?>"
   class="block text-sm text-gray-400 hover:underline">
Cancel Edit
</a>
<?php } ?>

</form>

<!-- PRODUCT LIST -->
<h2 class="text-2xl font-bold mb-6">All Products</h2>

<?php
$where = $selectedCategory ? "WHERE category='$selectedCategory'" : "";
$list = mysqli_query($conn,"SELECT * FROM products $where ORDER BY id DESC");
?>

<table class="w-full text-sm border border-white/10">
<thead class="bg-white/10">
<tr>
  <th class="p-3">Image</th>
  <th class="p-3">Name</th>
  <th class="p-3">Category</th>
  <th class="p-3">Action</th>
</tr>
</thead>

<tbody>
<?php while($r=mysqli_fetch_assoc($list)){ ?>
<tr class="border-t border-white/10 hover:bg-white/5">
<td class="p-3">
<img src="../<?= $r['image'] ?>" class="h-12 rounded">
</td>
<td class="p-3"><?= $r['name'] ?></td>
<td class="p-3 uppercase text-[#d4a574]"><?= $r['category'] ?></td>
<td class="p-3 space-x-3">
  <a href="?edit=<?= $r['id'] ?>&category=<?= $selectedCategory ?>"
     class="text-blue-400">Edit</a>
  <a href="?delete=<?= $r['id'] ?>&category=<?= $selectedCategory ?>"
     onclick="return confirm('Delete this product?')"
     class="text-red-400">Delete</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>

<?php include 'footer.php'; ?>
