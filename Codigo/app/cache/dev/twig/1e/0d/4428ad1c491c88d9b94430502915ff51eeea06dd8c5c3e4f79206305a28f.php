<?php

/* DatasusSisvsExpoEpiAcompanhamentoBundle::base.html.twig */
class __TwigTemplate_1e0d4428ad1c491c88d9b94430502915ff51eeea06dd8c5c3e4f79206305a28f extends Twig_Template
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
        echo $this->env->getExtension('knp_menu')->render("DatasusSisvsExpoEpiAcompanhamentoBundle:MenuBuilder:menu");
        echo "
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAcompanhamentoBundle::base.html.twig";
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
