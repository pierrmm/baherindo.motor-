<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baherindo Motor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        @keyframes typewriter {
            from { width: 0; }
            to { width: 100%; }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-fade-in-left {
            animation: fadeInLeft 0.8s ease-out forwards;
        }

        .animate-fade-in-right {
            animation: fadeInRight 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .shimmer-text {
            position: relative;
            background: linear-gradient(90deg, #4b4c9d, #60a5fa, #4b4c9d);
            background-size: 200% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 2s infinite;
        }

        .animate-on-load {
            opacity: 0;
            transform: translateY(30px);
        }

        .loaded .animate-on-load {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.8s ease-out;
        }

        .delay-100 { transition-delay: 0.1s; }
        .delay-200 { transition-delay: 0.2s; }
        .delay-300 { transition-delay: 0.3s; }
        .delay-400 { transition-delay: 0.4s; }
        .delay-500 { transition-delay: 0.5s; }

        .btn-hover {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-hover:hover::before {
            left: 100%;
        }

        .floating-card {
            animation: float 4s ease-in-out infinite;
        }

        .floating-card:nth-child(2) {
            animation-delay: -2s;
        }

        /* Navbar Animation */
        .navbar {
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(75, 76, 157, 0.95);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    

    <!-- Hero Section -->
    <section id="home" class="pt-16 bg-gradient-to-br from-[#4b4c9d]/10 to-indigo-100 min-h-screen flex items-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-6">
                    <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6 animate-on-load">
                        Motor Bekas 
                        <span class="shimmer-text relative">
                            Berkualitas
                        </span> 
                        dengan Harga Terbaik
                    </h1>
                    
                    <p class="text-xl text-gray-600 mb-8 animate-on-load delay-200">
                        Temukan motor impian Anda di Baherindo Motor. Kami menyediakan berbagai pilihan motor bekas berkualitas dengan garansi dan pelayanan terpercaya.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 animate-on-load delay-400 relative z-20">
          <a href="#motors" class="bg-[#4b4c9d] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#3e3f86] transition-all duration-300 text-center btn-hover transform hover:scale-105 hover:shadow-lg">
            Lihat Motor
          </a>
          <a href="#contact" class="border-2 border-[#4b4c9d] text-[#4b4c9d] px-8 py-3 rounded-lg font-semibold hover:bg-[#4b4c9d] hover:text-white transition-all duration-300 text-center btn-hover transform hover:scale-105 hover:shadow-lg">
            Hubungi Kami
          </a>
        </div>
                </div>

                <!-- Right Content -->
                <div class="relative animate-on-load delay-300">
                    <div class=" h-96 rounded-2xl flex items-center justify-center relative overflow-hidden      ">
                        <!-- Background decoration circles -->
                        <div class="absolute top-4 left-4 w-16 h-16 bg-white/10 rounded-full animate-float"></div>
                        <div class="absolute bottom-8 right-8 w-8 h-8 bg-white/20 rounded-full animate-float" style="animation-delay: -1s;"></div>
                        <div class="absolute top-1/2 right-4 w-4 h-4 bg-white/15 rounded-full animate-float" style="animation-delay: -0.5s;"></div>
                        
                        <!-- Motor Icon/Placeholder -->
                        <div class="relative z-10 animate-float">                           
                                <div class="  flex items-center justify-center">
                    <img src="{{ asset('images/zx.png') }}" alt="Logo Baherindo Motor" class="h-80 " />
                </div>
                        </div>
                    </div>

                    <!-- Floating Cards -->
                    <div class="absolute -top-4 -left-4 bg-white p-4 rounded-xl shadow-lg floating-card animate-on-load delay-500 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                            <span class="text-sm font-medium">1000+ Motor Terjual</span>
                        </div>
                    </div>
                    
                    <div class="absolute -bottom-4 -right-4 bg-white p-4 rounded-xl shadow-lg floating-card animate-on-load delay-500 hover:shadow-xl transition-shadow duration-300" style="animation-delay: -2s;">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2 animate-pulse"></div>
                            <span class="text-sm font-medium">Garansi Resmi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background decorative elements -->
        <div class="absolute top-10 left-10 w-32 h-32 bg-[#4b4c9d]/5 rounded-full animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 bg-indigo-400/10 rounded-full animate-float" style="animation-delay: -1s;"></div>
    </section>

    <script>
        // Page load animation
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.body.classList.add('loaded');
            }, 100);
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mouse parallax effect
        document.addEventListener('mousemove', function(e) {
            const cards = document.querySelectorAll('.floating-card');
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;

            cards.forEach((card, index) => {
                const moveX = (x - 0.5) * 10 * (index + 1);
                const moveY = (y - 0.5) * 10 * (index + 1);
                card.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });

        // Button ripple effect
        document.querySelectorAll('.btn-hover').forEach(button => {
            button.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const ripple = document.createElement('span');
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

    <style>
        /* Ripple effect */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</body>
</html>