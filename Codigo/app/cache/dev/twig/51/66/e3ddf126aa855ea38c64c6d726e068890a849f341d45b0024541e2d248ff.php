<?php

/* DatasusSisvsBaseBaseBundle::breadcrumbs.html.twig */
class __TwigTemplate_5166e3ddf126aa855ea38c64c6d726e068890a849f341d45b0024541e2d248ff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (twig_length_filter($this->env, (isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : $this->getContext($context, "breadcrumbs")))) {
            // line 2
            echo "    <ul id=\"xi-breadcrumbs\" class=\"breadcrumb\">
        ";
            // line 3
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : $this->getContext($context, "breadcrumbs")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["bc"]) {
                // line 4
                echo "            ";
                if (($this->getAttribute($context["loop"], "last", array()) || (!$this->getAttribute($context["bc"], "url", array())))) {
                    // line 5
                    echo "                <li>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($context["bc"], "label", array())), "html", null, true);
                    echo "</li>
            ";
                } else {
                    // line 7
                    echo "                <li><a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["bc"], "url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($context["bc"], "label", array())), "html", null, true);
                    echo "</a><span class=\"divider\">/</span></li>
            ";
                }
                // line 9
                echo "        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bc'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "    </ul>
";
        }
    }

    public function getTemplateName()
    {
        return "DatasusSisvsBaseBaseBundle::breadcrumbs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 10,  58 => 9,  50 => 7,  44 => 5,  41 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
