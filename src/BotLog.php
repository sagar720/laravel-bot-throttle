<?php

namespace BotThrottle;

use Illuminate\Support\Facades\Cache;

class BotLog
{
    protected static $cacheKey = 'botthrottle:blocked_ips';

    public static function logBlockedIp($ip)
    {
        $blockedIps = Cache::get(self::$cacheKey, []);
        if (!in_array($ip, $blockedIps)) {
            $blockedIps[] = $ip;
            Cache::put(self::$cacheKey, $blockedIps, now()->addDays(1));
        }
    }

    public static function getBlockedIps()
    {
        return Cache::get(self::$cacheKey, []);
    }

    public static function clearBlockedIps()
    {
        Cache::forget(self::$cacheKey);
    }
}