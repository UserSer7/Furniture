<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    protected $fillable = ['nama', 'harga', 'jumlah', 'deskripsi', 'file'];
}
