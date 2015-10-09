<?php

/* InvisionSoporteBundle:Sede:sede.html.twig */
class __TwigTemplate_5ba328be2483248da5dd6a5dbb6b4791104b56fd0092e369f9bc0d0091eeb4e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        if ((isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk"))) {
            echo "Editar";
        } else {
            echo "Nueva";
        }
        echo " sede";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <!-- left column -->
    <div class=\"col-md-12\">
        <!-- general form elements -->
        <div class=\"box box-primary\">
            <div class=\"box-header\">
                <h3 class=\"box-title\">";
        // line 9
        if ((isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk"))) {
            echo "Editar";
        } else {
            echo "Nueva";
        }
        echo " sede</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form method=\"POST\" action=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["ruta"]) ? $context["ruta"] : $this->getContext($context, "ruta")), array("pk" => (isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk")))), "html", null, true);
        echo "\" novalidate=\"\">
                <div class=\"box-body\">
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    <div class=\"row form-group\">
                        <div class=\"col-md-2\">
                            ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipo"), 'label');
        echo "
                        </div>
                        <div class=\"col-md-4\">
                            ";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipo"), 'widget');
        echo "
                            <span class=\"has-error\">
                                ";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipo"), 'errors');
        echo "
                            </span>
                        </div>
                    </div>
                    ";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                </div>

                <div class=\"box-footer\">
                    <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i> Guardar</button>
                    <a  href=\"";
        // line 63
        echo $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Sede_list");
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-undo\"></i> Regresar</a>
                </div>
            </form>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:Sede:sede.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 63,  145 => 58,  138 => 54,  133 => 52,  127 => 49,  118 => 43,  113 => 41,  107 => 38,  98 => 32,  93 => 30,  87 => 27,  78 => 21,  73 => 19,  67 => 16,  60 => 12,  50 => 9,  43 => 4,  40 => 3,  29 => 2,);
    }
}
