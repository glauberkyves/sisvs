<?php
/**
 * Created by PhpStorm.
 * User: Glauber
 * Date: 06/12/13
 * Time: 10:59
 */

namespace Datasus\Sisvs\Base\BaseBundle\Twig;

class BaseExtension extends \Twig_Extension
{
    public function newInstance()
    {
        return new self;
    }

    public function getFilters()
    {
        return array();
    }

    public function getName()
    {
        return 'base_extension';
    }


}