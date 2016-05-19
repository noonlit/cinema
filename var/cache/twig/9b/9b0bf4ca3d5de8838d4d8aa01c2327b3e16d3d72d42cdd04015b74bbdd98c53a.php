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
        $__internal_6a92698854e98840218975071de099a1fb5aa95d4ae00e1fc10881050d6dd793 = $this->env->getExtension("native_profiler");
        $__internal_6a92698854e98840218975071de099a1fb5aa95d4ae00e1fc10881050d6dd793->enter($__internal_6a92698854e98840218975071de099a1fb5aa95d4ae00e1fc10881050d6dd793_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Genre/genre.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6a92698854e98840218975071de099a1fb5aa95d4ae00e1fc10881050d6dd793->leave($__internal_6a92698854e98840218975071de099a1fb5aa95d4ae00e1fc10881050d6dd793_prof);

    }

    // line 2
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_e7c5a4f383db6bf4fdddf4252572ad778d1c886049c1c50eed60da97c7c85825 = $this->env->getExtension("native_profiler");
        $__internal_e7c5a4f383db6bf4fdddf4252572ad778d1c886049c1c50eed60da97c7c85825->enter($__internal_e7c5a4f383db6bf4fdddf4252572ad778d1c886049c1c50eed60da97c7c85825_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

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
        
        $__internal_e7c5a4f383db6bf4fdddf4252572ad778d1c886049c1c50eed60da97c7c85825->leave($__internal_e7c5a4f383db6bf4fdddf4252572ad778d1c886049c1c50eed60da97c7c85825_prof);

    }

    // line 8
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_bc58b045f778739523f9b039358ec52108e58c671fab695a4f461e0069a65852 = $this->env->getExtension("native_profiler");
        $__internal_bc58b045f778739523f9b039358ec52108e58c671fab695a4f461e0069a65852->enter($__internal_bc58b045f778739523f9b039358ec52108e58c671fab695a4f461e0069a65852_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

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
        
        $__internal_bc58b045f778739523f9b039358ec52108e58c671fab695a4f461e0069a65852->leave($__internal_bc58b045f778739523f9b039358ec52108e58c671fab695a4f461e0069a65852_prof);

    }

    // line 43
    public function block_content($context, array $blocks = array())
    {
        $__internal_141b4cc4c9a64d5b90d26eaed8e6c12d1011091fbd79bca519f7ffcaacd4397d = $this->env->getExtension("native_profiler");
        $__internal_141b4cc4c9a64d5b90d26eaed8e6c12d1011091fbd79bca519f7ffcaacd4397d->enter($__internal_141b4cc4c9a64d5b90d26eaed8e6c12d1011091fbd79bca519f7ffcaacd4397d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 44
        echo "<div class=\"banner text-center\">
    ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 46
            echo "    ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "    <h1>Cinema Village</h1>
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
        // line 63
        $context["values"] = array(0 => "all", 1 => 8, 2 => 16, 3 => 24);
        // line 64
        echo "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["values"]) ? $context["values"] : $this->getContext($context, "values")));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 65
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
        // line 67
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
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["genreList"]) ? $context["genreList"] : $this->getContext($context, "genreList")));
        foreach ($context['_seq'] as $context["_key"] => $context["genre"]) {
            // line 80
            echo "                        <tr>
                            <th scope=\"row\">";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "</th>
                            <td contenteditable=\"true\" class=\"editable\" data-id=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getName", array()), "html", null, true);
            echo "</td>
                            <td class=\"text-right\">
                                <a href=\"javascript:void(0);\" class=\"remove\" data-id=\"";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "\"><i class=\"fa fa-trash fa-1x\" aria-hidden=\"true\"></i> Remove</a>
                            </td>
                        </tr>                            
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['genre'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "                  

                    </tbody>
                </table>

                <span class=\"section-title text-left\">Add Genre</span><hr/>

                <div class=\"row\">
                    <form method=\"post\" action=\"";
        // line 95
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
        // line 111
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) > 1)) {
            // line 112
            echo "                                    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_genres_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) - 1), "genres_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\"><i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i> Previous</a></li>
                                ";
        }
        // line 114
        echo "                                
                                ";
        // line 115
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) < $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getTotalPages", array()))) {
            // line 116
            echo "                                    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_genres_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) + 1), "genres_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\">Next <i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i></a></li>
                                ";
        }
        // line 117
        echo "    
                            </ul>
                    </div>
                </div>  


            </div>

        </div>
    </div>
</div>
";
        
        $__internal_141b4cc4c9a64d5b90d26eaed8e6c12d1011091fbd79bca519f7ffcaacd4397d->leave($__internal_141b4cc4c9a64d5b90d26eaed8e6c12d1011091fbd79bca519f7ffcaacd4397d_prof);

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
        return array (  256 => 117,  250 => 116,  248 => 115,  245 => 114,  239 => 112,  237 => 111,  218 => 95,  208 => 87,  198 => 84,  191 => 82,  187 => 81,  184 => 80,  180 => 79,  166 => 67,  151 => 65,  146 => 64,  144 => 63,  127 => 48,  118 => 46,  114 => 45,  111 => 44,  105 => 43,  66 => 9,  60 => 8,  51 => 5,  47 => 4,  42 => 3,  36 => 2,  11 => 1,);
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
/*     {% for message in app.session.getFlashBag.get('error') %}*/
/*     {{ message }}*/
/*     {% endfor %}*/
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
