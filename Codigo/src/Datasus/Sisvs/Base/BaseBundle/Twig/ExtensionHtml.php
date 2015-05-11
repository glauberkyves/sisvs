<?php
/**
 * Created by PhpStorm.
 * User: Glauber
 * Date: 06/12/13
 * Time: 10:59
 */

namespace Datasus\Sisvs\Base\BaseBundle\Twig;

class ExtensionHtml extends \Twig_Extension
{
    protected $url = array(), $group = array(), $startGroup, $nameGroup;

    public function newInstance()
    {
        return new self;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('buttonGroup', array($this, 'buttonGroup')),
            new \Twig_SimpleFilter('tagUrl', array($this, 'tagUrl')),
        );
    }

    public function buttonGroup(array $tag, $icon = 'icon-list-alt')
    {
        $id  = 'menu_' . rand(0, 99);
        $div = "<a data-toggle=\"dropdown\" class=\"btn btn-mini dropdown-toggle\" href=\"{$id}\" >";
        $div .= "<span class=\"{$icon}\"></span>";
        $div .= "</a><ul aria-labelledby=\"{$id}\" role=\"menu\" class=\"dropdown-menu nav\" id=\"{$id}\" >";

        foreach ($tag as $value) {
            $div .= "<li>{$value}</li>";
        }

        $div .= '</ul>';

        return $div;
    }

    public function render()
    {
        $html = '<div class="btn-group">'
            . '<ul role="navigation" class="nav nav-pills">';

        foreach ($this->url as $value) {
            $html .= "<li>{$value}</li>";
        }

        foreach ($this->group as $key => $group) {
            $icon = $this->getIcon($key);

            $html .= '<li><a data-toggle="dropdown" class=" dropdown-toggle btn btn-mini" role="button" href="#" id="drop1">';
            $html .= "<span class=\"{$icon}\"></span>";
            $html .= '</a><ul aria-labelledby="drop1" role="menu" class="dropdown-menu">';

            foreach ($group as $value) {
                $tag = str_replace('btn btn-mini', '', $value);
                $html .= "<li>{$tag}</li>";

            }

            $html .= '</ul></li>';
        }

        return $html;
    }

    protected function getIcon($icon)
    {
        $arrIcons = array(
            ''         => '',
            'edit'     => 'icon-pencil',
            'view'     => 'icon-eye-open',
            'active'   => 'icon-lock',
            'inactive' => 'icon-resize-full',
            'bind'     => 'icon-share-alt',
            'download' => 'icon-download',
            'file'     => 'icon-file',
            'time'     => 'icon-time',
            'check'    => 'icon-check',
            'share'    => 'icon-share',
            'up'       => 'icon-arrow-up',
            'down'     => 'icon-arrow-down',
            'remove'   => 'icon-remove',
            'enviar'   => 'icon-barcode'
        );

        return $arrIcons[$icon];
    }

    /**
     * @param array  $tagAttrs
     * @param string $icon
     *
     * @return $this
     */
    public function url(array $tagAttrs = array(), $icon = '')
    {
        $url   = "<a ";
        $icon  = $this->getIcon($icon);
        $value = "<span class=\"{$icon}\"></span>";
        $attrs = '';
        foreach ($tagAttrs as $key => $val) {
            if ($key == 'value') {
                $value = $val;
                continue;
            }

            $attrs .= $key . '="' . $val . '" ';
        }

        if (false === strpos('class', $attrs)) {
            $attrs .= 'class="btn btn-mini" ';
        } else {
            $attrs = str_replace('class="', '"class="btn btn-mini ', $attrs);
        }

        $url .= $attrs . '>';
        $url .= $value;
        $url .= "</a>";

        if ($this->startGroup) {
            $this->group[$this->nameGroup][] = $url;
        } else {
            $this->url[] = $url;
        }

        return $this;
    }

    public function startGroup($name)
    {
        $this->startGroup = true;
        $this->nameGroup  = $name;

        return $this;
    }

    public function endGroup()
    {
        $this->startGroup = false;

        return $this;
    }

    public function getName()
    {
        return 'extension_html';
    }
}