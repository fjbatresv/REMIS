<?php

/* Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/row.html.twig */
class __TwigTemplate_6d20441bd4ca3b7add75ad8041a4431ec304c035bd9c6ed99f227f66fc47d0c5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'list_row' => array($this, 'block_list_row'),
            'list_row_content' => array($this, 'block_list_row_content'),
            'list_td_column_nombre' => array($this, 'block_list_td_column_nombre'),
            'list_td_column_username' => array($this, 'block_list_td_column_username'),
            'list_td_column_fecha_nacimiento' => array($this, 'block_list_td_column_fecha_nacimiento'),
            'object_actions' => array($this, 'block_object_actions'),
            'object_action_edit' => array($this, 'block_object_action_edit'),
            'object_action_delete' => array($this, 'block_object_action_delete'),
            'object_action_horario' => array($this, 'block_object_action_horario'),
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
        // line 15
        echo "    ";
        $this->displayBlock('object_actions', $context, $blocks);
        // line 55
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
                      <td class=\"td_VARCHAR td_username\">
              ";
        // line 8
        $this->displayBlock('list_td_column_username', $context, $blocks);
        // line 9
        echo "          </td>
                      <td class=\"td_DATE td_fecha_nacimiento\">
              ";
        // line 11
        $this->displayBlock('list_td_column_fecha_nacimiento', $context, $blocks);
        // line 13
        echo "          </td>
        ";
    }

    // line 5
    public function block_list_td_column_nombre($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : null), "nombre"), "html", null, true);
    }

    // line 8
    public function block_list_td_column_username($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : null), "username"), "html", null, true);
    }

    // line 11
    public function block_list_td_column_fecha_nacimiento($context, array $blocks = array())
    {
        if ($this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : null), "fechaNacimiento")) {
            $context["date_format"] = "Y-m-d";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : null), "fechaNacimiento"), (isset($context["date_format"]) ? $context["date_format"] : null)), "html", null, true);
            echo "
    ";
        }
    }

    // line 15
    public function block_object_actions($context, array $blocks = array())
    {
        // line 16
        echo "                                <td class=\"object_actions\">
                            <div class=\"btn-group\">
                                    ";
        // line 18
        $this->displayBlock('object_action_edit', $context, $blocks);
        // line 29
        echo "                                    ";
        $this->displayBlock('object_action_delete', $context, $blocks);
        // line 40
        echo "                                    ";
        $this->displayBlock('object_action_horario', $context, $blocks);
        // line 51
        echo "                                ";
        $this->displayBlock('object_actions_customActions', $context, $blocks);
        // line 52
        echo "                </div>
                        </td>
                    ";
    }

    // line 18
    public function block_object_action_edit($context, array $blocks = array())
    {
        // line 19
        echo "                            
                                        
    ";
        // line 21
        ob_start();
        // line 22
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("editar_usuario", array("pk" => $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : null), "Id"))), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 23
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.edit.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
        ><i class=\"fa fa-edit\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 27
        echo "    
                                                ";
    }

    // line 29
    public function block_object_action_delete($context, array $blocks = array())
    {
        // line 30
        echo "                            
                                        
    ";
        // line 32
        ob_start();
        // line 33
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Usuario_object", array("pk" => $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : null), "Id"), "action" => "delete")), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 34
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
         data-confirm=\"";
        // line 36
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.confirm", array(), "Admingenerator");
        echo "\"  data-csrf-token=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('admingenerator_csrf')->getCsrfToken($this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Usuario_object", array("pk" => $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : null), "Id"), "action" => "delete"))), "html", null, true);
        echo "\" ><i class=\"fa fa-times\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 38
        echo "    
                                                ";
    }

    // line 40
    public function block_object_action_horario($context, array $blocks = array())
    {
        // line 41
        echo "                            
                                        
    ";
        // line 43
        ob_start();
        // line 44
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("horario_usuario", array("pk" => $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : null), "Id"), "action" => "horario")), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 45
        echo $this->env->getExtension('translator')->getTranslator()->trans("Horario", array(), "Admin");
        echo "\"
                rel=\"tooltip\"
        ><i class=\"fa fa fa-calendar-o\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 49
        echo "    
                                                ";
    }

    // line 51
    public function block_object_actions_customActions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  200 => 49,  193 => 45,  188 => 44,  186 => 43,  182 => 41,  179 => 40,  174 => 38,  167 => 36,  162 => 34,  148 => 29,  136 => 23,  131 => 22,  125 => 19,  122 => 18,  113 => 51,  110 => 40,  107 => 29,  101 => 16,  98 => 15,  81 => 8,  75 => 5,  70 => 13,  68 => 11,  62 => 8,  56 => 5,  50 => 3,  41 => 15,  38 => 3,  32 => 2,  29 => 1,  31 => 3,  28 => 2,  488 => 172,  481 => 169,  478 => 168,  471 => 162,  461 => 158,  457 => 157,  454 => 156,  450 => 155,  444 => 152,  439 => 150,  436 => 149,  433 => 148,  430 => 147,  416 => 135,  413 => 134,  405 => 128,  401 => 127,  396 => 124,  393 => 123,  388 => 144,  386 => 134,  383 => 133,  380 => 123,  377 => 122,  363 => 101,  360 => 100,  355 => 115,  349 => 112,  346 => 111,  329 => 100,  326 => 99,  309 => 98,  306 => 97,  304 => 96,  301 => 95,  298 => 94,  290 => 90,  285 => 87,  281 => 85,  278 => 84,  273 => 81,  268 => 78,  265 => 77,  263 => 76,  259 => 75,  255 => 74,  251 => 72,  249 => 71,  237 => 69,  231 => 65,  227 => 63,  224 => 62,  219 => 59,  214 => 56,  211 => 55,  209 => 54,  205 => 51,  201 => 52,  197 => 50,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 30,  147 => 30,  143 => 27,  141 => 27,  129 => 21,  124 => 22,  121 => 21,  116 => 52,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 174,  66 => 171,  58 => 6,  53 => 4,  46 => 117,  44 => 55,  42 => 21,  37 => 18,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 18,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 172,  64 => 9,  60 => 166,  55 => 146,  52 => 8,  43 => 7,  34 => 4,);
    }
}
