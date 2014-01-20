<?php

/* MagazentoAdminBundle:Security:user.html.twig */
class __TwigTemplate_f14155de6c3607a6a85dd10483da9918 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::admin.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"datagrid-container\">
    ";
        // line 5
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid($this->getContext($context, "grid"), "MagazentoCatalogBundle:Default:grid_product_render.html.twig");
        echo "
</div>        
";
    }

    public function getTemplateName()
    {
        return "MagazentoAdminBundle:Security:user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  28 => 3,);
    }
}
