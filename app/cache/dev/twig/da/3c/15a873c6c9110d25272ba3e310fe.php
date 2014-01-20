<?php

/* APYDataGridBundle::blocks.html.twig */
class __TwigTemplate_da3c15a873c6c9110d25272ba3e310fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'grid' => array($this, 'block_grid'),
            'grid_no_data' => array($this, 'block_grid_no_data'),
            'grid_no_result' => array($this, 'block_grid_no_result'),
            'grid_titles' => array($this, 'block_grid_titles'),
            'grid_filters' => array($this, 'block_grid_filters'),
            'grid_search' => array($this, 'block_grid_search'),
            'grid_rows' => array($this, 'block_grid_rows'),
            'grid_pager' => array($this, 'block_grid_pager'),
            'grid_pager_totalcount' => array($this, 'block_grid_pager_totalcount'),
            'grid_pager_selectpage' => array($this, 'block_grid_pager_selectpage'),
            'grid_pager_results_perpage' => array($this, 'block_grid_pager_results_perpage'),
            'grid_actions' => array($this, 'block_grid_actions'),
            'grid_exports' => array($this, 'block_grid_exports'),
            'grid_tweaks' => array($this, 'block_grid_tweaks'),
            'grid_column_actions_cell' => array($this, 'block_grid_column_actions_cell'),
            'grid_column_massaction_cell' => array($this, 'block_grid_column_massaction_cell'),
            'grid_column_boolean_cell' => array($this, 'block_grid_column_boolean_cell'),
            'grid_column_array_cell' => array($this, 'block_grid_column_array_cell'),
            'grid_column_cell' => array($this, 'block_grid_column_cell'),
            'grid_column_operator' => array($this, 'block_grid_column_operator'),
            'grid_column_filter_type_input' => array($this, 'block_grid_column_filter_type_input'),
            'grid_column_filter_type_select' => array($this, 'block_grid_column_filter_type_select'),
            'grid_column_filter_type_massaction' => array($this, 'block_grid_column_filter_type_massaction'),
            'grid_column_filter_type_actions' => array($this, 'block_grid_column_filter_type_actions'),
            'grid_scripts' => array($this, 'block_grid_scripts'),
            'grid_scripts_goto' => array($this, 'block_grid_scripts_goto'),
            'grid_scripts_reset' => array($this, 'block_grid_scripts_reset'),
            'grid_scripts_previous_page' => array($this, 'block_grid_scripts_previous_page'),
            'grid_scripts_next_page' => array($this, 'block_grid_scripts_next_page'),
            'grid_scripts_enter_page' => array($this, 'block_grid_scripts_enter_page'),
            'grid_scripts_results_per_page' => array($this, 'block_grid_scripts_results_per_page'),
            'grid_scripts_mark_visible' => array($this, 'block_grid_scripts_mark_visible'),
            'grid_scripts_mark_all' => array($this, 'block_grid_scripts_mark_all'),
            'grid_scripts_switch_operator' => array($this, 'block_grid_scripts_switch_operator'),
            'grid_scripts_submit_form' => array($this, 'block_grid_scripts_submit_form'),
            'grid_scripts_ajax' => array($this, 'block_grid_scripts_ajax'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('grid', $context, $blocks);
        // line 43
        $this->displayBlock('grid_no_data', $context, $blocks);
        // line 45
        $this->displayBlock('grid_no_result', $context, $blocks);
        // line 59
        $this->displayBlock('grid_titles', $context, $blocks);
        // line 88
        $this->displayBlock('grid_filters', $context, $blocks);
        // line 98
        $this->displayBlock('grid_search', $context, $blocks);
        // line 114
        $this->displayBlock('grid_rows', $context, $blocks);
        // line 131
        $this->displayBlock('grid_pager', $context, $blocks);
        // line 143
        $this->displayBlock('grid_pager_totalcount', $context, $blocks);
        // line 147
        $this->displayBlock('grid_pager_selectpage', $context, $blocks);
        // line 156
        $this->displayBlock('grid_pager_results_perpage', $context, $blocks);
        // line 165
        $this->displayBlock('grid_actions', $context, $blocks);
        // line 190
        $this->displayBlock('grid_exports', $context, $blocks);
        // line 205
        $this->displayBlock('grid_tweaks', $context, $blocks);
        // line 220
        $this->displayBlock('grid_column_actions_cell', $context, $blocks);
        // line 227
        $this->displayBlock('grid_column_massaction_cell', $context, $blocks);
        // line 231
        $this->displayBlock('grid_column_boolean_cell', $context, $blocks);
        // line 236
        $this->displayBlock('grid_column_array_cell', $context, $blocks);
        // line 246
        $this->displayBlock('grid_column_cell', $context, $blocks);
        // line 257
        $this->displayBlock('grid_column_operator', $context, $blocks);
        // line 269
        $this->displayBlock('grid_column_filter_type_input', $context, $blocks);
        // line 286
        $this->displayBlock('grid_column_filter_type_select', $context, $blocks);
        // line 330
        $this->displayBlock('grid_column_filter_type_massaction', $context, $blocks);
        // line 334
        $this->displayBlock('grid_column_filter_type_actions', $context, $blocks);
        // line 337
        echo "


";
        // line 341
        $this->displayBlock('grid_scripts', $context, $blocks);
        // line 356
        echo "
";
        // line 357
        $this->displayBlock('grid_scripts_goto', $context, $blocks);
        // line 365
        echo "
";
        // line 366
        $this->displayBlock('grid_scripts_reset', $context, $blocks);
        // line 374
        echo "
";
        // line 375
        $this->displayBlock('grid_scripts_previous_page', $context, $blocks);
        // line 383
        echo "
";
        // line 384
        $this->displayBlock('grid_scripts_next_page', $context, $blocks);
        // line 392
        echo "
";
        // line 393
        $this->displayBlock('grid_scripts_enter_page', $context, $blocks);
        // line 409
        echo "
";
        // line 410
        $this->displayBlock('grid_scripts_results_per_page', $context, $blocks);
        // line 418
        echo "
";
        // line 419
        $this->displayBlock('grid_scripts_mark_visible', $context, $blocks);
        // line 448
        echo "
";
        // line 449
        $this->displayBlock('grid_scripts_mark_all', $context, $blocks);
        // line 473
        echo "
";
        // line 474
        $this->displayBlock('grid_scripts_switch_operator', $context, $blocks);
        // line 505
        echo "
";
        // line 506
        $this->displayBlock('grid_scripts_submit_form', $context, $blocks);
        // line 522
        echo "
";
        // line 523
        $this->displayBlock('grid_scripts_ajax', $context, $blocks);
    }

    // line 2
    public function block_grid($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"grid\">
";
        // line 4
        if (((($this->getAttribute($this->getContext($context, "grid"), "totalCount") > 0) || $this->getAttribute($this->getContext($context, "grid"), "isFiltered")) || ($this->getAttribute($this->getContext($context, "grid"), "noDataMessage") === false))) {
            // line 5
            echo "    <form id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "routeUrl"), "html", null, true);
            echo "\" method=\"post\">
        <div class=\"grid_header\">
        ";
            // line 7
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "massActions")) > 0)) {
                // line 8
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("actions", $this->getContext($context, "grid"));
                echo "
        ";
            }
            // line 10
            echo "        </div>
        <div class=\"grid_body\">
        <table>
        ";
            // line 13
            if ($this->getAttribute($this->getContext($context, "grid"), "isTitleSectionVisible")) {
                // line 14
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("titles", $this->getContext($context, "grid"));
                echo "
        ";
            }
            // line 16
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "grid"), "isFilterSectionVisible")) {
                // line 17
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("filters", $this->getContext($context, "grid"));
                echo "
        ";
            }
            // line 19
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("rows", $this->getContext($context, "grid"));
            echo "
        </table>
        </div>
        <div class=\"grid_footer\">
        ";
            // line 23
            if ($this->getAttribute($this->getContext($context, "grid"), "isPagerSectionVisible")) {
                // line 24
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGridPager($this->getContext($context, "grid"));
                echo "
        ";
            }
            // line 26
            echo "        ";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "exports")) > 0)) {
                // line 27
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("exports", $this->getContext($context, "grid"));
                echo "
        ";
            }
            // line 29
            echo "        ";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "tweaks")) > 0)) {
                // line 30
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("tweaks", $this->getContext($context, "grid"));
                echo "
        ";
            }
            // line 32
            echo "        </div>
        ";
            // line 33
            if ($this->getContext($context, "withjs")) {
                // line 34
                echo "            ";
                echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts", $this->getContext($context, "grid"));
                echo "
        ";
            }
            // line 36
            echo "    </form>
