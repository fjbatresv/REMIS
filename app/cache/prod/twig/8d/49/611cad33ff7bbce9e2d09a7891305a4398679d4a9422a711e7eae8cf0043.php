<?php

/* InvisionSoporteBundle:Login:login.html.twig */
class __TwigTemplate_8d49611cad33ff7bbce9e2d09a7891305a4398679d4a9422a711e7eae8cf0043 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html class=\"bg-black\">
    <head>
        <meta charset=\"UTF-8\">
        <title>Invision</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- font Awesome -->
        <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Theme style -->
        <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/css/AdminLTE.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
          <script src=\"https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js\"></script>
        <![endif]-->
    </head>
    <body class=\"bg-black\">

        <div class=\"form-box\" id=\"login-box\">
            <div class=\"header\">Acceso</div>
            ";
        // line 29
        echo "            <form action=\"";
        echo $this->env->getExtension('routing')->getPath("usuario_login");
        echo "\" method=\"POST\">
                <div class=\"body bg-gray\">
                    <div class=\"form-group  input-group\">
                        <span class=\"input-group-addon\"><i class=\"fa fa-user\"></i></span>
                            ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "username"), 'widget');
        echo "

                    </div>
                    <span class=\"has-error\">
                            ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "username"), 'errors');
        echo "
                    </span>
                    <div class=\"form-group input-group\">
                        <span class=\"input-group-addon\"><i class=\"fa fa-key\"></i></span>
                            ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "password"), 'widget');
        echo "

                    </div> 
                    <span class=\"has-error\">
                            ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "password"), 'errors');
        echo "
                    </span>
                </div>
                <div class=\"footer\">                                                               
                    <button type=\"submit\" class=\"btn bg-olive btn-block\">Ingresar</button>  

                    ";
        // line 54
        echo "                </div>
                ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
            </form>

            ";
        // line 66
        echo "        </div>


        <!-- jQuery 2.0.2 -->
        <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js\"></script>
        <!-- Bootstrap -->
        <script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/js/bootstrap.min.jsf"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>        

    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:Login:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 72,  101 => 66,  95 => 55,  92 => 54,  83 => 45,  76 => 41,  69 => 37,  62 => 33,  54 => 29,  38 => 12,  33 => 10,  28 => 8,  19 => 1,);
    }
}
