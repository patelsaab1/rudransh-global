<?php
include 'admin/db.php';
include 'header.php';
?>

<section class="relative pt-32 pb-16 md:pt-48 md:pb-24 overflow-hidden bg-cover bg-center" style="background-image: url('assest/product.png');">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="absolute top-0 right-0 w-1/3 h-full bg-[#1a472a]/20 skew-x-12 transform translate-x-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center lg:text-left">
            <h1 class="text-5xl md:text-7xl font-serif text-white mb-6">
                Our <span class="text-[#d4a574]">Products</span>
            </h1>

            <p class="text-gray-200 text-lg md:text-xl max-w-3xl">
                Discover our premium range of Indian spices, basmati rice, fresh fruits, dry fruits, and herbal products — sourced directly from farms and delivered globally with uncompromised quality.
            </p>

            <div class="mt-8 flex items-center justify-center lg:justify-start space-x-2 text-sm text-[#d4a574] uppercase tracking-widest font-bold">
                <a href="home.php" class="hover:text-white transition">Home</a>
                <span>/</span>
                <span class="text-gray-300">Products</span>
            </div>
        </div>
    </div>
</section>
<!-- ================= PRODUCTS SECTION ================= -->

<section class="py-12 md:py-10 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 md:w-96 md:h-96 bg-[#d4a574]/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 md:w-72 md:h-72 bg-[#1a472a]/5 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        
        <div class="text-center max-w-3xl mx-auto mb-10 md:mb-10">
            <h2 class="text-3xl md:text-5xl font-serif text-gray-900 mb-4 md:mb-6">
                Our <span class="text-[#d4a574]">Categories</span>
            </h2>
            <p class="text-gray-600 text-sm md:text-lg leading-relaxed">
                From the aroma of pure spices to the crunch of hand-picked dry fruits, 
                we bring you the finest selection of nature's bounty.
            </p>
        </div>

        <div class="flex flex-nowrap md:flex-wrap justify-start md:justify-center gap-2 md:gap-3 mb-10 overflow-x-auto pb-4 no-scrollbar">
            <?php 
            $labels = ['spices'=>'Spices', 'fruits'=>'Fresh Fruits', 'rice'=>'Indian Rice', 'dryfruits'=>'Dry Fruits', 'herbs'=>'Herbal','tea'=>'Premium Tea'];
            foreach($labels as $key => $label): 
            ?>
            <button class="tab-btn whitespace-nowrap px-6 py-2 md:px-8 md:py-3 rounded-full text-[10px] md:text-sm font-bold tracking-widest uppercase transition-all duration-300 border <?= $key == 'spices' ? 'active bg-[#1a472a] text-white border-[#1a472a]' : 'bg-white text-gray-600 border-gray-200 hover:border-[#d4a574] hover:text-[#d4a574]' ?>" 
                    data-tab="<?= $key ?>" 
                    data-img="assest/<?= $key ?>.jpg"> <?= $label ?>
            </button>
            <?php endforeach; ?>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 md:gap-12 items-start">
            <div class="relative group order-2 lg:order-1">
                <div class="absolute -inset-2 md:-inset-4 border border-[#d4a574]/20 rounded-2xl -z-10"></div>
                <img id="productImage"
                    src="assest/spices.jpg" 
                    class="rounded-2xl shadow-xl w-full h-[300px] md:h-[500px] object-cover transition-all duration-500">
            </div>

            <div class="space-y-3 order-1 lg:order-2">
                <?php
                $cats = ['spices','fruits','rice','dryfruits','herbs','tea'];
                foreach($cats as $i=>$cat){
                    $q = mysqli_query($conn,"SELECT * FROM products WHERE category='$cat' LIMIT 5");
                ?>
                <div class="tab-content <?= $i==0?'':'hidden' ?>" id="<?= $cat ?>">
                    
                    <div class="grid gap-3">
                        <?php while($row=mysqli_fetch_assoc($q)){ ?>
                        <div class="flex items-center bg-gray-50/80 hover:bg-white p-3 md:p-4 rounded-xl border border-gray-100 transition-all group shadow-sm hover:shadow-md">
                            <img src="<?= $row['image'] ?>" class="w-14 h-14 md:w-16 md:h-16 rounded-lg object-cover flex-shrink-0">
                            <div class="ml-4">
                                <h3 class="font-bold text-sm md:text-base text-[#1a472a] group-hover:text-[#d4a574] transition-colors line-clamp-1"><?= $row['name'] ?></h3>
                                <p class="text-[11px] md:text-xs text-gray-500 line-clamp-1">
                                    <?= strip_tags($row['description']) ?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php
$pageMap = [
  'spices'   => 'indian-spices.php',
  'fruits'   => 'fresh-fruit.php',
  'rice'     => 'indian-rice.php',
  'dryfruits'=> 'dry-fruits.php',
  'herbs'    => 'indian-herbs.php',
  'tea'    => 'tea.php'
];
?>

<div class="mt-6 text-right">
    <a href="<?= $pageMap[$cat] ?>" 
       class="inline-flex items-center gap-2 text-[#d4a574] font-bold uppercase tracking-widest text-[11px] md:text-xs hover:gap-4 transition-all">
        View All <i class="fa-solid fa-arrow-right-long"></i>
    </a>
</div>

                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');
    const mainImg = document.getElementById('productImage');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active from all
            tabs.forEach(t => {
                t.classList.remove('active', 'bg-[#1a472a]', 'text-white', 'border-[#1a472a]');
                t.classList.add('bg-white', 'text-gray-600', 'border-gray-200');
            });

            // Add active to clicked
            tab.classList.add('active');
            tab.classList.remove('bg-white', 'text-gray-600', 'border-gray-200');

            // Hide all content
            contents.forEach(c => c.classList.add('hidden'));

            // Show selected content
            const target = tab.getAttribute('data-tab');
            document.getElementById(target).classList.remove('hidden');

            // Change Image with smooth effect
            mainImg.style.opacity = '0.7';
            setTimeout(() => {
                mainImg.src = tab.getAttribute('data-img');
                mainImg.style.opacity = '1';
            }, 150);
        });
    });
});
</script>

