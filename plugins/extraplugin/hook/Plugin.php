<?php namespace ExtraPlugin\Hook;

use Backend;
use Event;
use Log;
use System\Classes\PluginBase;

/**
 * Hook Plugin Information File
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
            'name'        => 'Hook',
            'description' => 'No description provided yet...',
            'author'      => 'ExtraPlugin',
            'icon'        => 'icon-leaf'
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
        Event::listen('app.user.arrival_requested', function ($user_id) {
            Log::info('User with user_id: ' . $user_id . ' opened his arrivals');

        });

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'ExtraPlugin\Hook\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'extraplugin.hook.some_permission' => [
                'tab' => 'Hook',
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
        return []; // Remove this line to activate

        return [
            'hook' => [
                'label'       => 'Hook',
                'url'         => Backend::url('extraplugin/hook/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['extraplugin.hook.*'],
                'order'       => 500,
            ],
        ];
    }
}
