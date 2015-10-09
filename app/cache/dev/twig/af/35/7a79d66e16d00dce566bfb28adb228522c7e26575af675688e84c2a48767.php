<?php

/* Admingenerated/InvisionInventarioBundle/Resources/views/InventarioNew/index.html.twig */
class __TwigTemplate_af357a79d66e16d00dce566bfb28adb228522c7e26575af675688e84c2a48767 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'object_actions_script' => array($this, 'block_object_actions_script'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'page_title' => array($this, 'block_page_title'),
            'object_actions' => array($this, 'block_object_actions'),
            'form_tabs' => array($this, 'block_form_tabs'),
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
        // line 8
        $this->displayBlock('object_actions_script', $context, $blocks);
    }

    public function block_object_actions_script($context, array $blocks = array())
    {
        // line 9
        echo "        ";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
        // line 11
        echo "        ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("New object for InventarioBundle", array(), "Admin");
        // line 12
        echo "    ";
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        echo "    ";
        $this->displayBlock('page_title', $context, $blocks);
        // line 18
        echo "<div class=\"container-fluid\">
\t    <div class=\"row object-actions-Inventario\">
\t        <div class=\"col-md-12\">    ";
        // line 20
        $this->displayBlock('object_actions', $context, $blocks);
        // line 22
        echo "</div>
\t    </div>

\t    <div class=\"row\">";
        // line 25
        $this->displayBlock('form_tabs', $context, $blocks);
        // line 27
        echo "
\t        ";
        // line 28
        $this->env->loadTemplate("InvisionInventarioBundle:InventarioNew:form.html.twig")->display(array_merge($context, array()));
        // line 29
        echo "\t    </div>\t\t\t
\t</div>
";
    }

    // line 13
    public function block_page_title($context, array $blocks = array())
    {
        // line 14
        echo "        <header>
            <h1>";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("New object for InventarioBundle", array(), "Admin");
        echo "</h1>
        </header>
    ";
    }

    // line 20
    public function block_object_actions($context, array $blocks = array())
    {
        // line 21
        echo "        ";
    }

    // line 25
    public function block_form_tabs($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionInventarioBundle/Resources/views/InventarioNew/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 25,  118 => 21,  115 => 20,  108 => 15,  105 => 14,  102 => 13,  96 => 29,  94 => 28,  91 => 27,  89 => 25,  84 => 22,  82 => 20,  78 => 18,  73 => 13,  69 => 12,  64 => 11,  61 => 10,  57 => 9,  51 => 8,  44 => 7,  35 => 4,);
    }
}
