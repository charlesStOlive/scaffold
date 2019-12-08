<?php namespace Waka\Scaffold\Console;

use October\Rain\Scaffold\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CreateNestedModel extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'waka:nestedmodel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new nested model.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * A mapping of stub to generated file.
     *
     * @var array
     */
    protected $stubs = [
        'nestedmodel/model.stub'        => 'models/{{studly_name}}.php',
        'nestedmodel/fields.stub'       => 'models/{{lower_name}}/fields.yaml',
        'nestedmodel/columns.stub'      => 'models/{{lower_name}}/columns.yaml',
        'nestedmodel/create_table.stub' => 'updates/create_{{snake_plural_name}}_table.php',
    ];

    /**
     * Prepare variables for stubs.
     *
     * return @array
     */
    protected function prepareVars()
    {
        $pluginCode = $this->argument('plugin');

        $parts = explode('.', $pluginCode);
        $plugin = array_pop($parts);
        $author = array_pop($parts);

        $model = $this->argument('model');

        return [
            'name' => $model,
            'author' => $author,
            'plugin' => $plugin
        ];
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['plugin', InputArgument::REQUIRED, 'The name of the plugin. Eg: RainLab.Blog'],
            ['model', InputArgument::REQUIRED, 'The name of the model. Eg: Post'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Overwrite existing files with generated ones.'],
        ];
    }
}
