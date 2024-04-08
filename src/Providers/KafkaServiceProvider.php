<?php

namespace Pqe\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Pqe\Admin\Kafka\PqeConsumer;
use Pqe\Admin\Kafka\PqeProducer;

class KafkaServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PqeConsumer::class, function () {
            return new PqeConsumer();
        });

        $this->app->singleton(PqeProducer::class, function () {
            return new PqeProducer();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
