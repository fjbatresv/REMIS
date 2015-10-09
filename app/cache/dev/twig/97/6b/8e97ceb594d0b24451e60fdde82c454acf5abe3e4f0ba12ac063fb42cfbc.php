<?php

/* Admingenerated/InvisionInventarioBundle/Resources/views/ColorList/row.html.twig */
class __TwigTemplate_976b8e97ceb594d0b24451e60fdde82c454acf5abe3e4f0ba12ac063fb42cfbc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'list_row' => array($this, 'block_list_row'),
            'list_row_content' => array($this, 'block_list_row_content'),
            'list_td_column_nombre' => array($this, 'block_list_td_column_nombre'),
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
        // line 8
        echo "    ";
        $this->displayBlock('object_actions', $context, $blocks);
        // line 37
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
        ";
    }

    // line 5
    public function block_list_td_column_nombre($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Color"]) ? $context["Color"] : $this->getContext($context, "Color")), "nombre"), "html", null, true);
    }

    // line 8
    public function block_object_actions($context, array $blocks = array())
    {
        // line 9
        echo "                                <td class=\"object_actions\">
                            <div class=\"btn-group\">
                                    ";
        // line 11
        $this->displayBlock('object_action_edit', $context, $blocks);
        // line 22
        echo "                                    ";
        $this->displayBlock('object_action_delete', $context, $blocks);
        // line 33
        echo "                                ";
        $this->displayBlock('object_actions_customActions', $context, $blocks);
        // line 34
        echo "                </div>
                        </td>
                    ";
    }

    // line 11
    public function block_object_action_edit($context, array $blocks = array())
    {
        // line 12
        echo "                            
                                        
    ";
        // line 14
        ob_start();
        // line 15
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("editar_color", array("pk" => $this->getAttribute((isset($context["Color"]) ? $context["Color"] : $this->getContext($context, "Color")), "Id"))), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 16
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.edit.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
        ><i class=\"fa fa fa-pencil\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 20
        echo "    
                                                ";
    }

    // line 22
    public function block_object_action_delete($context, array $blocks = array())
    {
        // line 23
        echo "                            
                                        
    ";
        // line 25
        ob_start();
        // line 26
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Color_object", array("pk" => $this->getAttribute((isset($context["Color"]) ? $context["Color"] : $this->getContext($context, "Color")), "Id"), "action" => "delete")), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 27
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
         data-confirm=\"";
        // line 29
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.confirm", array(), "Admingenerator");
        echo "\"  data-csrf-token=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('admingenerator_csrf')->getCsrfToken($this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Color_object", array("pk" => $this->getAttribute((isset($context["Color"]) ? $context["Color"] : $this->getContext($context, "Color")), "Id"), "action" => "delete"))), "html", null, true);
        echo "\" ><i class=\"fa fa-times\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 31
        echo "    
                                                ";
    }

    // line 33
    public function block_object_actions_customActions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionInventarioBundle/Resources/views/ColorList/row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  144 => 33,  139 => 31,  132 => 29,  127 => 27,  122 => 26,  120 => 25,  113 => 22,  101 => 16,  96 => 15,  81 => 34,  78 => 33,  75 => 22,  73 => 11,  50 => 4,  47 => 3,  41 => 37,  38 => 8,  29 => 2,  26 => 1,  380 => 128,  373 => 125,  370 => 124,  363 => 118,  353 => 114,  349 => 113,  346 => 112,  342 => 111,  336 => 108,  331 => 106,  328 => 105,  325 => 104,  322 => 103,  308 => 91,  305 => 90,  297 => 84,  293 => 83,  288 => 80,  285 => 79,  280 => 100,  278 => 90,  275 => 89,  272 => 79,  269 => 78,  255 => 57,  252 => 56,  247 => 71,  241 => 68,  238 => 67,  221 => 56,  218 => 55,  201 => 54,  198 => 53,  196 => 52,  193 => 51,  190 => 50,  182 => 46,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 23,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 14,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 130,  66 => 8,  58 => 103,  53 => 5,  46 => 73,  44 => 50,  42 => 21,  37 => 18,  35 => 3,  33 => 2,  30 => 1,  108 => 20,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 9,  64 => 124,  60 => 5,  55 => 6,  52 => 8,  43 => 7,  34 => 4,);
    }
}
