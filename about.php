<?php include 'header.php';?>
<style>
    /* Custom Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }

    .reveal {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s ease-out;
    }

    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    .floating {
        animation: float 6s ease-in-out infinite;
    }

    /* World Map Container */
/* World Map Container */


/* Pins */
.map-pin {
    position: absolute;
    width: 9px;
    height: 9px;
    background: red;
    border: 2px solid #fff;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 0 rgba(255, 0, 0, 0.4);
    animation: pulse 2s infinite;
}

/* Mobile bigger pins */
@media(max-width:768px){
    .map-pin{
        width:14px;
        height:14px;
    }
}

/* Hover */
.map-pin{
  width:8px;
  height:8px;
  background:red;
  border-radius:50%;
  position:absolute;
}

.map-pin::before{
  content:'';
  position:absolute;
  inset:-6px;
  border:2px solid red;
  border-radius:50%;
  animation:pulse 2s infinite;
}

@keyframes pulse{
  0%{transform:scale(.4);opacity:1}
  100%{transform:scale(1.6);opacity:0}
}


/* Tooltip */
.map-tooltip {
    position: absolute;
    bottom: 130%;
    left: 50%;
    transform: translateX(-50%);
    background: #1a472a;
    color: white;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
    z-index: 100;
}

.map-tooltip::after {
    content: '';
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    border: 6px solid transparent;
    border-top-color: #1a472a;
}

.map-pin:hover .map-tooltip {
    opacity: 1;
}

/* Pulse */
@keyframes pulse{
    0%{box-shadow:0 0 0 0 rgba(255,0,0,.4);}
    70%{box-shadow:0 0 0 10px rgba(255,0,0,0);}
    100%{box-shadow:0 0 0 0 rgba(255,0,0,0);}
}

</style>
<!-- Hero Section -->
<section class="relative pt-64 pb-40 overflow-hidden bg-cover bg-center 
min-h-[550px]"
style="background-image: url('assest/sultan.png');">
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="absolute top-0 right-0 w-1/3 h-full bg-[#1a472a]/20 skew-x-12 transform translate-x-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center lg:text-left">
            <h1 class="text-5xl md:text-7xl font-serif text-white mb-6 reveal active">
                About <span class="text-[#d4a574]">Us</span>
            </h1>
            <p class="text-gray-200 text-lg md:text-xl max-w-2xl reveal active" style="animation-delay: 0.2s;">
                Your trusted partner for premium agricultural exports. Quality, integrity, and excellence in every shipment across the globe.
            </p>
            <div class="mt-8 flex items-center justify-center lg:justify-start space-x-2 text-sm text-[#d4a574] uppercase tracking-widest font-bold reveal active" style="animation-delay: 0.4s;">
                <a href="home.php" class="hover:text-white transition">Home</a>
                <span>/</span>
                <span class="text-gray-300">About Us</span>
            </div>
        </div>
    </div>
</section>
<!-- Main About Section -->
<section class="py-10 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-10 items-center">
            <!-- Left Content -->
            <div class="reveal">
                <p class="text-sm font-bold mb-3 tracking-[0.2em] text-[#d4a574] uppercase">Who We Are</p>
              <h2 class="text-4xl md:text-5xl font-bold mb-4 text-[#1a472a]">
About <span class="text-[#d4a574]">Rudransh Global</span>
</h2>

               <p class="text-gray-600 text-md leading-relaxed mb-4">
Rudransh Global is a trusted Indian agro export company, connecting premium Indian agricultural products with global markets. We specialize in sourcing, processing, packaging, and exporting high-quality spices, rice, fresh fruits, and dry fruits to international B2B buyers with a strong focus on quality and consistency.
</p>

