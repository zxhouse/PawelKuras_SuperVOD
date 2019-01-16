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

class ApiResponse
{
    /**
     * Response array.
     *
     * @var array
     */
    protected $response;

    /**
     * Method.
     *
     * @var string
     */
    protected $method;

    /**
     * Constructor.
     *
     * @param string $method
     * @param array  $response
     */
    public function __construct(string $method, array $response)
    {
        $this->method = $method;
        $this->response = $response;
    }

    /**
     * Return response as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->response;
    }
}
