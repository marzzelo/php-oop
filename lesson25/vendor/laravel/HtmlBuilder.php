<?php

namespace Laravel;

/**
 * @method success(string $string)
 */
class HtmlBuilder
{
    use Macroable;

    public function hr(): string
    {
        return "<hr>";
    }

    /** generar HTML... **/
}












