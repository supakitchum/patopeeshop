<?php

namespace App\Http\Middleware;

use App\Partner;
use Closure;

class PartnerApi
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->header('x-api-key')) {
            return \response()->json([
                "code" => 1000,
                "message" => "Please Login."
            ], 401);
        }

        $api = Partner::where('partner_token', '=', $request->header('x-api-key'))
            ->first();

        if (!isset($api->id)) {
            return \response()->json([
                "code" => 1000,
                "message" => "Token Invalid."
            ], 401);
        }

        if (env('APP_ENV') !== 'local') {
            $ip = $request->header('CF-Connecting-IP');
            if ($api->ips !== $ip) {
                return \response()->json([
                    "code" => 2000,
                    "message" => "IP not allowed",
                    "ip" => $ip
                ], 403);
            }
        }

        $data = $request->all();
        $data["partner"] = $api;
        $request->replace($data);
        return $next($request);
    }
}
