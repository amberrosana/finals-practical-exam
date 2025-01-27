<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function showPost()
    {
        return view('post.create');
    }

    public function storePost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:5000',
        ]);

        Post::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }

    public function editPost($postId)
    {
        $post = Post::findOrFail($postId);

        if ($post->user_id !== Auth::id()) {
            abort('Unauthorized action.');
        }

        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, $postId)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:5000',
        ]);

        $post = Post::findOrFail($postId);

        if ($post->user_id !== Auth::id()) {
            abort('Unauthorized action.');
        }

        $post->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);

        if ($post->user_id !== Auth::id()) {
            abort('Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }
}
