<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\VisitorPage;
use Illuminate\Support\Facades\Log;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $ipAddress = $request->ip();
            $userAgent = $request->header('User-Agent');
            $pageUrl = $request->fullUrl();
            $referrer = $request->headers->get('referer', 'Direct Visit');

            // Get Device, Browser & OS
            $device = $this->getDeviceType($userAgent);
            $browser = $this->getBrowser($userAgent);
            $os = $this->getOS($userAgent);

            // Get Geo Location
            $location = $this->getGeoLocation($ipAddress);

            // Extracting location data safely
            $geoData = [
                'country'       => $location['country'] ?? 'Unknown',
                'country_code'  => $location['countryCode'] ?? null,
                'region'        => $location['region'] ?? null,
                'region_name'   => $location['regionName'] ?? null,
                'city'          => $location['city'] ?? 'Unknown',
                'zip'           => $location['zip'] ?? null,
                'latitude'      => $location['lat'] ?? null,
                'longitude'     => $location['lon'] ?? null,
                'timezone'      => $location['timezone'] ?? null,
                'isp'           => $location['isp'] ?? null,
                'organization'  => $location['org'] ?? null,
            ];

            // Check if visitor exists
            $visitor = Visitor::where('ip_address', $ipAddress)
                ->where('device', $device)
                ->where('browser', $browser)
                ->first();

            if ($visitor) {
                $visitor->increment('visit_count');
            } else {
                $visitor = Visitor::create(array_merge([
                    'ip_address' => $ipAddress,
                    'device' => $device,
                    'device_type' => $device,
                    'browser' => $browser,
                    'os' => $os,
                    'user_agent' => $userAgent,
                    'visit_count' => 1,
                ], $geoData));
            }

            // Store page visit
            VisitorPage::create([
                'visitor_id' => $visitor->id,
                'page_url' => $pageUrl,
                'referrer' => $referrer,
            ]);
        } catch (\Exception $e) {
            Log::error("Visitor Tracking Error: " . $e->getMessage(), [
                'ip' => $request->ip(),
                'user_agent' => $request->header('User-Agent')
            ]);
        }

        return $next($request);
    }

    private function getDeviceType($userAgent)
    {
        if (stripos($userAgent, 'mobile') !== false) {
            return 'Mobile';
        } elseif (stripos($userAgent, 'tablet') !== false) {
            return 'Tablet';
        }
        return 'Desktop';
    }

    private function getBrowser($userAgent)
    {
        if (strpos($userAgent, 'Chrome') !== false) return 'Chrome';
        if (strpos($userAgent, 'Firefox') !== false) return 'Firefox';
        if (strpos($userAgent, 'Safari') !== false) return 'Safari';
        if (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) return 'Internet Explorer';
        return 'Unknown';
    }

    private function getOS($userAgent)
    {
        if (strpos($userAgent, 'Windows') !== false) return 'Windows';
        if (strpos($userAgent, 'Mac') !== false) return 'MacOS';
        if (strpos($userAgent, 'Linux') !== false) return 'Linux';
        if (strpos($userAgent, 'Android') !== false) return 'Android';
        if (strpos($userAgent, 'iPhone') !== false || strpos($userAgent, 'iPad') !== false) return 'iOS';
        return 'Unknown';
    }

    private function getGeoLocation($ip)
    {
        try {
            $response = file_get_contents("http://ip-api.com/json/{$ip}");
            $data = json_decode($response, true);
            return $data ?? [];
        } catch (\Exception $e) {
            Log::error("GeoLocation API Error: " . $e->getMessage());
            return [];
        }
    }
}
