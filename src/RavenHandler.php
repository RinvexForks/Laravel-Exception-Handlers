<?php

/*
 * This file is part of Laravel Exception Handlers.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\ExceptionHandlers;

use Exception;
use Raven_Client;

abstract class RavenHandler extends Handler
{
    /**
     * @param Exception $e
     */
    public function report(Exception $e)
    {
        $client = new Raven_Client(env('RAVEN_DSN'));

        $client->captureException($e);

        return parent::report($e);
    }
}
