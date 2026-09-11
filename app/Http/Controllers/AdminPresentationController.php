<?php

namespace App\Http\Controllers;

use App\Models\AcademicPresentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminPresentationController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function index()
    {
        $presentations = AcademicPresentation::all();
        return view('admin.dashboard', compact('presentations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'route' => 'required|string|unique:academic_presentations,route',
            'title_en' => 'nullable|string',
            'title_fa' => 'nullable|string',
            'markdown_content_en' => 'nullable|string',
            'markdown_content_fa' => 'nullable|string',
        ]);

        AcademicPresentation::create($validated);
        return redirect()->back()->with('success', 'Presentation created successfully.');
    }

    public function update(Request $request, AcademicPresentation $presentation)
    {
        $validated = $request->validate([
            'route' => 'required|string|unique:academic_presentations,route,' . $presentation->id,
            'title_en' => 'nullable|string',
            'title_fa' => 'nullable|string',
            'markdown_content_en' => 'nullable|string',
            'markdown_content_fa' => 'nullable|string',
        ]);

        $presentation->update($validated);
        return redirect()->back()->with('success', 'Presentation updated successfully.');
    }

    public function destroy(AcademicPresentation $presentation)
    {
        $presentation->delete();
        return redirect()->back()->with('success', 'Presentation deleted successfully.');
    }

    public function uploadImage(Request $request, $slug)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_.-]/', '_', $file->getClientOriginalName());

            $path = $file->storeAs(
                "presentations/{$slug}",
                $filename,
                'public'
            );

            // Return the public URL for the simplemde editor to embed
            $url = Storage::url($path);
            return response()->json(['url' => $url]);
        }

        return response()->json(['error' => 'Upload failed'], 400);
    }
}
