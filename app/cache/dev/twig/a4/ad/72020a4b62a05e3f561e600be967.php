<?php

/* MagazentoCatalogBundle:Default:upload.html.twig */
class __TwigTemplate_a4ad72020a4b62a05e3f561e600be967 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("MagazentoUserBundle::layout.html.twig");

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MagazentoUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 3
        echo "<section id=\"title\" class=\"container clearfix\">


    <!-- Title -->
    <div class=\"two-thirds column\">

        <h1>Store catalog.</h1>
        <h2>Here you can upload the list of the products from your store. </h2>

    </div>
    <!-- End Title -->


</section>
<section id=\"title\" style=\"padding-top: 0\" class=\"container clearfix\">
<div class=\"two-thirds column\">
    <form class=\"widthform\" action=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_magazento_catalog_upload"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo ">
        <fieldset>
                    ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
        </fieldset>
        <div class=\"form-click\">
            <span><input type=\"submit\" name=\"submit\" value=\"Send\" id=\"submit\"></span>
        </div>        
    </form>
    <!-- End Form -->
    <div id=\"alert\"></div>
</div>
<div class=\"one-third column\">
    <div id=\"infobox\" class=\"four columns clearfix\">
        <div class=\"infobox\">
             Notice. Your current products & catagories will be overwritten with new catalog data from XML
        </div>
    </div>        
</div> 
</section>
";
    }

    public function getTemplateName()
    {
        return "MagazentoCatalogBundle:Default:upload.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 21,  49 => 19,  31 => 3,  28 => 2,);
    }
}
