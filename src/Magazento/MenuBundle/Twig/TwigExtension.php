<?php

namespace Magazento\MenuBundle\Twig;


class TwigExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'date' => new \Twig_Filter_Method($this, 'dateFilter'),
        );
    }

    public function dateFilter($time)
    {
        
        $date = date("F j, Y",$time->__toString());
        return $date;
    }

    public function getName()
    {
        return 'twig_extension';
    }
}