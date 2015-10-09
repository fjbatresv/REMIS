<?php

/* InvisionSoporteBundle:UsuarioList:row.html.twig */
class __TwigTemplate_ebba35c377ffd0d162bb29bea5d3f423efafa963d4d1707effa1410c9cf377ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/row.html.twig");

        $this->blocks = array(
            'object_action_delete' => array($this, 'block_object_action_delete'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/row.html.twig";
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
        echo "<a  class=\"btn btn-default btn-xs \" href=\"javascript:;\" onClick=\"vel_admin.eliminar('el usuario ', '";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : $this->getContext($context, "Usuario")), "username"), "html", null, true);
        echo "', '";
        echo $this->env->getExtension('routing')->getPath("eliminar_usuario");
        echo "', '?pk=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : $this->getContext($context, "Usuario")), "id"), "html", null, true);
        echo "')\"><i class=\"fa fa-eraser\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:UsuarioList:row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,  380 => 128,  373 => 125,  370 => 124,  363 => 118,  353 => 114,  349 => 113,  346 => 112,  342 => 111,  336 => 108,  331 => 106,  328 => 105,  325 => 104,  322 => 103,  308 => 91,  305 => 90,  297 => 84,  293 => 83,  288 => 80,  285 => 79,  280 => 100,  278 => 90,  275 => 89,  272 => 79,  269 => 78,  255 => 57,  252 => 56,  247 => 71,  241 => 68,  238 => 67,  221 => 56,  218 => 55,  201 => 54,  198 => 53,  196 => 52,  193 => 51,  190 => 50,  182 => 46,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 130,  66 => 127,  58 => 103,  53 => 78,  46 => 73,  44 => 50,  42 => 21,  37 => 18,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 128,  64 => 124,  60 => 122,  55 => 102,  52 => 8,  43 => 7,  34 => 4,);
    }
}
