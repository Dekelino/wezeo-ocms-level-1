<?php

namespace App\Arrival\Models;

use Model;

class Arrival extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = true;
    public $table = 'app_arrivals';

    protected $guarded = ['*'];

    protected $fillable = ['id','user_id','userName', 'arrivalName', 'timestamp'];
    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'user' => ['RainLab\User\Models\User']
    ];
}
