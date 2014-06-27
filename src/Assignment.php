<?php

use Controllers\AvgLoadTime;
use Controllers\MoreThanLoadTime;
use Controllers\HighestMemUse;
use Controllers\MostCalledRoute;
use Controllers\RouteWithMostTime;
use Output\OutputFormatter;

/*
gegeven een array met daarin een lijst van 3 velden (laadtijd (float), geheugengebruik (int), route (string) ), lees de hele lijst door en bereken de volgende business requirements:

* avg load tijd van alle requests die meer dan 1000 memory gebruiken
* aantal requests dat meer dan 0.5 load tijd hebben
* naam van de vaakst aangeroepen route + aantal
* time, mem_use, route van het single request met de hoogste memory use
* route naam en totaal time, mem_use van de route die overall de meeste time gebruikt heeft
*/

class Assignment
{
    public $outputFormatter;

    public function __construct(OutputFormatter $outputFormatter)
    {
        $list = array(
            array(0.2, 500, 'routeA'),
            array(0.4, 300, 'routeA'),
            array(0.5, 3500, 'routeB'),
            array(0.7, 700, 'routeA'),
            array(0.1, 800, 'routeB'),
            array(0.1, 900, 'routeA'),
            array(0.1, 100, 'routeB'),
            array(0.05, 250, 'routeC'),
            array(1.2, 400, 'routeA'),
        );

        $avgLoadTime = new AvgLoadTime();
        $moreThanLoadTime = new MoreThanLoadTime();
        $highestMemUse = new HighestMemUse();
        $mostCalledRoute = new MostCalledRoute();
        $routeWithMostTime = new RouteWithMostTime();

        $avgLoadTime->calculateAvgLoadTime($list, 1000);
        $moreThanLoadTime->calculateMoreThanLoadTime($list, 0.5);
        $highestMemUse->calculateHighestMemUse($list);
        $mostCalledRoute->calculateMostCalledRoute($list);
        $routeWithMostTime->calculateRouteWithMostTime($list);

        echo $outputFormatter->output($avgLoadTime) . PHP_EOL;
        echo $outputFormatter->output($moreThanLoadTime) . PHP_EOL;
        echo $outputFormatter->output($highestMemUse) . PHP_EOL;
        echo $outputFormatter->output($mostCalledRoute) . PHP_EOL;
        echo $outputFormatter->output($routeWithMostTime) . PHP_EOL;
    }
}