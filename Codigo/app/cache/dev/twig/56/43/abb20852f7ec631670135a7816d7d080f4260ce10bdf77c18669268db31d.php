<?php

/* DatasusSisvsExpoEpiAutorBundle:Painel:index.html.twig */
class __TwigTemplate_5643abb20852f7ec631670135a7816d7d080f4260ce10bdf77c18669268db31d extends Twig_Template
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
        echo "    <div class=\"box\">
        <strong class=\"title\">Informações da Inscrição</strong>

        <div class=\"formulario\">
            <form id=\"form-apresentacao\" method=\"get\" action=\"autor_painel_search\">
                <div class=\"control-group span9\">
                    <label class=\"control-label\" for=\"coEvento\">Modalidade:</label>

                    <div class=\"controls\">
                        <input type=\"text\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getNoModalidade", array()), "html", null, true);
        echo "\" disabled=\"disabled\"/>
                        <input type=\"hidden\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoSeqModalidade", array()), "html", null, true);
        echo "\" name=\"coModalidade\"/>
                    </div>
                </div>
                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coEvento\">Número da Inscrição:</label>

                    <div class=\"controls\">
                        <input type=\"text\" name=\"nuInscricao\"/>
                    </div>
                </div>
                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coArea\">Área:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coSeqArea\" name=\"coSeqArea\">
                            <option value=\"\">Selecione uma opção</option>
                            ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoArea", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["area"]) {
            // line 31
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "getCoSeqArea", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "getNoArea", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coTema\">Tema/Categoria:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coTema\" name=\"coSeqTema\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"botao\">
                    <button type=\"submit\" class=\"buttonAzul margim\" id=\"pesquisar\">Pesquisar</button>
                    <button type=\"reset\" class=\"buttonAzul margim\" id=\"limpar\">Limpar</button>
                    <a href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("autor_painel_create", array("coSeqModalidade" => $this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "coSeqModalidade", array()))), "html", null, true);
        echo "\"
                       class=\"buttonAzul margim\" id=\"pesquisar\">Nova Inscrição</a>
                </div>
            </form>
        </div>

        <div class=\"formulario grid\">
            <div class=\"box\" style=\"width:97% !important;padding:15px !important\">
                <table id=\"grid\"></table>
                <div id=\"pager\"></div>
            </div>
        </div>
    </div>

    <script type=\"text/javascript\" src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsexpoepiautor/js/painel/form.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(document).ready(function () {
            var config = {
                url: '";
        // line 68
        echo $this->env->getExtension('routing')->getPath("autor_painel_search");
        echo "',
                buttonSearch: \$('#pesquisar'),
                form: \$('#form-apresentacao'),
                postData: {data: 'coModalidade=";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoSeqModalidade", array()), "html", null, true);
        echo "'},

                colNames: ['Nº Inscrição', 'Área', 'Tema / Categoria', 'Título do Projeto', 'Situação', 'Opções'],
                colModel: [
                    {name: 'nuInscricao', index: 'i.nuInscricao', width: 50},
                    {name: 'noArea', index: 'a.noArea', width: 100},
                    {name: 'noTema', index: 't.noTema', width: 100},
                    {name: 'dsTitulo', index: 'i.dsTitulo', width: 100},
                    {name: 'dsSituacao', index: 's.dsSituacao', width: 50},
                    {name: 'acao', index: 'Acao', width: 45, align: \"center\"}
                ],

                sortname: 'i.nuInscricao',
                caption: 'Resultado da Pesquisa'
            };

            \$('#grid').grid(config);

            \$('#coSeqArea').change(function () {
                if (\$(this).val()) {
                    \$('#coTema').val('').change();

                    var url = '/administrativo/tema/combo-box?coArea=' + \$(this).val();

                    utils.getCombo(url, '#coTema');
                }
            });
            \$('.alert-error, .alert-success').fadeIn().delay(10000).fadeOut('slow');
            \$('#limpar').click(function () {
                window.location.href = window.location.href;
            });
        });
    </script>
    <style type=\"text/css\">
        .alert-success {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #468847;
            font-size: 14px !important;
        }
    </style>
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAutorBundle:Painel:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 71,  123 => 68,  116 => 64,  99 => 50,  80 => 33,  69 => 31,  65 => 30,  46 => 14,  42 => 13,  31 => 4,  28 => 3,);
    }
}
