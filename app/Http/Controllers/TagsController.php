<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    public function index()
    {
        $tags = DB::table('tags')->paginate(5);

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tags' => 'required',
        ]);

        $tags = Tags::create([
            'nama_tags' => $request->nama_tags
        ]);

        return redirect()->route('tags.index')->with('success','Tags berhasil ditambahkan.');
    }

    public function edit(Tags $tags)
    {
        return view('tags.edit',compact('tags'));
    }

    public function update(Request $request, Tags $tags)
    {
        $request->validate([
            'nama_tags' => 'required',
        ]);

        $item = Tags::findOrFail($tags->id);

        $item->update([
            'nama_tags' => $request->nama_tags
            ]);

        return redirect()->route('tags.index')->with('success','Tags berhasil diupdate.');
    }

    public function destroy(Tags $tags)
    {
        foreach ($tags->artikel as $artikel) {
            $artikel->tags()->detach($tags);
        }

        if (!$tags->artikel()->count()) {
            $tags->delete();
        }
        return redirect()->route('tags.index')->with('success','Tags berhasil dihapus');
    }
}
