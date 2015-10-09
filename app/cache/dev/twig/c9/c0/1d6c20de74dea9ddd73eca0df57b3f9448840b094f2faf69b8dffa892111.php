<?php

/* InvisionInventarioBundle:InventarioNew:index.html.twig */
class __TwigTemplate_c9c01d6c20de74dea9ddd73eca0df57b3f9448840b094f2faf69b8dffa892111 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionInventarioBundle/Resources/views/InventarioNew/index.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionInventarioBundle/Resources/views/InventarioNew/index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "InvisionInventarioBundle:InventarioNew:index.html.twig";
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