<p class="text-gray-600 text-md leading-relaxed mb-4">
Based in Saket Nagar, Bhopal, Madhya Pradesh (462024, India), we work closely with a wide network of farmers and suppliers across the country. Our commitment to ethical trade practices, sustainable sourcing, and strict quality control standards has enabled us to build long-term relationships with clients across multiple international markets.
</p>

                
                <!-- Mission Box -->
                <div class="bg-gradient-to-br from-[#faf8f5] to-white rounded-2xl p-4 shadow-lg border-l-4 border-[#d4a574] mb-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-[#d4a574]/10 flex items-center justify-center shrink-0">
                            <i class="fas fa-bullseye text-[#d4a574] text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-3 text-[#1a472a]">Our Mission</h3>
                            <p class="text-gray-600 leading-relaxed">
                                To deliver world-class agricultural products while championing sustainability, empowering local farming communities, and building lasting partnerships based on trust and excellence.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Vision Box -->
                <div class="bg-gradient-to-br from-[#faf8f5] to-white rounded-2xl p-8 shadow-lg border-l-4 border-[#1a472a]">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-[#1a472a]/10 flex items-center justify-center shrink-0">
                            <i class="fas fa-eye text-[#1a472a] text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-3 text-[#1a472a]">Our Vision</h3>
                            <p class="text-gray-600 leading-relaxed">
                                To be recognized globally as the most reliable and innovative agricultural export partner, setting industry standards for quality, compliance, and customer satisfaction.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Images -->
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


        <!-- World Map with Pins -->
  <section class="py-10 bg-[#fdfcfb] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10 reveal">
            <p class="text-xs font-semibold mb-3 tracking-[0.3em] text-[#d4a574] uppercase">Global Presence</p>
            <h2 class="text-4xl md:text-5xl font-semibold bold mb-4 text-[#1a472a] font-serif">
                Serving <span class="text-[#d4a574] border-b-2 border-[#d4a574]">International</span> Markets
            </h2>
            <p class="text-gray-600  max-w-2xl mx-auto mt-6">
                We proudly supply premium Indian agricultural products to global B2B buyers. Our logistical network ensures timely delivery to over 45 countries.
            </p>
        </div>

     <div class="relative w-full max-w-7xl mx-auto reveal mb-10">
            <img src="assest/map.png" alt="World Map" class="w-full h-auto object-cover rounded-2xl shadow-2xl border border-gray-100">
            
            <?php
            // Accurate Coordinates adjusted for standard Mercator Projection
            $locations = [
                // --- CIS COUNTRIES ---
                ['top' => '23%', 'left' => '65%', 'name' => 'Kazakhstan'],
                ['top' => '27%', 'left' => '63%', 'name' => 'Uzbekistan'],
                ['top' => '28%', 'left' => '65%', 'name' => 'Tajikistan'],
                ['top' => '28%', 'left' => '59%', 'name' => 'Azerbaijan'],

                // --- ASIA PACIFIC (Corrected Locations) ---
                ['top' => '44%', 'left' => '78%', 'name' => 'Vietnam'],
                ['top' => '56%', 'left' => '80%', 'name' => 'Indonesia'], // Moved to islands
                ['top' => '50%', 'left' => '77%', 'name' => 'Malaysia'],  // Moved to peninsula
                ['top' => '51%', 'left' => '82%', 'name' => 'Singapore'], // Just below Malaysia

                // --- MIDDLE EAST ---
                ['top' => '36%', 'left' => '62%', 'name' => 'UAE'],
                ['top' => '38%', 'left' => '59%', 'name' => 'Saudi Arabia'],
                ['top' => '34%', 'left' => '61%', 'name' => 'Kuwait'],
                ['top' => '35%', 'left' => '62%', 'name' => 'Qatar'],
                ['top' => '37%', 'left' => '63%', 'name' => 'Oman'],
                ['top' => '32%', 'left' => '59%', 'name' => 'Iraq'],
                ['top' => '32%', 'left' => '62%', 'name' => 'Iran'],
                ['top' => '33%', 'left' => '57%', 'name' => 'Jordan'],
                ['top' => '30%', 'left' => '56%', 'name' => 'Turkey'],

                // --- AFRICA ---
                ['top' => '35%', 'left' => '55%', 'name' => 'Egypt'],
                ['top' => '32%', 'left' => '46%', 'name' => 'Morocco'],

                // --- EUROPE ---
                ['top' => '29%', 'left' => '47%', 'name' => 'Spain'],
                ['top' => '28%', 'left' => '51%', 'name' => 'Italy'],
                ['top' => '23%', 'left' => '53%', 'name' => 'Poland'],
                ['top' => '24%', 'left' => '50%', 'name' => 'Germany'],
                ['top' => '21%', 'left' => '47%', 'name' => 'UK'],

                // --- NORTH AMERICA ---
                ['top' => '18%', 'left' => '18%', 'name' => 'Canada'],
                ['top' => '25%', 'left' => '18%', 'name' => 'USA'],
            ];

            foreach($locations as $loc) {
                echo '
                <div class="absolute group" style="top: '.$loc['top'].'; left: '.$loc['left'].';">
                    <div class="relative flex items-center justify-center w-3 h-3 md:w-3 md:h-3">
                        <span class="absolute inline-flex h-full w-full rounded-full bg-[#d4a574] opacity-75 animate-ping"></span>
                        
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 md:h-2 md:w-2 bg-red-500 border border-white shadow-sm z-10 group-hover:bg-[#1a472a] transition-colors duration-300"></span>
                        
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 hidden group-hover:block z-20">
                            <div class="bg-[#d4a574] text-white text-[10px] md:text-xs font-bold px-2 py-1 rounded shadow-lg whitespace-nowrap relative">
                                '.$loc['name'].'
                                <div class="absolute top-full left-1/2 -translate-x-1/2 border-4 border-transparent border-t-[#d4a574]"></div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</section>
<!-- Core Values Section -->
<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-10 reveal">
            <p class="text-sm font-bold mb-3 tracking-[0.2em] text-[#d4a574] uppercase">Our Foundation</p>
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-[#1a472a]">
                Core Values That <span class="text-[#d4a574]">Drive Us</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Our success is built on unwavering principles that guide every decision we make.
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="group bg-gradient-to-br from-[#faf8f5] to-white p-10 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 reveal">
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                    <i class="fas fa-leaf text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-[#1a472a] text-center">Sustainability First</h3>
                <p class="text-gray-600 leading-relaxed text-center">
                    We champion sustainable farming and ethical sourcing practices, ensuring prosperity for both farmers and the environment through responsible business operations.
                </p>
            </div>

            <div class="group bg-gradient-to-br from-[#faf8f5] to-white p-10 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 reveal" style="transition-delay: 0.1s;">
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                    <i class="fas fa-award text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-[#1a472a] text-center">Uncompromising Quality</h3>
                <p class="text-gray-600 leading-relaxed text-center">
                    Every shipment undergoes rigorous testing and complies with international standards (ISO 22000, HACCP, HALAL) to ensure you receive only premium products.
                </p>
            </div>

            <div class="group bg-gradient-to-br from-[#faf8f5] to-white p-10 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 reveal" style="transition-delay: 0.2s;">
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                    <i class="fas fa-handshake text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-[#1a472a] text-center">Global Integrity</h3>
                <p class="text-gray-600 leading-relaxed text-center">
                    Transparent pricing, on-time delivery, and honest communication have made us a trusted partner across 45+ countries worldwide.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose Us -->
<section class="py-10 bg-gradient-to-br from-[#faf8f5] to-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10 reveal">
            <p class="text-sm font-bold mb-3 tracking-[0.2em] text-[#d4a574] uppercase">Competitive Advantages</p>
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-[#1a472a]">
                Why Partner with <span class="text-[#d4a574]">Rudransh Global?</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all reveal">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-lg bg-[#d4a574]/10 flex items-center justify-center shrink-0">
                        <i class="fas fa-industry text-[#d4a574] text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-[#1a472a] mb-2">State-of-the-Art Facilities</h3>
                        <p class="text-gray-600 text-sm">Modern processing units with advanced cold chain infrastructure ensuring product integrity.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all reveal" style="transition-delay: 0.1s;">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-lg bg-[#d4a574]/10 flex items-center justify-center shrink-0">
                        <i class="fas fa-certificate text-[#d4a574] text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-[#1a472a] mb-2">Complete Certifications</h3>
                        <p class="text-gray-600 text-sm">HALAL, ISO 22000, HACCP, FSSAI, and APEDA certified operations.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all reveal" style="transition-delay: 0.2s;">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-lg bg-[#d4a574]/10 flex items-center justify-center shrink-0">
                        <i class="fas fa-users text-[#d4a574] text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-[#1a472a] mb-2">Direct Farmer Network</h3>
                        <p class="text-gray-600 text-sm">Partnership with 300+ farmers ensuring authentic sourcing and fair trade practices.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all reveal" style="transition-delay: 0.3s;">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-lg bg-[#d4a574]/10 flex items-center justify-center shrink-0">
                        <i class="fas fa-shipping-fast text-[#d4a574] text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-[#1a472a] mb-2">Global Logistics</h3>
                        <p class="text-gray-600 text-sm">Seamless export documentation and reliable shipping to 45+ countries.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all reveal" style="transition-delay: 0.4s;">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-lg bg-[#d4a574]/10 flex items-center justify-center shrink-0">
                        <i class="fas fa-flask text-[#d4a574] text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-[#1a472a] mb-2">In-House Quality Lab</h3>
                        <p class="text-gray-600 text-sm">Rigorous testing protocols ensuring every batch meets international standards.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all reveal" style="transition-delay: 0.5s;">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-lg bg-[#d4a574]/10 flex items-center justify-center shrink-0">
                        <i class="fas fa-headset text-[#d4a574] text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-[#1a472a] mb-2">24/7 Customer Support</h3>
                        <p class="text-gray-600 text-sm">Dedicated support team available round the clock for all your queries.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Infrastructure Gallery -->
<section class="py-10 px-6 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto text-center mb-10 reveal">
        <p class="text-sm font-bold mb-3 tracking-[0.2em] text-[#d4a574] uppercase">Infrastructure</p>
        <h2 class="text-4xl md:text-5xl font-bold text-[#1a472a] mb-4">
            World-Class <span class="text-[#d4a574]">Facilities</span>
        </h2>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">
            Our modern facilities in Ankleshwar, Gujarat ensure quality at every step of the supply chain.
        </p>
    </div>
    
    <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6 max-w-7xl mx-auto">
        <div class="group relative overflow-hidden rounded-2xl shadow-xl reveal">
            <img src="assest/process.webp" class="h-80 w-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Processing Unit">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                <div class="absolute bottom-0 p-6 text-white">
                    <div class="w-12 h-12 rounded-full bg-[#d4a574] flex items-center justify-center mb-3">
                        <i class="fas fa-industry text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Processing Unit</h3>
                    <p class="text-sm text-white/80">Advanced machinery & hygiene standards</p>
                </div>
            </div>
        </div>

        <div class="group relative overflow-hidden rounded-2xl shadow-xl reveal" style="transition-delay: 0.1s;">
            <img src="assest/cold.jpg" class="h-80 w-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Cold Storage">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                <div class="absolute bottom-0 p-6 text-white">
                    <div class="w-12 h-12 rounded-full bg-[#d4a574] flex items-center justify-center mb-3">
                        <i class="fas fa-snowflake text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Cold Storage</h3>
                    <p class="text-sm text-white/80">Temperature-controlled warehouses</p>
                </div>
            </div>
        </div>

        <div class="group relative overflow-hidden rounded-2xl shadow-xl reveal" style="transition-delay: 0.2s;">
            <img src="assest/lab.png" class="h-80 w-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Quality Lab">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                <div class="absolute bottom-0 p-6 text-white">
                    <div class="w-12 h-12 rounded-full bg-[#d4a574] flex items-center justify-center mb-3">
                        <i class="fas fa-flask text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Quality Lab</h3>
                    <p class="text-sm text-white/80">In-house testing & certification</p>
                </div>
            </div>
        </div>

        <div class="group relative overflow-hidden rounded-2xl shadow-xl reveal" style="transition-delay: 0.3s;">
            <img src="assest/hub.avif" class="h-80 w-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Logistics Hub">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                <div class="absolute bottom-0 p-6 text-white">
                    <div class="w-12 h-12 rounded-full bg-[#d4a574] flex items-center justify-center mb-3">
                        <i class="fas fa-truck text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Logistics Hub</h3>
                    <p class="text-sm text-white/80">Seamless global shipping network</p>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Scroll Reveal Animation
    function reveal() {
        const reveals = document.querySelectorAll(".reveal");
        for (let i = 0; i < reveals.length; i++) {
            const windowHeight = window.innerHeight;
            const elementTop = reveals[i].getBoundingClientRect().top;
            const elementVisible = 100;
            
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            }
        }
    }
    
    window.addEventListener("scroll", reveal);
    reveal(); // Trigger on load
</script>
<?php include 'footer.php'?>