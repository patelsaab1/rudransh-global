<?php include 'header.php'; include 'admin/db.php'; ?>

<section class="relative pt-32 pb-16 md:pt-48 md:pb-24 overflow-hidden bg-cover bg-center"
  style="background-image: url('assest/dry1.png');">

  <!-- Dark overlay -->
  <div class="absolute inset-0 bg-black/65"></div>

  <!-- Decorative shape -->
  <div class="absolute top-0 right-0 w-1/3 h-full bg-[#1a472a]/20 skew-x-12 transform translate-x-20"></div>
  
  <div class="max-w-7xl mx-auto px-4 relative z-10">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl md:text-7xl font-serif text-white mb-6">
       Dry  <span class="text-[#d4a574]">Fruits</span>
      </h1>

      <p class="text-gray-200 text-lg md:text-xl max-w-2xl">
        Hand-picked premium quality dry fruits sourced from trusted farms,
        packed with nutrition and rich taste for global markets.
      </p>

      <div class="mt-8 flex items-center justify-center lg:justify-start space-x-2 text-sm text-[#d4a574] uppercase tracking-widest">
        <a href="home.php" class="hover:text-white transition">Home</a>
        <span>/</span>
        <span class="text-gray-300">Dry Fruits</span>
      </div>
    </div>
  </div>
</section>


<section id="products" class="py-10 bg-[#faf8f5]">
  <div class="max-w-7xl mx-auto px-4">
     <div class="text-center mb-10">
        <h2 class="text-3xl md:text-5xl font-serif text-gray-900 mb-4">Our Dry Fruits Collection</h2>
        <div class="w-20 h-1 bg-[#d4a574] mx-auto mb-6"></div>
        <p class="text-gray-500 max-w-xl mx-auto uppercase tracking-widest text-[10px] font-bold">Carefully selected varieties of nuts and dried fruits, processed in hygienic facilities to maintain international export standards.</p>
    </div>   


    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
    <?php
    $q = mysqli_query($conn,"SELECT * FROM products WHERE category='dryfruits'");
    while($row=mysqli_fetch_assoc($q)){
    ?>
    <div class="group bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col">
      <div class="relative overflow-hidden h-72">
        <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>" 
             class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="absolute top-4 left-4 bg-black/60 backdrop-blur-md text-white text-[10px] px-3 py-1 rounded-full uppercase tracking-widest border border-white/20">
            Export Grade
        </div>
      </div>

      <div class="p-8 flex flex-col flex-grow">
        <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-[#d4a574] transition-colors"><?= $row['name'] ?></h3>

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