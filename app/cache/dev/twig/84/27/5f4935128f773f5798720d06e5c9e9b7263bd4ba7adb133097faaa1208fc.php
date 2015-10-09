<?php

/* InvisionSoporteBundle:Usuario:cambioClave.html.twig */
class __TwigTemplate_84275f4935128f773f5798720d06e5c9e9b7263bd4ba7adb133097faaa1208fc extends Twig_Template
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
            <h3 class=\"box-title\">Cambio de clave</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form method=\"POST\" action=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cambio_clave", array("pk" => (isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk")))), "html", null, true);
        echo "\" novalidate=\"\">
            <div class=\"box-body\">
                <div class=\"form-group\">
                    <label>Ingrese clave anterior</label>
                    ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "clave_old"), 'widget');
        echo "
                    <p class=\"help-block\">";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "clave_old"), 'errors');
        echo "</p>
                </div>
                <div class=\"form-group\">
                    <label>Ingrese la nueva clave</label>
                    ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "clave"), "first"), 'widget');
        echo "
                    <p class=\"help-block\">";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "clave"), "first"), 'errors');
        echo "</p>
                </div>
                <div class=\"form-group\">
                    <label>Repita la nueva clave</label>
                    ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "clave"), "second"), 'widget');
        echo "
                    <p class=\"help-block\">";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "clave"), "second"), 'errors');
        echo "</p>
                </div>
                
            </div>
            <div class=\"box-footer\">
                <button type=\"submit\" class=\"btn btn-primary\">Cambiar clave</button>
            </div>
    ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        </form>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:Usuario:cambioClave.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 33,  74 => 26,  70 => 25,  63 => 21,  59 => 20,  52 => 16,  48 => 15,  41 => 11,  31 => 3,  28 => 2,);
    }
}
