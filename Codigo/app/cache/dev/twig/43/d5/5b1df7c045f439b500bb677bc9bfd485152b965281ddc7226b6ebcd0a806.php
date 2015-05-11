<?php

/* DatasusSisvsBaseBaseBundle::base.html.twig */
class __TwigTemplate_43d55b1df7c045f439b500bb677bc9bfd485152b965281ddc7226b6ebcd0a806 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sigla_sistema' => array($this, 'block_sigla_sistema'),
            'nome_sistema' => array($this, 'block_nome_sistema'),
            'descricao_sistema' => array($this, 'block_descricao_sistema'),
            'opcoes_usuario' => array($this, 'block_opcoes_usuario'),
            'detalhe_usuario_logado' => array($this, 'block_detalhe_usuario_logado'),
            'menu_sistema' => array($this, 'block_menu_sistema'),
            'tempo_sessao' => array($this, 'block_tempo_sessao'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'body' => array($this, 'block_body'),
            'modal_active_inactive' => array($this, 'block_modal_active_inactive'),
            'modal_view' => array($this, 'block_modal_view'),
            'endereco_footer' => array($this, 'block_endereco_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pt-br\">
<head>
    <meta charset=\"utf-8\">
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EmulateIE9\" >
    <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/bootstrap.min.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\"
          href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/menu.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/contraste.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/template.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\"
          href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/ui-lightness/jquery-ui-1.10.3.custom.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/ui.jqgrid.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/datepicker.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\"
          href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/bootstrap-wysihtml5.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\"
          href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/selectize.css"), "html", null, true);
        echo "\"/>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/html5shiv.js"), "html", null, true);
        echo "\"></script>
    <![endif]-->

    <!-- Javascript -->
    <script type=\"text/javascript\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/jquery.min.js"), "html", null, true);
        echo "\"></script>

    <!-- Fav and touch icons -->
    <link rel=\"shortcut icon\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/images/ico/favicon.ico"), "html", null, true);
        echo "\">
</head>

