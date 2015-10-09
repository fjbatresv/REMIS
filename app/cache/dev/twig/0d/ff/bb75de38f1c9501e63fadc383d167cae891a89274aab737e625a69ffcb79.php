<?php

/* InvisionSoporteBundle:Perfil:perfilMenu.html.twig */
class __TwigTemplate_0dffbb75de38f1c9501e63fadc383d167cae891a89274aab737e625a69ffcb79 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'extracss' => array($this, 'block_extracss'),
            'extrajs' => array($this, 'block_extrajs'),
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
    public function block_extracss($context, array $blocks = array())
    {
        // line 3
        echo "<link href=\"http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic\" rel=\"stylesheet\" type=\"text/css\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/jquery.tree.css"), "html", null, true);
        echo "\"/> 
";
    }

    // line 7
    public function block_extrajs($context, array $blocks = array())
    {
        // line 8
        echo "<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-1.9.1.js\"></script>
<script type=\"text/javascript\" src=\"http://code.jquery.com/ui/1.10.4/jquery-ui.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.tree.js"), "html", null, true);
        echo "\"></script>
<script>
    \$(document).ready(function() {

        \$(document).find('.lista').each(function() {
            \$(this).tree({
            });
        });
    });
</script>
<script>
    jQuery(document).ready(function() {
        \$(\"input\").removeClass('form-control');
    });
</script>
";
    }

    // line 26
    public function block_body($context, array $blocks = array())
    {
        // line 27
        echo "
<!-- left column -->
<div class=\"col-md-12\">
    <!-- general form elements -->
    <div class=\"box box-primary\">
        <div class=\"box-header\">
            <h3 class=\"box-title\">";
        // line 33
        if ((isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk"))) {
            echo "Editar perfil";
        } else {
            echo "Registrar perfil";
        }
        echo "</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form method=\"POST\" action=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["ruta"]) ? $context["ruta"] : $this->getContext($context, "ruta")), array("pk" => (isset($context["pk"]) ? $context["pk"] : $this->getContext($context, "pk")))), "html", null, true);
        echo "\" novalidate=\"\">
            ";
        // line 37
        $context["contador"] = 0;
        // line 38
        echo "                        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menus"]) ? $context["menus"] : $this->getContext($context, "menus")));
        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
            // line 39
            echo "                        ";
            if (($this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "superior") == 0)) {
                // line 40
                echo "                    ";
                if (((isset($context["contador"]) ? $context["contador"] : $this->getContext($context, "contador")) == 0)) {
                    // line 41
                    echo "            <div class=\"row\">
                        ";
                }
                // line 43
                echo "                <div class=\"col-md-4\">
                    <div class=\"form-group\">
                        <label class=\"col-md-1\"></label>
                        <div class=\"col-md-11\">
                            <div class=\"lista\">
                                <ul>
                                    <li>";
                // line 49
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Menu"), $this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "id"), array(), "array"), 'widget', array("attr" => array("class" => "")));
                echo "&nbsp;";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Menu"), $this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "id"), array(), "array"), 'label');
                echo "
                                        <ul>
                                    ";
                // line 51
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["menus"]) ? $context["menus"] : $this->getContext($context, "menus")));
                foreach ($context['_seq'] as $context["_key"] => $context["menuInferior"]) {
                    // line 52
                    echo "                                    ";
                    if (($this->getAttribute((isset($context["menuInferior"]) ? $context["menuInferior"] : $this->getContext($context, "menuInferior")), "superior") == $this->getAttribute((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")), "id"))) {
                        // line 53
                        echo "                                            <li>";
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Menu"), $this->getAttribute((isset($context["menuInferior"]) ? $context["menuInferior"] : $this->getContext($context, "menuInferior")), "id"), array(), "array"), 'widget');
                        echo "&nbsp;";
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Menu"), $this->getAttribute((isset($context["menuInferior"]) ? $context["menuInferior"] : $this->getContext($context, "menuInferior")), "id"), array(), "array"), 'label');
                        echo "
                                    ";
                    }
                    // line 55
                    echo "                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menuInferior'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "                                        </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                        ";
                // line 62
                $context["contador"] = ((isset($context["contador"]) ? $context["contador"] : $this->getContext($context, "contador")) + 1);
                // line 63
                echo "                        ";
                if (((isset($context["contador"]) ? $context["contador"] : $this->getContext($context, "contador")) == 3)) {
                    // line 64
                    echo "            </div>
            <br />
                    ";
                    // line 66
                    $context["contador"] = 0;
                    // line 67
                    echo "                        ";
                }
                // line 68
                echo "                        ";
            }
            // line 69
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "                    ";
        if (((isset($context["contador"]) ? $context["contador"] : $this->getContext($context, "contador")) != 0)) {
            // line 71
            echo "
                        ";
        }
        // line 73
        echo "
            <div style=\"visibility:hidden\">
                ";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Menu"), 'widget');
        echo "
                 ";
        // line 76
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
            </div>
            <br/>
            <div class=\"box-footer\">
                <button type=\"submit\" class=\"btn btn-primary\">Guardar</button>
                <a  href=\"";
        // line 81
        echo $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Perfil_list");
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-undo\"></i> Regresar</a>
            </div>

        </form>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:Perfil:perfilMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 81,  194 => 76,  190 => 75,  186 => 73,  182 => 71,  179 => 70,  173 => 69,  170 => 68,  167 => 67,  165 => 66,  161 => 64,  158 => 63,  156 => 62,  148 => 56,  142 => 55,  134 => 53,  131 => 52,  127 => 51,  120 => 49,  112 => 43,  108 => 41,  105 => 40,  102 => 39,  97 => 38,  95 => 37,  91 => 36,  81 => 33,  73 => 27,  70 => 26,  50 => 10,  46 => 8,  43 => 7,  37 => 5,  33 => 3,  30 => 2,);
    }
}
