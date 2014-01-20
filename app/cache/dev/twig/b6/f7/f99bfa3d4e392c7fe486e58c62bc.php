<?php

/* FOSUserBundle:Registration:register_content.html.twig */
class __TwigTemplate_b6f7f99bfa3d4e392c7fe486e58c62bc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<section id=\"title\" class=\"container clearfix\">
    <div class=\"ten columns\">

        <h1>Registration.</h1>
        <h2>In order to get the full-functional access to our service, you have to fill in all the  required fields.</h2>

    </div>
</section>
<section id=\"title\" class=\"container clearfix\">
    <div class=\"two-thirds column\">
        <form class=\"widthform\" action=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_registration_register"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo "  method=\"POST\" class=\"fos_user_registration_register\">

            <fieldset>
                ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
            </fieldset>
            <div class=\"form-click\">
                <input type=\"submit\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
            </div>        
        </form>

        <div id=\"alert\"></div>
    </div>
    <div class=\"one-third column\">
        <div id=\"infobox\" class=\"four columns clearfix\">
            <div class=\"infobox\">
                In order to create an account we will send you a confirmation letter to your e-mail. Once this step will be done your account will be created.
                <a class=\"button\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/login"), "html", null, true);
        echo "\">Already Registered!</a>
            </div>
        </div>        
    </div>         
</section>        
    ";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 27,  45 => 17,  39 => 14,  19 => 1,  31 => 11,  28 => 3,);
    }
}
