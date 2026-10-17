<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rudransh Global - Premium Export & Import Company specializing in Indian spices, fresh fruits, rice, and frozen foods. Quality control, private label packaging, and global logistics support.">
    <meta name="keywords" content="export company, import company, Indian spices export, fresh fruits export, Indian rice, frozen foods export, private label packaging, quality control, international trade, global logistics">
    <meta name="author" content="Rudransh Global">
    <meta property="og:title" content="Rudransh Global - Global Export & Import Excellence">
    <meta property="og:description" content="Your trusted partner for premium Indian products worldwide. Spices, fruits, rice, and frozen foods with unmatched quality.">
    <meta property="og:type" content="website">
    <title>Rudransh Global - Premium Export & Import Company | Global Trade Solutions</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --color-primary: #1a472a;
            --color-secondary: #d4a574;
            --color-accent: #8b4513;
            --color-bg: #faf8f5;
            --color-text: #2c3e2c;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Instrument Sans', sans-serif;
            color: var(--color-text);
            background: var(--color-bg);
            overflow-x: hidden;
            .group:hover .group-hover\:block {
            display: block !important;
            animation: fadeInUp 0.3s ease-out;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }
        
        .animate-fade-in {
            animation: fadeIn 1s ease-in forwards;
            opacity: 0;
        }
        
        .animate-slide-up {
            animation: slideUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        
        @keyframes fadeIn {
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .grain-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
            opacity: 0.03;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='3.5' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #1a472a 0%, #2d5a3d 50%, #1a472a 100%);
            position: relative;
        }
        
        .hero-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(212, 165, 116, 0.15), transparent 60%);
        }
        
        .product-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }
        
        .product-card:hover::before {
            left: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .section-number {
            font-family: 'Playfair Display', serif;
            font-size: 8rem;
            font-weight: 700;
            color: rgba(212, 165, 116, 0.15);
            position: absolute;
            top: -2rem;
            left: 0;
            line-height: 1;
            pointer-events: none;
        }
        .btn-secondary {
            background: transparent;
            color: white;
            padding: 1rem 2.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            border: 2px solid white;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: white;
            color: var(--color-primary);
        }
        
        .stat-card {
            background: white;
            border-left: 4px solid var(--color-secondary);
        }
        
        .service-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--color-secondary), var(--color-accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin-bottom: 1.5rem;
        }
        
        .timeline-line {
            position: absolute;
            top: 0;
            left: 50%;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, var(--color-secondary), transparent);
        }
        
        .timeline-dot {
            width: 20px;
            height: 20px;
            background: var(--color-secondary);
            border-radius: 50%;
            border: 4px solid var(--color-bg);
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        
        @media (max-width: 768px) {
            .section-number {
                font-size: 4rem;
            }
            
            .timeline-line {
                left: 20px;
            }
            
            .timeline-dot {
                left: 20px;
            }
        }
        @media (max-width: 768px) {
  #navbar {
    height: 64px;
  }

  #navbar img {
    height: 48px;
  }
}

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Button Liquid Slide Effect */
        .btn-premium {
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .btn-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: -1;
        }

        .btn-premium:hover::before {
            left: 0;
        }

        /* Primary Button (Gold to Dark Green) */
        .btn-gold {
            background: #d4a574;
            color: #1a472a;
            border: 2px solid #d4a574;
        }
        .btn-gold::before { background: #1a472a; }
        .btn-gold:hover { color: #d4a574 !important; border-color: #1a472a; }

        /* Outline Button (Transparent to Gold) */
        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        .btn-outline::before { background: #d4a574; }
        .btn-outline:hover { color: #1a472a !important; border-color: #d4a574; }

        /* Mobile Menu Styles */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 300px;
            height: 100vh;
            background: linear-gradient(180deg, #000 0%, #0d2415 100%);
            transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            overflow-y: auto;
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.5);
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.7);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .mobile-submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .mobile-submenu.active {
            max-height: 500px;
        }

        /* Mobile Logo Size */
        @media (max-width: 768px) {
            #navbar .flex img {
                height: 3.5rem !important; /* 56px - larger logo for mobile */
            }
            
            #nav-brand {
                font-size: 1.25rem !important; /* Slightly smaller text on mobile */
            }
        }
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
    /* Invisible bridge to keep dropdown open during gap transition */
.group:hover > ul::before {
    content: "";
    position: absolute;
    top: -30px; /* Jitna aapka gap hai uske hisab se adjust karein */
    left: 0;
    width: 100%;
    height: 30px;
    background: transparent;
}

/* Side menu (Sub-category) ke liye bridge */
.group\/spices:hover > ul::before,
.group\/fruits:hover > ul::before {
    content: "";
    position: absolute;
    top: 0;
    left: -20px; /* Side gap ko cover karne ke liye */
    width: 20px;
    height: 100%;
    background: transparent;
}
</style>
</head>
<body class="overflow-x-hidden">
    
    <!-- Top Bar (Hidden on Mobile) -->
    <div class="hidden md:block absolute top-0 w-full z-50 bg-black/40 text-white border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex justify-between items-center text-sm">
                <div class="flex items-center space-x-8">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt text-xs text-[#d4a574]"></i>
                        <span>Saket Nagar, Bhopal, Madhya Pradesh, 462024 (INDIA)</span>
                    </div>
                    <div class="hidden lg:flex items-center space-x-2">
                        <i class="far fa-clock text-xs text-[#d4a574]"></i>
                        <span>Mon - Fri : 09:00 - 17:00</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-phone-alt text-[#d4a574] mr-2"></i>
                        <span>+91 6265 861 847</span>
                    </div>
                    <div class="flex items-center space-x-4 border-r border-white/20 pr-6">
                        <a href="#" class="hover:text-[#d4a574] transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-[#d4a574] transition"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-[#d4a574] transition"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="hover:text-[#d4a574] transition"><i class="fab fa-twitter"></i></a>
                    </div>
                    <!--<div class="flex items-center space-x-2 cursor-pointer hover:text-green-500 transition">-->
                    <!--    <i class="fas fa-user text-xs text-[#d4a574]"></i>-->
                    <!--    <span><a href="./admin" class="hover:text-[#d4a574] transition">Login</a></span>-->
                        
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>

<!-- Main Header -->
<header id="navbar"
  class="fixed top-0 md:top-11 w-full z-50
         h-[72px] md:h-[80px]
         bg-black/80 md:bg-transparent
         transition-all duration-500 ease-in-out">

  <nav class="max-w-7xl mx-auto px-4 h-full">
    <div class="flex justify-between items-center h-full">

      <!-- Logo (Independent Size) -->
      <a href="index.php" class="flex items-center h-full">
        <img src="assest/rohit-logo.png"
             alt="Rohit"
             class="h-14 md:h-16 w-auto object-contain" />
      </a>

      <!-- Desktop Menu -->
<ul class="hidden lg:flex items-center space-x-8">
  <li><a href="home.php" class="nav-link text-white text-sm tracking-widest hover:text-[#d4a574] transition uppercase font-semibold">Home</a></li>

  <li class="relative group">
    <a href="product.php" class="nav-link text-white text-sm tracking-widest hover:text-[#d4a574] transition uppercase flex items-center font-semibold">
      Our Products
      <i class="fas fa-chevron-down ml-2 text-[10px]"></i>
    </a>

    <ul class="absolute left-0 mt-4 top-full hidden group-hover:block bg-black/95 w-64 border-t-2 border-[#d4a574] py-2 shadow-2xl">
      
      <li class="relative group/spices px-6 py-3 border-b border-white/10 last:border-0">
        <div class="flex justify-between items-center cursor-pointer">
            <a href="indian-spices.php" class="text-white text-[12px] font-bold tracking-wider hover:text-[#d4a574] transition uppercase">INDIAN SPICES</a>
            <!--<i class="fas fa-chevron-right text-white/50 text-[10px]"></i>-->
        </div>
        
        <!--<ul class="absolute left-full top-0 hidden group-hover/spices:block bg-black/95 w-56 border-t-2 border-[#d4a574] py-2 shadow-2xl">-->
        <!--  <li class="px-6 py-2 border-b border-white/5 last:border-0"><a href="indian-spices.php" class="text-white/80 text-[11px] hover:text-[#d4a574]">Cardamom</a></li>-->
        <!--  <li class="px-6 py-2 border-b border-white/5 last:border-0"><a href="indian-spices.php" class="text-white/80 text-[11px] hover:text-[#d4a574]">Black Pepper</a></li>-->
        <!--  <li class="px-6 py-2 border-b border-white/5 last:border-0"><a href="indian-spices.php" class="text-white/80 text-[11px] hover:text-[#d4a574]">Turmeric</a></li>-->
        <!--  <li class="px-6 py-2 last:border-0"><a href="indian-spices.php" class="text-white/80 text-[11px] hover:text-[#d4a574]">Cloves</a></li>-->
        <!--</ul>-->
      </li>
      
      <li class="px-6 py-3 border-b border-white/10 last:border-0">
        <a href="indian-herbs.php" class="text-white text-[12px] font-bold tracking-wider hover:text-[#d4a574] transition uppercase">INDIAN HERBS</a>
      </li>

      <li class="relative group/fruits px-6 py-3 border-b border-white/10 last:border-0">
        <div class="flex justify-between items-center cursor-pointer">
            <a href="fresh-fruit.php" class="text-white text-[12px] font-bold tracking-wider hover:text-[#d4a574] transition uppercase">FRESH FRUITS</a>
            <!--<i class="fas fa-chevron-right text-white/50 text-[10px]"></i>-->
        </div>

        <!--<ul class="absolute left-full top-0 hidden group-hover/fruits:block bg-black/95 w-56 border-t-2 border-[#d4a574] py-2 shadow-2xl">-->
        <!--  <li class="px-6 py-2 last:border-0"><a href="#" class="text-white/80 text-[11px] hover:text-[#d4a574]">Banana</a></li>-->
        <!--</ul>-->
      </li>

      <li class="px-6 py-3 border-b border-white/10 last:border-0">
        <a href="indian-rice.php" class="text-white text-[12px] font-bold tracking-wider hover:text-[#d4a574] transition uppercase">INDIAN RICE</a>
      </li>
       <li class="px-6 py-3 border-b border-white/10 last:border-0">
        <a href="dry-fruits.php" class="text-white text-[12px] font-bold tracking-wider hover:text-[#d4a574] transition uppercase">DRY FRUITS</a>
      </li>
      <li class="px-6 py-3 border-b border-white/10 last:border-0">
        <a href="tea.php" class="text-white text-[12px] font-bold tracking-wider hover:text-[#d4a574] transition uppercase">Premium Tea</a>
      </li>
      
    </ul>
  </li>

  <li><a href="about.php" class="nav-link text-white text-sm tracking-widest hover:text-[#d4a574] transition uppercase font-semibold">About</a></li>
  <li><a href="services.php" class="nav-link text-white text-sm tracking-widest hover:text-[#d4a574] transition uppercase font-semibold">Services</a></li>
  <li><a href="contact.php" class="nav-link text-white text-sm tracking-widest hover:text-[#d4a574] transition uppercase font-semibold">Contact</a></li>
</ul>

      <!-- Right Buttons -->
      <div class="flex items-center space-x-4">
        <a href="contact.php"
           class="btn-premium btn-gold hidden md:block px-6 py-2 rounded-full text-[10px] uppercase font-bold tracking-widest">
          Get a Quote
        </a>

        <!-- Mobile Menu Button -->
        <button class="lg:hidden text-white text-2xl" id="mobile-menu-btn">
          <i class="fas fa-bars"></i>
        </button>
      </div>

    </div>
  </nav>
</header>


    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobile-overlay"></div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobile-menu">
        <div class="p-2">
            <!-- Close Button -->
           <div class="flex items-center justify-between mb-4 pb-4  mt-4 border-b border-white/20">
    
    <!-- Mobile Logo -->
<div class="flex justify-center items-center">
    <img
      src="assest/rohit-logo.png"
      alt="Rohit"
      class="h-16 w-auto mx-auto"
    >
</div>


    <!-- Close Button -->
    <button class="text-white text-2xl" id="close-menu-btn">
        <i class="fas fa-times"></i>
    </button>

</div>

            <!-- Mobile Navigation -->
            <nav>
                <ul class="space-y-1">
                    <li>
                        <a href="home.php" class="block py-3 px-4 text-white hover:bg-white/10 hover:text-[#d4a574] transition rounded uppercase text-sm tracking-wider">
                            Home
                        </a>
                    </li>
                    
                    <li>
                        <a href="
product.php"
     class="flex-1 py-3 px-4 text-white hover:text-[#d4a574] transition rounded uppercase text-sm tracking-wider">
     Our Products
  </a>
                        
  <button id="products-toggle" class="px-4 text-white hover:text-[#d4a574]">
      <i class="fas fa-chevron-down text-xs transition-transform" id="products-icon"></i>
  </button>
                        <ul class="mobile-submenu pl-4" id="products-submenu">
                            <li>
                                <a href="indian-spices.php" class="block py-2 px-4 text-white/90 hover:text-[#d4a574] transition text-xs">INDIAN SPICES</a>
                             
                               
                            </li>
                             <li>
                    
                                    <a href="indian-herbs.php" class="block py-2 px-4 text-white/90 hover:text-[#d4a574] transition text-xs"> INDIA HERBS</a>
 
                            </li>
                            <li>
                                 <a href="fresh-fruit.php" class="block py-2 px-4 text-white/90 hover:text-[#d4a574] transition text-xs">FRESH FRUITS</a>
                               
                            </li>
                            <li>
                                <a href="indian-rice.php" class="block py-2 px-4 text-white/90 hover:text-[#d4a574] transition text-xs">INDIAN RICE</a>
                            </li>
                             <li>
                                <a href="tea.php" class="block py-2 px-4 text-white/90 hover:text-[#d4a574] transition text-xs">PREMIUM TEA</a>
                            </li>
                             <li>
                                <a href="dry-fruits.php" class="block py-2 px-4 text-white/90 hover:text-[#d4a574] transition text-xs">DRY FRUITS</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="about.php" class="block py-3 px-4 text-white hover:bg-white/10 hover:text-[#d4a574] transition rounded uppercase text-sm tracking-wider">
                            About
                        </a>
                    </li>
                    
                    <li>
                        <a href="services.php" class="block py-3 px-4 text-white hover:bg-white/10 hover:text-[#d4a574] transition rounded uppercase text-sm tracking-wider">
                            Services
                        </a>
                    </li>
                    
                    <li>
                        <a href="contact.php" class="block py-3 px-4 text-white hover:bg-white/10 hover:text-[#d4a574] transition rounded uppercase text-sm tracking-wider">
                            Contact
                        </a>
                    </li>
                </ul>

                <!-- Mobile CTA Button -->
                <div class="mt-8">
                    <a href="contact.php" class="block text-center bg-[#d4a574] text-[#1a472a] py-3 px-6 rounded-full font-bold text-sm uppercase tracking-widest hover:bg-[#1a472a] hover:text-[#d4a574] transition border-2 border-[#d4a574]">
                        Get a Quote
                    </a>
                </div>

                <!-- Mobile Social Links -->
                <div class="mt-8 pt-6 border-t border-white/20">
                    <div class="flex justify-center space-x-6">
                        <a href="#" class="text-white hover:text-[#d4a574] transition text-xl">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-white hover:text-[#d4a574] transition text-xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-white hover:text-[#d4a574] transition text-xl">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-white hover:text-[#d4a574] transition text-xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <!-- Mobile Contact Info -->
                <div class="mt-6 text-center space-y-3 text-sm text-white/80">
                    <div class="flex items-center justify-center space-x-2">
                        <i class="fas fa-phone-alt text-[#d4a574]"></i>
                        <span>+91 6265 861 847</span>
                    </div>
                   <div class="flex items-start justify-center gap-2 text-center px-4">
    <i class="fas fa-map-marker-alt text-[#d4a574] mt-1"></i>

    <span class="text-sm leading-relaxed">
      Saket Nagar, Bhopal, Madhya Pradesh, 462024 (INDIA)
    </span>
</div>

                </div>
            </nav>
        </div>
    </div>



