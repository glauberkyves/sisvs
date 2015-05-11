<?php

/* DatasusSisvsBaseSecurityBundle:Security:login.html.twig */
class __TwigTemplate_133845675d861b4e2d1b1bc6fb3c466e0acd05fce36c500988cd07ec976e08ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DatasusSisvsBaseSecurityBundle::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DatasusSisvsBaseSecurityBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"row\">
        <div class=\"span4\">
            <div id=\"BoxAreaLogin\">
                <div class=\"BoxAreaLogin_titulo\">
                    <h2>Digite seu e-mail e sua senha para acessar a área restrita: </h2>
                </div>
                <div class=\"BoxAreaLogin_content logar\">
                    <form action=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("datasus_sisvs_base_security_auth_login_check");
        echo "\" method=\"post\">
                        <ul>
                            <li class=\"login\">
                                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\"/>
                                <label for=\"username\" class=\"BoxAreaLogin_email_senha\"><span>*</span>E-mail:</label>
                                <input type=\"text\" id=\"username\" placeholder=\"E-mail\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["last_email"]) ? $context["last_email"] : $this->getContext($context, "last_email")), "html", null, true);
        echo "\"
                                       name=\"_username\" class=\"required span3\">
                                <span class=\"ico\"></span>
                            </li>
                            <li class=\"senha\">
                                <label for=\"password\" class=\"BoxAreaLogin_email_senha\"><span>*</span>Senha:</label>
                                <input type=\"password\" placeholder=\"Senha\" id=\"password\" class=\"campo_senha span3 required\"
                                       name=\"_password\">
                                <span class=\"ico\"></span>
                            </li>
                            <li>
                                <div id=\"BoxAreaLogin_EsqueceuEmail_e_Botao\" class=\"span3\">
                                    <div id=\"BoxAreaLogin_EsqueceuEmail\">
                                        <a href=\"";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["scpa_cadastro"]) ? $context["scpa_cadastro"] : $this->getContext($context, "scpa_cadastro")), "html", null, true);
        echo "\" target=\"_blank\">Ainda não está cadastrado?</a>
                                        <a href=\"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["scpa_esqueci_senha"]) ? $context["scpa_esqueci_senha"] : $this->getContext($context, "scpa_esqueci_senha")), "html", null, true);
        echo "\" target=\"_blank\">Esqueceu sua senha? </a>
                                    </div>
                                    <button type=\"submit\" class=\"buttonAzul botaoLogin\">ENTRAR</button>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <div class=\"span8\">
            <div id=\"BoxAreaLogin_Informacoes_Contato\">
                <p class=\"BoxAreaLogin_Info_titulo\">Acesso ao Sistema</p>

                <p class=\"loginInformacoes\">É necessário que o usuário informe seu e-mail e senha.<br>
                    Esqueceu a senha: Clique em \"Esqueceu sua senha\" e informe seu e-mail para receber uma nova senha de
                    acesso ao sistema.</p>
                <hr class=\"BoxAreaLogin_Info_barra\">
                <p class=\"BoxAreaLogin_Info_titulo\">Usuário que não possui acesso</p>

                <p class=\"loginInformacoes\">Realize o cadastro clicando em \"Ainda não está cadastrado?\"<br>
                    Após o login, clique em \"solicitar acesso aos sistemas\".<br>
                    Aguarde o e-mail com a aprovação ou não da solicitação de acesso.</p>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "DatasusSisvsBaseSecurityBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 30,  67 => 29,  51 => 16,  46 => 14,  40 => 11,  31 => 4,  28 => 3,);
    }
}
