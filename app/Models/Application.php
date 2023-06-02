<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['agency_id', 'category_id', 'name', 'short_name', 'url', 'service_type', 'service_area', 'status'];

    public function agency()
    {
        return $this->belongsTo(Agency::class)->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function service_type()
    {
        if ($this->service_type == 1) {
            return 'Umum';
        } else {
            return 'Khusus';
        }
    }

    public function service_area()
    {
        if ($this->service_area == 1) {
            return 'Pusat';
        } else {
            return 'Daerah';
        }
    }

    public function status()
    {
        if ($this->status == 1) {
            return 'Aktif';
        } else {
            return 'Tidak Aktif';
        }
    }
}
