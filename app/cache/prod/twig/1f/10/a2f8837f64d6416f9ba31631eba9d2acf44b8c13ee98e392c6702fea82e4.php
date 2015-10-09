<?php

/* sidebar.html.twig */
class __TwigTemplate_1f10a2f8837f64d6416f9ba31631eba9d2acf44b8c13ee98e392c6702fea82e4 extends Twig_Template
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
        echo "<aside class=\"left-side sidebar-offcanvas\">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class=\"sidebar\">
        <!-- Sidebar user panel -->
        ";
        // line 24
        echo "        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class=\"sidebar-menu\">
            <li>
                <a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("pagina_inicio");
        echo "\">
                    <i class=\"fa fa-home\"></i> <span>Inicio</span>
                </a>
            </li>
            ";
        // line 32
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("InvisionSoporteBundle:Default:menu"));
        echo "
            <li>
                <a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("usuario_pre_logout");
        echo "\">
                    <i class=\"fa fa-key\"></i> <span>Cerrar Sesion</span>
                </a>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>";
    }

    public function getTemplateName()
    {
        return "sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 34,  38 => 32,  25 => 24,  52 => 212,  46 => 209,  37 => 203,  31 => 28,  19 => 1,  307 => 139,  303 => 68,  300 => 67,  295 => 27,  289 => 5,  284 => 140,  282 => 139,  267 => 126,  264 => 125,  254 => 123,  251 => 122,  248 => 121,  245 => 120,  242 => 119,  239 => 118,  236 => 117,  234 => 116,  228 => 113,  224 => 112,  217 => 108,  211 => 105,  207 => 104,  202 => 102,  197 => 100,  192 => 98,  187 => 96,  182 => 94,  178 => 93,  173 => 91,  166 => 87,  161 => 85,  156 => 83,  152 => 82,  147 => 81,  145 => 80,  133 => 69,  131 => 67,  125 => 63,  119 => 49,  117 => 48,  111 => 44,  109 => 43,  101 => 38,  89 => 28,  87 => 27,  83 => 26,  79 => 25,  74 => 23,  69 => 21,  64 => 19,  59 => 17,  55 => 16,  50 => 14,  45 => 12,  40 => 10,  35 => 8,  29 => 5,  23 => 1,);
    }
}
