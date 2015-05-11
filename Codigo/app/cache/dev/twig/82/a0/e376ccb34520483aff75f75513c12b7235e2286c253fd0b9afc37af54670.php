<?php

/* DatasusSisvsExpoEpiAcompanhamentoBundle:AcompanharEvento:index.html.twig */
class __TwigTemplate_82a0e376ccb34520483aff75f75513c12b7235e2286c253fd0b9afc37af54670 extends Twig_Template
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
        <strong class=\"title\">Inscrições</strong>

        <div class=\"formulario\">
            <form id=\"form-apresentacao\" method=\"get\">
                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coEvento\">Evento: <font color=\"red\"><b>*</b></font> </label>
                    <div class=\"controls\">
                        ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbEvento"]) ? $context["cmbEvento"] : $this->getContext($context, "cmbEvento")));
        foreach ($context['_seq'] as $context["_key"] => $context["evento"]) {
            // line 13
            echo "                            ";
            if (($this->getAttribute($context["evento"], "anEvento", array()) == twig_date_format_filter($this->env, "now", "Y"))) {
                // line 14
                echo "                                <input type=\"hidden\" name=\"eventoCorrente\" id=\"eventoCorrente\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "getCoSeqEvento", array()), "html", null, true);
                echo "\" />
                            ";
            }
            // line 16
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['evento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "                        <select class=\"span3 required\" id=\"coEvento\" name=\"coEvento\">
                            ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbEvento"]) ? $context["cmbEvento"] : $this->getContext($context, "cmbEvento")));
        foreach ($context['_seq'] as $context["_key"] => $context["evento"]) {
            // line 19
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
        // line 21
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coModalidade\">Modalidade:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coModalidade\" name=\"coModalidade\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coArea\">Área:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coArea\" name=\"coArea\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coTema\">Tema/Categoria:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coTema\" name=\"coTema\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"dsSituacao\">Situação:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"dsSituacao\" name=\"dsSituacao\">
                            <option value=\"\">Selecione uma opção</option>
                            ";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["arrSituacao"]) ? $context["arrSituacao"] : $this->getContext($context, "arrSituacao")));
        foreach ($context['_seq'] as $context["_key"] => $context["situacao"]) {
            // line 62
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["situacao"], "getCoSituacao", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["situacao"], "getDsSituacao", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['situacao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "                        </select>
                    </div>
                </div>
                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"nuInscricao\">Número Inscrição:</label>

                    <div class=\"controls\">
                        <input id=\"nuInscricao\" type=\"text\" name=\"nuInscricao\" class=\"span3\">
                    </div>
                </div>

                <div class=\"botao\">
                    <button type=\"submit\" class=\"buttonAzul margim\" id=\"pesquisar\">Pesquisar</button>
                    <button type=\"reset\" class=\"buttonAzul margim\" id=\"limpar\">Limpar</button>
                </div>
            </form>
        </div>

        <div class=\"grid hide\">
            <div id=\"formTotal\" class=\"formulario  grid hide\">
                <form id=\"form-apresentacao-area\">
                    <div class=\"control-group span4\">
                        <h4 class=\"control-label\">
                            <span class=\"label label-success\" id=\"total\" title=\"Total de Inscrições\">
                                Total de Inscrições: 0
                            </span>
                        </h4>

                        <div class=\"controls\">
                        </div>
                    </div>

                    <div class=\"control-group span5\">
                        <a href=\"";
        // line 97
        echo $this->env->getExtension('routing')->getPath("acompanhar_duplicata");
        echo "\"
                           title=\"Listar Possíveis Incrições Duplicadas / Inscrições Bloqueadas\">
                            <h4 class=\"control-label\">
                            <span class=\"label label-warning\" id=\"duplicadas\">
                                Possíveis Inscrições Duplicadas: 0
                            </span>
                                <span class=\"icon-share-alt\"></span>
                            </h4>
                        </a>

                        <div class=\"controls\">
                        </div>
                    </div>

                    <div class=\"control-group span\">
                        <a href=\"";
        // line 112
        echo $this->env->getExtension('routing')->getPath("acompanhar_duplicata");
        echo "\"
                           title=\"Listar Possíveis Incrições Duplicadas / Inscrições Bloqueadas\">
                            <h4 class=\"control-label \">
                            <span class=\"label label-important\" id=\"bloqueadas\">
                                Inscrições Bloqueadas: 0
                            </span>
                                <span class=\"icon-share-alt\"></span>
                            </h4>
                        </a>

                        <div class=\"controls\">
                        </div>
                    </div>

                    <div class=\"control-group span4\">
                        <a title=\"Quantidade de Inscrição por Área\" id=\"qtdArea\">
                            <h4 class=\"control-label \">
                            <span class=\"label\" id=\"bloqueadas\">
                                Quantidade de Inscrição por Área
                            </span>
                            </h4>
                        </a>

                        <div class=\"controls\">
                        </div>
                    </div>

                    <div class=\"control-group span4\">
                        <a title=\"Quantidade de Inscrição por Tema / Categoria\" id=\"qtdTema\">
                            <h4 class=\"control-label \">
                            <span class=\"label\" id=\"bloqueadas\">
                                Quantidade de Inscrição por Tema / Categoria
                            </span>
                            </h4>
                        </a>

                        <div class=\"controls\">
                        </div>
                    </div>

                </form>
            </div>

            <div class=\"formulario grid hide\">
                <div class=\"box\" style=\"width:97% !important;padding:15px !important\">
                    <table id=\"grid\"></table>
                    <div id=\"pager\"></div>
                </div>
            </div>
        </div>
    </div>

    <script type=\"text/javascript\"
            src=\"";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsexpoepiacompanhamento/js/acompanhar-evento/index.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(document).ready(function () {
            \$('#pesquisar').click(function () {
                var form = \$('#form-apresentacao').serialize();
                var config = {
                    url: '";
        // line 171
        echo $this->env->getExtension('routing')->getPath("acompanhar_inscricao_search");
        echo "',
                    buttonSearch: \$('#pesquisar'),
                    postData: {data: form},
                    form: \$('#form-apresentacao'),

                    colNames: [
                        'Inscrição',
                        'Modalidade',
                        'Área',
                        'Tema / Categoria',
                        'Autor Principal',
                        'Título do Projeto',
                        'Situação',
                        'Ações'
                    ],

                    colModel: [
                        {name: 'nuInscricao', index: 'i.nuInscricao', width: 70},
                        {name: 'noModalidade', index: 'm.noModalidade'},
                        {name: 'noArea', index: 'a.noArea'},
                        {name: 'noTema', index: 't.noTema'},
                        {name: 'noUsuario', index: 'u.noUsuario'},
                        {name: 'dsTitulo', index: 'i.dsTitulo', width: 150},
                        {name: 'dsSituacao', index: 's.dsSituacao', width: 100},
                        {name: 'acao', index: 'Acao', width: 90, align: 'center'}
                    ],

                    sortname: 'i.nuInscricao',
                    caption: 'Resultado da Pesquisa',
                    loadComplete: function () {
                        if (\$.componentGrid.grid.getGridParam(\"records\") == 0 && \$.componentGrid.grid.is(':visible')) {
                            Message.addMessage('Registro(s) não encontrado(s).');
                        }
                    }
                };

                \$('#grid').grid(config);
            });

            \$('#qtdArea').click(function () {
                var url = '/acompanhamento/acompanhar-evento/view-inscricao-area?data=' + encodeURIComponent(\$('form').serialize());
                \$.get(url, function (data) {
                    \$('#modal-view').html(data);

                    \$('#modal-view').modal({
                        keyboard: false,
                        backdrop: 'static'
                    });
                });
            });

            \$('#qtdTema').click(function () {
                var url = '/acompanhamento/acompanhar-evento/view-inscricao-categoria?data=' + encodeURIComponent(\$('form').serialize());
                \$.get(url, function (data) {
                    \$('#modal-view').html(data);

                    \$('#modal-view').modal({
                        keyboard: false,
                        backdrop: 'static'
                    });
                });
            });

            \$('form').submit(function () {
                if (\$('form').valid()) {
                    var url = '/acompanhamento/acompanhar-duplicata/search?rows=11&page=1&sord=asc&data=';

                    \$.getJSON(url + encodeURIComponent(\$('form').serialize() + '&tpConsulta=duplicadas'), function (data) {
                        \$('#duplicadas').html('Possíveis Inscrições Duplicadas: ' + data.records);
                    });

                    \$.getJSON(url + encodeURIComponent(\$('form').serialize() + '&tpConsulta=bloqueadas'), function (data) {
                        \$('#bloqueadas').html('Inscrições Bloqueadas: ' + data.records);
                    });
                    var url2 = '/acompanhamento/acompanhar-evento/view-total-inscricao?data=';
                    \$.getJSON(url2 + encodeURIComponent(\$('form').serialize()), function (data) {
                        \$('#total').html('Total de Inscrições: ' + data);
                    });
                }
            });

            \$(\"#coEvento\").each(function(){
                \$(this).children(\"option\").each(function(){
                    if(\$(this).val() == \$('#eventoCorrente').val()){
                        \$(this).attr('selected',true);
                    }
                });
            });
            \$('#coEvento').change();
            \$('.alert-error, .alert-success').fadeIn().delay(5000).fadeOut('slow');
            \$('#limpar').click(function () {
                window.location.href = window.location.href;
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAcompanhamentoBundle:AcompanharEvento:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 171,  244 => 165,  188 => 112,  170 => 97,  135 => 64,  124 => 62,  120 => 61,  78 => 21,  67 => 19,  63 => 18,  60 => 17,  54 => 16,  48 => 14,  45 => 13,  41 => 12,  31 => 4,  28 => 3,);
    }
}
