<?php

/* FOSUserBundle:Profile:edit_content.html.twig */
class __TwigTemplate_cee7eb9d076b8fd385847003babd4401 extends Twig_Template
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
        echo "
<div class=\"ten columns\">
    <section id=\"title\" style=\"padding-bottom: 30px;\" class=\"container clearfix\">

            <h1>Account E-mail</h1>
    </section>
    <form class=\"widthform\" action=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_profile_edit"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo " method=\"POST\" class=\"fos_user_profile_edit\">
        ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
        <div class=\"form-click\">
            <input type=\"submit\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("profile.edit.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
        </div>
    </form>
    
    <div id=\"alert\"></div>
</div>

<div class=\"six columns\">
    <section id=\"title\" style=\"padding-bottom: 30px;\" class=\"container clearfix\">

            <h1>Account Password</h1>
    </section>
    <div class=\"six columns\">
        <div id=\"infobox\" class=\"clearfix\">
            <div class=\"infobox\">
                Before you change your password, make sure that you create a unique password to help keep someone from breaking in to your account.<br/>
                <a class=\"button\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_change_password"), "html", null, true);
        echo "\">Change password</a>
            </div>
        </div>        
    </div>  
</div>";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Profile:edit_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 26,  38 => 10,  33 => 8,  27 => 7,  19 => 1,);
    }
}