";
        } else {
            // line 38
            echo "    ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_data", $this->getContext($context, "grid"));
            echo "
";
        }
        // line 40
        echo "</div>
";
    }

    // line 43
    public function block_grid_no_data($context, array $blocks = array())
    {
        echo "<p class=\"no_data\">";
        echo $this->env->getExtension('translator')->trans((($this->getAttribute($this->getContext($context, "grid", true), "noDataMessage", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "grid", true), "noDataMessage"), "No data")) : ("No data")));
        echo "</p>";
    }

    // line 45
    public function block_grid_no_result($context, array $blocks = array())
    {
        // line 46
        ob_start();
        // line 47
        $context["nbColumns"] = 0;
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "grid"), "columns"));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 49
            echo "    ";
            if ($this->getAttribute($this->getContext($context, "column"), "visible", array(0 => $this->getAttribute($this->getContext($context, "grid"), "isReadyForExport")), "method")) {
                // line 50
                echo "        ";
                $context["nbColumns"] = ($this->getContext($context, "nbColumns") + 1);
                // line 51
                echo "    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 53
        echo "<tr class=\"grid-row-cells\">
    <td class=\"last-column last-row\" colspan=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getContext($context, "nbColumns"), "html", null, true);
        echo "\" style=\"text-align: center;\">";
        echo $this->env->getExtension('translator')->trans((($this->getAttribute($this->getContext($context, "grid", true), "noResultMessage", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "grid", true), "noResultMessage"), "No result")) : ("No result")));
        echo "</td>
</tr>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 59
    public function block_grid_titles($context, array $blocks = array())
    {
        // line 60
        echo "    <tr class=\"grid-row-titles\">
    ";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "grid"), "columns"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 62
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "column"), "visible", array(0 => $this->getAttribute($this->getContext($context, "grid"), "isReadyForExport")), "method")) {
                // line 63
                echo "            <th class=\"";
                if (($this->getAttribute($this->getContext($context, "column"), "align") != "left")) {
                    echo "align-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "align"), "html", null, true);
                }
                if ($this->getAttribute($this->getContext($context, "loop"), "last")) {
                    echo " last-column";
                }
                echo "\"";
                if (($this->getAttribute($this->getContext($context, "column"), "size") > (-1))) {
                    echo " style=\"width:";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "size"), "html", null, true);
                    echo "px;\"";
                }
                echo ">
            ";
                // line 64
                if (($this->getAttribute($this->getContext($context, "column"), "type") == "massaction")) {
                    // line 65
                    echo "                <input type=\"checkbox\" class=\"grid-mass-selector\" onclick=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
                    echo "_markVisible(this.checked);\"/>
            ";
                } else {
                    // line 67
                    echo "                ";
                    $context["columnTitle"] = (($this->getAttribute($this->getContext($context, "grid"), "prefixTitle") . $this->getAttribute($this->getContext($context, "column"), "title")) . "__abbr");
                    // line 68
                    echo "                ";
                    if (($this->env->getExtension('translator')->trans($this->getContext($context, "columnTitle")) == $this->getContext($context, "columnTitle"))) {
                        // line 69
                        echo "                    ";
                        $context["columnTitle"] = ($this->getAttribute($this->getContext($context, "grid"), "prefixTitle") . $this->getAttribute($this->getContext($context, "column"), "title"));
                        // line 70
                        echo "                ";
                    }
                    // line 71
                    echo "                ";
                    if ($this->getAttribute($this->getContext($context, "column"), "sortable")) {
                        // line 72
                        echo "                    <a class=\"order\" href=\"";
                        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("order", $this->getContext($context, "grid"), $this->getContext($context, "column"));
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Order by"), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "columnTitle")), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "columnTitle")), "html", null, true);
                        echo "</a>
                    ";
                        // line 73
                        if (($this->getAttribute($this->getContext($context, "column"), "order") == "asc")) {
                            // line 74
                            echo "                        <div class=\"sort_up\"></div>
                    ";
                        } elseif (($this->getAttribute($this->getContext($context, "column"), "order") == "desc")) {
                            // line 76
                            echo "                        <div class=\"sort_down\"></div>
                    ";
                        }
                        // line 78
                        echo "                ";
                    } else {
                        // line 79
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "columnTitle")), "html", null, true);
                        echo "
                ";
                    }
                    // line 81
                    echo "            ";
                }
                // line 82
                echo "            </th>
        ";
            }
            // line 84
            echo "    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 85
        echo "    </tr>
