<?php

/* Admingenerated/InvisionInventarioBundle/Resources/views/InventarioList/row.html.twig */
class __TwigTemplate_0898d21346be5a85e2b73e330be8d3f44012886e7ec5f8d08d41ad4f90b9990a extends Twig_Template
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
        // line 14
        echo "    ";
        $this->displayBlock('object_actions', $context, $blocks);
        // line 43
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
    public function block_object_actions($context, array $blocks = array())
    {
        // line 15
        echo "                                <td class=\"object_actions\">
                            <div class=\"btn-group\">
                                    ";
        // line 17
        $this->displayBlock('object_action_edit', $context, $blocks);
        // line 28
        echo "                                    ";
        $this->displayBlock('object_action_delete', $context, $blocks);
        // line 39
        echo "                                ";
        $this->displayBlock('object_actions_customActions', $context, $blocks);
        // line 40
        echo "                </div>
                        </td>
                    ";
    }

    // line 17
    public function block_object_action_edit($context, array $blocks = array())
    {
        // line 18
        echo "                            
                                        
    ";
        // line 20
        ob_start();
        // line 21
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Inventario_edit", array("pk" => $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "Id"))), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 22
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.edit.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
        ><i class=\"fa fa-edit\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 26
        echo "    
                                                ";
    }

    // line 28
    public function block_object_action_delete($context, array $blocks = array())
    {
        // line 29
        echo "                            
                                        
    ";
        // line 31
        ob_start();
        // line 32
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Inventario_object", array("pk" => $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "Id"), "action" => "delete")), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 33
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
         data-confirm=\"";
        // line 35
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.confirm", array(), "Admingenerator");
        echo "\"  data-csrf-token=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('admingenerator_csrf')->getCsrfToken($this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Inventario_object", array("pk" => $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "Id"), "action" => "delete"))), "html", null, true);
        echo "\" ><i class=\"fa fa-times\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 37
        echo "    
                                                ";
    }

    // line 39
    public function block_object_actions_customActions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionInventarioBundle/Resources/views/InventarioList/row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  158 => 35,  153 => 33,  148 => 32,  146 => 31,  142 => 29,  139 => 28,  134 => 26,  127 => 22,  122 => 21,  120 => 20,  113 => 17,  107 => 40,  104 => 39,  101 => 28,  95 => 15,  92 => 14,  86 => 11,  67 => 11,  63 => 9,  61 => 8,  57 => 6,  49 => 3,  40 => 14,  31 => 2,  28 => 1,  453 => 156,  446 => 153,  443 => 152,  436 => 146,  426 => 142,  422 => 141,  419 => 140,  415 => 139,  409 => 136,  404 => 134,  401 => 133,  398 => 132,  395 => 131,  381 => 119,  378 => 118,  370 => 112,  366 => 111,  361 => 108,  358 => 107,  353 => 128,  351 => 118,  348 => 117,  345 => 107,  342 => 106,  328 => 85,  325 => 84,  320 => 99,  314 => 96,  311 => 95,  294 => 84,  291 => 83,  274 => 82,  271 => 81,  269 => 80,  266 => 79,  263 => 78,  255 => 74,  250 => 71,  246 => 69,  243 => 68,  238 => 65,  233 => 62,  230 => 61,  228 => 60,  224 => 59,  220 => 58,  216 => 56,  214 => 55,  202 => 53,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 39,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 18,  111 => 14,  102 => 11,  99 => 17,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 158,  66 => 155,  58 => 131,  53 => 106,  46 => 101,  44 => 78,  42 => 21,  37 => 3,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 8,  76 => 20,  74 => 5,  72 => 17,  69 => 12,  64 => 152,  60 => 150,  55 => 5,  52 => 4,  43 => 43,  34 => 4,);
    }
}
