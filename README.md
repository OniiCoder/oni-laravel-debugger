# oni-laravel-debugger

OniLaravelDebugger is a Composer package designed to provide custom debugging functionality for Laravel projects. It allows you to log debug data in a structured and customizable way.

You can install OniLaravelDebugger via Composer. Run the following command in your Laravel project directory:

```bash
composer require oniicoder/oni-laravel-debugger
```

Add to your config/app.php providers array:

```
[
    ...
    'providers' => [
        ...
        \OniiCoder\OniDebugger\OniLaravelDebuggerServiceProvider::class,
        ...
    ]
]
```

After insalling, from your project directory; run:

```bash
php artisan oni:debugger
```

This will show you a live debug console.

To use, in your code:

```php
oni($variable1, $variable2);
```
