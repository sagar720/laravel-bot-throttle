<?php

return [
    'throttle' => [
        'max_attempts' => 100,
        'decay_minutes' => 1,
    ],
    'bot_detection' => [
        'user_agents' => [
            'curl', 'python', 'bot', 'spider', 'crawler', 'wget', 'httpclient', 'scrapy', 'axios',
            'java', 'php', 'ruby', 'perl', 'go-http-client', 'jakarta', 'libwww', 'http_request2',
            'guzzlehttp', 'python-requests', 'okhttp', 'phantomjs', 'headless', 'headlesschrome',
            'slackbot', 'discordbot', 'telegrambot', 'feedfetcher', 'cloudflare', 'sitechecker',
            'dotbot', 'rogerbot', 'uptimerobot', 'tweetmemebot', 'embedly',
        ],
        'ip_blacklist' => [],
        'log_bots' => true,
    ],
    'advanced' => [
        'log_all_bots' => true,
        'ban_duration_minutes' => 60,
        'block_response_code' => 403,
        'allow_whitelist_ips' => true,
        'whitelist_ips' => ['127.0.0.1'],
    ],
    'log_channel' => [
        'botthrottle' => [
            'driver' => 'single',
            'path' => storage_path('logs/botthrottle.log'),
            'level' => 'warning',
        ],
    ],
];