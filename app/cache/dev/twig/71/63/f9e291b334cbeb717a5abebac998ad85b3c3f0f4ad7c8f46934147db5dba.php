<?php

/* InvisionInventarioBundle:InventarioList:index.html.twig */
class __TwigTemplate_7163f9e291b334cbeb717a5abebac998ad85b3c3f0f4ad7c8f46934147db5dba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionInventarioBundle/Resources/views/InventarioList/index.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionInventarioBundle/Resources/views/InventarioList/index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "InvisionInventarioBundle:InventarioList:index.html.twig";
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
