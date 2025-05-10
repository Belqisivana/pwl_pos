<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level';
    protected $primaryKey = 'level_id'; // Asumsi primary key adalah level_id, sesuaikan jika berbeda
    public $timestamps = true; // Mengaktifkan kolom created_at dan updated_at secara default

    // Jika Anda ingin mengizinkan mass assignment untuk kolom tertentu
    protected $fillable = ['level_kode', 'level_nama'];

    // Relasi one-to-many dengan UserModel (asumsi setiap level bisa memiliki banyak user)
    public function users(): HasMany
    {
        return $this->hasMany(UserModel::class, 'level_id', 'level_id');
    }
}