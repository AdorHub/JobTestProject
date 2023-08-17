<?php

namespace App\Models;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $guarded = false;
    const UPDATED_AT = null;

    public function status ()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
