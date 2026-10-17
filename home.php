<?php
include 'admin/db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$showModal = false;
$userName = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $product = mysqli_real_escape_string($conn, $_POST['product_interest']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO enquiries (name, email, phone, product_interest, message) 
              VALUES ('$name', '$email', '$phone', '$product', '$message')";
    
if(mysqli_query($conn, $query)) {

$mail = new PHPMailer(true);

try {

require __DIR__ . '/admin/mail.local.php';

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $mailUser;
$mail->Password = $mailPass;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom($mailUser, $mailFromName);

$mail->addAddress('rp750947@gmail.com');
$mail->addAddress('rohitkiaaan@gmail.com');

$mail->Subject = "New Contact Form Enquiry";

$mail->Body =
"New Contact Form Submission\n\n".
"Name: $name\n".
"Email: $email\n".
"Phone: $phone\n".
"Product: $product\n\n".
"Message:\n$message";

$mail->send();

$showModal = true;
$userName = $name;

} catch (Exception $e) {
echo "Mailer Error: " . $mail->ErrorInfo;
}

}

}

include 'header.php'; 
?>
<style>
    /* Base Slide Style */
    .hero-slide {
        position: absolute;
        inset: 0;
        z-index: 1;
        /* Clip-path is the secret for liquid effect */
        clip-path: inset(0 0 0 0); 
        transition: clip-path 1.3s cubic-bezier(0.7, 0, 0.3, 1);
    }

    /* Directional initial states - slides hidden initially */
    .slide-from-left { clip-path: inset(0 100% 0 0); }
    .slide-from-right { clip-path: inset(0 0 0 100%); }
    .slide-from-top { clip-path: inset(0 0 100% 0); }
    .slide-from-bottom { clip-path: inset(100% 0 0 0); }

    /* Jab slide active ho */
    .hero-slide.active {
        z-index: 10;
        clip-path: inset(0 0 0 0) !important;
    }

    /* Content Fade Animation */
    #hero-heading, #hero-text {
        transition: all 0.8s ease-out;
    }

    /* Zoom effect on active image */
    .hero-slide.active img {
        animation: kenBurns 10s infinite alternate;
    }

    @keyframes kenBurns {
        from { transform: scale(1); }
        to { transform: scale(1.15); }
    }

    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); } /* Half translate for perfect loop */
    }
    .animate-marquee {
        display: flex;
        width: max-content;
        animation: marquee 20s linear infinite;
    }
    /* Stop on hover */
    .animate-marquee:hover {
        animation-play-state: paused;
    }


}


</style>
<section class="relative h-[550px] md:h-screen sm:h-[450px] overflow-hidden bg-gray-50">

    <div class="absolute inset-0" id="hero-slider-container">

    <!-- Slide 0 : Agriculture Export -->
    <div class="hero-slide active" id="slide-0">
        <img src="assest/hero4"
             class="w-full h-full object-cover"
             alt="Agricultural Export">
        <div class="absolute inset-0 bg-black/45"></div>
    </div>

    <!-- Slide 1 : Spices -->
    <div class="hero-slide slide-from-left" id="slide-1">
        <img src="assest/hero1.jpg"
             class="w-full h-full object-cover"
             alt="Indian Spices">
        <div class="absolute inset-0 bg-black/45"></div>
    </div>

    <!-- Slide 2 : Rice -->
    <div class="hero-slide slide-from-bottom" id="slide-2">
        <img src="assest/hero2.jpg"
             class="w-full h-full object-cover"
             alt="Indian Rice">
        <div class="absolute inset-0 bg-black/45"></div>
    </div>

    <!-- Slide 3 : Fruits & Dry Fruits -->
    <div class="hero-slide slide-from-right" id="slide-3">
        <img src="assest/hero3"
             class="w-full h-full object-cover"
             alt="Fresh Fruits and Dry Fruits">
        <div class="absolute inset-0 bg-black/45"></div>
    </div>
