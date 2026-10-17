<?php include 'header.php';?>

<style>
    :root {
        --color-primary: #1a472a;
        --color-secondary: #d4a574;
        --color-accent: #2d5a3d;
        --color-bg-light: #faf8f5;
    }

    /* Marquee Animation */
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        display: flex;
        width: max-content;
        animation: marquee 30s linear infinite;
    }
    .animate-marquee:hover {
        animation-play-state: paused;
    }

    /* Process Steps */
    .process-step {
        position: relative;
        padding-left: 5rem;
        margin-bottom: 2.5rem;
    }
    
    .process-step::before {
        content: '';
        position: absolute;
        left: 1.75rem;
        top: 3.5rem;
        width: 2px;
        height: calc(100% - 1rem);
        background: linear-gradient(180deg, var(--color-secondary), transparent);
    }
    
    .process-step:last-child::before {
        display: none;
    }
    
    .step-number {
        position: absolute;
        left: 0;
        top: 0;
        width: 3.5rem;
        height: 3.5rem;
        background: linear-gradient(135deg, var(--color-secondary), #b88a58);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        box-shadow: 0 4px 15px rgba(212, 165, 116, 0.4);
        z-index: 2;
    }

    .feature-badge {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1.25rem;
        background: white;
        border-left: 4px solid var(--color-secondary);
        border-radius: 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }
    .feature-badge:hover {
        background: var(--color-bg-light);
        transform: translateX(5px);
    }

    /* Buttons */
    .btn-premium {
        display: inline-block;
        transition: all 0.3s ease;
        text-align: center;
    }
    .btn-gold {
        background: var(--color-secondary);
        color: white;
        box-shadow: 0 4px 15px rgba(212, 165, 116, 0.3);
    }
    .btn-gold:hover {
        background: #b88a58;
        transform: translateY(-2px);
    }
    
</style>

<section class="relative pt-48 pb-32   overflow-hidden bg-cover bg-center" style="background-image: url('assest/service.jpeg');">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="absolute top-0 right-0 w-1/3 h-full bg-[#1a472a]/20 skew-x-12 transform translate-x-20"></div>
    
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center lg:text-left">
            <h1 class="text-5xl md:text-7xl font-serif text-white mb-6">
                Our <span class="text-[#d4a574]">Services</span>
            </h1>
            <p class="text-gray-200 text-lg md:text-xl max-w-3xl">
                Experience complete agro export solutions with expert harvesting, advanced processing, secure packaging, and reliable global logistics for spices, rice, fruits, and dry fruits.

            </p>
            <div class="mt-8 flex items-center justify-center lg:justify-start space-x-2 text-sm text-[#d4a574] uppercase tracking-widest font-bold">
                <a href="home.php" class="hover:text-white transition">Home</a>
                <span>/</span>
                <span class="text-gray-300">Services</span>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-white">
    <div class="max-w-8xl mx-auto px-4">
        <div class="text-center mb-10">
            <p class="text-sm font-bold mb-3 tracking-[0.2em] text-[#d4a574]">WHAT WE OFFER</p>
            <h2 class="text-3xl md:text-5xl font-bold text-[#1a472a] mb-4">
                Our <span class="text-[#d4a574]">Core Services</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-base leading-relaxed">
                We deliver world-class export solutions backed by strict quality control, advanced infrastructure, and unwavering commitment to excellence.
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col">
                <div class="h-56 overflow-hidden">
                    <img src="assest/1.png" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 shrink-0 bg-[#d4a574]/10 rounded-lg flex items-center justify-center group-hover:bg-[#d4a574] transition-colors">
                            <i class="fas fa-drumstick-bite text-[#d4a574] group-hover:text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#1a472a]">Harvesting</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                        Crops are harvested at peak maturity directly from trusted farms to preserve freshness, aroma, and nutritional value.
                    </p>
                    <ul class="space-y-2 border-t pt-4">
                        <li class="flex items-start gap-2 text-xs text-gray-700">
                            <i class="fas fa-check text-[#d4a574] mt-0.5"></i>
                            Peak Maturity Harvest
                        </li>
                        <li class="flex items-start gap-2 text-xs text-gray-700">
                            <i class="fas fa-check text-[#d4a574] mt-0.5"></i>
                            Handpicked & Farm Fresh
                        </li>
                        <li class="flex items-start gap-2 text-xs text-gray-700">
                            <i class="fas fa-check text-[#d4a574] mt-0.5"></i>
                            Trusted Farmer Network
                        </li>
                    </ul>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col">
                <div class="h-56 overflow-hidden">
                    <img src="assest/2.png" alt="processing" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 shrink-0 bg-[#d4a574]/10 rounded-lg flex items-center justify-center group-hover:bg-[#d4a574] transition-colors">
                            <i class="fas fa-box-open text-[#d4a574] group-hover:text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#1a472a]">Processing</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                        Offering customer-specific cuts, trimming, and grading. Products are vacuum-sealed and blast-frozen to ensure maximum freshness.
                    </p>
                    <ul class="space-y-2 border-t pt-4">
                        <li class="flex items-start gap-2 text-xs text-gray-700"><i class="fas fa-check text-[#d4a574] mt-0.5"></i>Hygienic Cleaning</li>
                        <li class="flex items-start gap-2 text-xs text-gray-700"><i class="fas fa-check text-[#d4a574] mt-0.5"></i>Machine Grading & Sorting</li>
                        <li class="flex items-start gap-2 text-xs text-gray-700">
                            <i class="fas fa-check text-[#d4a574] mt-0.5"></i>
                            Export Quality Inspection
                        </li>
                    </ul>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col">
                <div class="h-56 overflow-hidden">
                    <img src="assest/3.png" alt="Packaging" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 shrink-0 bg-[#d4a574]/10 rounded-lg flex items-center justify-center group-hover:bg-[#d4a574] transition-colors">
                            <i class="fas fa-box-open text-[#d4a574] group-hover:text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#1a472a]">Customized Packaging</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                        Food-grade packaging designed to preserve freshness, aroma, and quality during international transportation. Customized packing options available as per buyer requirements
                    </p>
                    <ul class="space-y-2 border-t pt-4">
                        <li class="flex items-start gap-2 text-xs text-gray-700"><i class="fas fa-check text-[#d4a574] mt-0.5"></i> Vacuum & Moisture Protected Packing</li>
                        <li class="flex items-start gap-2 text-xs text-gray-700"><i class="fas fa-check text-[#d4a574] mt-0.5"></i>Custom Branding & Labeling</li>
                        <li class="flex items-start gap-2 text-xs text-gray-700"><i class="fas fa-check text-[#d4a574] mt-0.5"></i>Durable for Transit</li>
                    </ul>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col">
                <div class="h-56 overflow-hidden">
                    <img src="assest/4.png" alt="Cold Storage" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 shrink-0 bg-[#d4a574]/10 rounded-lg flex items-center justify-center group-hover:bg-[#d4a574] transition-colors">
                            <i class="fas fa-snowflake text-[#d4a574] group-hover:text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#1a472a]">Cold Chain Logistics</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                        End-to-end export logistics including documentation, container loading, customs clearance, and global shipping for all product categories.
                    </p>
                    <ul class="space-y-2 border-t pt-4">
                        <li class="flex items-start gap-2 text-xs text-gray-700"><i class="fas fa-check text-[#d4a574] mt-0.5"></i>Customs & Documentation Support</li>
                        <li class="flex items-start gap-2 text-xs text-gray-700"><i class="fas fa-check text-[#d4a574] mt-0.5"></i> Containerized & Safe Shipping</li>
                        <li class="flex items-start gap-2 text-xs text-gray-700"><i class="fas fa-check text-[#d4a574] mt-0.5"></i>Worldwide Delivery Network</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ENHANCED B2B SECTION -->
<section class="py-10 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
    
        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start mb-10">
            <!-- Left Column - Our Buyers -->
            <div class="order-2 lg:order-1">
                  <div class=" mb-5">
           <div class="flex items-center gap-4 mb-5">   <span class="h-[2px] w-16 bg-[#d4a574]"></span>
  <p class="text-sm font-bold tracking-[0.2em] text-[#d4a574] uppercase whitespace-nowrap">
    Global B2B Solutions
  </p>


</div>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-[#1a472a] mb-8">
                Bulk Supply for <span class="text-[#d4a574]">B2B Buyers</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                We specialize in end-to-end agro export solutions, supplying premium spices, rice, fresh fruits, and dry fruits to global B2B partners with assured quality and seamless logistics.

            </p>
        </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="group flex items-center gap-3 p-5 bg-[#faf8f5] rounded-xl border-2 border-gray-100 hover:border-[#d4a574] hover:shadow-lg transition-all duration-300 cursor-pointer">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-ship text-white text-lg"></i>
                        </div>
                        <span class="font-bold text-[#1a472a] group-hover:text-[#d4a574] transition-colors">Global Importers</span>
                    </div>
                    <div class="group flex items-center gap-3 p-5 bg-[#faf8f5] rounded-xl border-2 border-gray-100 hover:border-[#d4a574] hover:shadow-lg transition-all duration-300 cursor-pointer">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-store text-white text-lg"></i>
                        </div>
                        <span class="font-bold text-[#1a472a] group-hover:text-[#d4a574] transition-colors">Wholesalers</span>
                    </div>
                    <div class="group flex items-center gap-3 p-5 bg-[#faf8f5] rounded-xl border-2 border-gray-100 hover:border-[#d4a574] hover:shadow-lg transition-all duration-300 cursor-pointer">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-utensils text-white text-lg"></i>
                        </div>
                        <span class="font-bold text-[#1a472a] group-hover:text-[#d4a574] transition-colors">Restaurant Chains</span>
                    </div>
                    <div class="group flex items-center gap-3 p-5 bg-[#faf8f5] rounded-xl border-2 border-gray-100 hover:border-[#d4a574] hover:shadow-lg transition-all duration-300 cursor-pointer">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-industry text-white text-lg"></i>
                        </div>
                        <span class="font-bold text-[#1a472a] group-hover:text-[#d4a574] transition-colors">Food Processors</span>
                    </div>
                    <div class="group flex items-center gap-3 p-5 bg-[#faf8f5] rounded-xl border-2 border-gray-100 hover:border-[#d4a574] hover:shadow-lg transition-all duration-300 cursor-pointer">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-truck text-white text-lg"></i>
                        </div>
                        <span class="font-bold text-[#1a472a] group-hover:text-[#d4a574] transition-colors">Distributors</span>
                    </div>
                    <div class="group flex items-center gap-3 p-5 bg-[#faf8f5] rounded-xl border-2 border-gray-100 hover:border-[#d4a574] hover:shadow-lg transition-all duration-300 cursor-pointer">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                            <i class="fas fa-shopping-cart text-white text-lg"></i>
                        </div>
                        <span class="font-bold text-[#1a472a] group-hover:text-[#d4a574] transition-colors">Retail Chains</span>
                    </div>
                </div>
            </div>

            <!-- Right Column - Benefits -->
            <div class="order-1 lg:order-2">
                <div class="bg-gradient-to-br from-[#faf8f5] to-white p-8 sm:p-8 rounded-3xl relative shadow-2xl overflow-hidden border border-gray-100">
                    <!-- Decorative Element -->
                    <div class="absolute top-0 right-0 w-40 h-40 bg-[#d4a574] opacity-5 rounded-full -mr-20 -mt-20"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-[#1a472a] opacity-5 rounded-full -ml-16 -mb-16"></div>
                    
                    <h3 class="text-2xl sm:text-3xl font-bold mb-8 text-[#1a472a] relative z-10">
                        Why Partner with Us?
                    </h3>
                    <ul class="space-y-4 relative z-10">
                        <li class="flex gap-4 group">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-md">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1a472a] text-lg mb-1">Scalable Supply Chain</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Fulfilling high-volume monthly contracts efficiently with guaranteed delivery schedules.</p>
                            </div>
                        </li>
                        <li class="flex gap-4 group">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-md">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1a472a] text-lg mb-1">Tier-1 Compliance</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Full HALAL certification and adherence to all international food safety regulations.</p>
                            </div>
                        </li>
                        <li class="flex gap-4 group">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-md">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1a472a] text-lg mb-1">Competitive Pricing</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Volume-based pricing with flexible payment terms tailored to your business needs.</p>
                            </div>
                        </li>
                        <li class="flex gap-4 group">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-md">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1a472a] text-lg mb-1">Quality Assurance</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Rigorous quality checks at every stage from farm to freezer, ensuring premium standards.</p>
                            </div>
                        </li>
                        <li class="flex gap-4 group">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#d4a574] to-[#c49563] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform shadow-md">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1a472a] text-lg mb-1">Custom Solutions</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Tailored packaging, cuts, and specifications to match your exact requirements.</p>
                            </div>
                        </li>
                    </ul>
                </div> 
            </div>
        </div>
<!--   <div class="bg-gradient-to-br from-[#faf8f5] to-white rounded-3xl p-8 sm:p-12 text-center shadow-xl relative overflow-hidden border border-[#d4a574]/20">-->

<!--    <div class="absolute top-0 right-0 w-64 h-64 bg-[#d4a574] opacity-10 rounded-full -mr-32 -mt-32"></div>-->
<!--    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#1a472a] opacity-5 rounded-full -ml-24 -mb-24"></div>-->

<!--    <div class="relative z-10">-->

<!--        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#1a472a] mb-4">-->
<!--            Ready to Scale Your Business?-->
<!--        </h3>-->

<!--        <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">-->
<!--            Join hundreds of satisfied B2B partners worldwide. Get a custom quote today.-->
<!--        </p>-->

<!--        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">-->

<!--            <a href="contact.php"-->
<!--               class="inline-flex items-center gap-2 bg-[#d4a574] hover:bg-[#c49563] text-white font-bold px-8 py-4 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg">-->
<!--                <i class="fas fa-envelope"></i>-->
<!--                Request Quote-->
<!--            </a>-->

<!--            <a href="ourproduct.php"-->
<!--               class="inline-flex items-center gap-2 bg-white hover:bg-[#faf8f5] text-[#1a472a] font-bold px-8 py-4 rounded-full transition-all duration-300 border border-[#1a472a]/20">-->
<!--                <i class="fas fa-box"></i>-->
<!--                View Products-->
<!--            </a>-->

<!--        </div>-->

<!--        <div class="mt-8 flex flex-wrap justify-center gap-6 text-gray-600 text-sm">-->

<!--            <div class="flex items-center gap-2">-->
<!--                <i class="fas fa-clock text-[#d4a574]"></i>-->
<!--                <span>24-Hour Response Time</span>-->
<!--            </div>-->

<!--            <div class="flex items-center gap-2">-->
<!--                <i class="fas fa-handshake text-[#d4a574]"></i>-->
<!--                <span>Flexible Contracts</span>-->
<!--            </div>-->

<!--            <div class="flex items-center gap-2">-->
<!--                <i class="fas fa-shipping-fast text-[#d4a574]"></i>-->
<!--                <span>Global Shipping</span>-->
<!--            </div>-->

<!--        </div>-->

<!--    </div>-->
<!--</div>-->

    </div>
</section>

<section class="py-10 bg-[#faf8f5]">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10">
            <p class="text-lg mb-3 tracking-wider text-[#d4a574]">HOW WE WORK</p>
            <h2 class="text-4xl md:text-5xl font-bold text-[#1a472a] mb-4">Our Service <span class="text-[#d4a574]">Process</span></h2>
        </div>

        <div class="grid lg:grid-cols-2 gap-10">
            <div class="space-y-4">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <div class="bg-white p-8 rounded-2xl shadow-md">
                        <h3 class="text-xl font-bold text-[#1a472a] mb-2">Inquiry & Consultation</h3>
                        <p class="text-gray-600">Share requirements and get expert consultation within 24 hours.</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <div class="bg-white p-8 rounded-2xl shadow-md">
                        <h3 class="text-xl font-bold text-[#1a472a] mb-2">Sourcing & Testing</h3>
                        <p class="text-gray-600">Rigorous laboratory testing for international standards.</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <div class="bg-white p-8 rounded-2xl shadow-md">
                        <h3 class="text-xl font-bold text-[#1a472a] mb-2">Packaging & Shipping</h3>
                        <p class="text-gray-600">Customized packaging and seamless global logistics.</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-[#faf8f5] p-10 rounded-2xl shadow-xl">
                    <h3 class="text-2xl font-bold text-[#1a472a] mb-8">Service Advantages</h3>
                    <div class="mb-4  font-medium text-gray-700">
Trusted by international buyers for consistent quality, transparent processes, and reliable export logistics.
</div>

                    <div class="feature-badge"><i class="fas fa-clock text-[#d4a574]"></i> <span class="font-medium">24h Response</span></div>
                    <div class="feature-badge"><i class="fas fa-shield-alt text-[#d4a574]"></i> <span class="font-medium">Quality Guaranteed</span></div>
                    <div class="feature-badge"><i class="fas fa-globe text-[#d4a574]"></i> <span class="font-medium">45+ Countries</span></div>
                    <div class="feature-badge"><i class="fas fa-truck text-[#d4a574]"></i> <span class="font-medium">Reliable Global Delivery</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 mb-10 text-center">
        <h3 class="text-3xl font-bold mb-4" style="color: #1a472a;">Our Certifications</h3>
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
            <p class="mt-2 md:mt-4 text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest">India’s Export Partner</p>
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


<script>
    // Reveal Animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
                entry.target.classList.remove('opacity-0', 'translate-y-10');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.group, .process-step').forEach(el => {
        el.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
        observer.observe(el);
    });
</script>

<?php include 'footer.php'; ?>