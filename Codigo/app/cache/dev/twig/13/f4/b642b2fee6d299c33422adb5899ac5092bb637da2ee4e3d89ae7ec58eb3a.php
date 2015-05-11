<?php

/* DatasusSisvsExpoEpiRelatorioBundle:RelatorioInscricao:index.html.twig */
class __TwigTemplate_13f4b642b2fee6d299c33422adb5899ac5092bb637da2ee4e3d89ae7ec58eb3a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DatasusSisvsExpoEpiFormularioBundle::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DatasusSisvsExpoEpiFormularioBundle::base.html.twig";
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
        <strong class=\"title\">Gerar Relatório</strong>

        <div class=\"formulario\">
            <form id=\"form-relatorio-inscricao\">
                <div class=\"control-group span12\">
                    <label class=\"control-label\" for=\"tpConsulta\">Tipo do Relatório: <font color=\"red\"><b>*</b></font>
                    </label>

                    <div class=\"span3\">
                        <label class=\"radio\">
                            <input type=\"radio\" name=\"tpConsulta\" value=\"geral\" id=\"tpConsulta\" class=\"required\"/>
                            Relatório Geral
                        </label>

                        <label class=\"radio\">
                            <input type=\"radio\" name=\"tpConsulta\" value=\"consolidado\" id=\"tpConsulta\"/> Relatório
                            Consolidado
                        </label>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coEvento\">Evento: <font color=\"red\"><b>*</b></font> </label>

                    <div class=\"controls\">
                        <select class=\"span3 required\" id=\"coEvento\" name=\"coSeqEvento\">
                            ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbEvento"]) ? $context["cmbEvento"] : $this->getContext($context, "cmbEvento")));
        foreach ($context['_seq'] as $context["_key"] => $context["evento"]) {
            // line 32
            echo "                                ";
            if (($this->getAttribute($context["evento"], "anEvento", array()) == twig_date_format_filter($this->env, "now", "Y"))) {
                // line 33
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "getCoSeqEvento", array()), "html", null, true);
                echo "\" selected>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "getNoEvento", array()), "html", null, true);
                echo "</option>
                                ";
            } else {
                // line 35
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "getCoSeqEvento", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "getNoEvento", array()), "html", null, true);
                echo "</option>
                                ";
            }
            // line 37
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['evento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coModalidade\">Modalidade: <font color=\"red\"><b>*</b></font>
                    </label>

                    <div class=\"controls\">
                        <select class=\"span3 required\" id=\"coModalidade\" name=\"coSeqModalidade\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coArea\">Área:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coArea\" name=\"coSeqArea\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coTema\">Tema / Categoria:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coTema\" name=\"coSeqTema\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coRegiao\">Região da Instituição:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coRegiao\" name=\"coRegiao\">
                            <option value=\"\">Selecione uma opção</option>
                            ";
        // line 79
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbRegiao"]) ? $context["cmbRegiao"] : $this->getContext($context, "cmbRegiao")));
        foreach ($context['_seq'] as $context["_key"] => $context["regiao"]) {
            // line 80
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["regiao"], "getCoRegiao", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["regiao"], "getNoRegiao", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['regiao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coUf\">Estado da Instituição:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coUfIbge\" name=\"coUfIbge\">
                            <option value=\"\">Selecione uma opção</option>
                            ";
        // line 92
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbEstado"]) ? $context["cmbEstado"] : $this->getContext($context, "cmbEstado")));
        foreach ($context['_seq'] as $context["_key"] => $context["estado"]) {
            // line 93
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["estado"], "getCoUfIbge", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["estado"], "getNoUf", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['estado'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coMunicipioIbge\">Município da Instituição:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coMunicipioIbge\" name=\"coMunicipioIbge\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coSexo\">Sexo:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coSexo\" name=\"coSexo\">
                            <option value=\"\">Selecione uma opção</option>
                            <option value=\"M\">MASCULINO</option>
                            <option value=\"F\">FEMININO</option>
                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coSituacao\">Situação:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coSituacao\" name=\"coSituacao\">
                            <option value=\"\">Selecione uma opção</option>
                            ";
        // line 127
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbSituacaoInscricao"]) ? $context["cmbSituacaoInscricao"] : $this->getContext($context, "cmbSituacaoInscricao")));
        foreach ($context['_seq'] as $context["_key"] => $context["situacaoInsc"]) {
            // line 128
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["situacaoInsc"], "getCoSituacao", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["situacaoInsc"], "getDsSituacao", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['situacaoInsc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coInstituicao\">Tipo Instituição:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coInstituicao\" name=\"coSeqInstituicao\">
                            <option value=\"\">Selecione uma opção</option>
                            ";
        // line 140
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbTipoInstituicao"]) ? $context["cmbTipoInstituicao"] : $this->getContext($context, "cmbTipoInstituicao")));
        foreach ($context['_seq'] as $context["_key"] => $context["tipoInstituicao"]) {
            // line 141
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tipoInstituicao"], "getCoSeqInstituicao", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tipoInstituicao"], "getNoInstituicao", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tipoInstituicao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 143
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">

                    <div class=\"controls\">
                        <label class=\"checkbox\" for=\"coInstituicao\">Instituição:
                            <input type=\"checkbox\" name=\"inInstituicao\" id=\"inInstituicao\"/>
                        </label>
                    </div>
                </div>

                <div class=\"control-group span3\">

                    <div class=\"controls\">
                        <label class=\"checkbox\" for=\"coDuplicadas\">Possíveis Duplicadas:
                            <input type=\"checkbox\" name=\"InInforDuplicadas\" id=\"InInforDuplicadas\"/>
                        </label>
                    </div>
                    <input type=\"hidden\" id=\"inLoadCoArea\" value=\"\"/>
                </div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coRegiaoAutor\">Região do Autor:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coRegiaoAutor\" name=\"coRegiaoAutor\">
                            <option value=\"\">Selecione uma opção</option>
                            ";
        // line 171
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbRegiao"]) ? $context["cmbRegiao"] : $this->getContext($context, "cmbRegiao")));
        foreach ($context['_seq'] as $context["_key"] => $context["regiao"]) {
            // line 172
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["regiao"], "getCoRegiao", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["regiao"], "getNoRegiao", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['regiao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 174
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coUfIbgeAutor\">Estado do Autor:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coUfIbgeAutor\" name=\"coUfIbgeAutor\">
                            <option value=\"\">Selecione uma opção</option>
                            ";
        // line 184
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cmbEstado"]) ? $context["cmbEstado"] : $this->getContext($context, "cmbEstado")));
        foreach ($context['_seq'] as $context["_key"] => $context["estado"]) {
            // line 185
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["estado"], "getCoUfIbge", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["estado"], "getNoUf", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['estado'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 187
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group span3\">
                    <label class=\"control-label\" for=\"coMunicipioIbgeAutor\">Município do Autor:</label>

                    <div class=\"controls\">
                        <select class=\"span3\" id=\"coMunicipioIbgeAutor\" name=\"coMunicipioIbgeAutor\">
                            <option value=\"\">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

            </form>
            <div class=\"botao\">
                <button type=\"button\" class=\"buttonAzul margim\" id=\"gerarRelatorio\">Gerar Relatório</button>
                <button type=\"reset\" class=\"buttonAzul margim\" id=\"limpar\">Limpar</button>
            </div>
        </div>

        <div class=\"formulario grid hide\">
            <div class=\"box\" style=\"width:97% !important;padding:15px !important\">
                <table id=\"grid\"></table>
                <div id=\"pager\"></div>
            </div>

            <div class=\"botao\">
                <button type=\"button\" class=\"buttonAzul margim gerar-excel\">Exportar para Excel</button>
                <button type=\"button\" class=\"buttonAzul margim gerar-pdf\">Gerar PDF</button>
                <a class=\"buttonAzul margim\" href=\"";
        // line 217
        echo $this->env->getExtension('routing')->getPath("datasus_sisvs_expoepi_relatorio_relatorio_inscricao");
        echo "\">Voltar</a>
            </div>
        </div>

    </div>
    <script type=\"text/javascript\"
            src=\"";
        // line 223
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsexpoepirelatorio/js/relatorio-inscricao/index.js"), "html", null, true);
        echo "\">
    </script>
    <script>
        \$(document).ready(function () {
            var config = {
                url: '";
        // line 228
        echo $this->env->getExtension('routing')->getPath("datasus_sisvs_expoepi_relatorio_relatorio_inscricao_search");
        echo "',
                buttonSearch: \$('#gerarRelatorio'),
                form: \$('#form-relatorio-inscricao'),
                colNames: ['Evento', 'Ano', 'Modalidade', 'Área', 'Tema/Categoria', 'Estado', 'Município', 'Região',
                    'Sexo', 'Inscrições Duplicadas', 'Situação', 'Tipo de Instituição', 'Instituição',
                    'Quantidade de Inscrições', 'Percentual'],
                colModel: [
                    {name: 'noEvento', index: 'noEvento ', width: 10},
                    {name: 'anEvento', index: 'anEvento ', width: 7},
                    {name: 'noModalidade', index: 'noModalidade', width: 10},
                    {name: 'noArea', index: 'noArea', width: 10},
                    {name: 'noTema', index: 'noTema', width: 10},
                    {name: 'noUf', index: 'noUf', width: 10},
                    {name: 'noMunicipio', index: '', width: 10},
                    {name: 'noRegiao', index: '', width: 10},
                    {name: 'coSexo', index: 'noSexo', width: 10},
                    {name: 'duplicata', index: '', width: 10},
                    {name: 'dsSituacao', index: '', width: 10},
                    {name: 'noTipoInstituicao', index: '', width: 10},
                    {name: 'noInstituicao', index: '', width: 10},
                    {name: 'quantidade', index: '', width: 10},
                    {name: 'porcentagem', index: '', width: 10}
                ],
                sortname: 'nuFormulario',
                caption: 'Resultado da Pesquisa',
                beforeSelectRow: function(rowid, e) {
                    return false;
                },
                loadComplete: function() {
                    var ids = \$(\"#grid\").jqGrid('getDataIDs');
                    if(ids.length == 0) {
                        \$('.message').each(function () {
                            \$(this).children().show();
                        });
                        Message.addMessage('Registro(s) não encontrado(s).','success');
                        \$('html, body').animate({scrollTop: 0}, 300);
                    }
                }
            };
            \$('#grid').grid(config);

            \$('input[name=tpConsulta]').click(function(){
                if(\$(this).val() == 'geral'){
                    \$('form').children().hide();
                    \$('form div.control-group:nth-child(1)').show();
                    \$('form div.control-group:nth-child(2)').show();
                }else{
                    \$('form').children().show();
                }
            });

            \$('form').children().hide();
            \$('form div.control-group:nth-child(1)').show();

            \$('#gerarRelatorio').click(function(){

                if(\$('input[name=tpConsulta]:checked').val() == 'geral'){
                    \$('.grid').hide();

                    var url = '/relatorio/relatorio-inscricao/geral?';
                    var form = \$('form').serialize();
                    window.location = url + form;
               }
            });

            \$('input[name=tpConsulta]').click(function(){
                if(\$(this).val() == 'consolidado'){
                \$('#coEvento').change();
                }
            });

            \$('#limpar').click(function(){
                \$('#form-relatorio-inscricao').each(function(){
                    window.location.href = window.location.href;
                });
            });
        });

    </script>
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiRelatorioBundle:RelatorioInscricao:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  371 => 228,  363 => 223,  354 => 217,  322 => 187,  311 => 185,  307 => 184,  295 => 174,  284 => 172,  280 => 171,  250 => 143,  239 => 141,  235 => 140,  223 => 130,  212 => 128,  208 => 127,  174 => 95,  163 => 93,  159 => 92,  147 => 82,  136 => 80,  132 => 79,  89 => 38,  83 => 37,  75 => 35,  67 => 33,  64 => 32,  60 => 31,  31 => 4,  28 => 3,);
    }
}
