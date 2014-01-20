<?php

/* MagazentoMenuBundle:Default:demo_iphone.html.twig */
class __TwigTemplate_7244c031eb76eeb0718cae49d3d6094e extends Twig_Template
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
        echo "<section id=\"title\" class=\"container clearfix\" style=\"padding-bottom:0px;\">

    <div class=\"twelve columns\">
        <h1>iPhone Application</h1>
        <h2>Your own native iPhone application! Up to 100 Products is absolutely FREE</h2>
        
    </div>
</section>
<section id=\"title\" class=\"container clearfix appdemo\">
    <div class=\"clearfix\">
        <div class=\"six columns\">
            <div class=\"iphonslider-box\">
                <div class=\"iphonslider flexslider\">
                    <ul class=\"slides\">
                        <li>
                            <img src=\"/iphonedemo/search.png\" />
                        </li>                        
                        <li>
                            <img src=\"/iphonedemo/catalog.png\" />
                        </li>
                        <li>
                            <img src=\"/iphonedemo/product.png\" />
                        </li>
                        <li>
                            <img src=\"/iphonedemo/cart.png\" />
                        </li>
                        <li>
                            <img src=\"/iphonedemo/order.png\" />
                        </li>
                        <li>
                            <img src=\"/iphonedemo/menu.png\" />
                        </li>
                    </ul>
                </div>
            </div>
        </div>         
        <div class=\"iphonefeatures ten columns\">
                <h3>Search</h3>      
                <p> The Application user can search the product by keyword, browse categories or products and then checkout the products in the cart. 
                    This is the basic functionality of the Mobile Application.</p>
               
                <h3>Catalog</h3>      
                <p> Application will have exact the same category tree as you existing store. atalog listing is divided in two sections: categories and products. You can overlook categories and present products  in the easiest way. </p>

                <h3>Cart & Orders</h3>      
                <p> All order information is sent to your E-mail with the help of our email server. App sends orders to email that you have used during registration.  </p>
                
                <h3>Company Information</h3>      
                <p> Store information screen displays your company contact data: adress, phone, email, website as well as the information realed to order processing. </p>
                
                <h3>Translation & Localization</h3>      
                <p> Each label and text of application can be translated (UTF-8). You dont even have any specific knowledge to do that.</p>
        </div>    
    </div>          
        
    <br class=\"clear\"/>
    <br class=\"clear\"/>
    <div class=\"one-third column\">
        <p class=\"text\">
            <h2> Up to 100 Products is FREE</h2>
            Up to 100 Products is FREE! It is a winning situation for small stores and start-ups, that can push your stores out of the crowd! That is always easy for you to upgrade or downgrade your billing plan in the billing section
        </p>         
    </div>     
    <div class=\"one-third column\">
        <p class=\"text\">
            <h2>Billing & Payment</h2>
            Our billing cycle equals 30 days and it starts when your register on Megamobile. You start with FREE billing plan and 100 products each time your change your billing period we zero out countdown.
        </p>
    </div>    
    <div class=\"one-third column\">
        <p class=\"text\">
            <h2> iPhone application</h2>
            In Megabile we glad to provide you the simpliest way for pulishing your store on iPhone, already customized for your brand. 
            Get native iPhone App for your store without any coding!
        </p>
    </div>          
    <div class=\"contentInfoBox pricing\">
        <p> 
            <a style=\"width: 400px;float: left;\" class=\"colorButton\" href=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/pricing"), "html", null, true);
        echo "\"><span class=\"pointer\">Get Started for FREE!</span></a> 
            <span style=\"margin-top: 10px; float: left; margin-left: 50px;\">You always able to switch your plan in <strong>BILLING</strong> section!</span>
        </p>
    </div>  
</section>

  <link rel=\"stylesheet\" href=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("flexslider/flexslider.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />
  <script defer src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("flexslider/jquery.flexslider.js"), "html", null, true);
        echo "\"></script>
  
  <script type=\"text/javascript\">
    \$(function(){
      SyntaxHighlighter.all();
    });
    \$(window).load(function(){
      \$('.flexslider').flexslider({
        animation: \"slide\",
        start: function(slider){
          \$('body').removeClass('loading');
        }
      });
    });
  </script>



";
    }

    public function getTemplateName()
    {
        return "MagazentoMenuBundle:Default:demo_iphone.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 89,  120 => 88,  111 => 82,  31 => 4,  28 => 3,);
    }
}
