<?php

/* Admingenerated/InvisionSoporteBundle/Resources/views/SedeList/row.html.twig */
class __TwigTemplate_5efacf2d2803006ef6e3fcf775b32f9b56cb2d75e3606ed8d9ac5c6ab2a0f8e5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'list_row' => array($this, 'block_list_row'),
            'list_row_content' => array($this, 'block_list_row_content'),
            'list_td_column_nombre' => array($this, 'block_list_td_column_nombre'),
            'list_td_column_tipo' => array($this, 'block_list_td_column_tipo'),
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
        // line 11
        echo "    ";
        $this->displayBlock('object_actions', $context, $blocks);
        // line 40
        echo "
</tr>
";
    }

    // line 3
    public function block_list_row_content($context, array $blocks = array())
    {
        // line 4
        echo "                      <td class=\"td_VARCHAR td_nombre\">
              ";
        // line 5
        $this->displayBlock('list_td_column_nombre', $context, $blocks);
        // line 6
        echo "          </td>
                      <td class=\"td_virtual td_tipo\">
              ";
        // line 8
        $this->displayBlock('list_td_column_tipo', $context, $blocks);
        // line 9
        echo "          </td>
        ";
    }

    // line 5
    public function block_list_td_column_nombre($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Sede"]) ? $context["Sede"] : $this->getContext($context, "Sede")), "nombre"), "html", null, true);
    }

    // line 8
    public function block_list_td_column_tipo($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["Sede"]) ? $context["Sede"] : $this->getContext($context, "Sede")), "tipoSede"), "nombre"), "html", null, true);
    }

    // line 11
    public function block_object_actions($context, array $blocks = array())
    {
        // line 12
        echo "                                <td class=\"object_actions\">
                            <div class=\"btn-group\">
                                    ";
        // line 14
        $this->displayBlock('object_action_edit', $context, $blocks);
        // line 25
        echo "                                    ";
        $this->displayBlock('object_action_delete', $context, $blocks);
        // line 36
        echo "                                ";
        $this->displayBlock('object_actions_customActions', $context, $blocks);
        // line 37
        echo "                </div>
                        </td>
                    ";
    }

    // line 14
    public function block_object_action_edit($context, array $blocks = array())
    {
        // line 15
        echo "                            
                                        
    ";
        // line 17
        ob_start();
        // line 18
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("editar_sede", array("pk" => $this->getAttribute((isset($context["Sede"]) ? $context["Sede"] : $this->getContext($context, "Sede")), "Id"))), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 19
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.edit.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
        ><i class=\"fa fa fa-pencil\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 23
        echo "    
                                                ";
    }

    // line 25
    public function block_object_action_delete($context, array $blocks = array())
    {
        // line 26
        echo "                            
                                        
    ";
        // line 28
        ob_start();
        // line 29
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("eliminar_sede", array("pk" => $this->getAttribute((isset($context["Sede"]) ? $context["Sede"] : $this->getContext($context, "Sede")), "Id"), "action" => "delete")), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 30
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
         data-confirm=\"";
        // line 32
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.confirm", array(), "Admingenerator");
        echo "\"  data-csrf-token=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('admingenerator_csrf')->getCsrfToken($this->env->getExtension('routing')->getPath("eliminar_sede", array("pk" => $this->getAttribute((isset($context["Sede"]) ? $context["Sede"] : $this->getContext($context, "Sede")), "Id"), "action" => "delete"))), "html", null, true);
        echo "\" ><i class=\"fa fa fa-eraser\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 34
        echo "    
                                                ";
    }

    // line 36
    public function block_object_actions_customActions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/SedeList/row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  152 => 34,  145 => 32,  140 => 30,  135 => 29,  133 => 28,  126 => 25,  114 => 19,  109 => 18,  107 => 17,  103 => 15,  86 => 14,  79 => 11,  73 => 8,  67 => 5,  62 => 9,  56 => 6,  54 => 5,  51 => 4,  48 => 3,  39 => 11,  36 => 3,  27 => 1,  399 => 134,  392 => 131,  389 => 130,  382 => 124,  372 => 120,  368 => 119,  365 => 118,  361 => 117,  355 => 114,  350 => 112,  347 => 111,  344 => 110,  341 => 109,  327 => 97,  324 => 96,  316 => 90,  312 => 89,  307 => 86,  304 => 85,  299 => 106,  297 => 96,  294 => 95,  291 => 85,  288 => 84,  274 => 63,  271 => 62,  266 => 77,  260 => 74,  257 => 73,  240 => 62,  237 => 61,  220 => 60,  217 => 59,  215 => 58,  212 => 57,  209 => 56,  201 => 52,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 36,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 26,  124 => 22,  121 => 23,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 37,  91 => 36,  88 => 25,  85 => 5,  83 => 4,  77 => 2,  71 => 136,  66 => 133,  58 => 109,  53 => 84,  46 => 79,  44 => 56,  42 => 40,  37 => 18,  35 => 16,  33 => 2,  30 => 2,  108 => 13,  105 => 12,  100 => 14,  93 => 13,  90 => 12,  87 => 11,  82 => 12,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 134,  64 => 130,  60 => 8,  55 => 108,  52 => 8,  43 => 7,  34 => 4,);
    }
}
