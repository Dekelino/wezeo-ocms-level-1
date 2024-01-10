<?php

namespace App\Arrival;

use RainLab\User\Models\User as RainLabUser;

class ExtendedUser extends RainLabUser
{
    public $hasMany = [
        'arrivals' => ['App\Arrival\Models\Arrival', 'key' => 'user_id']
    ];
}
