<?php

/* DatasusSisvsExpoEpiAutorBundle:Painel:form.html.twig */
class __TwigTemplate_f5e9f9e25010af62c9fece51e46136aa5ba5649cb1fec89a1c0f0913dc2aa21a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_errors' => array($this, 'block_form_errors'),
            'tituloFormulario' => array($this, 'block_tituloFormulario'),
            'formDescritivo' => array($this, 'block_formDescritivo'),
            'botaoFormulario' => array($this, 'block_botaoFormulario'),
            'scriptFormulario' => array($this, 'block_scriptFormulario'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => $this));
        // line 2
        echo "    ";
        $this->displayBlock('form_errors', $context, $blocks);
        // line 4
        echo "
    ";
        // line 5
        $this->displayBlock('tituloFormulario', $context, $blocks);
        // line 15
        echo "
<div class=\"box\">
    ";
        // line 17
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("class" => "form-horizontal", "ignore-input" => "false"), "multipart" => true));
        echo "
    ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
    ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coSeqInscricao", array()), 'widget');
        echo "

    <div class=\"formulario\">
        <fieldset>
            <div class=\"espacamento-bottom20 control-group\">
                <input type=\"hidden\" name=\"coSeqModalidade\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoSeqModalidade", array()), "html", null, true);
        echo "\"/>
                <h4 class=\"pull-left\">";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoEvento", array()), "getNoEvento", array()), "html", null, true);
        echo " </h4>
                <h4 class=\"pull-left\"> - ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getNoModalidade", array()), "html", null, true);
        echo "</h4>
                <h4 class=\"pull-left\">
                    ";
        // line 28
        if ($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoTipoModalidade", array())) {
            // line 29
            echo "                        - ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoTipoModalidade", array()), "getNoTipoModalidade", array()), "html", null, true);
            echo "
                    ";
        }
        // line 31
        echo "                </h4>
                ";
        // line 32
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getNuInscricao", array())) {
            // line 33
            echo "                    <h4 class=\"alingInsc pull-right\">Número da
                        Inscrição: ";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getNuInscricao", array()), "html", null, true);
            echo "
                    </h4>
                ";
        }
        // line 37
        echo "            </div>

            <div class=\"control-group\">
                <label class=\"pull-left\"></label>

                <div class=\"pull-left\">
                    <h3>";
        // line 43
        echo $this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "getDsTitulo", array());
        echo "</h3>
                </div>

            </div>
            ";
        // line 47
        $this->displayBlock('formDescritivo', $context, $blocks);
        // line 83
        echo "    <div class=\"formulario\">
        <fieldset>
            <legend>Identificação do Autor</legend>

            <div class=\"box\">
                <div class=\"control-group\">
                    <label class=\"control-label\">Nome do Autor:</label>

                    <div class=\"controls\">
                        <input type=\"text\" class=\"span6\" maxlength=\"120\" disabled value=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNoUsuario", array()), "html", null, true);
        echo "\">
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">CPF:</label>

                    <div class=\"controls\">
                        <input type=\"text\" class=\"span6\" maxlength=\"9\" mask=\"cpf\" disabled
                               value=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getCoCpfUsuario", array()), "html", null, true);
        echo "\">
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">Passaporte:</label>

                    <div class=\"controls\">
                        <input type=\"text\" class=\"span6\" maxlength=\"9\" disabled value=\"";
        // line 109
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuPassaporte", array()), "html", null, true);
        echo "\">
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">Sexo:</label>

                    <div class=\"controls\">
                        ";
        // line 117
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getCoSexo", array()) == "M")) {
            // line 118
            echo "                            <input type=\"text\" maxlength=\"9\" disabled value=\"Masculino\"/>
                        ";
        } else {
            // line 120
            echo "                            <input type=\"text\" maxlength=\"9\" disabled value=\"Feminino\"/>
                        ";
        }
        // line 122
        echo "                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">CEP:</label>

                    <div class=\"controls\">
                        <input type=\"text\" maxlength=\"8\" mask=\"cep\" disabled value=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuCep", array()), "html", null, true);
        echo "\">
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">Endereço residêncial:</label>

                    <div class=\"controls\">
                        <input type=\"text\" class=\"span6\" maxlength=\"120\" disabled value=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getDsLogradouro", array()), "html", null, true);
        echo "\">
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">Complemento:</label>

                    <div class=\"controls\">
                        <input type=\"text\" class=\"span6\" maxlength=\"10\" disabled
                               value=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getDsLogradouroComplemento", array()), "html", null, true);
        echo "\">
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">Bairro / Localidade:</label>

                    <div class=\"controls\">
                        <input type=\"text\" class=\"span6\" maxlength=\"60\" disabled value=\"";
        // line 154
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getDsBairro", array()), "html", null, true);
        echo "\">
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">Estado:</label>

                    <div class=\"controls\">
                        <select class=\"span6 alingCombo\" disabled>
                            ";
        // line 163
        if (array_key_exists("estadoUser", $context)) {
            // line 164
            echo "                                <option>";
            echo twig_escape_filter($this->env, (isset($context["estadoUser"]) ? $context["estadoUser"] : $this->getContext($context, "estadoUser")), "html", null, true);
            echo "</option>
                            ";
        }
        // line 166
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">Município:</label>

                    <div class=\"controls\">
                        <select class=\"span6 alingCombo\" disabled>
                            ";
        // line 175
        if (array_key_exists("municipioUser", $context)) {
            // line 176
            echo "                                <option>";
            echo twig_escape_filter($this->env, (isset($context["municipioUser"]) ? $context["municipioUser"] : $this->getContext($context, "municipioUser")), "html", null, true);
            echo "</option>
                            ";
        }
        // line 178
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">Região:</label>

                    <div class=\"controls\">
                        <select class=\"span6 alingCombo\" disabled>
                            ";
        // line 187
        if (array_key_exists("regiaoUser", $context)) {
            // line 188
            echo "                                <option>";
            echo twig_escape_filter($this->env, (isset($context["regiaoUser"]) ? $context["regiaoUser"] : $this->getContext($context, "regiaoUser")), "html", null, true);
            echo "</option>
                            ";
        }
        // line 190
        echo "                        </select>
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\"
                           for=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity_dsEmailSecundario\">E-mail 1
                        (institucional ou pessoal): <font color=\"red\"><b>*</b></font></label></label>
                    <div class=\"controls\">
                        ";
        // line 199
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dsEmailSecundario", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">E-mail 2 (institucional ou pessoal):</label>

                    <div class=\"controls\">
                        <input type=\"text\" class=\"span6\" disabled value=\"";
        // line 207
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getDsEmail", array()), "html", null, true);
        echo "\">
                    </div>
                </div>


                <div class=\"control-group\">
                    <label class=\"control-label\">Telefone Particular:</label>

                    <div class=\"controls\">
                        ";
        // line 216
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuDddFone", array())) < 3)) {
            // line 217
            echo "                            <input type=\"text\" class=\"span6\" mask=\"(99) *9999-9999\" disabled
                                   value=\"";
            // line 218
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuDddFone", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuFone", array()), "html", null, true);
            echo "\">
                        ";
        }
        // line 220
        echo "                        ";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuDddFone", array())) == 3)) {
            // line 221
            echo "                            <input type=\"text\" class=\"span6\" mask=\"(999) *9999-9999\" disabled
                                   value=\"";
            // line 222
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuDddFone", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuFone", array()), "html", null, true);
            echo "\">
                        ";
        }
        // line 224
        echo "                    </div>
                </div>


                <div class=\"control-group\">
                    <label class=\"control-label\">Telefone celular:</label>

                    <div class=\"controls\">
                        ";
        // line 232
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuDddCelular", array())) < 3)) {
            // line 233
            echo "                            <input type=\"text\" class=\"span6\" mask=\"(99) *9999-9999\" disabled
                                   value=\"";
            // line 234
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuDddCelular", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuCelular", array()), "html", null, true);
            echo "\">
                        ";
        }
        // line 236
        echo "                        ";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuDddCelular", array())) == 3)) {
            // line 237
            echo "                            <input type=\"text\" class=\"span6\" mask=\"(999) *9999-9999\" disabled
                                   value=\"";
            // line 238
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuDddCelular", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNuCelular", array()), "html", null, true);
            echo "\">
                        ";
        }
        // line 240
        echo "                    </div>
                </div>

                <div class=\"control-group coAutorCheck\">
                    <label class=\"control-label\" for=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_0\">O
                        trabalho
                        tem co-autor? <font color=\"red\"><b>*</b></font></label>

                    <div class=\"controls\">
                        <label class=\"radio\">
                            ";
        // line 250
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "stAutoria", array()) == "S")) {
            // line 251
            echo "                                <input type=\"radio\" name=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity[stAutoria]\"
                                       checked
                                       id=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_0\" value=\"S\">
                            ";
        } else {
            // line 255
            echo "                                <input type=\"radio\" name=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity[stAutoria]\"
                                       id=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_0\" value=\"S\">
                            ";
        }
        // line 258
        echo "                            &ensp;Sim
                        </label>
                        <label class=\"radio\">
                            ";
        // line 261
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "stAutoria", array()) == "N")) {
            // line 262
            echo "                                <input type=\"radio\" name=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity[stAutoria]\"
                                       checked
                                       id=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_1\" value=\"N\">
                            ";
        } else {
            // line 266
            echo "                                <input type=\"radio\" name=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity[stAutoria]\"
                                       id=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_1\" value=\"N\">
                            ";
        }
        // line 269
        echo "                            &ensp;Não
                        </label>
                    </div>
                </div>

                <div class=\"coAutoria hide\">
                    <div class=\"control-group\">
                        <label class=\"control-label\" for=\"coAutor\">Nome do Co-autor <font
                                    color=\"red\"><b>*</b></font></label>

                        <div class=\"controls\">
                            <input type=\"text\" id=\"coAutor\" maxlength=\"120\"/>
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\" for=\"noInstituicao\">Nome da Instituição <font
                                    color=\"red\"><b>*</b></font></label>

                        <div class=\"controls\">
                            <input type=\"text\" id=\"noInstituicao\" maxlength=\"60\"/>

                            <button type=\"button\" class=\"btn btn-mini\" id=\"btAdicionar\" title=\"Adicionar\"><i
                                        class=\"icon-plus\"></i>
                            </button>
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <div class=\"controls span8 margin-left-20\">
                            <span class=\"table\"></span>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>

    <div class=\"formulario\">
        <fieldset>
            <legend>Identificação da Instituição</legend>

            <div class=\"box\">
                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"coTipoInstituicao\">Tipo de Instituição: <font
                                color=\"red\"><b>*</b></font></label>

                    <div class=\"controls\">
                        ";
        // line 317
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "coTipoInstituicao", array()), 'widget');
        echo "
                        ";
        // line 318
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoModalidadeInstituicao", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["modalidadeInstituicao"]) {
            // line 319
            echo "                            <ul class=\"ajustRadio\">
                                <li>
                                    <input type=\"radio\"
                                           value=\"";
            // line 322
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["modalidadeInstituicao"], "getCoInstituicao", array()), "getCoSeqInstituicao", array()), "html", null, true);
            echo "\"
                                           name=\"coTipoInstituicao\" id=\"coTipoInstituicao\"
                                            ";
            // line 324
            if (($this->getAttribute($this->getAttribute($context["modalidadeInstituicao"], "getCoInstituicao", array()), "getCoSeqInstituicao", array()) == $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "coTipoInstituicao", array()), "vars", array()), "value", array()))) {
                // line 325
                echo "                                                checked=\"checked\"
                                            ";
            }
            // line 327
            echo "                                            />
                                    ";
            // line 328
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["modalidadeInstituicao"], "getCoInstituicao", array()), "getNoInstituicao", array()), "html", null, true);
            echo "
                                </li>
                            </ul>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modalidadeInstituicao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 332
        echo "                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"";
        // line 336
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "noInstituicao", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\">Nome
                        Completo da
                        Instituição: <font color=\"red\"><b>*</b></font></label>

                    <div class=\"controls\">
                        ";
        // line 341
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "coSeqInstituicao", array()), 'widget');
        echo "
                        ";
        // line 342
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "noInstituicao", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label for=\"";
        // line 347
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "nuCep", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\" class=\"control-label\">CEP: <font
                                color=\"red\"><b>*</b></font></label>

                    <div class=\"controls \">
                        ";
        // line 351
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "nuCep", array()), 'widget');
        echo "
                    </div>
                </div>
                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"";
        // line 355
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "dsEndereco", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\">Endereço:
                        <font
                                color=\"red\"><b>*</b></font></label>

                    <div class=\"controls\">
                        ";
        // line 360
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "dsEndereco", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\">Complemento:</label>

                    <div class=\"controls\">
                        ";
        // line 368
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "dsComplemento", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"";
        // line 373
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "noBairro", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\">Bairro /
                        Localidade:
                        <font color=\"red\"><b>*</b></font></label>

                    <div class=\"controls\">
                        ";
        // line 378
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "noBairro", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group divEstado\">
                    <label for=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coUfIbge\"
                           class=\"control-label\">Estado: <font color=\"red\"><b>*</b></font></label></label>

                    <div class=\"controls\">
                        ";
        // line 387
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "coUfIbge", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label for=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge\"
                           class=\"control-label\">Município: <font color=\"red\"><b>*</b></font></label></label>

                    <div id=\"divMunicipio\" class=\"controls required\">

                        ";
        // line 397
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "coMunicipioIbge", array()), 'widget');
        echo "

                        <input id=\"comunicipio_hidden\" value=\"\" type=\"hidden\"
                               name=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity[coInstituicao][coMunicipioIbge]\">
                    </div>
                </div>

                <div class=\"control-group\">
                    <label for=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_noRegiao\"
                           class=\"control-label\">Região: <font color=\"red\"><b>*</b></font></label></label>

                    <div class=\"controls\">
                        ";
        // line 409
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "noRegiao", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"";
        // line 414
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "nuTelefone", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\">Telefone:
                        <font
                                color=\"red\"><b>*</b></font></label>

                    <div class=\"controls\">
                        ";
        // line 419
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "nuTelefone", array()), 'widget');
        echo "
                    </div>
                </div>
                <div class=\"control-group\">
                    <label class=\"control-label\">Fax:</label>

                    <div class=\"controls\">
                        ";
        // line 426
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInstituicao", array()), "vars", array()), "form", array()), "nuFax", array()), 'widget');
        echo "
                    </div>
                </div>
            </div>
        </fieldset>
    </div>


    <div class=\"formulario\">
        <fieldset>
            <legend>Área(s) da ";
        // line 436
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoEvento", array()), "getNoEvento", array()), "html", null, true);
        echo "</legend>

            <div class=\"box\">
                <label class=\"hide\" for=\"coTema\">Área(s) da ";
        // line 439
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoEvento", array()), "getNoEvento", array()), "html", null, true);
        echo "</label>

                ";
        // line 441
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coTema", array()), 'widget');
        echo "
                <div class=\"accordion\" id=\"accordion2\">
                    ";
        // line 443
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoArea", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["area"]) {
            // line 444
            echo "                        ";
            if (($this->getAttribute($context["area"], "getStAtivo", array()) == "S")) {
                // line 445
                echo "                            <div class=\"accordion-group\">
                                <div class=\"accordion-heading\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion2\"
                                       href=\"#area-";
                // line 448
                echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "getCoSeqArea", array()), "html", null, true);
                echo "\">
                                        <b>";
                // line 449
                echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "getNoArea", array()), "html", null, true);
                echo ":</b> <font color=\"red\"><b>*</b></font>
                                    </a>
                                </div>

                                <div id=\"area-";
                // line 453
                echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "getCoSeqArea", array()), "html", null, true);
                echo "\" class=\"accordion-body collapse\">
                                    <div class=\"accordion-inner\">
                                        <ul class=\"control-list\">
                                            ";
                // line 456
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["area"], "getCoTema", array()));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["tema"]) {
                    // line 457
                    echo "                                                <li>
                                                    ";
                    // line 458
                    if (($this->getAttribute($context["tema"], "getStAtivo", array()) == "S")) {
                        // line 459
                        echo "                                                        <input type=\"radio\"
                                                               value=\"";
                        // line 460
                        echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getCoSeqTema", array()), "html", null, true);
                        echo "\"
                                                               name=\"tema\"
                                                                ";
                        // line 462
                        if (($this->getAttribute($context["tema"], "getCoSeqTema", array()) == $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coTema", array()), "vars", array()), "value", array()))) {
                            // line 463
                            echo "                                                                    checked=\"checked\"
                                                                ";
                        }
                        // line 465
                        echo "                                                               id=\"coTema\" class=\"required\"/>&emsp;

                                                        ";
                        // line 467
                        if (($this->getAttribute($this->getAttribute($context["tema"], "getCoTipoClassificacao", array()), "getCoSeqTipoClassificacao", array()) == 1)) {
                            // line 468
                            echo "                                                            <b>";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getNuTema", array(0 => true), "method"), "html", null, true);
                            echo ")</b> ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getNoTema", array()), "html", null, true);
                            echo "
                                                        ";
                        } elseif ($this->getAttribute($context["tema"], "getNuTema", array())) {
                            // line 470
                            echo "                                                            ";
                            if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                                // line 471
                                echo "                                                                a.";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getNoTema", array()), "html", null, true);
                                echo "
                                                            ";
                            }
                            // line 473
                            echo "                                                            ";
                            if (($this->getAttribute($context["loop"], "index", array()) == 2)) {
                                // line 474
                                echo "                                                                b.";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getNoTema", array()), "html", null, true);
                                echo "
                                                            ";
                            }
                            // line 476
                            echo "                                                            ";
                            if (($this->getAttribute($context["loop"], "index", array()) == 3)) {
                                // line 477
                                echo "                                                                c.";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getNoTema", array()), "html", null, true);
                                echo "
                                                            ";
                            }
                            // line 479
                            echo "                                                        ";
                        }
                        // line 480
                        echo "                                                    ";
                    }
                    // line 481
                    echo "                                                </li>
                                            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tema'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 483
                echo "                                        </ul>
                                    </div>
                                </div>
                            </div>
                        ";
            }
            // line 488
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 489
        echo "                </div>
            </div>
        </fieldset>
    </div>

    ";
        // line 494
        if (($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "stPossuiOrientador", array()) == "S")) {
            // line 495
            echo "        <div class=\"formulario\">
            <fieldset>
                <legend>Identificação do Orientador</legend>

                <div class=\"box\">
                    <div class=\"control-group\">
                        <label class=\"control-label\" for=\"";
            // line 501
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "noOrientador", array()), "vars", array()), "id", array()), "html", null, true);
            echo "\">Nome Completo do Orientador:
                            <font
                                    color=\"red\"><b>*</b></font></label>

                        <div class=\"controls\">
                            ";
            // line 506
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "noOrientador", array()), 'widget');
            echo "
                        </div>
                    </div>

                    <div class=\"control-group\">
                        <label class=\"control-label\">Nome Completo do Co-Orientador:</label>

                        <div class=\"controls\">
                            ";
            // line 514
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "noCoOrientador", array()), 'widget');
            echo "
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    ";
        }
        // line 521
        echo "
    <div class=\"formulario\">
        <fieldset>
            <legend>Resumo Estruturado</legend>

            <div class=\"box\">
                <div class=\"control-group\">
                    <div class=\"pull-left\" style=\"text-align: justify;\">
                        ";
        // line 529
        echo $this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "getDsResumo", array());
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"";
        // line 534
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dsTitulo", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\">Título do Resumo Estruturado: <font
                                color=\"red\"><b>*</b></font></label>

                    <div class=\"controls\">
                        ";
        // line 538
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dsTitulo", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"";
        // line 543
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dsResumo", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\">Resumo: <font
                                color=\"red\"><b>*</b></font></label>

                    <div class=\"controls\">
                        ";
        // line 547
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dsResumo", array()), 'widget');
        echo "
                    </div>
                </div>
            </div>
        </fieldset>
    </div>

    <div class=\"formulario\">
        <fieldset>
            <legend>Apresentação</legend>

            <div class=\"box\">
                <div class=\"control-group\">
                    <div class=\"pull-left\" style=\"text-align: justify;\">
                        ";
        // line 561
        echo $this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "dsApresentacao", array());
        echo "
                    </div>
                </div>

                ";
        // line 565
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coInscricaoApresentacao", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["inscricaoApresentacao"]) {
            // line 566
            echo "                    <div class=\"control-group\">
                        <label class=\"control-label apresentacao\" data-placement=\"right\" data-toggle=\"tooltip\"
                               data-original-title=\"";
            // line 568
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getDsApresentacao", array()), "html", null, true);
            echo "\"
                               for=\"";
            // line 569
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), "vars", array()), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()), "html", null, true);
            echo "
                            :
                            <font color=\"red\"><b>*</b></font></label>

                        <div class=\"controls\">
                            ";
            // line 574
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "coApresentacao", array()), 'widget');
            echo "
                            ";
            // line 575
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Título") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "título"))) {
                // line 576
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 250)));
                echo "

                            ";
            } elseif ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Objetivos") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "objetivos"))) {
                // line 579
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 500)));
                echo "

                            ";
            } elseif ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Métodos") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "métodos"))) {
                // line 582
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 1500)));
                echo "

                            ";
            } elseif (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Descrição das técnicas, métodos ou processos de trabalho") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "descrição das técnicas, métodos ou processos de trabalho")) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Descrição das Técnicas, Métodos ou Processos de Trabalho"))) {
                // line 585
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 1500)));
                echo "

                            ";
            } elseif ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Descrição de como foi desenvolvida") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "descrição de como foi desenvolvida"))) {
                // line 588
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 1500)));
                echo "

                            ";
            } elseif (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Principais Resultados") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Principais resultados")) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "principais resultados"))) {
                // line 591
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 6000)));
                echo "

                            ";
            } elseif (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Principais Resultados Alcançados") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Principais resultados alcançados")) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "principais resultados alcançados"))) {
                // line 594
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 6000)));
                echo "

                            ";
            } elseif (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Principais Resultados Alcançados que Podem ser Atribuídos à Intervenção Social") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Principais resultados alcançados que podem ser atribuídos à intervenção social")) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "principais resultados alcançados que podem ser atribuídos à intervenção social"))) {
                // line 597
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 6000)));
                echo "

                            ";
            } elseif ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Conclusões e/ou recomendações para a Saúde Pública") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "conclusões e/ou recomendações para a saúde pública"))) {
                // line 600
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 2000)));
                echo "

                            ";
            } elseif ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "Conclusões") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["inscricaoApresentacao"], "vars", array()), "value", array()), "getCoApresentacao", array()), "getNoApresentacao", array()) == "conclusões"))) {
                // line 603
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 2000)));
                echo "

                            ";
            } else {
                // line 606
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["inscricaoApresentacao"], "dsApresentacao", array()), 'widget', array("attr" => array("maxlength" => 3000)));
                echo "

                            ";
            }
            // line 609
            echo "                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['inscricaoApresentacao'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 612
        echo "            </div>
        </fieldset>
    </div>

    <div class=\"formulario\">
        <fieldset>
            <legend>Anexos</legend>

            <div class=\"box\">
                <div class=\"control-group\">
                    <div class=\"pull-left\" style=\"text-align: justify;\">
                        ";
        // line 623
        echo $this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "dsAnexos", array());
        echo "
                    </div>
                </div>
                ";
        // line 626
        if (($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getStExigeAnexo", array()) == "S")) {
            // line 627
            echo "                    <div class=\"control-group\">
                        <label class=\"control-label\" for=\"upload\">
                            Upload do Anexo: <font color=\"red\"><b>*</b></font>
                        </label>

                        <div class=\"controls div-upload\">
                            <input type=\"file\" id=\"upload\" class=\"input-file span4 required\"
                                   name=\"\">
                            <button type=\"button\" class=\"btn btn-mini\" id=\"btAdicionarUpload\" title=\"Adicionar\">
                                <i class=\"icon-plus\"></i>
                            </button>
                        </div>
                    </div>
                ";
        } else {
            // line 641
            echo "                    <div class=\"control-group\">
                        <label class=\"control-label\" for=\"upload\">
                            Upload do Anexo:
                        </label>

                        <div class=\"controls div-upload\">
                            <input type=\"file\" id=\"upload\" class=\"input-file span4\"
                                   name=\"\">
                            <button type=\"button\" class=\"btn btn-mini\" id=\"btAdicionarUpload\" title=\"Adicionar\">
                                <i class=\"icon-plus\"></i>
                            </button>
                        </div>
                    </div>
                ";
        }
        // line 655
        echo "                <div class=\"control-group\">
                    <label class=\"control-label\"></label>

                    <div class=\"controls span8 upload margin-left-20\">
                    </div>
                </div>
            </div>
        </fieldset>
    </div>


    <div class=\"formulario\">
        <fieldset>
            <legend>Declaração de Veracidade da Informações</legend>

            <div class=\"box\">
                <div class=\"control-group\">
                    <div class=\"pull-left\" style=\"text-align: justify;\">
                        ";
        // line 673
        echo $this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "getDsDeclaracao", array());
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"";
        // line 678
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "stVeracidade", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\">Declaração: <font
                                color=\"red\"><b>*</b></font></label>

                    <div class=\"controls\">
                        ";
        // line 682
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "stVeracidade", array()), 'widget');
        echo " Sim, certifico que toda a informação citada é verídica
                    </div>
                </div>
                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"\">Data:</label>

                    <div class=\"controls\">
                        <span class=\"span6\">
                                ";
        // line 690
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coSeqInscricao", array()), "vars", array()), "value", array()) == null)) {
            // line 691
            echo "                                    ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d-m-Y"), "html", null, true);
            echo "
                                ";
        } else {
            // line 693
            echo "                                    ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["dataInscricao"]) ? $context["dataInscricao"] : $this->getContext($context, "dataInscricao")), "d/m/Y"), "html", null, true);
            echo "
                                ";
        }
        // line 695
        echo "                        </span>
                    </div>
                </div>
                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"\">Nome Completo do Autor Principal:</label>

                    <div class=\"controls\">
                        <span class=\"span6\"> ";
        // line 702
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getNoUsuario", array()), "html", null, true);
        echo "</span>
                    </div>
                </div>
            </div>

        </fieldset>

        ";
        // line 709
        $this->displayBlock('botaoFormulario', $context, $blocks);
        // line 723
        echo "    </div>
    </form>
