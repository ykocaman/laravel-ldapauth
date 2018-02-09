# laravel-ldapauth

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This is LDAP authentication package for **Laravel 5.5**


## Install

1- Via Composer

``` bash
$ composer require ykocaman/laravel-ldapauth
```

2- After installing, copy config and migration file to root.

``` bash
$ php artisan vendor:publish
```

3- Run migrate function

``` bash
$ php artisan migrate
```

4- For ldap connection parameters, edit `app/config/ldapauth.php` or add to `.env` (there is an example .env in config directory)

5- Set `driver` of provider from `eloquent` to `ldap` at `app/config/auth.php` (line 69)

```
67.  'providers' => [
68.      'users' => [
69.        'driver' => 'ldap',
70.        'model' => App\User::class,
71.    ],
```
6- That's all.

Note: You can change `login_type` of any user which you want to `normal` for standart login at `users` table in database.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

If you discover any security related issues, please email yusuf.kocaman@msn.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ykocaman/laravel-ldapauth.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ykocaman/laravel-ldapauth.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ykocaman/laravel-ldapauth
[link-downloads]: https://packagist.org/packages/ykocaman/laravel-ldapauth
[link-author]: https://github.com/ykocaman
