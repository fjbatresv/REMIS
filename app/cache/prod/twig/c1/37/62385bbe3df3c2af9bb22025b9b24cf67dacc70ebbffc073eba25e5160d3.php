<?php

/* Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/results.html.twig */
class __TwigTemplate_c13762385bbe3df3c2af9bb22025b9b24cf67dacc70ebbffc073eba25e5160d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'list_nbresults' => array($this, 'block_list_nbresults'),
            'form_batch_actions' => array($this, 'block_form_batch_actions'),
            'list_thead' => array($this, 'block_list_thead'),
            'list_tbody' => array($this, 'block_list_tbody'),
            'object_actions_script' => array($this, 'block_object_actions_script'),
            'generic_actions' => array($this, 'block_generic_actions'),
            'generic_action_nuevo' => array($this, 'block_generic_action_nuevo'),
            'generic_actions_script' => array($this, 'block_generic_actions_script'),
            'list_paginator_perpage' => array($this, 'block_list_paginator_perpage'),
            'list_paginator_pages' => array($this, 'block_list_paginator_pages'),
            'endform_batch_actions' => array($this, 'block_endform_batch_actions'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<div class=\"results-list\">";
        // line 2
        $this->displayBlock('list_nbresults', $context, $blocks);
        // line 16
        $this->displayBlock('form_batch_actions', $context, $blocks);
        // line 18
        echo "

        <table id=\"table-list-Usuario\" class=\"table table-striped table-hover table-condensed object-actions-Usuario\">
            ";
        // line 21
        $this->displayBlock('list_thead', $context, $blocks);
        // line 94
        $this->displayBlock('list_tbody', $context, $blocks);
        // line 117
        echo "
        </table>

        <div class=\"form-group list-actions col-md-12\">
                    <div id=\"generic_actions\" class=\"pull-left btn-toolbar\" role=\"toolbar\">
                ";
        // line 122
        $this->displayBlock('generic_actions', $context, $blocks);
        // line 146
        echo "</div>
        <div class=\"pull-right btn-toolbar\" role=\"toolbar\">";
        // line 147
        $this->displayBlock('list_paginator_perpage', $context, $blocks);
        // line 166
        echo "</div>

            <div class=\"pull-right btn-toolbar\" role=\"toolbar\">    ";
        // line 168
        $this->displayBlock('list_paginator_pages', $context, $blocks);
        // line 171
        echo "</div>
        </div>";
        // line 172
        $this->displayBlock('endform_batch_actions', $context, $blocks);
        // line 174
        echo "
</div>
";
    }

    // line 2
    public function block_list_nbresults($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"list_nbresults\">
    ";
        // line 4
        $context["count"] = $this->getAttribute((isset($context["Usuarios"]) ? $context["Usuarios"] : null), "nbResults");
        // line 5
        echo "    ";
        $context["start"] = ((($this->getAttribute((isset($context["Usuarios"]) ? $context["Usuarios"] : null), "currentPage") - 1) * $this->getAttribute((isset($context["Usuarios"]) ? $context["Usuarios"] : null), "maxPerPage")) + 1);
        // line 6
        echo "    ";
        $context["end"] = (((isset($context["start"]) ? $context["start"] : null) + $this->getAttribute((isset($context["Usuarios"]) ? $context["Usuarios"] : null), "maxPerPage")) - 1);
        // line 7
        echo "    ";
        $context["end"] = ((((isset($context["end"]) ? $context["end"] : null) > (isset($context["count"]) ? $context["count"] : null))) ? ((isset($context["count"]) ? $context["count"] : null)) : ((isset($context["end"]) ? $context["end"] : null)));
        // line 8
        echo "
    ";
        // line 9
        if ($this->getAttribute((isset($context["Usuarios"]) ? $context["Usuarios"] : null), "haveToPaginate")) {
            // line 10
            echo "    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("list.display.range", array("%start%" => (isset($context["start"]) ? $context["start"] : null), "%end%" => (isset($context["end"]) ? $context["end"] : null), "%count%" => (isset($context["count"]) ? $context["count"] : null)), "Admingenerator");
            // line 11
            echo "    ";
        } elseif (((isset($context["count"]) ? $context["count"] : null) > 0)) {
            // line 12
            echo "    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("list.display.all", array("%count%" => (isset($context["count"]) ? $context["count"] : null)), "Admingenerator");
            // line 13
            echo "    ";
        }
        // line 14
        echo "</div>
";
    }

    // line 16
    public function block_form_batch_actions($context, array $blocks = array())
    {
    }

    // line 21
    public function block_list_thead($context, array $blocks = array())
    {
        // line 22
        echo "<thead>
    <tr class=\"list_thead\">
            
        <th class=\"list_thead_column";
        // line 25
        if (1) {
            echo " sortable";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "Nombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "Nombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "DESC"))) {
                echo " sort_desc";
            }
        }
        echo "\">
            <span class=\"sort-addon\">
            ";
        // line 27
        if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "Nombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "ASC"))) {
            // line 28
            echo "                    <a href=\"?sort=Nombre&order_by=desc\">
                ";
        } else {
            // line 30
            echo "                    <a href=\"?sort=Nombre&order_by=asc\">
                ";
        }
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nombre", array(), "Admin"), "html", null, true);
        echo "</a>
                ";
        // line 32
        if (((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "Nombre")) {
            // line 33
            echo "                    ";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "Nombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "ASC"))) {
                // line 34
                echo "                                                    <i class=\"fa fa-sort-alpha-asc active\"></i>
                            <i class=\"fa fa-sort-alpha-desc hover\"></i>
                                            ";
            } else {
                // line 37
                echo "                                                    <i class=\"fa fa-sort-alpha-asc hover\"></i>
                            <i class=\"fa fa-sort-alpha-desc active\"></i>
                                            ";
            }
            // line 40
            echo "                ";
        } else {
            // line 41
            echo "                                            <i class=\"fa fa-sort-alpha-asc placeholder hover\"></i>
                                    ";
        }
        // line 43
        echo "            </span>
        </th>

            
        <th class=\"list_thead_column";
        // line 47
        if (1) {
            echo " sortable";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "Username") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "Username") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "DESC"))) {
                echo " sort_desc";
            }
        }
        echo "\">
            <span class=\"sort-addon\">
            ";
        // line 49
        if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "Username") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "ASC"))) {
            // line 50
            echo "                    <a href=\"?sort=Username&order_by=desc\">
                ";
        } else {
            // line 52
            echo "                    <a href=\"?sort=Username&order_by=asc\">
                ";
        }
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Username", array(), "Admin"), "html", null, true);
        echo "</a>
                ";
        // line 54
        if (((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "Username")) {
            // line 55
            echo "                    ";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "Username") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "ASC"))) {
                // line 56
                echo "                                                    <i class=\"fa fa-sort-alpha-asc active\"></i>
                            <i class=\"fa fa-sort-alpha-desc hover\"></i>
                                            ";
            } else {
                // line 59
                echo "                                                    <i class=\"fa fa-sort-alpha-asc hover\"></i>
                            <i class=\"fa fa-sort-alpha-desc active\"></i>
                                            ";
            }
            // line 62
            echo "                ";
        } else {
            // line 63
            echo "                                            <i class=\"fa fa-sort-alpha-asc placeholder hover\"></i>
                                    ";
        }
        // line 65
        echo "            </span>
        </th>

            
        <th class=\"list_thead_column";
        // line 69
        if (1) {
            echo " sortable";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "FechaNacimiento") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "FechaNacimiento") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "DESC"))) {
                echo " sort_desc";
            }
        }
        echo "\">
            <span class=\"sort-addon\">
            ";
        // line 71
        if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "FechaNacimiento") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "ASC"))) {
            // line 72
            echo "                    <a href=\"?sort=FechaNacimiento&order_by=desc\">
                ";
        } else {
            // line 74
            echo "                    <a href=\"?sort=FechaNacimiento&order_by=asc\">
                ";
        }
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Fecha nacimiento", array(), "Admin"), "html", null, true);
        echo "</a>
                ";
        // line 76
        if (((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "FechaNacimiento")) {
            // line 77
            echo "                    ";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : null) == "FechaNacimiento") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "ASC"))) {
                // line 78
                echo "                                                    <i class=\"fa fa-sort-amount-asc active\"></i>
                            <i class=\"fa fa-sort-amount-desc hover\"></i>
                                            ";
            } else {
                // line 81
                echo "                                                    <i class=\"fa fa-sort-amount-asc hover\"></i>
                            <i class=\"fa fa-sort-amount-desc active\"></i>
                                            ";
            }
            // line 84
            echo "                ";
        } else {
            // line 85
            echo "                                            <i class=\"fa fa-sort-amount-asc placeholder hover\"></i>
                                    ";
        }
        // line 87
        echo "            </span>
        </th>

            <th class=\"actions\">";
        // line 90
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.header.actions", array(), "Admingenerator");
        echo "</th>
    </tr>
