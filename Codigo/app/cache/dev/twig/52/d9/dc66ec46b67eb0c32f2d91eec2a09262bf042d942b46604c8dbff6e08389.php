<?php

/* DatasusSisvsBaseSecurityBundle::base.html.twig */
class __TwigTemplate_52d9dc66ec46b67eb0c32f2d91eec2a09262bf042d942b46604c8dbff6e08389 extends Twig_Template
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
            'body' => array($this, 'block_body'),
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
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EmulateIE9\">

    <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/bootstrap.min.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\"
          href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/menu.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/contraste.css"), "html", null, true);
        echo "\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/css/template.css"), "html", null, true);
        echo "\"/>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/html5shiv.js"), "html", null, true);
        echo "\"></script>
    <![endif]-->

    <!-- Javascript -->
    <script type=\"text/javascript\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/jquery.min.js"), "html", null, true);
        echo "\"></script>

    <!-- Fav and touch icons -->
    <link rel=\"shortcut icon\" href=\"";
        // line 25
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
            <div class=\"row span12\">
                <div class=\"span9\">
                    <div class=\"logo\">";
        // line 43
        $this->displayBlock('sigla_sistema', $context, $blocks);
        echo "</div>
                    <div class=\"titulo_sistema\">
                        <span class=\"img_separador\"></span>

                        <h1>";
        // line 47
        $this->displayBlock('nome_sistema', $context, $blocks);
        echo "</h1>

                        <h3>";
        // line 49
        $this->displayBlock('descricao_sistema', $context, $blocks);
        echo "</h3>
                    </div>
                </div>
                <div class=\"span3\">
                    <div class=\"box_botoes_acessibilidade\">
                        <div id=\"rvfs-controllers\" class=\"fontsize-controllers group\"></div>
                        <a title=\"Contraste\" href=\"#\" id=\"lbkContraste\" onclick=\"atribuirContraste()\" class=\"contraste\">
                            <img src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/images/lgo/bt_acess_contraste.png"), "html", null, true);
        echo "\"
                                 width=\"13\" height=\"13\"/>
                        </a>
                    </div>
                    <div id=\"box_menu_top\">
                        ";
        // line 61
        $this->displayBlock('opcoes_usuario', $context, $blocks);
        // line 71
        echo "                    </div>
                    <div class=\"usuario\">
                        ";
        // line 73
        $this->displayBlock('detalhe_usuario_logado', $context, $blocks);
        // line 78
        echo "                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id=\"BoxMenuPrincipal\">
        <div class=\"container\">
            <div class=\"row\">
            </div>
        </div>
    </div>
</header>
<section>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"span12\">
                <div class=\"box message\">
                    ";
        // line 95
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "all", array()));
        foreach ($context['_seq'] as $context["label"] => $context["flashes"]) {
            // line 96
            echo "                        <div class=\"alert alert-";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo "\">
                            ";
            // line 97
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["flashes"]);
            foreach ($context['_seq'] as $context["_key"] => $context["flash"]) {
                // line 98
                echo "                                ";
                echo twig_escape_filter($this->env, $context["flash"], "html", null, true);
                echo " <br/>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['flashes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "                </div>

                <div class=\"box\">
                    ";
        // line 105
        $this->displayBlock('body', $context, $blocks);
        // line 106
        echo "                </div>
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
        // line 117
        $this->displayBlock('endereco_footer', $context, $blocks);
        // line 124
        echo "                    </div>
                </div>
                <div class=\"span6\">
                    <div id=\"BoxRodape_LogoDatasus\">Datasus</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bibliotecas adicionais -->
<script type=\"text/javascript\" src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/bootstrap-tab.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/contraste.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\"
        src=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/rv-jquery-fontsize-2.0.3.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/functions.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\"
        src=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/jquery.validate.js"), "html", null, true);
        echo "\"></script>

<!-- Componentes -->
<script type=\"text/javascript\" src=\"";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/utils.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/message.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 147
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/datasussisvsbasebase/js/components/validation.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 148
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

    // line 43
    public function block_sigla_sistema($context, array $blocks = array())
    {
        echo "SIEPI";
    }

    // line 47
    public function block_nome_sistema($context, array $blocks = array())
    {
        echo "Ministério da Saúde";
    }

    // line 49
    public function block_descricao_sistema($context, array $blocks = array())
    {
        echo "Sistema de Informações em Epidemiologia Aplicada à Vigilância em Saúde";
    }

    // line 61
    public function block_opcoes_usuario($context, array $blocks = array())
    {
        // line 62
        echo "                            <ul>
                                <li class=\"contato\">
                                    <a href=\"#\"><span class=\"icon-question-sign icon-white\"></span>Ajuda</a>
                                </li>
                                <li class=\"/\">
                                    <a href=\"/\"><span class=\"icon-home icon-white\"></span>Página inicial</a>
                                </li>
                            </ul>
                        ";
    }

    // line 73
    public function block_detalhe_usuario_logado($context, array $blocks = array())
    {
        // line 74
        echo "                            <p>
                                ";
        // line 75
        echo twig_escape_filter($this->env, (isset($context["version"]) ? $context["version"] : $this->getContext($context, "version")), "html", null, true);
        echo "
                            </p>
                        ";
    }

    // line 105
    public function block_body($context, array $blocks = array())
    {
    }

    // line 117
    public function block_endereco_footer($context, array $blocks = array())
    {
        // line 118
        echo "                            <p>
                                Secretaria Executiva<br/>
                                Esplanada dos Ministérios, Bloco &quot;G&quot;, Edifício Sede, 3º andar, sala 305<br/>
                                Brasília-DF, Cep: 70.058-900
                            </p>
                        ";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsBaseSecurityBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  327 => 118,  324 => 117,  319 => 105,  312 => 75,  309 => 74,  306 => 73,  294 => 62,  291 => 61,  285 => 49,  279 => 47,  273 => 43,  267 => 5,  259 => 148,  255 => 147,  251 => 146,  247 => 145,  241 => 142,  236 => 140,  232 => 139,  227 => 137,  223 => 136,  219 => 135,  206 => 124,  204 => 117,  191 => 106,  189 => 105,  184 => 102,  177 => 100,  168 => 98,  164 => 97,  159 => 96,  155 => 95,  136 => 78,  134 => 73,  130 => 71,  128 => 61,  120 => 56,  110 => 49,  105 => 47,  98 => 43,  77 => 25,  71 => 22,  64 => 18,  57 => 14,  53 => 13,  49 => 12,  45 => 11,  40 => 9,  33 => 5,  27 => 1,);
    }
}
