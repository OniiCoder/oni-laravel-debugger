# oni-laravel-debugger

OniLaravelDebugger is a Composer package designed to provide custom debugging functionality for Laravel projects. It allows you to log debug data in a structured and customizable way.

You can install MyDebugger via Composer. Run the following command in your Laravel project directory:

```bash
composer require your-username/my-debugger
```
After insalling, from your project directory; run:
```bash
tail -f storage/logs/debug.log
```
This will show you a live debug console.

To use, in your code:
```php
oni($variable1, $variable2);
```
