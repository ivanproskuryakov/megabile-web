<?php

/* MagazentoServiceBundle:Default:email_user_regitered.txt.twig */
class __TwigTemplate_816340d70d780f0c0f8c5d2e5169f73d extends Twig_Template
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
        echo "New user: ";
        echo twig_escape_filter($this->env, $this->getContext($context, "user_email"), "html", null, true);
    }

    public function getTemplateName()
    {
        return "MagazentoServiceBundle:Default:email_user_regitered.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
