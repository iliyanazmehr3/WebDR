<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.scss'])
    <!-- SimpleMDE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <style>
        .editor-preview img { max-width: 100%; }
    </style>
</head>
<body class="bg-gray-100 font-en p-8">
    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Presentations Dashboard</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Form Section -->
            <div id="form-section">
                <h2 class="text-xl font-bold mb-4" id="form-title">Create New Presentation</h2>
                <form id="presentation-form" action="/admin/presentations" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="form-method" value="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Route Slug</label>
                        <input type="text" id="input-route" name="route" class="w-full border-gray-300 rounded-md shadow-sm p-2" required placeholder="e.g. ai-course-2026">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Title (English)</label>
                        <input type="text" id="input-title-en" name="title_en" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Markdown Content (English)</label>
                        <textarea id="mde-en" name="markdown_content_en"></textarea>
                    </div>

                    <!-- Image Upload Helper -->
                    <div class="mt-4 mb-6 p-4 bg-gray-50 border border-gray-200 rounded-md">
                        <h4 class="font-bold text-sm text-gray-700 mb-2">Asset Upload (Upload an image to insert into the editor above)</h4>
                        <div class="flex gap-2">
                            <input type="file" id="image-upload" class="text-sm">
                            <button type="button" id="upload-btn" class="bg-brand-accent text-white px-3 py-1 rounded text-sm hover:bg-slate-600 transition">Upload</button>
                        </div>
                        <p id="upload-status" class="text-xs text-gray-500 mt-2"></p>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" id="submit-btn" class="w-full bg-brand-accent text-white font-bold py-2 px-4 rounded hover:bg-slate-600 transition">Save Presentation</button>
                        <button type="button" id="cancel-edit-btn" class="hidden w-full bg-gray-400 text-white font-bold py-2 px-4 rounded hover:bg-gray-500 transition">Cancel Edit</button>
                    </div>
                </form>
            </div>

            <!-- List Section -->
            <div>
                <h2 class="text-xl font-bold mb-4">Existing Presentations</h2>
                <ul class="space-y-4">
                    @foreach($presentations as $p)
                        <li class="bg-gray-50 p-4 rounded-lg border border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div>
                                <span class="font-bold block">{{ $p->title_en ?: $p->route }}</span>
                                <a href="/{{ $p->route }}" class="text-sm text-blue-500 hover:underline" target="_blank">View /{{ $p->route }}</a>
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="button" class="text-blue-500 hover:text-blue-700 text-sm font-bold edit-btn"
                                    data-id="{{ $p->id }}"
                                    data-route="{{ $p->route }}"
                                    data-title="{{ htmlspecialchars($p->title_en ?? '') }}"
                                    data-markdown="{{ htmlspecialchars($p->markdown_content_en ?? '') }}">
                                    Edit
                                </button>
                                <form action="/admin/presentations/{{ $p->id }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-bold">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- SimpleMDE JS -->
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script>
        // Initialize Markdown Editor
        var simplemde = new SimpleMDE({ element: document.getElementById("mde-en") });

        // Edit functionality
        const form = document.getElementById('presentation-form');
        const formTitle = document.getElementById('form-title');
        const formMethod = document.getElementById('form-method');
        const submitBtn = document.getElementById('submit-btn');
        const cancelBtn = document.getElementById('cancel-edit-btn');
        const inputRoute = document.getElementById('input-route');
        const inputTitle = document.getElementById('input-title-en');

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');

                form.action = `/admin/presentations/${id}`;
                formMethod.value = 'PUT';
                formTitle.innerText = `Edit Presentation (${this.getAttribute('data-route')})`;
                submitBtn.innerText = 'Update Presentation';
                cancelBtn.classList.remove('hidden');

                inputRoute.value = this.getAttribute('data-route');
                inputTitle.value = this.getAttribute('data-title');
                simplemde.value(this.getAttribute('data-markdown'));

                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });

        cancelBtn.addEventListener('click', function() {
            form.action = `/admin/presentations`;
            formMethod.value = 'POST';
            formTitle.innerText = 'Create New Presentation';
            submitBtn.innerText = 'Save Presentation';
            cancelBtn.classList.add('hidden');

            inputRoute.value = '';
            inputTitle.value = '';
            simplemde.value('');
        });

        // Handle Asset Upload
        document.getElementById('upload-btn').addEventListener('click', async function() {
            const fileInput = document.getElementById('image-upload');
            const routeInput = document.querySelector('input[name="route"]');
            const statusLabel = document.getElementById('upload-status');

            if (!fileInput.files[0]) {
                statusLabel.innerText = "Please select a file first.";
                return;
            }
            if (!routeInput.value) {
                statusLabel.innerText = "Please enter a route slug first (used for organizing files).";
                return;
            }

            const formData = new FormData();
            formData.append('image', fileInput.files[0]);

            statusLabel.innerText = "Uploading...";

            try {
                const response = await fetch(`/admin/presentations/${routeInput.value}/upload`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                if (response.ok) {
                    const data = await response.json();
                    statusLabel.innerText = "Upload successful! Appending to editor...";
                    statusLabel.classList.add('text-green-600');

                    // Insert markdown image syntax into editor
                    const imgMarkdown = `\n![Uploaded Image](${data.url})\n`;
                    simplemde.value(simplemde.value() + imgMarkdown);

                    fileInput.value = ''; // Reset input
                } else {
                    const err = await response.json();
                    statusLabel.innerText = "Error: " + (err.error || response.statusText);
                    statusLabel.classList.add('text-red-600');
                }
            } catch (error) {
                statusLabel.innerText = "Error: " + error.message;
                statusLabel.classList.add('text-red-600');
            }
        });
    </script>
</body>
</html>