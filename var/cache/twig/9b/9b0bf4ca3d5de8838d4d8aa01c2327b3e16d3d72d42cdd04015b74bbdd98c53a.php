<?php

/* Genre/genre.html */
class __TwigTemplate_2c81d8a98550033f6d8e9ec542d8d2c6994e79ef5b5eb1ffa92c7e25455c5eea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Genre/genre.html", 1);
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
        $__internal_ed61c6fa52edb21232ee221fe54380edee32f068763fe98c40dd0116fbef3105 = $this->env->getExtension("native_profiler");
        $__internal_ed61c6fa52edb21232ee221fe54380edee32f068763fe98c40dd0116fbef3105->enter($__internal_ed61c6fa52edb21232ee221fe54380edee32f068763fe98c40dd0116fbef3105_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Genre/genre.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ed61c6fa52edb21232ee221fe54380edee32f068763fe98c40dd0116fbef3105->leave($__internal_ed61c6fa52edb21232ee221fe54380edee32f068763fe98c40dd0116fbef3105_prof);

    }

    // line 2
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_7bf6681313e75e33faac9772435c9743802678421cb254ac832d773408c29490 = $this->env->getExtension("native_profiler");
        $__internal_7bf6681313e75e33faac9772435c9743802678421cb254ac832d773408c29490->enter($__internal_7bf6681313e75e33faac9772435c9743802678421cb254ac832d773408c29490_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 3
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxEditableElements.js\"></script>
<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxDeleteTableRow.js\"></script>
<script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxAddTableRow.js\"></script>
";
        
        $__internal_7bf6681313e75e33faac9772435c9743802678421cb254ac832d773408c29490->leave($__internal_7bf6681313e75e33faac9772435c9743802678421cb254ac832d773408c29490_prof);

    }

    // line 8
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_cb6b702b5e5bd4e4e786253a894250aa49d957cdf4dd8e39088321b2cc35b342 = $this->env->getExtension("native_profiler");
        $__internal_cb6b702b5e5bd4e4e786253a894250aa49d957cdf4dd8e39088321b2cc35b342->enter($__internal_cb6b702b5e5bd4e4e786253a894250aa49d957cdf4dd8e39088321b2cc35b342_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 9
        echo "
new AjaxEditableElements('#genre-container', 'edit/{id}', function (data) {
swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
});

deleteTableRowRefresh = new AjaxDeleteTableRow('#genre-container', 'delete/{id}', function (data) {
swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
});

new AjaxAddTableRow('#genre-container', 'add', function (data) {
swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});

if( data.type == 'success' ) {
var rowData = '<tr><th scope=\"row\">' + data.genreId + '</th><td contenteditable=\"true\" class=\"editable\" data-id=\"' + data.genreId + '\">' + data.genreName + '</td><td class=\"text-right\"><a href=\"#\" class=\"remove\" data-id=\"' + data.genreId + '\"><i class=\"fa fa-trash fa-1x\" aria-hidden=\"true\"></i> Remove</a></td></tr>';
\$('table').append(rowData);
}
});

