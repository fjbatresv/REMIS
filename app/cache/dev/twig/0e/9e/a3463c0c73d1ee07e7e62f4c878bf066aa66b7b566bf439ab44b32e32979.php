<?php

/* ::menuSidebar.html.twig */
class __TwigTemplate_0e9ea3463c0c73d1ee07e7e62f4c878bf066aa66b7b566bf439ab44b32e32979 extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menus"]) ? $context["menus"] : $this->getContext($context, "menus")));
        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
            // line 2
            if (($this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "superior") == 0)) {
                // line 3
                echo "<li class=\"treeview\">
    ";
                // line 4
                if (($this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "ruta") == "#")) {
                    // line 5
                    echo "     <a href=\"#\">
        <i class=\"";
                    // line 6
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "icono"), "html", null, true);
                    echo "\"></i>
        <span>";
                    // line 7
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "nombre"), "html", null, true);
                    echo "</span>
        <i class=\"fa fa-angle-left pull-right\"></i>
    </a>
    <ul class=\"treeview-menu\">
        ";
                    // line 11
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["menus"]) ? $context["menus"] : $this->getContext($context, "menus")));
                    foreach ($context['_seq'] as $context["_key"] => $context["menuInferior"]) {
                        // line 12
                        echo "        ";
                        if (($this->getAttribute((isset($context["menuInferior"]) ? $context["menuInferior"] : $this->getContext($context, "menuInferior")), "superior") == $this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "id"))) {
                            // line 13
                            echo "        <li><a href=\"";
                            echo $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["menuInferior"]) ? $context["menuInferior"] : $this->getContext($context, "menuInferior")), "ruta"));
                            echo "\"><i class=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuInferior"]) ? $context["menuInferior"] : $this->getContext($context, "menuInferior")), "icono"), "html", null, true);
                            echo "\"></i>";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuInferior"]) ? $context["menuInferior"] : $this->getContext($context, "menuInferior")), "nombre"), "html", null, true);
                            echo "</a></li>
        ";
                        }
                        // line 15
                        echo "        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menuInferior'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 16
                    echo "
    </ul>
    ";
                } else {
                    // line 19
                    echo "     <a href=\"";
                    echo $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "ruta"));
                    echo "\">
        <i class=\"";
                    // line 20
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "icono"), "html", null, true);
                    echo "\"></i>
        <span>";
                    // line 21
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "nombre"), "html", null, true);
                    echo "</span>
        <i class=\"fa fa-angle-left pull-right\"></i>
    </a>
    ";
                }
                // line 25
                echo "</li>
";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "::menuSidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 25,  81 => 21,  77 => 20,  72 => 19,  67 => 16,  61 => 15,  51 => 13,  48 => 12,  44 => 11,  33 => 6,  30 => 5,  28 => 4,  43 => 34,  38 => 32,  25 => 3,  52 => 212,  46 => 209,  37 => 7,  31 => 28,  19 => 1,  268 => 127,  264 => 68,  261 => 67,  256 => 27,  250 => 5,  245 => 128,  243 => 127,  226 => 113,  222 => 112,  215 => 108,  209 => 105,  205 => 104,  200 => 102,  195 => 100,  190 => 98,  185 => 96,  180 => 94,  176 => 93,  171 => 91,  164 => 87,  159 => 85,  154 => 83,  150 => 82,  145 => 81,  133 => 69,  131 => 67,  125 => 63,  119 => 49,  117 => 48,  111 => 44,  109 => 43,  101 => 38,  89 => 28,  87 => 27,  83 => 26,  79 => 25,  74 => 23,  69 => 21,  64 => 19,  59 => 17,  55 => 16,  50 => 14,  45 => 12,  40 => 10,  35 => 8,  29 => 5,  23 => 2,);
    }
}