";
    }

    // line 88
    public function block_grid_filters($context, array $blocks = array())
    {
        // line 89
        echo "    <tr class=\"grid-row-filters\">
    ";
        // line 90
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "grid"), "columns"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 91
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "column"), "visible", array(0 => $this->getAttribute($this->getContext($context, "grid"), "isReadyForExport")), "method")) {
                // line 92
                echo "        <th";
                if ($this->getAttribute($this->getContext($context, "loop"), "last")) {
                    echo " class=\"last-column\"";
                }
                if (($this->getAttribute($this->getContext($context, "column"), "size") > (-1))) {
                    echo " style=\"width:";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "size"), "html", null, true);
                    echo "px;\"";
                }
                echo ">";
                if ($this->getAttribute($this->getContext($context, "column"), "filterable")) {
                    echo $this->env->getExtension('datagrid_twig_extension')->getGridFilter($this->getContext($context, "column"), $this->getContext($context, "grid"));
                }
                echo "</th>
        ";
            }
            // line 94
            echo "    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 95
        echo "    </tr>
";
    }

    // line 98
    public function block_grid_search($context, array $blocks = array())
    {
        // line 99
        if ($this->getAttribute($this->getContext($context, "grid"), "isFilterSectionVisible")) {
            // line 100
            echo "    <div class=\"grid-search\">
        <form id=\"";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "_search\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "routeUrl"), "html", null, true);
            echo "\" method=\"post\">
        ";
            // line 102
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "grid"), "columns"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 103
                echo "            ";
                if ((($this->getAttribute($this->getContext($context, "column"), "visible", array(0 => true), "method") && $this->getAttribute($this->getContext($context, "column"), "isFilterable")) && !twig_in_filter($this->getAttribute($this->getContext($context, "column"), "type"), array(0 => "actions", 1 => "massaction")))) {
                    // line 104
                    echo "                ";
                    $context["columnTitle"] = ($this->getAttribute($this->getContext($context, "grid"), "prefixTitle") . $this->getAttribute($this->getContext($context, "column"), "title"));
                    // line 105
                    echo "                <div class=\"";
                    echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute($this->getContext($context, "loop"), "index")), "html", null, true);
                    echo "\"><label>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "columnTitle")), "html", null, true);
                    echo "</label>";
                    echo $this->env->getExtension('datagrid_twig_extension')->getGridFilter($this->getContext($context, "column"), $this->getContext($context, "grid"), false);
                    echo "</div>
            ";
                }
                // line 107
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 108
            echo "            <div class=\"grid-search-action\"><input type=\"submit\" class=\"grid-search-submit\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Search"), "html", null, true);
            echo "\"/><input type=\"button\" class=\"grid-search-reset\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reset"), "html", null, true);
            echo "\" onclick=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "_reset();\"/></div>
        </form>
    </div>
";
        }
    }

    // line 114
    public function block_grid_rows($context, array $blocks = array())
    {
        // line 115
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "grid"), "rows"));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 116
            echo "    ";
            $context["last_row"] = $this->getAttribute($this->getContext($context, "loop"), "last");
            // line 117
            echo "    ";
            ob_start();
            // line 118
            echo "        <tr";
            if (($this->getAttribute($this->getContext($context, "row"), "color") != "")) {
                echo " style=\"background-color:";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "row"), "color"), "html", null, true);
                echo ";\"";
            }
            echo " class=\"grid-row-cells ";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute($this->getContext($context, "loop"), "index")), "html", null, true);
            echo "\">
        ";
            // line 119
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "grid"), "columns"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 120
                echo "            ";
                if ($this->getAttribute($this->getContext($context, "column"), "visible", array(0 => $this->getAttribute($this->getContext($context, "grid"), "isReadyForExport")), "method")) {
                    // line 121
                    echo "                <td class=\"grid-column-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
                    if (($this->getAttribute($this->getContext($context, "column"), "align") != "left")) {
                        echo " align-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "align"), "html", null, true);
                    }
                    if ($this->getAttribute($this->getContext($context, "loop"), "last")) {
                        echo " last-column";
                    }
                    if ($this->getContext($context, "last_row")) {
                        echo " last-row";
                    }
                    echo "\">";
                    echo $this->env->getExtension('datagrid_twig_extension')->getGridCell($this->getContext($context, "column"), $this->getContext($context, "row"), $this->getContext($context, "grid"));
                    echo "</td>
            ";
                }
                // line 123
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 124
            echo "    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 125
            echo "    </tr>
    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 127
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("no_result", $this->getContext($context, "grid"));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    // line 131
    public function block_grid_pager($context, array $blocks = array())
    {
        // line 132
        echo "    ";
        if ($this->getContext($context, "pagerfanta")) {
            // line 133
            echo "        ";
            echo $this->env->getExtension('datagrid_twig_extension')->getPagerfanta($this->getContext($context, "grid"));
            echo "
    ";
        } else {
            // line 135
            echo "        <div class=\"pager\" style=\"float:left\">
            ";
            // line 136
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("pager_totalcount", $this->getContext($context, "grid"));
            echo "
            ";
            // line 137
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("pager_selectpage", $this->getContext($context, "grid"));
            echo "
            ";
            // line 138
            echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("pager_results_perpage", $this->getContext($context, "grid"));
            echo "
        </div>
    ";
        }
    }

    // line 143
    public function block_grid_pager_totalcount($context, array $blocks = array())
    {
        // line 144
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->transchoice("%count% Results, ", $this->getAttribute($this->getContext($context, "grid"), "totalCount"), array("%count%" => $this->getAttribute($this->getContext($context, "grid"), "totalCount"))), "html", null, true);
        echo "
";
    }

    // line 147
    public function block_grid_pager_selectpage($context, array $blocks = array())
    {
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Page"), "html", null, true);
        echo "
";
        // line 149
        ob_start();
        // line 150
        echo "<input type=\"button\" class=\"prev\" ";
        if (($this->getAttribute($this->getContext($context, "grid"), "page") <= 0)) {
            echo "disabled=\"disabled\"";
        }
        echo " value=\"<\" onclick=\"return ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_previousPage();\"/>
<input type=\"text\" class=\"current\" value=\"";
        // line 151
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getContext($context, "grid"), "page") + 1), "html", null, true);
        echo "\" size=\"2\" onkeypress=\"return ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_enterPage(event, parseInt(this.value)-1);\"/>