<!-- Why Choose Our Products Section -->
<section class="py-10 md:py-10 bg-white relative overflow-hidden">
  
  <div class="absolute top-0 left-0 w-64 h-64 bg-[#1a472a]/5 rounded-full -translate-x-32 -translate-y-32"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#d4a574]/10 rounded-full translate-x-48 translate-y-48"></div>
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    
    <div class="text-center mb-10 max-w-3xl mx-auto">
      <span class="text-[#d4a574] uppercase tracking-widest text-sm font-bold mb-4 block">Our Commitment</span>
      <h2 class="text-4xl md:text-5xl font-serif text-[#1a472a] mb-6">
        Why Choose Rudransh Global?
      </h2>
      <p class="text-gray-600 text-lg leading-relaxed">
        At Rudransh Global, we don't just export products; we deliver trust and quality across borders. 
        With years of expertise in the agro-commodity market, we bridge the gap between Indian farmers and global markets. 
        Our dedication to purity, hygiene, and ethical sourcing makes us the preferred partner for businesses worldwide.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
      
      <div class="text-center group p-6 rounded-xl transition-all duration-300 hover:bg-gray-50 hover:shadow-lg border border-transparent hover:border-gray-100">
        <div class="bg-[#d4a574] w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-serif text-[#1a472a] mb-3 font-semibold">Quality Assured</h3>
        <p class="text-gray-600 leading-relaxed text-sm">
          We maintain rigorous quality checks at every stage, from farm sourcing to final packaging, ensuring only the finest grade products reach you.
        </p>
      </div>

      <div class="text-center group p-6 rounded-xl transition-all duration-300 hover:bg-gray-50 hover:shadow-lg border border-transparent hover:border-gray-100">
        <div class="bg-[#d4a574] w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-serif text-[#1a472a] mb-3 font-semibold">Global Reach</h3>
        <p class="text-gray-600 leading-relaxed text-sm">
          With a strong logistics network, we successfully export premium Indian spices and grains to markets in Europe, the Middle East, and Asia.
        </p>
      </div>

      <div class="text-center group p-6 rounded-xl transition-all duration-300 hover:bg-gray-50 hover:shadow-lg border border-transparent hover:border-gray-100">
        <div class="bg-[#d4a574] w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-serif text-[#1a472a] mb-3 font-semibold">Timely Delivery</h3>
        <p class="text-gray-600 leading-relaxed text-sm">
          We understand the value of time in business. Our efficient supply chain ensures that your order is delivered fresh and on schedule, every time.
        </p>
      </div>

      <div class="text-center group p-6 rounded-xl transition-all duration-300 hover:bg-gray-50 hover:shadow-lg border border-transparent hover:border-gray-100">
        <div class="bg-[#d4a574] w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-serif text-[#1a472a] mb-3 font-semibold">Competitive Pricing</h3>
        <p class="text-gray-600 leading-relaxed text-sm">
          By eliminating unnecessary middlemen, we offer the best market rates without compromising on the premium quality of our products.
        </p>
      </div>

    </div>
  </div>
