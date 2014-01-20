<?php

/* FOSUserBundle:Resetting:reset_content.html.twig */
class __TwigTemplate_9544d43c31bdba841e9f882b2c8f382c extends Twig_Template
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
        echo "<section id=\"title\" style=\"padding-bottom: 10px;\" class=\"container clearfix\">

        <h1>Reset password</h1>
        <h2>Enter a new password. Your new password must be between 6 and 20 characters long, and must include at least one number and one letter. Enter the password a second time.</h2>
</section>
<div class=\"two-thirds column\">
    <form  class=\"widthform\" action=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_resetting_reset", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo " method=\"POST\" class=\"fos_user_resetting_reset\">
        ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
        <div class=\"form-click\">
            <input type=\"submit\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.reset.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
        </div>
    </form>        
</div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:reset_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 10,  33 => 8,  27 => 7,  19 => 1,  31 => 4,  28 => 3,);
    }
}
