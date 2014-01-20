<?php

/* MagazentoBuildBundle:Default:build.html.twig */
class __TwigTemplate_627529b52b1dbbf38922c61a16d8bc2c extends Twig_Template
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
        echo "
<section id=\"title\" class=\"container clearfix\">


    <div class=\"twelve columns\">

        <h1>Build your app.</h1>
        <h2>When settings is done simply click \"Build\" and get your App!</h2>
    </div>
    <div id=\"infobox\" class=\"eight columns clearfix\">
        <div class=\"infobox\" style=\"height: 350px;\">
            <h2>iPhone: Before you build check bellow</h2>

            <ul class=\"list checklist2\">
                ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "complete"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 18
            echo "                    <li>";
            echo twig_escape_filter($this->env, $this->getContext($context, "item"), "html", null, true);
            echo "</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 19
        echo "                
            </ul>
            <ul class=\"list dash\">
                ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "issues"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 23
            echo "                    <li>";
            echo twig_escape_filter($this->env, $this->getContext($context, "item"), "html", null, true);
            echo "</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 24
        echo "     
            </ul>       
            ";
        // line 26
        if ($this->getContext($context, "buildStatus")) {
            echo " 
                <p class=\"buildstatus\">
                    <strong>Type:</strong> <span>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "buildStatus"), "type"), "html", null, true);
            echo "</span> 
                    <strong>Time:</strong> <span>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "buildStatus"), "time"), "html", null, true);
            echo "</span>
                </p>
                <p class=\"buildstatus\"><strong>Status:</strong> <span>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "buildStatus"), "message"), "html", null, true);
            echo "</span></p>
         
    
                ";
            // line 34
            if (($this->getAttribute($this->getContext($context, "buildStatus"), "status") == true)) {
                // line 35
                echo "                    <a class=\"button buildbutton\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_magazento_build_download_iphone"), "html", null, true);
                echo "\">Download App</a>
                ";
            }
            // line 36
            echo "      
                    
            ";
        }
        // line 38
        echo "                      
        </div>

    </div>      
    <div id=\"infobox\" class=\"four columns clearfix\" >
        <div class=\"infobox\" style=\"height: 350px;\">
            <h2>Buld Testing</h2>
            <div class=\"three columns\">            
                <form class=\"tabcontent widthform\" action=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_magazento_build_run"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "formIphoneDev"), 'enctype');
        echo ">
                    <fieldset>
                        ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "formIphoneDev"), 'widget');
        echo "
                    </fieldset>
                    <div class=\"form-click\">
                        <span><input type=\"submit\" name=\"submit\" value=\"Run Build\" id=\"submit\"></span>
                    </div>       
                </form>            
                <!-- <a class=\"button\" href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_magazento_build_run"), "html", null, true);
        echo "\">Run Build</a> -->
            </div>
        </div>
    </div>
    <div id=\"infobox\" class=\"four columns clearfix\" >
        <div class=\"infobox\" style=\"height: 350px;\">
            <h2>Buld Distribution</h2>
            <div class=\"three columns\">            
                <form class=\"tabcontent widthform\" action=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_magazento_build_run"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "formIphoneProd"), 'enctype');
        echo ">
                    <fieldset>
                        ";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "formIphoneProd"), 'widget');
        echo "
                    </fieldset>
                    <div class=\"form-click\">
                        <span><input type=\"submit\" name=\"submit\" value=\"Run Build\" id=\"submit\"></span>
                    </div>       
                </form>            
                <!-- <a class=\"button\" href=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_magazento_build_run"), "html", null, true);
        echo "\">Run Build</a> -->
            </div>
        </div>
    </div>

    <div class=\"sixteen columns\">
        <br class=\"clear\">
            
            
        ";
        // line 79
        if ($this->getContext($context, "buildStatus")) {
            echo "        
            <textarea class=\"buildlog\" >
                ";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "buildStatus"), "log"), "html", null, true);
            echo "
            </textarea>        
        ";
        }
        // line 83
        echo "            
    </div>    

    
</section>
<br class=\"clear\"/>




";
    }

    public function getTemplateName()
    {
        return "MagazentoBuildBundle:Default:build.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 83,  185 => 81,  180 => 79,  168 => 70,  159 => 64,  152 => 62,  141 => 54,  132 => 48,  125 => 46,  115 => 38,  110 => 36,  104 => 35,  102 => 34,  96 => 31,  91 => 29,  87 => 28,  82 => 26,  78 => 24,  69 => 23,  65 => 22,  60 => 19,  51 => 18,  47 => 17,  31 => 3,  28 => 2,);
    }
}
