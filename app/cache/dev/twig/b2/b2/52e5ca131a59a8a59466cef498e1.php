<?php

/* MagazentoMenuBundle:Default:contact.html.twig */
class __TwigTemplate_b2b252e5ca131a59a8a59466cef498e1 extends Twig_Template
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

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<section id=\"title\" class=\"container clearfix\">
    <div class=\"ten columns\">

        <h1>Contact Us.</h1>
        <h2>So, you've arrived at the contact page... Which hopefully means that you'd like to talk to us. No problem just fill up the form below.</h2>

    </div>
</section>
<section id=\"contact\" class=\"container clearfix\">
    <div class=\"ten columns\">
        <!-- Form -->
        
        <form class=\"widthform\" action=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_magazento_contact"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "contact_form"), 'enctype');
        echo ">
            <fieldset>
                ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "contact_form"), 'widget');
        echo "
            </fieldset>
            <div class=\"form-click\">
                <span><input type=\"submit\" name=\"submit\" value=\"Send\" id=\"submit\"></span>
            </div>        
        </form>   
          <!-- 
        <form class=\"widthform\" method=\"post\" action=\"post.php\" name=\"contactform\" id=\"contact-form\">
            <fieldset>
                <div class=\"form-field\">
                    <label for=\"name\"><h5>Name</h5></label>
                    <span><input type=\"text\" name=\"name\" id=\"name\" required=\"required\"></span>
                </div>
                <div class=\"form-field\">
                    <label for=\"email\"><h5>Email</h5></label>
                    <span><input type=\"email\" name=\"email\" id=\"email\" required=\"required\"></span>
                </div>
                <div class=\"form-field\">
                    <label for=\"message\"><h5>Message</h5></label>
                    <span><textarea name=\"message\" id=\"message\" required=\"required\"></textarea></span>
                </div>
            </fieldset>
            <div class=\"form-click\">
                <span><input type=\"submit\" name=\"submit\" value=\"Send\" id=\"submit\"></span>
            </div>
        </form>\t
      End Form -->
        <div id=\"alert\"></div>
    </div>

    <aside class=\"six columns\">
        
        <div id=\"infobox\" class=\"five columns clearfix\">
            <h2>Got someting to say ?</h2>
            <br/>
                <a class=\"button\" href=\"mailto:service@magazento.com\">service@magazento.com</a>
            <br/>
            <br/>
            <blockquote>
                    <p>We think that if you have a feedback or you have found issues in our software then you should definitely speak to us.</p>
                    <p>We're a friendly, skilled team always prepared to help.</p>
            </blockquote>            
        </div>         
    </aside>\t


</section>
";
    }

    public function getTemplateName()
    {
        return "MagazentoMenuBundle:Default:contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 18,  45 => 16,  31 => 4,  28 => 3,);
    }
}
