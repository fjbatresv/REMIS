<?php

/* Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/filters.html.twig */
class __TwigTemplate_c53377f25d01f304801092df1d1841f246c3feb935685df429bb9196e4639a7e extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Usuario_filters");
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array(), "array"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Usuario", array(), "Admin")) ? array() : array("label" => $_label_)));
        echo "
                    ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array(), "array"), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                    ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array(), "array"), 'errors', array("attr" => array("class" => "form-control-feedback")));
        echo "
                    </div>
                </div>
                                        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        </fieldset>
        <div class=\"form-group\">
            <button type=\"submit\" class=\"btn btn-sm btn-primary\"><i class=\"fa fa-search\"></i> ";
        // line 17
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.button.filter", array(), "Admingenerator");
        echo "</button>
            <button type=\"submit\" class=\"btn btn-sm btn-default\" name=\"reset\" value=\"true\"><i class=\"fa fa-refresh\"></i> ";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.button.reset", array(), "Admingenerator");
        echo "</button>
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/filters.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  50 => 10,  40 => 6,  29 => 3,  26 => 2,  20 => 1,  174 => 44,  169 => 42,  162 => 38,  148 => 33,  136 => 29,  131 => 27,  126 => 26,  120 => 23,  117 => 22,  112 => 20,  98 => 14,  79 => 33,  70 => 18,  67 => 8,  61 => 5,  56 => 6,  54 => 11,  51 => 4,  48 => 3,  39 => 8,  36 => 3,  27 => 1,  380 => 128,  373 => 125,  370 => 124,  363 => 118,  353 => 114,  349 => 113,  346 => 112,  342 => 111,  336 => 108,  331 => 106,  328 => 105,  325 => 104,  322 => 103,  308 => 91,  305 => 90,  297 => 84,  293 => 83,  288 => 80,  285 => 79,  280 => 100,  278 => 90,  275 => 89,  272 => 79,  269 => 78,  255 => 57,  252 => 56,  247 => 71,  241 => 68,  238 => 67,  221 => 56,  218 => 55,  201 => 54,  198 => 53,  196 => 52,  193 => 51,  190 => 50,  182 => 46,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 37,  155 => 36,  151 => 34,  147 => 30,  143 => 31,  141 => 27,  129 => 25,  124 => 25,  121 => 21,  116 => 16,  102 => 11,  99 => 10,  97 => 9,  94 => 12,  91 => 11,  88 => 6,  85 => 45,  83 => 4,  77 => 2,  71 => 130,  66 => 17,  58 => 103,  53 => 78,  46 => 9,  44 => 50,  42 => 48,  37 => 18,  35 => 4,  33 => 2,  30 => 2,  113 => 25,  111 => 14,  108 => 13,  105 => 16,  100 => 15,  93 => 13,  90 => 12,  87 => 11,  82 => 44,  80 => 3,  76 => 22,  74 => 11,  72 => 17,  69 => 128,  64 => 124,  60 => 14,  55 => 102,  52 => 8,  43 => 7,  34 => 4,);
    }
}
