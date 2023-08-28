<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookieAlertSettings extends Model
{
    use HasFactory;
    protected $table = ['cookie_alert_settings'];
    protected $fillable = [
        'status', 'alert_text'
    ];
}
