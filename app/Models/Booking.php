<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;
    // public function setRoomIdAttribute($input)
    // {
    //     $this->attributes['room_id'] = $input ? $input : null;
    // }

    // /**
    //  * Set attribute to date format
    //  * @param $input
    //  */
    // public function setCheckOutDateAttribute($input)
    // {
    //     if ($input != null && $input != '') {
    //         $this->attributes['checkin_date'] = Carbon::createFromFormat(config('app.date_format') . ' H:i', $input)->format('Y-m-d H:i');
    //     } else {
    //         $this->attributes['checkin_date'] = null;
    //     }
    // }

    // /**
    //  * Get attribute from date format
    //  * @param $input
    //  *
    //  * @return string
    //  */
    // // public function getCheckOutDateAttribute($input)
    // // {
    // //     $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

    // //     if ($input != $zeroDate && $input != null) {
    // //         return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
    // //     } else {
    // //         return '';
    // //     }
    // // }

    // /**
    //  * Set attribute to date format
    //  * @param $input
    //  */
    // public function setCheckInDateAttribute($input)
    // {
    //     if ($input != null && $input != '') {
    //         $this->attributes['checkout_date'] = Carbon::createFromFormat(config('app.date_format') . ' H:i', $input)->format('Y-m-d H:i');
    //     } else {
    //         $this->attributes['checkout_date'] = null;
    //     }
    // }

    // /**
    //  * Get attribute from date format
    //  * @param $input
    //  *
    //  * @return string
    //  */
    // // public function getCheckInDateAttribute($input)
    // // {
    // //     $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i');

    // //     if ($input != $zeroDate && $input != null) {
    // //         return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
    // //     } else {
    // //         return '';
    // //     }
    // // }
    // // public function room()
    // // {
    // //     return $this->belongsTo('App\Models\Room');
    // // }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
