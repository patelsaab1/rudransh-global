<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Map - Global Presence</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Map Container */
        .map-container {
            position: relative;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Ping Animation */
        .map-pin {
            position: absolute;
            transform: translate(-50%, -50%);
            cursor: pointer;
            z-index: 10;
        }

        .ping-icon {
            position: relative;
            width: 8px;
            height: 8px;
        }

        .ping-dot {
            position: absolute;
            width: 8px;
            height: 8px;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.5);
            z-index: 2;
        }

        .ping-ring {
            position: absolute;
            width: 8px;
            height: 8px;
            border: 2px solid #ef4444;
            border-radius: 50%;
            animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
            opacity: 0.75;
        }

        .ping-ring:nth-child(2) {
            animation-delay: 0.5s;
        }

        @keyframes ping {
            0% {
                transform: scale(1);
                opacity: 0.75;
            }
            75%, 100% {
                transform: scale(3);
                opacity: 0;
            }
        }

        /* Tooltip Styles */
        .map-tooltip {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(-8px);
            background: linear-gradient(135deg, #1a472a 0%, #0f3520 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            pointer-events: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 100;
        }

        .map-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 6px solid transparent;
            border-top-color: #0f3520;
        }

        .map-pin:hover .map-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(-12px);
        }

        .map-pin:hover .ping-dot {
            transform: scale(1.2);
            box-shadow: 0 4px 16px rgba(239, 68, 68, 0.7);
        }

        /* Reveal Animation */
        .reveal {
            opacity: 0;
            animation: fadeInUp 1s ease forwards;
        }

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

        /* Region Labels */
        .region-label {
            position: absolute;
            font-size: 11px;
            font-weight: 700;
            color: #d4a574;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            opacity: 0.6;
            pointer-events: none;
        }

        /* Gradient Overlay */
        .gradient-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at center, transparent 0%, rgba(250, 248, 245, 0.3) 100%);
            pointer-events: none;
        }

        /* Stats Counter */
        .stat-counter {
            animation: countUp 2s ease-out forwards;
        }

        @keyframes countUp {
            from { opacity: 0; transform: scale(0.5); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- World Map Section -->
<section class="py-20 bg-gradient-to-br from-[#faf8f5] via-white to-[#f5f3f0] relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-20 w-64 h-64 bg-[#d4a574] rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-[#1a472a] rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <!-- Header Section -->
        <div class="text-center mb-16 reveal">
            <p class="text-sm font-bold mb-4 tracking-[0.25em] text-[#d4a574] uppercase">
                Global Presence
            </p>

            <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 text-[#1a472a]">
                Serving <span class="bg-gradient-to-r from-[#d4a574] to-[#c49563] bg-clip-text text-transparent">International Markets</span>
            </h2>

            <p class="text-gray-600 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                We proudly supply premium Indian agricultural products to global B2B buyers, 
                building long-term partnerships through quality, consistency, and reliable export services.
            </p>

            <!-- Stats -->
            <div class="flex flex-wrap justify-center gap-8 mt-12">
                <div class="stat-counter text-center">
                    <div class="text-4xl md:text-5xl font-bold text-[#d4a574] mb-2">30+</div>
                    <div class="text-sm text-gray-600 uppercase tracking-wider">Countries</div>
                </div>
                <div class="stat-counter text-center" style="animation-delay: 0.2s;">
                    <div class="text-4xl md:text-5xl font-bold text-[#d4a574] mb-2">6</div>
                    <div class="text-sm text-gray-600 uppercase tracking-wider">Continents</div>
                </div>
                <div class="stat-counter text-center" style="animation-delay: 0.4s;">
                    <div class="text-4xl md:text-5xl font-bold text-[#d4a574] mb-2">100%</div>
                    <div class="text-sm text-gray-600 uppercase tracking-wider">Quality Assured</div>
                </div>
            </div>
        </div>

        <!-- World Map with Pins -->
        <div class="map-container reveal" style="animation-delay: 0.3s;">
            <div class="relative bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">
                <div class="gradient-overlay rounded-3xl"></div>
                
                <img src="assest/map.png" alt="World Map" class="w-full rounded-2xl opacity-90" style="object-fit: cover; height: 500px; object-position: center 45%;">

                <!-- Region Labels -->
                <div class="region-label" style="top: 15%; left: 15%;">North America</div>
                <div class="region-label" style="top: 15%; left: 48%;">Europe</div>
                <div class="region-label" style="top: 30%; left: 55%;">Middle East</div>
                <div class="region-label" style="top: 35%; left: 70%;">Asia</div>
                <div class="region-label" style="top: 25%; left: 62%;">CIS</div>

                <!-- NORTH AMERICA -->
                <div class="map-pin" style="top: 25%; left: 18%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">United States</div>
                </div>
                <div class="map-pin" style="top: 20%; left: 20%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Canada</div>
                </div>

                <!-- EUROPE -->
                <div class="map-pin" style="top: 18%; left: 47%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">United Kingdom</div>
                </div>
                <div class="map-pin" style="top: 20%; left: 50%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Germany</div>
                </div>
                <div class="map-pin" style="top: 24%; left: 46%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Spain</div>
                </div>
                <div class="map-pin" style="top: 23%; left: 50%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Italy</div>
                </div>
                <div class="map-pin" style="top: 18%; left: 52%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Poland</div>
                </div>

                <!-- CIS COUNTRIES -->
                <div class="map-pin" style="top: 22%; left: 59%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Kazakhstan</div>
                </div>
                <div class="map-pin" style="top: 27%; left: 59%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Uzbekistan</div>
                </div>
                <div class="map-pin" style="top: 29%; left: 60%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Tajikistan</div>
                </div>
                <div class="map-pin" style="top: 28%; left: 56%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Azerbaijan</div>
                </div>

                <!-- MIDDLE EAST -->
                <div class="map-pin" style="top: 32%; left: 56%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">UAE</div>
                </div>
                <div class="map-pin" style="top: 34%; left: 54%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Saudi Arabia</div>
                </div>
                <div class="map-pin" style="top: 33%; left: 57%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Qatar</div>
                </div>
                <div class="map-pin" style="top: 34%; left: 58%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Oman</div>
                </div>
                <div class="map-pin" style="top: 31%; left: 55%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Kuwait</div>
                </div>
                <div class="map-pin" style="top: 32%; left: 53%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Iraq</div>
                </div>
                <div class="map-pin" style="top: 30%; left: 57%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Iran</div>
                </div>
                <div class="map-pin" style="top: 31%; left: 52%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Jordan</div>
                </div>
                <div class="map-pin" style="top: 28%; left: 51%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Turkey</div>
                </div>

                <!-- AFRICA -->
                <div class="map-pin" style="top: 30%; left: 48%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Egypt</div>
                </div>
                <div class="map-pin" style="top: 30%; left: 45%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Morocco</div>
                </div>

                <!-- SOUTHEAST ASIA -->
                <div class="map-pin" style="top: 38%; left: 68%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Vietnam</div>
                </div>
                <div class="map-pin" style="top: 42%; left: 72%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Singapore</div>
                </div>
                <div class="map-pin" style="top: 40%; left: 71%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Malaysia</div>
                </div>
                <div class="map-pin" style="top: 46%; left: 73%;">
                    <div class="ping-icon">
                        <div class="ping-ring"></div>
                        <div class="ping-ring"></div>
                        <div class="ping-dot"></div>
                    </div>
                    <div class="map-tooltip">Indonesia</div>
                </div>

            </div>
        </div>

        <!-- Countries List -->
        <div class="mt-16 reveal" style="animation-delay: 0.6s;">
            <div class="text-center mb-10">
                <h3 class="text-3xl md:text-4xl font-bold text-[#1a472a] mb-4">
                    Our Global <span class="text-[#d4a574]">Footprint</span>
                </h3>
                <p class="text-gray-600">Serving 30+ countries across 6 continents</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                <!-- North America -->
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                        <h4 class="font-bold text-[#1a472a] text-lg">North America</h4>
                    </div>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            United States
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Canada
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <span class="text-xs font-semibold text-[#d4a574]">2 Countries</span>
                    </div>
                </div>

                <!-- Europe -->
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                        <h4 class="font-bold text-[#1a472a] text-lg">Europe</h4>
                    </div>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            United Kingdom
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Germany
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Spain
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Italy
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Poland
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <span class="text-xs font-semibold text-[#d4a574]">5 Countries</span>
                    </div>
                </div>

                <!-- CIS Countries -->
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                        <h4 class="font-bold text-[#1a472a] text-lg">CIS Countries</h4>
                    </div>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Kazakhstan
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Uzbekistan
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Tajikistan
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Azerbaijan
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <span class="text-xs font-semibold text-[#d4a574]">4 Countries</span>
                    </div>
                </div>

                <!-- Middle East -->
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                        <h4 class="font-bold text-[#1a472a] text-lg">Middle East</h4>
                    </div>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            UAE
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Saudi Arabia
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Kuwait
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Qatar
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Oman
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Iraq
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Iran
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Jordan
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Turkey
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <span class="text-xs font-semibold text-[#d4a574]">9 Countries</span>
                    </div>
                </div>

                <!-- Africa -->
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                        <h4 class="font-bold text-[#1a472a] text-lg">Africa</h4>
                    </div>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Egypt
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Morocco
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <span class="text-xs font-semibold text-[#d4a574]">2 Countries</span>
                    </div>
                </div>

                <!-- Southeast Asia -->
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                        <h4 class="font-bold text-[#1a472a] text-lg">Southeast Asia</h4>
                    </div>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Vietnam
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Singapore
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Malaysia
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-[#d4a574] rounded-full mr-2"></span>
                            Indonesia
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <span class="text-xs font-semibold text-[#d4a574]">4 Countries</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-16 reveal" style="animation-delay: 0.5s;">
            <p class="text-gray-600 mb-6 text-lg">
                Ready to expand your business with our premium products?
            </p>
            <button class="bg-gradient-to-r from-[#d4a574] to-[#c49563] text-white px-10 py-4 rounded-full font-semibold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-300">
                Get in Touch
            </button>
        </div>
    </div>
</section>

</body>
</html>