<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baherindo Motor - Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Modal animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { 
                opacity: 0; 
                transform: translateY(-20px) scale(0.95); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }

        @keyframes slideOut {
            from { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
            to { 
                opacity: 0; 
                transform: translateY(-20px) scale(0.95); 
            }
        }

        /* Modal initial state - completely hidden */
        #contactModal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.75);
            z-index: 999999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            backdrop-filter: blur(3px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Modal visible state */
        #contactModal.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            animation: slideIn 0.3s ease-out;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-content.closing {
            animation: slideOut 0.3s ease-out;
        }

        /* Contact card animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .contact-card {
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float:nth-child(2) { animation-delay: -1s; }
        .animate-float:nth-child(3) { animation-delay: -2s; }
        .animate-float:nth-child(4) { animation-delay: -3s; }

        /* Form animations */
        .form-input {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .form-input:focus {
            border-color: #4b4c9d;
            box-shadow: 0 0 0 3px rgba(75, 76, 157, 0.1);
        }

        /* Button hover effect */
        .btn-primary {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(75, 76, 157, 0.3);
        }

        /* Focused input state */
        .focused label {
            color: #4b4c9d;
            transform: scale(0.9);
        }

        /* Prevent body scroll when modal is open */
        body.modal-open {
            overflow: hidden !important;
            position: fixed !important;
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Contact Section -->
    <section id="contact" class="pt-16 bg-gradient-to-br from-[#4b4c9d]/10 to-indigo-100 min-h-screen flex items-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Hubungi Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Siap membantu Anda menemukan motor impian dengan pelayanan terbaik</p>
            </div>

            <!-- Contact Info Cards - Centered -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Address Card -->
                <div class="contact-card bg-white rounded-xl shadow-lg p-6 text-center animate-float">
                    <div class="w-16 h-16 bg-gradient-to-r from-[#4b4c9d] to-[#6366f1] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">Alamat</h4>
                    <p class="text-gray-600 text-sm">Jl. Raya Motor No. 123<br>Jakarta Selatan<br>DKI Jakarta 12345</p>
                </div>

                <!-- Phone Card -->
                <div class="contact-card bg-white rounded-xl shadow-lg p-6 text-center animate-float">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">Telepon</h4>
                    <p class="text-gray-600 text-sm">+62 21 1234 5678<br>+62 812 3456 7890</p>
                </div>

                <!-- Email Card -->
                <div class="contact-card bg-white rounded-xl shadow-lg p-6 text-center animate-float">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">Email</h4>
                    <p class="text-gray-600 text-sm">info@baherindomotor.com<br>sales@baherindomotor.com</p>
                </div>

                <!-- Operating Hours Card -->
                <div class="contact-card bg-white rounded-xl shadow-lg p-6 text-center animate-float">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">Jam Operasional</h4>
                    <p class="text-gray-600 text-sm">Senin - Sabtu: 08:00 - 18:00<br>Minggu: 09:00 - 16:00</p>
                </div>
            </div>

            <!-- CTA Button for Modal -->
            <div class="text-center">
                <button id="openModalBtn" class="btn-primary bg-[#4b4c9d] text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-[#3e3f86] transition-all duration-300 inline-flex items-center space-x-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span>Kirim Pesan</span>
                </button>
            </div>
        </div>
    </section>


    <!-- Modal - Initially hidden -->
    <div id="contactModal">
        <div class="modal-content bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-4 relative">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h3 class="text-2xl font-bold text-gray-900">Kirim Pesan</h3>
                <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 max-h-96 overflow-y-auto">
                <form id="contactForm" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" placeholder="Masukkan nama lengkap">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" placeholder="Masukkan email">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" placeholder="Masukkan nomor telepon">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                        <select id="subject" name="subject" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                            <option value="">Pilih subjek</option>
                            <option value="inquiry">Pertanyaan Umum</option>
                            <option value="purchase">Ingin Membeli Motor</option>
                            <option value="sell">Ingin Jual Motor</option>
                            <option value="service">Layanan Purna Jual</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="4" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none resize-none" placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>

                    <div class="flex space-x-4 pt-4">
                        <button type="button" id="cancelBtn" class="flex-1 bg-gray-200 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
                            Batal
                        </button>
                        <button type="submit" class="flex-1 btn-primary bg-[#4b4c9d] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#3e3f86] transition-all duration-300">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 hidden transform translate-x-full transition-transform duration-300">
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>Pesan berhasil dikirim!</span>
        </div>
    </div>

    <script>
        // Ensure modal is hidden on page load
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('contactModal');
            modal.classList.remove('show');
            
            // Initialize card animations
            const cards = document.querySelectorAll('.contact-card');
            cards.forEach(function(card, index) {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Modal elements
        const modal = document.getElementById('contactModal');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const contactForm = document.getElementById('contactForm');
        const successMessage = document.getElementById('successMessage');

        // Open modal function
        function openModal() {
            document.body.classList.add('modal-open');
            modal.classList.add('show');
            
            // Focus first input after animation
            setTimeout(() => {
                const nameInput = document.getElementById('name');
                if (nameInput) {
                    nameInput.focus();
                }
            }, 300);
        }

        // Close modal function
        function closeModal() {
            const modalContent = document.querySelector('.modal-content');
            modalContent.classList.add('closing');
            modal.classList.remove('show');
            
            setTimeout(() => {
                modalContent.classList.remove('closing');
                document.body.classList.remove('modal-open');
                contactForm.reset();
            }, 300);
        }

        // Event listeners
        if (openModalBtn) {
            openModalBtn.addEventListener('click', function(e) {
                e.preventDefault();
                openModal();
            });
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', function(e) {
                e.preventDefault();
                closeModal();
            });
        }

        if (cancelBtn) {
            cancelBtn.addEventListener('click', function(e) {
                e.preventDefault();
                closeModal();
            });
        }

        // Close modal when clicking backdrop
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal && modal.classList.contains('show')) {
                closeModal();
            }
        });

        // Form submission
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = contactForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                
                submitBtn.textContent = 'Mengirim...';
                submitBtn.disabled = true;
                
                // Simulate form submission
                setTimeout(() => {
                    closeModal();
                    showSuccessMessage();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        }

        // Show success message
        function showSuccessMessage() {
            if (successMessage) {
                successMessage.classList.remove('hidden');
                setTimeout(() => {
                    successMessage.classList.remove('translate-x-full');
                }, 100);
                
                setTimeout(() => {
                    successMessage.classList.add('translate-x-full');
                    setTimeout(() => {
                        successMessage.classList.add('hidden');
                    }, 300);
                }, 3000);
            }
        }

        // Form input animations
        document.querySelectorAll('.form-input').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>
</html>