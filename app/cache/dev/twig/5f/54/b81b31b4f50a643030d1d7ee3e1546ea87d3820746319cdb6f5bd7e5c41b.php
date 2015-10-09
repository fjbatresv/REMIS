<?php

/* InvisionVentaBundle:Inventario:inventario.html.twig */
class __TwigTemplate_5f54b81b31b4f50a643030d1d7ee3e1546ea87d3820746319cdb6f5bd7e5c41b extends Twig_Template
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
                <h3 class=\"box-title\">";
        // line 8
        if ((isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk"))) {
            echo "Editar articulo";
        } else {
            echo "Registrar articulo";
        }
        echo "</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form method=\"POST\" action=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["ruta"]) ? $context["ruta"] : $this->getContext($context, "ruta")), array("pk" => (isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk")))), "html", null, true);
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
                        <div class=\"col-md-2\">
                            ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cantidad"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cantidad"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cantidad"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "costo"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "costo"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "costo"), 'errors');
        echo "
                            </span>
                        </div>
                        <div class=\"col-md-2\">
                            ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "venta"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "venta"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "venta"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "color"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "color"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "color"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-6\">
                            ";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    ";
        // line 86
        echo "                    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                </div>

                <div class=\"box-footer\">
                    <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-check\"></i> Guardar</button>
                    <a  href=\"";
        // line 91
        echo $this->env->getExtension('routing')->getPath("Invision_VentaBundle_Inventario_list");
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-undo\"></i> Regresar</a>
                </div>
            </form>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "InvisionVentaBundle:Inventario:inventario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 91,  169 => 86,  162 => 71,  157 => 69,  151 => 66,  142 => 60,  137 => 58,  131 => 55,  122 => 49,  117 => 47,  111 => 44,  104 => 40,  99 => 38,  93 => 35,  84 => 29,  79 => 27,  73 => 24,  66 => 20,  61 => 18,  55 => 15,  48 => 11,  38 => 8,  31 => 3,  28 => 2,);
    }
}
