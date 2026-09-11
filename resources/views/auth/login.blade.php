<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Portal</title>
    @vite(['resources/css/app.scss'])
</head>
<body class="bg-brand-light font-en min-h-screen flex items-center justify-center bg-gradient-to-br from-white to-gray-200">
    <div class="w-full max-w-md bg-brand-glass backdrop-blur-md border border-brand-glass-border rounded-2xl p-8 shadow-xl">
        <h2 class="text-2xl font-bold text-center text-brand-text mb-6">Secure Portal Access</h2>

        <form method="POST" action="/secure-portal-auth" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-accent focus:border-brand-accent sm:text-sm">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-brand-accent focus:border-brand-accent sm:text-sm">
            </div>

            <!-- Anti-Bot Checkbox Placeholder -->
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-md flex items-center justify-center">
                <span class="text-sm text-gray-500">[ Anti-Bot Verification Placeholder (e.g., Turnstile) ]</span>
            </div>

            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-brand-accent hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-accent transition-colors">
                Authenticate
            </button>
        </form>
    </div>
</body>
</html>