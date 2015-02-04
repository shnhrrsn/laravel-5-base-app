# Laravel 5 Base App

Mainly based on the standard L5 app, with a few changes:

* DotEnv was removed in favor of L4 style folder config
* Restored Whoops as the error handler
* Restored L4 style env detection callback function via `App\Bootstrap\DetectEnvironment`
* Added back in `illuminate/html` and related service providers
* Removed most of the boilerplate code
* Removed elixir/gulp in favor of `shnhrrsn/laravel-assets`
