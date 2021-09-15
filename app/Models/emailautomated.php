<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailautomated extends Model
{
    use HasFactory;

    protected $table = 'emailautomated';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body','recipients', 'timecron', 'monday','tuesday','wednesday',
        'thursday','friday','saturday','sunday','active','repeat','date_today_updated'
    ];

    protected $hidden = [

    ];


}
