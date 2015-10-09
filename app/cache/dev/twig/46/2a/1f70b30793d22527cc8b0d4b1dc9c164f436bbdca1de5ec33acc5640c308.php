<?php

/* header.html.twig */
class __TwigTemplate_462a1f70b30793d22527cc8b0d4b1dc9c164f436bbdca1de5ec33acc5640c308 extends Twig_Template
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
        echo "<nav class=\"navbar navbar-static-top\" role=\"navigation\">
    <!-- Sidebar toggle button-->
    <a href=\"#\" class=\"navbar-btn sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
        <span class=\"sr-only\">Toggle navigation</span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
    </a>
    <div class=\"navbar-right\">
        <ul class=\"nav navbar-nav\">
            <!-- Messages: style can be found in dropdown.less-->";
        // line 199
        echo "            <!-- User Account: style can be found in dropdown.less -->
            <li class=\"dropdown user user-menu\">
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                    <i class=\"glyphicon glyphicon-user\"></i>
                    <span>";
        // line 203
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username"), "html", null, true);
        echo "<i class=\"caret\"></i></span>
                </a>
                <ul class=\"dropdown-menu\">
                    <!-- Menu Footer-->
                    <li class=\"user-footer\">
                        <div class=\"pull-left\">
                            <a href=\"";
        // line 209
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cambio_clave", array("pk" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))), "html", null, true);
        echo "\" class=\"btn btn-default btn-flat\">Cambiar Clave</a>
                        </div>
                        <div class=\"pull-right\">
                            <a href=\"";
        // line 212
        echo $this->env->getExtension('routing')->getPath("usuario_pre_logout");
        echo "\" class=\"btn btn-default btn-flat\">Cerrar Sesion</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 212,  46 => 209,  37 => 203,  31 => 199,  19 => 1,  268 => 127,  264 => 68,  261 => 67,  256 => 27,  250 => 5,  245 => 128,  243 => 127,  226 => 113,  222 => 112,  215 => 108,  209 => 105,  205 => 104,  200 => 102,  195 => 100,  190 => 98,  185 => 96,  180 => 94,  176 => 93,  171 => 91,  164 => 87,  159 => 85,  154 => 83,  150 => 82,  145 => 81,  133 => 69,  131 => 67,  125 => 63,  119 => 49,  117 => 48,  111 => 44,  109 => 43,  101 => 38,  89 => 28,  87 => 27,  83 => 26,  79 => 25,  74 => 23,  69 => 21,  64 => 19,  59 => 17,  55 => 16,  50 => 14,  45 => 12,  40 => 10,  35 => 8,  29 => 5,  23 => 1,);
    }
}
