<?php

/* InvisionSoporteBundle:SedeList:row.html.twig */
class __TwigTemplate_11ef3591ac0d04b9c71e96e83d507ffda3f1e216aaa5b3fd6c61f90a1093548e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionSoporteBundle/Resources/views/SedeList/row.html.twig");

        $this->blocks = array(
            'object_action_delete' => array($this, 'block_object_action_delete'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/SedeList/row.html.twig";
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
        echo "<a  class=\"btn btn-default btn-xs \" href=\"javascript:;\" onClick=\"vel_admin.eliminar('la sede ', '";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Sede"]) ? $context["Sede"] : $this->getContext($context, "Sede")), "nombre"), "html", null, true);
        echo "', '";
        echo $this->env->getExtension('routing')->getPath("eliminar_sede");
        echo "', '?pk=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Sede"]) ? $context["Sede"] : $this->getContext($context, "Sede")), "id"), "html", null, true);
        echo "')\"><i class=\"fa fa-eraser\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:SedeList:row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,  399 => 134,  392 => 131,  389 => 130,  382 => 124,  372 => 120,  368 => 119,  365 => 118,  361 => 117,  355 => 114,  350 => 112,  347 => 111,  344 => 110,  341 => 109,  327 => 97,  324 => 96,  316 => 90,  312 => 89,  307 => 86,  304 => 85,  299 => 106,  297 => 96,  294 => 95,  291 => 85,  288 => 84,  274 => 63,  271 => 62,  266 => 77,  260 => 74,  257 => 73,  240 => 62,  237 => 61,  220 => 60,  217 => 59,  215 => 58,  212 => 57,  209 => 56,  201 => 52,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 136,  66 => 133,  58 => 109,  53 => 84,  46 => 79,  44 => 56,  42 => 21,  37 => 18,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 134,  64 => 130,  60 => 128,  55 => 108,  52 => 8,  43 => 7,  34 => 4,);
    }
}
