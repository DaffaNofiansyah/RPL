<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PIC extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Req()
    {
        return $this->belongsTo(Req::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