\$('.genres-per-page').on('change', function() {
console.log(\"asas\");
var genresPerPage = \$(this).val();
var url = window.location.pathname + '?page=1&genres_per_page=' + genresPerPage;
\$(location).attr('href', url);
});

\$('#prev-page, #next-page').click(function(){
var url = window.location.pathname;
console.log();
});



";
        
        $__internal_cb6b702b5e5bd4e4e786253a894250aa49d957cdf4dd8e39088321b2cc35b342->leave($__internal_cb6b702b5e5bd4e4e786253a894250aa49d957cdf4dd8e39088321b2cc35b342_prof);

    }

    // line 43
    public function block_content($context, array $blocks = array())
    {
        $__internal_ee658346299cc8405314b3027481f70d9e69a5994fe1044106ccf828c6702ce1 = $this->env->getExtension("native_profiler");
        $__internal_ee658346299cc8405314b3027481f70d9e69a5994fe1044106ccf828c6702ce1->enter($__internal_ee658346299cc8405314b3027481f70d9e69a5994fe1044106ccf828c6702ce1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 44
        echo "<div class=\"banner text-center\">
    ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 46
            echo "                ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 47
                echo "                        <div class=\"alert alert-danger\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                ";
            }
            // line 49
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  
            ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 51
            echo "                ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 52
                echo "                        <div class=\"alert alert-success\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                ";
            }
            // line 54
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " 
    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\" id=\"genre-container\">
        <div class=\"wrapper col-lg-12 col-centered\">

            <div class=\"showList\">  

                <div class=\"section-title\">
                    <p class=\"pull-left\">View all available Genres</p>
                    <div class=\"users-per-page pull-right\">
                        <span>Genres per page</span>
                        <select id=\"genres-per-page\" class='form-control genres-per-page'>
                            ";
        // line 70
        $context["values"] = array(0 => "all", 1 => 8, 2 => 16, 3 => 24);
        // line 71
        echo "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["values"]) ? $context["values"] : $this->getContext($context, "values")));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 72
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
        // line 74
        echo "                        </select>
                    </div>                    
                </div>    

                <table class=\"table\">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["genreList"]) ? $context["genreList"] : $this->getContext($context, "genreList")));
        foreach ($context['_seq'] as $context["_key"] => $context["genre"]) {
            // line 87
            echo "                        <tr>
                            <th scope=\"row\">";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "</th>
                            <td contenteditable=\"true\" class=\"editable\" data-id=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getName", array()), "html", null, true);
            echo "</td>
                            <td class=\"text-right\">
                                <a href=\"javascript:void(0);\" class=\"remove\" data-id=\"";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "\"><i class=\"fa fa-trash fa-1x\" aria-hidden=\"true\"></i> Remove</a>
                            </td>
                        </tr>                            
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['genre'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "                  

                    </tbody>
                </table>

                <span class=\"section-title text-left\">Add Genre</span><hr/>

                <div class=\"row\">
                    <form method=\"post\" action=\"";
        // line 102
        echo $this->env->getExtension('routing')->getUrl("admin_genre_add");
        echo "\" class=\"addRow add-genre\">

                        <div class=\"col-lg-9\">
                            <label for=\"genreName\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> New Genre Name</label>
                            <input class=\"form-control\" type=\"text\" id=\"genreName\" name=\"genreName\" placeholder=\"Enter a new Genre name\" />
                        </div>

                        <div class=\"col-lg-3\">
                            <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Add new Genre</button>
                        </div>
                    </form>  
                </div>

                <div class=\"pagination-container clearfix\">
                    <div class=\"col-lg-12\">
                            <ul class=\"pagination pull-right\">
                                ";
        // line 118
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) > 1)) {
            // line 119
            echo "                                    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_genres_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) - 1), "genres_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\"><i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i> Previous</a></li>
                                ";
        }
        // line 121
        echo "                                
                                ";
        // line 122
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) < $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getTotalPages", array()))) {
            // line 123
            echo "                                    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_genres_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) + 1), "genres_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\">Next <i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i></a></li>
                                ";
        }
        // line 124
        echo "    
                            </ul>
                    </div>
                </div>  


            </div>

        </div>
    </div>