</div>

";
        // line 727
        $this->displayBlock('scriptFormulario', $context, $blocks);
        // line 982
        echo "

";
    }

    // line 2
    public function block_form_errors($context, array $blocks = array())
    {
        // line 3
        echo "    ";
    }

    // line 5
    public function block_tituloFormulario($context, array $blocks = array())
    {
        // line 6
        echo "        <strong class=\"title\">
            ";
        // line 7
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coSeqInscricao", array()), "vars", array()), "value", array())) {
            // line 8
            echo "                Alterar
            ";
        } else {
            // line 10
            echo "                Incluir
            ";
        }
        // line 12
        echo "            dados da Inscrição
        </strong>
    ";
    }

    // line 47
    public function block_formDescritivo($context, array $blocks = array())
    {
        // line 48
        echo "            <div class=\"control-group\">
                <div class=\"pull-left\" style=\"text-align: justify;\">
                    ";
        // line 50
        echo $this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "getDsObjeto", array());
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"pull-left\">
                    <label class=\"control-label span10 alingLabel\"> <b> ";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getNoModalidade", array()), "html", null, true);
        echo " </b></label>
                    <blockquote class=\"span10\">
                        ";
        // line 57
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoArea", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["area"]) {
            // line 58
            echo "                            <p>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "getNoArea", array()), "html", null, true);
            echo ".</p>
                            ";
            // line 59
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["area"], "getCoTema", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["tema"]) {
                // line 60
                echo "                                <small>";
                if (($this->getAttribute($context["tema"], "getStAtivo", array()) == "S")) {
                    // line 61
                    echo "                                        ";
                    if (($this->getAttribute($this->getAttribute($context["tema"], "getCoTipoClassificacao", array()), "getCoSeqTipoClassificacao", array()) == 1)) {
                        // line 62
                        echo "                                            ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getNuTema", array(0 => true), "method"), "html", null, true);
                        echo ") ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getNoTema", array()), "html", null, true);
                        echo "
                                        ";
                    } elseif ($this->getAttribute($context["tema"], "getNuTema", array())) {
                        // line 64
                        echo "                                            ";
                        if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                            // line 65
                            echo "                                                a.";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getNoTema", array()), "html", null, true);
                            echo "
                                            ";
                        }
                        // line 67
                        echo "                                            ";
                        if (($this->getAttribute($context["loop"], "index", array()) == 2)) {
                            // line 68
                            echo "                                                b.";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getNoTema", array()), "html", null, true);
                            echo "
                                            ";
                        }
                        // line 70
                        echo "                                            ";
                        if (($this->getAttribute($context["loop"], "index", array()) == 3)) {
                            // line 71
                            echo "                                                c.";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["tema"], "getNoTema", array()), "html", null, true);
                            echo "
                                            ";
                        }
                        // line 73
                        echo "                                        ";
                    }
                    // line 74
                    echo "                                    ";
                }
                echo "</small>
                            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tema'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "                    </blockquote>
                </div>
            </div>
        </fieldset>
    </div>
    ";
    }

    // line 709
    public function block_botaoFormulario($context, array $blocks = array())
    {
        // line 710
        echo "            <div class=\"botao span12 espacamento-bottom20\">
                <input type=\"submit\" class=\"buttonAzul margim\" value=\"Salvar\" id=\"salvar\" name=\"submit\"/>
                <button type=\"reset\" class=\"buttonAzul margim\" id=\"limpar\">Limpar</button>

                ";
        // line 714
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coSeqInscricao", array()), "vars", array()), "value", array())) {
            // line 715
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("autor_painel", array("coSeqModalidade" => $this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoSeqModalidade", array()))), "html", null, true);
            echo "\"
                       class=\"buttonAzul margim\">Voltar</a>
                ";
        } else {
            // line 718
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("autor_painel", array("coSeqModalidade" => $this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getCoSeqModalidade", array()))), "html", null, true);
            echo "\"
                       class=\"buttonAzul margim\">Voltar</a>
                ";
        }
        // line 721
        echo "            </div>
        ";
    }

    // line 727
    public function block_scriptFormulario($context, array $blocks = array())
    {
        // line 728
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsexpoepiautor/js/painel/form.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(document).ready(function () {
            \$('.accordion-heading a').click(function () {
                if (\$(this).parent('div').parent('div').find('div:last li').size() == 1) {
                    \$(this).parent('div').parent('div').find('div:last li input[type=radio]').click();
                }
            });

            var optCoAutor = {
                inseretAfter: \$('span.table'),
                namePost: 'datasus_sisvs_expoepi_autorbundle_inscricaoentity[coAutor]',
                columns: {
                    'Co-Autor': null,
                    'Instituição': null
                },
                data: []
            }

            var coAutor = new DynamicTable();
            coAutor.handler(optCoAutor);

            ";
        // line 750
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coAutor", array()), "vars", array()), "value", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["coAutor"]) {
            // line 751
            echo "            ";
            if (($this->getAttribute($context["coAutor"], "getStAtivo", array()) == "S")) {
                // line 752
                echo "            coAutor.setData({\"noAutor\": '";
                echo twig_escape_filter($this->env, $this->getAttribute($context["coAutor"], "getNoAutor", array()), "html", null, true);
                echo "', \"noInstituicao\": '";
                echo twig_escape_filter($this->env, $this->getAttribute($context["coAutor"], "getNoInstituicao", array()), "html", null, true);
                echo "'});
            \$('#coAutor, #noInstituicao').val('').removeClass('required');
            ";
            }
            // line 755
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['coAutor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 756
        echo "
            if (\$('div.coAutorCheck input:last').is(':checked')) {
                coAutor.clear();
            }

            \$('div.coAutorCheck input:last').click(function () {
                coAutor.clear();
            });

            \$('#table_0').on('click', 'a.table_0', function () {
                coAutor.remove(\$(this).attr('id'));
            });


            \$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_1').click(function () {
                \$('#coAutor, #noInstituicao').val('').removeClass('required');
            });

            \$('#btAdicionar').click(function () {
                if (\$('#coAutor').val() && \$('#noInstituicao').val()) {
                    coAutor.setData({\"noAutor\": \$('#coAutor').val(), \"noInstituicao\": \$('#noInstituicao').val()});
                    \$('#coAutor, #noInstituicao').val('').removeClass('required');
                } else {


                    if (\$('#coAutor').val() == \"\") {
                        var msg = 'O campo Nome do Co-autor é de preenchimento obrigatório.';
                        \$('html, body').animate({scrollTop: 0}, 300);
                        Message.addMessage(msg, 'error');
                    }
                    if (\$('#noInstituicao').val() == \"\") {
                        var msg = 'O campo Nome da Instituição é de preenchimento obrigatório.';
                        \$('html, body').animate({scrollTop: 0}, 300);
                        Message.addMessage(msg, 'error');
                    }
                }
            });

            // anexo
            var optAnexo = {
                inseretAfter: \$('div.upload'),
                namePost: 'anexo',
                columns: {
                    'Arquivo': null
                },
                data: []
            }

            var coAnexo = new DynamicTable();
            coAnexo.handler(optAnexo);

            ";
        // line 807
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coSeqInscricao", array()), "vars", array()), "value", array())) {
            // line 808
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coAnexo", array()), "vars", array()), "value", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["coAnexo"]) {
                // line 809
                echo "            ";
                if (($this->getAttribute($context["coAnexo"], "getStAtivo", array()) == "S")) {
                    // line 810
                    echo "            coAnexo.setData({\"Arquivo\": '";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["coAnexo"], "getNoArquivo", array()), "html", null, true);
                    echo "'});
            ";
                }
                // line 812
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['coAnexo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 813
            echo "            ";
        }
        // line 814
        echo "
            \$('#btAdicionarUpload').unbind('click').click(function () {
                var noAnexo = \$('input[id=upload]:first');
                var exAnexo;

                exAnexo = noAnexo.val().substring(noAnexo.val().length - 4).toLowerCase();
                console.log(exAnexo);
                if (exAnexo != '.pdf'
                        && exAnexo != '.doc'
                        && exAnexo != 'docx'
                        && exAnexo != '.odt'
                        && exAnexo != '.xls'
                        && exAnexo != '.xlsx'
                        && exAnexo != '.jpg'
                        && exAnexo != '.png'
                        && exAnexo != '.gif'
                        && exAnexo != '.ppt'
                        && exAnexo != '.zip'
                ) {
                    var msg = 'Upload não permitido. Permitido apenas upload de arquivos com as extensões: .pdf, .doc, docx, .odt, .xls, .xlsx, .jpg, .png, .gif, .ppt, .zip .';
                    Message.addMessage(msg, 'error');
                    if (msg) {
                        \$('html, body').animate({scrollTop: 0}, 300);
                        \$('.alert-error').fadeIn().delay(5000).fadeOut('slow');
                    }
                } else {
                    coAnexo.setData({\"Arquivo\": \$('input[type=file]').val().replace(/C:\\\\fakepath\\\\/i, '')});

                    var fileInput = \$('input[id=upload]:first')
                            .clone()
                            .attr('name', '');

                    \$('input[id=upload]:first').hide();
                    \$('input[id=upload]:first').before(fileInput);

                    \$(coAnexo.getData()).each(function (i, v) {
                        \$(\$('input[id=upload]').get().reverse()).each(function (ind, val) {
                            if (i == ind) {
                                \$(val).attr('name', 'datasus_sisvs_expoepi_autorbundle_inscricaoentity[coAnexo][' + ind + '][dsArquivo]');
                            }
                        });
                    });
                }
            });

            \$('#table_1').on('click', 'a.table_1', function () {
                coAnexo.remove(\$(this).attr('id'));
                \$('input[name=\"datasus_sisvs_expoepi_autorbundle_inscricaoentity[coAnexo][' + \$(this).attr('id') + '][dsArquivo]\"]').remove();

                \$(coAnexo.getData()).each(function (i, v) {
                    \$(\$('input[id=upload]').get().reverse()).each(function (ind, val) {
                        if (i == ind && !\$('input[id=upload]').is(':visible')) {
                            \$(val).attr('name', 'datasus_sisvs_expoepi_autorbundle_inscricaoentity[coAnexo][' + ind + '][dsArquivo]');
                        }
                    });
                });
            });

            ";
        // line 872
        if (($this->getAttribute((isset($context["modalidade"]) ? $context["modalidade"] : $this->getContext($context, "modalidade")), "getStExigeAnexo", array()) == "S")) {
            // line 873
            echo "            \$('form').submit(function () {
                if (coAnexo.getData().length == 0) {
                    Message.addMessage('O campo Upload do Anexo é de preenchimento obrigatório.', 'error', 'upload');
                    \$('html, body').animate({scrollTop: 0}, 300);
                    \$('.alert-error').fadeIn().delay(5000).fadeOut('slow');
                    return false;
                } else {
                    Message.remove('upload');
                }
            });
            ";
        }
        // line 884
        echo "
            /**
             * @return Se estiver ba edição
             */

            ";
        // line 889
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coSeqInscricao", array()), "vars", array()), "value", array())) {
            // line 890
            echo "
            \$('form').submit(function () {
                if (coAutor.getData().length == 0 && \$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_0').is(':checked')) {
                    Message.addMessage('O campo Nome do Co-autor é de preenchimento obrigatório.', 'error');
                    \$('.alert-error').fadeIn().delay(5000).fadeOut('slow');
                }
            });
            ";
        }
        // line 898
        echo "
            /**
             * @return Se estiver ba edição
             */
            ";
        // line 902
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "coSeqInscricao", array()), "vars", array()), "value", array())) {
            // line 903
            echo "            if (\$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coSeqInscricao').val()) {
                Address.config.estado = \$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coUfIbge');
                Address.populateEstadoFromPais(1, ";
            // line 905
            echo twig_escape_filter($this->env, (isset($context["estadoInst"]) ? $context["estadoInst"] : $this->getContext($context, "estadoInst")), "html", null, true);
            echo ");

                \$(document).ajaxStop(function () {
                    \$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge').val(";
            // line 908
            echo twig_escape_filter($this->env, (isset($context["municipioInst"]) ? $context["municipioInst"] : $this->getContext($context, "municipioInst")), "html", null, true);
            echo ").change();
                    \$('#comunicipio_hidden').val(\$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge').val());
                    \$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_noRegiao').val('";
            // line 910
            echo twig_escape_filter($this->env, (isset($context["regiaoInst"]) ? $context["regiaoInst"] : $this->getContext($context, "regiaoInst")), "html", null, true);
            echo "');
                });
            }
            ";
        }
        // line 914
        echo "

            \$('#limpar').click(function () {
                window.location.href = window.location.href;
            });

            \$('#salvar').click(function () {

//                if (\$('#comunicipio_hidden').val() == \"\") {
//                    Message.addMessage('O campo CEP é de preenchimento obrigatório.', 'error');
//                    \$('html, body').animate({scrollTop: 0}, 300);
//                }

                if (coAutor.getData().length == 0 && \$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_0').is(':checked')) {
                    \$('html, body').animate({scrollTop: 0}, 300);
                    Message.addMessage('O campo Nome do Co-autor é de preenchimento obrigatório.', 'error');
                    \$('.alert-error').fadeIn().delay(5000).fadeOut('slow');
                }

                if (coAnexo.getData().length == 0) {
                    Message.addMessage('O campo Upload do Anexo é de preenchimento obrigatório.', 'error', 'upload');
                    \$('html, body').animate({scrollTop: 0}, 300);
                    \$('.alert-error').fadeIn().delay(5000).fadeOut('slow');
                    return false;
                }

                if (\$('form').submit(function () {
//                            if (\$('#comunicipio_hidden').val() == \"\") {
//                                Message.addMessage('O campo CEP é de preenchimento obrigatório.', 'error');
//                                \$('html, body').animate({scrollTop: 0}, 300);
//                            }
                            if (\$('.alert-error').show()) {
                                \$('html, body').animate({scrollTop: 0}, 300);
                                \$('.alert-error').fadeIn().delay(5000).fadeOut('slow');
                            }
                            if (coAutor.getData().length == 0 && \$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_0').is(':checked')) {
                                \$('html, body').animate({scrollTop: 0}, 300);
//                                Message.addMessage('O campo Nome do Co-autor é de preenchimento obrigatório.', 'error');
                            }
                        }));
            });
            \$('.apresentacao').tooltip('toggle');
            \$('.apresentacao').tooltip('hide');
            \$('#comunicipio_hidden').val(\$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge').val());
        });
    </script>
    <style type=\"text/css\">
        blockquote small:before {
            display: none !important;
        }

        .alingLabel {
            position: relative;
            left: -63px;
            padding-top: 0px !important;
        }

        .control-group blockquote {
            left: -27px;
            position: relative;
        }

        .control-group blockquote p {
            margin-bottom: 5px;
            margin-top: 5px;
        }
    </style>
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsExpoEpiAutorBundle:Painel:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1597 => 914,  1590 => 910,  1585 => 908,  1579 => 905,  1575 => 903,  1573 => 902,  1567 => 898,  1557 => 890,  1555 => 889,  1548 => 884,  1535 => 873,  1533 => 872,  1473 => 814,  1470 => 813,  1464 => 812,  1458 => 810,  1455 => 809,  1450 => 808,  1448 => 807,  1395 => 756,  1389 => 755,  1380 => 752,  1377 => 751,  1373 => 750,  1347 => 728,  1344 => 727,  1339 => 721,  1332 => 718,  1325 => 715,  1323 => 714,  1317 => 710,  1314 => 709,  1305 => 77,  1299 => 76,  1282 => 74,  1279 => 73,  1273 => 71,  1270 => 70,  1264 => 68,  1261 => 67,  1255 => 65,  1252 => 64,  1244 => 62,  1241 => 61,  1238 => 60,  1221 => 59,  1216 => 58,  1212 => 57,  1207 => 55,  1199 => 50,  1195 => 48,  1192 => 47,  1186 => 12,  1182 => 10,  1178 => 8,  1176 => 7,  1173 => 6,  1170 => 5,  1166 => 3,  1163 => 2,  1157 => 982,  1155 => 727,  1149 => 723,  1147 => 709,  1137 => 702,  1128 => 695,  1122 => 693,  1116 => 691,  1114 => 690,  1103 => 682,  1096 => 678,  1088 => 673,  1068 => 655,  1052 => 641,  1036 => 627,  1034 => 626,  1028 => 623,  1015 => 612,  1007 => 609,  1000 => 606,  993 => 603,  986 => 600,  979 => 597,  972 => 594,  965 => 591,  958 => 588,  951 => 585,  944 => 582,  937 => 579,  930 => 576,  928 => 575,  924 => 574,  914 => 569,  910 => 568,  906 => 566,  902 => 565,  895 => 561,  878 => 547,  871 => 543,  863 => 538,  856 => 534,  848 => 529,  838 => 521,  828 => 514,  817 => 506,  809 => 501,  801 => 495,  799 => 494,  792 => 489,  786 => 488,  779 => 483,  764 => 481,  761 => 480,  758 => 479,  752 => 477,  749 => 476,  743 => 474,  740 => 473,  734 => 471,  731 => 470,  723 => 468,  721 => 467,  717 => 465,  713 => 463,  711 => 462,  706 => 460,  703 => 459,  701 => 458,  698 => 457,  681 => 456,  675 => 453,  668 => 449,  664 => 448,  659 => 445,  656 => 444,  652 => 443,  647 => 441,  642 => 439,  636 => 436,  623 => 426,  613 => 419,  605 => 414,  597 => 409,  582 => 397,  569 => 387,  557 => 378,  549 => 373,  541 => 368,  530 => 360,  522 => 355,  515 => 351,  508 => 347,  500 => 342,  496 => 341,  488 => 336,  482 => 332,  472 => 328,  469 => 327,  465 => 325,  463 => 324,  458 => 322,  453 => 319,  449 => 318,  445 => 317,  395 => 269,  390 => 266,  384 => 262,  382 => 261,  377 => 258,  372 => 255,  366 => 251,  364 => 250,  352 => 240,  346 => 238,  343 => 237,  340 => 236,  334 => 234,  331 => 233,  329 => 232,  319 => 224,  313 => 222,  310 => 221,  307 => 220,  301 => 218,  298 => 217,  296 => 216,  284 => 207,  273 => 199,  262 => 190,  256 => 188,  254 => 187,  243 => 178,  237 => 176,  235 => 175,  224 => 166,  218 => 164,  216 => 163,  204 => 154,  193 => 146,  181 => 137,  170 => 129,  161 => 122,  157 => 120,  153 => 118,  151 => 117,  140 => 109,  129 => 101,  117 => 92,  106 => 83,  104 => 47,  97 => 43,  89 => 37,  83 => 34,  80 => 33,  78 => 32,  75 => 31,  69 => 29,  67 => 28,  62 => 26,  58 => 25,  54 => 24,  46 => 19,  42 => 18,  38 => 17,  34 => 15,  32 => 5,  29 => 4,  26 => 2,  24 => 1,);
    }
}
