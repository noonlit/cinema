<?php

/* Schedule/showscheduledmovies.html */
class __TwigTemplate_e380b9cdf38e4a136907270013de47f29d389f0f9fc61667ea557fe4154b3c40 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Schedule/showscheduledmovies.html", 1);
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
        $__internal_a9e29203800310ccb250337e7d7b72836537fce6ccd32ae3d349e2d7966a2f62 = $this->env->getExtension("native_profiler");
        $__internal_a9e29203800310ccb250337e7d7b72836537fce6ccd32ae3d349e2d7966a2f62->enter($__internal_a9e29203800310ccb250337e7d7b72836537fce6ccd32ae3d349e2d7966a2f62_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Schedule/showscheduledmovies.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a9e29203800310ccb250337e7d7b72836537fce6ccd32ae3d349e2d7966a2f62->leave($__internal_a9e29203800310ccb250337e7d7b72836537fce6ccd32ae3d349e2d7966a2f62_prof);

    }

    // line 3
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_421300d0f2828f6610489f708e18c061d84fad86a6cf380939a4db8cdca40ca1 = $this->env->getExtension("native_profiler");
        $__internal_421300d0f2828f6610489f708e18c061d84fad86a6cf380939a4db8cdca40ca1->enter($__internal_421300d0f2828f6610489f708e18c061d84fad86a6cf380939a4db8cdca40ca1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 4
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxEditableElements.js\"></script>
<script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxDeleteTableRow.js\"></script>
<script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxAddTableRow.js\"></script>
";
        
        $__internal_421300d0f2828f6610489f708e18c061d84fad86a6cf380939a4db8cdca40ca1->leave($__internal_421300d0f2828f6610489f708e18c061d84fad86a6cf380939a4db8cdca40ca1_prof);

    }

    // line 9
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_a0901453591123d4882b7a8f0c734a91484914b52e651f80f77470cab0aeda9c = $this->env->getExtension("native_profiler");
        $__internal_a0901453591123d4882b7a8f0c734a91484914b52e651f80f77470cab0aeda9c->enter($__internal_a0901453591123d4882b7a8f0c734a91484914b52e651f80f77470cab0aeda9c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 10
        echo "
new AjaxEditableElements('#movie-container', 'movie/edit/{id}', function (data) {
swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
});  

\$('#movies-per-page').on('change', function() {
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
        
        $__internal_a0901453591123d4882b7a8f0c734a91484914b52e651f80f77470cab0aeda9c->leave($__internal_a0901453591123d4882b7a8f0c734a91484914b52e651f80f77470cab0aeda9c_prof);

    }

    // line 28
    public function block_content($context, array $blocks = array())
    {
        $__internal_1baac1501bab42af47f55b2bda9a4ebf709e8e3433dff1eb54764d947db6f0aa = $this->env->getExtension("native_profiler");
        $__internal_1baac1501bab42af47f55b2bda9a4ebf709e8e3433dff1eb54764d947db6f0aa->enter($__internal_1baac1501bab42af47f55b2bda9a4ebf709e8e3433dff1eb54764d947db6f0aa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 29
        echo "<div class=\"banner text-center\">
    ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 31
            echo "    ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\" id=\"movie-container\">
        <div class=\"wrapper col-lg-12 col-centered\">
            <div class=\"showList\">
                
                <div class=\"section-title\">
                    <p class=\"pull-left\">Scheduled movies</p>                
                    <div class=\"users-per-page pull-right\">
                        <span>Movies per page</span>
                        <select id=\"movies-per-page\" class='form-control movies-per-page'>
                            ";
        // line 47
        $context["values"] = array(0 => "all", 1 => 8, 2 => 16, 3 => 24);
        // line 48
        echo "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["values"]) ? $context["values"] : $this->getContext($context, "values")));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 49
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\" ";
            if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()) == $context["value"])) {
                echo " selected='selected' ";
            }
            echo " >";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "                        </select>
                    </div>                    
                </div>                  

                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["movieList"]) ? $context["movieList"] : $this->getContext($context, "movieList")));
        foreach ($context['_seq'] as $context["_key"] => $context["movie"]) {
            // line 64
            echo "                            <tr> 
                                <th scope=\"row\">";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getId", array()), "html", null, true);
            echo "</th>
                                <td contenteditable=\"false\" class=\"\" data-id=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getTitle", array()), "html", null, true);
            echo "</td>
                                <td class=\"text-right\">
                                    <a href=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_movie_edit", array("id" => $this->getAttribute($context["movie"], "getId", array()))), "html", null, true);
            echo "\" action=\"\" class=\"\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getId", array()), "html", null, true);
            echo "\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> Edit</a>
                                </td>
                            </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movie'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "                        </tbody>
                    </table>

                    <div class=\"pagination-container clearfix\">
                        <div class=\"col-lg-12\">
                            <ul class=\"pagination pull-right\">
                                ";
        // line 78
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) > 1)) {
            // line 79
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_scheduled_movies_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) - 1), "movies_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\" class='btn btn-link' ><i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>Previous</a></li>
                                ";
        }
        // line 81
        echo "                                ";
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) < $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getTotalPages", array()))) {
            // line 82
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_scheduled_movies_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) + 1), "movies_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\" class='btn btn-link' >Next <i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i></a></li>
                                ";
        }
        // line 83
        echo "  
                            </ul>
                        </div>
                    </div> 
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_1baac1501bab42af47f55b2bda9a4ebf709e8e3433dff1eb54764d947db6f0aa->leave($__internal_1baac1501bab42af47f55b2bda9a4ebf709e8e3433dff1eb54764d947db6f0aa_prof);

    }

    public function getTemplateName()
    {
        return "Schedule/showscheduledmovies.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 83,  212 => 82,  209 => 81,  203 => 79,  201 => 78,  193 => 72,  181 => 68,  174 => 66,  170 => 65,  167 => 64,  163 => 63,  149 => 51,  134 => 49,  129 => 48,  127 => 47,  111 => 33,  102 => 31,  98 => 30,  95 => 29,  89 => 28,  66 => 10,  60 => 9,  51 => 6,  47 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block pageIncludes %}*/
/* <script src="{{ app.request.basepath }}/js/AjaxEditableElements.js"></script>*/
/* <script src="{{ app.request.basepath }}/js/AjaxDeleteTableRow.js"></script>*/
/* <script src="{{ app.request.basepath }}/js/AjaxAddTableRow.js"></script>*/
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/* new AjaxEditableElements('#movie-container', 'movie/edit/{id}', function (data) {*/
/* swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/* });  */
/* */
/* $('#movies-per-page').on('change', function() {*/
/* console.log("asas");*/
/* var moviesPerPage = $(this).val();*/
/* var url = window.location.pathname + '?page=1&movies_per_page=' + moviesPerPage;*/
/* $(location).attr('href', url);*/
/* });*/
/* */
/* $('#prev-page, #next-page').click(function(){*/
/* var url = window.location.pathname;*/
/* console.log();*/
/* });*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* <div class="banner text-center">*/
/*     {% for message in app.session.getFlashBag.get('error') %}*/
/*     {{ message }}*/
/*     {% endfor %}*/
/*     <h1>Cinema Village</h1>*/
/*     <h2>A new generation movie theater in your town. Try us!</h2>*/
/* </div>*/
/* */
/* <div class="wrapperArea">*/
/*     <div class="container" id="movie-container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/*             <div class="showList">*/
/*                 */
/*                 <div class="section-title">*/
/*                     <p class="pull-left">Scheduled movies</p>                */
/*                     <div class="users-per-page pull-right">*/
/*                         <span>Movies per page</span>*/
/*                         <select id="movies-per-page" class='form-control movies-per-page'>*/
/*                             {% set values = [ 'all', 8, 16, 24 ]%}*/
/*                             {% for value in values %}*/
/*                                 <option value="{{ value }}" {% if paginator.getResultsPerPage == value %} selected='selected' {% endif %} >{{ value }}</option>*/
/*                             {% endfor %}*/
/*                         </select>*/
/*                     </div>                    */
/*                 </div>                  */
/* */
/*                     <table class="table">*/
/*                         <thead>*/
/*                             <tr>*/
/*                                 <th>#</th>*/
/*                                 <th>Title</th>*/
/*                             </tr>*/
/*                         </thead>*/
/*                         <tbody>*/
/*                             {% for movie in movieList %}*/
/*                             <tr> */
/*                                 <th scope="row">{{ movie.getId }}</th>*/
/*                                 <td contenteditable="false" class="" data-id="{{ movie.getId }}">{{ movie.getTitle }}</td>*/
/*                                 <td class="text-right">*/
/*                                     <a href="{{ url('admin_show_movie_edit', {'id' : movie.getId}) }}" action="" class="" data-id="{{ movie.getId }}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>*/
/*                                 </td>*/
/*                             </tr>*/
/*                             {% endfor %}*/
/*                         </tbody>*/
/*                     </table>*/
/* */
/*                     <div class="pagination-container clearfix">*/
/*                         <div class="col-lg-12">*/
/*                             <ul class="pagination pull-right">*/
/*                                 {% if paginator.getCurrentPage > 1 %}*/
/*                                 <li><a href="{{ url('admin_show_scheduled_movies_paginated', {'page': paginator.getCurrentPage - 1, 'movies_per_page': paginator.getResultsPerPage}) }}" class='btn btn-link' ><i class="fa fa-chevron-left" aria-hidden="true"></i>Previous</a></li>*/
/*                                 {% endif %}*/
/*                                 {% if paginator.getCurrentPage < paginator.getTotalPages %}*/
/*                                 <li><a href="{{ url('admin_show_scheduled_movies_paginated', {'page': paginator.getCurrentPage + 1, 'movies_per_page': paginator.getResultsPerPage}) }}" class='btn btn-link' >Next <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>*/
/*                                 {% endif %}  */
/*                             </ul>*/
/*                         </div>*/
/*                     </div> */
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
