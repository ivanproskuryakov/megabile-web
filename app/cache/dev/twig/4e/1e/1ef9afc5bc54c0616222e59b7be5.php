<?php

/* ::footer.html.twig */
class __TwigTemplate_4e1e1ef9afc5bc54c0616222e59b7be5 extends Twig_Template
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
        echo "<footer class=\"container clearfix\">
    <div id=\"foot-nav\" class=\"twelve columns\">
        <ul>
            <li class=\"first\"><a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/"), "html", null, true);
        echo "\">Home</a></li>
            <li><a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/howitworks"), "html", null, true);
        echo "\">How it works</a></li>
            <li><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/pricing"), "html", null, true);
        echo "\">Pricing</a></li>
            <li><a href=\"http://wiki.megabile.com\">Wiki</a></li>
            <li class=\"last\"><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/contact"), "html", null, true);
        echo "\">Contact</a></li>
        </ul>                
    </div>

    <div id=\"copyright\" class=\"four columns\">
        <p><a href=\"http://www.magabile.com\" target=\"_blank\">www.magabile.com</a> </p>
        <p><span>© copyrigth 2013</span></p>
    </div>
</footer>

<!--Start of Zopim Live Chat Script-->
<script type=\"text/javascript\">
window.\$zopim||(function(d,s){var z=\$zopim=function(c){z._.push(c)},\$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];\$.async=!0;\$.setAttribute('charset','utf-8');
\$.src='//cdn.zopim.com/?dsfCwBnuGe3KXZ76CiIZHHqmsuiiBDNF';z.t=+new Date;\$.
type='text/javascript';e.parentNode.insertBefore(\$,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->     
        
";
        // line 28
        if (($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED") == false)) {
            echo "            
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-16868389-11', 'megabile.com');
        ga('send', 'pageview');
    </script>       
";
        }
        // line 38
        echo "        
 

";
    }

    public function getTemplateName()
    {
        return "::footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 38,  60 => 28,  37 => 8,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
