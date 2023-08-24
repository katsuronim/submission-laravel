<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::latest()->paginate(5);

        return view('artikel.index', compact('artikel'));
    }

    public function guest()
    {
        $artikel = Artikel::latest()->paginate(5);

        return view('artikel.dashboard', compact('artikel'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $tags = Tags::all();

        return view('artikel.create', compact('kategori', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_artikel' => 'required',
            'id_kategori' => 'required',
            'teks_artikel' => 'required',
            'tags_artikel' => 'required',
            'gambar_artikel' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = Auth::id();

        if ($image = $request->file('gambar_artikel')) {
            $destinationPath = 'gambar_artikel/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar_artikel'] = "$profileImage";
        }
        $input = $request->all();
        $tags = explode(", ", $input['tags_artikel']);

        $artikel = Artikel::create([
            'judul_artikel' => $request->judul_artikel,
            'id_kategori' => $request->id_kategori,
            'teks_artikel' => $request->teks_artikel,
            'tags_artikel' => $request->tags_artikel,
            'gambar_artikel' => "$profileImage",
            'id_penulis' => $id
            ]);

        foreach ($tags as $tagName) {
            $tag = Tags::firstOrCreate(['nama_tags' => $tagName]);
            $artikel->tags()->attach($tag);
        }

        return redirect()->route('artikel.index')->with('success','Artikel berhasil ditambahkan.');
    }

    public function show(Artikel $artikel)
    {
        $tags = Tags::select('nama_tags')
                ->join('artikel_tags', 'artikel_tags.tags_id', '=', 'tags.id')
                ->where('artikel_tags.artikel_id', $artikel->id)
                ->get();

        return view('artikel.show', compact('artikel', 'tags'));
    }
    public function showGuest(Artikel $artikel)
    {
        $tags = Tags::select('nama_tags')
                ->join('artikel_tags', 'artikel_tags.tags_id', '=', 'tags.id')
                ->where('artikel_tags.artikel_id', $artikel->id)
                ->get();

        return view('artikel.showGuest', compact('artikel', 'tags'));
    }

    public function edit(Artikel $artikel)
    {
        $kategori = Kategori::all();
        $tags = Tags::all();

        return view('artikel.edit',compact('artikel', 'kategori', 'tags'));
    }
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul_artikel' => 'required',
            'id_kategori' => 'required',
            'tags_artikel' => 'required',
            'teks_artikel' => 'required',
            'gambar_artikel' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar_artikel')) {
            $destinationPath = 'gambar_artikel/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar_artikel'] = "$profileImage";
        }else{
            unset($input['gambar_artikel']);
        }
        $input = $request->all();
        $tags = explode(", ", $input['tags_artikel']);

        $item = Artikel::findOrFail($artikel->id);

        $item->update([
            'judul_artikel' => $request->judul_artikel,
            'kategori_artikel' => $request->id_kategori,
            'teks_artikel' => $request->teks_artikel,
            'tags_artikel' => $request->tags_artikel,
            'gambar_artikel' => "$profileImage",
            ]);

        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tags::firstOrCreate(['nama_tags' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $artikel->tags()->sync($newTags);

        return redirect()->route('artikel.index')->with('success','Artikel berhasil diupdate.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success','Artikel berhasil dihapus');
    }
}
