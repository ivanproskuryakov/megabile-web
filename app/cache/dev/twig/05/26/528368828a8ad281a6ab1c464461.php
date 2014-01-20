<?php

/* ::admin.html.twig */
class __TwigTemplate_0526528368828a8ad281a6ab1c464461 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />        
\t
\t<script>if((window.devicePixelRatio===undefined?1:window.devicePixelRatio)>1)
\t\tdocument.cookie='HTTP_IS_RETINA=1;path=/';</script>
\t<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
\t<link rel=\"shortcut icon\" type=\"image/x-icon\"  href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\">
\t<link rel=\"apple-touch-icon\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("apple-touch-icon.png"), "html", null, true);
        echo "\">
\t<link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("apple-touch-icon-72x72.png"), "html", null, true);
        echo "\">
\t<link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("apple-touch-icon-114x114.png"), "html", null, true);
        echo "\">
\t<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
\t<script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/custom.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    </head>
    <body>
        <div class=\"header-wrapper\">
            <header class=\"container clearfix\">
                <nav id=\"nav\" class=\"sixteen columns clearfix\">
                        <ul id=\"navigation\">
                            <li><a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/admin/history"), "html", null, true);
        echo "\">History</a></li>
                            <li><a href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/admin/user"), "html", null, true);
        echo "\">User</a></li>
                        </ul>
                </nav>
            </header>               
        </div>        
        <div class=\"container-wrapper\">

                ";
        // line 32
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "notice"), "method")) {
            // line 33
            echo "                <br/>
                <p class=\"alert notice\"><strong>Notice</strong> <span>- ";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
            echo "</span></p>
                ";
        }
        // line 35
        echo "        

                ";
        // line 37
        $this->displayBlock('body', $context, $blocks);
        echo "            
        </div>
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Magazento.Mobile - admin ";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 37
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 37,  113 => 6,  107 => 5,  98 => 37,  94 => 35,  89 => 34,  86 => 33,  84 => 32,  74 => 25,  70 => 24,  60 => 17,  55 => 15,  51 => 14,  47 => 13,  43 => 12,  32 => 6,  22 => 1,  34 => 7,  31 => 4,  28 => 5,);
    }
}
