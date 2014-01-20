<?php

/* FOSUserBundle:Resetting:request_content.html.twig */
class __TwigTemplate_c3a20182ebe4adb5198efa3b29483da0 extends Twig_Template
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
        <h2>
Just submit your email address here, we will email you a temporary password. You will be asked to choose a new permanent password when you next log in.</h2>
</section>
<div class=\"two-thirds column\">
    <form class=\"widthform\" action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_resetting_send_email"), "html", null, true);
        echo "\" method=\"POST\" class=\"fos_user_resetting_request\">
        <div>
            ";
        // line 10
        if (array_key_exists("invalid_username", $context)) {
            // line 11
            echo "                <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.invalid_username", array("%username%" => $this->getContext($context, "invalid_username")), "FOSUserBundle"), "html", null, true);
            echo "</p>
            ";
        }
        // line 13
        echo "            <label for=\"username\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
            <input type=\"text\" id=\"username\" name=\"username\" required=\"required\" />
        </div>
        <div class=\"form-click\">
            <input type=\"submit\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
        </div>
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:request_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 17,  41 => 13,  35 => 11,  33 => 10,  19 => 1,  31 => 4,  28 => 8,);
    }
}