</thead>
";
    }

    // line 94
    public function block_list_tbody($context, array $blocks = array())
    {
        // line 95
        echo "    <tbody>
        ";
        // line 96
        if ((twig_length_filter($this->env, (isset($context["Usuarios"]) ? $context["Usuarios"] : null)) > 0)) {
            // line 97
            echo "
        ";
            // line 98
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Usuarios"]) ? $context["Usuarios"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["Usuario"]) {
                // line 99
                echo "            ";
                $this->env->loadTemplate("InvisionSoporteBundle:UsuarioList:row.html.twig")->display(array_merge($context, array()));
                // line 100
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Usuario'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "    ";
            $this->displayBlock('object_actions_script', $context, $blocks);
        } else {
            // line 111
            echo "        <tr class=\"list_trow no_results_row\">
                    <td colspan=\"4\">";
            // line 112
            echo $this->env->getExtension('translator')->getTranslator()->trans("list.no.results", array(), "Admingenerator");
            echo "</td>
                </tr>
        ";
        }
        // line 115
        echo "    </tbody>
";
    }

    // line 100
    public function block_object_actions_script($context, array $blocks = array())
    {
        // line 101
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/admingeneratorgenerator/js/admingenerator/object-actions.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
        ;(function(window, \$, undefined){
        \t\$(\".object-actions-Usuario\").agen\$objectActions({
            \tactionsSelector: '.object_actions a'
            });
        })(this, jQuery);
    </script>
        ";
    }

    // line 122
    public function block_generic_actions($context, array $blocks = array())
    {
        // line 123
        echo "                        ";
        $this->displayBlock('generic_action_nuevo', $context, $blocks);
        // line 133
        echo "        
        ";
        // line 134
        $this->displayBlock('generic_actions_script', $context, $blocks);
        // line 144
        echo "
    ";
    }

    // line 123
    public function block_generic_action_nuevo($context, array $blocks = array())
    {
        // line 124
        echo "            
                
                            
            <a class=\"btn btn-primary\" href=\"";
        // line 127
        echo $this->env->getExtension('routing')->getPath("nuevo_usuario", array());
        echo "\"><i class=\"fa fa fa-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Nuevo", array(), "Admin");
        // line 128
        echo "        </a>
    

                
                        ";
    }

    // line 134
    public function block_generic_actions_script($context, array $blocks = array())
    {
        // line 135
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

    // line 147
    public function block_list_paginator_perpage($context, array $blocks = array())
    {
        // line 148
        echo "    ";
        if (($this->getAttribute((isset($context["Usuarios"]) ? $context["Usuarios"] : null), "haveToPaginate") || (!($this->getAttribute((isset($context["Usuarios"]) ? $context["Usuarios"] : null), "maxPerPage") === 10)))) {
            // line 149
            echo "    <div class=\"btn-group input-group\">
        <div class=\"btn btn-sm btn-default btn-reset\">";
            // line 150
            echo $this->env->getExtension('translator')->getTranslator()->trans("pagerfanta.view.perpage", array(), "Admingenerator");
            echo "</div>
        <button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
            ";
            // line 152
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pagerfanta.num.elements", array("%number%" => $this->getAttribute((isset($context["Usuarios"]) ? $context["Usuarios"] : null), "maxPerPage")), "Admingenerator"), "html", null, true);
            echo " <span class=\"caret\"></span>
        </button>
        <ul class=\"dropdown-menu pull-right\" role=\"menu\">
            ";
            // line 155
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(array(0 => 10, 1 => 25, 2 => 50, 3 => 75, 4 => 100));
            foreach ($context['_seq'] as $context["_key"] => $context["perPage"]) {
                // line 156
                echo "            <li>
                <a href=\"";
                // line 157
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Usuario_list", array("perPage" => (isset($context["perPage"]) ? $context["perPage"] : null))), "html", null, true);
                echo "\">
                    ";
                // line 158
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pagerfanta.num.elements", array("%number%" => (isset($context["perPage"]) ? $context["perPage"] : null)), "Admingenerator"), "html", null, true);
                echo "
                </a>
            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['perPage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 162
            echo "        </ul>
    </div>
    ";
        }
    }

    // line 168
    public function block_list_paginator_pages($context, array $blocks = array())
    {
        // line 169
        echo "        ";
        echo $this->env->getExtension('pagerfanta')->renderPagerfanta((isset($context["Usuarios"]) ? $context["Usuarios"] : null), "admingenerator");
        echo "
    ";
    }

    // line 172
    public function block_endform_batch_actions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/UsuarioList/results.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  488 => 172,  481 => 169,  478 => 168,  471 => 162,  461 => 158,  457 => 157,  454 => 156,  450 => 155,  444 => 152,  439 => 150,  436 => 149,  433 => 148,  430 => 147,  416 => 135,  413 => 134,  405 => 128,  401 => 127,  396 => 124,  393 => 123,  388 => 144,  386 => 134,  383 => 133,  380 => 123,  377 => 122,  363 => 101,  360 => 100,  355 => 115,  349 => 112,  346 => 111,  329 => 100,  326 => 99,  309 => 98,  306 => 97,  304 => 96,  301 => 95,  298 => 94,  290 => 90,  285 => 87,  281 => 85,  278 => 84,  273 => 81,  268 => 78,  265 => 77,  263 => 76,  259 => 75,  255 => 74,  251 => 72,  249 => 71,  237 => 69,  231 => 65,  227 => 63,  224 => 62,  219 => 59,  214 => 56,  211 => 55,  209 => 54,  205 => 53,  201 => 52,  197 => 50,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 174,  66 => 171,  58 => 147,  53 => 122,  46 => 117,  44 => 94,  42 => 21,  37 => 18,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 172,  64 => 168,  60 => 166,  55 => 146,  52 => 8,  43 => 7,  34 => 4,);
    }
}
