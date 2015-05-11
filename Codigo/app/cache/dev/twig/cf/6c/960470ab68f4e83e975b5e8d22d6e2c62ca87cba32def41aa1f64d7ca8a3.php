<?php

/* DatasusSisvsExpoEpiFormularioBundle::base.html.twig */
class __TwigTemplate_cf6c960470ab68f4e83e975b5e8d22d6e2c62ca87cba32def41aa1f64d7ca8a3 extends Twig_Template
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
        echo $this->env->getExtension('knp_menu')->render("DatasusSisvsExpoEpiFormularioBundle:MenuBuilder:menu");
        echo "
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiFormularioBundle::base.html.twig";
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
