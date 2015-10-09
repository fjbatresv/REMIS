<?php

/* InvisionSoporteBundle:PerfilList:row.html.twig */
class __TwigTemplate_dcd6d38f7f6d54fcf55997222531aa9ae27f9c4205957565af81b036f05a5ff8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionSoporteBundle/Resources/views/PerfilList/row.html.twig");

        $this->blocks = array(
            'object_action_delete' => array($this, 'block_object_action_delete'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/PerfilList/row.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_object_action_delete($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        ob_start();
        // line 4
        echo "<a  class=\"btn btn-default btn-xs \" href=\"javascript:;\" onClick=\"vel_admin.eliminar('el perfil ', '";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Perfil"]) ? $context["Perfil"] : $this->getContext($context, "Perfil")), "nombre"), "html", null, true);
        echo "', '";
        echo $this->env->getExtension('routing')->getPath("eliminar_perfil");
        echo "', '?pk=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Perfil"]) ? $context["Perfil"] : $this->getContext($context, "Perfil")), "id"), "html", null, true);
        echo "')\"><i class=\"fa fa-eraser\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:PerfilList:row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 4,  31 => 3,  28 => 2,);
    }
}
