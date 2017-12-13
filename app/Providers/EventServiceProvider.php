<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen(['eloquent.creating: *'], function($model)
		{
			if(isset($model->created_by) && !is_null($model->created_by))
			{
		        $model->created_by = auth()->user()->username;
            }
            
            if(isset($model->updated_by) && !is_null($model->updated_by))
			{
		        $model->updated_by = auth()->user()->username;
			}
		});

		Event::listen(['eloquent.updating: *'], function($model)
		{
			if(isset($model->updated_by) && !is_null($model->updated_by))
			{
		        $model->updated_by = auth()->user()->username;
			}
		});
    }
}
