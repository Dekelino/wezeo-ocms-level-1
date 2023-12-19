<?php

namespace App\Arrival;

use Backend;
use System\Classes\PluginBase;

/**
 * Arrival Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
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

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'App\Arrival\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {

        return [
            'app.arrival.some_permission' => [
                'tab' => 'Arrival',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
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
