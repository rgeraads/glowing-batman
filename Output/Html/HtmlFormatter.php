<?php

class HtmlFormatter implements OutputFormatter
{
    public $classes = array();

    public function __construct()
    {
        $this->classes = array(
            new AvgLoadTimeHtmlFormatter(),
            new HighestMemUseHtmlFormatter(),
            new MoreThanLoadTimeHtmlFormatter(),
            new UpperCase(new AvgLoadTimeHtmlFormatter()),
        );
    }

    /**
     * Outputs results to HTML
     *
     * @param $object
     */
    public function output($object)
    {
        foreach ($this->classes as $class) {
            if ($class->match($object) === true) {
                return $class->output($object);
            }
        };
    }

    public function match($object)
    {
        foreach ($this->classes as $class) {
            if ($class->match($object) === true) {
                return true;
            }
        }
    }
}