<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Inertia\Inertia;
use Inertia\Response;

class BlogController extends Controller
{
    //

    public function index(Request $request): Response
    {
        $blogs = Blog::with('user')->paginate(10);
        return Inertia::render('Blogs/List', [
            'blogs' => $blogs
        ]);
    }

    public function create(Request $request): Response
    {
        return Inertia::render('Blogs/Add', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status')
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:500',
            'body' => 'required|string|max:5000',
            'meta_title' => 'required|string|max:60',
            'meta_description' => 'required|string|max:160'
        ]);

        Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'user_id' => auth()->user()->id
        ]);

        return redirect(route('blogs.list', absolute: false));
    }

    public function edit(Request $request): Response
    {

        return Inertia::render('Blogs/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status')
        ]);
    }
}
