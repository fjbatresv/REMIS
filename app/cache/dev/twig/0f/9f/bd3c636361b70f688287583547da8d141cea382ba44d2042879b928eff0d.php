<?php

/* Admingenerated/InvisionSoporteBundle/Resources/views/PerfilList/row.html.twig */
class __TwigTemplate_0f9fbd3c636361b70f688287583547da8d141cea382ba44d2042879b928eff0d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'list_row' => array($this, 'block_list_row'),
            'list_row_content' => array($this, 'block_list_row_content'),
            'list_td_column_nombre' => array($this, 'block_list_td_column_nombre'),
            'list_td_column_descripcion' => array($this, 'block_list_td_column_descripcion'),
            'object_actions' => array($this, 'block_object_actions'),
            'object_action_edit' => array($this, 'block_object_action_edit'),
            'object_action_menu' => array($this, 'block_object_action_menu'),
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
        // line 51
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
                      <td class=\"td_VARCHAR td_descripcion\">
              ";
        // line 8
        $this->displayBlock('list_td_column_descripcion', $context, $blocks);
        // line 9
        echo "          </td>
        ";
    }

    // line 5
    public function block_list_td_column_nombre($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Perfil"]) ? $context["Perfil"] : $this->getContext($context, "Perfil")), "nombre"), "html", null, true);
    }

    // line 8
    public function block_list_td_column_descripcion($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Perfil"]) ? $context["Perfil"] : $this->getContext($context, "Perfil")), "descripcion"), "html", null, true);
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
        $this->displayBlock('object_action_menu', $context, $blocks);
        // line 36
        echo "                                    ";
        $this->displayBlock('object_action_delete', $context, $blocks);
        // line 47
        echo "                                ";
        $this->displayBlock('object_actions_customActions', $context, $blocks);
        // line 48
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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("editar_perfil", array("pk" => $this->getAttribute((isset($context["Perfil"]) ? $context["Perfil"] : $this->getContext($context, "Perfil")), "Id"))), "html", null, true);
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
    public function block_object_action_menu($context, array $blocks = array())
    {
        // line 26
        echo "                            
                                        
    ";
        // line 28
        ob_start();
        // line 29
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("menu_perfil", array("pk" => $this->getAttribute((isset($context["Perfil"]) ? $context["Perfil"] : $this->getContext($context, "Perfil")), "Id"), "action" => "menu")), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 30
        echo $this->env->getExtension('translator')->getTranslator()->trans("Menu", array(), "Admin");
        echo "\"
                rel=\"tooltip\"
        ><i class=\"fa fa fa-bars\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 34
        echo "    
                                                ";
    }

    // line 36
    public function block_object_action_delete($context, array $blocks = array())
    {
        // line 37
        echo "                            
                                        
    ";
        // line 39
        ob_start();
        // line 40
        echo "    <a  class=\"btn btn-default btn-xs \" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Perfil_object", array("pk" => $this->getAttribute((isset($context["Perfil"]) ? $context["Perfil"] : $this->getContext($context, "Perfil")), "Id"), "action" => "delete")), "html", null, true);
        echo "\"
        data-original-title=\"";
        // line 41
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.label", array(), "Admingenerator");
        echo "\"
                rel=\"tooltip\"
         data-confirm=\"";
        // line 43
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.object.delete.confirm", array(), "Admingenerator");
        echo "\"  data-csrf-token=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('admingenerator_csrf')->getCsrfToken($this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Perfil_object", array("pk" => $this->getAttribute((isset($context["Perfil"]) ? $context["Perfil"] : $this->getContext($context, "Perfil")), "Id"), "action" => "delete"))), "html", null, true);
        echo "\" ><i class=\"fa fa fa-eraser\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 45
        echo "    
                                                ";
    }

    // line 47
    public function block_object_actions_customActions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/PerfilList/row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  187 => 47,  182 => 45,  175 => 43,  163 => 39,  159 => 37,  156 => 36,  144 => 30,  139 => 29,  137 => 28,  133 => 26,  130 => 25,  125 => 23,  118 => 19,  113 => 18,  107 => 15,  104 => 14,  98 => 48,  95 => 47,  92 => 36,  89 => 25,  68 => 5,  63 => 9,  61 => 8,  57 => 6,  49 => 3,  40 => 11,  31 => 2,  28 => 1,  434 => 150,  427 => 147,  424 => 146,  417 => 140,  407 => 136,  403 => 135,  400 => 134,  396 => 133,  390 => 130,  385 => 128,  382 => 127,  379 => 126,  376 => 125,  362 => 113,  359 => 112,  351 => 106,  347 => 105,  342 => 102,  339 => 101,  334 => 122,  332 => 112,  329 => 111,  326 => 101,  323 => 100,  309 => 79,  306 => 78,  301 => 93,  295 => 90,  292 => 89,  275 => 78,  272 => 77,  255 => 76,  252 => 75,  250 => 74,  247 => 73,  244 => 72,  236 => 68,  231 => 65,  227 => 63,  224 => 62,  219 => 59,  214 => 56,  211 => 55,  209 => 54,  205 => 53,  201 => 52,  197 => 50,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 41,  165 => 40,  160 => 34,  157 => 33,  155 => 32,  151 => 34,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 17,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 12,  77 => 2,  71 => 152,  66 => 149,  58 => 125,  53 => 100,  46 => 95,  44 => 72,  42 => 21,  37 => 3,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 14,  82 => 24,  80 => 11,  76 => 20,  74 => 8,  72 => 17,  69 => 150,  64 => 146,  60 => 144,  55 => 5,  52 => 4,  43 => 51,  34 => 4,);
    }
}
