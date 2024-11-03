<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class DetectDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $agent = new Agent();
        $device = $this->getDeviceInfo($agent);

        $request->attributes->set('device', $device);

        return $next($request);
    }

    private function getDeviceInfo(Agent $agent)
    {
        if ($agent->isMobile()) {
            $platform = $agent->platform();
            $device = $agent->device();

            if ($platform === 'Android') {
                return "Android Device: $device";
            } elseif ($platform === 'iOS') {
                return "iOS Device: $device";
            }
            return "Mobile Device: $platform";
        }

        if ($agent->isTablet()) {
            return 'Tablet';
        }

        if ($agent->isDesktop()) {
            return 'Desktop (' . $agent->platform() . ')';
        }

        return 'Unknown Device';
    }
}
