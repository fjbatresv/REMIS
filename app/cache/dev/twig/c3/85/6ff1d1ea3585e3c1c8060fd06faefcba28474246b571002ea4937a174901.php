<?php

/* Admingenerated/InvisionVentaBundle/Resources/views/ColorList/results.html.twig */
class __TwigTemplate_c3856ff1d1ea3585e3c1c8060fd06faefcba28474246b571002ea4937a174901 extends Twig_Template
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
            'generic_action_Nuevo' => array($this, 'block_generic_action_Nuevo'),
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

        <table id=\"table-list-Color\" class=\"table table-striped table-hover table-condensed object-actions-Color\">
            ";
        // line 21
        $this->displayBlock('list_thead', $context, $blocks);
        // line 50
        $this->displayBlock('list_tbody', $context, $blocks);
        // line 73
        echo "
        </table>

        <div class=\"form-group list-actions col-md-12\">
                    <div id=\"generic_actions\" class=\"pull-left btn-toolbar\" role=\"toolbar\">
                ";
        // line 78
        $this->displayBlock('generic_actions', $context, $blocks);
        // line 102
        echo "</div>
        <div class=\"pull-right btn-toolbar\" role=\"toolbar\">";
        // line 103
        $this->displayBlock('list_paginator_perpage', $context, $blocks);
        // line 122
        echo "</div>

            <div class=\"pull-right btn-toolbar\" role=\"toolbar\">    ";
        // line 124
        $this->displayBlock('list_paginator_pages', $context, $blocks);
        // line 127
        echo "</div>
        </div>";
        // line 128
        $this->displayBlock('endform_batch_actions', $context, $blocks);
        // line 130
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
        $context["count"] = $this->getAttribute((isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors")), "nbResults");
        // line 5
        echo "    ";
        $context["start"] = ((($this->getAttribute((isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors")), "currentPage") - 1) * $this->getAttribute((isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors")), "maxPerPage")) + 1);
        // line 6
        echo "    ";
        $context["end"] = (((isset($context["start"]) ? $context["start"] : $this->getContext($context, "start")) + $this->getAttribute((isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors")), "maxPerPage")) - 1);
        // line 7
        echo "    ";
        $context["end"] = ((((isset($context["end"]) ? $context["end"] : $this->getContext($context, "end")) > (isset($context["count"]) ? $context["count"] : $this->getContext($context, "count")))) ? ((isset($context["count"]) ? $context["count"] : $this->getContext($context, "count"))) : ((isset($context["end"]) ? $context["end"] : $this->getContext($context, "end"))));
        // line 8
        echo "
    ";
        // line 9
        if ($this->getAttribute((isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors")), "haveToPaginate")) {
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
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Nombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Nombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "DESC"))) {
                echo " sort_desc";
            }
        }
        echo "\">
            <span class=\"sort-addon\">
            ";
        // line 27
        if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Nombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
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
        if (((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Nombre")) {
            // line 33
            echo "                    ";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Nombre") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
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

            <th class=\"actions\">";
        // line 46
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.header.actions", array(), "Admingenerator");
        echo "</th>
    </tr>
</thead>
";
    }

    // line 50
    public function block_list_tbody($context, array $blocks = array())
    {
        // line 51
        echo "    <tbody>
        ";
        // line 52
        if ((twig_length_filter($this->env, (isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors"))) > 0)) {
            // line 53
            echo "
        ";
            // line 54
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["Color"]) {
                // line 55
                echo "            ";
                $this->env->loadTemplate("InvisionVentaBundle:ColorList:row.html.twig")->display(array_merge($context, array()));
                // line 56
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Color'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "    ";
            $this->displayBlock('object_actions_script', $context, $blocks);
        } else {
            // line 67
            echo "        <tr class=\"list_trow no_results_row\">
                    <td colspan=\"2\">";
            // line 68
            echo $this->env->getExtension('translator')->getTranslator()->trans("list.no.results", array(), "Admingenerator");
            echo "</td>
                </tr>
        ";
        }
        // line 71
        echo "    </tbody>
";
    }

    // line 56
    public function block_object_actions_script($context, array $blocks = array())
    {
        // line 57
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/admingeneratorgenerator/js/admingenerator/object-actions.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
        ;(function(window, \$, undefined){
        \t\$(\".object-actions-Color\").agen\$objectActions({
            \tactionsSelector: '.object_actions a'
            });
        })(this, jQuery);
    </script>
        ";
    }

    // line 78
    public function block_generic_actions($context, array $blocks = array())
    {
        // line 79
        echo "                        ";
        $this->displayBlock('generic_action_Nuevo', $context, $blocks);
        // line 89
        echo "        
        ";
        // line 90
        $this->displayBlock('generic_actions_script', $context, $blocks);
        // line 100
        echo "
    ";
    }

    // line 79
    public function block_generic_action_Nuevo($context, array $blocks = array())
    {
        // line 80
        echo "            
                
                            
            <a class=\"btn btn btn-primary\" href=\"";
        // line 83
        echo $this->env->getExtension('routing')->getPath("nuevo_color", array());
        echo "\"><i class=\"fa fa fa-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Nuevo", array(), "Admin");
        // line 84
        echo "        </a>
    

                
                        ";
    }

    // line 90
    public function block_generic_actions_script($context, array $blocks = array())
    {
        // line 91
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

    // line 103
    public function block_list_paginator_perpage($context, array $blocks = array())
    {
        // line 104
        echo "    ";
        if (($this->getAttribute((isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors")), "haveToPaginate") || (!($this->getAttribute((isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors")), "maxPerPage") === 10)))) {
            // line 105
            echo "    <div class=\"btn-group input-group\">
        <div class=\"btn btn-sm btn-default btn-reset\">";
            // line 106
            echo $this->env->getExtension('translator')->getTranslator()->trans("pagerfanta.view.perpage", array(), "Admingenerator");
            echo "</div>
        <button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
            ";
            // line 108
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pagerfanta.num.elements", array("%number%" => $this->getAttribute((isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors")), "maxPerPage")), "Admingenerator"), "html", null, true);
            echo " <span class=\"caret\"></span>
        </button>
        <ul class=\"dropdown-menu pull-right\" role=\"menu\">
            ";
            // line 111
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(array(0 => 10, 1 => 25, 2 => 50, 3 => 75, 4 => 100));
            foreach ($context['_seq'] as $context["_key"] => $context["perPage"]) {
                // line 112
                echo "            <li>
                <a href=\"";
                // line 113
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_VentaBundle_Color_list", array("perPage" => (isset($context["perPage"]) ? $context["perPage"] : $this->getContext($context, "perPage")))), "html", null, true);
                echo "\">
                    ";
                // line 114
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pagerfanta.num.elements", array("%number%" => (isset($context["perPage"]) ? $context["perPage"] : $this->getContext($context, "perPage"))), "Admingenerator"), "html", null, true);
                echo "
                </a>
            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['perPage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 118
            echo "        </ul>
    </div>
    ";
        }
    }

    // line 124
    public function block_list_paginator_pages($context, array $blocks = array())
    {
        // line 125
        echo "        ";
        echo $this->env->getExtension('pagerfanta')->renderPagerfanta((isset($context["Colors"]) ? $context["Colors"] : $this->getContext($context, "Colors")), "admingenerator");
        echo "
    ";
    }

    // line 128
    public function block_endform_batch_actions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionVentaBundle/Resources/views/ColorList/results.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  380 => 128,  373 => 125,  370 => 124,  363 => 118,  353 => 114,  349 => 113,  346 => 112,  342 => 111,  336 => 108,  331 => 106,  328 => 105,  325 => 104,  322 => 103,  308 => 91,  305 => 90,  297 => 84,  293 => 83,  288 => 80,  285 => 79,  280 => 100,  278 => 90,  275 => 89,  272 => 79,  269 => 78,  255 => 57,  252 => 56,  247 => 71,  241 => 68,  238 => 67,  221 => 56,  218 => 55,  201 => 54,  198 => 53,  196 => 52,  193 => 51,  190 => 50,  182 => 46,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 130,  66 => 127,  58 => 103,  53 => 78,  46 => 73,  44 => 50,  42 => 21,  37 => 18,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 128,  64 => 124,  60 => 122,  55 => 102,  52 => 8,  43 => 7,  34 => 4,);
    }
}
