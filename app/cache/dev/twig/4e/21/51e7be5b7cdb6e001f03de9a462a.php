<?php

/* ::base.html.twig */
class __TwigTemplate_4e2151e7be5b7cdb6e001f03de9a462a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        ";
        // line 4
        $this->env->loadTemplate("::head.html.twig")->display($context);
        echo "        
    </head>
    <body>
        <div class=\"header-wrapper\">
            <header class=\"container clearfix\">
                <img class=\"logo\" src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("logo.png"), "html", null, true);
        echo "\">
                <nav id=\"nav\" class=\"navigation nine columns clearfix\">
                    ";
        // line 11
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 12
            echo "                        <ul id=\"navigation\">
                            ";
            // line 13
            echo $this->env->getExtension('knp_menu')->render("MagazentoMenuBundle:Builder:registeredMenu");
            echo "
                        </ul>
                    ";
        } else {
            // line 16
            echo "                        <ul id=\"navigation\">
                            ";
            // line 17
            echo $this->env->getExtension('knp_menu')->render("MagazentoMenuBundle:Builder:unregisteredMenu");
            echo "
                        </ul>
                    ";
        }
        // line 20
        echo "                </nav>
                <nav id=\"nav\" class=\"user five columns clearfix\">
                    ";
        // line 22
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 23
            echo "                        <div class=\"user-wrapper\"> 
                            <ul id=\"navigation\">
                                <li class=\"drop\"><span class=\"userinfo\"> ";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username"), "html", null, true);
            echo " </span>
                                    <ul class=\"dropdown clearfix menu_level_1\">
                                        <div class=\"userdropdown\">  
                                            <p class=\"usermoney useritem\"> <strong>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "money"), "html", null, true);
            echo " USD : ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "plan"), "html", null, true);
            echo "</strong> <br/> ballance </p>                                            
                                            <p class=\"usermoney useritem\"> <strong>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "moneyReserved"), "html", null, true);
            echo " USD</strong> <br/> reserved </p>                                            
                                            <p class=\"userdate useritem\"> <strong>";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->dateFilter($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "payDate")), "html", null, true);
            echo "</strong><br/> Billing starts </p>                                            
                                            <p class=\"usersettigns useritem\"> <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_profile_edit"), "html", null, true);
            echo "\"> edit profile</a></p>
                                        </div>
                                    </ul>
                                    
                                </li>
                                <li class=\"userlogout\"><a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
            echo "\"> # </a></li>
                            </ul>                            
                        </div>                       
                    ";
        } else {
            // line 40
            echo "                        <div class=\"user-wrapper\">         
                            <ul id=\"navigation\">
                                <li class=\"userlogin\"><a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_login"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html", null, true);
            echo "</a></li>
                                <li class=\"userregister\"><a href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/register"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.register", array(), "FOSUserBundle"), "html", null, true);
            echo "</a></li>
                            </ul>
                        </div>                
                    ";
        }
        // line 47
        echo "
                </nav>
            </header>               
        </div>
            
        <div class=\"container-wrapper\">
            <div class=\"container\">

                ";
        // line 55
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "notice"), "method")) {
            // line 56
            echo "                <br/>
                <p class=\"alert info\"><span>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
            echo "</span></p>
                ";
        }
        // line 58
        echo "        

                ";
        // line 60
        $this->displayBlock('body', $context, $blocks);
        echo "            
            </div>
        </div>
            

        ";
        // line 65
        $this->displayBlock('javascripts', $context, $blocks);
        // line 66
        echo "            
        <section id=\"services\">

                <div class=\"container clearfix\">
                        <!-- Intro -->
                        <div class=\"sixteen columns\">
                                <h2>See what we can do.</h2>
                        </div>
                        <!-- End Intro -->

                        <div class=\"list-one one-third column\">
                                <h4>Mobile e-commerce</h4>
                                <ul>
                                        <li>iPhone & Android apps<li>
                                        <li>Magento </li>
                                        <li>Prestashop </li>
                                        <li>Shopify </li>
                                </ul>
                        </div>

                        <div class=\"list-two one-third column\">
                                <h4>Websites</h4>
                                <p>As a company, we provide a wide range of services related to the website development<br/>
                                Megabile is a child project of Magazento company, to read more visit magazento.com  </p>                                
                        </div>

                        <div class=\"list-three one-third column\">
                                <h4>About Magabile</h4>
                                <p>We think that if you have a feedback or you have found issues in our software then you should definitely speak to us.<br/>
                                We're a friendly, skilled team always prepared to help.</p>
                        </div>

                </div><!-- END CONTAINER -->

        </section>   
        ";
        // line 101
        if (($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED") == false)) {
            echo "            
            <section id=\"call-to-action\">
                <div class=\"container clearfix\">
                    <div class=\"sixteen columns\">
                        <h1>Not enough?</h1>
                        <h2>Maybe you want to see our Wiki.</h2>
                        <a class=\"button dark\" href=\"http://wiki.megabile.com\">Yes, show me</a>
                    </div>
                </div>
            </section> 
        ";
        } else {
            // line 112
            echo "            <section id=\"call-to-action\">
                <div class=\"container clearfix\">
                    <div class=\"sixteen columns\">
                        <h1>Got feedback?</h1>
                        <h2>Help us to make Magabile better!</h2> 
                       <a class=\"button dark\" href=\"";
            // line 117
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/contact"), "html", null, true);
            echo "\">I would love to</a>
                    </div>
                </div>
            </section>                 
        ";
        }
        // line 121
        echo "        
           
            
        ";
        // line 124
        $this->env->loadTemplate("::footer.html.twig")->display($context);
        // line 125
        echo "    </body>
</html>

";
    }

    // line 60
    public function block_body($context, array $blocks = array())
    {
    }

    // line 65
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 65,  237 => 60,  230 => 125,  228 => 124,  223 => 121,  215 => 117,  208 => 112,  194 => 101,  157 => 66,  155 => 65,  147 => 60,  143 => 58,  138 => 57,  135 => 56,  133 => 55,  123 => 47,  114 => 43,  108 => 42,  104 => 40,  97 => 36,  85 => 30,  81 => 29,  75 => 28,  69 => 25,  65 => 23,  63 => 22,  59 => 20,  53 => 17,  50 => 16,  44 => 13,  39 => 11,  34 => 9,  26 => 4,  21 => 1,  35 => 5,  32 => 4,  29 => 3,  107 => 48,  95 => 39,  89 => 31,  83 => 33,  76 => 29,  71 => 27,  67 => 26,  62 => 24,  55 => 20,  41 => 12,  36 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
