<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // public function index()
    // {
    //     $tags = Tag::all();
    //     return view('tags.index', compact('tags'));
    // }
    public function showTest()
    {
        return view('tags.test');
    }
    public function index()
    {
        $tags = Tag::with('posts')->get();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Tag::create($data);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag->update($data);

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
