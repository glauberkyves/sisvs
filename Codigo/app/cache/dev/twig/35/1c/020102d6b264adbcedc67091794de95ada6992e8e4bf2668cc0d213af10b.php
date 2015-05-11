<?php

/* DatasusSisvsExpoEpiAutorBundle::base.html.twig */
class __TwigTemplate_351c020102d6b264adbcedc67091794de95ada6992e8e4bf2668cc0d213af10b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DatasusSisvsBaseBaseBundle::base.html.twig");

        $this->blocks = array(
            'menu_sistema' => array($this, 'block_menu_sistema'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DatasusSisvsBaseBaseBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_menu_sistema($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        echo $this->env->getExtension('knp_menu')->render("DatasusSisvsExpoEpiAutorBundle:MenuBuilder:menu");
        echo "
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAutorBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,);
    }
}
