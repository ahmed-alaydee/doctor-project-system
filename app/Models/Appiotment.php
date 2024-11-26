<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appiotment extends Model
{

  protected $fillable = [
    'user_id',
    'doctor_id',
    'date',
    'time',
    'status',
  ];




  function user()
  {
return $this->belongsTo(User::class);
  }
  
  function doctor()
  {
    return $this->belongsTo(Doctor::class);

  }

}
