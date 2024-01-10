<?php

namespace App\Arrival;

use Backend\Facades\Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'Arrival',
            'description' => 'Manage arrivals and timestamps.',
            'author'      => 'App',
            'icon'        => 'icon-hand-spock-o',
            'permissions' => ['app.arrival.*'],
            'url'         => Backend::url('app/arrival/arrivals'), // Corrected URL
            'order'       => 500,
        ];
    }
    public function registerComponents()
    {

        return [
            'App\Arrival\Components\MyComponent' => 'myComponent',
        ];
    }
    public function registerPermissions()
    {

        return [
            'app.arrival.some_permission' => [
                'tab' => 'Arrival',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerNavigation()
    {

        return [
            'arrival' => [
                'label'       => 'Arrival',
                'url'         => Backend::url('app/arrival/arrivals'),
                'icon'        => 'icon-hand-spock-o',
                'permissions' => ['app.arrival.*'],
                'order'       => 500,
            ],
        ];
    }
}
