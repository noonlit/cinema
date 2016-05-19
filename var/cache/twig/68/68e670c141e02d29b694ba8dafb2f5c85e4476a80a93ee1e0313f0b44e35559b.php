<?php

/* layout.html */
class __TwigTemplate_41caf6a9e31eaf46fe4e00cf00a99c6539ac45d113f02b8f9798cf8908c0d6d6 extends Twig_Template
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
        $__internal_6e03b89eb94da530c5cda03b2486f83374ab031490048f328d9a2296ba1ed39a = $this->env->getExtension("native_profiler");
        $__internal_6e03b89eb94da530c5cda03b2486f83374ab031490048f328d9a2296ba1ed39a->enter($__internal_6e03b89eb94da530c5cda03b2486f83374ab031490048f328d9a2296ba1ed39a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "layout.html"));

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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/css/bootstrap-datetimepicker.min.css\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/css/sweetalert.css\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />

            <!-- Google Fonts -->
            <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:400,800,700italic,800italic,600italic,600,400italic,300italic,300,700\" rel=\"stylesheet\" type=\"text/css\" />
            <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js\"></script>
            <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
    </head>
    <body>
        
        <header>
            ";
        // line 32
        $this->loadTemplate("navbar.html", "layout.html", 32)->display($context);
        // line 33
        echo "        </header>
        
        <div class=\"content\">
            ";
        // line 36
        $this->displayBlock('content', $context, $blocks);
        // line 37
        echo "        </div>

        <div class=\"footer\">
            ";
        // line 40
        $this->loadTemplate("footer.html", "layout.html", 40)->display($context);
        // line 41
        echo "        </div>
        
        
        <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/sweetalert.min.js\"></script>
        <script src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/jquery.startup.js\"></script>
        
        ";
        // line 47
        $this->displayBlock('pageIncludes', $context, $blocks);
        // line 48
        echo "        
        <script>
            \$(document).ready(function () {
                ";
        // line 51
        $this->displayBlock('pageScripts', $context, $blocks);
        // line 52
        echo "            });
        </script>

    </body>
</html>";
        
        $__internal_6e03b89eb94da530c5cda03b2486f83374ab031490048f328d9a2296ba1ed39a->leave($__internal_6e03b89eb94da530c5cda03b2486f83374ab031490048f328d9a2296ba1ed39a_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_7138bb77df768cf904458ff3b4c24e5470f392cae36f05dda1572d49f386625a = $this->env->getExtension("native_profiler");
        $__internal_7138bb77df768cf904458ff3b4c24e5470f392cae36f05dda1572d49f386625a->enter($__internal_7138bb77df768cf904458ff3b4c24e5470f392cae36f05dda1572d49f386625a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " Cinema Village ";
        
        $__internal_7138bb77df768cf904458ff3b4c24e5470f392cae36f05dda1572d49f386625a->leave($__internal_7138bb77df768cf904458ff3b4c24e5470f392cae36f05dda1572d49f386625a_prof);

    }

    // line 36
    public function block_content($context, array $blocks = array())
    {
        $__internal_0d0bb4ee8ac8045ab30a49474993134c78888675414dc3a39745f66560d06d6e = $this->env->getExtension("native_profiler");
        $__internal_0d0bb4ee8ac8045ab30a49474993134c78888675414dc3a39745f66560d06d6e->enter($__internal_0d0bb4ee8ac8045ab30a49474993134c78888675414dc3a39745f66560d06d6e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_0d0bb4ee8ac8045ab30a49474993134c78888675414dc3a39745f66560d06d6e->leave($__internal_0d0bb4ee8ac8045ab30a49474993134c78888675414dc3a39745f66560d06d6e_prof);

    }

    // line 47
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_7f6c58c3a33a471ad465df8f7c684a170a6ce512cee620abc9daefb214f467e9 = $this->env->getExtension("native_profiler");
        $__internal_7f6c58c3a33a471ad465df8f7c684a170a6ce512cee620abc9daefb214f467e9->enter($__internal_7f6c58c3a33a471ad465df8f7c684a170a6ce512cee620abc9daefb214f467e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        
        $__internal_7f6c58c3a33a471ad465df8f7c684a170a6ce512cee620abc9daefb214f467e9->leave($__internal_7f6c58c3a33a471ad465df8f7c684a170a6ce512cee620abc9daefb214f467e9_prof);

    }

    // line 51
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_afc9ac4441d800b5483a615b00e5be384b314ff1afd76d4ba8a955b8d2b4070a = $this->env->getExtension("native_profiler");
        $__internal_afc9ac4441d800b5483a615b00e5be384b314ff1afd76d4ba8a955b8d2b4070a->enter($__internal_afc9ac4441d800b5483a615b00e5be384b314ff1afd76d4ba8a955b8d2b4070a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        
        $__internal_afc9ac4441d800b5483a615b00e5be384b314ff1afd76d4ba8a955b8d2b4070a->leave($__internal_afc9ac4441d800b5483a615b00e5be384b314ff1afd76d4ba8a955b8d2b4070a_prof);

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
        return array (  155 => 51,  144 => 47,  133 => 36,  121 => 4,  110 => 52,  108 => 51,  103 => 48,  101 => 47,  96 => 45,  92 => 44,  87 => 41,  85 => 40,  80 => 37,  78 => 36,  73 => 33,  71 => 32,  57 => 21,  53 => 20,  49 => 19,  31 => 4,  26 => 1,);
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
/*             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>*/
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
/*         <div class="footer">*/
/*             {% include 'footer.html' %}*/
/*         </div>*/
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
