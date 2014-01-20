<?php

/* ::head.html.twig */
class __TwigTemplate_72f7da33c5dabbc36c9e67df35d93d2d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<meta charset=\"UTF-8\" />
<title>";
        // line 2
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
";
        // line 3
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 4
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />        

<script>if((window.devicePixelRatio===undefined?1:window.devicePixelRatio)>1)
        document.cookie='HTTP_IS_RETINA=1;path=/';</script>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
<link rel=\"shortcut icon\" type=\"image/x-icon\"  href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\">
<link rel=\"apple-touch-icon\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("apple-touch-icon.png"), "html", null, true);
        echo "\">
<link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("apple-touch-icon-72x72.png"), "html", null, true);
        echo "\">
<link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("apple-touch-icon-114x114.png"), "html", null, true);
        echo "\">

<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("easyui/themes/default/easyui.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("easyui/themes/icon.css"), "html", null, true);
        echo "\">
<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("easyui/jquery.easyui.min.js"), "html", null, true);
        echo "\"></script>        
<script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/custom.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>        ";
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Megabile - Cheap mobile stores on apple iphone & google android ";
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 3,  74 => 2,  60 => 15,  56 => 14,  51 => 12,  47 => 11,  43 => 10,  30 => 4,  24 => 2,  242 => 65,  237 => 60,  230 => 125,  228 => 124,  223 => 121,  215 => 117,  208 => 112,  194 => 101,  157 => 66,  155 => 65,  147 => 60,  143 => 58,  138 => 57,  135 => 56,  133 => 55,  123 => 47,  114 => 43,  108 => 42,  104 => 40,  97 => 36,  85 => 30,  81 => 29,  75 => 28,  69 => 18,  65 => 17,  63 => 22,  59 => 20,  53 => 17,  50 => 16,  44 => 13,  39 => 9,  34 => 9,  26 => 4,  21 => 1,  35 => 5,  32 => 4,  29 => 3,  107 => 48,  95 => 39,  89 => 31,  83 => 33,  76 => 29,  71 => 27,  67 => 26,  62 => 24,  55 => 20,  41 => 12,  36 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
