<?php

/* InvisionSoporteBundle:TipoSedeList:index.html.twig */
class __TwigTemplate_789c484e66c3c3eb294bd97cba97ced3c4ce7296acfaa60fad2f0e977c9ada98 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionSoporteBundle/Resources/views/TipoSedeList/index.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/TipoSedeList/index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:TipoSedeList:index.html.twig";
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