</div>


    <div class="absolute inset-0 flex items-center justify-center z-30 px-6 text-center">
        <div class="text-white max-w-4xl">
            <h1 id="hero-heading" class="text-4xl md:text-7xl font-serif mb-6 leading-tight drop-shadow-2xl">
                Premium Indian <br> Agricultural Exports 
            </h1>
            <p id="hero-text" class="text-sm md:text-lg font-light mb-8 max-w-2xl mx-auto opacity-90 drop-shadow-lg">
                Your trusted partner for exporting high-quality Indian agricultural products. We ensure quality sourcing, hygienic processing, and reliable delivery to global markets.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="contact.php" class="btn-premium btn-gold px-8 py-3 rounded-full text-xs uppercase font-bold tracking-widest">Request a Quote</a>
                <a href="product.php" class="btn-premium btn-outline px-8 py-3 rounded-full text-xs uppercase font-bold tracking-widest">View Products</a>
            </div>
        </div>
    </div>
    <div class="hidden sm:flex absolute inset-0 items-center justify-between px-8 z-40 pointer-events-none">
        <button onclick="prevSlide()" class="pointer-events-auto w-14 h-14 flex items-center justify-center border border-white/30 text-white hover:bg-[#d4a574] hover:border-[#d4a574] transition-all rounded-full">
            <i class="fas fa-arrow-left"></i>
        </button>
        <button onclick="nextSlide()" class="pointer-events-auto w-14 h-14 flex items-center justify-center border border-white/30 text-white hover:bg-[#d4a574] hover:border-[#d4a574] transition-all rounded-full">
            <i class="fas fa-arrow-right"></i>
        </button>
    </div>

    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-3 z-40">
        <button onclick="goToSlide(0)" class="indicator w-12 h-1 rounded-full bg-[#d4a574] transition-all duration-500" data-slide="0"></button>
        <button onclick="goToSlide(1)" class="indicator w-6 h-1 rounded-full bg-white/30 transition-all duration-500" data-slide="1"></button>
        <button onclick="goToSlide(2)" class="indicator w-6 h-1 rounded-full bg-white/30 transition-all duration-500" data-slide="2"></button>
        <button onclick="goToSlide(3)" class="indicator w-6 h-1 rounded-full bg-white/30 transition-all duration-500" data-slide="3"></button>
    </div>
</section> 

