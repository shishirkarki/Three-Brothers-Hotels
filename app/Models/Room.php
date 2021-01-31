<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function setFloorAttribute($input)
    {
        $this->attributes['floor'] = $input ? $input : null;
    }
    public function Booking()
    {
        return $this->HasOne(Booking::class, 'room_id');
    }
}
