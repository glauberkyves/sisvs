<?php

/* DatasusSisvsExpoEpiAutorBundle:Painel:create.html.twig */
class __TwigTemplate_41a22ac3c9d8f04d3d750667373daa0aceee6356ced54c8fc2db77131b7a06c5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DatasusSisvsExpoEpiAutorBundle::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DatasusSisvsExpoEpiAutorBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        $this->env->loadTemplate("DatasusSisvsExpoEpiAutorBundle:Painel:form.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAutorBundle:Painel:create.html.twig";
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