</section>
<!-- Product Categories Section -->
<section class="py-10 bg-gradient-to-b from-white to-gray-50">
  <div class="max-w-7xl mx-auto px-4">
    <!-- Section Header -->
    <div class="text-center mb-10">
      <p class="text-[#d4a574] uppercase tracking-widest text-sm font-semibold mb-4">Quality & Authenticity</p>
      <h2 class="text-4xl md:text-5xl font-serif text-gray-900 mb-6">
        Explore Our <span class="text-[#1a472a]">Premium Range</span>
      </h2>
      <p class="text-gray-600 max-w-2xl mx-auto text-lg">
        Sourced from the finest regions, carefully selected and exported with the highest standards of quality and freshness.
      </p>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      <!-- Indian Spices Card -->
      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 bg-white">
        <div class="relative h-80 overflow-hidden">
          <img src="assest/spices.jpg" alt="Indian Spices" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
          
          <!-- Crown Icon -->
          <div class="absolute top-6 right-6 bg-[#d4a574] rounded-full p-3 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 2l2.5 5 5.5.5-4 4 1 5.5-5-2.5-5 2.5 1-5.5-4-4 5.5-.5z"/>
            </svg>
          </div>
          
          <div class="absolute bottom-0 left-0 right-0 p-6">
            <h3 class="text-2xl font-serif text-white mb-2">Indian Spices</h3>
            <p class="text-gray-200 text-sm mb-4">Cardamom, Black Pepper, Turmeric, Cloves & more</p>
            <a href="spices.php" class="inline-flex items-center text-[#d4a574] hover:text-white transition-colors group">
              <span class="font-semibold">Explore Range</span>
              <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
            </a>
          </div>
        </div>
        
        <!-- Hover Overlay with Details -->
        <div class="absolute inset-0 bg-[#1a472a]/95 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center p-6">
          <div class="text-center">
            <h4 class="text-white text-xl font-serif mb-4">Premium Indian Spices</h4>
            <ul class="text-gray-200 space-y-2 mb-6">
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                100% Pure & Natural
              </li>
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Export Quality
              </li>
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Authentic Flavor
              </li>
            </ul>
            <a href="indian-spices.php" class="inline-block bg-[#d4a574] text-white px-6 py-3 rounded-lg hover:bg-[#c49565] transition-colors font-semibold">
              View Products
            </a>
          </div>
        </div>
      </div>

      <!-- Fresh Fruits Card -->
      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 bg-white">
        <div class="relative h-80 overflow-hidden">
          <img src="assest/fruit.jpg" alt="Fresh Fruits" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
          
          <!-- Crown Icon -->
          <div class="absolute top-6 right-6 bg-[#d4a574] rounded-full p-3 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 2l2.5 5 5.5.5-4 4 1 5.5-5-2.5-5 2.5 1-5.5-4-4 5.5-.5z"/>
            </svg>
          </div>
          
          <div class="absolute bottom-0 left-0 right-0 p-6">
            <h3 class="text-2xl font-serif text-white mb-2">Fresh Fruits</h3>
            <p class="text-gray-200 text-sm mb-4">Handpicked seasonal fruits with guaranteed freshness</p>
            <a href="fruits.php" class="inline-flex items-center text-[#d4a574] hover:text-white transition-colors group">
              <span class="font-semibold">Explore Range</span>
              <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
            </a>
          </div>
        </div>
        
        <!-- Hover Overlay -->
        <div class="absolute inset-0 bg-[#1a472a]/95 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center p-6">
          <div class="text-center">
            <h4 class="text-white text-xl font-serif mb-4">Farm Fresh Fruits</h4>
            <ul class="text-gray-200 space-y-2 mb-6">
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Carefully Selected
              </li>
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Optimal Ripeness
              </li>
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Global Export
              </li>
            </ul>
            <a href="fresh-fruit.php" class="inline-block bg-[#d4a574] text-white px-6 py-3 rounded-lg hover:bg-[#c49565] transition-colors font-semibold">
              View Products
            </a>
          </div>
        </div>
      </div>

      <!-- Indian Rice Card -->
      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 bg-white">
        <div class="relative h-80 overflow-hidden">
          <img src="assest/rice.jpg" alt="Indian Rice" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
          
          <!-- Crown Icon -->
          <div class="absolute top-6 right-6 bg-[#d4a574] rounded-full p-3 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 2l2.5 5 5.5.5-4 4 1 5.5-5-2.5-5 2.5 1-5.5-4-4 5.5-.5z"/>
            </svg>
          </div>
          
          <div class="absolute bottom-0 left-0 right-0 p-6">
            <h3 class="text-2xl font-serif text-white mb-2">Indian Rice</h3>
            <p class="text-gray-200 text-sm mb-4">Premium Basmati & specialty rice varieties</p>
            <a href="rice.php" class="inline-flex items-center text-[#d4a574] hover:text-white transition-colors group">
              <span class="font-semibold">Explore Range</span>
              <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
            </a>
          </div>
        </div>
        
        <!-- Hover Overlay -->
        <div class="absolute inset-0 bg-[#1a472a]/95 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center p-6">
          <div class="text-center">
            <h4 class="text-white text-xl font-serif mb-4">Premium Basmati Rice</h4>
            <ul class="text-gray-200 space-y-2 mb-6">
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Aged to Perfection
              </li>
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Extra Long Grain
              </li>
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Aromatic Quality
              </li>
            </ul>
            <a href="indian-rice.php" class="inline-block bg-[#d4a574] text-white px-6 py-3 rounded-lg hover:bg-[#c49565] transition-colors font-semibold">
              View Products
            </a>
          </div>
        </div>
      </div>

