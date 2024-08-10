<?php

namespace Modules\Common\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ViewCacheClear extends Command
{
    protected $signature = 'view:rm';

    protected $description = 'Force remove view caches.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $viewPath = storage_path('framework/views');

        File::cleanDirectory($viewPath);
    }
}
