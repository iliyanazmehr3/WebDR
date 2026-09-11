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
            color: #1E293B;
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
            padding-bottom: 4rem;
        }
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-text {
            text-align: center;
        }
    </style>
</head>
<body class="{{ $locale == 'fa' ? 'font-fa' : 'font-en' }} bg-gradient-to-br from-white to-gray-100 min-h-screen">
    <!-- 3D Canvas Background -->
    <canvas id="resume-canvas"></canvas>

    <div id="content-wrapper">
        <!-- Hero Section -->
        <section class="hero-section px-8">
            <div class="hero-text bg-brand-glass backdrop-blur-sm p-10 rounded-2xl border border-brand-glass-border shadow-xl">
                <h1 class="text-5xl md:text-7xl font-bold mb-4 text-brand-text">
                    {{ $locale == 'fa' ? 'نوآوری و علوم کامپیوتر' : 'Innovation & Computer Science' }}
                </h1>
                <p class="text-xl md:text-2xl text-gray-600">
                    {{ $locale == 'fa' ? 'به رزومه من خوش آمدید' : 'Welcome to my resume' }}
                </p>
            </div>
        </section>

        <!-- Resume / Timeline Section -->
        <section class="container mx-auto px-4 py-20 flex flex-col items-center gap-12">
            <!-- Timeline Card 1 -->
            <div class="timeline-card bg-brand-glass backdrop-blur-md border border-brand-glass-border rounded-2xl p-8 w-full max-w-3xl shadow-lg opacity-0 transform translate-y-10">
                <h3 class="text-2xl font-bold text-brand-text mb-2">
                    {{ $locale == 'fa' ? 'تحصیلات' : 'Education' }}
                </h3>
                <p class="text-gray-600">
                    {{ $locale == 'fa' ? 'دکتری علوم کامپیوتر' : 'Ph.D. Computer Science' }}<br>
                    {{ $locale == 'fa' ? 'دانشگاه نمونه' : 'University of Example' }}
                </p>
                <span class="block mt-4 text-sm text-brand-accent font-semibold">2018 - 2022</span>
            </div>

            <!-- Publications -->
            <div class="timeline-card bg-brand-glass backdrop-blur-md border border-brand-glass-border rounded-2xl p-8 w-full max-w-3xl shadow-lg opacity-0 transform translate-y-10">
                <h3 class="text-2xl font-bold text-brand-text mb-2">
                    {{ $locale == 'fa' ? 'انتشارات' : 'Publications' }}
                </h3>
                <ul class="list-disc list-inside text-gray-600 space-y-2 mt-4">
                    <li>{{ $locale == 'fa' ? 'مقاله علمی پیشگام ۱' : 'Groundbreaking Research Paper 1' }}</li>
                    <li>{{ $locale == 'fa' ? 'مقاله علمی پیشگام ۲' : 'Groundbreaking Research Paper 2' }}</li>
                </ul>
            </div>

            <!-- Conferences -->
            <div class="timeline-card bg-brand-glass backdrop-blur-md border border-brand-glass-border rounded-2xl p-8 w-full max-w-3xl shadow-lg opacity-0 transform translate-y-10">
                <h3 class="text-2xl font-bold text-brand-text mb-2">
                    {{ $locale == 'fa' ? 'کنفرانس‌ها' : 'Conferences' }}
                </h3>
                <p class="text-gray-600 mt-4">
                    {{ $locale == 'fa' ? 'سخنران کلیدی در رویدادهای بین‌المللی مختلف.' : 'Keynote speaker at various international events.' }}
                </p>
            </div>

            <!-- Taught Courses -->
            <div class="timeline-card bg-brand-glass backdrop-blur-md border border-brand-glass-border rounded-2xl p-8 w-full max-w-3xl shadow-lg opacity-0 transform translate-y-10">
                <h3 class="text-2xl font-bold text-brand-text mb-2">
                    {{ $locale == 'fa' ? 'دروس تدریس شده' : 'Taught Courses' }}
                </h3>
                <ul class="list-disc list-inside text-gray-600 space-y-2 mt-4">
                    <li>{{ $locale == 'fa' ? 'هوش مصنوعی پیشرفته' : 'Advanced Artificial Intelligence' }}</li>
                    <li>{{ $locale == 'fa' ? 'مبانی مهندسی نرم‌افزار' : 'Fundamentals of Software Engineering' }}</li>
                </ul>
            </div>

            <!-- Attended Courses -->
            <div class="timeline-card bg-brand-glass backdrop-blur-md border border-brand-glass-border rounded-2xl p-8 w-full max-w-3xl shadow-lg opacity-0 transform translate-y-10">
                <h3 class="text-2xl font-bold text-brand-text mb-2">
                    {{ $locale == 'fa' ? 'دوره‌های گذرانده شده' : 'Attended Courses' }}
                </h3>
                <ul class="list-disc list-inside text-gray-600 space-y-2 mt-4">
                    <li>{{ $locale == 'fa' ? 'یادگیری ماشین کاربردی' : 'Applied Machine Learning' }}</li>
                    <li>{{ $locale == 'fa' ? 'رایانش ابری' : 'Cloud Computing' }}</li>
                </ul>
            </div>
        </section>

        <footer class="mt-auto border-t border-gray-200 bg-brand-glass backdrop-blur-md py-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Dr. Maryam Hajiesmaeili. {{ $locale == 'fa' ? 'تمامی حقوق محفوظ است.' : 'All rights reserved.' }}
        </footer>
    </div>
</body>
</html>