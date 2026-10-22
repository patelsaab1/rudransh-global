<?php
include 'header.php';
include 'admin/db.php';

$id = $_GET['id'];
$product = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM products WHERE id='$id'")
);
?>

<section class="relative h-[80vh] flex items-center justify-center overflow-hidden bg-black">
    <video 
        autoplay 
        muted 
        loop 
        playsinline 
        webkit-playsinline
        class="absolute inset-0 w-full h-full object-cover opacity-60 z-0"
    >
        <source src="assest/<?= $product['hero_video'] ?>" type="video/mp4">
        
        <source src="assest/Hero_video.mp4" type="video/mp4">
        
        Your browser does not support the video tag.
    </video>

    <div class="absolute inset-0  z-0"></div>

    <div class="relative z-10 text-center px-4">
        <span class="text-[#d4a574] font-bold tracking-[0.4em] uppercase text-xs block mb-4 animate-fade-in">
            Premium Export Quality
        </span>
        <h1 class="text-4xl md:text-7xl font-serif text-white mb-6 drop-shadow-2xl">
            <?= $product['name'] ?>
        </h1>
        <div class="w-16 h-1 bg-[#d4a574] mx-auto rounded-full"></div>
    </div>
</section>

<section class="py-16 md:py-16 bg-[#faf8f5] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
        
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-serif text-[#1a472a]">
                The Journey of <span class="text-[#d4a574]">Excellence</span>
            </h2>
            <p class="text-gray-500 mt-2 italic text-sm">From source to your doorstep, every step matters.</p>
        </div>

        <div class="space-y-20 md:space-y-32">
            <?php
            $steps = mysqli_query($conn, "SELECT * FROM product_process WHERE product_id='$id' ORDER BY step_order");
            $count = 0;
            while($s = mysqli_fetch_assoc($steps)){
                $isEven = $count % 2 != 0;
                $count++;
            ?>

            <div class="reveal flex flex-col <?= $isEven ? 'md:flex-row-reverse' : 'md:flex-row' ?> gap-8 md:gap-16 items-center">
                
                <div class="w-full md:w-2/5 flex justify-center group">
                    <div class="relative">
                        <div class="absolute -inset-2 border-2 border-dashed border-[#d4a574]/30 rounded-full animate-[spin_20s_linear_infinite]"></div>
                        
                        <div class="relative w-52 h-52 sm:w-64 sm:h-64 md:w-80 md:h-80 overflow-hidden rounded-full shadow-2xl border-4 border-white">
                            <img src="<?= $s['step_image'] ?>" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                 alt="<?= $s['step_title'] ?>">
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-3/5 px-2">
                    <h3 class="text-2xl md:text-3xl font-serif text-[#1a472a] mb-5 leading-tight">
                        <?= $s['step_title'] ?>
                    </h3>

                    <?php
                    $points = preg_split("/\r\n|\n|\r/", trim($s['step_content']));
                    ?>
                    
                    <ul class="space-y-3">
                        <?php foreach ($points as $index => $p) {
                            if (trim($p) != '') {
                        ?>
                        <li class="flex items-start gap-4 group/item">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-[#d4a574] text-[#1a472a ] flex items-center justify-center font-bold text-[10px]">
                                <?= $index + 1 ?>
                            </span>
                            <p class="text-gray-600 text-sm leading-relaxed pt-0.5">
                                <?= htmlspecialchars($p) ?>
                            </p>
                        </li>
                        <?php } } ?>
                    </ul>
                </div>

            </div>

            <?php } ?>
        </div>
    </div>
</section>

<style>
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease-out;
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 1s ease-out forwards;
    }
</style>

<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) { entry.target.classList.add('active'); }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach((el) => observer.observe(el));
</script>

<?php include 'footer.php'; ?>