<input type=\"button\" value=\">\" class=\"next\" ";
        // line 152
        if (($this->getAttribute($this->getContext($context, "grid"), "page") >= ($this->getAttribute($this->getContext($context, "grid"), "pageCount") - 1))) {
            echo "disabled=\"disabled\"";
        }
        echo " onclick=\"return ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_nextPage();\"/> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("of %count%", array("%count%" => $this->getAttribute($this->getContext($context, "grid"), "pageCount"))), "html", null, true);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 156
    public function block_grid_pager_results_perpage($context, array $blocks = array())
    {
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(", Display"), "html", null, true);
        echo "
<select onchange=\"return ";
        // line 158
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_resultsPerPage(this.value);\">
";
        // line 159
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "grid"), "limits"));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 160
            echo "    <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "\"";
            if (($this->getContext($context, "key") == $this->getAttribute($this->getContext($context, "grid"), "limit"))) {
                echo " selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
            echo "</option>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 162
        echo "</select> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Items per page"), "html", null, true);
        echo "
";
    }

    // line 165
    public function block_grid_actions($context, array $blocks = array())
    {
        // line 166
        echo "<div class=\"mass-actions\">
    <span class=\"grid_massactions_helper\">
        <a href=\"#\" onclick=\"return ";
        // line 168
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_markVisible(true);\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Select visible"), "html", null, true);
        echo "</a> |
        <a href=\"#\" onclick=\"return ";
        // line 169
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_markVisible(false);\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Deselect visible"), "html", null, true);
        echo "</a> |
        <a href=\"#\" onclick=\"return ";
        // line 170
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_markAll(true);\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Select all"), "html", null, true);
        echo "</a> |
        <a href=\"#\" onclick=\"return ";
        // line 171
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_markAll(false);\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Deselect all"), "html", null, true);
        echo "</a>
        <span class=\"mass-actions-selected\" id=\"";
        // line 172
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_mass_action_selected\"></span>
    </span>
    ";
        // line 174
        ob_start();
        // line 175
        echo "    <div style=\"float:right;\" class=\"grid_massactions\">
        ";
        // line 176
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Action"), "html", null, true);
        echo "
        <input type=\"hidden\" id=\"";
        // line 177
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_mass_action_all\" name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, twig_constant("APY\\DataGridBundle\\Grid\\Grid::REQUEST_QUERY_MASS_ACTION_ALL_KEYS_SELECTED"), "html", null, true);
        echo "]\" value=\"0\"/>
        <select name=\"";
        // line 178
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, twig_constant("APY\\DataGridBundle\\Grid\\Grid::REQUEST_QUERY_MASS_ACTION"), "html", null, true);
        echo "]\">
            <option value=\"-1\"></option>
            ";
        // line 180
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "grid"), "massActions"));
        foreach ($context['_seq'] as $context["key"] => $context["massAction"]) {
            // line 181
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "massAction"), "title")), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['massAction'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 183
        echo "        </select>
        <input type=\"submit\"  value=\"";
        // line 184
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Submit Action"), "html", null, true);
        echo "\"/>
    </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 187
        echo "</div>
";
    }

    // line 190
    public function block_grid_exports($context, array $blocks = array())
    {
        // line 191
        echo "<div class=\"exports\" style=\"float:right\">
    ";
        // line 192
        ob_start();
        // line 193
        echo "        ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Export"), "html", null, true);
        echo "
            <select name=\"";
        // line 194
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, twig_constant("APY\\DataGridBundle\\Grid\\Grid::REQUEST_QUERY_EXPORT"), "html", null, true);
        echo "]\">
            <option value=\"-1\"></option>
            ";
        // line 196
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "grid"), "exports"));
        foreach ($context['_seq'] as $context["key"] => $context["export"]) {
            // line 197
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "export"), "title")), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['export'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 199
        echo "        </select>
        <input type=\"submit\" value=\"";
        // line 200
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Export"), "html", null, true);
        echo "\"/>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 202
        echo "</div>
";
    }

    // line 205
    public function block_grid_tweaks($context, array $blocks = array())
    {
        // line 206
        echo "<div class=\"tweaks\" style=\"float:right\">
    ";
        // line 207
        ob_start();
        // line 208
        echo "        ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tweaks"), "html", null, true);
        echo "
            <select name=\"";
        // line 209
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, twig_constant("APY\\DataGridBundle\\Grid\\Grid::REQUEST_QUERY_TWEAK"), "html", null, true);
        echo "]\">
            <option value=\"-1\"></option>
            ";
        // line 211
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "grid"), "tweaks"));
        foreach ($context['_seq'] as $context["key"] => $context["tweak"]) {
            // line 212
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "tweak"), "title")), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['tweak'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 214
        echo "        </select>
        <input type=\"submit\" value=\"";
        // line 215
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tweak"), "html", null, true);
        echo "\"/>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 217
        echo "</div>
";
    }

    // line 220
    public function block_grid_column_actions_cell($context, array $blocks = array())
    {
        // line 221
        echo "    ";
        $context["actions"] = $this->getAttribute($this->getContext($context, "column"), "getActionsToRender", array(0 => $this->getContext($context, "row")), "method");
        // line 222
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "actions"));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 223
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl($this->getAttribute($this->getContext($context, "action"), "route"), $this->getAttribute($this->getContext($context, "column"), "routeParameters", array(0 => $this->getContext($context, "row"), 1 => $this->getContext($context, "action")), "method"), false), "html", null, true);
            echo "\" target=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "target"), "html", null, true);
            echo "\"";
            if ($this->getAttribute($this->getContext($context, "action"), "confirm")) {
                echo " onclick=\"return confirm('";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "confirmMessage"), "html", null, true);
                echo "')\"";
            }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "action"), "attributes"));
            foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
                echo "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            echo ">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "action"), "title")), "html", null, true);
            echo "</a>";
            echo $this->getAttribute($this->getContext($context, "column"), "separator");
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    // line 227
    public function block_grid_column_massaction_cell($context, array $blocks = array())
    {
        // line 228
        echo "    <input type=\"checkbox\" class=\"action\" value=\"1\" name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
        echo "][";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "row"), "primaryFieldValue"), "html", null, true);
        echo "]\"/>
