<?php

namespace BotThrottle\Middleware;

use Illuminate\Routing\Middleware\ThrottleRequests as BaseThrottle;

class ThrottleRequests extends BaseThrottle
{
    protected function resolveRequestSignature($request)
    {
        return sha1(
            $request->method().
            '|'.$request->ip().
            '|'.$request->path()
        );
    }
}