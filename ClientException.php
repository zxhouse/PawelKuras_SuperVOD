<?php

declare(strict_types=1);

/*
 * Kick Ass Subtitles source code file
 *
 * @link      https://kickasssubtitles.com
 * @copyright Copyright (c) 2016-2018
 * @author    grzesw <contact@kickasssubtitles.com>
 */

namespace KickAssSubtitles\OpenSubtitles;

use Exception;

class ClientException extends Exception
{
    const ERR_MISSING_EXTENSION = 'Missing xmlrpc extension';

    const ERR_MISSING_USERNAME_PASSWORD = 'Missing username or password';

    const ERR_INVALID_RESPONSE_STATUS = 'Invalid response status';
}
