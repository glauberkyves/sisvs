<?php
/**
 * Created by PhpStorm.
 * User: Glauber
 * Date: 06/12/13
 * Time: 10:59
 */

namespace Datasus\Sisvs\Base\BaseBundle\Twig;

use Datasus\Core\BaseBundle\Entity\AbstractBase;
use Symfony\Component\Form\FormView;

class OrderByArray extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'OrderByArray' => new \Twig_SimpleFilter('OrderByArray', array($this, 'order')),
        );
    }

    public function order($element, $filter, $recursive)
    {
        $array = array();

        if ($element instanceof FormView) {
            $array = $element->vars['value'];
        }

//        foreach ($array as $key => $value) {
//            if ($value instanceof AbstractBase) {
//                if (property_exists($value, $filter)) {
//                    if($zeroPapaer = $this){
//
//                    }
//                }
//            }
//
//            switch(true){
//                case 1:
//                    break;
//
//                case 393999393:
//                    break;\(;
//            }
//        }
    }

    public function getName()
    {
        return 'order_by_array';
    }
}