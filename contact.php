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
<section class="relative h-[350px] sm:h-[450px] md:h-[600px] overflow-hidden">
  
  <img 
    src="assest/contact_430h.jpeg" 
    alt="Contact Background" 
    class="absolute inset-0 w-full h-full object-cover object-[center_20%] md:object-top"
  />
  
  <div class="absolute inset-0 bg-black/30 md:bg-gradient-to-r md:from-black/20 md:via-black/40 md:to-transparent"></div>
  
  <div class="absolute top-0 right-0 w-1/3 h-full bg-[#d4a574]/10 skew-x-12 transform translate-x-20 hidden lg:block"></div>

  <div class="max-w-7xl mx-auto px-6 relative z-10 h-full flex items-center">
    <div class="text-center lg:text-left w-full">
      
      <h1 class="text-3xl sm:text-5xl md:text-7xl font-serif text-white mb-4 md:mb-6 leading-tight">
        Contact <span class="text-[#d4a574]">Us</span>
      </h1>

      <p class="text-gray-200 text-sm sm:text-base md:text-xl max-w-md md:max-w-2xl mx-auto lg:mx-0">
        Ready to take your business global? Whether you have a question about our products or need a custom quote, our team is here to help.
      </p>

      <div class="mt-6 md:mt-8 flex items-center justify-center lg:justify-start space-x-2 text-[10px] sm:text-xs md:text-sm text-[#d4a574] uppercase tracking-widest font-semibold">
        <a href="home.php" class="hover:text-white transition">Home</a>
        <span>/</span>
        <span class="text-gray-400">Contact Us</span>
      </div>
    </div>
  </div>
</section>

<section id="contact" class="py-10 md:py-10 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12 md:mb-16">
            <p class="text-[#d4a574] font-bold tracking-widest uppercase mb-3">Get In Touch</p>
            <p class="text-gray-600 text-lg">Ready to start your export journey? Reach out to our team today.</p>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-8 md:gap-12">
            <div class="bg-white p-6 md:p-10 rounded-3xl shadow-2xl border border-gray-100 order-2 lg:order-1">
                <h3 class="text-2xl font-bold mb-8 text-gray-800 border-l-4 border-[#d4a574] pl-4">Send us a Message</h3>
                <form action="#contact" method="POST" class="space-y-5">
                    <div class="grid md:grid-cols-2 gap-5">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Full Name *</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#d4a574] focus:bg-white outline-none transition" placeholder="John Doe">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Email Address *</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#d4a574] focus:bg-white outline-none transition" placeholder="john@example.com">
                        </div>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-5">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Phone Number</label>
                            <input type="tel" name="phone" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#d4a574] focus:bg-white outline-none transition" placeholder="+91 00000 00000">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Product Interest</label>
                            <select name="product_interest" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#d4a574] focus:bg-white outline-none transition">
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
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ">Message *</label>
                        <textarea name="message" required rows="4" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#d4a574] focus:bg-white outline-none transition" placeholder="Tell us about your requirements..."></textarea>
                    </div>
<button type="submit" class="btn-premium btn-gold  px-6 py-4 rounded-full text-[16px] uppercase font-bold tracking-widest w-full rounded-lg text-sm">Send Message</button>
                </form>
            </div>
            
           <div class="space-y-6 order-1 lg:order-2">
    <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-1 h-full bg-[#d4a574]"></div>
        <div class="w-14 h-14 bg-gradient-to-br from-[#d4a574] to-[#8b4513] rounded-xl flex items-center justify-center text-2xl text-white shrink-0 shadow-lg shadow-[#d4a574]/30 group-hover:rotate-12 transition-transform">
            <i class="fa-solid fa-location-dot"></i>
        </div>
        <div>
            <h4 class="font-bold text-gray-900 text-lg mb-1 tracking-tight">Our Headquarters</h4>
            <p class="text-gray-500 text-sm leading-relaxed">
                Saket Nagar, Bhopal, Madhya Pradesh, 462024 (INDIA)
            </p>
        </div>
    </div>

    <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-1 h-full bg-[#d4a574]"></div>
        <div class="w-14 h-14 bg-gradient-to-br from-[#d4a574] to-[#8b4513] rounded-xl flex items-center justify-center text-2xl text-white shrink-0 shadow-lg shadow-[#d4a574]/30 group-hover:rotate-12 transition-transform">
            <i class="fa-solid fa-envelope-open-text"></i>
        </div>
        <div>
            <h4 class="font-bold text-gray-900 text-lg mb-1 tracking-tight">Email Support</h4>
            <p class="text-gray-500 text-sm font-medium">rp750947@gmail.com</p>
            <p class="text-gray-500 text-sm font-medium">rohitkiaaan@gmail.com</p>
            <p class="text-[#d4a574] text-xs font-bold uppercase tracking-tighter">24/7 Response Time</p>
        </div>
    </div>

    <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-1 h-full bg-[#d4a574]"></div>
        <div class="w-14 h-14 bg-gradient-to-br from-[#d4a574] to-[#8b4513] rounded-xl flex items-center justify-center text-2xl text-white shrink-0 shadow-lg shadow-[#d4a574]/30 group-hover:rotate-12 transition-transform">
            <i class="fa-solid fa-phone-volume"></i>
        </div>
        <div>
            <h4 class="font-bold text-gray-900 text-lg mb-1 tracking-tight">Direct Helpline</h4>
            <p class="text-gray-500 text-sm font-bold">+91 6265 861 847</p>
            <p class="text-gray-400 text-xs">Available: 09:00 - 18:00 (IST)</p>
        </div>
    </div>

    <div class="bg-zinc-900 p-8 rounded-3xl shadow-2xl text-white relative overflow-hidden border border-white/5">
        <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-[#d4a574]/10 rounded-full blur-3xl"></div>
        <h4 class="font-bold text-[#d4a574] text-xl mb-6 flex items-center gap-3">
            <i class="fa-regular fa-clock"></i> Business Hours
        </h4>
        <div class="space-y-4 text-sm">
            <div class="flex justify-between items-center border-b border-white/10 pb-3">
                <span class="text-gray-400 font-medium">Mon - Fri</span>
                <span class="font-bold text-white">09:00 AM - 06:00 PM</span>
            </div>
            <div class="flex justify-between items-center border-b border-white/10 pb-3">
                <span class="text-gray-400 font-medium">Saturday</span>
                <span class="font-bold text-white">09:00 AM - 02:00 PM</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-400 font-medium">Sunday</span>
                <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-bold uppercase">Closed</span>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</section>

<section class="w-full h-[400px] md:h-[500px] bg-gray-200 relative overflow-hidden">

    <iframe 
        class="w-full h-full grayscale hover:grayscale-0 transition-all duration-700"
        src="https://www.google.com/maps?q=Saket+Nagar+Bhopal+462024+India&output=embed"
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>

    <!-- Info Card -->
 

</section>


<?php if($showModal): ?>
<div id="contactSuccessModal" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/80 backdrop-blur-md px-4">
    <div class="bg-white w-full max-w-md rounded-3xl p-10 text-center shadow-2xl animate-in fade-in zoom-in duration-300">
        <div class="w-24 h-24 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
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
        window.location.href = 'contact.php'; 
    }
</script>
<?php endif; ?>

<?php include 'footer.php'; ?>