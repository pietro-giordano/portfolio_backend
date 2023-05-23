<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
      use HasFactory;

      protected $fillable = [
            'name',
            'email',
            'email_object',
            'mobile_country_code',
            'mobile',
            'message'
      ];
}
