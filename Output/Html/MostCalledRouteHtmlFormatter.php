<?php

namespace Output\Html;

use Output\OutputFormatter;
use Controllers\MostCalledRoute;

class MostCalledRouteHtmlFormatter implements OutputFormatter
{
    /**
     * Outputs results to plain text
     *
     * @param MostCalledRoute $object
     * @return string
     */
    public function output($object)
    {
        $array = $object->getMostCalledRoute();
        return sprintf('<p><b>%s</b> wordt met <b>%sx</b> het vaakst aangeroepen</p>', $array['route'], $array['count']);
    }

    public function match($object)
    {
        return $object instanceof MostCalledRoute;
    }
}