<section id="products" class="py-10 px-4 sm:px-6 lg:px-8 relative bg-white">
    <span class="absolute top-10 left-10 text-[12rem] font-bold text-gray-100/50 pointer-events-none select-none leading-none">01</span>

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-8">
            <div class="max-w-2xl">
                <p class="text-sm font-bold tracking-[0.3em] uppercase mb-4 text-[#d4a574] flex items-center">
                    <span class="w-8 h-[1px] bg-[#d4a574] mr-3"></span>
                    Our Premium Collection
                </p>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-[#1a472a]">Featured Products</h2>
                <p class="text-gray-500 text-lg">
                    Discover our carefully curated selection of premium Indian spices sourced from trusted farms.
                </p>
            </div>

            <a href="product.php"
               class=" btn-premium btn-gold  inline-flex items-center group px-8 py-4 rounded-full text-xs uppercase tracking-widest font-black  transition-all shadow-xl">
                Explore More Products
                <i class="fa-solid fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform"></i>
            </a>
        </div>
        <!-- Products Grid -->
<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

<!-- 1 Spices -->
<div class="product-card bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-2xl transition">
<img src="assest/spices.jpg" class="h-64 w-full object-cover">
<div class="p-6">
<h3 class="text-2xl font-bold text-[#1a472a] mb-3">Premium Spices</h3>
<p class="text-sm text-gray-600 mb-4">Handpicked Indian spices with rich aroma and export quality.</p>
<ul class="text-xs text-gray-500 mb-6 space-y-2">
<li>✔ Natural Processing</li>
<li>✔ Export Grade</li>
</ul>
<a href="#contact" class="text-sm font-bold text-[#d4a574]">Request Sample →</a>
</div>
</div>

<!-- 2 Indian Rice -->
<div class="product-card bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-2xl transition">
<img src="assest/rice.jpg" class="h-64 w-full object-cover">
<div class="p-6">
<h3 class="text-2xl font-bold text-[#1a472a] mb-3">Indian Rice</h3>
<p class="text-sm text-gray-600 mb-4">Premium basmati & non-basmati rice sourced from trusted farms.</p>
<ul class="text-xs text-gray-500 mb-6 space-y-2">
<li>✔ Long Grain</li>
<li>✔ Export Quality</li>
</ul>
<a href="#contact" class="text-sm font-bold text-[#d4a574]">Request Sample →</a>
</div>
</div>

<!-- 3 Fresh Fruits -->
<div class="product-card bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-2xl transition">
<img src="assest/fruit.jpg" class="h-64 w-full object-cover">
<div class="p-6">
<h3 class="text-2xl font-bold text-[#1a472a] mb-3">Fresh Fruits</h3>
<p class="text-sm text-gray-600 mb-4">Fresh seasonal fruits packed for global export markets.</p>
<ul class="text-xs text-gray-500 mb-6 space-y-2">
<li>✔ Farm Fresh</li>
<li>✔ Hygienic Packing</li>
</ul>
<a href="#contact" class="text-sm font-bold text-[#d4a574]">Request Sample →</a>
</div>
</div>

<!-- 4 Dry Fruits -->
<div class="product-card bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-2xl transition">
<img src="assest/dryfruits.jpg" class="h-64 w-full object-cover">
<div class="p-6">
<h3 class="text-2xl font-bold text-[#1a472a] mb-3">Dry Fruits</h3>
<p class="text-sm text-gray-600 mb-4">Premium quality dry fruits with careful grading and packaging.</p>
<ul class="text-xs text-gray-500 mb-6 space-y-2">
<li>✔ Hand Selected</li>
<li>✔ Export Packed</li>
</ul>
<a href="#contact" class="text-sm font-bold text-[#d4a574]">Request Sample →</a>
</div>
</div>

</div>


        </div>
    </div>
</section>



    <!-- Services Section -->
    <section id="services" class="py-10 px-4 sm:px-6 lg:px-8 bg-white relative">
        <span class="section-number">02</span>
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <p class="text-lg mb-3 tracking-wider" style="color: var(--color-secondary);">COMPREHENSIVE SOLUTIONS</p>
                <h2 class="text-5xl font-bold mb-4" style="color: var(--color-primary);">Our Services</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">End-to-end export solutions designed to make international trade seamless and efficient for our partners worldwide.</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1 -->
                <div class="text-center group">
                    <div class="service-icon mx-auto transform group-hover:scale-110 transition-transform duration-300">
                       <i class="fa-solid fa-check-double text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" style="color: var(--color-primary);">Quality Control</h3>
                    <p class="text-gray-600 leading-relaxed">Rigorous quality checks at every stage from sourcing to packaging. Multi-level inspection processes, laboratory testing, and compliance with international food safety standards including HACCP and ISO certifications.</p>
                </div>
                
                <!-- Service 2 -->
                <div class="text-center group">
                    <div class="service-icon mx-auto transform group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-box-open text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" style="color: var(--color-primary);">Private Label Packaging</h3>
                    <p class="text-gray-600 leading-relaxed">Custom branding and packaging solutions tailored to your brand identity. From design consultation to production, we handle all aspects of private label packaging with flexible MOQs and premium materials.</p>
                </div>
                
                <!-- Service 3 -->
                <div class="text-center group">
                    <div class="service-icon mx-auto transform group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-ship text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" style="color: var(--color-primary);">Logistics & Export Support</h3>
                    <p class="text-gray-600 leading-relaxed">Complete logistics management including freight forwarding, customs clearance, documentation, and shipping. Strategic partnerships with major carriers ensure timely delivery and competitive rates worldwide.</p>
                </div>
                
                <!-- Service 4 -->
                <div class="text-center group">
                    <div class="service-icon mx-auto transform group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-award text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" style="color: var(--color-primary);">Certifications & Compliance</h3>
                    <p class="text-gray-600 leading-relaxed">Full compliance support with international certifications including FSSAI, ISO 22000, HACCP, Halal, Kosher, and organic certifications. Expert guidance on regulatory requirements for target markets.</p>
                </div>
            </div>
            
            <!-- Additional Services Info -->
            <div class="mt-16 bg-[#faf8f5] rounded-2xl p-8 md:p-12">
                <div class="grid md:grid-cols-3 gap-8">
                    <div>
                        <h4 class="text-lg font-bold mb-3" style="color: var(--color-primary);">Competitive Pricing</h4>
                        <p class="text-gray-600">Direct sourcing relationships and efficient operations allow us to offer market-competitive pricing without compromising on quality.</p>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold mb-3" style="color: var(--color-primary);">Flexible Terms</h4>
                        <p class="text-gray-600">Adaptable payment terms, customizable order quantities, and flexible delivery schedules to meet your business requirements.</p>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold mb-3" style="color: var(--color-primary);">24/7 Support</h4>
                        <p class="text-gray-600">Dedicated account managers and round-the-clock customer support to address your queries and ensure smooth operations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-10 px-4 sm:px-6 lg:px-8 relative">
        <span class="section-number">03</span>
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-lg mb-3 tracking-wider" style="color: var(--color-secondary);">ESTABLISHED</p>
                    <h2 class="text-5xl font-bold mb-6" style="color: var(--color-primary);">About Rudransh Global</h2>
                    <p class="text-gray-600 text-md leading-relaxed mb-6">
                        Rudransh Global (rudransh-global.com) is a trusted Indian agro export company, connecting premium Indian agricultural products with global markets. We specialize in sourcing, processing, packaging, and exporting high-quality spices, rice, fresh fruits, and dry fruits to international B2B buyers with a strong focus on quality and consistency.
                    </p>
                    <p class="text-gray-600 text-md leading-relaxed mb-6">
                        Today, we partner with over 300 farmers and suppliers across India, ensuring sustainable sourcing practices and fair trade. Our state-of-the-art processing facilities and quality control laboratories guarantee that every product meets the highest international standards.
                    </p>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg mb-6">
                        <h3 class="text-2xl font-bold mb-4" style="color: var(--color-primary);">Our Mission</h3>
                        <p class="text-gray-600 leading-relaxed">To deliver world-class agricultural products while championing sustainability, empowering local farming communities, and building lasting partnerships based on trust and excellence.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg mb-6">
                        <h3 class="text-2xl font-bold mb-4" style="color: var(--color-primary);">Our Vision</h3>
                        <p class="text-gray-600 leading-relaxed">To be recognized globally as the most reliable and innovative agricultural export partner, setting industry standards for quality, compliance, and customer satisfaction.</p>
                    </div>
                    
                </div>
                
                            <div class="space-y-8 reveal" style="transition-delay: 0.2s;">
                <div class="relative floating">
                    <img src="assest/about1.jpg" alt="Warehouse Facility" class="rounded-2xl shadow-2xl w-full h-90 object-cover">
                    <div class="absolute bottom-6 left-6 bg-white/95 backdrop-blur-sm rounded-xl p-4 shadow-lg">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-warehouse text-[#d4a574] text-2xl"></i>
                            <div>
                                <div class="font-bold text-[#1a472a]">Farm-Level Harvesting</div>
                                <div class="text-sm text-gray-600">Fresh sourcing directly from fields</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="relative group overflow-hidden rounded-2xl shadow-xl">
                        <img src="assest/about2.jpg" alt="Quality Control" class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-4">
                            <span class="text-white font-semibold text-sm"> Hygienic Processing & Quality Inspection</span>
                        </div>
                    </div>
                    <div class="relative group overflow-hidden rounded-2xl shadow-xl">
                        <img src="assest/about3.jpg" alt="Premium Packaging" class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-4">
                            <span class="text-white font-semibold text-sm"> Export-Grade Packaging</span>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
        </div>
    </section>
    
    <!-- Certifications -->
<section class="py-8 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 mb-10 text-center">
        <h3 class="text-3xl font-bold mb-3" style="color: #1a472a;">Our Certifications</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">High international quality standards we adhere to.</p>
    </div>

<div class="relative flex overflow-x-hidden border-t border-b border-gray-50 py-4 md:py-8">
    <div class="flex animate-marquee whitespace-nowrap items-center">
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/fssai.jpg" class="h-16 md:h-20 object-contain" alt="FSSAI">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-500 uppercase tracking-widest">Food Safety</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/apeda.png" class="h-16 md:h-20 object-contain" alt="APEDA">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-500 uppercase tracking-widest">Export Promotion</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/halal.png" class="h-16 md:h-20 object-contain" alt="HALAL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-500 uppercase tracking-widest">Halal Certified</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/iso.png" class="h-16 md:h-20 object-contain" alt="ISO">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-500 uppercase tracking-widest">ISO 9001:2015</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/TEXPROCIL.png" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">Export Council</p>
        </div>
         <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/degi.png" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">India Trade Intelligence</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/ficci.png" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">Voice of Indian Business</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/teaboard.jpg" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tea Board of India</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/spiceboard.jpg" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">Spices Board India</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/fifo.png" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">India’s Export Partner
</p>
        </div>
    </div>

        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/fssai.jpg" class="h-16 md:h-20 object-contain" alt="FSSAI">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-500 uppercase tracking-widest">Food Safety</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/apeda.png" class="h-16 md:h-20 object-contain" alt="APEDA">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-500 uppercase tracking-widest">Export Promotion</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/halal.png" class="h-16 md:h-20 object-contain" alt="HALAL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-500 uppercase tracking-widest">Halal Certified</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/iso.png" class="h-16 md:h-20 object-contain" alt="ISO">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-500 uppercase tracking-widest">ISO 9001:2015</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/TEXPROCIL.png" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">Export Council</p>
        </div>
         <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/degi.png" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">India Trade Intelligence</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/ficci.png" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">Voice of Indian Business</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/teaboard.jpg" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tea Board of India</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/spiceboard.jpg" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">Spices Board India</p>
        </div>
        <div class="mx-4 md:mx-12 w-32 md:w-40 flex-shrink-0 flex flex-col items-center">
            <img src="assest/fifo.png" class="h-16 md:h-20 object-contain" alt="TEXPROCIL">
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">India’s Export Partner</p>
        </div>
    </div>
</div>
</section>


    <!-- How It Works -->
    <section id="how-it-works" class="py-10 px-4 sm:px-6 lg:px-8 bg-white relative">
        <span class="section-number">04</span>
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <p class="text-lg mb-3 tracking-wider" style="color: var(--color-secondary);">SEAMLESS PROCESS</p>
                <h2 class="text-5xl font-bold mb-4" style="color: var(--color-primary);">How It Works</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">From sourcing to delivery, we handle every step with precision and care to ensure your complete satisfaction.</p>
            </div>
            
            <div class="relative max-w-4xl mx-auto">
                <div class="timeline-line hidden md:block"></div>
                
                <!-- Step 1 -->
                <div class="relative mb-16">
                    <div class="timeline-dot hidden md:block" style="top: 2rem;"></div>
                    <div class="md:grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right mb-6 md:mb-0">
                            <div class="inline-block bg-[#d4a574] text-white px-4 py-2 rounded-full text-sm font-bold mb-4">STEP 1</div>
                            <h3 class="text-2xl font-bold mb-3" style="color: var(--color-primary);">Inquiry & Requirements</h3>
                            <p class="text-gray-600">Share your product requirements, target specifications, quantity needs, and delivery timeline. Our team responds within 24 hours with detailed information and pricing.</p>
                        </div>
                        <div>
                            <div class="stat-card p-6 rounded-2xl shadow-lg">
                                <div class="text-4xl mb-3 text-[#d4a574]">
    <i class="fa-solid fa-clipboard-check"></i>
</div>

                                <h4 class="font-bold mb-2" style="color: var(--color-primary);">Quick Response</h4>
                                <p class="text-sm text-gray-600">24-hour turnaround on all inquiries with detailed quotations</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="relative mb-16">
                    <div class="timeline-dot hidden md:block" style="top: 2rem;"></div>
                    <div class="md:grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:col-start-2 mb-6 md:mb-0">
                            <div class="inline-block bg-[#d4a574] text-white px-4 py-2 rounded-full text-sm font-bold mb-4">STEP 2</div>
                            <h3 class="text-2xl font-bold mb-3" style="color: var(--color-primary);">Sourcing & Quality Check</h3>
                            <p class="text-gray-600">We source products from our verified supplier network and conduct rigorous quality testing in our laboratories to ensure they meet international standards.</p>
                        </div>
                        <div class="md:row-start-1">
                            <div class="stat-card p-6 rounded-2xl shadow-lg">
                                <div class="text-4xl mb-3 text-[#d4a574]">
    <i class="fa-solid fa-flask-vial"></i>
</div>

                                <h4 class="font-bold mb-2" style="color: var(--color-primary);">Quality Assured</h4>
                                <p class="text-sm text-gray-600">Multi-level inspection and laboratory testing</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="relative mb-10">
                    <div class="timeline-dot hidden md:block" style="top: 2rem;"></div>
                    <div class="md:grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right mb-6 md:mb-0">
                            <div class="inline-block bg-[#d4a574] text-white px-4 py-2 rounded-full text-sm font-bold mb-4">STEP 3</div>
                            <h3 class="text-2xl font-bold mb-3" style="color: var(--color-primary);">Packaging & Certification</h3>
                            <p class="text-gray-600">Products are carefully packaged according to your specifications or our standard export packaging. All necessary certifications and documentation are prepared.</p>
                        </div>
                        <div>
                            <div class="stat-card p-6 rounded-2xl shadow-lg">
                                <div class="text-4xl mb-3"><i class="fa-solid fa-box-open"></i></div>
                                <h4 class="font-bold mb-2" style="color: var(--color-primary);">Custom Packaging</h4>
                                <p class="text-sm text-gray-600">Private label options with complete documentation</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 4 -->
                <div class="relative">
                    <div class="timeline-dot hidden md:block" style="top: 2rem;"></div>
                    <div class="md:grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:col-start-2 mb-6 md:mb-0">
                            <div class="inline-block bg-[#d4a574] text-white px-4 py-2 rounded-full text-sm font-bold mb-4">STEP 4</div>
                            <h3 class="text-2xl font-bold mb-3" style="color: var(--color-primary);">Shipping & Delivery</h3>
                            <p class="text-gray-600">We coordinate with trusted logistics partners for customs clearance and shipping. Track your shipment in real-time until it reaches your destination safely.</p>
                        </div>
                        <div class="md:row-start-1">
                            <div class="stat-card p-6 rounded-2xl shadow-lg">
                                <div class="text-4xl mb-3"> <i class="fa-solid fa-globe"></i></div>
                                <h4 class="font-bold mb-2" style="color: var(--color-primary);">Global Delivery</h4>
                                <p class="text-sm text-gray-600">Timely delivery with end-to-end tracking</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--harvesting-->
<section class="process-section py-10 px-4 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
  <div class="max-w-6xl mx-auto">
    
    <div class="text-center mb-20">
      <h2 class="text-[#d4a574] font-bold tracking-widest uppercase text-sm mb-3">Our Process</h2>
      <h1 class="text-4xl md:text-5xl font-bold text-[#1a472a]  mb-6 tracking-tight">
        Our Operational <span class="text-transparent bg-clip-text bg-[#1a472a]">Excellence</span>
      </h1>
      <div class="w-24 h-1.5 bg-[#d4a574] mx-auto rounded-full mb-6"></div>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
        Quality is never an accident; it is the result of a deliberate, systematic process designed to deliver perfection from soil to shelf.
      </p>
    </div>

    <div class="space-y-10 relative">
      <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-0.5 bg-[#f6ecdd] -translate-x-1/2"></div>

      <div class="group relative grid md:grid-cols-2 gap-8 md:gap-16 items-center">
        <div class="relative order-1 md:order-1">
          <div class="relative z-10 overflow-hidden rounded-2xl shadow-2xl transform transition duration-500 group-hover:scale-105">
            <img src="assest/1.png" alt="Professional Harvesting" class="w-full h-[350px] object-cover" />
          </div>
          <div class="absolute -top-4 -left-4 w-24 h-24 bg-[#d4a574]/10 rounded-full -z-0"></div>
        </div>
        
        <div class="order-2 md:order-2 bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
          <div class="flex items-center mb-4">
            <span class="text-4xl font-black text-[#d4a574] mr-4">01</span>
            <h3 class="text-2xl text-gray-800 font-bold uppercase tracking-wider">Harvesting</h3>
          </div>
          <ul class="space-y-4 text-gray-600">
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Optimal Timing:</strong> All crops are harvested at their peak maturity to ensure maximum nutritional value and quality.</li>
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Expert Selection:</strong> We only select raw materials that meet our stringent quality and safety parameters.</li>
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Hand-Picked Care:</strong> Sensitive produce is harvested by hand to preserve its natural texture and integrity.</li>
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Freshness Guarantee:</strong> Immediate transport to our processing units prevents moisture loss and maintains farm-freshness.</li>
          </ul>
        </div>
      </div>

      <div class="group relative grid md:grid-cols-2 gap-8 md:gap-16 items-center">
        <div class="order-2 md:order-1 bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
          <div class="flex items-center mb-4">
            <span class="text-4xl font-black text-[#d4a574] mr-4">02</span>
            <h3 class="text-2xl text-gray-800 font-bold uppercase tracking-wider">Processing</h3>
          </div>
          <ul class="space-y-4 text-gray-600">
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Hygienic Cleaning:</strong> Advanced machinery is used to eliminate all impurities, dust, and foreign particles.</li>
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Temperature Control:</strong> We maintain strict temperature levels to protect natural oils and vibrant colors.</li>
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Modern Technology:</strong> Our state-of-the-art facility balances high efficiency with the highest hygiene standards.</li>
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Quality Inspection:</strong> Every batch undergoes multi-stage testing to ensure 100% compliance with food safety.</li>
          </ul>
        </div>

        <div class="relative order-1 md:order-2">
          <div class="relative z-10 overflow-hidden rounded-2xl shadow-2xl transform transition duration-500 group-hover:scale-105">
            <img src="assest/2.png" alt="Advanced Processing" class="w-full h-[350px] object-cover" />
          </div>
          <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#d4a574]/10 rounded-full -z-0"></div>
        </div>
      </div>

      <div class="group relative grid md:grid-cols-2 gap-8 md:gap-16 items-center">
        <div class="relative order-1 md:order-1">
          <div class="relative z-10 overflow-hidden rounded-2xl shadow-2xl transform transition duration-500 group-hover:scale-105">
            <img src="assest/3.png" alt="Secure Packaging" class="w-full h-[350px] object-cover" />
          </div>
          <div class="absolute -top-4 -left-4 w-24 h-24 bg-[#d4a574]/10 rounded-full -z-0"></div>
        </div>

        <div class="order-2 md:order-2 bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
          <div class="flex items-center mb-4">
            <span class="text-4xl font-black text-[#d4a574] mr-4">03</span>
            <h3 class="text-2xl text-gray-800 font-bold uppercase tracking-wider">Packaging</h3>
          </div>
          <ul class="space-y-4 text-gray-600">
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Vacuum Sealing:</strong> Advanced sealing techniques protect products from air, moisture, and contamination.</li>
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Food-Grade Material:</strong> We use only certified, toxin-free materials to ensure the safety of our consumers.</li>
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Aroma Preservation:</strong> Our specialized packaging locks in natural fragrance and freshness for extended periods.</li>
            <li class="flex items-start"><span class="text-[#d4a574] mr-2">✔</span> <strong>Eco-Friendly Approach:</strong> We are committed to sustainability by using recyclable and environmentally safe materials.</li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>
    <!-- Testimonials -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    /* Pagination dots styling */
    .testimonialSwiper .swiper-pagination {
        position: relative;
        margin-top: 30px;
    }
    .testimonialSwiper .swiper-pagination-bullet-active {
        background: var(--color-primary) !important;
        width: 12px;
        border-radius: 5px;
    }

    /* Cards ki height barabar karne ke liye */
    .testimonialSwiper .swiper-slide {
        height: auto !important; /* Slider slides stretch correctly */
        display: flex;
    }
    .testimonialSwiper .testimonial-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 100%;
    }

    /* Customizing the dots color to match your theme */
    .swiper-pagination-bullet-active {
        background: var(--color-primary) !important;
    }
    .swiper-slide {
        height: initial !important; /* Fixes layout issues in some browsers */
    }
</style>

<section class="py-10 px-4 sm:px-6 lg:px-8 relative bg-gray-50">
    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-16">
            <p class="text-lg mb-3 tracking-wider" style="color: var(--color-secondary);">CLIENT FEEDBACK</p>
            <h2 class="text-5xl font-bold mb-4" style="color: var(--color-primary);">What Our Partners Say</h2>
        </div>

        <?php
        // Fetching testimonials from DB
        $testRes = mysqli_query($conn, "SELECT * FROM testimonials ORDER BY id DESC");
        ?>

        <div class="swiper testimonialSwiper">
            <div class="swiper-wrapper">

                <?php while($t = mysqli_fetch_assoc($testRes)){ ?>
                    <div class="swiper-slide"> 
                        <div class="testimonial-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100 mx-2">
                            
                            <div>
                                <div class="flex items-center mb-4">
                                    <div class="flex text-[#d4a574]">
                                        <?= str_repeat('★', $t['rating']); ?>
                                    </div>
                                </div>

                                <p class="text-gray-600 mb-6 italic leading-relaxed">
                                    "<?= htmlspecialchars($t['message']) ?>"
                                </p>
                            </div>

                            <div>
                                <h4 class="font-bold" style="color: var(--color-primary);">
                                    <?= htmlspecialchars($t['name']) ?>
                                </h4>
                                <p class="text-sm text-gray-500">
                                    <?= htmlspecialchars($t['designation']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".testimonialSwiper", {
    slidesPerView: 1,
    spaceBetween: 30, // Gap between cards
    loop: true,
    grabCursor: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      640: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
    },
  });
</script>






    <!-- Contact Section -->
    <section id="contact" class="py-10 px-4 sm:px-6 lg:px-8 relative">
        <span class="section-number">05</span>
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <p class="text-lg mb-3 tracking-wider" style="color: var(--color-secondary);">GET IN TOUCH</p>
                <h2 class="text-5xl font-bold mb-4" style="color: var(--color-primary);">Contact Us</h2>
                <p class="text-gray-600 text-lg">Ready to start your export journey? Reach out to our team today.</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-2xl shadow-xl">
                    <h3 class="text-2xl font-bold mb-6" style="color: var(--color-primary);">Send us a Message</h3>
                    <form   method="POST" class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-700">Full Name *</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#d4a574]" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-700">Email Address *</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#d4a574]" placeholder="john@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-700">Phone Number</label>
                            <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#d4a574]" placeholder="+1 234 567 8900">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-700">Product Interest</label>
                            <select name="product_interest" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#d4a574]">
                                <option>Select Product Category</option>
                                <option>Spices</option>
                                <option>Herbs</option>
                                <option>Fresh Fruits</option>
                                <option>Indian Rice</option>
                                <option>Dry Fruits</option>
                                <option>Tea</option>
                                <option>All Products</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-700">Message *</label>
                            <textarea name="message" required rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#d4a574]" placeholder="Tell us about your requirements..."></textarea>
                        </div>
                        <button type="submit" class="btn-premium btn-gold  md:block px-6 py-4 rounded-full text-[16px] uppercase font-bold tracking-widest w-full rounded-lg text-sm">Send Message</button>
                    </form>
                     </div>
                <!-- Contact Info -->
                <div class="space-y-8">
    <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-50">
        <div class="flex items-start space-x-5 mb-8 group">
            <div class="w-12 h-12 rounded-xl flex-shrink-0 flex items-center justify-center text-xl shadow-lg transition-transform group-hover:scale-110" 
                 style="background: linear-gradient(135deg, var(--color-secondary), var(--color-accent)); color: white;">
                <i class="fas fa-location-dot"></i>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-1" style="color: var(--color-primary);">Office Address</h4>
                <p class="text-gray-600 leading-relaxed">Saket Nagar, Bhopal, Madhya Pradesh, 462024 (INDIA)</p>
            </div>
        </div>
        
        <div class="flex items-start space-x-5 mb-8 group">
            <div class="w-12 h-12 rounded-xl flex-shrink-0 flex items-center justify-center text-xl shadow-lg transition-transform group-hover:scale-110" 
                 style="background: linear-gradient(135deg, var(--color-secondary), var(--color-accent)); color: white;">
                <i class="fas fa-envelope-open-text"></i>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-1" style="color: var(--color-primary);">Email Us</h4>
                <p class="text-gray-600">rp750947@gmail.com</p>
                <p class="text-gray-600">rohitkiaaan@gmail.com</p>
            </div>
        </div>
        
        <div class="flex items-start space-x-5 group">
            <div class="w-12 h-12 rounded-xl flex-shrink-0 flex items-center justify-center text-xl shadow-lg transition-transform group-hover:scale-110" 
                 style="background: linear-gradient(135deg, var(--color-secondary), var(--color-accent)); color: white;">
                <i class="fas fa-phone-volume"></i>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-1" style="color: var(--color-primary);">Call Us</h4>
                <p class="text-gray-600">+91 6265 861 847</p>
                <p class="text-[11px] uppercase tracking-wider text-[#d4a574] font-bold mt-1 italic">Mon-Sat: 9:00 AM - 6:00 PM IST</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-50">
        <h4 class="font-bold text-lg mb-6 flex items-center" style="color: var(--color-primary);">
            <i class="fas fa-clock mr-3 text-[#d4a574]"></i> Business Hours
        </h4>
        <div class="space-y-3 text-gray-600">
            <div class="flex justify-between items-center pb-2 border-b border-gray-50">
                <span class="font-medium">Monday - Friday</span>
                <span class="font-bold text-gray-800">9:00 AM - 6:00 PM</span>
            </div>
            <div class="flex justify-between items-center pb-2 border-b border-gray-50">
                <span class="font-medium">Saturday</span>
                <span class="font-bold text-gray-800">9:00 AM - 2:00 PM</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-medium">Sunday</span>
                <span class="text-red-500 font-bold uppercase tracking-widest text-sm underline underline-offset-4">Closed</span>
            </div>
        </div>
    </div>
    
  
</div>
            </div>
        </div>
    </section>
    <?php if($showModal): ?>
<div id="contactSuccessModal" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/80 backdrop-blur-md px-4">
    <div class="bg-white w-full max-w-md rounded-3xl p-10 text-center shadow-2xl animate-in fade-in zoom-in duration-300">
        <div class="w-24 h-24 bg-green-100 text-[#d4a574] rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
            <i class="fa-solid fa-check text-5xl animate-bounce"></i>
        </div>
        <h2 class="text-3xl font-black text-gray-900 mb-3">Sent Successfully!</h2>
        <p class="text-gray-600 mb-8 leading-relaxed">Thank you <span class="text-[#d4a574] font-bold"><?= htmlspecialchars($userName) ?></span>. We have received your inquiry about <span class="font-semibold text-black"><?= htmlspecialchars($product) ?></span>. Our experts will contact you shortly.</p>
        <button onclick="closeModal()" class="w-full bg-zinc-900 text-white py-4 rounded-xl font-bold hover:bg-[#d4a574] transition-colors shadow-lg">
            Awesome!
        </button>
    </div>
</div>
<script>
    function closeModal() {
        document.getElementById('contactSuccessModal').classList.add('hidden');
        window.location.href = 'home.php'; // Clear POST data
    }
</script>
<?php endif; ?>
<?php include 'footer.php'; ?>

