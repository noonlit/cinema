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
        $__internal_ec8863867d94e0150d7a97b2d2cc7f70d02c1d84d4bbf26aff1814a99c31bb9c = $this->env->getExtension("native_profiler");
        $__internal_ec8863867d94e0150d7a97b2d2cc7f70d02c1d84d4bbf26aff1814a99c31bb9c->enter($__internal_ec8863867d94e0150d7a97b2d2cc7f70d02c1d84d4bbf26aff1814a99c31bb9c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Movie/addmovie.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ec8863867d94e0150d7a97b2d2cc7f70d02c1d84d4bbf26aff1814a99c31bb9c->leave($__internal_ec8863867d94e0150d7a97b2d2cc7f70d02c1d84d4bbf26aff1814a99c31bb9c_prof);

    }

    // line 4
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_707d100764c630be64d1a9b78f11986d956e474ebc712e3655cfa8a839866402 = $this->env->getExtension("native_profiler");
        $__internal_707d100764c630be64d1a9b78f11986d956e474ebc712e3655cfa8a839866402->enter($__internal_707d100764c630be64d1a9b78f11986d956e474ebc712e3655cfa8a839866402_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        
        $__internal_707d100764c630be64d1a9b78f11986d956e474ebc712e3655cfa8a839866402->leave($__internal_707d100764c630be64d1a9b78f11986d956e474ebc712e3655cfa8a839866402_prof);

    }

    // line 7
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_be1502afbd289e6b201a1dfedbf010b5fc6c7f3aa8ea068a88da47b322275d55 = $this->env->getExtension("native_profiler");
        $__internal_be1502afbd289e6b201a1dfedbf010b5fc6c7f3aa8ea068a88da47b322275d55->enter($__internal_be1502afbd289e6b201a1dfedbf010b5fc6c7f3aa8ea068a88da47b322275d55_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 8
        echo "    function getCurrentYear() {

        var now = new Date();
        return now.getFullYear();
    }
    var currentYear = getCurrentYear();
    \$(\"#year\").attr(\"max\", currentYear);
";
        
        $__internal_be1502afbd289e6b201a1dfedbf010b5fc6c7f3aa8ea068a88da47b322275d55->leave($__internal_be1502afbd289e6b201a1dfedbf010b5fc6c7f3aa8ea068a88da47b322275d55_prof);

    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        $__internal_a95d07115a15d46bf23517c4068a98eca7658bfb65e3f3c1422af98ba895d44a = $this->env->getExtension("native_profiler");
        $__internal_a95d07115a15d46bf23517c4068a98eca7658bfb65e3f3c1422af98ba895d44a->enter($__internal_a95d07115a15d46bf23517c4068a98eca7658bfb65e3f3c1422af98ba895d44a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 20
        echo "<div class=\"banner text-center\">
    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\" id=\"addmovie-container\">
        <div class=\"wrapper col-lg-12 col-centered\">

            <div class=\"showList\">  

                <div class=\"section-title\">
                    <p class=\"pull-left\">Add new movie</p>               
                </div>     

                <form method=\"POST\" action=\"";
        // line 35
        echo $this->env->getExtension('routing')->getUrl("admin_movie_add");
        echo "\" enctype=\"multipart/form-data\">

                    <div class=\"add-movie col-lg-9 col-centered\">
                        ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 39
            echo "                            <div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 42
            echo "                            <div class=\"alert alert-success\" role=\"alert\">";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "</div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "
                        <div class=\"row\">
                            <div class=\"col-lg-6\">
                                <label for=\"title\"><i class=\"fa fa-video-camera\" aria-hidden=\"true\"></i> Title</label>
                                <input required class=\"form-control\" type=\"text\" id=\"title\" name=\"title\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, ((array_key_exists("last_title", $context)) ? (_twig_default_filter((isset($context["last_title"]) ? $context["last_title"] : $this->getContext($context, "last_title")), "")) : ("")), "html", null, true);
        echo "\" placeholder=\"Movie title\" maxlength=\"45\"/>
                                <p id=\"invalid-title\"></p>
                            </div>
                            <div class=\"col-lg-6\">
                                <label for=\"year\"><i class=\"fa fa-globe\" aria-hidden=\"true\"></i> Year</label>
                                <input required min=\"1900\" max=\"\" pattern=\"\\d{4}\" class=\"form-control\" type=\"number\" id=\"year\" name=\"year\" value=\"";
        // line 53
        echo twig_escape_filter($this->env, ((array_key_exists("last_year", $context)) ? (_twig_default_filter((isset($context["last_year"]) ? $context["last_year"] : $this->getContext($context, "last_year")), "")) : ("")), "html", null, true);
        echo "\" placeholder=\"Movie year\" />
                                <p id=\"invalid-year\"></p>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"col-lg-6\">
                                <label for=\"cast\"><i class=\"fa fa-male\" aria-hidden=\"true\"></i><i class=\"fa fa-female\" aria-hidden=\"true\"></i> Cast (names separated by commas)</label>
                                <input required pattern=\"[\\w,. ]+\" class=\"form-control\" type=\"text\" id=\"cast\" name=\"cast\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, ((array_key_exists("last_cast", $context)) ? (_twig_default_filter((isset($context["last_cast"]) ? $context["last_cast"] : $this->getContext($context, "last_cast")), "")) : ("")), "html", null, true);
        echo "\" placeholder=\"Movie Casting\" />
                                <p id=\"invalid-cast\"></p>
                            </div>
                            <div class=\"col-lg-6\">
                                <label for=\"duration\"><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> Duration (hours)</label>
                                <input required class=\"form-control\" type=\"number\" id=\"duration\" name=\"duration\" readonly value=\"2\" placeholder=\"Movie duration\" />
                                <p id=\"invalid-duration\"></p>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"col-lg-6\">
                                <label for=\"poster\"><i class=\"fa fa-picture-o\" aria-hidden=\"true\"></i> Poster</label>
                                <input class=\"form-control\" type=\"file\" id=\"poster\" name=\"poster\"/> 
                                <p id=\"invalid-poster\"></p>
                            </div>
                            <div class=\"col-lg-6\">
                                <label for=\"link_imdb\"><i class=\"fa fa-link\" aria-hidden=\"true\"></i> IMDB Page Url</label>
                                <input required pattern=\"http:\\/\\/(?:www\\.)?imdb\\.com\\/title\\/tt[0-9a-z=?/]*\" class=\"form-control\" type=\"url\" id=\"link_imdb\" name=\"link_imdb\" value=\"";
        // line 79
        echo twig_escape_filter($this->env, ((array_key_exists("last_link_imdb", $context)) ? (_twig_default_filter((isset($context["last_link_imdb"]) ? $context["last_link_imdb"] : $this->getContext($context, "last_link_imdb")), "")) : ("")), "html", null, true);
        echo "\" placeholder=\"Movie IMDB Link\" />
                                <p id=\"invalid-link_imdb\"></p>
                            </div>
                        </div>                        
                        
                        <label><i class=\"fa fa-film\" aria-hidden=\"true\"></i> Select Genre</label>
                        <div class=\"genreList\">
                            ";
        // line 86
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
            // line 87
            echo "                                <div class=\"col-lg-2\">
                                    <div class=\"row\">
                                        <label for=\"genres[";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "]\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getName", array()), "html", null, true);
            echo "</label>
                                        <input type=\"checkbox\" name=\"genres[";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "\" ";
            if (twig_in_filter($this->getAttribute($context["genre"], "getId", array()), (isset($context["last_genres"]) ? $context["last_genres"] : $this->getContext($context, "last_genres")))) {
                echo " checked ";
            }
            echo " />
                                    </div>
                                </div>
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
        // line 94
        echo "                            
                            <p id=\"invalid-genres\"></p>
                        </div>

                        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Add movie <i class=\"fa fa-paper-plane\" aria-hidden=\"true\"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_a95d07115a15d46bf23517c4068a98eca7658bfb65e3f3c1422af98ba895d44a->leave($__internal_a95d07115a15d46bf23517c4068a98eca7658bfb65e3f3c1422af98ba895d44a_prof);

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
        return array (  230 => 94,  206 => 90,  200 => 89,  196 => 87,  179 => 86,  169 => 79,  148 => 61,  137 => 53,  129 => 48,  123 => 44,  114 => 42,  109 => 41,  100 => 39,  96 => 38,  90 => 35,  73 => 20,  67 => 19,  53 => 8,  47 => 7,  36 => 4,  11 => 1,);
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
/*     <div class="container" id="addmovie-container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/* */
/*             <div class="showList">  */
/* */
/*                 <div class="section-title">*/
/*                     <p class="pull-left">Add new movie</p>               */
/*                 </div>     */
/* */
/*                 <form method="POST" action="{{ url('admin_movie_add') }}" enctype="multipart/form-data">*/
/* */
/*                     <div class="add-movie col-lg-9 col-centered">*/
/*                         {% for message in flashBag.get('error') %}*/
/*                             <div class="alert alert-danger" role="alert">{{ message }}</div>*/
/*                         {% endfor %}*/
/*                         {% for message in flashBag.get('success') %}*/
/*                             <div class="alert alert-success" role="alert">{{ message }}</div>*/
/*                         {% endfor %}*/
/* */
/*                         <div class="row">*/
/*                             <div class="col-lg-6">*/
/*                                 <label for="title"><i class="fa fa-video-camera" aria-hidden="true"></i> Title</label>*/
/*                                 <input required class="form-control" type="text" id="title" name="title" value="{{last_title|default("")}}" placeholder="Movie title" maxlength="45"/>*/
/*                                 <p id="invalid-title"></p>*/
/*                             </div>*/
/*                             <div class="col-lg-6">*/
/*                                 <label for="year"><i class="fa fa-globe" aria-hidden="true"></i> Year</label>*/
/*                                 <input required min="1900" max="" pattern="\d{4}" class="form-control" type="number" id="year" name="year" value="{{last_year|default("")}}" placeholder="Movie year" />*/
/*                                 <p id="invalid-year"></p>*/
/*                             </div>*/
/*                         </div>*/
/* */
/*                         <div class="row">*/
/*                             <div class="col-lg-6">*/
/*                                 <label for="cast"><i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-female" aria-hidden="true"></i> Cast (names separated by commas)</label>*/
/*                                 <input required pattern="[\w,. ]+" class="form-control" type="text" id="cast" name="cast" value="{{last_cast|default("")}}" placeholder="Movie Casting" />*/
/*                                 <p id="invalid-cast"></p>*/
/*                             </div>*/
/*                             <div class="col-lg-6">*/
/*                                 <label for="duration"><i class="fa fa-clock-o" aria-hidden="true"></i> Duration (hours)</label>*/
/*                                 <input required class="form-control" type="number" id="duration" name="duration" readonly value="2" placeholder="Movie duration" />*/
/*                                 <p id="invalid-duration"></p>*/
/*                             </div>*/
/*                         </div>*/
/* */
/*                         <div class="row">*/
/*                             <div class="col-lg-6">*/
/*                                 <label for="poster"><i class="fa fa-picture-o" aria-hidden="true"></i> Poster</label>*/
/*                                 <input class="form-control" type="file" id="poster" name="poster"/> */
/*                                 <p id="invalid-poster"></p>*/
/*                             </div>*/
/*                             <div class="col-lg-6">*/
/*                                 <label for="link_imdb"><i class="fa fa-link" aria-hidden="true"></i> IMDB Page Url</label>*/
/*                                 <input required pattern="http:\/\/(?:www\.)?imdb\.com\/title\/tt[0-9a-z=?/]*" class="form-control" type="url" id="link_imdb" name="link_imdb" value="{{last_link_imdb|default("")}}" placeholder="Movie IMDB Link" />*/
/*                                 <p id="invalid-link_imdb"></p>*/
/*                             </div>*/
/*                         </div>                        */
/*                         */
/*                         <label><i class="fa fa-film" aria-hidden="true"></i> Select Genre</label>*/
/*                         <div class="genreList">*/
/*                             {% for genre in genreList %}*/
/*                                 <div class="col-lg-2">*/
/*                                     <div class="row">*/
/*                                         <label for="genres[{{ loop.index0 }}]">{{ genre.getName }}</label>*/
/*                                         <input type="checkbox" name="genres[{{ loop.index0 }}]" value="{{ genre.getId }}" {% if genre.getId in last_genres %} checked {% endif %} />*/
/*                                     </div>*/
/*                                 </div>*/
/*                             {% endfor %}*/
/*                             */
/*                             <p id="invalid-genres"></p>*/
/*                         </div>*/
/* */
/*                         <button class="btn btn-lg btn-primary btn-block" type="submit">Add movie <i class="fa fa-paper-plane" aria-hidden="true"></i></button>*/
/*                 </form>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
