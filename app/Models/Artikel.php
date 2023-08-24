<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */

    protected $fillable = [
    'judul_artikel',
    'id_kategori',
    'tags_artikel',
    'teks_artikel',
    'detail_gambar',
    'gambar_artikel',
    'id_penulis'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_penulis');
    }

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'artikel_tags');
    }
}
