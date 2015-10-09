<?php

/* InvisionInventarioBundle:Color:color.html.twig */
class __TwigTemplate_c33b08f25cdd8883b035d477659ec6bb367acc2add930e1b0646f0728304f653 extends Twig_Template
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
            echo "Editar color";
        } else {
            echo "Registrar color";
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
                <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-check\"></i> Guardar</button>
                <a  href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Color_list");
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-undo\"></i> Regresar</a>
            </div>
    
        </form>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "InvisionInventarioBundle:Color:color.html.twig";
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