<!-- Turmeric Card -->
<div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 bg-white">
  <div class="relative h-80 overflow-hidden">
    <img src="assest/haldi.jpg" alt="Premium Turmeric" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

    <!-- Crown Icon -->
    <div class="absolute top-6 right-6 bg-[#d4a574] rounded-full p-3 shadow-lg">
      <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 2l2.5 5 5.5.5-4 4 1 5.5-5-2.5-5 2.5 1-5.5-4-4 5.5-.5z"/>
      </svg>
    </div>

    <div class="absolute bottom-0 left-0 right-0 p-6">
      <h3 class="text-2xl font-serif text-white mb-2">Premium Turmeric</h3>
      <p class="text-gray-200 text-sm mb-4">High-curcumin turmeric sourced directly from farms</p>
      <a href="turmeric.php" class="inline-flex items-center text-[#d4a574] hover:text-white transition-colors group">
        <span class="font-semibold">Explore Range</span>
        <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
      </a>
    </div>
  </div>

  <!-- Hover Overlay -->
  <div class="absolute inset-0 bg-[#1a472a]/95 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center p-6">
    <div class="text-center">
      <h4 class="text-white text-xl font-serif mb-4">Premium Turmeric</h4>
      <ul class="text-gray-200 space-y-2 mb-6">
        <li class="flex items-center justify-center">
          <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
          High Curcumin Content
        </li>
        <li class="flex items-center justify-center">
          <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
          Naturally Processed
        </li>
        <li class="flex items-center justify-center">
          <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
          Export Quality
        </li>
      </ul>
      <a href="indian-spices.php" class="inline-block bg-[#d4a574] text-white px-6 py-3 rounded-lg hover:bg-[#c49565] transition-colors font-semibold">
        View Products
      </a>
    </div>
  </div>
