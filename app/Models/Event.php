<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Event extends Model
{
    use HasFactory;
    protected $fillable =['event_name','event_date','event_place','event_picture','event_description'];


}
