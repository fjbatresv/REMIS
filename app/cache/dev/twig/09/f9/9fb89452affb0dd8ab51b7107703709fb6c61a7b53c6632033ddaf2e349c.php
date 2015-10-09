<?php

/* Admingenerated/InvisionVentaBundle/Resources/views/InventarioList/row.html.twig */
class __TwigTemplate_09f99fb89452affb0dd8ab51b7107703709fb6c61a7b53c6632033ddaf2e349c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'list_row' => array($this, 'block_list_row'),
            'list_row_content' => array($this, 'block_list_row_content'),
            'list_td_column_codigo' => array($this, 'block_list_td_column_codigo'),
            'list_td_column_colorNombre' => array($this, 'block_list_td_column_colorNombre'),
            'list_td_column_cantidad' => array($this, 'block_list_td_column_cantidad'),
            'list_td_column_costo' => array($this, 'block_list_td_column_costo'),
            'list_td_column_venta' => array($this, 'block_list_td_column_venta'),
            'object_actions' => array($this, 'block_object_actions'),
            'object_action_edit' => array($this, 'block_object_action_edit'),
            'object_action_delete' => array($this, 'block_object_action_delete'),
            'object_actions_customActions' => array($this, 'block_object_actions_customActions'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 2
        $this->displayBlock('list_row', $context, $blocks);
    }

    public function block_list_row($context, array $blocks = array())
    {
        // line 3
        echo "<tr class=\"list_trow\">";
        $this->displayBlock('list_row_content', $context, $blocks);
        // line 20
        echo "    ";
        $this->displayBlock('object_actions', $context, $blocks);
        // line 49
        echo "
</tr>
";
    }

    // line 3
    public function block_list_row_content($context, array $blocks = array())
    {
        // line 4
        echo "                      <td class=\"td_VARCHAR td_codigo\">
              ";
        // line 5
        $this->displayBlock('list_td_column_codigo', $context, $blocks);
        // line 6
        echo "          </td>
                      <td class=\"td_virtual td_colorNombre\">
              ";
        // line 8
        $this->displayBlock('list_td_column_colorNombre', $context, $blocks);
        // line 9
        echo "          </td>
                      <td class=\"td_INTEGER td_cantidad\">
              ";
        // line 11
        $this->displayBlock('list_td_column_cantidad', $context, $blocks);
        // line 12
        echo "          </td>
                      <td class=\"td_DOUBLE td_costo\">
              ";
        // line 14
        $this->displayBlock('list_td_column_costo', $context, $blocks);
        // line 15
        echo "          </td>
                      <td class=\"td_DOUBLE td_venta\">
              ";
        // line 17
        $this->displayBlock('list_td_column_venta', $context, $blocks);
        // line 18
        echo "          </td>
        ";
    }

    // line 5
    public function block_list_td_column_codigo($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "codigo"), "html", null, true);
    }

    // line 8
    public function block_list_td_column_colorNombre($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "color"), "nombre"), "html", null, true);
    }

    // line 11
    public function block_list_td_column_cantidad($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "cantidad"), "html", null, true);
    }

    // line 14
    public function block_list_td_column_costo($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "costo"), "html", null, true);
    }

    // line 17
    public function block_list_td_column_venta($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "venta"), "html", null, true);
    }

    // line 20
    public function block_object_actions($context, array $blocks = array())
    {
        // line 21
        echo "                                <td class=\"object_actions\">
                            <div class=\"btn-group\">
                                    ";
        // line 23
        $this->displayBlock('object_action_edit', $context, $blocks);
        // line 34
        echo "                                    ";
        $this->displayBlock('object_action_delete', $context, $blocks);
        // line 45
        echo "                                ";
        $this->displayBlock('object_actions_customActions', $context, $blocks);
        // line 46
        echo "                </div>
                        </td>
                    ";
    }

    // line 23
    public function block_object_action_edit($context, array $blocks = array())
    {
        // line 24
        echo "                            
                                        
    ";
        // line 26
        ob_start();
        // line 27
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("editar_inventario", array("pk" => $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "Id"))), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 28
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.edit.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
        ><i class=\"fa fa fa-pencil\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 32
        echo "    
                                                ";
    }

    // line 34
    public function block_object_action_delete($context, array $blocks = array())
    {
        // line 35
        echo "                            
                                        
    ";
        // line 37
        ob_start();
        // line 38
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_VentaBundle_Inventario_object", array("pk" => $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "Id"), "action" => "delete")), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 39
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
         data-confirm=\"";
        // line 41
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.confirm", array(), "Admingenerator");
        echo "\"  data-csrf-token=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('admingenerator_csrf')->getCsrfToken($this->env->getExtension('routing')->getPath("Invision_VentaBundle_Inventario_object", array("pk" => $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "Id"), "action" => "delete"))), "html", null, true);
        echo "\" ><i class=\"fa fa-times\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 43
        echo "    
                                                ";
    }

    // line 45
    public function block_object_actions_customActions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionVentaBundle/Resources/views/InventarioList/row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  196 => 45,  191 => 43,  184 => 41,  179 => 39,  174 => 38,  172 => 37,  168 => 35,  153 => 28,  148 => 27,  146 => 26,  142 => 24,  139 => 23,  133 => 46,  130 => 45,  127 => 34,  125 => 23,  118 => 20,  112 => 17,  106 => 14,  81 => 17,  75 => 14,  65 => 9,  63 => 8,  59 => 6,  57 => 5,  54 => 4,  51 => 3,  45 => 49,  39 => 3,  561 => 200,  554 => 197,  551 => 196,  544 => 190,  534 => 186,  530 => 185,  527 => 184,  523 => 183,  517 => 180,  512 => 178,  509 => 177,  506 => 176,  503 => 175,  489 => 163,  486 => 162,  478 => 156,  474 => 155,  469 => 152,  466 => 151,  461 => 172,  459 => 162,  456 => 161,  453 => 151,  450 => 150,  436 => 129,  433 => 128,  428 => 143,  422 => 140,  419 => 139,  402 => 128,  399 => 127,  382 => 126,  379 => 125,  377 => 124,  374 => 123,  371 => 122,  363 => 118,  358 => 115,  354 => 113,  351 => 112,  346 => 109,  341 => 106,  338 => 105,  336 => 104,  332 => 103,  328 => 102,  324 => 100,  322 => 99,  310 => 97,  304 => 93,  300 => 91,  297 => 90,  292 => 87,  287 => 84,  284 => 83,  282 => 82,  278 => 81,  274 => 80,  270 => 78,  268 => 77,  256 => 75,  250 => 71,  246 => 69,  243 => 68,  238 => 65,  233 => 62,  230 => 61,  228 => 60,  224 => 59,  220 => 58,  216 => 56,  214 => 55,  202 => 53,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 34,  160 => 32,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 5,  85 => 5,  83 => 18,  77 => 15,  71 => 12,  66 => 199,  58 => 175,  53 => 150,  46 => 145,  44 => 122,  42 => 20,  37 => 18,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 11,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 11,  64 => 196,  60 => 194,  55 => 174,  52 => 8,  43 => 7,  34 => 4,);
    }
}
