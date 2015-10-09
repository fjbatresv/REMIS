<?php

/* Admingenerated/InvisionVentaBundle/Resources/views/InventarioList/results.html.twig */
class __TwigTemplate_c1f6a1acad9a2662f27502420d58044f85c2588d5e4ded93e371253b352dd8b6 extends Twig_Template
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

        <table id=\"table-list-Inventario\" class=\"table table-striped table-hover table-condensed object-actions-Inventario\">
            ";
        // line 21
        $this->displayBlock('list_thead', $context, $blocks);
        // line 122
        $this->displayBlock('list_tbody', $context, $blocks);
        // line 145
        echo "
        </table>

        <div class=\"form-group list-actions col-md-12\">
                    <div id=\"generic_actions\" class=\"pull-left btn-toolbar\" role=\"toolbar\">
                ";
        // line 150
        $this->displayBlock('generic_actions', $context, $blocks);
        // line 174
        echo "</div>
        <div class=\"pull-right btn-toolbar\" role=\"toolbar\">";
        // line 175
        $this->displayBlock('list_paginator_perpage', $context, $blocks);
        // line 194
        echo "</div>

            <div class=\"pull-right btn-toolbar\" role=\"toolbar\">    ";
        // line 196
        $this->displayBlock('list_paginator_pages', $context, $blocks);
        // line 199
        echo "</div>
        </div>";
        // line 200
        $this->displayBlock('endform_batch_actions', $context, $blocks);
        // line 202
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
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "color.nombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "color.nombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "DESC"))) {
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

            
        <th class=\"list_thead_column";
        // line 75
        if (1) {
            echo " sortable";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Costo") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Costo") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "DESC"))) {
                echo " sort_desc";
            }
        }
        echo "\">
            <span class=\"sort-addon\">
            ";
        // line 77
        if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Costo") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
            // line 78
            echo "                    <a href=\"?sort=Costo&order_by=desc\">
                ";
        } else {
            // line 80
            echo "                    <a href=\"?sort=Costo&order_by=asc\">
                ";
        }
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Costo", array(), "Admin"), "html", null, true);
        echo "</a>
                ";
        // line 82
        if (((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Costo")) {
            // line 83
            echo "                    ";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Costo") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                // line 84
                echo "                                                    <i class=\"fa fa-sort-numeric-asc active\"></i>
                            <i class=\"fa fa-sort-numeric-desc hover\"></i>
                                            ";
            } else {
                // line 87
                echo "                                                    <i class=\"fa fa-sort-numeric-asc hover\"></i>
                            <i class=\"fa fa-sort-numeric-desc active\"></i>
                                            ";
            }
            // line 90
            echo "                ";
        } else {
            // line 91
            echo "                                            <i class=\"fa fa-sort-numeric-asc placeholder hover\"></i>
                                    ";
        }
        // line 93
        echo "            </span>
        </th>

            
        <th class=\"list_thead_column";
        // line 97
        if (1) {
            echo " sortable";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Venta") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Venta") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "DESC"))) {
                echo " sort_desc";
            }
        }
        echo "\">
            <span class=\"sort-addon\">
            ";
        // line 99
        if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Venta") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
            // line 100
            echo "                    <a href=\"?sort=Venta&order_by=desc\">
                ";
        } else {
            // line 102
            echo "                    <a href=\"?sort=Venta&order_by=asc\">
                ";
        }
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Venta", array(), "Admin"), "html", null, true);
        echo "</a>
                ";
        // line 104
        if (((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Venta")) {
            // line 105
            echo "                    ";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Venta") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                // line 106
                echo "                                                    <i class=\"fa fa-sort-numeric-asc active\"></i>
                            <i class=\"fa fa-sort-numeric-desc hover\"></i>
                                            ";
            } else {
                // line 109
                echo "                                                    <i class=\"fa fa-sort-numeric-asc hover\"></i>
                            <i class=\"fa fa-sort-numeric-desc active\"></i>
                                            ";
            }
            // line 112
            echo "                ";
        } else {
            // line 113
            echo "                                            <i class=\"fa fa-sort-numeric-asc placeholder hover\"></i>
                                    ";
        }
        // line 115
        echo "            </span>
        </th>

            <th class=\"actions\">";
        // line 118
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.header.actions", array(), "Admingenerator");
        echo "</th>
    </tr>
</thead>
";
    }

    // line 122
    public function block_list_tbody($context, array $blocks = array())
    {
        // line 123
        echo "    <tbody>
        ";
        // line 124
        if ((twig_length_filter($this->env, (isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios"))) > 0)) {
            // line 125
            echo "
        ";
            // line 126
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
                // line 127
                echo "            ";
                $this->env->loadTemplate("InvisionVentaBundle:InventarioList:row.html.twig")->display(array_merge($context, array()));
                // line 128
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
            // line 139
            echo "        <tr class=\"list_trow no_results_row\">
                    <td colspan=\"6\">";
            // line 140
            echo $this->env->getExtension('translator')->getTranslator()->trans("list.no.results", array(), "Admingenerator");
            echo "</td>
                </tr>
        ";
        }
        // line 143
        echo "    </tbody>
";
    }

    // line 128
    public function block_object_actions_script($context, array $blocks = array())
    {
        // line 129
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

    // line 150
    public function block_generic_actions($context, array $blocks = array())
    {
        // line 151
        echo "                        ";
        $this->displayBlock('generic_action_nuevo', $context, $blocks);
        // line 161
        echo "        
        ";
        // line 162
        $this->displayBlock('generic_actions_script', $context, $blocks);
        // line 172
        echo "
    ";
    }

    // line 151
    public function block_generic_action_nuevo($context, array $blocks = array())
    {
        // line 152
        echo "            
                
                            
            <a class=\"btn btn-primary\" href=\"";
        // line 155
        echo $this->env->getExtension('routing')->getPath("nuevo_inventario", array());
        echo "\"><i class=\"fa fa fa-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Nuevo", array(), "Admin");
        // line 156
        echo "        </a>
    

                
                        ";
    }

    // line 162
    public function block_generic_actions_script($context, array $blocks = array())
    {
        // line 163
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

    // line 175
    public function block_list_paginator_perpage($context, array $blocks = array())
    {
        // line 176
        echo "    ";
        if (($this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "haveToPaginate") || (!($this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "maxPerPage") === 10)))) {
            // line 177
            echo "    <div class=\"btn-group input-group\">
        <div class=\"btn btn-sm btn-default btn-reset\">";
            // line 178
            echo $this->env->getExtension('translator')->getTranslator()->trans("pagerfanta.view.perpage", array(), "Admingenerator");
            echo "</div>
        <button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
            ";
            // line 180
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pagerfanta.num.elements", array("%number%" => $this->getAttribute((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "maxPerPage")), "Admingenerator"), "html", null, true);
            echo " <span class=\"caret\"></span>
        </button>
        <ul class=\"dropdown-menu pull-right\" role=\"menu\">
            ";
            // line 183
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(array(0 => 10, 1 => 25, 2 => 50, 3 => 75, 4 => 100));
            foreach ($context['_seq'] as $context["_key"] => $context["perPage"]) {
                // line 184
                echo "            <li>
                <a href=\"";
                // line 185
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_VentaBundle_Inventario_list", array("perPage" => (isset($context["perPage"]) ? $context["perPage"] : $this->getContext($context, "perPage")))), "html", null, true);
                echo "\">
                    ";
                // line 186
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pagerfanta.num.elements", array("%number%" => (isset($context["perPage"]) ? $context["perPage"] : $this->getContext($context, "perPage"))), "Admingenerator"), "html", null, true);
                echo "
                </a>
            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['perPage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 190
            echo "        </ul>
    </div>
    ";
        }
    }

    // line 196
    public function block_list_paginator_pages($context, array $blocks = array())
    {
        // line 197
        echo "        ";
        echo $this->env->getExtension('pagerfanta')->renderPagerfanta((isset($context["Inventarios"]) ? $context["Inventarios"] : $this->getContext($context, "Inventarios")), "admingenerator");
        echo "
    ";
    }

    // line 200
    public function block_endform_batch_actions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionVentaBundle/Resources/views/InventarioList/results.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  561 => 200,  554 => 197,  551 => 196,  544 => 190,  534 => 186,  530 => 185,  527 => 184,  523 => 183,  517 => 180,  512 => 178,  509 => 177,  506 => 176,  503 => 175,  489 => 163,  486 => 162,  478 => 156,  474 => 155,  469 => 152,  466 => 151,  461 => 172,  459 => 162,  456 => 161,  453 => 151,  450 => 150,  436 => 129,  433 => 128,  428 => 143,  422 => 140,  419 => 139,  402 => 128,  399 => 127,  382 => 126,  379 => 125,  377 => 124,  374 => 123,  371 => 122,  363 => 118,  358 => 115,  354 => 113,  351 => 112,  346 => 109,  341 => 106,  338 => 105,  336 => 104,  332 => 103,  328 => 102,  324 => 100,  322 => 99,  310 => 97,  304 => 93,  300 => 91,  297 => 90,  292 => 87,  287 => 84,  284 => 83,  282 => 82,  278 => 81,  274 => 80,  270 => 78,  268 => 77,  256 => 75,  250 => 71,  246 => 69,  243 => 68,  238 => 65,  233 => 62,  230 => 61,  228 => 60,  224 => 59,  220 => 58,  216 => 56,  214 => 55,  202 => 53,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 202,  66 => 199,  58 => 175,  53 => 150,  46 => 145,  44 => 122,  42 => 21,  37 => 18,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 200,  64 => 196,  60 => 194,  55 => 174,  52 => 8,  43 => 7,  34 => 4,);
    }
}
