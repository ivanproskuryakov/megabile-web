<?php

/* knp_menu.html.twig */
class __TwigTemplate_e10639f2b24bb04b2d7e975d22cfef38 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'compressed_root' => array($this, 'block_compressed_root'),
            'root' => array($this, 'block_root'),
            'list' => array($this, 'block_list'),
            'children' => array($this, 'block_children'),
            'item' => array($this, 'block_item'),
            'linkElement' => array($this, 'block_linkElement'),
            'spanElement' => array($this, 'block_spanElement'),
            'label' => array($this, 'block_label'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('compressed_root', $context, $blocks);
        // line 14
        echo "
";
        // line 15
        $this->displayBlock('root', $context, $blocks);
        // line 19
        echo "
";
        // line 20
        $this->displayBlock('list', $context, $blocks);
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('children', $context, $blocks);
        // line 44
        echo "
";
        // line 45
        $this->displayBlock('item', $context, $blocks);
        // line 80
        echo "
";
        // line 81
        $this->displayBlock('linkElement', $context, $blocks);
        // line 82
        echo "
";
        // line 83
        $this->displayBlock('spanElement', $context, $blocks);
        // line 84
        echo "
";
        // line 85
        $this->displayBlock('label', $context, $blocks);
    }

    // line 9
    public function block_compressed_root($context, array $blocks = array())
    {
        // line 10
        ob_start();
        // line 11
        $this->displayBlock("root", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 15
    public function block_root($context, array $blocks = array())
    {
        // line 16
        $context["listAttributes"] = $this->getAttribute($this->getContext($context, "item"), "childrenAttributes");
        // line 17
        $this->displayBlock("list", $context, $blocks);
    }

    // line 20
    public function block_list($context, array $blocks = array())
    {
        // line 21
        if ((($this->getAttribute($this->getContext($context, "item"), "hasChildren") && (!($this->getAttribute($this->getContext($context, "options"), "depth") === 0))) && $this->getAttribute($this->getContext($context, "item"), "displayChildren"))) {
            // line 22
            echo "    ";
            $context["knp_menu"] = $this;
            // line 23
            echo "    <ul";
            echo $context["knp_menu"]->getattributes($this->getContext($context, "listAttributes"));
            echo ">
        ";
            // line 24
            $this->displayBlock("children", $context, $blocks);
            echo "
    </ul>
";
        }
    }

    // line 29
    public function block_children($context, array $blocks = array())
    {
        // line 31
        $context["currentOptions"] = $this->getContext($context, "options");
        // line 32
        $context["currentItem"] = $this->getContext($context, "item");
        // line 34
        if ((!(null === $this->getAttribute($this->getContext($context, "options"), "depth")))) {
            // line 35
            $context["options"] = twig_array_merge($this->getContext($context, "currentOptions"), array("depth" => ($this->getAttribute($this->getContext($context, "currentOptions"), "depth") - 1)));
        }
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "currentItem"), "children"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 38
            echo "    ";
            $this->displayBlock("item", $context, $blocks);
            echo "
";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 41
        $context["item"] = $this->getContext($context, "currentItem");
        // line 42
        $context["options"] = $this->getContext($context, "currentOptions");
    }

    // line 45
    public function block_item($context, array $blocks = array())
    {
        // line 46
        if ($this->getAttribute($this->getContext($context, "item"), "displayed")) {
            // line 48
            $context["classes"] = (((!twig_test_empty($this->getAttribute($this->getContext($context, "item"), "attribute", array(0 => "class"), "method")))) ? (array(0 => $this->getAttribute($this->getContext($context, "item"), "attribute", array(0 => "class"), "method"))) : (array()));
            // line 49
            if ($this->getAttribute($this->getContext($context, "matcher"), "isCurrent", array(0 => $this->getContext($context, "item")), "method")) {
                // line 50
                $context["classes"] = twig_array_merge($this->getContext($context, "classes"), array(0 => $this->getAttribute($this->getContext($context, "options"), "currentClass")));
            } elseif ($this->getAttribute($this->getContext($context, "matcher"), "isAncestor", array(0 => $this->getContext($context, "item"), 1 => $this->getAttribute($this->getContext($context, "options"), "depth")), "method")) {
                // line 52
                $context["classes"] = twig_array_merge($this->getContext($context, "classes"), array(0 => $this->getAttribute($this->getContext($context, "options"), "ancestorClass")));
            }
            // line 54
            if ($this->getAttribute($this->getContext($context, "item"), "actsLikeFirst")) {
                // line 55
                $context["classes"] = twig_array_merge($this->getContext($context, "classes"), array(0 => $this->getAttribute($this->getContext($context, "options"), "firstClass")));
            }
            // line 57
            if ($this->getAttribute($this->getContext($context, "item"), "actsLikeLast")) {
                // line 58
                $context["classes"] = twig_array_merge($this->getContext($context, "classes"), array(0 => $this->getAttribute($this->getContext($context, "options"), "lastClass")));
            }
            // line 60
            $context["attributes"] = $this->getAttribute($this->getContext($context, "item"), "attributes");
            // line 61
            if ((!twig_test_empty($this->getContext($context, "classes")))) {
                // line 62
                $context["attributes"] = twig_array_merge($this->getContext($context, "attributes"), array("class" => twig_join_filter($this->getContext($context, "classes"), " ")));
            }
            // line 65
            echo "    ";
            $context["knp_menu"] = $this;
            // line 66
            echo "    <li";
            echo $context["knp_menu"]->getattributes($this->getContext($context, "attributes"));
            echo ">";
            // line 67
            if (((!twig_test_empty($this->getAttribute($this->getContext($context, "item"), "uri"))) && ((!$this->getAttribute($this->getContext($context, "matcher"), "isCurrent", array(0 => $this->getContext($context, "item")), "method")) || $this->getAttribute($this->getContext($context, "options"), "currentAsLink")))) {
                // line 68
                echo "        ";
                $this->displayBlock("linkElement", $context, $blocks);
            } else {
                // line 70
                echo "        ";
                $this->displayBlock("spanElement", $context, $blocks);
            }
            // line 73
            $context["childrenClasses"] = (((!twig_test_empty($this->getAttribute($this->getContext($context, "item"), "childrenAttribute", array(0 => "class"), "method")))) ? (array(0 => $this->getAttribute($this->getContext($context, "item"), "childrenAttribute", array(0 => "class"), "method"))) : (array()));
            // line 74
            $context["childrenClasses"] = twig_array_merge($this->getContext($context, "childrenClasses"), array(0 => ("menu_level_" . $this->getAttribute($this->getContext($context, "item"), "level"))));
            // line 75
            $context["listAttributes"] = twig_array_merge($this->getAttribute($this->getContext($context, "item"), "childrenAttributes"), array("class" => twig_join_filter($this->getContext($context, "childrenClasses"), " ")));
            // line 76
            echo "        ";
            $this->displayBlock("list", $context, $blocks);
            echo "
    </li>
";
        }
    }

    // line 81
    public function block_linkElement($context, array $blocks = array())
    {
        $context["knp_menu"] = $this;
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "uri"), "html", null, true);
        echo "\"";
        echo $context["knp_menu"]->getattributes($this->getAttribute($this->getContext($context, "item"), "linkAttributes"));
        echo ">";
        $this->displayBlock("label", $context, $blocks);
        echo "</a>";
    }

    // line 83
    public function block_spanElement($context, array $blocks = array())
    {
        $context["knp_menu"] = $this;
        echo "<span";
        echo $context["knp_menu"]->getattributes($this->getAttribute($this->getContext($context, "item"), "labelAttributes"));
        echo ">";
        $this->displayBlock("label", $context, $blocks);
        echo "</span>";
    }

    // line 85
    public function block_label($context, array $blocks = array())
    {
        if (($this->getAttribute($this->getContext($context, "options"), "allow_safe_labels") && $this->getAttribute($this->getContext($context, "item"), "getExtra", array(0 => "safe_label", 1 => false), "method"))) {
            echo $this->getAttribute($this->getContext($context, "item"), "label");
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "label"), "html", null, true);
        }
    }

    // line 1
    public function getattributes($_attributes = null)
    {
        $context = $this->env->mergeGlobals(array(
            "attributes" => $_attributes,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "attributes"));
            foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                // line 3
                if (((!(null === $this->getContext($context, "value"))) && (!($this->getContext($context, "value") === false)))) {
                    // line 4
                    echo sprintf(" %s=\"%s\"", $this->getContext($context, "name"), ((($this->getContext($context, "value") === true)) ? (twig_escape_filter($this->env, $this->getContext($context, "name"))) : (twig_escape_filter($this->env, $this->getContext($context, "value")))));
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "knp_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 4,  276 => 3,  272 => 2,  261 => 1,  251 => 85,  240 => 83,  227 => 81,  218 => 76,  216 => 75,  214 => 74,  212 => 73,  204 => 68,  202 => 67,  198 => 66,  195 => 65,  192 => 62,  190 => 61,  188 => 60,  185 => 58,  183 => 57,  180 => 55,  178 => 54,  175 => 52,  172 => 50,  170 => 49,  168 => 48,  166 => 46,  163 => 45,  159 => 42,  140 => 38,  120 => 35,  118 => 34,  116 => 32,  111 => 29,  103 => 24,  98 => 23,  93 => 21,  90 => 20,  86 => 17,  84 => 16,  72 => 10,  57 => 82,  52 => 80,  45 => 29,  42 => 28,  40 => 20,  37 => 19,  27 => 8,  80 => 3,  74 => 11,  60 => 83,  56 => 14,  51 => 12,  47 => 44,  43 => 10,  30 => 9,  24 => 2,  242 => 65,  237 => 60,  230 => 125,  228 => 124,  223 => 121,  215 => 117,  208 => 70,  194 => 101,  157 => 41,  155 => 65,  147 => 60,  143 => 58,  138 => 57,  135 => 56,  133 => 55,  123 => 37,  114 => 31,  108 => 42,  104 => 40,  97 => 36,  85 => 30,  81 => 15,  75 => 28,  69 => 9,  65 => 85,  63 => 22,  59 => 20,  53 => 17,  50 => 45,  44 => 13,  39 => 9,  34 => 9,  26 => 4,  21 => 1,  35 => 15,  32 => 14,  29 => 3,  107 => 48,  95 => 22,  89 => 31,  83 => 33,  76 => 29,  71 => 27,  67 => 26,  62 => 84,  55 => 81,  41 => 12,  36 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
