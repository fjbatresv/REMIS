<?php

/* InvisionVentaBundle:ColorList:row.html.twig */
class __TwigTemplate_6e95a3f7760405711597fa8a849a0cf78c4ce2a601fc56d831462c0c50982a91 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionVentaBundle/Resources/views/ColorList/row.html.twig");

        $this->blocks = array(
            'object_action_delete' => array($this, 'block_object_action_delete'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionVentaBundle/Resources/views/ColorList/row.html.twig";
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
        echo "<a  class=\"btn btn-default btn-xs \" href=\"javascript:;\" onClick=\"vel_admin.eliminar('el color ', '";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Color"]) ? $context["Color"] : $this->getContext($context, "Color")), "nombre"), "html", null, true);
        echo "', '";
        echo $this->env->getExtension('routing')->getPath("eliminar_color");
        echo "', '?pk=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Color"]) ? $context["Color"] : $this->getContext($context, "Color")), "id"), "html", null, true);
        echo "')\"><i class=\"fa fa-times\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "InvisionVentaBundle:ColorList:row.html.twig";
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
