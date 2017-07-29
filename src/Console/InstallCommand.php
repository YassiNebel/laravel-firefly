<?php

namespace Bitporch\Firefly\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'firefly:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install firefly and initial setup';

    /**
     * Policies that need to be converted.
     *
     * @var array
     */
    protected $policies = [
        'discussion-policy.stub' => 'DiscussionPolicy.php',
        'group-policy.stub'      => 'GroupPolicy.php',
        'post-policy.stub'       => 'PostPolicy.php',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!is_dir(app_path('Policies'))) {
            mkdir(app_path('Policies'), 0755, true);
            $this->info('Policy directory created', 'vv');
        }

        foreach ($this->policies as $key => $value) {
            copy(
                __DIR__.'/stubs/'.$key,
                app_path('Policies/'.$value)
            );
            $this->info(sprintf('Policy %s created', $value), 'vv');
        }
        $this->info('Firefly installed.');
    }
}
