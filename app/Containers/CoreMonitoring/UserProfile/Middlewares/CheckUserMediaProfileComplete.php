<?php

namespace App\Containers\CoreMonitoring\UserProfile\Middlewares;

use App\Ship\Parents\Middlewares\Middleware as ParentMiddleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserMediaProfileComplete extends ParentMiddleware
{
    public function handle(Request $request, \Closure $next, string|null ...$guards): Response|RedirectResponse|null
    {
        $user = Auth::guard('external')->user();
        $profile = $user->profile_data;

        // General
        if(empty($profile->name) || empty($profile->business_name) || empty($profile->nit) || empty($profile->rep_full_name) ||
            empty($profile->rep_document) || empty($profile->rep_exp)) {
            $request->session()->flash('validation_profile', true);
            return redirect()->route('ext_admin_media_profile_general_data_show');
        }

        if(empty($profile->type) || empty($profile->coverage) || empty($profile->scope)) {
            $request->session()->flash('validation_profile', true);
            return redirect()->route('ext_admin_media_profile_category_data_show');
        }
        if(($profile->scope === 'Nacional' && empty($profile->scope_department)) ||
            ($profile->scope === 'Departamental' && empty($profile->scope_department)) ||
            ($profile->scope === 'Municipal' && empty($profile->scope_municipality))) {
            $request->session()->flash('validation_profile', true);
            return redirect()->route('ext_admin_media_profile_category_data_show');
        }

        if(empty($profile->legal_address) || empty($profile->cellphone)) {
            $request->session()->flash('validation_profile', true);
            return redirect()->route('ext_admin_media_profile_contact_data_show');
        }

        if(empty($profile->file_rep_document) || empty($profile->file_nit)) { //empty($profile->file_power_attorney)
            $request->session()->flash('validation_profile', true);
            return redirect()->route('ext_admin_media_profile_file_data_show');
        }

        return $next($request);
    }
}
