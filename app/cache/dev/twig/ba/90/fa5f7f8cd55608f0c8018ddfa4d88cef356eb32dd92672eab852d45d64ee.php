<?php

/* InvisionSoporteBundle:Usuario:usuario.html.twig */
class __TwigTemplate_ba90fa5f7f8cd55608f0c8018ddfa4d88cef356eb32dd92672eab852d45d64ee extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<!-- left column -->
<div class=\"col-md-12\">
    <!-- general form elements -->
    <div class=\"box box-primary\">
        <div class=\"box-header\">
            <h3 class=\"box-title\">";
        // line 8
        if ((isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk"))) {
            echo "Editar usuario";
        } else {
            echo "Registrar usuario";
        }
        echo "</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form method=\"POST\" action=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["ruta"]) ? $context["ruta"] : $this->getContext($context, "ruta")), array("pk" => (isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk")))), "html", null, true);
        echo "\" novalidate=\"\">
            <div class=\"box-body\">
                ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
            </div>
            <div class=\"box-footer\">
                <button type=\"submit\" class=\"btn btn-primary\">Guardar</button>
                <a  href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Usuario_list");
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-undo\"></i> Regresar</a>
            </div>
    
        </form>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:Usuario:usuario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 17,  53 => 13,  48 => 11,  38 => 8,  31 => 3,  28 => 2,);
    }
}
