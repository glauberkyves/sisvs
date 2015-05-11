<?php

/* DatasusSisvsExpoEpiAdministrativoBundle:Default:index.html.twig */
class __TwigTemplate_5987efbcd3219cbadd01b911dfd15e02303f7087d04358544b99bde665b66d97 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DatasusSisvsExpoEpiAdministrativoBundle::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DatasusSisvsExpoEpiAdministrativoBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"box\">
        <strong class=\"title\">Módulo Administrativo</strong>

        <div class=\"formulario\">
            <div class=\"padding\">
                <div class=\"span6\">
                    <h2>Olá ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "getNome", array()), "html", null, true);
        echo ".</h2>

                    <p>Seja Bem Vindo(a) ao sistema SIEPI. </p>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAdministrativoBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 10,  31 => 4,  28 => 3,);
    }
}
