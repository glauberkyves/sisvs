<?php

/* DatasusSisvsExpoEpiRelatorioBundle:RelatorioInscricao:geral.html.twig */
class __TwigTemplate_b770a3911d5b2e2b1a2b458b7c61f4e3829c26f6765045c9dba0cc630a797c9b extends Twig_Template
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
        echo "    <strong class=\"title\">
        Relatório Geral
    </strong>

    <div class=\"formulario\">
        <fieldset>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th>Evento</th>
                    <th class=\"span2\">Ano</th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["arrEvento"]) ? $context["arrEvento"] : $this->getContext($context, "arrEvento")));
        foreach ($context['_seq'] as $context["_key"] => $context["evento"]) {
            // line 20
            echo "                    ";
            if ($this->getAttribute($context["evento"], "total", array())) {
                // line 21
                echo "                        <tr>
                            <td>
                                ";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "title", array()), "html", null, true);
                echo "
                            </td>
                            <td>
                                <b>
                                    ";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "anEvento", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($context["evento"], "total", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                        </tr>
                    ";
            }
            // line 37
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['evento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "                </tbody>
            </table>
        </fieldset>
    </div>

    <strong class=\"title\">
        <h5>Modalidades</h5>
    </strong>
    <div class=\"formulario\">
        <fieldset>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th colspan=\"2\"></th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                    <th class=\"span1\">Percentual</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 57
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["arrModalidade"]) ? $context["arrModalidade"] : $this->getContext($context, "arrModalidade")));
        foreach ($context['_seq'] as $context["_key"] => $context["modalidade"]) {
            // line 58
            echo "                    ";
            if ($this->getAttribute($context["modalidade"], "total", array())) {
                // line 59
                echo "                        <tr>
                            <td colspan=\"2\">
                                ";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($context["modalidade"], "title", array()), "html", null, true);
                echo "
                            </td>
                            <td>
                                <b>
                                    ";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute($context["modalidade"], "total", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 70
                $context["procentagem"] = (($this->getAttribute($context["modalidade"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                // line 71
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                echo "%
                                </b>
                            </td>
                        </tr>

                        ";
                // line 76
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["arrArea"]) ? $context["arrArea"] : $this->getContext($context, "arrArea")), $this->getAttribute($context["modalidade"], "coSeqModalidade", array()), array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["area"]) {
                    // line 77
                    echo "                            ";
                    if ($this->getAttribute($context["area"], "total", array())) {
                        // line 78
                        echo "                                <tr>
                                    <td colspan=\"4\">
                                        <h5 class=\"span6\">Área</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan=\"2\">
                                        <span class=\"span6\">";
                        // line 85
                        echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "title", array()), "html", null, true);
                        echo "</span>
                                    </td>
                                    <td>
                                        <b>
                                            ";
                        // line 89
                        echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "total", array()), "html", null, true);
                        echo "
                                        </b>
                                    </td>
                                    <td>
                                        <b>
                                            ";
                        // line 94
                        $context["procentagem"] = (($this->getAttribute($context["area"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                        // line 95
                        echo "                                            ";
                        echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                        echo "%
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan=\"4\">
                                        <h5 class=\"span\">Tema / Categoria</h5>
                                    </td>
                                </tr>
                                ";
                        // line 104
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["arrTema"]) ? $context["arrTema"] : $this->getContext($context, "arrTema")), $this->getAttribute($context["area"], "coSeqArea", array()), array(), "array"));
                        foreach ($context['_seq'] as $context["_key"] => $context["tema"]) {
                            // line 105
                            echo "                                    ";
                            if ($this->getAttribute($context["tema"], "total", array())) {
                                // line 106
                                echo "                                        <tr>
                                            <td colspan=\"2\">
                                                <span class=\"span\">";
                                // line 108
                                echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "title", array()), "html", null, true);
                                echo "</span>
                                            </td>
                                            <td>
                                                <b>
                                                    ";
                                // line 112
                                echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "total", array()), "html", null, true);
                                echo "
                                                </b>
                                            </td>
                                            <td>
                                                <b>
                                                    ";
                                // line 117
                                $context["procentagem"] = (($this->getAttribute($context["tema"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                                // line 118
                                echo "                                                    ";
                                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                                echo "%
                                                </b>
                                            </td>
                                        </tr>
                                    ";
                            }
                            // line 123
                            echo "                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tema'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 124
                        echo "                            ";
                    }
                    // line 125
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 126
                echo "                        <tr>
                            <td colspan=\"4\">
                            </td>
                        </tr>
                    ";
            }
            // line 131
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modalidade'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 132
        echo "                </tbody>
            </table>

            <h5 class=\"span6\">Situação</h5>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th colspan=\"2\"></th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                    <th class=\"span1\">Percentual</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 145
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["arrSituacao"]) ? $context["arrSituacao"] : $this->getContext($context, "arrSituacao")));
        foreach ($context['_seq'] as $context["_key"] => $context["situacao"]) {
            // line 146
            echo "                    ";
            if ($this->getAttribute($context["situacao"], "total", array())) {
                // line 147
                echo "                        <tr>
                            <td colspan=\"2\">
                                ";
                // line 149
                if (($this->getAttribute($context["situacao"], "coSituacao", array()) == 3)) {
                    // line 150
                    echo "                                    <span class=\"span6\">Inscrição Duplicadas</span>
                                ";
                } else {
                    // line 152
                    echo "                                    <span class=\"span6\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["situacao"], "title", array()), "html", null, true);
                    echo "</span>
                                ";
                }
                // line 154
                echo "                            </td>
                            <td>
                                <b>
                                    ";
                // line 157
                echo twig_escape_filter($this->env, $this->getAttribute($context["situacao"], "total", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 162
                $context["procentagem"] = (($this->getAttribute($context["situacao"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                // line 163
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                echo "%
                                </b>
                            </td>
                        </tr>
                    ";
            }
            // line 168
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['situacao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 169
        echo "                </tbody>
            </table>

            ";
        // line 172
        if (array_key_exists("arrDuplicadas", $context)) {
            // line 173
            echo "                <h5 class=\"span6\">Possíveis Duplicadas</h5>
                <table class=\"table table-bordered table-striped\">
                    <thead>
                    <tr>
                        <th colspan=\"2\"></th>
                        <th class=\"span2\">Quantidade de Inscrições</th>
                        <th class=\"span1\">Percentual</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
            // line 183
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["arrDuplicadas"]) ? $context["arrDuplicadas"] : $this->getContext($context, "arrDuplicadas")));
            foreach ($context['_seq'] as $context["_key"] => $context["duplicada"]) {
                // line 184
                echo "                        ";
                if ($this->getAttribute($context["duplicada"], "total", array())) {
                    // line 185
                    echo "                            <tr>
                                <td colspan=\"2\">
                                    <span class=\"span6\">Quantidade de Possíveis Inscrições Duplicadas</span>
                                </td>
                                <td>
                                    <b>
                                        ";
                    // line 191
                    echo twig_escape_filter($this->env, $this->getAttribute($context["duplicada"], "total", array()), "html", null, true);
                    echo "
                                    </b>
                                </td>
                                <td>
                                    <b>
                                        ";
                    // line 196
                    $context["procentagem"] = (($this->getAttribute($context["duplicada"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                    // line 197
                    echo "                                        ";
                    echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                    echo "%
                                    </b>
                                </td>
                            </tr>
                        ";
                }
                // line 202
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['duplicada'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 203
            echo "                    </tbody>
                </table>
            ";
        }
        // line 206
        echo "        </fieldset>
    </div>

    <strong class=\"title\">
        <h5>Dados da Instituição</h5>
    </strong>

    <div class=\"formulario\">
        <fieldset>
            <h5 class=\"span6\">Estado</h5>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th colspan=\"2\"></th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                    <th class=\"span1\">Percentual</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 225
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["estadoInstituicao"]) ? $context["estadoInstituicao"] : $this->getContext($context, "estadoInstituicao")));
        foreach ($context['_seq'] as $context["_key"] => $context["estado"]) {
            // line 226
            echo "                    ";
            if ($this->getAttribute($context["estado"], "total", array())) {
                // line 227
                echo "                        <tr>
                            <td colspan=\"2\">
                                <span class=\"span6\">";
                // line 229
                echo twig_escape_filter($this->env, $this->getAttribute($context["estado"], "title", array()), "html", null, true);
                echo "</span>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 233
                echo twig_escape_filter($this->env, $this->getAttribute($context["estado"], "total", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 238
                $context["procentagem"] = (($this->getAttribute($context["estado"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                // line 239
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                echo "%
                                </b>
                            </td>
                        </tr>
                    ";
            }
            // line 244
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['estado'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 245
        echo "                </tbody>
            </table>

            <h5 class=\"span6\">Município</h5>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th colspan=\"2\"></th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                    <th class=\"span1\">Percentual</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 258
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["municipioInstituicao"]) ? $context["municipioInstituicao"] : $this->getContext($context, "municipioInstituicao")));
        foreach ($context['_seq'] as $context["_key"] => $context["municipio"]) {
            // line 259
            echo "                    ";
            if ($this->getAttribute($context["municipio"], "total", array())) {
                // line 260
                echo "                        <tr>
                            <td colspan=\"2\">
                                <span class=\"span6\">";
                // line 262
                echo twig_escape_filter($this->env, $this->getAttribute($context["municipio"], "title", array()), "html", null, true);
                echo "</span>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 266
                echo twig_escape_filter($this->env, $this->getAttribute($context["municipio"], "total", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 271
                $context["procentagem"] = (($this->getAttribute($context["municipio"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                // line 272
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                echo "%
                                </b>
                            </td>
                        </tr>
                    ";
            }
            // line 277
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['municipio'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 278
        echo "                </tbody>
            </table>

            <h5 class=\"span6\">Região</h5>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th colspan=\"2\"></th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                    <th class=\"span1\">Percentual</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 291
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["regiaoInstituicao"]) ? $context["regiaoInstituicao"] : $this->getContext($context, "regiaoInstituicao")));
        foreach ($context['_seq'] as $context["_key"] => $context["regiao"]) {
            // line 292
            echo "                    ";
            if ($this->getAttribute($context["regiao"], "total", array())) {
                // line 293
                echo "                        <tr>
                            <td colspan=\"2\">
                                <span class=\"span6\">";
                // line 295
                echo twig_escape_filter($this->env, $this->getAttribute($context["regiao"], "title", array()), "html", null, true);
                echo "</span>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 299
                echo twig_escape_filter($this->env, $this->getAttribute($context["regiao"], "total", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 304
                $context["procentagem"] = (($this->getAttribute($context["regiao"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                // line 305
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                echo "%
                                </b>
                            </td>
                        </tr>
                    ";
            }
            // line 310
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['regiao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 311
        echo "                </tbody>
            </table>

            <h5 class=\"span6\">Tipo Instituição</h5>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th colspan=\"2\"></th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                    <th class=\"span1\">Percentual</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 324
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($context["tipoInstituicao"]);
        foreach ($context['_seq'] as $context["_key"] => $context["tipoInstituicao"]) {
            // line 325
            echo "                    ";
            if ($this->getAttribute($context["tipoInstituicao"], "total", array())) {
                // line 326
                echo "                        <tr>
                            <td colspan=\"2\">
                                <span class=\"span6\">";
                // line 328
                echo twig_escape_filter($this->env, $this->getAttribute($context["tipoInstituicao"], "title", array()), "html", null, true);
                echo "</span>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 332
                echo twig_escape_filter($this->env, $this->getAttribute($context["tipoInstituicao"], "total", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 337
                $context["procentagem"] = (($this->getAttribute($context["tipoInstituicao"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                // line 338
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                echo "%
                                </b>
                            </td>
                        </tr>
                    ";
            }
            // line 343
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tipoInstituicao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 344
        echo "                </tbody>
            </table>
        </fieldset>
    </div>

    <strong class=\"title\">
        <h5>Dados do Autor</h5>
    </strong>

    <div class=\"formulario\">
        <fieldset>
            <h5 class=\"span6\">Sexo</h5>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th colspan=\"2\"></th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                    <th class=\"span1\">Percentual</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 365
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["arrSexo"]) ? $context["arrSexo"] : $this->getContext($context, "arrSexo")));
        foreach ($context['_seq'] as $context["_key"] => $context["sexo"]) {
            // line 366
            echo "                    ";
            if ($this->getAttribute($context["sexo"], "total", array())) {
                // line 367
                echo "                        <tr>
                            <td colspan=\"2\">
                                <span class=\"span6\">";
                // line 369
                echo twig_escape_filter($this->env, $this->getAttribute($context["sexo"], "title", array()), "html", null, true);
                echo "</span>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 373
                echo twig_escape_filter($this->env, $this->getAttribute($context["sexo"], "total", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 378
                $context["procentagem"] = (($this->getAttribute($context["sexo"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                // line 379
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                echo "%
                                </b>
                            </td>
                        </tr>
                    ";
            }
            // line 384
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sexo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 385
        echo "                </tbody>
            </table>

            <h5 class=\"span6\">Estado</h5>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th colspan=\"2\"></th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                    <th class=\"span1\">Percentual</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 398
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["estadoUsuario"]) ? $context["estadoUsuario"] : $this->getContext($context, "estadoUsuario")));
        foreach ($context['_seq'] as $context["_key"] => $context["estado"]) {
            // line 399
            echo "                    ";
            if ($this->getAttribute($context["estado"], "total", array())) {
                // line 400
                echo "                        <tr>
                            <td colspan=\"2\">
                                <span class=\"span6\">";
                // line 402
                echo twig_escape_filter($this->env, $this->getAttribute($context["estado"], "title", array()), "html", null, true);
                echo "</span>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 406
                echo twig_escape_filter($this->env, $this->getAttribute($context["estado"], "total", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 411
                $context["procentagem"] = (($this->getAttribute($context["estado"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                // line 412
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                echo "%
                                </b>
                            </td>
                        </tr>
                    ";
            }
            // line 417
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['estado'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 418
        echo "                </tbody>
            </table>

            <h5 class=\"span6\">Município</h5>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th colspan=\"2\"><h5 class=\"span6\"></h5></th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                    <th class=\"span1\">Percentual</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 431
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["municipioUsuario"]) ? $context["municipioUsuario"] : $this->getContext($context, "municipioUsuario")));
        foreach ($context['_seq'] as $context["_key"] => $context["municipio"]) {
            // line 432
            echo "                    ";
            if ($this->getAttribute($context["municipio"], "total", array())) {
                // line 433
                echo "                        <tr>
                            <td colspan=\"2\">
                                <span class=\"span6\">";
                // line 435
                echo twig_escape_filter($this->env, $this->getAttribute($context["municipio"], "title", array()), "html", null, true);
                echo "</span>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 439
                echo twig_escape_filter($this->env, $this->getAttribute($context["municipio"], "total", array()), "html", null, true);
                echo "
                                </b>
                            </td>
                            <td>
                                <b>
                                    ";
                // line 444
                $context["procentagem"] = (($this->getAttribute($context["municipio"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                // line 445
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                echo "%
                                </b>
                            </td>
                        </tr>
                    ";
            }
            // line 450
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['municipio'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 451
        echo "                </tbody>
            </table>

            <h5 class=\"span6\">Região</h5>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th colspan=\"2\"><h5 class=\"span6\"></h5></th>
                    <th class=\"span2\">Quantidade de Inscrições</th>
                    <th class=\"span1\">Percentual</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 464
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["regiaoUsuario"]) ? $context["regiaoUsuario"] : $this->getContext($context, "regiaoUsuario")));
        foreach ($context['_seq'] as $context["_key"] => $context["regiao"]) {
            // line 465
            echo "                    ";
            if ($this->getAttribute($context["regiao"], "total", array())) {
                // line 466
                echo "                        <tr>
                        <td colspan=\"2\">
                            <span class=\"span6\">";
                // line 468
                echo twig_escape_filter($this->env, $this->getAttribute($context["regiao"], "title", array()), "html", null, true);
                echo "</span>
                        </td>
                        <td>
                            <b>
                                ";
                // line 472
                echo twig_escape_filter($this->env, $this->getAttribute($context["regiao"], "total", array()), "html", null, true);
                echo "
                            </b>
                        </td>
                        <td>
                            <b>
                                ";
                // line 477
                $context["procentagem"] = (($this->getAttribute($context["regiao"], "total", array()) / (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) * 100);
                // line 478
                echo "                                ";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["procentagem"]) ? $context["procentagem"] : $this->getContext($context, "procentagem")), 0, 5), "html", null, true);
                echo "%
                            </b>
                        </td>
                        </tr>";
            }
            // line 482
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['regiao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 483
        echo "                </tbody>
            </table>
        </fieldset>
    </div>
    <div class=\"formulario\">
        <div class=\"botao\">
            <a class=\"buttonAzul margim gerarExcel\"
               href=\"javascript: window.location = '/relatorio/relatorio-inscricao/geral-pdf' + window.location.search;\">Gerar
                PDF</a>
            <a class=\"buttonAzul margim gerarExcel\"
               href=\"javascript: window.location = '/relatorio/relatorio-inscricao/geral-excel' + window.location.search\">Gerar
                Excel</a>
            <a class=\"buttonAzul margim gerarExcel\"
               href=\"";
        // line 496
        echo $this->env->getExtension('routing')->getPath("datasus_sisvs_expoepi_relatorio_relatorio_inscricao");
        echo "\">Voltar</a>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiRelatorioBundle:RelatorioInscricao:geral.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  881 => 496,  866 => 483,  860 => 482,  852 => 478,  850 => 477,  842 => 472,  835 => 468,  831 => 466,  828 => 465,  824 => 464,  809 => 451,  803 => 450,  794 => 445,  792 => 444,  784 => 439,  777 => 435,  773 => 433,  770 => 432,  766 => 431,  751 => 418,  745 => 417,  736 => 412,  734 => 411,  726 => 406,  719 => 402,  715 => 400,  712 => 399,  708 => 398,  693 => 385,  687 => 384,  678 => 379,  676 => 378,  668 => 373,  661 => 369,  657 => 367,  654 => 366,  650 => 365,  627 => 344,  621 => 343,  612 => 338,  610 => 337,  602 => 332,  595 => 328,  591 => 326,  588 => 325,  584 => 324,  569 => 311,  563 => 310,  554 => 305,  552 => 304,  544 => 299,  537 => 295,  533 => 293,  530 => 292,  526 => 291,  511 => 278,  505 => 277,  496 => 272,  494 => 271,  486 => 266,  479 => 262,  475 => 260,  472 => 259,  468 => 258,  453 => 245,  447 => 244,  438 => 239,  436 => 238,  428 => 233,  421 => 229,  417 => 227,  414 => 226,  410 => 225,  389 => 206,  384 => 203,  378 => 202,  369 => 197,  367 => 196,  359 => 191,  351 => 185,  348 => 184,  344 => 183,  332 => 173,  330 => 172,  325 => 169,  319 => 168,  310 => 163,  308 => 162,  300 => 157,  295 => 154,  289 => 152,  285 => 150,  283 => 149,  279 => 147,  276 => 146,  272 => 145,  257 => 132,  251 => 131,  244 => 126,  238 => 125,  235 => 124,  229 => 123,  220 => 118,  218 => 117,  210 => 112,  203 => 108,  199 => 106,  196 => 105,  192 => 104,  179 => 95,  177 => 94,  169 => 89,  162 => 85,  153 => 78,  150 => 77,  146 => 76,  137 => 71,  135 => 70,  127 => 65,  120 => 61,  116 => 59,  113 => 58,  109 => 57,  88 => 38,  82 => 37,  74 => 32,  66 => 27,  59 => 23,  55 => 21,  52 => 20,  48 => 19,  31 => 4,  28 => 3,);
    }
}
