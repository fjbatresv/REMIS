<?php

/* Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/index.html.twig */
class __TwigTemplate_d6120a180bad452608c04ad320d8f562918ede4f7ceaf33dda0cffe21ea37e72 extends Twig_Template
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
            'list_scopes' => array($this, 'block_list_scopes'),
            'filters' => array($this, 'block_filters'),
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Lista de usuarios", array(), "Admin");
        // line 10
        echo "    ";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        echo "    ";
        $this->displayBlock('page_title', $context, $blocks);
        // line 16
        echo "<div class=\"row\">
        <div class=\" col-md-12 \">";
        // line 17
        $this->displayBlock('list_scopes', $context, $blocks);
        // line 19
        $this->env->loadTemplate("InvisionSoporteBundle:UsuarioList:results.html.twig")->display(array_merge($context, array()));
        // line 20
        echo "        </div>

        ";
        // line 22
        $this->displayBlock('filters', $context, $blocks);
        // line 24
        echo "    </div>
";
    }

    // line 11
    public function block_page_title($context, array $blocks = array())
    {
        // line 12
        echo "        <header>
            <h1>";
        // line 13
        echo $this->env->getExtension('translator')->getTranslator()->trans("Lista de usuarios", array(), "Admin");
        echo "</h1>
        </header>
    ";
    }

    // line 17
    public function block_list_scopes($context, array $blocks = array())
    {
    }

    // line 22
    public function block_filters($context, array $blocks = array())
    {
        // line 23
        echo "                    ";
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 23,  105 => 22,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 22,  76 => 20,  74 => 19,  72 => 17,  69 => 16,  64 => 11,  60 => 10,  55 => 9,  52 => 8,  43 => 7,  34 => 4,);
    }
}
