<?php

class HtmlFormatter
{
    /**
     * Outputs results to HTML
     *
     * @param $object
     */
    public function output($object)
    {
        $class = get_class($object);

        switch ($class) {
            case 'AvgLaadTijd':
                $array = $object->getAvgLaadTijd();
                echo sprintf('<p>De gemiddelde laadtijd van items die meer dan <bold>%d</bold> geheugen gebruiken is <bold>%s</bold></p>', $array['geheugen'], $array['laadtijd'] / $array['aantal']);
                break;
            case 'MeerDanLaadTijd':
                $array = $object->getMeerDanLaadTijd();
                echo sprintf('<p><bold>%s</bold> requests hebben meer dan <bold>%s</bold> laadtijd nodig</p>', $array['aantal'], $array['laadtijd']);
                break;
            case 'HoogsteMemUse':
                $array = $object->getHoogsteMemUse();
                echo sprintf('<p>Het request met de hoogste memory heeft <bold>%s</bold> laadtijd, <bold>%s</bold> geheugen, en route <bold>\'%s\'</bold></p>', $array['laadtijd'], $array['geheugen'], $array['route']);
                break;
            default:
                break;
        }
    }
}