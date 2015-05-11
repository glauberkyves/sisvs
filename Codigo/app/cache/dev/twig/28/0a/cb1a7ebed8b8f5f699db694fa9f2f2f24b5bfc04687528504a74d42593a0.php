<?php

/* DatasusSisvsExpoEpiAcompanhamentoBundle:AcompanharEvento:viewPdf.html.twig */
class __TwigTemplate_280acb1a7ebed8b8f5f699db694fa9f2f2f24b5bfc04687528504a74d42593a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<head>
    <meta charset=\"utf-8\">
    <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <style type=\"text/css\">
        @page {
            size: A4 portrait;
            @bottom-left {
                content: \"";
        // line 10
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y H:i"), "html", null, true);
        echo "\";
                font-size: 8pt;
            }
            @bottom-center {
                content: \"Página \" counter(page) \" de \" counter(pages);
                font-size: 8pt;
            }
        }
    </style>
</head>
<body>
<div class=\"box span9\">
    <div class=\"box_header\">
        ";
        // line 23
        $this->displayBlock('header', $context, $blocks);
        // line 36
        echo "    </div>
    <div class=\"formulario form-horizontal\">
        <div class=\"box\" style=\"font-size:11px;line-height:14px;\">
            <div class=\"formulario\">
                <fieldset>
                    <div class=\"espacamento-bottom20 control-group\">
                        <input type=\"hidden\" name=\"coSeqModalidade\"
                               value=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoSeqModalidade", array()), "html", null, true);
        echo "\"/>
                        <h4 class=\"pull-left\">";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoEvento", array()), "getNoEvento", array()), "html", null, true);
        echo " </h4>
                        <h4 class=\"pull-left\"> - ";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getNoModalidade", array()), "html", null, true);
        echo "</h4>
                        <h4 class=\"pull-left\">
                            ";
        // line 47
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoTipoModalidade", array())) {
            // line 48
            echo "                                - ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoTipoModalidade", array()), "getNoTipoModalidade", array()), "html", null, true);
            echo "
                            ";
        }
        // line 50
        echo "                        </h4>
                        <h4 class=\"alingInsc pull-left\">Nº
                            Inscrição: ";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getNuInscricao", array()), "html", null, true);
        echo "
                        </h4>
                    </div>
                    <div class=\"control-group\">
                        <div class=\"pull-left\">
                            <h3>
                                ";
        // line 58
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoFormularioDeInscricao", array()), "getDsTitulo", array());
        echo "
                            </h3>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class=\"formulario\" style=\"margin-top: -12px;\">
                <fieldset>
                    <legend>Identificação do Autor</legend>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Nome do Autor:</label>

                        <div class=\"controls\">
                            <span class=\"input-xlarge\">";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getNoUsuario", array()), "html", null, true);
        echo "</span>
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">CPF:</label>

                        <div class=\"controls\">
                            <span class=\"input-xlarge\">";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getCoCpfUsuario", array()), "html", null, true);
        echo "</span>
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Passaporte:</label>

                        <div class=\"controls\">
                            ";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getNuPassaporte", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Sexo:</label>

                        <div class=\"controls\">
                            ";
        // line 97
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getCoSexo", array()) == "M")) {
            // line 98
            echo "                                Masculino
                            ";
        } else {
            // line 100
            echo "                                Feminino
                            ";
        }
        // line 102
        echo "                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">CEP:</label>

                        <div class=\"controls\">
                            ";
        // line 109
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getNuCep", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Endereço residêncial:</label>

                        <div class=\"controls\">
                            ";
        // line 117
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getDsLogradouro", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Complemento:</label>

                        <div class=\"controls\">
                            ";
        // line 125
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getDsLogradouroComplemento", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Bairro / Localidade:</label>

                        <div class=\"controls\">
                            ";
        // line 133
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getDsBairro", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Estado:</label>

                        <div class=\"controls\">
                            ";
        // line 141
        if (array_key_exists("estadoUser", $context)) {
            // line 142
            echo "                                ";
            echo twig_escape_filter($this->env, (isset($context["estadoUser"]) ? $context["estadoUser"] : $this->getContext($context, "estadoUser")), "html", null, true);
            echo "
                            ";
        }
        // line 144
        echo "                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Município:</label>

                        <div class=\"controls\">
                            ";
        // line 151
        if (array_key_exists("municipioUser", $context)) {
            // line 152
            echo "                                ";
            echo twig_escape_filter($this->env, (isset($context["municipioUser"]) ? $context["municipioUser"] : $this->getContext($context, "municipioUser")), "html", null, true);
            echo "
                            ";
        }
        // line 154
        echo "                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Região:</label>

                        <div class=\"controls\">
                            ";
        // line 161
        if (array_key_exists("regiaoUser", $context)) {
            // line 162
            echo "                                ";
            echo twig_escape_filter($this->env, (isset($context["regiaoUser"]) ? $context["regiaoUser"] : $this->getContext($context, "regiaoUser")), "html", null, true);
            echo "
                            ";
        }
        // line 164
        echo "                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">E-mail 1 (institucional ou pessoal):</label>

                        <div class=\"controls\">
                            ";
        // line 171
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getDsEmailSecundario", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">E-mail 2 (institucional ou pessoal):</label>

                        <div class=\"controls\">
                            ";
        // line 179
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getDsEmail", array()), "html", null, true);
        echo "
                        </div>
                    </div>


                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Telefone Particular:</label>

                        <div class=\"controls\">
                            ";
        // line 188
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getNuDddFone", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getNuFone", array()), "html", null, true);
        echo "
                        </div>
                    </div>


                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Telefone celular:</label>

                        <div class=\"controls\">
                            ";
        // line 197
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getNuDddCelular", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoUsuario", array()), "getNuCelular", array()), "html", null, true);
        echo "
                        </div>
                    </div>
                    <div class=\"control-group span9 coAutorCheck\">
                        <label class=\"control-label\">O trabalho tem co-autor? </label>
                        ";
        // line 202
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getStAutoria", array()) == "S")) {
            // line 203
            echo "                        <div class=\"controls\">Sim</div>
                    </div>
                    <div class=\"coAutoria\">
                        <div class=\"control-group span9\">
                            <div class=\"controls span8\">
                                <table class=\"table table-bordered ui-widget-content dynamic-table\" width=\"600\">
                                    <tbody>
                                    <tr>
                                        <th>Co-Autor</th>
                                        <th>Instituição</th>
                                    </tr>
                                    ";
            // line 214
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "coAutor", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["autor"]) {
                // line 215
                echo "                                        ";
                if (($this->getAttribute($context["autor"], "stAtivo", array()) == "S")) {
                    // line 216
                    echo "                                            <tr>
                                                <td>";
                    // line 217
                    echo twig_escape_filter($this->env, $this->getAttribute($context["autor"], "getNoAutor", array()), "html", null, true);
                    echo "
                                                </td>
                                                <td>";
                    // line 219
                    echo twig_escape_filter($this->env, $this->getAttribute($context["autor"], "getNoInstituicao", array()), "html", null, true);
                    echo "
                                                </td>
                                            </tr>
                                        ";
                }
                // line 223
                echo "                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['autor'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 224
            echo "                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    ";
        } else {
            // line 230
            echo "                        Não
                    ";
        }
        // line 232
        echo "
                </fieldset>
            </div>
            <div class=\"formulario\">
                <fieldset>
                    <legend>Identificação da Instituição</legend>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Tipo de Instituição</label>

                        <div class=\"controls\">
                            ";
        // line 243
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getCoTipoInstituicao", array()), "getNoInstituicao", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Nome Completo da Instituição: </label>

                        <div class=\"controls\">
                            ";
        // line 251
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getNoInstituicao", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label for=\"cepUsuario\" class=\"control-label\">CEP: </label>

                        <div class=\"controls \">
                            ";
        // line 259
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getNuCep", array()), "html", null, true);
        echo "
                        </div>
                    </div>
                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Endereço: </label>

                        <div class=\"controls\">
                            ";
        // line 266
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getDsEndereco", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Complemento:</label>

                        <div class=\"controls\">
                            ";
        // line 274
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getDscomplemento", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Bairro / Localidade: </label>

                        <div class=\"controls\">
                            ";
        // line 282
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getNoBairro", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group  span9 divEstado\">
                        <label for=\"DDD\" class=\"control-label\">Estado</label>

                        <div class=\"controls\">
                            ";
        // line 290
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "getCoInstituicao", array(), "any", false, true), "getCoMunicipioIbge", array(), "any", false, true), "getCoUfIbge", array(), "any", false, true), "getNoUf", array(), "any", true, true)) {
            // line 291
            echo "                                ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getCoMunicipioIbge", array()), "getCoUfIbge", array()), "getNoUf", array()), "html", null, true);
            echo "
                            ";
        }
        // line 293
        echo "                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label for=\"DDD\" class=\"control-label\">Município</label>

                        <div id=\"divMunicipio\" class=\"controls\">
                            ";
        // line 300
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "getCoInstituicao", array(), "any", false, true), "getCoMunicipioIbge", array(), "any", false, true), "getNoMunicipio", array(), "any", true, true)) {
            // line 301
            echo "                                ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getCoMunicipioIbge", array()), "getNoMunicipio", array()), "html", null, true);
            echo "
                            ";
        }
        // line 303
        echo "                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Região:</label>

                        <div class=\"controls\">
                            ";
        // line 310
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getCoMunicipioIbge", array()) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getCoMunicipioIbge", array()), "getCoUfIbge", array()))) {
            // line 311
            echo "                                ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getCoMunicipioIbge", array()), "getCoUfIbge", array()), "getCoRegiao", array()), "getNoRegiao", array()), "html", null, true);
            echo "
                            ";
        }
        // line 313
        echo "                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Telefone: </label>

                        <div class=\"controls\">
                            ";
        // line 320
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getNuTelefone", array()), "html", null, true);
        echo "
                        </div>
                    </div>
                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Fax:</label>

                        <div class=\"controls\">
                            ";
        // line 327
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInstituicao", array()), "getNuFax", array()), "html", null, true);
        echo "
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class=\"formulario\" style=\"margin-top: 0px;\">
                <fieldset>
                    <legend>Área(s) da ";
        // line 334
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoEvento", array()), "getNoEvento", array()), "html", null, true);
        echo "</legend>
                    <div class=\"control-group  span9\">
                        <div class=\"control-group  span9\">
                            <div class=\"controls span12\">
                                <label class=\"span12\">";
        // line 338
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getNoArea", array()), "html", null, true);
        echo ":</label>
                            </div>
                            <div class=\"controls\" style=\"float:left;margin-left:-20px; margin-top: -10px;\">
                                ";
        // line 342
        echo "                                <ul class=\"control-list\">
                                    <li>
                                        ";
        // line 344
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoTipoClassificacao", array()), "getCoSeqTipoClassificacao", array()) == 1)) {
            // line 345
            echo "                                            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getNuTema", array(0 => true), "method"), "html", null, true);
            echo ") ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getNoTema", array()), "html", null, true);
            echo "
                                        ";
        } elseif ($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getNuTema", array())) {
            // line 347
            echo "                                            ";
            if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getNuTema", array()) == "M")) {
                // line 348
                echo "                                                a.";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getNoTema", array()), "html", null, true);
                echo "
                                            ";
            }
            // line 350
            echo "                                            ";
            if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getNuTema", array()) == "D")) {
                // line 351
                echo "                                                b.";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getNoTema", array()), "html", null, true);
                echo "
                                            ";
            }
            // line 353
            echo "                                            ";
            if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getNuTema", array()) == "E")) {
                // line 354
                echo "                                                c.";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getNoTema", array()), "html", null, true);
                echo "
                                            ";
            }
            // line 356
            echo "                                        ";
        }
        // line 357
        echo "                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            ";
        // line 365
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "stPossuiOrientador", array()) == "S")) {
            // line 366
            echo "                <div class=\"formulario\">
                    <fieldset>
                        <legend>Identificação do Orientador</legend>

                        <div class=\"control-group  span9\">
                            <label class=\"control-label\">Nome Completo do Orientador: <font
                                        color=\"red\"><b>*</b></font></label>

                            <div class=\"controls\">
                                ";
            // line 375
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getNoOrientador", array()), "html", null, true);
            echo "
                            </div>
                        </div>
                        <div class=\"control-group span9\">
                            <label class=\"control-label\">Nome Completo do Co-Orientador:</label>

                            <div class=\"controls\">
                                ";
            // line 382
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getNoCoOrientador", array()), "html", null, true);
            echo "
                            </div>
                        </div>
                    </fieldset>
                </div>
            ";
        }
        // line 388
        echo "
            <div class=\"formulario\" style=\"margin-top: 0px;\">
                <fieldset>
                    <legend>Resumo Estruturado</legend>

                    <div class=\"control-group\">
                        <div class=\"pull-left\">
                            ";
        // line 395
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoFormularioDeInscricao", array()), "getDsResumo", array());
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Título do Resumo Estruturado: </label>

                        <div class=\"controls\">
                            ";
        // line 403
        echo $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "dsTitulo", array());
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Resumo: </label>

                        <div class=\"controls\">
                            ";
        // line 411
        echo $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "dsResumo", array());
        echo "
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class=\"formulario\"  style=\"margin-top: 0px;\">
                <fieldset>
                    <legend>Apresentação</legend>

                    <div class=\"control-group\">
                        <div class=\"pull-left\">
                            ";
        // line 423
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoFormularioDeInscricao", array()), "getDsApresentacao", array());
        echo "
                        </div>
                    </div>

                    ";
        // line 427
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoInscricaoApresentacao", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["inscricaoApresentacao"]) {
            // line 428
            echo "                        <div class=\"control-group span9\">
                            <label class=\"control-label\">
                                ";
            // line 430
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "getCoApresentacao", array()), "getNoApresentacao", array()), "html", null, true);
            echo ":
                            </label>

                            <div class=\"controls\">
                                ";
            // line 434
            echo $this->getAttribute($context["inscricaoApresentacao"], "getDsApresentacao", array());
            echo "
                            </div>
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['inscricaoApresentacao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 438
        echo "                </fieldset>
            </div>
            <div class=\"formulario\"  style=\"margin-top: 0px;\">
                <fieldset>
                    <legend>Anexos</legend>

                    <div class=\"control-group\">
                        <div class=\"pull-left\">
                            ";
        // line 446
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoFormularioDeInscricao", array()), "getDsAnexos", array());
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Anexos:</label>
                    </div>

                    <div class=\"control-group span9\">
                        <div class=\"controls span8 upload\">
                            <table width=\"600\" class=\"table table-bordered ui-widget-content dynamic-table\">
                                <tbody>
                                <tr>
                                    <th>Arquivo</th>
                                </tr>
                                ";
        // line 461
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoAnexo", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["anexo"]) {
            // line 462
            echo "                                    ";
            if (($this->getAttribute($context["anexo"], "stAtivo", array()) == "S")) {
                // line 463
                echo "                                        <tr>
                                            <td>";
                // line 464
                echo twig_escape_filter($this->env, $this->getAttribute($context["anexo"], "getNoArquivo", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                    ";
            }
            // line 467
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['anexo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 468
        echo "                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class=\"formulario\"  style=\"margin-top: 0px;\">
                <fieldset>
                    <legend>Declaração de Veracidade da Informações</legend>

                    <div class=\"control-group\">
                        <div class=\"pull-left\">
                            ";
        // line 480
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoFormularioDeInscricao", array()), "getDsDeclaracao", array());
        echo "
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\">Declaração:</label>

                        <div class=\"controls span6\">
                            ";
        // line 488
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getStVeracidade", array()) == "S")) {
            // line 489
            echo "                                Sim, certifico que toda a informação citada é verídica
                            ";
        }
        // line 491
        echo "                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\">Data:</label>

                        <div class=\"controls\">
                            ";
        // line 498
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getDtVeracidade", array()), "d/m/Y"), "html", null, true);
        echo "
                        </div>
                    </div>

                    <div class=\"control-group span9\">
                        <label class=\"control-label\">Nome Completo do Autor Principal:</label>
                        <div class=\"controls\">
                            ";
        // line 505
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNoUsuario", array()), "html", null, true);
        echo "
                        </div>
                    </div>

                </fieldset>
            </div>
        </div>
        <style type=\"text/css\">
            button,input,label,select,textarea{font-size:11px;font-weight:400;line-height:18px}blockquote small:before{display:none!important}.alingLabel{margin-left:0}.control-group blockquote{margin-left:4px}.control-group blockquote p{margin-bottom:5px;margin-top:5px}.control-group{content:\"\";display:table;margin-bottom:0!important}legend{-moz-border-bottom-colors:none!important;-moz-border-left-colors:none!important;-moz-border-right-colors:none!important;-moz-border-top-colors:none!important;border-color:-moz-use-text-color -moz-use-text-color #e5e5e5!important;border-image:none!important;border-style:none none solid!important;border-width:0 0 1px!important;color:#333!important;display:block!important;font-size:13.5px!important;line-height:18px!important;margin-bottom:6px!important;padding:0!important;width:103%!important}.table td,.table th{border-top:1px solid #ddd!important;font-size:11px!important;line-height:12px!important;padding:4px!important;text-align:left!important;vertical-align:top!important}.box h4{color:#064060!important;display:block!important;font-size:13px!important;margin:0 0 0 10px!important}.box h3{color:#064060!important;display:block!important;font-size:13px!important;margin-bottom:18px!important;margin-top:8px!important}.form-horizontal .control-label{float:left;padding-top:5px;text-align:left;width:175px!important}.alingInsc{float:right!important;left:76%!important;position:absolute!important}.titulo_sistema h1{float:none!important;font-size:12px!important;line-height:18px!important;margin-left:0!important;padding-right:4px!important}.espacamento-bottom20{margin-bottom:20px;margin-left:-10px;margin-top:-10px!important;width:700px}
            .logo{float:left;margin:0;padding-left:0;padding-right:5px;padding-top:5px}.logo img{margin-left:0;margin-top:-5px}.titulo_sistema{width:699px;font-size:11.5px;text-align:justify}.pull-left{float:left}div.controls .aling-content{position:relative;top:5px}.table-bordered td,.table-bordered th{border-bottom:1px solid #ddd;border-left:1px solid #ddd;border-right:1px solid #ddd}.table td,.table th{border-top:1px solid #DDD;line-height:18px;padding:8px;text-align:left;vertical-align:top}.box h4{color:#064060;display:block;font-size:15px;margin:0 0 0 10px}.control-group{margin-bottom:9px;content:\"\";display:table}label{color:#064060!important;border-radius:3px}.controls{color:#666!important;padding-left:0!important;padding-top:5px;line-height:17px}body{background-color:#FFF;color:#333;font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif;margin:0}.span9{width:690px}.span6{width:460px}p{margin:0 0 9px;color:#666 !important;}ol,ul{list-style:none}.box .tabela table .none_right{border-right:medium none;width:232px}.tabela table .none_bottom{border-bottom:medium none}.tabela table tbody tr.color{background-color:#E8E3E3}.tabela table tbody td{border-bottom:1px solid #064060;border-right:1px solid #064060;color:#064060;float:left;font-size:1.2em;padding:5px 0;text-align:center;width:301px}ul.control-list li{float:inherit;left:-15px;margin-bottom:5px;position:relative}.table-bordered caption+tbody tr:first-child td,.table-bordered caption+tbody tr:first-child th,.table-bordered caption+thead tr:first-child th,.table-bordered colgroup+tbody tr:first-child td,.table-bordered colgroup+tbody tr:first-child th,.table-bordered colgroup+thead tr:first-child th,.table-bordered tbody:first-child tr:first-child td,.table-bordered tbody:first-child tr:first-child th,.table-bordered thead:first-child tr:first-child th{border-top:0 none}.table-bordered tbody:first-child tr:first-child td:first-child,.table-bordered thead:first-child tr:first-child th:first-child{border-top-left-radius:4px}.table-bordered tbody:first-child tr:first-child td:last-child,.table-bordered thead:first-child tr:first-child th:last-child{border-top-right-radius:4px}.table-bordered tbody:last-child tr:last-child td:first-child,.table-bordered thead:last-child tr:last-child th:first-child{border-radius:0 0 0 4px}.table-bordered tbody:last-child tr:last-child td:last-child,.table-bordered thead:last-child tr:last-child th:last-child{border-bottom-right-radius:4px}.table-striped tbody tr:nth-child(2n+1) td,.table-striped tbody tr:nth-child(2n+1) th{background-color:#F9F9F9}.table tbody tr:hover td,.table tbody tr:hover th{background-color:#F5F5F5}
        </style>
    </div>
</div>
</body>
</html>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "SIEPI";
    }

    // line 23
    public function block_header($context, array $blocks = array())
    {
        // line 24
        echo "            ";
        $context["header"] = $this->env->getExtension('header_pdf_extension')->headerPdf($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getCoTema", array()), "getCoArea", array()), "getCoModalidade", array()), "getCoEvento", array()), "getAnEvento", array()));
        // line 25
        echo "            <div class=\"span9\">
                <div class=\"logo\">
                    <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["header"]) ? $context["header"] : $this->getContext($context, "header")), "noLogotipo", array(), "array"), "html", null, true);
        echo "\" class=\"img-circle \" width=\"120\" height=\"60\"/>
                </div>
                <div class=\"titulo_sistema\">
                    <h1 style=\"text-align:left !important;\">";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["header"]) ? $context["header"] : $this->getContext($context, "header")), "noEvento", array(), "array"), "html", null, true);
        echo " <span style=\"font-weight: normal !important;text-align:left !important;\">- MOSTRA NACIONAL DE EXPERIÊNCIAS BEM-SUCEDIDAS EM EPIDEMIOLOGIA,
            PREVENÇÃO E CONTROLE DE DOENÇAS <br/>MINISTÉRIO DA SAÚDE / SECRETARIA DE VIGILÂNCIA EM SAÚDE</span></h1>
                </div>
                <hr class=\"separetor\"/>
            </div>
        ";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAcompanhamentoBundle:AcompanharEvento:viewPdf.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  828 => 30,  822 => 27,  818 => 25,  815 => 24,  812 => 23,  806 => 4,  787 => 505,  777 => 498,  768 => 491,  764 => 489,  762 => 488,  751 => 480,  737 => 468,  731 => 467,  725 => 464,  722 => 463,  719 => 462,  715 => 461,  697 => 446,  687 => 438,  677 => 434,  670 => 430,  666 => 428,  662 => 427,  655 => 423,  640 => 411,  629 => 403,  618 => 395,  609 => 388,  600 => 382,  590 => 375,  579 => 366,  577 => 365,  567 => 357,  564 => 356,  558 => 354,  555 => 353,  549 => 351,  546 => 350,  540 => 348,  537 => 347,  529 => 345,  527 => 344,  523 => 342,  517 => 338,  510 => 334,  500 => 327,  490 => 320,  481 => 313,  475 => 311,  473 => 310,  464 => 303,  458 => 301,  456 => 300,  447 => 293,  441 => 291,  439 => 290,  428 => 282,  417 => 274,  406 => 266,  396 => 259,  385 => 251,  374 => 243,  361 => 232,  357 => 230,  349 => 224,  343 => 223,  336 => 219,  331 => 217,  328 => 216,  325 => 215,  321 => 214,  308 => 203,  306 => 202,  297 => 197,  284 => 188,  272 => 179,  261 => 171,  252 => 164,  246 => 162,  244 => 161,  235 => 154,  229 => 152,  227 => 151,  218 => 144,  212 => 142,  210 => 141,  199 => 133,  188 => 125,  177 => 117,  166 => 109,  157 => 102,  153 => 100,  149 => 98,  147 => 97,  136 => 89,  125 => 81,  114 => 73,  96 => 58,  87 => 52,  83 => 50,  77 => 48,  75 => 47,  70 => 45,  66 => 44,  62 => 43,  53 => 36,  51 => 23,  35 => 10,  26 => 4,  21 => 1,);
    }
}
