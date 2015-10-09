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
                    <i class=\"fa fa-sign-out\"></i> <span>Salir</span>
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
        return array (  43 => 34,  38 => 32,  31 => 28,  25 => 24,  19 => 1,);
    }
}
