<?php

/* Movie/addmovie.html */
class __TwigTemplate_90d60df1e59d2b2e71243a7d0773d2050b482ac312e48e6bf85cc24760d308c8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Movie/addmovie.html", 1);
        $this->blocks = array(
            'pageIncludes' => array($this, 'block_pageIncludes'),
            'pageScripts' => array($this, 'block_pageScripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0d10c3534c6dbf003e7ceec76834c44bd024fa3ed43319ac23898d1f1dfdff0d = $this->env->getExtension("native_profiler");
        $__internal_0d10c3534c6dbf003e7ceec76834c44bd024fa3ed43319ac23898d1f1dfdff0d->enter($__internal_0d10c3534c6dbf003e7ceec76834c44bd024fa3ed43319ac23898d1f1dfdff0d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Movie/addmovie.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0d10c3534c6dbf003e7ceec76834c44bd024fa3ed43319ac23898d1f1dfdff0d->leave($__internal_0d10c3534c6dbf003e7ceec76834c44bd024fa3ed43319ac23898d1f1dfdff0d_prof);

    }

    // line 4
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_9e074bac817be7eb1d32ae4940e611c2bb518ac1b168573efc370fee6ccb1df4 = $this->env->getExtension("native_profiler");
        $__internal_9e074bac817be7eb1d32ae4940e611c2bb518ac1b168573efc370fee6ccb1df4->enter($__internal_9e074bac817be7eb1d32ae4940e611c2bb518ac1b168573efc370fee6ccb1df4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        
        $__internal_9e074bac817be7eb1d32ae4940e611c2bb518ac1b168573efc370fee6ccb1df4->leave($__internal_9e074bac817be7eb1d32ae4940e611c2bb518ac1b168573efc370fee6ccb1df4_prof);

    }

    // line 7
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_f21d7df40f99d78831dfdde4c7969551a6b5d6925e9da09c7152fc9935b69a93 = $this->env->getExtension("native_profiler");
        $__internal_f21d7df40f99d78831dfdde4c7969551a6b5d6925e9da09c7152fc9935b69a93->enter($__internal_f21d7df40f99d78831dfdde4c7969551a6b5d6925e9da09c7152fc9935b69a93_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 8
        echo "    function getCurrentYear() {

        var now = new Date();
        return now.getFullYear();
    }
    var currentYear = getCurrentYear();
    \$(\"#year\").attr(\"max\", currentYear);
";
        
        $__internal_f21d7df40f99d78831dfdde4c7969551a6b5d6925e9da09c7152fc9935b69a93->leave($__internal_f21d7df40f99d78831dfdde4c7969551a6b5d6925e9da09c7152fc9935b69a93_prof);

    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        $__internal_71ecd72608e73f7ba210ece4a2746a06d27b667dd35b5180dbd59cf8c9de010c = $this->env->getExtension("native_profiler");
        $__internal_71ecd72608e73f7ba210ece4a2746a06d27b667dd35b5180dbd59cf8c9de010c->enter($__internal_71ecd72608e73f7ba210ece4a2746a06d27b667dd35b5180dbd59cf8c9de010c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 20
        echo "<div class=\"banner text-center\">
    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\">
        <div class=\"wrapper col-lg-12 col-centered\">

            <div class=\"showList\">  

                <span class=\"section-title text-center\">View all available genres</span><hr/>

                <form method=\"POST\" action=\"";
        // line 33
        echo $this->env->getExtension('routing')->getUrl("admin_movie_add");
        echo "\" enctype=\"multipart/form-data\">

                    <div class=\"col-lg-6 col-centered\">
                        ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 37
            echo "                        ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 40
            echo "                        ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "
                        <h1 class=\"text-center\"><i class=\"fa fa-video-camera\" aria-hidden=\"true\"></i> CinemaVillage</h1>

                        <label for=\"title\"><i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> Title</label>
                        <input required class=\"form-control\" type=\"text\" id=\"title\" name=\"title\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, ((array_key_exists("last_title", $context)) ? (_twig_default_filter((isset($context["last_title"]) ? $context["last_title"] : $this->getContext($context, "last_title")), "")) : ("")), "html", null, true);
        echo "\"/>
                        <p id=\"invalid-title\"></p>

                        <label for=\"year\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i> Year</label>
                        <input required min=\"1900\" max=\"\" pattern=\"\\d{4}\" class=\"form-control\" type=\"number\" id=\"year\" name=\"year\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, ((array_key_exists("last_year", $context)) ? (_twig_default_filter((isset($context["last_year"]) ? $context["last_year"] : $this->getContext($context, "last_year")), "")) : ("")), "html", null, true);
        echo "\" />
                        <p id=\"invalid-year\"></p>

                        <label for=\"cast\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i> Cast (names separated by commas)</label>
                        <input required pattern=\"[\\w,. ]+\" class=\"form-control\" type=\"text\" id=\"cast\" name=\"cast\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, ((array_key_exists("last_cast", $context)) ? (_twig_default_filter((isset($context["last_cast"]) ? $context["last_cast"] : $this->getContext($context, "last_cast")), "")) : ("")), "html", null, true);
        echo "\" />
                        <p id=\"invalid-cast\"></p>

                        <label min=\"1\" for=\"duration\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i> Duration (hours)</label>
                        <input required class=\"form-control\" type=\"number\" id=\"duration\" name=\"duration\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, ((array_key_exists("last_duration", $context)) ? (_twig_default_filter((isset($context["last_duration"]) ? $context["last_duration"] : $this->getContext($context, "last_duration")), "")) : ("")), "html", null, true);
        echo "\"/>
                        <p id=\"invalid-duration\"></p>

                        <label for=\"poster\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i> Poster</label>
                        <input class=\"form-control\" type=\"file\" id=\"poster\" name=\"poster\"/> 
                        <p id=\"invalid-poster\"></p>

                        <label for=\"link_imdb\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i> Imdb page link</label>
                        <input required pattern=\"http:\\/\\/(?:www\\.)?imdb\\.com\\/title\\/tt[0-9a-z=?/]*\" class=\"form-control\" type=\"url\" id=\"link_imdb\" name=\"link_imdb\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, ((array_key_exists("last_link_imdb", $context)) ? (_twig_default_filter((isset($context["last_link_imdb"]) ? $context["last_link_imdb"] : $this->getContext($context, "last_link_imdb")), "")) : ("")), "html", null, true);
        echo "\"/>
                        <p id=\"invalid-link_imdb\"></p>

                        ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["genreList"]) ? $context["genreList"] : $this->getContext($context, "genreList")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["genre"]) {
            // line 70
            echo "                        <input type=\"checkbox\" name=\"genres[";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "\"";
            if (twig_in_filter($this->getAttribute($context["genre"], "getId", array()), (isset($context["last_genres"]) ? $context["last_genres"] : $this->getContext($context, "last_genres")))) {
                echo " checked ";
            }
            echo "/>
                               <label for=\"genres[";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "]\">
                            ";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getName", array()), "html", null, true);
            echo "
                        </label>
                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['genre'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "                        <p id=\"invalid-genres\"></p>

                        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Submit <i class=\"fa fa-paper-plane\" aria-hidden=\"true\"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_71ecd72608e73f7ba210ece4a2746a06d27b667dd35b5180dbd59cf8c9de010c->leave($__internal_71ecd72608e73f7ba210ece4a2746a06d27b667dd35b5180dbd59cf8c9de010c_prof);

    }

    public function getTemplateName()
    {
        return "Movie/addmovie.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 75,  197 => 72,  193 => 71,  182 => 70,  165 => 69,  159 => 66,  148 => 58,  141 => 54,  134 => 50,  127 => 46,  121 => 42,  112 => 40,  107 => 39,  98 => 37,  94 => 36,  88 => 33,  73 => 20,  67 => 19,  53 => 8,  47 => 7,  36 => 4,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* */
/* {% block pageIncludes %}*/
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/*     function getCurrentYear() {*/
/* */
/*         var now = new Date();*/
/*         return now.getFullYear();*/
/*     }*/
/*     var currentYear = getCurrentYear();*/
/*     $("#year").attr("max", currentYear);*/
/* {% endblock %}*/
/* */
/* */
/* */
/* {% block content %}*/
/* <div class="banner text-center">*/
/*     <h1>Cinema Village</h1>*/
/*     <h2>A new generation movie theater in your town. Try us!</h2>*/
/* </div>*/
/* */
/* <div class="wrapperArea">*/
/*     <div class="container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/* */
/*             <div class="showList">  */
/* */
/*                 <span class="section-title text-center">View all available genres</span><hr/>*/
/* */
/*                 <form method="POST" action="{{ url('admin_movie_add') }}" enctype="multipart/form-data">*/
/* */
/*                     <div class="col-lg-6 col-centered">*/
/*                         {% for message in flashBag.get('error') %}*/
/*                         {{ message }}*/
/*                         {% endfor %}*/
/*                         {% for message in flashBag.get('success') %}*/
/*                         {{ message }}*/
/*                         {% endfor %}*/
/* */
/*                         <h1 class="text-center"><i class="fa fa-video-camera" aria-hidden="true"></i> CinemaVillage</h1>*/
/* */
/*                         <label for="title"><i class="fa fa-envelope" aria-hidden="true"></i> Title</label>*/
/*                         <input required class="form-control" type="text" id="title" name="title" value="{{ last_title|default("") }}"/>*/
/*                         <p id="invalid-title"></p>*/
/* */
/*                         <label for="year"><i class="fa fa-key" aria-hidden="true"></i> Year</label>*/
/*                         <input required min="1900" max="" pattern="\d{4}" class="form-control" type="number" id="year" name="year" value="{{ last_year|default("") }}" />*/
/*                         <p id="invalid-year"></p>*/
/* */
/*                         <label for="cast"><i class="fa fa-key" aria-hidden="true"></i> Cast (names separated by commas)</label>*/
/*                         <input required pattern="[\w,. ]+" class="form-control" type="text" id="cast" name="cast" value="{{ last_cast|default("") }}" />*/
/*                         <p id="invalid-cast"></p>*/
/* */
/*                         <label min="1" for="duration"><i class="fa fa-key" aria-hidden="true"></i> Duration (hours)</label>*/
/*                         <input required class="form-control" type="number" id="duration" name="duration" value="{{ last_duration|default("") }}"/>*/
/*                         <p id="invalid-duration"></p>*/
/* */
/*                         <label for="poster"><i class="fa fa-key" aria-hidden="true"></i> Poster</label>*/
/*                         <input class="form-control" type="file" id="poster" name="poster"/> */
/*                         <p id="invalid-poster"></p>*/
/* */
/*                         <label for="link_imdb"><i class="fa fa-key" aria-hidden="true"></i> Imdb page link</label>*/
/*                         <input required pattern="http:\/\/(?:www\.)?imdb\.com\/title\/tt[0-9a-z=?/]*" class="form-control" type="url" id="link_imdb" name="link_imdb" value="{{ last_link_imdb|default("") }}"/>*/
/*                         <p id="invalid-link_imdb"></p>*/
/* */
/*                         {% for genre in genreList %}*/
/*                         <input type="checkbox" name="genres[{{ loop.index0 }}]" value="{{ genre.getId }}"{% if genre.getId in last_genres %} checked {% endif %}/>*/
/*                                <label for="genres[{{ loop.index0 }}]">*/
/*                             {{ genre.getName }}*/
/*                         </label>*/
/*                         {% endfor %}*/
/*                         <p id="invalid-genres"></p>*/
/* */
/*                         <button class="btn btn-lg btn-primary btn-block" type="submit">Submit <i class="fa fa-paper-plane" aria-hidden="true"></i></button>*/
/*                 </form>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
