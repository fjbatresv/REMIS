<?php

/* InvisionSoporteBundle:Usuario:horario.html.twig */
class __TwigTemplate_89ad112b8f7d261c4ba61694faa2d248834160dbfd412799004b34f955ee70a6 extends Twig_Template
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
            <h3 class=\"box-title\">Editar horario</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form method=\"POST\" action=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["ruta"]) ? $context["ruta"] : $this->getContext($context, "ruta")), array("pk" => (isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk")))), "html", null, true);
        echo "\" novalidate=\"\">
            <div class=\"box-body\">
                <table cellpadding=\"10\">
                    ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dias"]) ? $context["dias"] : $this->getContext($context, "dias")));
        foreach ($context['_seq'] as $context["_key"] => $context["dia"]) {
            // line 15
            echo "                    <tr>
                        <td>";
            // line 16
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dia"), $this->getAttribute((isset($context["dia"]) ? $context["dia"] : $this->getContext($context, "dia")), "id"), array(), "array"), 'widget');
            echo "</td>
                        <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dia"]) ? $context["dia"] : $this->getContext($context, "dia")), "nombre"), "html", null, true);
            echo "</td>
                        <td>Desde</td>
                        <td class=\" bootstrap-timepicker\">";
            // line 19
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), ($this->getAttribute((isset($context["dia"]) ? $context["dia"] : $this->getContext($context, "dia")), "nombre") . "Desde"), array(), "array"), 'widget');
            echo "</td>
                        <td>Hasta</td>
                        <td class=\" bootstrap-timepicker\">";
            // line 21
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), ($this->getAttribute((isset($context["dia"]) ? $context["dia"] : $this->getContext($context, "dia")), "nombre") . "Hasta"), array(), "array"), 'widget');
            echo "</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dia'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "                </table>
            </div>
            <div class=\"box-footer\">
                <button type=\"submit\" class=\"btn btn-primary\">Guardar</button>
                <a  href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Usuario_list");
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-undo\"></i> Regresar</a>
            </div>
            ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        </form>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:Usuario:horario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 30,  83 => 28,  77 => 24,  68 => 21,  63 => 19,  58 => 17,  54 => 16,  51 => 15,  47 => 14,  41 => 11,  31 => 3,  28 => 2,);
    }
}
