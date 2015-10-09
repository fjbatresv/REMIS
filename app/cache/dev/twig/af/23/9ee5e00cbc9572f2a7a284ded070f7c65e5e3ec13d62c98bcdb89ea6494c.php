<?php

/* Admingenerated/InvisionInventarioBundle/Resources/views/InventarioList/results.html.twig */
class __TwigTemplate_af239ee5e00cbc9572f2a7a284ded070f7c65e5e3ec13d62c98bcdb89ea6494c extends Twig_Template
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
            'generic_action_new' => array($this, 'block_generic_action_new'),
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

        <table id=\"table-list-Inventario\" class=\"table table-striped table-hover table-condensed object-actions-Inventario\">
            ";
        // line 21
        $this->displayBlock('list_thead', $context, $blocks);
        // line 78
        $this->displayBlock('list_tbody', $context, $blocks);
        // line 101
        echo "
        </table>

        <div class=\"form-group list-actions col-md-12\">
                    <div id=\"generic_actions\" class=\"pull-left btn-toolbar\" role=\"toolbar\">
                ";
        // line 106
        $this->displayBlock('generic_actions', $context, $blocks);
        // line 130
        echo "</div>
        <div class=\"pull-right btn-toolbar\" role=\"toolbar\">";
        // line 131
        $this->displayBlock('list_paginator_perpage', $context, $blocks);
        // line 150
        echo "</div>

            <div class=\"pull-right btn-toolbar\" role=\"toolbar\">    ";
        // line 152
        $this->displayBlock('list_paginator_pages', $context, $blocks);
        // line 155
        echo "</div>
        </div>";
        // line 156
        $this->displayBlock('endform_batch_actions', $context, $blocks);
        // line 158
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
        $context["count"] = $this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "nbResults");
        // line 5
        echo "    ";
        $context["start"] = ((($this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "currentPage") - 1) * $this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "maxPerPage")) + 1);
        // line 6
        echo "    ";
        $context["end"] = (((isset($context["start"]) ? $context["start"] : $this->getContext($context, "start")) + $this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "maxPerPage")) - 1);
        // line 7
        echo "    ";
        $context["end"] = ((((isset($context["end"]) ? $context["end"] : $this->getContext($context, "end")) > (isset($context["count"]) ? $context["count"] : $this->getContext($context, "count")))) ? ((isset($context["count"]) ? $context["count"] : $this->getContext($context, "count"))) : ((isset($context["end"]) ? $context["end"] : $this->getContext($context, "end"))));
        // line 8
        echo "
    ";
        // line 9
        if ($this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "haveToPaginate")) {
            // line 10
            echo "    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("list.display.range", array("%start%" => (isset($context["start"]) ? $context["start"] : $this->getContext($context, "start")), "%end%" => (isset($context["end"]) ? $context["end"] : $this->getContext($context, "end")), "%count%" => (isset($context["count"]) ? $context["count"] : $this->getContext($context, "count"))), "Admingenerator");
            // line 11
            echo "    ";
        } elseif (((isset($context["count"]) ? $context["count"] : $this->getContext($context, "count")) > 0)) {
            // line 12
            echo "    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("list.display.all", array("%count%" => (isset($context["count"]) ? $context["count"] : $this->getContext($context, "count"))), "Admingenerator");
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
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Codigo") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Codigo") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "DESC"))) {
                echo " sort_desc";
            }
        }
        echo "\">
            <span class=\"sort-addon\">
            ";
        // line 27
        if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Codigo") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
            // line 28
            echo "                    <a href=\"?sort=Codigo&order_by=desc\">
                ";
        } else {
            // line 30
            echo "                    <a href=\"?sort=Codigo&order_by=asc\">
                ";
        }
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Codigo", array(), "Admin"), "html", null, true);
        echo "</a>
                ";
        // line 32
        if (((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Codigo")) {
            // line 33
            echo "                    ";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Codigo") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
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
        if (0) {
            echo " sortable";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "ColorNombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "ColorNombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "DESC"))) {
                echo " sort_desc";
            }
        }
        echo "\">
            <span class=\"sort-addon\">
            ";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Color", array(), "Admin"), "html", null, true);
        echo "</span>
        </th>

            
        <th class=\"list_thead_column";
        // line 53
        if (1) {
            echo " sortable";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Cantidad") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Cantidad") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "DESC"))) {
                echo " sort_desc";
            }
        }
        echo "\">
            <span class=\"sort-addon\">
            ";
        // line 55
        if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Cantidad") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
            // line 56
            echo "                    <a href=\"?sort=Cantidad&order_by=desc\">
                ";
        } else {
            // line 58
            echo "                    <a href=\"?sort=Cantidad&order_by=asc\">
                ";
        }
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cantidad", array(), "Admin"), "html", null, true);
        echo "</a>
                ";
        // line 60
        if (((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Cantidad")) {
            // line 61
            echo "                    ";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Cantidad") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                // line 62
                echo "                                                    <i class=\"fa fa-sort-numeric-asc active\"></i>
                            <i class=\"fa fa-sort-numeric-desc hover\"></i>
                                            ";
            } else {
                // line 65
                echo "                                                    <i class=\"fa fa-sort-numeric-asc hover\"></i>
                            <i class=\"fa fa-sort-numeric-desc active\"></i>
                                            ";
            }
            // line 68
            echo "                ";
        } else {
            // line 69
            echo "                                            <i class=\"fa fa-sort-numeric-asc placeholder hover\"></i>
                                    ";
        }
        // line 71
        echo "            </span>
        </th>

            <th class=\"actions\">";
        // line 74
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.header.actions", array(), "Admingenerator");
        echo "</th>
    </tr>
</thead>
";
    }

    // line 78
    public function block_list_tbody($context, array $blocks = array())
    {
        // line 79
        echo "    <tbody>
        ";
        // line 80
        if ((twig_length_filter($this->env, (isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios"))) > 0)) {
            // line 81
            echo "
        ";
            // line 82
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["Inventario"]) {
                // line 83
                echo "            ";
                $this->env->loadTemplate("InvisionInventarioBundle:InventarioList:row.html.twig")->display(array_merge($context, array()));
                // line 84
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Inventario'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "    ";
            $this->displayBlock('object_actions_script', $context, $blocks);
        } else {
            // line 95
            echo "        <tr class=\"list_trow no_results_row\">
                    <td colspan=\"4\">";
            // line 96
            echo $this->env->getExtension('translator')->getTranslator()->trans("list.no.results", array(), "Admingenerator");
            echo "</td>
                </tr>
        ";
        }
        // line 99
        echo "    </tbody>
";
    }

    // line 84
    public function block_object_actions_script($context, array $blocks = array())
    {
        // line 85
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/admingeneratorgenerator/js/admingenerator/object-actions.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
        ;(function(window, \$, undefined){
        \t\$(\".object-actions-Inventario\").agen\$objectActions({
            \tactionsSelector: '.object_actions a'
            });
        })(this, jQuery);
    </script>
        ";
    }

    // line 106
    public function block_generic_actions($context, array $blocks = array())
    {
        // line 107
        echo "                        ";
        $this->displayBlock('generic_action_new', $context, $blocks);
        // line 117
        echo "        
        ";
        // line 118
        $this->displayBlock('generic_actions_script', $context, $blocks);
        // line 128
        echo "
    ";
    }

    // line 107
    public function block_generic_action_new($context, array $blocks = array())
    {
        // line 108
        echo "            
                
                            
            <a class=\"btn btn-primary\" href=\"";
        // line 111
        echo $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Inventario_new", array());
        echo "\"><i class=\"fa fa-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("action.generic.new", array(), "Admingenerator");
        // line 112
        echo "        </a>
    

                
                        ";
    }

    // line 118
    public function block_generic_actions_script($context, array $blocks = array())
    {
        // line 119
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

    // line 131
    public function block_list_paginator_perpage($context, array $blocks = array())
    {
        // line 132
        echo "    ";
        if (($this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "haveToPaginate") || (!($this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "maxPerPage") === 10)))) {
            // line 133
            echo "    <div class=\"btn-group input-group\">
        <div class=\"btn btn-sm btn-default btn-reset\">";
            // line 134
            echo $this->env->getExtension('translator')->getTranslator()->trans("pagerfanta.view.perpage", array(), "Admingenerator");
            echo "</div>
        <button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
            ";
            // line 136
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pagerfanta.num.elements", array("%number%" => $this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "maxPerPage")), "Admingenerator"), "html", null, true);
            echo " <span class=\"caret\"></span>
        </button>
        <ul class=\"dropdown-menu pull-right\" role=\"menu\">
            ";
            // line 139
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(array(0 => 10, 1 => 25, 2 => 50, 3 => 75, 4 => 100));
            foreach ($context['_seq'] as $context["_key"] => $context["perPage"]) {
                // line 140
                echo "            <li>
                <a href=\"";
                // line 141
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_InventarioBundle_Inventario_list", array("perPage" => (isset($context["perPage"]) ? $context["perPage"] : $this->getContext($context, "perPage")))), "html", null, true);
                echo "\">
                    ";
                // line 142
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pagerfanta.num.elements", array("%number%" => (isset($context["perPage"]) ? $context["perPage"] : $this->getContext($context, "perPage"))), "Admingenerator"), "html", null, true);
                echo "
                </a>
            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['perPage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 146
            echo "        </ul>
    </div>
    ";
        }
    }

    // line 152
    public function block_list_paginator_pages($context, array $blocks = array())
    {
        // line 153
        echo "        ";
        echo $this->env->getExtension('pagerfanta')->renderPagerfanta((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "admingenerator");
        echo "
    ";
    }

    // line 156
    public function block_endform_batch_actions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionInventarioBundle/Resources/views/InventarioList/results.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  453 => 156,  446 => 153,  443 => 152,  436 => 146,  426 => 142,  422 => 141,  419 => 140,  415 => 139,  409 => 136,  404 => 134,  401 => 133,  398 => 132,  395 => 131,  381 => 119,  378 => 118,  370 => 112,  366 => 111,  361 => 108,  358 => 107,  353 => 128,  351 => 118,  348 => 117,  345 => 107,  342 => 106,  328 => 85,  325 => 84,  320 => 99,  314 => 96,  311 => 95,  294 => 84,  291 => 83,  274 => 82,  271 => 81,  269 => 80,  266 => 79,  263 => 78,  255 => 74,  250 => 71,  246 => 69,  243 => 68,  238 => 65,  233 => 62,  230 => 61,  228 => 60,  224 => 59,  220 => 58,  216 => 56,  214 => 55,  202 => 53,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 158,  66 => 155,  58 => 131,  53 => 106,  46 => 101,  44 => 78,  42 => 21,  37 => 18,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 156,  64 => 152,  60 => 150,  55 => 130,  52 => 8,  43 => 7,  34 => 4,);
    }
}
