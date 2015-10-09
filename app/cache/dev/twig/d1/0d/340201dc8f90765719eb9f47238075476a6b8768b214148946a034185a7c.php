<?php

/* InvisionSoporteBundle:Bitacora:bitacora.html.twig */
class __TwigTemplate_d10d340201dc8f90765719eb9f47238075476a6b8768b214148946a034185a7c extends Twig_Template
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
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/datatables/dataTables.bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 5
    public function block_extrajs($context, array $blocks = array())
    {
        echo "   
    <script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/datatables/jquery.dataTables.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/datatables/dataTables.bootstrap.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
        \$(function() {
            \$(\"#example1\").dataTable();
        });
    </script>
";
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        // line 15
        echo "    <!-- left column -->
    <div class=\"col-md-12\">
        <!-- general form elements -->
        <div class=\"box box-primary\">
            <div class=\"box-header\">
                <h3 class=\"box-title\">Bitacora</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form method=\"POST\" action=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath((isset($context["ruta"]) ? $context["ruta"] : $this->getContext($context, "ruta")));
        echo "\" novalidate=\"\">
                <div class=\"box-body \">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "inicio"), 'label');
        echo "
                            <div class=\"input-group\">
                                <div class=\"input-group-addon\">
                                    <i class=\"fa fa-calendar\"></i>
                                </div>
                                ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "inicio"), 'widget');
        echo "
                            </div>

                        </div>
                        <div class=\"col-md-6\">
                            ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fin"), 'label');
        echo "
                            <div class=\"input-group\">
                                <div class=\"input-group-addon\">
                                    <i class=\"fa fa-calendar\"></i>
                                </div>
                                ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fin"), 'widget');
        echo "
                            </div>
                        </div>
                    </div>
                    ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
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
            <div class=\"box-body table-responsive\">
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        ";
        // line 61
        if ((twig_length_filter($this->env, (isset($context["bitacoras"]) ? $context["bitacoras"] : $this->getContext($context, "bitacoras"))) > 0)) {
            // line 62
            echo "                            <table id=\"example1\" class=\"table table-bordered table-striped\">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Usuario</th>
                                        <th>Dirección</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
            // line 74
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["bitacoras"]) ? $context["bitacoras"] : $this->getContext($context, "bitacoras")));
            foreach ($context['_seq'] as $context["_key"] => $context["bitacora"]) {
                // line 75
                echo "                                        <tr> 
                                            <td align=\"center\">";
                // line 76
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : $this->getContext($context, "bitacora")), "createdAt"), "Y-m-d"), "html", null, true);
                echo "</td>
                                            <td align=\"center\">";
                // line 77
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : $this->getContext($context, "bitacora")), "createdAt"), "h:i a"), "html", null, true);
                echo "</td>
                                            <td>";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : $this->getContext($context, "bitacora")), "descripcion"), "html", null, true);
                echo "</td>
                                            <td>";
                // line 79
                if ($this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : $this->getContext($context, "bitacora")), "estado")) {
                    echo "<span class=\"label label-success\">Correcto</span>";
                } else {
                    echo "<span class=\"label label-danger\">Incorrecto</span>";
                }
                echo "</td>
                                            <td>";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : $this->getContext($context, "bitacora")), "usuario"), "html", null, true);
                echo "</td>
                                            <td>";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bitacora"]) ? $context["bitacora"] : $this->getContext($context, "bitacora")), "direccion"), "html", null, true);
                echo "</td>
                                        </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bitacora'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Usuario</th>
                                        <th>Dirección</th>
                                    </tr>
                                </tfoot>
                            </table>
                        ";
        }
        // line 97
        echo "                    </div>
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
        return array (  200 => 97,  185 => 84,  176 => 81,  172 => 80,  164 => 79,  160 => 78,  156 => 77,  152 => 76,  149 => 75,  145 => 74,  131 => 62,  129 => 61,  111 => 46,  104 => 42,  96 => 37,  88 => 32,  80 => 27,  73 => 23,  63 => 15,  60 => 14,  49 => 7,  45 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