<body id=\"content\">
<header>
    <div id=\"barra-brasil\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"span12\">
                    <script src=\"http://barra.brasil.gov.br/barra.js\" type=\"text/javascript\" async=\"true\"></script><noscript>A barra do Governo Federal só poderá ser visualizada se o javascript estiver ativado.</noscript> <!-- fim barra do governo -->
                </div>
            </div>
        </div>
    </div>
    <div id=\"topo_geral\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"span7\">
                    <div class=\"logo\">";
        // line 50
        $this->displayBlock('sigla_sistema', $context, $blocks);
        echo "</div>
                    <div class=\"titulo_sistema\">
                        <span class=\"img_separador\"></span>

                        <h1>";
        // line 54
        $this->displayBlock('nome_sistema', $context, $blocks);
        echo "</h1>

                        <h3>";
        // line 56
        $this->displayBlock('descricao_sistema', $context, $blocks);
        echo "</h3>
                    </div>
                </div>
                <div class=\"span5\">
                    <div class=\"box_botoes_acessibilidade\">
                        <div id=\"rvfs-controllers\" class=\"fontsize-controllers group\"></div>
                        <a title=\"Contraste\" href=\"#\" id=\"lbkContraste\" onclick=\"atribuirContraste()\" class=\"contraste\">
                            <img src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/images/lgo/bt_acess_contraste.png"), "html", null, true);
        echo "\"
                                 width=\"13\" height=\"13\"/>
                        </a>
                    </div>
                    <div id=\"box_menu_top\">
                        ";
        // line 68
        $this->displayBlock('opcoes_usuario', $context, $blocks);
        // line 81
        echo "                    </div>
                    <div class=\"usuario\">
                        ";
        // line 83
        $this->displayBlock('detalhe_usuario_logado', $context, $blocks);
        // line 89
        echo "                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id=\"BoxMenuPrincipal\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"span12\">
                    ";
        // line 98
        $this->displayBlock('menu_sistema', $context, $blocks);
        // line 100
        echo "                    <div id=\"box_info_usuario\">
                        <div id=\"box_info_usuario_tempo\">
                            ";
        // line 102
        $this->displayBlock('tempo_sessao', $context, $blocks);
        // line 105
        echo "                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"span12\">
                ";
        // line 116
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 119
        echo "            </div>
            <div class=\"span12\">
                <div class=\"box message\">
                    ";
        // line 122
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "all", array()));
        foreach ($context['_seq'] as $context["label"] => $context["flashes"]) {
            // line 123
            echo "                        <div class=\"alert alert-";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo "\">
                            ";
            // line 124
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["flashes"]);
            foreach ($context['_seq'] as $context["_key"] => $context["flash"]) {
                // line 125
                echo "                                ";
                echo twig_escape_filter($this->env, $context["flash"], "html", null, true);
                echo " <br/>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 127
            echo "                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['flashes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 129
        echo "                </div>

                <div class=\"box\">
                    ";
        // line 132
        $this->displayBlock('body', $context, $blocks);
        // line 133
        echo "                </div>

                <!-- Modal de Ativação / Inativação -->
                <div id=\"modal-toogle-status\" class=\"modal hide fade\" role=\"dialog\" data-keyboard=\"false\"
                     data-backdrop=\"static\">
                    ";
        // line 138
        $this->displayBlock('modal_active_inactive', $context, $blocks);
        // line 153
        echo "                </div>
                <!-- FIM Modal de Ativação / Inativação -->

                <!-- Modal de Visualização -->
                <div id=\"modal-view\" class=\"modal hide fade\" role=\"dialog\" data-keyboard=\"false\" data-backdrop=\"static\">
                    ";
        // line 158
        $this->displayBlock('modal_view', $context, $blocks);
        // line 159
        echo "                </div>

                <!-- Modal de Loagind -->
                <div id=\"modal-loading\" class=\"modal hide fade\" role=\"dialog\" data-keyboard=\"false\"
                     data-backdrop=\"static\">
                </div>
                <!-- FIM Modal de Visualização -->
            </div>
        </div>
    </div>
</section>
<footer>
    <div id=\"BoxRodapePrincipal\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"span6\">
                    <div id=\"BoxRodape_endereco\">
                        ";
        // line 176
        $this->displayBlock('endereco_footer', $context, $blocks);
        // line 183
        echo "                    </div>
                </div>
                <div class=\"span6\">
                    <div id=\"BoxRodape_LogoDatasus\">Datasus</div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type=\"text/javascript\">
    var minutos = 50;
    var seconds = 30;
    var campo = document.getElementById(\"cronometro\");
    var campo_div = document.getElementById(\"wrapper-clock-count\");

    function startCountdown() {
        if (seconds <= 0) {
            seconds = 60;
            minutos -= 1
        }
        if (minutos <= -1) {
            seconds = 0;
            seconds += 1;
            campo.innerHTML = \"\";
            campo_div.innerHTML = \"Sessão expirada!\"
            setTimeout(\"location.href = '/logout';\", 2000);
        } else {
            seconds -= 1;
            if (seconds < 10) {
                seconds = \"0\" + seconds
            }
            campo.innerHTML = \" \" + minutos + \"&nbsp;min&nbsp;\" + seconds + \"&nbsp;seg\";
            setTimeout(\"startCountdown()\", 1000)
        }
    }
    startCountdown();
</script>

<!-- Bibliotecas adicionais -->
<script type=\"text/javascript\" src=\"";
        // line 222
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 223
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/bootstrap-tab.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 224
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/contraste.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\"
        src=\"";
        // line 226
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/rv-jquery-fontsize-2.0.3.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 227
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/functions.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 228
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/i18n/grid.locale-pt-br.js"), "html", null, true);
        echo "\"
        type=\"text/javascript\"></script>
<script type=\"text/javascript\" src=\"";
        // line 230
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/jquery.jqGrid.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/bootstrap-datepicker.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\"
        src=\"";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/jquery.jqEasyCharCounter.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 234
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/jquery.meio.mask.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\"
        src=\"";
        // line 236
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/locales/bootstrap-datepicker.pt-BR.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\"
        src=\"";
        // line 238
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/jquery.validate.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\"
        src=\"";
        // line 240
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/ckeditor/ckeditor.js"), "html", null, true);
        echo "\"></script>

<!-- Componentes -->
<script type=\"text/javascript\" src=\"";
        // line 243
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/grid.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 244
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/utils.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 245
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/message.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 246
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/validation.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 247
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/datepicker.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 248
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/table.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 249
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/textarea.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 250
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/address.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 251
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/mask.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 252
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/validate.js"), "html", null, true);
        echo "\"></script>

</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "SIEPI";
    }

    // line 50
    public function block_sigla_sistema($context, array $blocks = array())
    {
        echo "SIEPI";
    }

    // line 54
    public function block_nome_sistema($context, array $blocks = array())
    {
        echo "Ministério da Saúde";
    }

    // line 56
    public function block_descricao_sistema($context, array $blocks = array())
    {
        echo "Sistema de Informações em Epidemiologia Aplicada à Vigilância em Saúde";
    }

    // line 68
    public function block_opcoes_usuario($context, array $blocks = array())
    {
        // line 69
        echo "                            <ul>
                                <li class=\"contato\">
                                    <a href=\"#\"><span class=\"icon-question-sign icon-white\"></span>Ajuda</a>
                                </li>
                                <li class=\"/\">
                                    <a href=\"/\"><span class=\"icon-home icon-white\"></span>Página inicial</a>
                                </li>
                                <li class=\"sair\">
                                    <a href=\"/logout\"><span class=\"icon-off icon-white\"></span>Sair</a>
                                </li>
                            </ul>
                        ";
    }

    // line 83
    public function block_detalhe_usuario_logado($context, array $blocks = array())
    {
        // line 84
        echo "                            <p>
                                <span class=\"usuarioLogado\">";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "getNome", array()), "html", null, true);
        echo "</span>,
                                <span class=\"perfilUsuario\">";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "getPerfil", array()), "html", null, true);
        echo "</span> ";
        echo twig_escape_filter($this->env, (isset($context["version"]) ? $context["version"] : $this->getContext($context, "version")), "html", null, true);
        echo "
                            </p>
                        ";
    }

    // line 98
    public function block_menu_sistema($context, array $blocks = array())
    {
        // line 99
        echo "                    ";
    }

    // line 102
    public function block_tempo_sessao($context, array $blocks = array())
    {
        // line 103
        echo "                                <div id=\"wrapper-clock-count\">Sua Sessão expira em: <span id=\"cronometro\"></span></div>
                            ";
    }

    // line 116
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 117
        echo "                    ";
        echo $this->env->getExtension('breadcrumb')->renderBreadcrumbs();
        echo "
                ";
    }

    // line 132
    public function block_body($context, array $blocks = array())
    {
    }

    // line 138
    public function block_modal_active_inactive($context, array $blocks = array())
    {
        // line 139
        echo "                        <div class=\"modal-header\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
                            <h3>Confirmação</h3>
                        </div>
                        <div class=\"modal-body\">
                            <h4></h4>
                        </div>
                        <div class=\"modal-footer\">
                            <button aria-hidden=\"true\" class=\"buttonAzul toogle-status-yes\">Sim</button>
                            <button aria-hidden=\"true\" data-dismiss=\"modal\" class=\"buttonAzul margim toogle-status-not\">
                                Não
                            </button>
                        </div>
                    ";
    }

    // line 158
    public function block_modal_view($context, array $blocks = array())
    {
    }

    // line 176
    public function block_endereco_footer($context, array $blocks = array())
    {
        // line 177
        echo "                            <p>
                                Secretaria Executiva<br/>
                                Esplanada dos Ministérios, Bloco &quot;G&quot;, Edifício Sede, 3º andar, sala 305<br/>
                                Brasília-DF, Cep: 70.058-900
                            </p>
                        ";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsBaseBaseBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  541 => 177,  538 => 176,  533 => 158,  516 => 139,  513 => 138,  508 => 132,  501 => 117,  498 => 116,  493 => 103,  490 => 102,  486 => 99,  483 => 98,  474 => 86,  470 => 85,  467 => 84,  464 => 83,  449 => 69,  446 => 68,  440 => 56,  434 => 54,  428 => 50,  422 => 5,  414 => 252,  410 => 251,  406 => 250,  402 => 249,  398 => 248,  394 => 247,  390 => 246,  386 => 245,  382 => 244,  378 => 243,  372 => 240,  367 => 238,  362 => 236,  357 => 234,  353 => 233,  348 => 231,  344 => 230,  339 => 228,  335 => 227,  331 => 226,  326 => 224,  322 => 223,  318 => 222,  277 => 183,  275 => 176,  256 => 159,  254 => 158,  247 => 153,  245 => 138,  238 => 133,  236 => 132,  231 => 129,  224 => 127,  215 => 125,  211 => 124,  206 => 123,  202 => 122,  197 => 119,  195 => 116,  182 => 105,  180 => 102,  176 => 100,  174 => 98,  163 => 89,  161 => 83,  157 => 81,  155 => 68,  147 => 63,  137 => 56,  132 => 54,  125 => 50,  104 => 32,  98 => 29,  91 => 25,  84 => 21,  79 => 19,  74 => 17,  70 => 16,  66 => 15,  61 => 13,  57 => 12,  53 => 11,  49 => 10,  44 => 8,  38 => 5,  32 => 1,);
    }
}
