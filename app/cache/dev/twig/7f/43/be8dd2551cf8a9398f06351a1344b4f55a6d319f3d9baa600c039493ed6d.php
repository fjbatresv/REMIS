<?php

/* Admingenerated/InvisionInventarioBundle/Resources/views/ColorActions/index.html.twig */
class __TwigTemplate_7f43be8dd2551cf8a9398f06351a1344b4f55a6d319f3d9baa600c039493ed6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'page_title' => array($this, 'block_page_title'),
            'form' => array($this, 'block_form'),
            'form_buttons' => array($this, 'block_form_buttons'),
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

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    ";
    }

    // line 7
    public function block_javascripts($context, array $blocks = array())
    {
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        // line 9
        echo "        ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - ";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "
    ";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        echo "    ";
        $this->displayBlock('page_title', $context, $blocks);
        // line 16
        echo "<div class=\"row\">
            <div class=\"col-md-12\">
        ";
        // line 18
        $this->displayBlock('form', $context, $blocks);
        // line 34
        echo "    </div>

    </div>
";
    }

    // line 11
    public function block_page_title($context, array $blocks = array())
    {
        // line 12
        echo "        <header>
            <h1>";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
        </header>
    ";
    }

    // line 18
    public function block_form($context, array $blocks = array())
    {
        // line 19
        echo "            <form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["actionRoute"]) ? $context["actionRoute"] : $this->getContext($context, "actionRoute")), (isset($context["actionParams"]) ? $context["actionParams"] : $this->getContext($context, "actionParams"))), "html", null, true);
        echo "\" method=\"post\" class=\"admin_form\">
                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('admingenerator_csrf')->getCsrfToken($this->env->getExtension('routing')->getPath((isset($context["actionRoute"]) ? $context["actionRoute"] : $this->getContext($context, "actionRoute")), (isset($context["actionParams"]) ? $context["actionParams"] : $this->getContext($context, "actionParams")))), "html", null, true);
        echo "\"/>
                ";
        // line 21
        $this->displayBlock('form_buttons', $context, $blocks);
        // line 32
        echo "            </form>
        ";
    }

    // line 21
    public function block_form_buttons($context, array $blocks = array())
    {
        // line 22
        echo "                    <div class=\"form-actions\">
                            <button type=\"submit\" class=\"btn btn-primary\">
        <i class=\"glyphicon glyphicon-ok\"></i> ";
        // line 24
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.custom.confirm", array(), "Admingenerator");
        // line 25
        echo "    </button>
    <a class=\"btn btn-default\" href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Color_list");
        echo "\">
        <i class=\"glyphicon glyphicon-remove\"></i> ";
        // line 27
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.custom.cancel", array(), "Admingenerator");
        // line 28
        echo "    </a>

                    </div>
                ";
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionInventarioBundle/Resources/views/ColorActions/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 28,  130 => 27,  126 => 26,  123 => 25,  121 => 24,  117 => 22,  114 => 21,  109 => 32,  107 => 21,  103 => 20,  98 => 19,  95 => 18,  88 => 13,  85 => 12,  82 => 11,  75 => 34,  73 => 18,  69 => 16,  64 => 11,  55 => 9,  52 => 8,  43 => 7,  34 => 4,);
    }
}
