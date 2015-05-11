<?php

/* DatasusSisvsExpoEpiAcompanhamentoBundle:AcompanharDuplicata:index.html.twig */
class __TwigTemplate_557ea9461e51db122fe3c296736be8f025ee64bcc8e4745f35ab09989b50d195 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DatasusSisvsExpoEpiAcompanhamentoBundle::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DatasusSisvsExpoEpiAcompanhamentoBundle::base.html.twig";
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
        <strong class=\"title\">Listar Possíveis Duplicadas / Duplicadas (bloqueadas)</strong>

        <div class=\"formulario\">
            <form id=\"form-duplicata\" method=\"get\" action=\"acompanhar_inscricao_search\">
                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"noEvento\">Evento: <font color=\"red\"><b>*</b></font> </label>

                    <div class=\"controls\">
                        ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbEnvento"]) ? $context["cmbEnvento"] : $this->getContext($context, "cmbEnvento")));
        foreach ($context['_seq'] as $context["_key"] => $context["evento"]) {
            // line 14
            echo "                            ";
            if (($this->getAttribute($context["evento"], "anEvento", array()) == twig_date_format_filter($this->env, "now", "Y"))) {
                // line 15
                echo "                                <input type=\"hidden\" name=\"eventoCorrente\" id=\"eventoCorrente\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "getCoSeqEvento", array()), "html", null, true);
                echo "\" />
                            ";
            }
            // line 17
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['evento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "                        <select class=\"span3 required\" id=\"noEvento\" name=\"coEvento\">
                            ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbEnvento"]) ? $context["cmbEnvento"] : $this->getContext($context, "cmbEnvento")));
        foreach ($context['_seq'] as $context["_key"] => $context["evento"]) {
            // line 20
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "getCoSeqEvento", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "getNoEvento", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['evento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "                        </select>

                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"noModalidade\">Modalidade: <font color=\"red\"><b>*</b></font>
                    </label>

                    <div class=\"controls\">
                        <select class=\"span3 required\" id=\"noModalidade\" name=\"coModalidade\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coArea\">Área:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"noArea\" name=\"coArea\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coTema\">Tema/Categoria:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"noTema\" name=\"coTema\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span5\">
                    <label class=\"control-label\" for=\"tpConsulta\">
                        Inscrições: <font color=\"red\"><b>*</b></font>
                    </label>

                    <div class=\"span3\">
                        <label class=\"radio\">
                            <input type=\"radio\" name=\"tpConsulta\" value=\"duplicadas\" id=\"tpConsulta\" class=\"required\"/>
                            Possíveis Duplicadas
                        </label>

                        <label class=\"radio\">
                            <input type=\"radio\" name=\"tpConsulta\" value=\"bloqueadas\" id=\"tpConsulta\"/> Duplicadas
                            (Bloqueadas)
                        </label>
                    </div>
                </div>

                <div class=\"botao\">
                    <button type=\"submit\" class=\"buttonAzul margim\" id=\"pesquisar\">Pesquisar</button>
                    <button type=\"reset\" class=\"buttonAzul margim\" id=\"limpar\">Limpar</button>
                </div>
            </form>
        </div>
        <div class=\"grid hide\">
            <div class=\"formulario grid \">
                <div class=\"box\">
                    <div id=\"pager\"></div>
                    <form method=\"post\" action=\"";
        // line 86
        echo $this->env->getExtension('routing')->getPath("acompanhar_duplicata_toogle");
        echo "\" id=\"form-grid\">
                        <table id=\"grid\"></table>
                        <div class=\"botao\">
                            <button type=\"button\" class=\"buttonAzul margim\" id=\"salvar\"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script type=\"text/javascript\"
            src=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsexpoepiacompanhamento/js/acompanhar-duplicata/index.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(document).ready(function () {

            \$('.radio').change(function () {
                if (\$(\"input:radio[name=tpConsulta]:checked\").val() == 'duplicadas') {
                    \$('#inscricao').html('Bloquear Projeto');
                    \$('#checkboxall').prop('checked', false);
                }
                else if (\$(\"input:radio[name=tpConsulta]:checked\").val() == 'bloqueadas') {
                    \$('#inscricao').html('Desbloquear Projeto');
                    \$('#checkboxall').prop('checked', false);
                }
            });
            \$('#coEvento').change();
            \$('#pesquisar').click(function(){
                var config = {
                    url: '";
        // line 116
        echo $this->env->getExtension('routing')->getPath("acompanhar_duplicata_search");
        echo "',
                    buttonSearch: \$('#pesquisar'),
                    postData: {data: \$('#form-duplicata').serialize()},
                    form: \$('#form-duplicata'),

                    colNames: [
                        '<span class=\"checkboxall\" id=\"inscricao\" ></span>',
                        'Inscrições',
                        'Autor Principal',
                        'Área',
                        'Tema / Categoria',
                        'Título do Projeto',
                        'Nome da Instituição',
                        'Data e Hora da Inscrição',
                        'Opção'
                    ],
                    colModel: [
                        {name: 'check', sortable: false, width: 50},
                        {name: 'nuInscricao', index: 'i.nuInscricao', width: 40,sortable:true},
                        {name: 'noUsuario', index: 'u.noUsuario', width: 80},
                        {name: 'noArea', index: 'a.noArea', width: 55},
                        {name: 'noTema', index: 't.noTema', width: 55},
                        {name: 'dsTitulo', index: 'i.dsTitulo', width: 80},
                        {name: 'noInstituicao', index: 'it.noInstituicao', width: 55},
                        {name: 'dtSituacao', index: 'hh.dtSituacao', width: 55},
                        {name: 'acao', index: 'Acao', width:35, align: \"center\"}
                    ],

                    sortname: 'i.nuInscricao',
                    caption: 'Resultado da Pesquisa',
                    multiselect: true,
                    beforeSelectRow: function () {
                        return false
                    }
                };

                \$('#grid').grid(config);
                \$('.radio').change();
            });
            var grid = \$(\"#grid\");
            \$(\"#noEvento\").each(function(){
                \$(this).children(\"option\").each(function(){
                    if(\$(this).val() == \$('#eventoCorrente').val()){
                        \$(this).attr('selected',true);
                    }
                });
            });
            \$('#noEvento').change();
        });
    </script>
  <style type=\"text/css\">
      table #grid_cb {
      border-style: none !important;
      }

      table tr td[aria-describedby=\"grid_cb\"] {
      border-style: none !important;
      }
      #check{display: none;}
  </style>
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAcompanhamentoBundle:AcompanharDuplicata:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 116,  161 => 99,  145 => 86,  79 => 22,  68 => 20,  64 => 19,  61 => 18,  55 => 17,  49 => 15,  46 => 14,  42 => 13,  31 => 4,  28 => 3,);
    }
}
