<p align="center"><img src="https://laravel.com/assets/img/components/logo-sanctum.svg"></p>

<p align="center">
<a href="https://github.com/laravel/sanctum/actions"><img src="https://github.com/laravel/sanctum/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/sanctum"><img src="https://img.shields.io/packagist/dt/laravel/sanctum" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/sanctum"><img src="https://img.shields.io/packagist/v/laravel/sanctum" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/sanctum"><img src="https://img.shields.io/packagist/l/laravel/sanctum" alt="License"></a>
</p>

## Introduction

Laravel Sanctum provides a featherweight authentication system for SPAs and simple APIs.

## Official Documentation

Documentation for Sanctum can be found on the [Laravel website](https://laravel.com/docs/sanctum).

## installation steps

<ul>
     <li> run in command line <code> composer require laravel/sanctum </code> </li>
     <li> run in command line <code> php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider" </code> </li>
     <li> run in command line <code> php artisan migrate </code> </li>
     <li>
        <p>
             Next, if you plan to utilize Sanctum to authenticate an SPA, you should add Sanctum's middleware to your api middleware group within your application's app/Http/Kernel.php file:
        </p>
        <code>
                 'api' => [
                             \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
                             'throttle:api',
                              \Illuminate\Routing\Middleware\SubstituteBindings::class,
                          ],
        </code>
     </li>
     <li>
         in the user model add : "use HasApiTokens" trait
         <code>
               class User extends Authenticatable
                       {
                             use HasApiTokens, HasFactory, Notifiable;
                       }
          </code>
     </li>
</ul>

## Info
<p> to protect routes use the 'auth:sanctum' middleware :
<code>
   Route::middleware('auth:sanctum')
</code>
 </p>
<p> for a pre config copy the Auth routes/controller directories </p>
