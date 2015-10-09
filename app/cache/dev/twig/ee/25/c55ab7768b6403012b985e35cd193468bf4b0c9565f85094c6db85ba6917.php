<?php

/* InvisionVentaBundle:Inventario:informacion.html.twig */
class __TwigTemplate_ee25c55ab7768b6403012b985e35cd193468bf4b0c9565f85094c6db85ba6917 extends Twig_Template
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
        echo "    <!-- left column -->
    <div class=\"col-md-12\">
        <!-- general form elements -->
        <div class=\"box box-primary\">
            <div class=\"box-header\">
                <h3 class=\"box-title\">Articulo \"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "codigo"), "html", null, true);
        echo "\"</h3>
                <div class=\"box-tools\" style=\"float: right;\">
                    <a onClick=\"window.history.back()\" class=\"btn btn-danger\" style=\"color: white;\" >
                        <i class=\"fa fa-undo\"></i> Regresar
                    </a>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class=\"box-body\">
                <div class=\"row form-group\">
                    <div class=\"col-md-2\">
                        <label class=\"control-label required\" >Codigo</label>
                    </div>
                    <div class=\"col-md-4\">
                        ";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "codigo"), "html", null, true);
        echo "
                    </div>
                </div>
                <div class=\"row form-group\">
                    <div class=\"col-md-2\">
                        <label class=\"control-label required\" >Costo</label>
                    </div>
                    <div class=\"col-md-4\">
                        ";
        // line 29
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "costo"), 2, ".", ","), "html", null, true);
        echo "
                    </div>
                    <div class=\"col-md-2\">
                        <label class=\"control-label required\" >Venta</label>
                    </div>
                    <div class=\"col-md-4\">
                        ";
        // line 35
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "venta"), 2, ".", ","), "html", null, true);
        echo "
                    </div>
                </div>
                <div class=\"row form-group\">
                    <div class=\"col-md-2\">
                        <label class=\"control-label required\" >Color</label>
                    </div>
                    <div class=\"col-md-4\">
                        ";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "color"), "nombre"), "html", null, true);
        echo "
                    </div>
                </div>
                <div class=\"row form-group\">
                    <div class=\"col-md-2\">
                        <label class=\"control-label required\" >Descripción</label>
                    </div>
                    <div class=\"col-md-4\">
                        ";
        // line 51
        echo $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "descripcion");
        echo "
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

";
    }

    public function getTemplateName()
    {
        return "InvisionVentaBundle:Inventario:informacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 51,  85 => 43,  74 => 35,  65 => 29,  54 => 21,  38 => 8,  31 => 3,  28 => 2,);
    }
}
