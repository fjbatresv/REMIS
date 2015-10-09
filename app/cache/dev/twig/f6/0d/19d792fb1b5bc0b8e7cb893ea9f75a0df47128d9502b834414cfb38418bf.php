<?php

/* Admingenerated/InvisionInventarioBundle/Resources/views/InventarioNew/form.html.twig */
class __TwigTemplate_f60d19d792fb1b5bc0b8e7cb893ea9f75a0df47128d9502b834414cfb38418bf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form' => array($this, 'block_form'),
            'form_fieldset_NONE' => array($this, 'block_form_fieldset_NONE'),
            'form_id' => array($this, 'block_form_id'),
            'form_codigo' => array($this, 'block_form_codigo'),
            'form_color_id' => array($this, 'block_form_color_id'),
            'form_cantidad' => array($this, 'block_form_cantidad'),
            'form_costo' => array($this, 'block_form_costo'),
            'form_venta' => array($this, 'block_form_venta'),
            'form_descripcion' => array($this, 'block_form_descripcion'),
            'form_imagen' => array($this, 'block_form_imagen'),
            'form_sede_id' => array($this, 'block_form_sede_id'),
            'form_created_by' => array($this, 'block_form_created_by'),
            'form_updated_by' => array($this, 'block_form_updated_by'),
            'form_created_at' => array($this, 'block_form_created_at'),
            'form_updated_at' => array($this, 'block_form_updated_at'),
            'form_buttons' => array($this, 'block_form_buttons'),
            'generic_actions' => array($this, 'block_generic_actions'),
            'generic_action_save' => array($this, 'block_generic_action_save'),
            'generic_action_list' => array($this, 'block_generic_action_list'),
            'generic_actions_script' => array($this, 'block_generic_actions_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
    ";
        // line 2
        $this->displayBlock('form', $context, $blocks);
    }

    public function block_form($context, array $blocks = array())
    {
        // line 3
        echo "    <form class=\"admin_form\"
        ";
        // line 4
        if ($this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "Id")) {
            // line 5
            echo "            action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Inventario_update", array("pk" => $this->getAttribute((isset($context["Inventario"]) ? $context["Inventario"] : $this->getContext($context, "Inventario")), "Id"))), "html", null, true);
            echo "\"
        ";
        } else {
            // line 7
            echo "            action=\"";
            echo $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Inventario_create");
            echo "\"
        ";
        }
        // line 9
        echo "        method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " role=\"form\">

        ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
                ";
        // line 12
        $this->displayBlock('form_fieldset_NONE', $context, $blocks);
        // line 108
        echo "
        
        ";
        // line 110
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

        ";
        // line 112
        $this->displayBlock('form_buttons', $context, $blocks);
        // line 153
        echo "    </form>
    ";
    }

    // line 12
    public function block_form_fieldset_NONE($context, array $blocks = array())
    {
        // line 13
        echo "    <fieldset class=\"container-fluid form_block form_fieldset_NONE tab-pane\">
        \t\t\t
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_integer field_id\">
                    ";
        // line 17
        $this->displayBlock('form_id', $context, $blocks);
        // line 20
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_text field_codigo\">
                    ";
        // line 24
        $this->displayBlock('form_codigo', $context, $blocks);
        // line 27
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_integer field_color_id\">
                    ";
        // line 31
        $this->displayBlock('form_color_id', $context, $blocks);
        // line 34
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_integer field_cantidad\">
                    ";
        // line 38
        $this->displayBlock('form_cantidad', $context, $blocks);
        // line 41
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_number field_costo\">
                    ";
        // line 45
        $this->displayBlock('form_costo', $context, $blocks);
        // line 48
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_number field_venta\">
                    ";
        // line 52
        $this->displayBlock('form_venta', $context, $blocks);
        // line 55
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_textarea field_descripcion\">
                    ";
        // line 59
        $this->displayBlock('form_descripcion', $context, $blocks);
        // line 62
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_textarea field_imagen\">
                    ";
        // line 66
        $this->displayBlock('form_imagen', $context, $blocks);
        // line 69
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_integer field_sede_id\">
                    ";
        // line 73
        $this->displayBlock('form_sede_id', $context, $blocks);
        // line 76
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_text field_created_by\">
                    ";
        // line 80
        $this->displayBlock('form_created_by', $context, $blocks);
        // line 83
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_text field_updated_by\">
                    ";
        // line 87
        $this->displayBlock('form_updated_by', $context, $blocks);
        // line 90
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_datetime field_created_at\">
                    ";
        // line 94
        $this->displayBlock('form_created_at', $context, $blocks);
        // line 97
        echo "                </div>
                                        </div>
                    <div class=\"row\">
                                            <div class=\"col-md-4 form_field field_datetime field_updated_at\">
                    ";
        // line 101
        $this->displayBlock('form_updated_at', $context, $blocks);
        // line 104
        echo "                </div>
                                        </div>
            </fieldset>
";
    }

    // line 17
    public function block_form_id($context, array $blocks = array())
    {
        // line 18
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "id", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 24
    public function block_form_codigo($context, array $blocks = array())
    {
        // line 25
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "codigo", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 31
    public function block_form_color_id($context, array $blocks = array())
    {
        // line 32
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "color_id", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 38
    public function block_form_cantidad($context, array $blocks = array())
    {
        // line 39
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cantidad", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 45
    public function block_form_costo($context, array $blocks = array())
    {
        // line 46
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "costo", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 52
    public function block_form_venta($context, array $blocks = array())
    {
        // line 53
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "venta", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 59
    public function block_form_descripcion($context, array $blocks = array())
    {
        // line 60
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 66
    public function block_form_imagen($context, array $blocks = array())
    {
        // line 67
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "imagen", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 73
    public function block_form_sede_id($context, array $blocks = array())
    {
        // line 74
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sede_id", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 80
    public function block_form_created_by($context, array $blocks = array())
    {
        // line 81
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "created_by", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 87
    public function block_form_updated_by($context, array $blocks = array())
    {
        // line 88
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "updated_by", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 94
    public function block_form_created_at($context, array $blocks = array())
    {
        // line 95
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "created_at", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 101
    public function block_form_updated_at($context, array $blocks = array())
    {
        // line 102
        echo "                        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "updated_at", array(), "array"), 'row');
        echo "
                    ";
    }

    // line 112
    public function block_form_buttons($context, array $blocks = array())
    {
        // line 113
        echo "        <div id=\"edit-actions\" class=\"form-group\">
            <div class=\"btn-toolbar\" role=\"toolbar\">
                ";
        // line 115
        $this->displayBlock('generic_actions', $context, $blocks);
        // line 149
        echo "
            </div>
        </div>
        ";
    }

    // line 115
    public function block_generic_actions($context, array $blocks = array())
    {
        // line 116
        echo "                        ";
        $this->displayBlock('generic_action_save', $context, $blocks);
        // line 126
        echo "                    ";
        $this->displayBlock('generic_action_list', $context, $blocks);
        // line 136
        echo "        
        ";
        // line 137
        $this->displayBlock('generic_actions_script', $context, $blocks);
        // line 147
        echo "
    ";
    }

    // line 116
    public function block_generic_action_save($context, array $blocks = array())
    {
        // line 117
        echo "            
                
                            
            <button type=\"submit\" name=\"save\" class=\"btn btn-success\"><i class=\"fa fa-check\"></i> ";
        // line 120
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.generic.save", array(), "Admingenerator");
        // line 121
        echo "        </button>
    

                
                        ";
    }

    // line 126
    public function block_generic_action_list($context, array $blocks = array())
    {
        // line 127
        echo "            
                
                            
            <a class=\"btn btn-default\" href=\"";
        // line 130
        echo $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Inventario_list", array());
        echo "\"><i class=\"fa fa-list-alt\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.generic.list", array(), "Admingenerator");
        // line 131
        echo "        </a>
    

                
                        ";
    }

    // line 137
    public function block_generic_actions_script($context, array $blocks = array())
    {
        // line 138
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/admingeneratorgenerator/js/admingenerator/generic-actions.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
        ;(function(window, \$, undefined) {
            \$(\"#generic_actions\").agen\$genericActions({
                actionsSelector: 'a.btn'
            });
        })(this, jQuery);
    </script>
";
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionInventarioBundle/Resources/views/InventarioNew/form.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  413 => 138,  410 => 137,  402 => 131,  398 => 130,  393 => 127,  390 => 126,  382 => 121,  380 => 120,  375 => 117,  372 => 116,  367 => 147,  365 => 137,  362 => 136,  359 => 126,  356 => 116,  353 => 115,  346 => 149,  344 => 115,  340 => 113,  337 => 112,  330 => 102,  327 => 101,  320 => 95,  317 => 94,  310 => 88,  307 => 87,  300 => 81,  297 => 80,  290 => 74,  287 => 73,  280 => 67,  277 => 66,  270 => 60,  267 => 59,  260 => 53,  257 => 52,  250 => 46,  247 => 45,  240 => 39,  237 => 38,  230 => 32,  227 => 31,  220 => 25,  217 => 24,  210 => 18,  207 => 17,  200 => 104,  198 => 101,  192 => 97,  190 => 94,  184 => 90,  182 => 87,  176 => 83,  174 => 80,  168 => 76,  166 => 73,  160 => 69,  158 => 66,  152 => 62,  150 => 59,  144 => 55,  142 => 52,  136 => 48,  134 => 45,  128 => 41,  126 => 38,  120 => 34,  112 => 27,  110 => 24,  104 => 20,  93 => 12,  88 => 153,  86 => 112,  81 => 110,  77 => 108,  75 => 12,  71 => 11,  65 => 9,  59 => 7,  53 => 5,  48 => 3,  42 => 2,  39 => 1,  122 => 25,  118 => 31,  115 => 20,  108 => 15,  105 => 14,  102 => 17,  96 => 13,  94 => 28,  91 => 27,  89 => 25,  84 => 22,  82 => 20,  78 => 18,  73 => 13,  69 => 12,  64 => 11,  61 => 10,  57 => 9,  51 => 4,  44 => 7,  35 => 4,);
    }
}
