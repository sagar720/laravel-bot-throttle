<?php

return [
    'throttle' => [
        // Lower max attempts or increase decay_minutes for stricter rate limiting
        'max_attempts' => 50,
        'decay_minutes' => 2,
    ],
    'bot_detection' => [
        'user_agents' => [
            // Comprehensive blacklist: common bots, scrapers, and automation tools (case-insensitive partial match)
            'curl', 'python', 'bot', 'spider', 'crawler', 'wget', 'httpclient', 'scrapy', 'axios',
            'java', 'php', 'ruby', 'perl', 'go-http-client', 'jakarta', 'libwww', 'http_request2',
            'guzzlehttp', 'python-requests', 'okhttp', 'phantomjs', 'headless', 'headlesschrome',
            'slackbot', 'discordbot', 'telegrambot', 'feedfetcher', 'cloudflare', 'sitechecker',
            'dotbot', 'rogerbot', 'uptimerobot', 'tweetmemebot', 'embedly', 'facebookexternalhit',
            'facebot', 'yahoo', 'yandex', 'bingbot', 'msnbot', 'baiduspider', 'sogou', 'duckduckbot',
            'semrush', 'mj12bot', 'ahrefsbot', 'petalbot', 'semrushbot', 'seznambot', 'bingpreview',
            'exabot', 'proximic', 'gigabot', 'screaming frog', 'siteauditbot', 'qwantify', 'seokicks',
            'siteliner', 'linkpadbot', 'spbot', 'adsbot', 'applebot', 'archive', 'coccoc', 'datagnionbot',
            'feedly', 'googlebot', 'mediapartners-google', 'googlebot-image', 'googlebot-news',
            'googlebot-video', 'mail.ru', 'magpie-crawler', 'netcraftsurveyagent', 'nimbostratus-bot',
            'panscient', 'piplbot', 'smtbot', 'trendictionbot', 'turnitinbot', 'woobot', 'zombiebot',
            'python-urllib', 'node-fetch', 'aiohttp', 'requests', 'winhttp', 'appengine-google',
            'whatsapp', 'telegram', 'skypeuripreview', 'discord', 'redditbot', 'pinterest', 'vkshare',
            'linkedinbot', 'scraper', 'scanner', 'fetch', 'extractor', 'harvest', 'nutch', 'httrack',
            'mechanize', 'masscan', 'nikto', 'wpscan', 'acunetix', 'netsparker', 'dirbuster', 'fuzzer',
            'test', 'httpx', 'zeus', 'xenu', 'CopyRightCheck', 'TurnitinBot', 'WebDataStats', 'BLEXBot',
            'Bytespider', 'Riddler', 'DataForSeoBot', 'YandexBot', 'CensysInspect', 'webprosbot',
            'DuckDuckBot', '360Spider', 'MegaIndex', 'sitebot', 'snoopy', 'apache-httpclient',
            // Add your own organization-specific or project-specific bots here
        ],
        // Example: block known malicious or cloud IPs (fill as needed)
        'ip_blacklist' => [
            // '1.2.3.4', '5.6.7.8'
        ],
        'log_bots' => true,
        // Optionally add more strict behavior
        'strict_mode' => true, // Custom key for stricter checks in your logic
    ],
    'advanced' => [
        'log_all_bots' => true,
        'ban_duration_minutes' => 180, // Ban for 3 hours on violation
        'block_response_code' => 429,   // Use 429 Too Many Requests to indicate rate limit/bot block
        'allow_whitelist_ips' => true,
        'whitelist_ips' => [
            '127.0.0.1',   // localhost
            // Add trusted office IPs or CDN IPs here
        ],
        'notify_admin_on_block' => true, // Custom: trigger notification on bot block/ban
    ],
    'log_channel' => [
        'botthrottle' => [
            'driver' => 'single',
            'path' => storage_path('logs/botthrottle.log'),
            'level' => 'warning',
        ],
        // Optionally add Slack, email, or other log channels here
    ],
    'response_messages' => [
        'blocked' => 'Access denied. If you believe this is an error, contact support.',
        'rate_limited' => 'Too many requests. Please try again later.',
    ],
];
