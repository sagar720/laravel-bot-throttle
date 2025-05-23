# Laravel Bot Throttle by Sagar KC

**Laravel Bot Throttle** is an advanced middleware package for Laravel to detect and block bots, throttle abuse, and protect your routes. Developed and maintained by **Sagar KC**

---

## 🚀 Features

- 🛡️ Detects bots based on User-Agent patterns
- ⛔ Temporarily bans malicious IPs via cache
- 📈 Logs bot activity to a dedicated log file (`botthrottle.log`)
- 🔄 Customizable request throttling per IP and route
- ⚙️ IP whitelisting and block control
- 🧩 Fully configurable via `config/botthrottle.php`

---

## 📦 Installation

```bash
composer require sagarkc/laravel-bot-throttle
```

---

## 🛠️ Publish the Config File

```bash
php artisan vendor:publish --provider="BotThrottle\BotThrottleServiceProvider"
```

This will publish `config/botthrottle.php` which allows full customization, you can add the list of bots as per your need.

---

## 📝 Optional: Enable Custom Bot Log File

To log bot activity in a separate file (`storage/logs/botthrottle.log`), add the following line to the `channels` array in your `config/logging.php` file:

```php
'channels' => array_merge(config('logging.channels'), config('botthrottle.log_channel')),
```

This merges the custom `botthrottle` log channel defined in `config/botthrottle.php` into Laravel's logging system.

> After this, all blocked bots will be logged in `botthrottle.log` instead of the default `laravel.log`.

---

## 🧪 Usage

Apply middleware to your routes:

```php
Route::middleware(['detect.bot', 'throttle.bot'])->group(function () {
    Route::get('/api/data', 'ApiController@getData');
});
```

---

## ⚙️ Configuration Example

```php
return [
    'throttle' => [
        'max_attempts' => 100,
        'decay_minutes' => 1,
    ],
    'bot_detection' => [
        'user_agents' => [
            'curl', 'python', 'bot', 'spider', 'crawler', 'wget', 'httpclient', 'scrapy', 'axios'
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
```

---

## 📊 View Blocked IPs (Programmatically)

```php
use BotThrottle\BotLog;

$blockedIps = BotLog::getBlockedIps();
```

---

## 📄 License

MIT © [Sagar KC](https://sagarkc.com.np)

---

## 🙌 Contributing

Pull requests and issues are welcome. Please fork the repository and open a PR with improvements or bug fixes.
