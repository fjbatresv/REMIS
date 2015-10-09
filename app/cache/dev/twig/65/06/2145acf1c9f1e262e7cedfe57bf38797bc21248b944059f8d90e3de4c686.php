<?php

/* InvisionVentaBundle:InventarioList:row.html.twig */
class __TwigTemplate_65062145acf1c9f1e262e7cedfe57bf38797bc21248b944059f8d90e3de4c686 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionVentaBundle/Resources/views/InventarioList/row.html.twig");

        $this->blocks = array(
            'object_action_delete' => array($this, 'block_object_action_delete'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionVentaBundle/Resources/views/InventarioList/row.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_object_action_delete($context, array $blocks = array())
    {
        // line 3
        ob_start();
        // line 4
        echo "<a  class=\"btn btn-default btn-xs \" 
    onClick=\"vel_admin.eliminar('el articulo ', '";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "codigo"), "html", null, true);
        echo "', '";
        echo $this->env->getExtension('routing')->getPath("eliminar_inventario");
        echo "', '?pk=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "id"), "html", null, true);
        echo "')\">
    <i class=\"fa fa-times\"></i>
</a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "InvisionVentaBundle:InventarioList:row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  31 => 3,  28 => 2,  507 => 178,  500 => 175,  497 => 174,  490 => 168,  480 => 164,  476 => 163,  473 => 162,  469 => 161,  463 => 158,  458 => 156,  455 => 155,  452 => 154,  449 => 153,  435 => 141,  432 => 140,  424 => 134,  420 => 133,  415 => 130,  412 => 129,  407 => 150,  405 => 140,  402 => 139,  399 => 129,  396 => 128,  382 => 107,  379 => 106,  374 => 121,  368 => 118,  365 => 117,  348 => 106,  345 => 105,  328 => 104,  325 => 103,  323 => 102,  320 => 101,  317 => 100,  309 => 96,  304 => 93,  300 => 91,  297 => 90,  292 => 87,  287 => 84,  284 => 83,  282 => 82,  278 => 81,  274 => 80,  270 => 78,  268 => 77,  256 => 75,  250 => 71,  246 => 69,  243 => 68,  238 => 65,  233 => 62,  230 => 61,  228 => 60,  224 => 59,  220 => 58,  216 => 56,  214 => 55,  202 => 53,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 180,  66 => 177,  58 => 153,  53 => 128,  46 => 123,  44 => 100,  42 => 21,  37 => 18,  35 => 16,  33 => 4,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 178,  64 => 174,  60 => 172,  55 => 152,  52 => 8,  43 => 7,  34 => 4,);
    }
}
