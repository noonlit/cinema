<?php

/* layout.html */
class __TwigTemplate_627dd7f8e1c6e2339dfdbe0b67900e63c22c17b19bbe19511ca796b8b9860039 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'pageIncludes' => array($this, 'block_pageIncludes'),
            'pageScripts' => array($this, 'block_pageScripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
            <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

            <meta http-equiv=\"Content-Language\" content=\"ro\" /> 
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

            <meta name=\"description\" content=\"Cinema Village - The best cinema with brand new movies!\" />
            <meta name=\"keywords\" content=\"cinema, movies\" />
            <meta name=\"author\" content=\"Copyright Evozon Interns © 2016\" />

            <!-- Bootstrap -->
            <link href=\"http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />

            <!-- CSS -->
            <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "basepath", array()), "html", null, true);
        echo "/css/bootstrap-datetimepicker.min.css\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "basepath", array()), "html", null, true);
        echo "/css/sweetalert.css\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "basepath", array()), "html", null, true);
        echo "/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />

            <!-- Google Fonts -->
            <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:400,800,700italic,800italic,600italic,600,400italic,300italic,300,700\" rel=\"stylesheet\" type=\"text/css\" />
            <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js\"></script>
    </head>
    <body>
        
        <header>
            ";
        // line 31
        $this->loadTemplate("navbar.html", "layout.html", 31)->display($context);
        // line 32
        echo "        </header>
        
        <div class=\"content\">
            ";
        // line 35
        $this->displayBlock('content', $context, $blocks);
        // line 36
        echo "        </div>

<!--        <div class=\"footer\">
            ";
        // line 39
        $this->loadTemplate("footer.html", "layout.html", 39)->display($context);
        // line 40
        echo "        </div>-->
        
        
        <script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/sweetalert.min.js\"></script>
        <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/jquery.startup.js\"></script>
        
        ";
        // line 46
        $this->displayBlock('pageIncludes', $context, $blocks);
        // line 47
        echo "        
        <script>
            \$(document).ready(function () {
                ";
        // line 50
        $this->displayBlock('pageScripts', $context, $blocks);
        // line 51
        echo "            });
        </script>

    </body>
</html>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo " Cinema Village ";
    }

    // line 35
    public function block_content($context, array $blocks = array())
    {
    }

    // line 46
    public function block_pageIncludes($context, array $blocks = array())
    {
    }

    // line 50
    public function block_pageScripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 50,  125 => 46,  120 => 35,  114 => 4,  106 => 51,  104 => 50,  99 => 47,  97 => 46,  92 => 44,  88 => 43,  83 => 40,  81 => 39,  76 => 36,  74 => 35,  69 => 32,  67 => 31,  54 => 21,  50 => 20,  46 => 19,  28 => 4,  23 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/*     <head>*/
/*             <title>{% block title%} Cinema Village {% endblock %}</title>*/
/* */
/*             <meta http-equiv="Content-Language" content="ro" /> */
/*             <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />*/
/*             <meta http-equiv="X-UA-Compatible" content="IE=edge" />*/
/*             <meta name="viewport" content="width=device-width, initial-scale=1">*/
/* */
/*             <meta name="description" content="Cinema Village - The best cinema with brand new movies!" />*/
/*             <meta name="keywords" content="cinema, movies" />*/
/*             <meta name="author" content="Copyright Evozon Interns © 2016" />*/
/* */
/*             <!-- Bootstrap -->*/
/*             <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />*/
/* */
/*             <!-- CSS -->*/
/*             <link href="{{ app.request.basepath }}/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />*/
/*             <link href="{{ app.request.basepath }}/css/sweetalert.css" rel="stylesheet" type="text/css" />*/
/*             <link href="{{ app.request.basepath }}/css/style.css" rel="stylesheet" type="text/css" />*/
/*             <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />*/
/* */
/*             <!-- Google Fonts -->*/
/*             <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800,700italic,800italic,600italic,600,400italic,300italic,300,700" rel="stylesheet" type="text/css" />*/
/*             <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>*/
/*     </head>*/
/*     <body>*/
/*         */
/*         <header>*/
/*             {% include 'navbar.html' %}*/
/*         </header>*/
/*         */
/*         <div class="content">*/
/*             {% block content %}{% endblock %}*/
/*         </div>*/
/* */
/* <!--        <div class="footer">*/
/*             {% include 'footer.html' %}*/
/*         </div>-->*/
/*         */
/*         */
/*         <script src="{{ app.request.basepath }}/js/sweetalert.min.js"></script>*/
/*         <script src="{{ app.request.basepath }}/js/jquery.startup.js"></script>*/
/*         */
/*         {% block pageIncludes %}{% endblock %}*/
/*         */
/*         <script>*/
/*             $(document).ready(function () {*/
/*                 {% block pageScripts %}{% endblock %}*/
/*             });*/
/*         </script>*/
/* */
/*     </body>*/
/* </html>*/
