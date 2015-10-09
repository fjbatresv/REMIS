<?php

/* Admingenerated/InvisionSoporteBundle/Resources/views/PerfilList/results.html.twig */
class __TwigTemplate_a5b0d3952dab6c0b8ca5d6204d28fae18bafdc779310d970ba08be97e9b8623a extends Twig_Template
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

        <table id=\"table-list-Perfil\" class=\"table table-striped table-hover table-condensed object-actions-Perfil\">
            ";
        // line 21
        $this->displayBlock('list_thead', $context, $blocks);
        // line 72
        $this->displayBlock('list_tbody', $context, $blocks);
        // line 95
        echo "
        </table>

        <div class=\"form-group list-actions col-md-12\">
                    <div id=\"generic_actions\" class=\"pull-left btn-toolbar\" role=\"toolbar\">
                ";
        // line 100
        $this->displayBlock('generic_actions', $context, $blocks);
        // line 124
        echo "</div>
        <div class=\"pull-right btn-toolbar\" role=\"toolbar\">";
        // line 125
        $this->displayBlock('list_paginator_perpage', $context, $blocks);
        // line 144
        echo "</div>

            <div class=\"pull-right btn-toolbar\" role=\"toolbar\">    ";
        // line 146
        $this->displayBlock('list_paginator_pages', $context, $blocks);
        // line 149
        echo "</div>
        </div>";
        // line 150
        $this->displayBlock('endform_batch_actions', $context, $blocks);
        // line 152
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
        $context["count"] = $this->getAttribute((isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils")), "nbResults");
        // line 5
        echo "    ";
        $context["start"] = ((($this->getAttribute((isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils")), "currentPage") - 1) * $this->getAttribute((isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils")), "maxPerPage")) + 1);
        // line 6
        echo "    ";
        $context["end"] = (((isset($context["start"]) ? $context["start"] : $this->getContext($context, "start")) + $this->getAttribute((isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils")), "maxPerPage")) - 1);
        // line 7
        echo "    ";
        $context["end"] = ((((isset($context["end"]) ? $context["end"] : $this->getContext($context, "end")) > (isset($context["count"]) ? $context["count"] : $this->getContext($context, "count")))) ? ((isset($context["count"]) ? $context["count"] : $this->getContext($context, "count"))) : ((isset($context["end"]) ? $context["end"] : $this->getContext($context, "end"))));
        // line 8
        echo "
    ";
        // line 9
        if ($this->getAttribute((isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils")), "haveToPaginate")) {
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

            
        <th class=\"list_thead_column";
        // line 47
        if (1) {
            echo " sortable";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Descripcion") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
                echo " sort_asc";
            } elseif ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Descripcion") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "DESC"))) {
                echo " sort_desc";
            }
        }
        echo "\">
            <span class=\"sort-addon\">
            ";
        // line 49
        if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Descripcion") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
            // line 50
            echo "                    <a href=\"?sort=Descripcion&order_by=desc\">
                ";
        } else {
            // line 52
            echo "                    <a href=\"?sort=Descripcion&order_by=asc\">
                ";
        }
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Descripcion", array(), "Admin"), "html", null, true);
        echo "</a>
                ";
        // line 54
        if (((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Descripcion")) {
            // line 55
            echo "                    ";
            if ((((isset($context["sortColumn"]) ? $context["sortColumn"] : $this->getContext($context, "sortColumn")) == "Descripcion") && ((isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")) == "ASC"))) {
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

            <th class=\"actions\">";
        // line 68
        echo $this->env->getExtension('translator')->getTranslator()->trans("list.header.actions", array(), "Admingenerator");
        echo "</th>
    </tr>
</thead>
";
    }

    // line 72
    public function block_list_tbody($context, array $blocks = array())
    {
        // line 73
        echo "    <tbody>
        ";
        // line 74
        if ((twig_length_filter($this->env, (isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils"))) > 0)) {
            // line 75
            echo "
        ";
            // line 76
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["Perfil"]) {
                // line 77
                echo "            ";
                $this->env->loadTemplate("InvisionSoporteBundle:PerfilList:row.html.twig")->display(array_merge($context, array()));
                // line 78
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Perfil'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "    ";
            $this->displayBlock('object_actions_script', $context, $blocks);
        } else {
            // line 89
            echo "        <tr class=\"list_trow no_results_row\">
                    <td colspan=\"3\">";
            // line 90
            echo $this->env->getExtension('translator')->getTranslator()->trans("list.no.results", array(), "Admingenerator");
            echo "</td>
                </tr>
        ";
        }
        // line 93
        echo "    </tbody>
";
    }

    // line 78
    public function block_object_actions_script($context, array $blocks = array())
    {
        // line 79
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/admingeneratorgenerator/js/admingenerator/object-actions.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
        ;(function(window, \$, undefined){
        \t\$(\".object-actions-Perfil\").agen\$objectActions({
            \tactionsSelector: '.object_actions a'
            });
        })(this, jQuery);
    </script>
        ";
    }

    // line 100
    public function block_generic_actions($context, array $blocks = array())
    {
        // line 101
        echo "                        ";
        $this->displayBlock('generic_action_nuevo', $context, $blocks);
        // line 111
        echo "        
        ";
        // line 112
        $this->displayBlock('generic_actions_script', $context, $blocks);
        // line 122
        echo "
    ";
    }

    // line 101
    public function block_generic_action_nuevo($context, array $blocks = array())
    {
        // line 102
        echo "            
                
                            
            <a class=\"btn btn-primary\" href=\"";
        // line 105
        echo $this->env->getExtension('routing')->getPath("nuevo_perfil", array());
        echo "\"><i class=\"fa fa fa-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Nuevo", array(), "Admin");
        // line 106
        echo "        </a>
    

                
                        ";
    }

    // line 112
    public function block_generic_actions_script($context, array $blocks = array())
    {
        // line 113
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

    // line 125
    public function block_list_paginator_perpage($context, array $blocks = array())
    {
        // line 126
        echo "    ";
        if (($this->getAttribute((isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils")), "haveToPaginate") || (!($this->getAttribute((isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils")), "maxPerPage") === 10)))) {
            // line 127
            echo "    <div class=\"btn-group input-group\">
        <div class=\"btn btn-sm btn-default btn-reset\">";
            // line 128
            echo $this->env->getExtension('translator')->getTranslator()->trans("pagerfanta.view.perpage", array(), "Admingenerator");
            echo "</div>
        <button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
            ";
            // line 130
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pagerfanta.num.elements", array("%number%" => $this->getAttribute((isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils")), "maxPerPage")), "Admingenerator"), "html", null, true);
            echo " <span class=\"caret\"></span>
        </button>
        <ul class=\"dropdown-menu pull-right\" role=\"menu\">
            ";
            // line 133
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(array(0 => 10, 1 => 25, 2 => 50, 3 => 75, 4 => 100));
            foreach ($context['_seq'] as $context["_key"] => $context["perPage"]) {
                // line 134
                echo "            <li>
                <a href=\"";
                // line 135
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Invision_SoporteBundle_Perfil_list", array("perPage" => (isset($context["perPage"]) ? $context["perPage"] : $this->getContext($context, "perPage")))), "html", null, true);
                echo "\">
                    ";
                // line 136
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pagerfanta.num.elements", array("%number%" => (isset($context["perPage"]) ? $context["perPage"] : $this->getContext($context, "perPage"))), "Admingenerator"), "html", null, true);
                echo "
                </a>
            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['perPage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 140
            echo "        </ul>
    </div>
    ";
        }
    }

    // line 146
    public function block_list_paginator_pages($context, array $blocks = array())
    {
        // line 147
        echo "        ";
        echo $this->env->getExtension('pagerfanta')->renderPagerfanta((isset($context["Perfils"]) ? $context["Perfils"] : $this->getContext($context, "Perfils")), "admingenerator");
        echo "
    ";
    }

    // line 150
    public function block_endform_batch_actions($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admingenerated/InvisionSoporteBundle/Resources/views/PerfilList/results.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  434 => 150,  427 => 147,  424 => 146,  417 => 140,  407 => 136,  403 => 135,  400 => 134,  396 => 133,  390 => 130,  385 => 128,  382 => 127,  379 => 126,  376 => 125,  362 => 113,  359 => 112,  351 => 106,  347 => 105,  342 => 102,  339 => 101,  334 => 122,  332 => 112,  329 => 111,  326 => 101,  323 => 100,  309 => 79,  306 => 78,  301 => 93,  295 => 90,  292 => 89,  275 => 78,  272 => 77,  255 => 76,  252 => 75,  250 => 74,  247 => 73,  244 => 72,  236 => 68,  231 => 65,  227 => 63,  224 => 62,  219 => 59,  214 => 56,  211 => 55,  209 => 54,  205 => 53,  201 => 52,  197 => 50,  195 => 49,  183 => 47,  177 => 43,  173 => 41,  170 => 40,  165 => 37,  160 => 34,  157 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 28,  141 => 27,  129 => 25,  124 => 22,  121 => 21,  116 => 16,  111 => 14,  102 => 11,  99 => 10,  97 => 9,  94 => 8,  91 => 7,  88 => 6,  85 => 5,  83 => 4,  77 => 2,  71 => 152,  66 => 149,  58 => 125,  53 => 100,  46 => 95,  44 => 72,  42 => 21,  37 => 18,  35 => 16,  33 => 2,  30 => 1,  108 => 13,  105 => 12,  100 => 17,  93 => 13,  90 => 12,  87 => 11,  82 => 24,  80 => 3,  76 => 20,  74 => 19,  72 => 17,  69 => 150,  64 => 146,  60 => 144,  55 => 124,  52 => 8,  43 => 7,  34 => 4,);
    }
}
