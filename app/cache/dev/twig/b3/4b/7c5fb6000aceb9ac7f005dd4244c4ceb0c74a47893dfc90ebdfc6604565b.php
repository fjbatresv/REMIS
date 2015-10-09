<?php

/* ::base.html.twig */
class __TwigTemplate_b34b7c5fb6000aceb9ac7f005dd4244c4ceb0c74a47893dfc90ebdfc6604565b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'extracss' => array($this, 'block_extracss'),
            'body' => array($this, 'block_body'),
            'extrajs' => array($this, 'block_extrajs'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- font Awesome -->
        <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Ionicons -->
        <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/ionicons.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Morris chart -->
        <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/morris/morris.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- jvectormap -->
        <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/timepicker/bootstrap-timepicker.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/jvectormap/jquery-jvectormap-1.2.2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- fullCalendar -->
        <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/fullcalendar/fullcalendar.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Daterange picker -->
        <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/daterangepicker/daterangepicker-bs3.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Theme style -->
        <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/AdminLTE.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/invstyle.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    ";
        // line 27
        $this->displayBlock('extracss', $context, $blocks);
        // line 28
        echo "    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
      <script src=\"https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js\"></script>
    <![endif]-->
</head>
<body class=\"skin-blue fixed\">
    <!-- header logo: style can be found in header.less -->
    <header class=\"header\">
        <a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("pagina_inicio");
        echo "\" class=\"logo\">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            Invision
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        ";
        // line 43
        $this->env->loadTemplate("header.html.twig")->display($context);
        // line 44
        echo "
    </header>
    <div class=\"wrapper row-offcanvas row-offcanvas-left\">
        <!-- Left side column. contains the logo and sidebar -->
        ";
        // line 48
        $this->env->loadTemplate("sidebar.html.twig")->display($context);
        // line 49
        echo "
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class=\"right-side\">
            <!-- Content Header (Page header) -->
            ";
        // line 63
        echo "
            <!-- Main content -->
            <section class=\"content\">
                <div class=\"row\">
                    ";
        // line 67
        $context["notificacion"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notificaciones"), "method");
        // line 68
        echo "                        ";
        $context["notificaciones"] = null;
        // line 69
        echo "                            ";
        if ((isset($context["notificacion"]) ? $context["notificacion"] : $this->getContext($context, "notificacion"))) {
            // line 70
            echo "                                ";
            $context["notificaciones"] = $this->getAttribute((isset($context["notificacion"]) ? $context["notificacion"] : $this->getContext($context, "notificacion")), 0, array(), "array");
            // line 71
            echo "                                    ";
        }
        // line 72
        echo "                                        ";
        if ((isset($context["notificacion"]) ? $context["notificacion"] : $this->getContext($context, "notificacion"))) {
            // line 73
            echo "                                            ";
            if ($this->getAttribute((isset($context["notificaciones"]) ? $context["notificaciones"] : $this->getContext($context, "notificaciones")), "mostrar", array(), "array")) {
                // line 74
                echo "                                                <div class=\"alert alert-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notificaciones"]) ? $context["notificaciones"] : $this->getContext($context, "notificaciones")), "estado", array(), "array"), "html", null, true);
                echo " alert-dismissable\">
                                                    <i class=\"fa fa-";
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notificaciones"]) ? $context["notificaciones"] : $this->getContext($context, "notificaciones")), "icono", array(), "array"), "html", null, true);
                echo "\"></i>
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                                    <b>";
                // line 77
                echo $this->getAttribute((isset($context["notificaciones"]) ? $context["notificaciones"] : $this->getContext($context, "notificaciones")), "titulo", array(), "array");
                echo "</b> ";
                echo $this->getAttribute((isset($context["notificaciones"]) ? $context["notificaciones"] : $this->getContext($context, "notificaciones")), "mensaje", array(), "array");
                echo "
                                                </div>
                                            ";
            }
            // line 80
            echo "                                        ";
        }
        // line 81
        echo "                                        ";
        $this->displayBlock('body', $context, $blocks);
        // line 83
        echo "                                    </div>
                                </section><!-- /.content -->
                            </aside><!-- /.right-side -->
                        </div><!-- ./wrapper -->

                        <!-- add new calendar event modal -->


                        <!-- jQuery 2.0.2 -->
                        <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js\"></script>
                        ";
        // line 94
        echo "                        ";
        // line 95
        echo "                        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/input-mask/jquery.inputmask.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <script src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/input-mask/jquery.inputmask.date.extensions.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <script src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/input-mask/jquery.inputmask.extensions.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <!-- jQuery UI 1.10.3 -->
                        <script src=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui-1.10.3.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <!-- Bootstrap -->
                        <script src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <!-- Morris.js charts -->

                        <!-- Sparkline -->
                        <script src=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/sparkline/jquery.sparkline.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <!-- jvectormap -->
                        <script src=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <script src=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <!-- fullCalendar -->
                        <script src=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/fullcalendar/fullcalendar.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <!-- jQuery Knob Chart -->
                        <script src=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/jqueryKnob/jquery.knob.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <!-- daterangepicker -->
                        <script src=\"";
        // line 114
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/daterangepicker/daterangepicker.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <!-- Bootstrap WYSIHTML5 -->
                        <script src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <!-- iCheck -->
                        <script src=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/iCheck/icheck.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <script src=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins/timepicker/bootstrap-timepicker.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
                        <!-- AdminLTE App -->
                        <!-- AdminLTE App -->
                        <script src=\"";
        // line 122
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/AdminLTE/app.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

                        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

                        <script src=\"";
        // line 126
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/invScript.js"), "html", null, true);
        echo "\"></script>    
                        <script src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootbox.min.js"), "html", null, true);
        echo "\"></script>  
                        <script type=\"text/javascript\">
                            \$(function() {
                                \$(\"[data-mask]\").inputmask();
                                //Timepicker
                                \$(\".timepicker\").timepicker({
                                    minuteStep: 5,
                                    showInputs: false,
                                    disableFocus: true,
                                    showMeridian: false,
                                    defaultTime: 'value'
                                });
                            });
                        </script>
                    ";
        // line 141
        $this->displayBlock('extrajs', $context, $blocks);
        // line 142
        echo "                </body>
            </html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Invision";
    }

    // line 27
    public function block_extracss($context, array $blocks = array())
    {
    }

    // line 81
    public function block_body($context, array $blocks = array())
    {
        // line 82
        echo "                                        ";
    }

    // line 141
    public function block_extrajs($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  312 => 141,  308 => 82,  305 => 81,  300 => 27,  294 => 5,  289 => 142,  287 => 141,  270 => 127,  266 => 126,  259 => 122,  253 => 119,  249 => 118,  244 => 116,  239 => 114,  234 => 112,  229 => 110,  224 => 108,  220 => 107,  215 => 105,  208 => 101,  203 => 99,  198 => 97,  194 => 96,  189 => 95,  187 => 94,  175 => 83,  172 => 81,  169 => 80,  161 => 77,  156 => 75,  151 => 74,  148 => 73,  145 => 72,  142 => 71,  139 => 70,  136 => 69,  133 => 68,  131 => 67,  125 => 63,  119 => 49,  117 => 48,  111 => 44,  109 => 43,  101 => 38,  89 => 28,  87 => 27,  83 => 26,  79 => 25,  69 => 21,  64 => 19,  55 => 16,  50 => 14,  45 => 12,  40 => 10,  35 => 8,  29 => 5,  23 => 1,  84 => 33,  74 => 23,  70 => 25,  63 => 21,  59 => 17,  52 => 16,  48 => 15,  41 => 11,  31 => 3,  28 => 2,);
    }
}
