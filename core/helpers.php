<?php
/**
 * Custom global functions. Avoid over creating.
 *
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 10/23/16
 */

function redirect($uri)
{
    header('Location: /'.trim($uri, '/'));
//    return new Response($uri);
}

/**
 * @param $name
 * @param null $default
 * @return string|null
 */
function env($name, $default = null)
{
    return getenv($name) ?? $default;
}
