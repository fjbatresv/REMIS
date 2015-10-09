<?php

/* InvisionSoporteBundle:Bitacora:bitacora.html.twig */
class __TwigTemplate_d10d340201dc8f90765719eb9f47238075476a6b8768b214148946a034185a7c extends Twig_Template
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
            <h3 class=\"box-title\">Bitacora</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form method=\"POST\" action=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath((isset($context["ruta"]) ? $context["ruta"] : null));
        echo "\" novalidate=\"\">
            <div class=\"box-body\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "inicio"), 'label');
        echo "
                        <div class=\"input-group\">
                            <div class=\"input-group-addon\">
                                <i class=\"fa fa-calendar\"></i>
                            </div>
                      ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "inicio"), 'widget');
        echo "
                        </div>

                    </div>
                    <div class=\"col-md-6\">
                        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fin"), 'label');
        echo "
                        <div class=\"input-group\">
                            <div class=\"input-group-addon\">
                                <i class=\"fa fa-calendar\"></i>
                            </div>
                      ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fin"), 'widget');
        echo "
                        </div>
                    </div>
                </div>
                ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
            </div>
            <div class=\"box-footer\">
                <button type=\"submit\" class=\"btn btn-primary\">Consultar</button>
            </div>

        </form>
    </div>
    <div class=\"box box-primary\">
        <div class=\"box-header\">
            <h3 class=\"box-title\">Resultados</h3>
        </div>
        <div class=\"box-body\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                     ";
        // line 49
        if ((twig_length_filter($this->env, (isset($context["bitacoras"]) ? $context["bitacoras"] : null)) > 0)) {
            // line 50
            echo "                    <table class=\"table table-bordered\">
                        <thead>
                            <tr>
                                <th>Fecha y Hora</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Usuario</th>
                                <th>Tabla</th>
                                <th>Direccion</th>
                            </tr>
                        </thead>
                        <tbody>
                        ";
            // line 62
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["bitacoras"]) ? $context["bitacoras"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["bitacora"]) {
                // line 63
                echo "                            <tr> 
                                <td align=\"center\">";
                // line 64
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : null), "createdAt"), "Y-m-d H:i:s"), "html", null, true);
                echo "</td>
                                <td>";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : null), "descripcion"), "html", null, true);
                echo "</td>
                                <td>";
                // line 66
                if ($this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : null), "estado")) {
                    echo "<span class=\"label label-success\">Correcto</span>";
                } else {
                    echo "<span class=\"label label-danger\">Incorrecto</span>";
                }
                echo "</td>
                                <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : null), "usuario"), "html", null, true);
                echo "</td>
                                <td>";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : null), "tabla"), "html", null, true);
                echo "</td>
                                <td>";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : null), "direccion"), "html", null, true);
                echo "</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bitacora'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "                        </tbody>
                    </table>
                ";
        }
        // line 75
        echo "                </div>
            </div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:Bitacora:bitacora.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 75,  153 => 72,  144 => 69,  140 => 68,  136 => 67,  128 => 66,  124 => 65,  120 => 64,  117 => 63,  113 => 62,  99 => 50,  97 => 49,  79 => 34,  72 => 30,  64 => 25,  56 => 20,  48 => 15,  41 => 11,  31 => 3,  28 => 2,);
    }
}
