<?php

namespace App\Listeners;

use App\Events\AccesUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use Carbon;

class LogAccessListeners
{
    /**
     * Handle user login events.
     */
    public function onLogin($model)
    {
        Log::info('Usuario entrou do sistema:  ' . get_class($model));
    }

    /**
     * Handle user logout events.
     */
    public function onLogout($model)
    {
        Log::info('Usuario saiu do sistema: ' . get_class($model));
    }


    /**
     * @param $model
     */
    public function onQueryExec($model)
    {
        /**
        //echo "onQueryExec ";
        //dd($model);
        **/
    }

    /**
     * @param $model
     */
    public function onEloquent($model)
    {
        $model::updating(function ($user) {
            $mytime = Carbon\Carbon::now();
            echo "updating" . $mytime->toDateTimeString();
            //var_dump($user);
        });
        $model::saving(function ($user) {
            $mytime = Carbon\Carbon::now();
            echo "saving " . $mytime->toDateTimeString();
            //var_dump($user);
        });

        $model::saved(function ($user) {
            $mytime = Carbon\Carbon::now();
            echo "save" . $mytime->toDateTimeString();
            //var_dump($user);
        });

    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('Illuminate\Auth\Events\Login', self::class . '@onLogin');
        $events->listen('Illuminate\Auth\Events\Logout', self::class . '@onLogout');
        //query execult
        $events->listen('Illuminate\Database\Events\QueryExecuted', self::class . '@onQueryExec');
        $events->listen('eloquent.*', self::class . '@onEloquent');

        //Illuminate\Database\Events\TransactionBeginning
        //Illuminate\Database\Events\TransactionCommitted
        //Illuminate\Database\Events\TransactionRolledBack


    }
}