";
    }

    // line 231
    public function block_grid_column_boolean_cell($context, array $blocks = array())
    {
        // line 232
        echo "    ";
        $context["value"] = ((($this->getContext($context, "value") === false)) ? ("false") : ($this->getContext($context, "value")));
        // line 233
        echo "    <span class=\"grid_boolean_";
        echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
        echo "\">";
        $this->displayBlock("grid_column_cell", $context, $blocks);
        echo "</span>
";
    }

    // line 236
    public function block_grid_column_array_cell($context, array $blocks = array())
    {
        // line 237
        $context["sourceValues"] = $this->getAttribute($this->getContext($context, "row"), "field", array(0 => $this->getAttribute($this->getContext($context, "column"), "id")), "method");
        // line 238
        $context["values"] = $this->getContext($context, "value");
        // line 239
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "values"));
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
        foreach ($context['_seq'] as $context["key"] => $context["index"]) {
            // line 240
            $context["value"] = $this->getContext($context, "index");
            // line 241
            echo "    ";
            $context["sourceValue"] = $this->getAttribute($this->getContext($context, "sourceValues"), $this->getContext($context, "key"), array(), "array");
            // line 242
            echo "    ";
            $this->displayBlock("grid_column_cell", $context, $blocks);
            echo $this->getAttribute($this->getContext($context, "column"), "separator");
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['index'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    // line 246
    public function block_grid_column_cell($context, array $blocks = array())
    {
        // line 247
        if (($this->getAttribute($this->getContext($context, "column"), "filterable") && $this->getAttribute($this->getContext($context, "column"), "searchOnClick"))) {
            // line 248
            echo "    ";
            $context["sourceValue"] = ((array_key_exists("sourceValue", $context)) ? ($this->getContext($context, "sourceValue")) : ($this->getAttribute($this->getContext($context, "row"), "field", array(0 => $this->getAttribute($this->getContext($context, "column"), "id")), "method")));
            // line 249
            echo "    <a href=\"?";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
            echo "][from]=";
            echo twig_escape_filter($this->env, twig_urlencode_filter($this->getContext($context, "sourceValue")), "html", null, true);
            echo "\" class=\"searchOnClick\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
            echo "</a>
";
        } elseif (($this->getAttribute($this->getContext($context, "column"), "safe") === false)) {
            // line 251
            echo "    ";
            echo $this->getContext($context, "value");
            echo "
";
        } else {
            // line 253
            echo "    ";
            echo twig_escape_filter($this->env, $this->getContext($context, "value"), $this->getAttribute($this->getContext($context, "column"), "safe"));
            echo "
";
        }
    }

    // line 257
    public function block_grid_column_operator($context, array $blocks = array())
    {
        // line 258
        if ($this->getAttribute($this->getContext($context, "column"), "operatorsVisible")) {
            // line 259
            echo "<span class=\"grid-filter-operator\">
    <select name=\"";
            // line 260
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
            echo "][operator]\" onchange=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "_switchOperator(this, '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "__";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
            echo "__query__'";
            if (($this->getContext($context, "submitOnChange") === false)) {
                echo ", false";
            }
            echo ");\">
    ";
            // line 261
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "column"), "operators"));
            foreach ($context['_seq'] as $context["_key"] => $context["operator"]) {
                // line 262
                echo "        <option value=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "operator"), "html", null, true);
                echo "\"";
                if (($this->getContext($context, "op") == $this->getContext($context, "operator"))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "operator")), "html", null, true);
                echo "</option>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['operator'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 264
            echo "    </select>
</span>
";
        }
    }

    // line 269
    public function block_grid_column_filter_type_input($context, array $blocks = array())
    {
        // line 270
        $context["btwOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTW");
        // line 271
        $context["btweOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTWE");
        // line 272
        $context["isNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNULL");
        // line 273
        $context["isNotNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNOTNULL");
        // line 274
        $context["op"] = (($this->getAttribute($this->getAttribute($this->getContext($context, "column", true), "data", array(), "any", false, true), "operator", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "column"), "data"), "operator")) : ($this->getAttribute($this->getContext($context, "column"), "defaultOperator")));
        // line 275
        $context["from"] = (($this->getAttribute($this->getAttribute($this->getContext($context, "column", true), "data", array(), "any", false, true), "from", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "column"), "data"), "from")) : (null));
        // line 276
        $context["to"] = (($this->getAttribute($this->getAttribute($this->getContext($context, "column", true), "data", array(), "any", false, true), "to", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "column"), "data"), "to")) : (null));
        // line 277
        echo "<span class=\"grid-filter-input\">
    ";
        // line 278
        $this->displayBlock("grid_column_operator", $context, $blocks);
        echo "
    <span class=\"grid-filter-input-query\">
        <input type=\"";
        // line 280
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "inputType"), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "from"), "html", null, true);
        echo "\" class=\"grid-filter-input-query-from\" name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
        echo "][from]\" id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "__";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
        echo "__query__from\" ";
        if (($this->getContext($context, "submitOnChange") === true)) {
            echo "onkeypress=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "_submitForm(event, this.form);\"";
        }
        echo " ";
        echo (((($this->getContext($context, "op") == $this->getContext($context, "isNullOperator")) || ($this->getContext($context, "op") == $this->getContext($context, "isNotNullOperator")))) ? ("style=\"display: none;\" disabled=\"disabled\"") : (""));
        echo " />
        <input type=\"";
        // line 281
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "inputType"), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "to"), "html", null, true);
        echo "\" class=\"grid-filter-input-query-to\" name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
        echo "][to]\" id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "__";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
        echo "__query__to\" ";
        if (($this->getContext($context, "submitOnChange") === true)) {
            echo "onkeypress=\"return ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "_submitForm(event, this.form);\"";
        }
        echo " ";
        echo (((($this->getContext($context, "op") == $this->getContext($context, "btwOperator")) || ($this->getContext($context, "op") == $this->getContext($context, "btweOperator")))) ? ("") : ("style=\"display: none;\" disabled=\"disabled\""));
        echo " />
    </span>
