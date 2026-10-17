<?php
include 'header.php';
include '../admin/db.php';

/* DELETE */
if(isset($_GET['delete'])){
$id=$_GET['delete'];
mysqli_query($conn,"DELETE FROM testimonials WHERE id='$id'");
}

/* EDIT FETCH */
$edit=null;
if(isset($_GET['edit'])){
$eid=$_GET['edit'];
$er=mysqli_query($conn,"SELECT * FROM testimonials WHERE id='$eid'");
$edit=mysqli_fetch_assoc($er);
}

/* ADD */
if(isset($_POST['add'])){
$name=$_POST['name'];
$des=$_POST['designation'];
$msg=$_POST['message'];
$rate=$_POST['rating'];

mysqli_query($conn,"INSERT INTO testimonials(name,designation,message,rating)
VALUES('$name','$des','$msg','$rate')");
}

/* UPDATE */
if(isset($_POST['update'])){
$id=$_POST['id'];
$name=$_POST['name'];
$des=$_POST['designation'];
$msg=$_POST['message'];
$rate=$_POST['rating'];

mysqli_query($conn,"UPDATE testimonials SET
name='$name',
designation='$des',
message='$msg',
rating='$rate'
WHERE id='$id'");
}

/* FETCH */
$res=mysqli_query($conn,"SELECT * FROM testimonials ORDER BY id DESC");
?>

<h2 class="text-2xl font-bold text-white mb-6">Manage Testimonials</h2>

<form method="POST" class="bg-white/5 p-6 rounded-xl border border-white/10 mb-10 space-y-4">

<input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">

<input name="name" required placeholder="Client Name"
value="<?= $edit['name'] ?? '' ?>"
class="w-full p-3 bg-black border border-white/10 rounded">

<input name="designation" required placeholder="Designation"
value="<?= $edit['designation'] ?? '' ?>"
class="w-full p-3 bg-black border border-white/10 rounded">

<textarea name="message" required placeholder="Testimonial Message"
class="w-full p-3 bg-black border border-white/10 rounded"><?= $edit['message'] ?? '' ?></textarea>

<select name="rating" class="w-full p-3 bg-black border border-white/10 rounded">

<?php
$stars=[5=>'★★★★★',4=>'★★★★',3=>'★★★'];
foreach($stars as $k=>$v){
$sel = ($edit && $edit['rating']==$k)?'selected':'';
echo "<option value='$k' $sel>$v</option>";
}
?>

</select>

<button name="<?= $edit?'update':'add' ?>"
class="bg-[#d4a574] px-6 py-3 rounded font-bold text-black">
<?= $edit?'Update Testimonial':'Add Testimonial' ?>
</button>

<?php if($edit){ ?>
<a href="testimonials.php" class="text-sm text-gray-400 block">Cancel Edit</a>
<?php } ?>

</form>

<table class="w-full text-sm border border-white/10">

<thead class="bg-white/10">
<tr>
<th class="p-3">Name</th>
<th class="p-3">Message</th>
<th class="p-3">Rating</th>
<th class="p-3">Action</th>
</tr>
</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($res)){ ?>

<tr class="border-t border-white/10 hover:bg-white/5">

<td class="p-3"><?= $row['name'] ?></td>

<td class="p-3"><?= substr($row['message'],0,50) ?>...</td>

<td class="p-3"><?= $row['rating'] ?>★</td>

<td class="p-3 space-x-4">

<a href="?edit=<?= $row['id'] ?>" class="text-blue-400">Edit</a>

<a href="?delete=<?= $row['id'] ?>"
onclick="return confirm('Delete testimonial?')"
class="text-red-400">Delete</a>

</td>

</tr>

<?php } ?>

</tbody>
</table>

<?php include 'footer.php'; ?>
