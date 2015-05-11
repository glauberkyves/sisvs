<?php

/* DatasusSisvsExpoEpiAdministrativoBundle::base.html.twig */
class __TwigTemplate_ed36dc26691aedc1ef1f0904e856de31ea43a970becbd9ff0a931328dba6c13f extends Twig_Template
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
        echo $this->env->getExtension('knp_menu')->render("DatasusSisvsExpoEpiAdministrativoBundle:MenuBuilder:menu");
        echo "
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAdministrativoBundle::base.html.twig";
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