</span>
";
    }

    // line 286
    public function block_grid_column_filter_type_select($context, array $blocks = array())
    {
        // line 287
        $context["btwOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTW");
        // line 288
        $context["btweOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTWE");
        // line 289
        $context["isNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNULL");
        // line 290
        $context["isNotNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNOTNULL");
        // line 291
        $context["op"] = (($this->getAttribute($this->getAttribute($this->getContext($context, "column", true), "data", array(), "any", false, true), "operator", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "column"), "data"), "operator")) : ($this->getAttribute($this->getContext($context, "column"), "defaultOperator")));
        // line 292
        $context["from"] = (($this->getAttribute($this->getAttribute($this->getContext($context, "column", true), "data", array(), "any", false, true), "from", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "column"), "data"), "from")) : (null));
        // line 293
        $context["to"] = (($this->getAttribute($this->getAttribute($this->getContext($context, "column", true), "data", array(), "any", false, true), "to", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "column"), "data"), "to")) : (null));
        // line 294
        $context["multiple"] = $this->getAttribute($this->getContext($context, "column"), "selectMulti");
        // line 295
        $context["expanded"] = $this->getAttribute($this->getContext($context, "column"), "selectExpanded");
        // line 296
        echo "<span class=\"grid-filter-select\">
    ";
        // line 297
        $this->displayBlock("grid_column_operator", $context, $blocks);
        echo "
    <span class=\"grid-filter-select-query\">
    ";
        // line 299
        if ($this->getContext($context, "expanded")) {
            // line 300
            echo "        <span class=\"grid-filter-select-query-from\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "__";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
            echo "__query__from\" ";
            echo (((($this->getContext($context, "op") == $this->getContext($context, "isNullOperator")) || ($this->getContext($context, "op") == $this->getContext($context, "isNotNullOperator")))) ? ("style=\"display: none;\" disabled=\"disabled\"") : (""));
            echo ">
        ";
            // line 301
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "column"), "values"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 302
                echo "            <span><input type=\"";
                if ($this->getContext($context, "multiple")) {
                    echo "checkbox";
                } else {
                    echo "radio";
                }
                echo "\" name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
                echo "[";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
                echo "][from][]\" value=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                echo "\" ";
                if (twig_in_filter($this->getContext($context, "key"), $this->getContext($context, "from"))) {
                    echo " checked=\"checked\"";
                }
                echo " ";
                if (($this->getContext($context, "submitOnChange") === true)) {
                    echo "onclick=\"return ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
                    echo "_submitForm(event, this.form);\"";
                }
                echo "/><label>";
                echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
                echo "</label></span>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 304
            echo "        </span>
        <span class=\"grid-filter-select-query-to\" id=\"";
            // line 305
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "__";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
            echo "__query__to\" ";
            echo (((($this->getContext($context, "op") == $this->getContext($context, "btwOperator")) || ($this->getContext($context, "op") == $this->getContext($context, "btweOperator")))) ? ("") : ("style=\"display: none;\" disabled=\"disabled\""));
            echo ">
        ";
            // line 306
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "column"), "values"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 307
                echo "            <span><input type=\"";
                if ($this->getContext($context, "multiple")) {
                    echo "checkbox";
                } else {
                    echo "radio";
                }
                echo "\" name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
                echo "[";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
                echo "][to]\" value=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                echo "\" ";
                if (((!(null === $this->getContext($context, "to"))) && ($this->getContext($context, "to") == $this->getContext($context, "key")))) {
                    echo " checked=\"checked\"";
                }
                echo " ";
                if (($this->getContext($context, "submitOnChange") === true)) {
                    echo "onclick=\"return ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
                    echo "_submitForm(event, this.form);\"";
                }
                echo "/><label>";
                echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
                echo "</label></span>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 309
            echo "        </span>
        ";
            // line 310
            if ($this->getContext($context, "multiple")) {
                echo "<input type=\"submit\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Go"), "html", null, true);
                echo "\" />";
            }
            // line 311
            echo "    ";
        } else {
            // line 312
            echo "        <select";
            if ($this->getContext($context, "multiple")) {
                echo " multiple=\"multiple\"";
            }
            echo " name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
            echo "][from][]\" class=\"grid-filter-select-query-from\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "__";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
            echo "__query__from\" ";
            if (($this->getContext($context, "submitOnChange") === true)) {
                echo "onchange=\"return ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
                echo "_submitForm(event, this.form);\"";
            }
            echo " ";
            echo (((($this->getContext($context, "op") == $this->getContext($context, "isNullOperator")) || ($this->getContext($context, "op") == $this->getContext($context, "isNotNullOperator")))) ? ("style=\"display: none;\" disabled=\"disabled\"") : (""));
            echo ">
            <option value=\"\">&nbsp;</option>
            ";
            // line 314
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "column"), "values"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 315
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                echo "\"";
                if (twig_in_filter($this->getContext($context, "key"), $this->getContext($context, "from"))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
                echo "</option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 317
            echo "        </select>
        <select name=\"";
            // line 318
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
            echo "][to]\" class=\"grid-filter-select-query-to\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
            echo "__";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "column"), "id"), "html", null, true);
            echo "__query__to\" ";
            if (($this->getContext($context, "submitOnChange") === true)) {
                echo "onchange=\"return ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
                echo "_submitForm(event, this.form);\"";
            }
            echo " ";
            echo (((($this->getContext($context, "op") == $this->getContext($context, "btwOperator")) || ($this->getContext($context, "op") == $this->getContext($context, "btweOperator")))) ? ("") : ("style=\"display: none;\" disabled=\"disabled\""));
            echo ">
            <option value=\"\">&nbsp;</option>
            ";
            // line 320
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "column"), "values"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 321
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                echo "\"";
                if (((!(null === $this->getContext($context, "to"))) && ($this->getContext($context, "to") == $this->getContext($context, "key")))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
                echo "</option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 323
            echo "        </select>
        ";
            // line 324
            if ($this->getContext($context, "multiple")) {
                echo "<input type=\"submit\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Go"), "html", null, true);
                echo "\" />";
            }
            // line 325
            echo "    ";
        }
        // line 326
        echo "    </span>
</span>
";
    }

    // line 330
    public function block_grid_column_filter_type_massaction($context, array $blocks = array())
    {
        // line 331
        echo "    <input type=\"button\" class=\"grid-search-reset\" value=\"R\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reset"), "html", null, true);
        echo "\" onclick=\"return ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_reset();\"/>
