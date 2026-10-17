<?php include 'header.php'; include 'admin/db.php'; ?>

<section class="relative pt-52 pb-28 overflow-hidden bg-cover bg-center"
  style="background-image: url('assest/fruits1.png');">

  <!-- Dark overlay -->
  <div class="absolute inset-0 bg-black/60"></div>

  <!-- Decorative shape (optional) -->
  <div class="absolute top-0 right-0 w-1/3 h-full bg-[#1a472a]/20 skew-x-12 transform translate-x-20"></div>
  
  <div class="max-w-7xl mx-auto px-4 relative z-10">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl md:text-7xl font-serif text-white mb-6">
         Fresh <span class="text-[#d4a574]">Fruits</span>
      </h1>

      <p class="text-gray-200 text-lg md:text-xl max-w-2xl">
  Discover farm-fresh fruits harvested at peak ripeness, packed with natural goodness 
  and delivered to meet global quality and export standards.
</p>


      <div class="mt-8 flex items-center justify-center lg:justify-start space-x-2 text-sm text-[#d4a574] uppercase tracking-widest">
        <a href="home.html" class="hover:text-white transition">Home</a>
        <span>/</span>
        <span class="text-gray-300">Product</span>
      </div>
    </div>
  </div>
</section>

<section class="py-10 bg-[#fafafa]">
  <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10">
        <h2 class="text-3xl md:text-5xl font-serif text-gray-900 mb-4">Farm Fresh Exports</h2>
        <div class="w-20 h-1 bg-[#d4a574] mx-auto mb-6"></div>
        <p class="text-gray-500 max-w-xl mx-auto uppercase tracking-widest text-[10px] font-bold">Cold-Chain Maintained | International Quality Standards</p>
    </div>
    <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-3">

    <?php
    // Fetching only 'fruits' category
    $q = mysqli_query($conn, "SELECT * FROM products WHERE category='fruits'");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
      <div class="group bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.03)] overflow-hidden border border-gray-100 hover:shadow-2xl hover:-translate-y-3 transition-all duration-500 flex flex-col">

        <div class="relative h-72 overflow-hidden">
          <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>" 
               class="h-full w-full object-cover transition-transform duration-1000 group-hover:scale-110">
          
          <div class="absolute top-6 left-6 bg-white/90 backdrop-blur-md px-4 py-1 rounded-full shadow-sm">
             <span class="text-[10px] font-bold text-[#1a472a] uppercase tracking-wider italic">Premium Grade</span>
          </div>
        </div>

        <div class="p-8 flex flex-col flex-grow">
          <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-[#d4a574] transition-colors duration-300">
            <?= $row['name'] ?>
          </h3>

          <p class="text-gray-500 text-sm leading-relaxed mb-4 flex-grow">
             <?= nl2br($row['description']) ?>
          </p>

           <div class="pt-4 border-t border-gray-100">
            <a href="product-detail.php?id=<?= $row['id'] ?>"
               class="flex items-center justify-between text-[#d4a574] font-bold uppercase tracking-widest text-xs group/link transition-all">
               <span>Discover Product</span>
               <div class="w-8 h-8 rounded-full border border-[#d4a574]/30 flex items-center justify-center group-hover/link:bg-[#d4a574] group-hover/link:text-white transition-all">
                    <i class="fa-solid fa-arrow-right"></i>
               </div>
            </a>
          </div>
        </div>

      </div>
    <?php } ?>

    </div>
  </div>
</section>



<?php include 'footer.php'; ?>