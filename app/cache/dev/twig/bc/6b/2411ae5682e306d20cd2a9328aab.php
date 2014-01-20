<?php

/* MagazentoMenuBundle:Default:homepage.html.twig */
class __TwigTemplate_bc6b2411ae5682e306d20cd2a9328aab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<section id=\"title\" class=\"container clearfix\">


    <div class=\"twelve columns\">

        <h1>Mobile Store Apps !</h1>
        <h2>Cheap iPhone and Android apps for your current store. Simple as make a coffe!</h2>

    </div>


</section>

<section id=\"team\" class=\"container clearfix\">


    <ul class=\"members\">
        
        <li class=\"first one-third column\">
            <img src=\"images/android.png\" width=\"228px\" alt=\"Google Android\">
            <h2>Google Android</h2>
            <a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_magazento_demo_android"), "html", null, true);
        echo "\">this summer...</a>
            <p>Thinking about Android App for your store? Megabile makes creating Android Apps easier than ever before! Create your App and get all benefits. </p>

        </li>
        
        <li class=\"one-third column\">
            <img src=\"images/about2.png\" alt=\"Apple Iphone\">
            <h2>Apple iPhone</h2>
            <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_magazento_demo_iphone"), "html", null, true);
        echo "\">view demo...</a>
            <p>Magento.Mobile for iPhone is the most functional App for your existing store. 
                We'll take care of all the coding so that you can just focus on marketing and products!</p>                                
        </li>

        <li class=\"one-third column\">
            <img src=\"images/about3.png\" alt=\"Magento\">
            <h2>Your Store</h2>
            <a href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_magazento_howitworks"), "html", null, true);
        echo "\">read how...</a>
            <p>Connect your existing store to Megabile. It is really easy, simply upload your products XML with our ready made extension. No coding needed!</p>
        </li>

    </ul>


</section>

";
    }

    public function getTemplateName()
    {
        return "MagazentoMenuBundle:Default:homepage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 40,  65 => 32,  54 => 24,  31 => 3,  28 => 2,);
    }
}
