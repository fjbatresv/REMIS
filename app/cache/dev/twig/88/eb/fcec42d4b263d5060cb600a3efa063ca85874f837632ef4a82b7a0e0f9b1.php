<?php

/* InvisionVentaBundle:Inventario:busqueda.html.twig */
class __TwigTemplate_88ebfcec42d4b263d5060cb600a3efa063ca85874f837632ef4a82b7a0e0f9b1 extends Twig_Template
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
                <h3 class=\"box-title\">Buscar articulos</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form method=\"POST\" action=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath((isset($context["ruta"]) ? $context["ruta"] : $this->getContext($context, "ruta")));
        echo "\" novalidate=\"\">
                <div class=\"box-body\">
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "codigo"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "codigo"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "codigo"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "venta"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "venta"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "venta"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "color"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "color"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "color"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-6\">
                            ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                </div>
                <div class=\"box-footer\">
                    <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-search\"></i> Buscar</button>
                </div>
            </form>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "InvisionVentaBundle:Inventario:busqueda.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 57,  119 => 53,  114 => 51,  108 => 48,  99 => 42,  94 => 40,  88 => 37,  79 => 31,  74 => 29,  68 => 26,  59 => 20,  54 => 18,  48 => 15,  41 => 11,  31 => 3,  28 => 2,);
    }
}
