<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;
    protected $table = 'projek';

    public function platformProjek()
    {
        return $this->belongsTo(PlatformProjek::class);
    }

    public function scopeCari($query, array $filters)
    {
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            return $query->where('judul', 'like', '%' . $cari . '%')
                ->orWhere('isi', 'like', '%' . $cari . '%');
        });

        $query->when($filters['platform'] ?? false, function ($query, $platform) {
            return $query->whereHas('platformProjek', function ($query) use ($platform) {
                $query->where('platform_projek_id', $platform);
            });
        });
    }
}
