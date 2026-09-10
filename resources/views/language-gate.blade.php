<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Gate</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: #000;
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
        <div id="language-card" class="bg-brand-dark/40 backdrop-blur-md border border-brand-border rounded-2xl p-8 shadow-[0_0_20px_#9A84EB] flex flex-col items-center opacity-0 transform scale-90">
            <!-- Profile Picture Placeholder -->
            <div class="w-32 h-32 rounded-full bg-brand-pink/20 border-2 border-brand-pink shadow-[0_0_15px_#C21064] mb-6 flex items-center justify-center overflow-hidden">
                <span class="text-brand-pink font-bold text-xl">Photo</span>
            </div>

            <!-- Bilingual Name -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2 tracking-wide">John Doe</h1>
                <h2 class="text-2xl font-bold text-gray-300" dir="rtl">جان دو</h2>
            </div>

            <!-- Language Selection Buttons -->
            <div class="flex gap-4">
                <button class="px-6 py-3 bg-brand-purple/20 hover:bg-brand-purple/40 border border-brand-purple rounded-lg text-white font-semibold transition-all shadow-[0_0_10px_#9A84EB] hover:shadow-[0_0_20px_#9A84EB]">
                    English
                </button>
                <button class="px-6 py-3 bg-brand-pink/20 hover:bg-brand-pink/40 border border-brand-pink rounded-lg text-white font-semibold transition-all shadow-[0_0_10px_#C21064] hover:shadow-[0_0_20px_#C21064]">
                    فارسی
                </button>
            </div>
        </div>
    </div>

</body>
</html>
