<?php

namespace App\Http\Middleware;

use Closure;
use EasyWeChat\Factory;

class WeChatJSSDK
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('wechat.oauth_user')) {
            // Configuration to get the WeChat JSSDK
            $config = [
                'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID'),
                'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET'),
                'response_type' => 'array',
                'log' => [
                    'level' => 'debug',
                    'file' => __DIR__.'/../../../storage/logs/wechat.log',
                ],
            ];

            // Initialize WeChat
            $app = Factory::officialAccount($config);

            // Get JSSDK
            $jssdk = $app->jssdk->buildConfig(
                ['onMenuShareTimeline', 'onMenuShareAppMessage'],
                $request->route()->uri() == 'wechat-test',
                false,
                false
            );

            // Ensure the request gets the JSSDK value
            $request->attributes->add(['jssdk' => $jssdk]);
        }

        return $next($request);
    }
}
