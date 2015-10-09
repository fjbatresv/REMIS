<?php

/* InvisionInventarioBundle:ColorActions:index.html.twig */
class __TwigTemplate_ca7e1f7161781554dece1642eaa528dc07cf88661e8f65da5bcf9452df973327 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionInventarioBundle/Resources/views/ColorActions/index.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionInventarioBundle/Resources/views/ColorActions/index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "InvisionInventarioBundle:ColorActions:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array ();
    }
}
