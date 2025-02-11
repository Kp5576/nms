<?php

use App\Models\City;
use App\Models\Currency;
use App\Models\DoctorSession;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\PaymentGateway;
use App\Models\Setting;
use App\Models\State;
use App\Models\User;
use App\Models\ZoomOAuth;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Stripe\Stripe;


if (! function_exists('getDashboardURL')) {
    /**
     * @return string
     */
    function getDashboardURL()
    {
    
        if (Auth::user() !== null) {
            /** @var User $user */
            $user = Auth::user();
            if ($user->role_id === 1) {
                return 'admin';
            }
            if ($user->role_id === 2) {
                return 'customer';
            }
        }

        return RouteServiceProvider::HOME;
    }

    function randomGen($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
}