</div>
";
        
        $__internal_ee658346299cc8405314b3027481f70d9e69a5994fe1044106ccf828c6702ce1->leave($__internal_ee658346299cc8405314b3027481f70d9e69a5994fe1044106ccf828c6702ce1_prof);

    }

    public function getTemplateName()
    {
        return "Genre/genre.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  283 => 124,  277 => 123,  275 => 122,  272 => 121,  266 => 119,  264 => 118,  245 => 102,  235 => 94,  225 => 91,  218 => 89,  214 => 88,  211 => 87,  207 => 86,  193 => 74,  178 => 72,  173 => 71,  171 => 70,  148 => 54,  142 => 52,  139 => 51,  135 => 50,  127 => 49,  121 => 47,  118 => 46,  114 => 45,  111 => 44,  105 => 43,  66 => 9,  60 => 8,  51 => 5,  47 => 4,  42 => 3,  36 => 2,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* {% block pageIncludes %}*/
/* <script src="{{ app.request.basepath }}/js/AjaxEditableElements.js"></script>*/
/* <script src="{{ app.request.basepath }}/js/AjaxDeleteTableRow.js"></script>*/
/* <script src="{{ app.request.basepath }}/js/AjaxAddTableRow.js"></script>*/
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/* new AjaxEditableElements('#genre-container', 'edit/{id}', function (data) {*/
/* swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/* });*/
/* */
/* deleteTableRowRefresh = new AjaxDeleteTableRow('#genre-container', 'delete/{id}', function (data) {*/
/* swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/* });*/
/* */
/* new AjaxAddTableRow('#genre-container', 'add', function (data) {*/
/* swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/* */
/* if( data.type == 'success' ) {*/
/* var rowData = '<tr><th scope="row">' + data.genreId + '</th><td contenteditable="true" class="editable" data-id="' + data.genreId + '">' + data.genreName + '</td><td class="text-right"><a href="#" class="remove" data-id="' + data.genreId + '"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> Remove</a></td></tr>';*/
/* $('table').append(rowData);*/
/* }*/
/* });*/
/* */
/* $('.genres-per-page').on('change', function() {*/
/* console.log("asas");*/
/* var genresPerPage = $(this).val();*/
/* var url = window.location.pathname + '?page=1&genres_per_page=' + genresPerPage;*/
/* $(location).attr('href', url);*/
/* });*/
/* */
/* $('#prev-page, #next-page').click(function(){*/
/* var url = window.location.pathname;*/
/* console.log();*/
/* });*/
/* */
/* */
/* */
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* <div class="banner text-center">*/
/*     {% for message in flashBag.get('error') %}*/
/*                 {% if message is defined and message is not empty %}*/
/*                         <div class="alert alert-danger" role="alert">{{ message }}</div>*/
/*                 {% endif %}*/
/*             {% endfor %}  */
/*             {% for message in flashBag.get('success') %}*/
/*                 {% if message is defined and message is not empty %}*/
/*                         <div class="alert alert-success" role="alert">{{ message }}</div>*/
/*                 {% endif %}*/
/*             {% endfor %} */
/*     <h1>Cinema Village</h1>*/
/*     <h2>A new generation movie theater in your town. Try us!</h2>*/
/* </div>*/
/* */
/* <div class="wrapperArea">*/
/*     <div class="container" id="genre-container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/* */
/*             <div class="showList">  */
/* */
/*                 <div class="section-title">*/
/*                     <p class="pull-left">View all available Genres</p>*/
/*                     <div class="users-per-page pull-right">*/
/*                         <span>Genres per page</span>*/
/*                         <select id="genres-per-page" class='form-control genres-per-page'>*/
/*                             {% set values = [ 'all', 8, 16, 24 ]%}*/
/*                             {% for value in values %}*/
/*                                 <option value="{{ value }}" {% if paginator.getResultsPerPage == value %} selected='selected' {% endif %} >{{ value }}</option>*/
/*                             {% endfor %}*/
/*                         </select>*/
/*                     </div>                    */
/*                 </div>    */
/* */
/*                 <table class="table">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>ID</th>*/
/*                             <th>Name</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                         {% for genre in genreList %}*/
/*                         <tr>*/
/*                             <th scope="row">{{ genre.getId }}</th>*/
/*                             <td contenteditable="true" class="editable" data-id="{{ genre.getId }}">{{ genre.getName }}</td>*/
/*                             <td class="text-right">*/
/*                                 <a href="javascript:void(0);" class="remove" data-id="{{ genre.getId }}"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> Remove</a>*/
/*                             </td>*/
/*                         </tr>                            */
/*                         {% endfor %}                  */
/* */
/*                     </tbody>*/
/*                 </table>*/
/* */
/*                 <span class="section-title text-left">Add Genre</span><hr/>*/
/* */
/*                 <div class="row">*/
/*                     <form method="post" action="{{ url('admin_genre_add') }}" class="addRow add-genre">*/
/* */
/*                         <div class="col-lg-9">*/
/*                             <label for="genreName"><i class="fa fa-film" aria-hidden="true"></i> New Genre Name</label>*/
/*                             <input class="form-control" type="text" id="genreName" name="genreName" placeholder="Enter a new Genre name" />*/
/*                         </div>*/
/* */
/*                         <div class="col-lg-3">*/
/*                             <button class="btn btn-lg btn-primary btn-block" type="submit">Add new Genre</button>*/
/*                         </div>*/
/*                     </form>  */
/*                 </div>*/
/* */
/*                 <div class="pagination-container clearfix">*/
/*                     <div class="col-lg-12">*/
/*                             <ul class="pagination pull-right">*/
/*                                 {% if paginator.getCurrentPage > 1 %}*/
/*                                     <li><a href="{{ url('admin_show_genres_paginated', {'page': paginator.getCurrentPage - 1, 'genres_per_page': paginator.getResultsPerPage}) }}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Previous</a></li>*/
/*                                 {% endif %}*/
/*                                 */
/*                                 {% if paginator.getCurrentPage < paginator.getTotalPages %}*/
/*                                     <li><a href="{{ url('admin_show_genres_paginated', {'page': paginator.getCurrentPage + 1, 'genres_per_page': paginator.getResultsPerPage}) }}">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>*/
/*                                 {% endif %}    */
/*                             </ul>*/
/*                     </div>*/
/*                 </div>  */
/* */
/* */
/*             </div>*/
/* */
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
