<?php namespace Waka\Scaffold;

use Backend;
use System\Classes\PluginBase;

/**
 * Scaffold Plugin Information File
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
            'name'        => 'Scaffold',
            'description' => 'No description provided yet...',
            'author'      => 'Waka',
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
        $this->registerConsoleCommand('waka.nestedmodel', 'Waka\Scaffold\Console\CreateNestedModel');
        $this->registerConsoleCommand('waka.injector', 'Waka\Scaffold\Console\CreateInjector');
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
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
        return []; // Remove this line to activate

        return [
            'Waka\Scaffold\Components\MyComponent' => 'myComponent',
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
            'waka.scaffold.some_permission' => [
                'tab' => 'Scaffold',
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
            'scaffold' => [
                'label'       => 'Scaffold',
                'url'         => Backend::url('waka/scaffold/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['waka.scaffold.*'],
                'order'       => 500,
            ],
        ];
    }
}
