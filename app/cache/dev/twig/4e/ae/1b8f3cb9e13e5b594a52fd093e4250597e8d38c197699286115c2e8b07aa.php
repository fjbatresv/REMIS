<?php

/* Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/row.html.twig */
class __TwigTemplate_4eae1b8f3cb9e13e5b594a52fd093e4250597e8d38c197699286115c2e8b07aa extends Twig_Template
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
            'object_action_horario' => array($this, 'block_object_action_horario'),
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
        // line 48
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : $this->getContext($context, "Usuario")), "username"), "html", null, true);
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
        $this->displayBlock('object_action_horario', $context, $blocks);
        // line 33
        echo "                                    ";
        $this->displayBlock('object_action_delete', $context, $blocks);
        // line 44
        echo "                                ";
        $this->displayBlock('object_actions_customActions', $context, $blocks);
        // line 45
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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("editar_usuario", array("pk" => $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : $this->getContext($context, "Usuario")), "Id"))), "html", null, true);
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
    public function block_object_action_horario($context, array $blocks = array())
    {
        // line 23
        echo "                            
                                        
    ";
        // line 25
        ob_start();
        // line 26
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("horario_usuario", array("pk" => $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : $this->getContext($context, "Usuario")), "Id"), "action" => "horario")), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 27
        echo $this->env->getExtension('translator')->getTranslator()->trans("Horario", array(), "Admin");
        echo "\"
                rel=\"tooltip\"
        ><i class=\"fa fa fa-clock-o\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 31
        echo "    
                                                ";
    }

    // line 33
    public function block_object_action_delete($context, array $blocks = array())
    {
        // line 34
        echo "                            
                                        
    ";
        // line 36
        ob_start();
        // line 37
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Usuario_object", array("pk" => $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : $this->getContext($context, "Usuario")), "Id"), "action" => "delete")), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 38
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
         data-confirm=\"";
        // line 40
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.confirm", array(), "Admingenerator");
        echo "\"  data-csrf-token=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('admingenerator_csrf')->getCsrfToken($this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Usuario_object", array("pk" => $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : $this->getContext($context, "Usuario")), "Id"), "action" => "delete"))), "html", null, true);
        echo "\" ><i class=\"fa fa-times\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 42
        echo "    
                                                ";
    }

    // line 44
    public function block_object_actions_customActions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  174 => 44,  169 => 42,  162 => 40,  152 => 37,  150 => 36,  146 => 34,  138 => 31,  131 => 27,  126 => 26,  120 => 23,  117 => 22,  112 => 20,  98 => 14,  79 => 33,  70 => 9,  67 => 8,  61 => 5,  56 => 6,  54 => 5,  51 => 4,  48 => 3,  39 => 8,  36 => 3,  27 => 1,  380 => 128,  373 => 125,  370 => 124,  363 => 118,  353 => 114,  349 => 113,  346 => 112,  342 => 111,  336 => 108,  331 => 106,  328 => 105,  325 => 104,  322 => 103,  308 => 91,  305 => 90,  297 => 84,  293 => 83,  288 => 80,  285 => 79,  280 => 100,  278 => 90,  275 => 89,  272 => 79,  269 => 78,  255 => 57,  252 => 56,  247 => 71,  241 => 68,  238 => 67,  221 => 56,  218 => 55,  201 => 54,  198 => 53,  196 => 52,  193 => 51,  190 => 50,  182 => 46,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 38,  155 => 32,  151 => 31,  147 => 30,  143 => 33,  141 => 27,  129 => 25,  124 => 25,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 12,  91 => 11,  88 => 6,  85 => 45,  83 => 4,  77 => 2,  71 => 130,  66 => 127,  58 => 103,  53 => 78,  46 => 73,  44 => 50,  42 => 48,  37 => 18,  35 => 16,  33 => 2,  30 => 2,  108 => 13,  105 => 16,  100 => 15,  93 => 13,  90 => 12,  87 => 11,  82 => 44,  80 => 3,  76 => 22,  74 => 11,  72 => 17,  69 => 128,  64 => 124,  60 => 122,  55 => 102,  52 => 8,  43 => 7,  34 => 4,);
    }
}
