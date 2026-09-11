<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Gate</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <!-- Import Vazirmatn font for Persian text -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.0.0/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: #F8FAFC; /* brand-light */
        }
        #three-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        #content-wrapper {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <canvas id="three-canvas"></canvas>

    <div id="content-wrapper">
        <div id="language-card" class="bg-brand-glass backdrop-blur-md border border-brand-glass-border rounded-2xl p-8 shadow-xl flex flex-col items-center opacity-0 transform scale-90">
            <!-- Profile Picture Placeholder -->
            <div class="w-32 h-32 rounded-full bg-brand-light border-2 border-gray-200 shadow-md mb-6 flex items-center justify-center overflow-hidden">
                <span class="text-brand-accent font-bold text-xl font-en">Photo</span>
            </div>

            <!-- Bilingual Name -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-brand-text mb-2 tracking-wide font-en">Dr. Maryam Hajiesmaeili</h1>
                <h2 class="text-2xl font-bold text-gray-600 font-fa" dir="rtl">دکتر مریم حاجی اسمعیلی</h2>
            </div>

            <!-- Language Selection Buttons -->
            <div class="flex gap-4">
                <button class="px-6 py-3 bg-white hover:bg-gray-50 border border-gray-200 rounded-lg text-brand-text font-semibold font-en transition-all shadow-sm hover:shadow-md">
                    English
                </button>
                <button class="px-6 py-3 bg-white hover:bg-gray-50 border border-gray-200 rounded-lg text-brand-text font-semibold font-fa transition-all shadow-sm hover:shadow-md">
                    فارسی
                </button>
            </div>
        </div>
    </div>

</body>
</html>
