<?php


namespace Slvler\Ether;

use Illuminate\Support\ServiceProvider;

class EtherServiceProvider extends ServiceProvider{


    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishResources();
        }

    }

    protected function publishResources()
    {
        $this->publishes([
            __DIR__ . '/../config/etherscan.php' => config_path('etherscan.php'),
        ], 'ether');
    }

}