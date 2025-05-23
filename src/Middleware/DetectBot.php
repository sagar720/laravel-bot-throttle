<?php

namespace BotThrottle\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use BotThrottle\BotLog;

class DetectBot
{
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $ua = strtolower($request->header('User-Agent', ''));

        $whitelist = Config::get('botthrottle.advanced.whitelist_ips', []);
        if (Config::get('botthrottle.advanced.allow_whitelist_ips', true) && in_array($ip, $whitelist)) {
            return $next($request);
        }

        if (Cache::has("bot_banned:{$ip}")) {
            abort(Config::get('botthrottle.advanced.block_response_code', 403), 'Temporarily banned.');
        }

        $blacklist = Config::get('botthrottle.bot_detection.user_agents', []);
        foreach ($blacklist as $keyword) {
            if (strpos($ua, $keyword) !== false) {
                if (Config::get('botthrottle.bot_detection.log_bots', true)) {
                    Log::channel('botthrottle')->warning("Blocked bot IP {$ip} with UA: {$ua}");
                }
                BotLog::logBlockedIp($ip);
                Cache::put("bot_banned:{$ip}", true, now()->addMinutes(Config::get('botthrottle.advanced.ban_duration_minutes', 60)));
                abort(Config::get('botthrottle.advanced.block_response_code', 403), 'Bot activity detected.');
            }
        }

        return $next($request);
    }
}