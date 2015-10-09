<?php

/* Admingenerated/InvisionSoporteBundle/Resources/views/TipoSedeList/filters.html.twig */
class __TwigTemplate_3cbbfaedeff11fa08fe576746812bd40573aa7837b07699b1fbd09a6554a031d extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_TipoSede_filters");
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Descripcion", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                        ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        </fieldset>
        <div class=\"form-group\">
            <button type=\"submit\" class=\"btn btn-sm btn-primary\"><i class=\"fa fa-search\"></i> ";
        // line 31
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.button.filter", array(), "Admingenerator");
        echo "</button>
            <button type=\"submit\" class=\"btn btn-sm btn-default\" name=\"reset\" value=\"true\"><i class=\"fa fa-refresh\"></i> ";
        // line 32
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.button.reset", array(), "Admingenerator");
        echo "</button>
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/TipoSedeList/filters.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  98 => 31,  78 => 23,  70 => 18,  62 => 16,  54 => 11,  50 => 10,  29 => 3,  26 => 2,  20 => 1,  158 => 35,  153 => 33,  148 => 32,  146 => 31,  142 => 29,  139 => 28,  134 => 26,  127 => 22,  122 => 21,  120 => 20,  107 => 40,  104 => 39,  101 => 28,  95 => 15,  92 => 28,  86 => 25,  67 => 11,  63 => 9,  61 => 8,  57 => 6,  49 => 3,  40 => 6,  31 => 2,  28 => 1,  488 => 172,  481 => 169,  478 => 168,  471 => 162,  461 => 158,  457 => 157,  454 => 156,  450 => 155,  444 => 152,  439 => 150,  436 => 149,  433 => 148,  430 => 147,  416 => 135,  413 => 134,  405 => 128,  401 => 127,  396 => 124,  393 => 123,  388 => 144,  386 => 134,  383 => 133,  380 => 123,  377 => 122,  363 => 101,  360 => 100,  355 => 115,  349 => 112,  346 => 111,  329 => 100,  326 => 99,  309 => 98,  306 => 97,  304 => 96,  301 => 95,  298 => 94,  290 => 90,  285 => 87,  281 => 85,  278 => 84,  273 => 81,  268 => 78,  265 => 77,  263 => 76,  259 => 75,  255 => 74,  251 => 72,  249 => 71,  237 => 69,  231 => 65,  227 => 63,  224 => 62,  219 => 59,  214 => 56,  211 => 55,  209 => 54,  205 => 53,  201 => 52,  197 => 50,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 39,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 18,  102 => 32,  99 => 17,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 174,  66 => 17,  58 => 147,  53 => 122,  46 => 9,  44 => 94,  42 => 21,  37 => 3,  35 => 4,  33 => 2,  30 => 1,  113 => 17,  111 => 14,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 8,  76 => 20,  74 => 5,  72 => 17,  69 => 12,  64 => 168,  60 => 166,  55 => 5,  52 => 4,  43 => 43,  34 => 4,);
    }
}
