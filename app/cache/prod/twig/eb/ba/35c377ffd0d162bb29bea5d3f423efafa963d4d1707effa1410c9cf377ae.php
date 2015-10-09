<?php

/* InvisionSoporteBundle:UsuarioList:row.html.twig */
class __TwigTemplate_ebba35c377ffd0d162bb29bea5d3f423efafa963d4d1707effa1410c9cf377ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/row.html.twig");

        $this->blocks = array(
            'object_action_delete' => array($this, 'block_object_action_delete'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/row.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_object_action_delete($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        ob_start();
        // line 4
        echo "<a  class=\"btn btn-default btn-xs \" href=\"javascript:;\" onClick=\"vel_admin.eliminar('el usuario ', '";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : null), "username"), "html", null, true);
        echo "', '";
        echo $this->env->getExtension('routing')->getPath("eliminar_usuario");
        echo "', '?pk=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Usuario"]) ? $context["Usuario"] : null), "id"), "html", null, true);
        echo "')\"><i class=\"fa fa-times\"></i></a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "InvisionSoporteBundle:UsuarioList:row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,  488 => 172,  481 => 169,  478 => 168,  471 => 162,  461 => 158,  457 => 157,  454 => 156,  450 => 155,  444 => 152,  439 => 150,  436 => 149,  433 => 148,  430 => 147,  416 => 135,  413 => 134,  405 => 128,  401 => 127,  396 => 124,  393 => 123,  388 => 144,  386 => 134,  383 => 133,  380 => 123,  377 => 122,  363 => 101,  360 => 100,  355 => 115,  349 => 112,  346 => 111,  329 => 100,  326 => 99,  309 => 98,  306 => 97,  304 => 96,  301 => 95,  298 => 94,  290 => 90,  285 => 87,  281 => 85,  278 => 84,  273 => 81,  268 => 78,  265 => 77,  263 => 76,  259 => 75,  255 => 74,  251 => 72,  249 => 71,  237 => 69,  231 => 65,  227 => 63,  224 => 62,  219 => 59,  214 => 56,  211 => 55,  209 => 54,  205 => 53,  201 => 52,  197 => 50,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 174,  66 => 171,  58 => 147,  53 => 122,  46 => 117,  44 => 94,  42 => 21,  37 => 18,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 172,  64 => 168,  60 => 166,  55 => 146,  52 => 8,  43 => 7,  34 => 4,);
    }
}
