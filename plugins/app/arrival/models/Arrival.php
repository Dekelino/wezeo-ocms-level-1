<?php

namespace App\Arrival\Models;
use App\Arrival\ExtendedUser;

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

    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'user' => [ExtendedUser::class, 'key' => 'user_id']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
