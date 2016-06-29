<?php

//--------------------------------------------------------------------------
// Application Error Logger
//--------------------------------------------------------------------------

Log::useFiles(storage_path() .DS .'Logs' .DS .'error.log');

//--------------------------------------------------------------------------
// Application Error Handler
//--------------------------------------------------------------------------

App::error(function(Exception $exception, $code, $fromConsole)
{
    Log::error($exception);

    if ($fromConsole) {
        return 'Error ' .$code .': ' .$e->getMessage()."\n";
    }

    //return '<h1>Error ' .$code .'</h1><p>' .$e->getMessage() .'</p>';
});

//--------------------------------------------------------------------------
// Application Missing Route Handler
//--------------------------------------------------------------------------

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

App::missing(function(NotFoundHttpException $exception)
{
    $status = $exception->getStatusCode();

    $headers = $exception->getHeaders();

    // Create the themed Error Page Response.
    $view = Template::make('default')
        ->shares('title', 'Error ' .$status)
        ->nest('content', 'Error/' .$status);

    return Response::make($view, $status, $headers);
});

//--------------------------------------------------------------------------
// Boot Stage Customization
//--------------------------------------------------------------------------

/**
 * Create a constant for the URL of the site.
 */
define('SITEURL', $app['config']['app.url']);

/**
 * Define relative base path.
 */
define('DIR', $app['config']['app.path']);

/**
 * Create a constant for the name of the site.
 */
define('SITETITLE', $app['config']['app.name']);

/**
 * Set a default language.
 */
define('LANGUAGE_CODE', $app['config']['app.locale']);

/**
 * Set the default template.
 */
define('TEMPLATE', $app['config']['app.template']);

/**
 * Set a Site administrator email address.
 */
define('SITEEMAIL', $app['config']['app.email']);

/**
 * Send a E-Mail to administrator (defined on SITEEMAIL) when a Error is logged.
 */
/*
use App\Extensions\Log\Mailer as LogMailer;

LogMailer::initHandler($app);
*/