";
    }

    // line 334
    public function block_grid_column_filter_type_actions($context, array $blocks = array())
    {
        // line 335
        echo "    <a class=\"grid-reset\" href=\"";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("reset", $this->getContext($context, "grid"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reset"), "html", null, true);
        echo "</a>
";
    }

    // line 341
    public function block_grid_scripts($context, array $blocks = array())
    {
        // line 342
        echo "<script type=\"text/javascript\">
";
        // line 343
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_goto", $this->getContext($context, "grid"));
        echo "
";
        // line 344
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_reset", $this->getContext($context, "grid"));
        echo "
";
        // line 345
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_previous_page", $this->getContext($context, "grid"));
        echo "
";
        // line 346
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_next_page", $this->getContext($context, "grid"));
        echo "
";
        // line 347
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_enter_page", $this->getContext($context, "grid"));
        echo "
";
        // line 348
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_results_per_page", $this->getContext($context, "grid"));
        echo "
";
        // line 349
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_mark_visible", $this->getContext($context, "grid"));
        echo "
";
        // line 350
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_mark_all", $this->getContext($context, "grid"));
        echo "
";
        // line 351
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_switch_operator", $this->getContext($context, "grid"));
        echo "
";
        // line 352
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_submit_form", $this->getContext($context, "grid"));
        echo "
";
        // line 353
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid_("scripts_ajax", $this->getContext($context, "grid"));
        echo "
</script>
";
    }

    // line 357
    public function block_grid_scripts_goto($context, array $blocks = array())
    {
        // line 358
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_goto(url)
{
    window.location.href = url;

    return false;
}
";
    }

    // line 366
    public function block_grid_scripts_reset($context, array $blocks = array())
    {
        // line 367
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_reset()
{
    ";
        // line 369
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_goto('";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("reset", $this->getContext($context, "grid"));
        echo "');

    return false;
}
";
    }

    // line 375
    public function block_grid_scripts_previous_page($context, array $blocks = array())
    {
        // line 376
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_previousPage()
{
    ";
        // line 378
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_goto('";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("page", $this->getContext($context, "grid"), ($this->getAttribute($this->getContext($context, "grid"), "page") - 1));
        echo "');

    return false;
}
";
    }

    // line 384
    public function block_grid_scripts_next_page($context, array $blocks = array())
    {
        // line 385
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_nextPage()
{
    ";
        // line 387
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_goto('";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("page", $this->getContext($context, "grid"), ($this->getAttribute($this->getContext($context, "grid"), "page") + 1));
        echo "');

    return false;
}
";
    }

    // line 393
    public function block_grid_scripts_enter_page($context, array $blocks = array())
    {
        // line 394
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_enterPage(event, page)
{
    key = event.which;

    if (window.event) {
        key = window.event.keyCode; //IE
    }

    if (key == 13) {
        ";
        // line 403
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_goto('";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("page", $this->getContext($context, "grid"));
        echo "' + page);

        return false;
    }
}
";
    }

    // line 410
    public function block_grid_scripts_results_per_page($context, array $blocks = array())
    {
        // line 411
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_resultsPerPage(limit)
{
    ";
        // line 413
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_goto('";
        echo $this->env->getExtension('datagrid_twig_extension')->getGridUrl("limit", $this->getContext($context, "grid"));
        echo "' + limit);

    return true;
}
";
    }

    // line 419
    public function block_grid_scripts_mark_visible($context, array $blocks = array())
    {
        // line 420
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_markVisible(select)
{
    var form = document.getElementById('";
        // line 422
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "');

    var counter = 0;

    for (var i=0; i < form.elements.length; i++ ) {
        if (form.elements[i].type == 'checkbox') {
            form.elements[i].checked = select;

            if (form.elements[i].checked){
               counter++;
            }
        }
    }

    ";
        // line 436
        if ($this->getAttribute($this->getContext($context, "grid"), "isFilterSectionVisible")) {
            // line 437
            echo "    counter--;
    ";
        }
        // line 439
        echo "
    var selected = document.getElementById('";
        // line 440
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_mass_action_selected');
    selected.innerHTML = counter > 0 ? '";
        // line 441
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Selected _s_ rows"), "html", null, true);
        echo "'.replace('_s_', counter) : '';

    document.getElementById('";
        // line 443
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_mass_action_all').value = '0';

    return false;
}
";
    }

    // line 449
    public function block_grid_scripts_mark_all($context, array $blocks = array())
    {
        // line 450
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_markAll(select)
{
    var form = document.getElementById('";
        // line 452
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "');

    for (var i=0; i < form.elements.length; i++ ) {
        if (form.elements[i].type == 'checkbox') {
            form.elements[i].checked = select;
        }
    }

    var selected = document.getElementById('";
        // line 460
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_mass_action_selected');

    if (select) {
        document.getElementById('";
        // line 463
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_mass_action_all').value = '1';
        selected.innerHTML = '";
        // line 464
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Selected _s_ rows"), "html", null, true);
        echo "'.replace('_s_', '";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "totalCount"), "html", null, true);
        echo "');
    } else {
        document.getElementById('";
        // line 466
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_mass_action_all').value = '0';
        selected.innerHTML = '';
    }

    return false;
}
";
    }

    // line 474
    public function block_grid_scripts_switch_operator($context, array $blocks = array())
    {
        // line 475
        $context["btwOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTW");
        // line 476
        $context["btweOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_BTWE");
        // line 477
        $context["isNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNULL");
        // line 478
        $context["isNotNullOperator"] = twig_constant("APY\\DataGridBundle\\Grid\\Column\\Column::OPERATOR_ISNOTNULL");
        // line 479
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_switchOperator(elt, query_, submitOnChange)
{
\tsubmitOnChange = (typeof submitOnChange == 'undefined') ? true : submitOnChange;
    var inputFrom = document.getElementById(query_+'from');
    var inputTo = document.getElementById(query_+'to');
    if ((elt.options[elt.selectedIndex].value == '";
        // line 484
        echo twig_escape_filter($this->env, $this->getContext($context, "btwOperator"), "html", null, true);
        echo "') || (elt.options[elt.selectedIndex].value == '";
        echo twig_escape_filter($this->env, $this->getContext($context, "btweOperator"), "html", null, true);
        echo "')) {
        inputFrom.style.display = '';
        inputFrom.disabled=false;
        inputTo.style.display = '';
        inputTo.disabled=false;
    } else if ((elt.options[elt.selectedIndex].value == '";
        // line 489
        echo twig_escape_filter($this->env, $this->getContext($context, "isNullOperator"), "html", null, true);
        echo "') || (elt.options[elt.selectedIndex].value == '";
        echo twig_escape_filter($this->env, $this->getContext($context, "isNotNullOperator"), "html", null, true);
        echo "')) {
        inputFrom.style.display = 'none';
        inputFrom.disabled=true;
        inputTo.style.display = 'none';
        inputTo.disabled=true;
        if (submitOnChange) {
            elt.form.submit();
        }
    } else {
        inputFrom.style.display = '';
        inputFrom.disabled=false;
        inputTo.style.display = 'none';
        inputTo.disabled=true;
    }
}
";
    }

    // line 506
    public function block_grid_scripts_submit_form($context, array $blocks = array())
    {
        // line 507
        echo "function ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "grid"), "hash"), "html", null, true);
        echo "_submitForm(event, form)
{
    key = event.which;

    if (window.event) {
        key = window.event.keyCode; //IE
    }

    if (event.type != 'keypress' || key == 13) {
        form.submit();
    }

    return true;
}
";
    }

    // line 523
    public function block_grid_scripts_ajax($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "APYDataGridBundle::blocks.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  1887 => 523,  1867 => 507,  1864 => 506,  1842 => 489,  1832 => 484,  1823 => 479,  1821 => 478,  1819 => 477,  1817 => 476,  1815 => 475,  1812 => 474,  1801 => 466,  1794 => 464,  1790 => 463,  1784 => 460,  1773 => 452,  1767 => 450,  1764 => 449,  1755 => 443,  1750 => 441,  1746 => 440,  1743 => 439,  1739 => 437,  1737 => 436,  1720 => 422,  1714 => 420,  1711 => 419,  1700 => 413,  1694 => 411,  1691 => 410,  1679 => 403,  1666 => 394,  1663 => 393,  1652 => 387,  1646 => 385,  1643 => 384,  1632 => 378,  1626 => 376,  1623 => 375,  1612 => 369,  1606 => 367,  1603 => 366,  1591 => 358,  1588 => 357,  1581 => 353,  1577 => 352,  1573 => 351,  1569 => 350,  1565 => 349,  1561 => 348,  1557 => 347,  1553 => 346,  1549 => 345,  1545 => 344,  1541 => 343,  1538 => 342,  1535 => 341,  1526 => 335,  1523 => 334,  1514 => 331,  1511 => 330,  1505 => 326,  1502 => 325,  1496 => 324,  1493 => 323,  1478 => 321,  1474 => 320,  1455 => 318,  1452 => 317,  1437 => 315,  1433 => 314,  1409 => 312,  1406 => 311,  1400 => 310,  1397 => 309,  1366 => 307,  1362 => 306,  1354 => 305,  1351 => 304,  1320 => 302,  1316 => 301,  1307 => 300,  1305 => 299,  1300 => 297,  1297 => 296,  1295 => 295,  1293 => 294,  1291 => 293,  1289 => 292,  1287 => 291,  1285 => 290,  1283 => 289,  1281 => 288,  1279 => 287,  1276 => 286,  1250 => 281,  1228 => 280,  1223 => 278,  1220 => 277,  1218 => 276,  1216 => 275,  1214 => 274,  1212 => 273,  1210 => 272,  1208 => 271,  1206 => 270,  1203 => 269,  1196 => 264,  1181 => 262,  1177 => 261,  1161 => 260,  1158 => 259,  1156 => 258,  1153 => 257,  1145 => 253,  1139 => 251,  1127 => 249,  1124 => 248,  1122 => 247,  1119 => 246,  1101 => 242,  1098 => 241,  1096 => 240,  1079 => 239,  1077 => 238,  1075 => 237,  1072 => 236,  1061 => 233,  1058 => 232,  1055 => 231,  1044 => 228,  1041 => 227,  1006 => 223,  1001 => 222,  998 => 221,  995 => 220,  990 => 217,  985 => 215,  982 => 214,  971 => 212,  967 => 211,  960 => 209,  955 => 208,  953 => 207,  950 => 206,  947 => 205,  942 => 202,  937 => 200,  934 => 199,  923 => 197,  919 => 196,  912 => 194,  907 => 193,  905 => 192,  902 => 191,  899 => 190,  894 => 187,  888 => 184,  885 => 183,  874 => 181,  870 => 180,  863 => 178,  855 => 177,  851 => 176,  848 => 175,  846 => 174,  841 => 172,  835 => 171,  829 => 170,  823 => 169,  817 => 168,  813 => 166,  810 => 165,  803 => 162,  788 => 160,  784 => 159,  780 => 158,  776 => 157,  773 => 156,  760 => 152,  754 => 151,  745 => 150,  743 => 149,  739 => 148,  736 => 147,  730 => 144,  727 => 143,  719 => 138,  715 => 137,  711 => 136,  708 => 135,  702 => 133,  699 => 132,  696 => 131,  685 => 127,  671 => 125,  668 => 124,  654 => 123,  636 => 121,  633 => 120,  616 => 119,  605 => 118,  602 => 117,  599 => 116,  580 => 115,  577 => 114,  563 => 108,  549 => 107,  539 => 105,  536 => 104,  533 => 103,  516 => 102,  510 => 101,  507 => 100,  505 => 99,  502 => 98,  497 => 95,  483 => 94,  466 => 92,  463 => 91,  446 => 90,  443 => 89,  440 => 88,  435 => 85,  421 => 84,  417 => 82,  414 => 81,  408 => 79,  405 => 78,  401 => 76,  397 => 74,  395 => 73,  384 => 72,  381 => 71,  378 => 70,  375 => 69,  372 => 68,  369 => 67,  363 => 65,  361 => 64,  344 => 63,  341 => 62,  324 => 61,  321 => 60,  318 => 59,  308 => 54,  305 => 53,  298 => 51,  295 => 50,  292 => 49,  288 => 48,  286 => 47,  284 => 46,  281 => 45,  273 => 43,  268 => 40,  262 => 38,  258 => 36,  252 => 34,  250 => 33,  247 => 32,  241 => 30,  238 => 29,  232 => 27,  229 => 26,  223 => 24,  221 => 23,  213 => 19,  207 => 17,  204 => 16,  198 => 14,  196 => 13,  191 => 10,  185 => 8,  183 => 7,  175 => 5,  173 => 4,  170 => 3,  167 => 2,  163 => 523,  160 => 522,  158 => 506,  155 => 505,  153 => 474,  150 => 473,  148 => 449,  145 => 448,  143 => 419,  140 => 418,  138 => 410,  135 => 409,  133 => 393,  130 => 392,  128 => 384,  125 => 383,  123 => 375,  120 => 374,  115 => 365,  110 => 356,  108 => 341,  103 => 337,  101 => 334,  99 => 330,  97 => 286,  95 => 269,  93 => 257,  91 => 246,  87 => 231,  85 => 227,  83 => 220,  81 => 205,  79 => 190,  77 => 165,  75 => 156,  73 => 147,  71 => 143,  69 => 131,  67 => 114,  65 => 98,  63 => 88,  61 => 59,  59 => 45,  57 => 43,  53 => 13,  50 => 12,  40 => 8,  33 => 5,  30 => 4,  118 => 366,  113 => 357,  107 => 5,  98 => 37,  94 => 35,  89 => 236,  86 => 33,  84 => 32,  74 => 25,  70 => 24,  60 => 17,  55 => 2,  51 => 14,  47 => 13,  43 => 9,  32 => 6,  22 => 1,  34 => 7,  31 => 4,  28 => 5,);
    }
}
