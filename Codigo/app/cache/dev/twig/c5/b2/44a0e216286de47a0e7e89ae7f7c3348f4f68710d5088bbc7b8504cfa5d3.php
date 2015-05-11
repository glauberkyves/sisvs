<?php

/* DatasusSisvsExpoEpiAutorBundle:Painel:painel.html.twig */
class __TwigTemplate_c5b244a0e216286de47a0e7e89ae7f7c3348f4f68710d5088bbc7b8504cfa5d3 extends Twig_Template
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

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <strong class=\"title\">
            <span class=\"link-scpa\">
                <a href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["urlSCPA"]) ? $context["urlSCPA"] : $this->getContext($context, "urlSCPA")), "html", null, true);
        echo "\" target=\"_blank\">Alterar dados básicos</a>
            </span>
    </strong>

    <div class=\"formulario\">
        <div class=\"padding\">
            <div class=\"span6\">
                <h2>Olá ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "getNome", array()), "html", null, true);
        echo ".</h2>

                <p>Seja Bem Vindo(a) ao sistema SIEPI. </p>
            </div>
        </div>
    </div>

    <div class=\"formulario\">
        <div class=\"span10\">
            <div class=\"row-fluid\">
                ";
        // line 23
        if ((isset($context["evento"]) ? $context["evento"] : $this->getContext($context, "evento"))) {
            // line 24
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, $this->getAttribute((isset($context["evento"]) ? $context["evento"] : $this->getContext($context, "evento")), "getCoModalidade", array())));
            foreach ($context['_seq'] as $context["_key"] => $context["modalidade"]) {
                // line 25
                echo "                        ";
                if ($this->getAttribute($context["modalidade"], "getCoTipoModalidade", array())) {
                    // line 26
                    echo "                            ";
                    if (((($this->getAttribute($context["modalidade"], "getCoFormularioDeInscricao", array(), "method") && (twig_date_format_filter($this->env, "now", "Y-m-d") <= twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["modalidade"], "getCoFormularioDeInscricao", array(), "method"), "getDtFim", array(), "method"), "format", array(0 => "Y-m-d"), "method"), "Y-m-d"))) && (twig_date_format_filter($this->env, "now", "Y-m-d") >= twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["modalidade"], "getCoFormularioDeInscricao", array(), "method"), "getDtInicio", array(), "method"), "format", array(0 => "Y-m-d"), "method"), "Y-m-d"))) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["modalidade"], "getCoFormularioDeInscricao", array(), "method"), "getCoSituacaoFormulario", array(), "method"), "getDsSituacaoFormulario", array()) == "Publicado"))) {
                        // line 28
                        echo "                                <div class=\"span4 thumbnail\">
                                    <div class=\"caption\"><h2>";
                        // line 29
                        echo twig_escape_filter($this->env, $this->getAttribute($context["modalidade"], "getNoModalidade", array()), "html", null, true);
                        echo "</h2>

                                        <p>";
                        // line 31
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["modalidade"], "getCoTipoModalidade", array()), "getNoTipoModalidade", array()), "html", null, true);
                        echo "</p>
                                        ";
                        // line 32
                        if (twig_in_filter($this->getAttribute($context["modalidade"], "getCoSeqModalidade", array()), (isset($context["arrModalidade"]) ? $context["arrModalidade"] : $this->getContext($context, "arrModalidade")))) {
                            // line 33
                            echo "                                            <a class=\"btn btn-primary\"
                                               href=\"";
                            // line 34
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("autor_painel", array("coSeqModalidade" => $this->getAttribute($context["modalidade"], "getCoSeqModalidade", array()))), "html", null, true);
                            echo "\">
                                                Acessar »
                                            </a>
                                        ";
                        } else {
                            // line 38
                            echo "                                            <a class=\"btn btn-primary\"
                                               href=\"";
                            // line 39
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("autor_painel_create", array("coSeqModalidade" => $this->getAttribute($context["modalidade"], "getCoSeqModalidade", array()))), "html", null, true);
                            echo "\">
                                                Inscreva-se »
                                            </a>
                                        ";
                        }
                        // line 43
                        echo "                                    </div>
                                </div>
                            ";
                    } else {
                        // line 46
                        echo "                                <div class=\"span4 thumbnail\">
                                    <div class=\"caption\"><h2>";
                        // line 47
                        echo twig_escape_filter($this->env, $this->getAttribute($context["modalidade"], "getNoModalidade", array()), "html", null, true);
                        echo "</h2>

                                        <p>";
                        // line 49
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["modalidade"], "getCoTipoModalidade", array()), "getNoTipoModalidade", array()), "html", null, true);
                        echo "</p>
                                        <a class=\"btn\" disabled>
                                            Inscrição Encerrada.
                                        </a>
                                    </div>
                                </div>
                            ";
                    }
                    // line 56
                    echo "                        ";
                }
                // line 57
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modalidade'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "                ";
        }
        // line 59
        echo "            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAutorBundle:Painel:painel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 59,  137 => 58,  131 => 57,  128 => 56,  118 => 49,  113 => 47,  110 => 46,  105 => 43,  98 => 39,  95 => 38,  88 => 34,  85 => 33,  83 => 32,  79 => 31,  74 => 29,  71 => 28,  68 => 26,  65 => 25,  60 => 24,  58 => 23,  45 => 13,  35 => 6,  31 => 4,  28 => 3,);
    }
}
