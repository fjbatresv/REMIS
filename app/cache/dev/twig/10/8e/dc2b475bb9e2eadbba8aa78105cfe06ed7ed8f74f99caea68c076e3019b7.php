<?php

/* Admingenerated/InvisionInventarioBundle/Resources/views/InventarioList/filters.html.twig */
class __TwigTemplate_108edc2b475bb9e2eadbba8aa78105cfe06ed7ed8f74f99caea68c076e3019b7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'list_filters' => array($this, 'block_list_filters'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('list_filters', $context, $blocks);
    }

    public function block_list_filters($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"filters-list\">
    <form action=\"";
        // line 3
        echo $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Inventario_filters");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " role=\"form\">
        <legend>";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.filters", array(), "Admingenerator");
        echo "</legend>
        <fieldset class=\"form-group form_block form_fieldset_NONE\">
            ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "id", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Id", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "id", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "id", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "codigo", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Codigo", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "codigo", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "codigo", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "color_id", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Color id", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "color_id", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "color_id", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cantidad", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Cantidad", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cantidad", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cantidad", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "costo", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Costo", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "costo", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "costo", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "venta", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Venta", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "venta", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "venta", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Descripcion", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "imagen", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Imagen", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "imagen", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "imagen", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sede_id", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Sede id", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sede_id", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sede_id", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 72
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "created_by", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Created by", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "created_by", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "created_by", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 79
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "updated_by", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Updated by", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 80
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "updated_by", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 81
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "updated_by", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "created_at", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Created at", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "created_at", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 88
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "created_at", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 93
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "updated_at", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Updated at", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 94
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "updated_at", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 95
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "updated_at", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                        ";
        // line 98
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        </fieldset>
        <div class=\"form-group\">
            <button type=\"submit\" class=\"btn btn-sm btn-primary\"><i class=\"fa fa-search\"></i> ";
        // line 101
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.button.filter", array(), "Admingenerator");
        echo "</button>
            <button type=\"submit\" class=\"btn btn-sm btn-default\" name=\"reset\" value=\"true\"><i class=\"fa fa-refresh\"></i> ";
        // line 102
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.button.reset", array(), "Admingenerator");
        echo "</button>
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionInventarioBundle/Resources/views/InventarioList/filters.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  262 => 102,  258 => 101,  252 => 98,  242 => 94,  226 => 87,  222 => 86,  210 => 80,  206 => 79,  198 => 74,  194 => 73,  190 => 72,  182 => 67,  178 => 66,  174 => 65,  166 => 60,  162 => 59,  150 => 53,  130 => 45,  126 => 44,  118 => 39,  114 => 38,  110 => 37,  98 => 31,  78 => 23,  70 => 18,  62 => 16,  54 => 11,  50 => 10,  29 => 3,  26 => 2,  20 => 1,  158 => 58,  153 => 33,  148 => 32,  146 => 52,  142 => 51,  139 => 28,  134 => 46,  127 => 22,  122 => 21,  120 => 20,  107 => 40,  104 => 39,  101 => 28,  95 => 15,  92 => 14,  86 => 25,  67 => 11,  63 => 9,  61 => 8,  57 => 6,  49 => 3,  40 => 6,  31 => 2,  28 => 1,  453 => 156,  446 => 153,  443 => 152,  436 => 146,  426 => 142,  422 => 141,  419 => 140,  415 => 139,  409 => 136,  404 => 134,  401 => 133,  398 => 132,  395 => 131,  381 => 119,  378 => 118,  370 => 112,  366 => 111,  361 => 108,  358 => 107,  353 => 128,  351 => 118,  348 => 117,  345 => 107,  342 => 106,  328 => 85,  325 => 84,  320 => 99,  314 => 96,  311 => 95,  294 => 84,  291 => 83,  274 => 82,  271 => 81,  269 => 80,  266 => 79,  263 => 78,  255 => 74,  250 => 71,  246 => 95,  243 => 68,  238 => 93,  233 => 62,  230 => 88,  228 => 60,  224 => 59,  220 => 58,  216 => 56,  214 => 81,  202 => 53,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 39,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 18,  102 => 32,  99 => 17,  97 => 9,  94 => 30,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 158,  66 => 17,  58 => 131,  53 => 106,  46 => 9,  44 => 78,  42 => 21,  37 => 3,  35 => 4,  33 => 2,  30 => 1,  113 => 17,  111 => 14,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 8,  76 => 20,  74 => 5,  72 => 17,  69 => 12,  64 => 152,  60 => 150,  55 => 5,  52 => 4,  43 => 43,  34 => 4,);
    }
}
