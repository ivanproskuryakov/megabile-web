<?php

/* FOSUserBundle:Registration:checkEmail.html.twig */
class __TwigTemplate_6cf4019884fe95d2fa1a28da4878c703 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 4
        echo "
<section id=\"title\" style=\"padding-bottom: 10px;\" class=\"container clearfix\">

        <h1>Check Your Email To Activate Your Account</h1>
        <h2>The first stage of your sign up has been successful!</h2>
</section>
<section id=\"title\" class=\"container clearfix\">

    <p>
        To complete the process please check your email. Within the email you will find a link which you must click in order to activate your account.<br />
        If the email doesn't appear shortly, please be sure to check your spam. Some anti-spam filters modify the email, so first copy any spam message to 
        your inbox before clicking the link.
    </p>
    <br/>
    <p>Unless something VERY strange has happened, we have already sent an activation link to the email address you submitted with registration.</p>
    <p>If you have not yet received it, please follow these steps:</p>
    <ol>
        <li><strong>Wait 20 Minutes</strong> - Email can take a while to move through cyberspace. Please wait up to 20 minutes to see if the email arrives.</li>
        <li><strong>Check your spam or Junk Mail folder</strong> - Sometimes legitimate email ends up in spam folders. Please check for an email there. The subject line will be \"Chess.com - Activate Your Account\".</li>
        <li><strong>Double-check the address entered</strong> - Look at the email address on the page after registration and make sure that is correct. If you made a mistake you can click on the link on that page to change your registration email. If that doesn't work, you can try registering again.</li>
    </ol>
    <p><br>If you have already tried all the above suggestions and still did not receive your activation link, please get in contact with us and include your username. We will send your activation link to you directly.</p>

</section>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:checkEmail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
