<?php

/* Movie/editmovie.html */
class __TwigTemplate_8d92f1f4a2f981ea362295ce1740a52834be9e4127b74ea4771a437836c6b4a6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Movie/editmovie.html", 1);
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
        $__internal_c9e2156fab44bdc9246d89290cea528944fd369b8f75f760db0c0b702fad4250 = $this->env->getExtension("native_profiler");
        $__internal_c9e2156fab44bdc9246d89290cea528944fd369b8f75f760db0c0b702fad4250->enter($__internal_c9e2156fab44bdc9246d89290cea528944fd369b8f75f760db0c0b702fad4250_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Movie/editmovie.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c9e2156fab44bdc9246d89290cea528944fd369b8f75f760db0c0b702fad4250->leave($__internal_c9e2156fab44bdc9246d89290cea528944fd369b8f75f760db0c0b702fad4250_prof);

    }

    // line 4
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_7085854f6a9ff5d626506116f6bd44bf6aaf56a4db1c37264b66ce844b3bf4de = $this->env->getExtension("native_profiler");
        $__internal_7085854f6a9ff5d626506116f6bd44bf6aaf56a4db1c37264b66ce844b3bf4de->enter($__internal_7085854f6a9ff5d626506116f6bd44bf6aaf56a4db1c37264b66ce844b3bf4de_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 5
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxEditableElements.js\"></script> 
";
        
        $__internal_7085854f6a9ff5d626506116f6bd44bf6aaf56a4db1c37264b66ce844b3bf4de->leave($__internal_7085854f6a9ff5d626506116f6bd44bf6aaf56a4db1c37264b66ce844b3bf4de_prof);

    }

    // line 9
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_2f7b48e22cef2a76e12fb87bead03c98128b85977bb705523acdcf4e491b8839 = $this->env->getExtension("native_profiler");
        $__internal_2f7b48e22cef2a76e12fb87bead03c98128b85977bb705523acdcf4e491b8839->enter($__internal_2f7b48e22cef2a76e12fb87bead03c98128b85977bb705523acdcf4e491b8839_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 10
        echo "    new AjaxEditableElements('#movie-container', 'edit/{id}', function (data) {
        swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
    });

    \$('.movies-per-page').on('change', function() {
        console.log(\"asas\");
       var moviesPerPage = \$(this).val();
       var url = window.location.pathname + '?page=1&movies_per_page=' + moviesPerPage;
       \$(location).attr('href', url);
    });
    
    \$('#prev-page, #next-page').click(function(){
        var url = window.location.pathname;
        console.log();
    });
    
";
        
        $__internal_2f7b48e22cef2a76e12fb87bead03c98128b85977bb705523acdcf4e491b8839->leave($__internal_2f7b48e22cef2a76e12fb87bead03c98128b85977bb705523acdcf4e491b8839_prof);

    }

    // line 27
    public function block_content($context, array $blocks = array())
    {
        $__internal_8789b1a6156ad99d08daabf90bfdb8eacf48682e49ffaf785b6301018e59ac3e = $this->env->getExtension("native_profiler");
        $__internal_8789b1a6156ad99d08daabf90bfdb8eacf48682e49ffaf785b6301018e59ac3e->enter($__internal_8789b1a6156ad99d08daabf90bfdb8eacf48682e49ffaf785b6301018e59ac3e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 28
        echo "<div class=\"banner text-center\">

    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\">
        <div class=\"wrapper col-lg-12 col-centered\">
            <div class=\"showList\">  
                <div class=\"section-title\">
                    <p class=\"pull-left\">Edit movies</p> </div>  
                    <div class=\"btn-block\"> ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 41
            echo "                            <div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                    </div>
                <form method=\"POST\" action=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_movie_edit", array("id" => $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getId", array()))), "html", null, true);
        echo "\" enctype=\"multipart/form-data\">

                    <label for=\"title\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> Title</label>
                    <input class=\"form-control\" type=\"text\" id=\"title\" name=\"title\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getTitle", array()), "html", null, true);
        echo "\"/>

                    <label for=\"genres\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> Genres</label>
                    <br>
                    ";
        // line 51
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
            // line 52
            echo "                    <input type=\"checkbox\" name=\"genres[";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "\"";
            if (twig_in_filter($this->getAttribute($context["genre"], "getName", array()), $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getGenres", array()))) {
                echo " checked ";
            }
            echo "/>
                           <label for=\"genres[";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "]\">
                        ";
            // line 54
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
        // line 56
        echo "  
                    <br>
                    <label for=\"year\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> Year</label>
                    <input class=\"form-control\" type=\"text\" id=\"year\" name=\"year\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getYear", array()), "html", null, true);
        echo "\" />

                    <label for=\"cast\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> Cast (names separated by commas)</label>
                    <input class=\"form-control\" type=\"text\" id=\"cast\" name=\"cast\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getCast", array()), "html", null, true);
        echo "\" />

                    <label for=\"duration\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> Duration (hours)</label>
                    <input class=\"form-control\" type=\"text\" id=\"duration\" name=\"duration\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getDuration", array()), "html", null, true);
        echo "\" readonly/>

                    <label for=\"poster\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> Poster</label>
                    <input class=\"form-control\" type=\"file\" id=\"poster\" name=\"poster\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getPoster", array()), "html", null, true);
        echo "\"/> 
                    <label for=\"link_imdb\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> Imdb page link</label>
                    <input class=\"form-control\" type=\"text\" id=\"link_imdb\" name=\"link_imdb\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getLinkImdb", array()), "html", null, true);
        echo "\"/>
                    <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Submit <i class=\"fa fa-paper-plane\" aria-hidden=\"true\"></i></button>
                </form>
                
            </div>
 
        </div>
    </div>
