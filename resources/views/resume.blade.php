<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $locale == 'fa' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <!-- Import Vazirmatn font for Persian text -->
    @if ($locale == 'fa')
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.0.0/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    @endif
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background-color: #000;
            color: #fff;
        }
        #resume-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }
        #content-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            min-height: 100%;
            display: flex;
            flex-direction: column;
            padding-bottom: 4rem; /* for footer */
        }
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-text {
            text-align: center;
            text-shadow: 0 0 20px #9A84EB;
        }
    </style>
</head>
<body class="{{ $locale == 'fa' ? 'font-fa' : 'font-en' }}">
    <!-- 3D Canvas Background -->
    <canvas id="resume-canvas"></canvas>

    <div id="content-wrapper">
        <!-- Hero Section -->
        <section class="hero-section px-8">
            <div class="hero-text bg-brand-dark/30 backdrop-blur-sm p-10 rounded-2xl border border-brand-border shadow-[0_0_20px_#C21064]">
                <h1 class="text-5xl md:text-7xl font-bold mb-4">
                    {{ $locale == 'fa' ? 'نوآوری و علوم کامپیوتر' : 'Innovation & Computer Science' }}
                </h1>
                <p class="text-xl md:text-2xl text-gray-300">
                    {{ $locale == 'fa' ? 'به رزومه من خوش آمدید' : 'Welcome to my resume' }}
                </p>
            </div>
        </section>

        <!-- Resume / Timeline Section -->
        <section class="container mx-auto px-4 py-20 flex flex-col items-center gap-12">
            <!-- Timeline Card 1 -->
            <div class="timeline-card bg-brand-dark/40 backdrop-blur-md border border-brand-border rounded-2xl p-8 w-full max-w-3xl shadow-[0_0_15px_#9A84EB] opacity-0 transform translate-y-10">
                <h3 class="text-2xl font-bold text-brand-pink mb-2">
                    {{ $locale == 'fa' ? 'کارشناسی علوم کامپیوتر' : 'BSc Computer Science' }}
                </h3>
                <p class="text-gray-300">
                    {{ $locale == 'fa' ? 'دانشگاه نمونه' : 'University of Example' }}
                </p>
                <span class="block mt-4 text-sm text-brand-purple">2018 - 2022</span>
            </div>

            <!-- Timeline Card 2 -->
            <div class="timeline-card bg-brand-dark/40 backdrop-blur-md border border-brand-border rounded-2xl p-8 w-full max-w-3xl shadow-[0_0_15px_#C21064] opacity-0 transform translate-y-10">
                <h3 class="text-2xl font-bold text-brand-purple mb-2">
                    {{ $locale == 'fa' ? 'توسعه‌دهنده ارشد نرم‌افزار' : 'Senior Software Engineer' }}
                </h3>
                <p class="text-gray-300">
                    {{ $locale == 'fa' ? 'شرکت فناوری پیشرو' : 'Leading Tech Corp' }}
                </p>
                <span class="block mt-4 text-sm text-brand-pink">2022 - Present</span>
            </div>
        </section>

        <!-- Footer / Partners Section -->
        <footer class="mt-auto border-t border-brand-border bg-brand-dark/60 backdrop-blur-md py-12">
            <div class="container mx-auto px-4 text-center">
                <h4 class="text-xl text-gray-300 mb-8">
                    {{ $locale == 'fa' ? 'همکاران و شرکا' : 'Partners & Affiliations' }}
                </h4>
                <div class="flex justify-center items-center">
                    <!-- Placeholder for Bank Refah Kargaran Innovation Center Logo -->
                    <div class="flex flex-col items-center">
                        <svg class="w-32 h-32 mb-4 text-brand-pink drop-shadow-[0_0_10px_#C21064]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                        <span class="text-sm text-gray-400 font-semibold tracking-wide">
                            {{ $locale == 'fa' ? 'مرکز نوآوری بانک رفاه کارگران' : 'Bank Refah Kargaran Innovation Center' }}
                        </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>