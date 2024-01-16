<?php

namespace App\Arrival;

use RainLab\User\Models\User as RainLabUser;

class ExtendedUser
{
    public static function extendUser(){
        RainLabUser::extend(function($model) {
            $model->hasMany['arrivals'] = ['App\Arrival\Models\Arrival'];
        });
    }
}
