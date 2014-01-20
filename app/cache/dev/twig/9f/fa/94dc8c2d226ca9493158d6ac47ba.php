<?php

/* MagazentoCatalogBundle:Default:grid_product_render.html.twig */
class __TwigTemplate_9ffa94dc8c2d226ca9493158d6ac47ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("APYDataGridBundle::blocks.html.twig");

        $this->blocks = array(
            'grid_column_price_cell' => array($this, 'block_grid_column_price_cell'),
            'grid_column_name_cell' => array($this, 'block_grid_column_name_cell'),
            'grid_column_picture_cell' => array($this, 'block_grid_column_picture_cell'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "APYDataGridBundle::blocks.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_grid_column_price_cell($context, array $blocks = array())
    {
        // line 5
        echo "   ";
        echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
        echo "
";
    }

    // line 8
    public function block_grid_column_name_cell($context, array $blocks = array())
    {
        // line 9
        echo "   ";
        echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
        echo "
";
    }

    // line 12
    public function block_grid_column_picture_cell($context, array $blocks = array())
    {
        // line 13
        echo "    <img width=\"55\" src=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
        echo "\" />
";
    }

    public function getTemplateName()
    {
        return "MagazentoCatalogBundle:Default:grid_product_render.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 13,  50 => 12,  40 => 8,  33 => 5,  30 => 4,  118 => 37,  113 => 6,  107 => 5,  98 => 37,  94 => 35,  89 => 34,  86 => 33,  84 => 32,  74 => 25,  70 => 24,  60 => 17,  55 => 15,  51 => 14,  47 => 13,  43 => 9,  32 => 6,  22 => 1,  34 => 7,  31 => 4,  28 => 5,);
    }
}
