<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $presentation->title_en ?? 'Presentation' }}</title>
    <!-- Reveal.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reveal.js@5.0.4/dist/reveal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reveal.js@5.0.4/dist/theme/white.css" id="theme">
    <!-- Highlight.js theme for code syntax -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reveal.js@5.0.4/plugin/highlight/monokai.css">
    <style>
        /* Ensure images injected via markdown scale nicely */
        .reveal section img { max-height: 70vh; }
    </style>
</head>
<body>
    <div class="reveal">
        <div class="slides">
            <section data-markdown data-separator="^\r?\n---\r?\n$" data-separator-vertical="^\r?\n--\r?\n$">
                <script type="text/template">
{!! $presentation->markdown_content_en !!}
                </script>
            </section>
        </div>
    </div>

    <!-- Reveal.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/reveal.js@5.0.4/dist/reveal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/reveal.js@5.0.4/plugin/markdown/markdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/reveal.js@5.0.4/plugin/highlight/highlight.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/reveal.js@5.0.4/plugin/notes/notes.js"></script>

    <script>
        Reveal.initialize({
            hash: true,
            plugins: [ RevealMarkdown, RevealHighlight, RevealNotes ]
        });
    </script>
</body>
</html>