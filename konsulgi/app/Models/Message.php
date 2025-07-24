<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class Message extends Model
{
    protected $guarded = [];
    protected $fillable = ['pasien_id', 'ahli_gizi_id', 'message', 'from_pasien'];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function ahliGizi() {
        return $this->belongsTo(AhliGizi::class);
    }
}
