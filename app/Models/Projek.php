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
        return $this->belongsTo(PlatformProjek::class)->withTrashed();
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class)->withTrashed();
    }

    public function scopeCari($query, $request)
    {
        if ($request['cari']) {
            $query->where(function ($query) use ($request) {
                $query->where('judul', 'like', '%' . $request['cari'] . '%')
                    ->orWhere('isi', 'like', '%' . $request['cari'] . '%');
            });
        }

        if ($request['platform']) {
            $query->where('platform_projek_id', $request['platform']);
        }

        if ($request['paket']) {
            $query->where('paket_id', $request['paket']);
        }

        return $query;
    }
}
