<?php

/* errors/404.html */
class __TwigTemplate_e4bc7b50360f5c52428797f8c6979b9968c5e97836bf3c44c970352d738539e8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("errorlayout.html", "errors/404.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "errorlayout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<div class=\"wrapperArea\" id=\"errors\">
    <div class=\"container text-center\">
        
        <h1>Ahhhhhhhhhhh! Page not found!</h1>
        <h2>Not to worry. You can either head back to our homepage, or sit there and<br/> listen to a goat scream like a human.</h2>

        <div class=\"video col-lg-12 col-centered\">
            <iframe src=\"http://www.youtube.com/embed/SIaFtAKnqBU?vq=hd720&rel=0&showinfo=0&controls=0&iv_load_policy=3&loop=1&playlist=SIaFtAKnqBU&modestbranding=1&autoplay=1\" width=\"100%\" height=\"615\" frameborder=\"0\" webkitAllowFullScreen allowFullScreen></iframe>
        </div>
        
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "errors/404.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "errorlayout.html" %}*/
/* */
/* {% block content %}*/
/* */
/* <div class="wrapperArea" id="errors">*/
/*     <div class="container text-center">*/
/*         */
/*         <h1>Ahhhhhhhhhhh! Page not found!</h1>*/
/*         <h2>Not to worry. You can either head back to our homepage, or sit there and<br/> listen to a goat scream like a human.</h2>*/
/* */
/*         <div class="video col-lg-12 col-centered">*/
/*             <iframe src="http://www.youtube.com/embed/SIaFtAKnqBU?vq=hd720&rel=0&showinfo=0&controls=0&iv_load_policy=3&loop=1&playlist=SIaFtAKnqBU&modestbranding=1&autoplay=1" width="100%" height="615" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>*/
/*         </div>*/
/*         */
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
