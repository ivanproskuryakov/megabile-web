<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_63cc8d01e4f49b71cbff6efadac9f09f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 4
        if ($this->getContext($context, "error")) {
            // line 5
            echo "    <br/>
    <p class=\"alert error\"><strong>Error</strong> <span>- ";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "error"), array(), "FOSUserBundle"), "html", null, true);
            echo "</span></p>
";
        }
        // line 8
        echo "    
<section id=\"title\" class=\"container clearfix\">
    <div class=\"ten columns\">

        <h1>Login page</h1>
        <h2>Enter your username and password and press the Login button. In case you don't have an account, press the Register button and complete simple registration procedure.</h2>

    </div>
</section>

<section id=\"title\" class=\"container clearfix\">
    <div class=\"two-thirds column\">
        <form class=\"widthform\" action=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"post\">


            <fieldset>
                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, "csrf_token"), "html", null, true);
        echo "\" />

                <label for=\"username\">";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\" required=\"required\" />

                <label for=\"password\">";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" />

                <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                <label for=\"remember_me\">";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
            </fieldset>
            <div class=\"form-click\">
                <input type=\"submit\" id=\"_submit\" name=\"_submit\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
            </div>        
        </form>
        <a href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_resetting_request"), "html", null, true);
        echo "\"> Forgot password ?</a>            
        <!-- End Form -->
        <div id=\"alert\"></div>
    </div>

    <div class=\"one-third column\">
        <div id=\"infobox\" class=\"four columns clearfix\">
            <div class=\"infobox\">
                Do not have an account? Just register! Just three clicks an you will complete creating your Megabile account!<br/>
                <a class=\"button\" href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/register"), "html", null, true);
        echo "\">Register!</a>
            </div>

        </div>        
    </div>    
</section>

    
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 48,  95 => 39,  89 => 36,  83 => 33,  76 => 29,  71 => 27,  67 => 26,  62 => 24,  55 => 20,  41 => 8,  36 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
