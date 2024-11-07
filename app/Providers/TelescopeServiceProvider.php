<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Telescope::night();

        $this->hideSensitiveRequestDetails();

        Telescope::tag(function (IncomingEntry $entry) {

            $tags = [];

            if ($entry->type === 'request') {

                $cp = explode("/", $entry->content["uri"]);

                if (!empty($cp[0]) && $cp[0] == "api") {
                    $tags[] = "api";
                    if (!empty($cp[1])) {
                        $tags[] = $cp[1];
                    }
                }

            }

            return $tags;

        });


        Telescope::filter(function (IncomingEntry $entry) {

            if ($this->app->environment('local') || $this->app->environment('testing')) {
                return true;
            }

            return $entry->isReportableException() ||
                   $entry->isFailedRequest() ||
                   $entry->isFailedJob() ||
                   $entry->isScheduledTask() ||
                   $entry->hasMonitoredTag();
        });
    }

    /**
     * Prevent sensitive request details from being logged by Telescope.
     *
     * @return void
     */
    protected function hideSensitiveRequestDetails()
    {
        if ($this->app->environment('local')) {
            return;
        }

        Telescope::hideRequestParameters(['_token']);

        Telescope::hideRequestHeaders([
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
        ]);
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewTelescope', function ($user, Request $request) {

            if ($request->t !== 'lsdgiUYTEkgd87634gKJHGD76934gkgmahgdQy27930gauyeirkatytfree') {
                return false;
            }

            return in_array($user->email, [
                //
            ]);
        });
    }
}