</div>
";
        
        $__internal_8789b1a6156ad99d08daabf90bfdb8eacf48682e49ffaf785b6301018e59ac3e->leave($__internal_8789b1a6156ad99d08daabf90bfdb8eacf48682e49ffaf785b6301018e59ac3e_prof);

    }

    public function getTemplateName()
    {
        return "Movie/editmovie.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 70,  202 => 68,  196 => 65,  190 => 62,  184 => 59,  179 => 56,  162 => 54,  158 => 53,  147 => 52,  130 => 51,  123 => 47,  117 => 44,  114 => 43,  105 => 41,  101 => 40,  87 => 28,  81 => 27,  58 => 10,  52 => 9,  42 => 5,  36 => 4,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* */
/* {% block pageIncludes %}*/
/*     <script src="{{ app.request.basepath }}/js/AjaxEditableElements.js"></script> */
/* {% endblock %}*/
/* */
/* */
/* {% block pageScripts %}*/
/*     new AjaxEditableElements('#movie-container', 'edit/{id}', function (data) {*/
/*         swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/*     });*/
/* */
/*     $('.movies-per-page').on('change', function() {*/
/*         console.log("asas");*/
/*        var moviesPerPage = $(this).val();*/
/*        var url = window.location.pathname + '?page=1&movies_per_page=' + moviesPerPage;*/
/*        $(location).attr('href', url);*/
/*     });*/
/*     */
/*     $('#prev-page, #next-page').click(function(){*/
/*         var url = window.location.pathname;*/
/*         console.log();*/
/*     });*/
/*     */
/* {% endblock %}*/
/* {% block content %}*/
/* <div class="banner text-center">*/
/* */
/*     <h1>Cinema Village</h1>*/
/*     <h2>A new generation movie theater in your town. Try us!</h2>*/
/* </div>*/
/* */
/* <div class="wrapperArea">*/
/*     <div class="container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/*             <div class="showList">  */
/*                 <div class="section-title">*/
/*                     <p class="pull-left">Edit movies</p> </div>  */
/*                     <div class="btn-block"> {% for message in app.session.getFlashBag.get('error') %}*/
/*                             <div class="alert alert-danger" role="alert">{{ message }}</div>*/
/*                         {% endfor %}*/
/*                     </div>*/
/*                 <form method="POST" action="{{ url('admin_movie_edit', {'id' : movie.getId}) }}" enctype="multipart/form-data">*/
/* */
/*                     <label for="title"><i class="fa fa-film" aria-hidden="true"></i> Title</label>*/
/*                     <input class="form-control" type="text" id="title" name="title" value="{{movie.getTitle}}"/>*/
/* */
/*                     <label for="genres"><i class="fa fa-film" aria-hidden="true"></i> Genres</label>*/
/*                     <br>*/
/*                     {% for genre in genreList %}*/
/*                     <input type="checkbox" name="genres[{{ loop.index }}]" value="{{ genre.getId }}"{% if genre.getName in movie.getGenres %} checked {% endif %}/>*/
/*                            <label for="genres[{{ loop.index }}]">*/
/*                         {{ genre.getName }}*/
/*                     </label>*/
/*                     {% endfor %}  */
/*                     <br>*/
/*                     <label for="year"><i class="fa fa-film" aria-hidden="true"></i> Year</label>*/
/*                     <input class="form-control" type="text" id="year" name="year" value="{{ movie.getYear }}" />*/
/* */
/*                     <label for="cast"><i class="fa fa-film" aria-hidden="true"></i> Cast (names separated by commas)</label>*/
/*                     <input class="form-control" type="text" id="cast" name="cast" value="{{ movie.getCast }}" />*/
/* */
/*                     <label for="duration"><i class="fa fa-film" aria-hidden="true"></i> Duration (hours)</label>*/
/*                     <input class="form-control" type="text" id="duration" name="duration" value="{{ movie.getDuration }}" readonly/>*/
/* */
/*                     <label for="poster"><i class="fa fa-film" aria-hidden="true"></i> Poster</label>*/
/*                     <input class="form-control" type="file" id="poster" name="poster" value="{{ movie.getPoster }}"/> */
/*                     <label for="link_imdb"><i class="fa fa-film" aria-hidden="true"></i> Imdb page link</label>*/
/*                     <input class="form-control" type="text" id="link_imdb" name="link_imdb" value="{{ movie.getLinkImdb }}"/>*/
/*                     <button class="btn btn-lg btn-primary btn-block" type="submit">Submit <i class="fa fa-paper-plane" aria-hidden="true"></i></button>*/
/*                 </form>*/
/*                 */
/*             </div>*/
/*  */
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