</div>


      <!-- Pulses & Legumes Card -->
      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 bg-white">
        <div class="relative h-80 overflow-hidden">
          <img src="assest/ilaichi.jpeg" alt="Pulses & Legumes" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
          
          <!-- Crown Icon -->
          <div class="absolute top-6 right-6 bg-[#d4a574] rounded-full p-3 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 2l2.5 5 5.5.5-4 4 1 5.5-5-2.5-5 2.5 1-5.5-4-4 5.5-.5z"/>
            </svg>
          </div>
          
          <div class="absolute bottom-0 left-0 right-0 p-6">
            <h3 class="text-2xl font-serif text-white mb-2">Premium Cardamom</h3>
            <p class="text-gray-200 text-sm mb-4">High-protein pulses rich in nutrients</p>
            <a href="pulses.php" class="inline-flex items-center text-[#d4a574] hover:text-white transition-colors group">
              <span class="font-semibold">Explore Range</span>
              <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
            </a>
          </div>
        </div>
        
        <!-- Hover Overlay -->
        <div class="absolute inset-0 bg-[#1a472a]/95 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center p-6">
          <div class="text-center">
            <h4 class="text-white text-xl font-serif mb-4">Premium Pulses</h4>
            <ul class="text-gray-200 space-y-2 mb-6">
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Rich Aroma & Flavor
              </li>
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                 Handpicked Quality Pods
              </li>
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                   Export Grade Processing
              </li>
            </ul>
            <a href="indian-spices.php" class="inline-block bg-[#d4a574] text-white px-6 py-3 rounded-lg hover:bg-[#c49565] transition-colors font-semibold">
              View Products
            </a>
          </div>
        </div>
      </div>

      <!-- Dry Fruits Card -->
      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 bg-white">
        <div class="relative h-80 overflow-hidden">
          <img src="assest/dryfruits.jpg" alt="Dry Fruits" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
          
          <!-- Crown Icon -->
          <div class="absolute top-6 right-6 bg-[#d4a574] rounded-full p-3 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 2l2.5 5 5.5.5-4 4 1 5.5-5-2.5-5 2.5 1-5.5-4-4 5.5-.5z"/>
            </svg>
          </div>
          
          <div class="absolute bottom-0 left-0 right-0 p-6">
            <h3 class="text-2xl font-serif text-white mb-2">Dry Fruits & Nuts</h3>
            <p class="text-gray-200 text-sm mb-4">Premium quality almonds, cashews & more</p>
            <a href="dry-fruits.php" class="inline-flex items-center text-[#d4a574] hover:text-white transition-colors group">
              <span class="font-semibold">Explore Range</span>
              <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
            </a>
          </div>
        </div>
        
        <!-- Hover Overlay -->
        <div class="absolute inset-0 bg-[#1a472a]/95 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center p-6">
          <div class="text-center">
            <h4 class="text-white text-xl font-serif mb-4">Premium Dry Fruits</h4>
            <ul class="text-gray-200 space-y-2 mb-6">
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Naturally Dried
              </li>
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Rich in Nutrients
              </li>
              <li class="flex items-center justify-center">
                <span class="w-2 h-2 bg-[#d4a574] rounded-full mr-2"></span>
                Premium Grade
              </li>
            </ul>
            <a href="dry-fruits.php" class="inline-block bg-[#d4a574] text-white px-6 py-3 rounded-lg hover:bg-[#c49565] transition-colors font-semibold">
              View Products
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!--How We Work-->
<section class="py-10 bg-white relative overflow-hidden">
    
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-30 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#1a472a]/5 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 right-0 w-64 h-64 bg-[#d4a574]/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center max-w-3xl mx-auto mb-10">
            <span class="text-[#d4a574] font-bold tracking-widest uppercase text-sm">How We Work</span>
            <h2 class="text-4xl md:text-5xl font-serif text-[#1a472a] mt-3 mb-6">
                Our Quality Journey
            </h2>
            <p class="text-gray-600 text-lg">
                From the fertile fields of India to your doorstep, we ensure every step creates value and preserves freshness.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12 relative">
            
            <div class="hidden md:block absolute top-12 left-[16%] right-[16%] h-0.5 border-t-2 border-dashed border-[#d4a574]/30 z-0"></div>

            <div class="relative group z-10">
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-center h-full">
                    <div class="w-24 h-24 mx-auto bg-[#1a472a] rounded-full flex items-center justify-center mb-8 relative border-4 border-white shadow-md group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-[#d4a574] rounded-full flex items-center justify-center text-white font-bold text-sm border-2 border-white">
                            01
                        </div>
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-serif text-[#1a472a] mb-4">Ethical Harvesting</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">
                        We partner directly with farmers to source crops at peak maturity. Whether it's hand-picked spices or carefully harvested grains, we ensure the raw material is 100% natural and potent.
                    </p>
                </div>
            </div>

            <div class="relative group z-10">
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-center h-full">
                    <div class="w-24 h-24 mx-auto bg-[#d4a574] rounded-full flex items-center justify-center mb-8 relative border-4 border-white shadow-md group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-[#1a472a] rounded-full flex items-center justify-center text-white font-bold text-sm border-2 border-white">
                            02
                        </div>
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-serif text-[#1a472a] mb-4">Clean Processing</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">
                        Our state-of-the-art facilities ensure thorough cleaning, sorting, and grading. We use advanced technology to remove impurities while retaining the natural aroma and nutritional value.
                    </p>
                </div>
            </div>

            <div class="relative group z-10">
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-center h-full">
                    <div class="w-24 h-24 mx-auto bg-[#1a472a] rounded-full flex items-center justify-center mb-8 relative border-4 border-white shadow-md group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-[#d4a574] rounded-full flex items-center justify-center text-white font-bold text-sm border-2 border-white">
                            03
                        </div>
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-serif text-[#1a472a] mb-4">Safe Packaging</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">
                        We prioritize shelf-life. Products are vacuum-packed or nitrogen-flushed in multi-layer food-grade material, ensuring they arrive fresh anywhere in the world.
                    </p>
                </div>
            </div>

        </div>

        <div class="mt-16 text-center">
            <a href="contact.php" class="inline-block px-10 py-3 bg-[#d4a574] text-white font-semibold rounded hover:bg-[#1a472a] transition-all duration-300 shadow-md hover:shadow-xl">
                Get a Quote
            </a>
        </div>

    </div>
</section>

<?php include 'footer.php'?>