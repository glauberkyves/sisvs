<?php

/* DatasusSisvsBaseSecurityBundle:Security:perfil.html.twig */
class __TwigTemplate_21796f1d2438b948b26aa0c005577ecbe59ce5d43f2e1ce3020157e553df9c8d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DatasusSisvsBaseBaseBundle::base.html.twig");

        $this->blocks = array(
            'detalhe_usuario_logado' => array($this, 'block_detalhe_usuario_logado'),
            'body' => array($this, 'block_body'),
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

    // line 3
    public function block_detalhe_usuario_logado($context, array $blocks = array())
    {
        // line 4
        echo "    <p>
        <span class=\"usuarioLogado\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "getNome", array()), "html", null, true);
        echo "</span> ";
        echo twig_escape_filter($this->env, (isset($context["version"]) ? $context["version"] : $this->getContext($context, "version")), "html", null, true);
        echo "
    </p>
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"box\">
        <strong class=\"title\">Selecionar Perfil</strong>

        <div class=\"formulario\">
            <form id=\"form\" method=\"post\">
                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"perfil\">Perfil:</label>

                    <div class=\"controls\">
                        <select class=\"span3 required\" id=\"perfil\" name=\"perfil\">
                            <option value=\"\">Selecione uma opção</option>
                            ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["arrPerfil"]) ? $context["arrPerfil"] : $this->getContext($context, "arrPerfil")));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 22
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "                        </select>
                    </div>
                </div>
                <div class=\"botao\">
                    <button type=\"submit\" class=\"buttonAzul margim\" id=\"pesquisar\">Selecionar</button>
                </div>
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsBaseSecurityBundle:Security:perfil.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 24,  64 => 22,  60 => 21,  47 => 10,  44 => 9,  35 => 5,  32 => 4,  29 => 3,);
    }
}
