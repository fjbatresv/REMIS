<?php

/* Admingenerated/InvisionSoporteBundle/Resources/views/SedeList/filters.html.twig */
class __TwigTemplate_2ab4e518c27d36fe13587be7559b78356498714eb8e9111272e95d81b21d5a92 extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Sede_filters");
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Nombre", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Direccion", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Telefono", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                                            <div class=\"row form-group\">
                    <div class=\"col-xs-8\">
                    ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipo_sede_id", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Tipo sede id", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipo_sede_id", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipo_sede_id", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                        ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        </fieldset>
        <div class=\"form-group\">
            <button type=\"submit\" class=\"btn btn-sm btn-primary\"><i class=\"fa fa-search\"></i> ";
        // line 45
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.button.filter", array(), "Admingenerator");
        echo "</button>
            <button type=\"submit\" class=\"btn btn-sm btn-default\" name=\"reset\" value=\"true\"><i class=\"fa fa-refresh\"></i> ";
        // line 46
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.button.reset", array(), "Admingenerator");
        echo "</button>
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/SedeList/filters.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  134 => 46,  130 => 45,  118 => 39,  110 => 37,  98 => 31,  78 => 23,  70 => 18,  50 => 10,  40 => 6,  29 => 3,  26 => 2,  20 => 1,  152 => 34,  145 => 32,  140 => 30,  135 => 29,  133 => 28,  126 => 25,  114 => 38,  109 => 18,  107 => 17,  103 => 15,  86 => 25,  79 => 11,  73 => 8,  67 => 5,  62 => 16,  56 => 6,  54 => 11,  51 => 4,  48 => 3,  39 => 11,  36 => 3,  27 => 1,  399 => 134,  392 => 131,  389 => 130,  382 => 124,  372 => 120,  368 => 119,  365 => 118,  361 => 117,  355 => 114,  350 => 112,  347 => 111,  344 => 110,  341 => 109,  327 => 97,  324 => 96,  316 => 90,  312 => 89,  307 => 86,  304 => 85,  299 => 106,  297 => 96,  294 => 95,  291 => 85,  288 => 84,  274 => 63,  271 => 62,  266 => 77,  260 => 74,  257 => 73,  240 => 62,  237 => 61,  220 => 60,  217 => 59,  215 => 58,  212 => 57,  209 => 56,  201 => 52,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 36,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 26,  124 => 42,  121 => 23,  116 => 16,  102 => 32,  99 => 10,  97 => 9,  94 => 30,  91 => 36,  88 => 25,  85 => 5,  83 => 4,  77 => 2,  71 => 136,  66 => 17,  58 => 109,  53 => 84,  46 => 9,  44 => 56,  42 => 40,  37 => 18,  35 => 4,  33 => 2,  30 => 2,  113 => 25,  111 => 14,  108 => 13,  105 => 12,  100 => 14,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 134,  64 => 130,  60 => 8,  55 => 108,  52 => 8,  43 => 7,  34 => 4,);
    }
}
