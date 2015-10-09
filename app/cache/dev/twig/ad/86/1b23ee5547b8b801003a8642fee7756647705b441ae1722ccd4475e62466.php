<?php

/* InvisionVentaBundle:ColorList:index.html.twig */
class __TwigTemplate_ad861b23ee5547b8b801003a8642fee7756647705b441ae1722ccd4475e62466 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionVentaBundle/Resources/views/ColorList/index.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionVentaBundle/Resources/views/ColorList/index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "InvisionVentaBundle:ColorList:index.html.twig";
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
