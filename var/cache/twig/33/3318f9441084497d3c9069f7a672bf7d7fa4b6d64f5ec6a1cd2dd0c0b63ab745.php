<?php

/* Movie/showmovie.html */
class __TwigTemplate_42ea51df4af1ac69254ecebd928ec006e214e26f9b7fb0d9ff7c80b3d77e449b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Movie/showmovie.html", 1);
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
        $__internal_f1f8568af986f6dc892c9e879ca347a85737c3d5712d92758b72173563ebc9ae = $this->env->getExtension("native_profiler");
        $__internal_f1f8568af986f6dc892c9e879ca347a85737c3d5712d92758b72173563ebc9ae->enter($__internal_f1f8568af986f6dc892c9e879ca347a85737c3d5712d92758b72173563ebc9ae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Movie/showmovie.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f1f8568af986f6dc892c9e879ca347a85737c3d5712d92758b72173563ebc9ae->leave($__internal_f1f8568af986f6dc892c9e879ca347a85737c3d5712d92758b72173563ebc9ae_prof);

    }

    // line 3
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_00155d7f99c5759970b931cb6e73d50fccb1d829063cee2606e0b441c28646e5 = $this->env->getExtension("native_profiler");
        $__internal_00155d7f99c5759970b931cb6e73d50fccb1d829063cee2606e0b441c28646e5->enter($__internal_00155d7f99c5759970b931cb6e73d50fccb1d829063cee2606e0b441c28646e5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 4
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/jquery.cookies.js\"></script>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css\">
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">
    <script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js\"></script>
    <script type=\"text/javascript\" src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>
";
        
        $__internal_00155d7f99c5759970b931cb6e73d50fccb1d829063cee2606e0b441c28646e5->leave($__internal_00155d7f99c5759970b931cb6e73d50fccb1d829063cee2606e0b441c28646e5_prof);

    }

    // line 12
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_31221b0f8a48f2859884571b9147a2a8d78ac48e8166b68e6e8b3d872ad9c466 = $this->env->getExtension("native_profiler");
        $__internal_31221b0f8a48f2859884571b9147a2a8d78ac48e8166b68e6e8b3d872ad9c466->enter($__internal_31221b0f8a48f2859884571b9147a2a8d78ac48e8166b68e6e8b3d872ad9c466_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 13
        echo "
    \$( \".datepicker\" ).datepicker({
    dateFormat: \"yy-mm-dd\",
    minDate: 0,
    });
       
    
    if( Cookies.get('dateSelect') || Cookies.get('hourSelect') ) {
    
        \$.each(Cookies.get(), function( index, value ) {
        
            if( index == 'dateSelect' || index == 'hourSelect' ) {

                \$('#book-movie select[name=\"' + index + '\"] option').each(function() {
                    var self = \$(this);
                    
                    if(value === self.val())
                        self.attr(\"selected\", \"selected\");
                });            
            }
            else if( index == 'numberSeats' ) {
                \$('#book-movie input[name=\"' + index + '\"]').val(value);
            }
            populate_dates();
        });
    }

    
    \$('#book-movie select').on('click', function() {
       Cookies.set('dateSelect', \$('#date_selector').val(), {expires: 7});
       Cookies.set('hourSelect', \$('#hour_selector').val(), {expires: 7});
    });

    \$('#book-movie input').on('change', function() {
       var name = \$(this).attr('name');
       var value = \$(this).val();
       Cookies.set(name, value, { expires: 7 });
       Cookies.set('dateSelect', \$('#date_selector').val(), {expires: 7});
       Cookies.set('hourSelect', \$('#hour_selector').val(), {expires: 7});
    });
    
    \$('#confirm').on('click',function(e) {
    var name = \$(this).attr('name');
    var value = \$(this).val();
    Cookies.set(name, value, { expires: 7 });
    Cookies.set('dateSelect', \$('#date_selector').val(), {expires: 7});
    Cookies.set('hourSelect', \$('#hour_selector').val(), {expires: 7});
    e.preventDefault();
    var date = new Date();
    swal({   title: \"Booking details\",   
        text: \"Exciting to watch ";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getTitle", array()), "html", null, true);
        echo "? In \" + \$('#date_selector').val() + \" you will go at \" + \$('#hour_selector').val() + \" for \" + \$('#numberSeats').val() + \"!\",   
        imageUrl:\"http://goo.gl/xWS6Qp\",  
        showCancelButton: true,   
        confirmButtonColor: \"#3276B1\",   
        confirmButtonText: \"Yes, book it!\",   
        closeOnConfirm: true 
    },
    function(){ 
       var movieName = \"";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getTitle", array()), "html", null, true);
        echo "\";
       var url = '";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "' + '/index_dev.php/user/movie/' + movieName + '/booking';
       \$(location).attr('href', url);
    });
    });
    
    
";
        
        $__internal_31221b0f8a48f2859884571b9147a2a8d78ac48e8166b68e6e8b3d872ad9c466->leave($__internal_31221b0f8a48f2859884571b9147a2a8d78ac48e8166b68e6e8b3d872ad9c466_prof);

    }

    // line 80
    public function block_content($context, array $blocks = array())
    {
        $__internal_fcc3af5961d15c68488d82502f7e0a6361703ae6056efff33b4579a6248e947a = $this->env->getExtension("native_profiler");
        $__internal_fcc3af5961d15c68488d82502f7e0a6361703ae6056efff33b4579a6248e947a->enter($__internal_fcc3af5961d15c68488d82502f7e0a6361703ae6056efff33b4579a6248e947a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 81
        echo "<div class=\"banner text-center\">
    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\">
        <div class=\"wrapper col-lg-12 col-centered\">
            ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 90
            echo "                        ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 91
                echo "                                <div class=\"alert alert-error\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                        ";
            }
            // line 93
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " 
            ";
        // line 94
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 95
            echo "                       ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 96
                echo "                               <div class=\"alert alert-success\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                       ";
            }
            // line 98
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " 
            <div class=\"listMovie clearfix\">
                <div class=\"col-lg-4\">
                    <img src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getPoster", array()), "html", null, true);
        echo "\" class=\"img-responsive\" />
                </div>
                <div class=\"details col-lg-8\">
                    <span class=\"title\">";
        // line 104
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getTitle", array()), "Missing title")) : ("Missing title")), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getYear", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getYear", array()), "Missing year")) : ("Missing year")), "html", null, true);
        echo ")</span>
                    <span class=\"label label-primary\">
                        ";
        // line 106
        if (twig_test_empty((isset($context["genreList"]) ? $context["genreList"] : $this->getContext($context, "genreList")))) {
            // line 107
            echo "                            No Genre Selected
                        
                        ";
        } else {
            // line 110
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["genreList"]) ? $context["genreList"] : $this->getContext($context, "genreList")));
            foreach ($context['_seq'] as $context["_key"] => $context["genre"]) {
                // line 111
                echo "                                ";
                echo twig_escape_filter($this->env, $context["genre"], "html", null, true);
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['genre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 113
            echo "                        ";
        }
        // line 114
        echo "                    </span><hr/>
                    <ul>
                        <li><i class=\"fa fa-users\" aria-hidden=\"true\"></i> Casting: ";
        // line 116
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getCast", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getCast", array()), "Missing actors")) : ("Missing actors")), "html", null, true);
        echo "</li>
                        <li><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> Duration: ";
        // line 117
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getDuration", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getDuration", array()), "Missing duration")) : ("Missing duration")), "html", null, true);
        echo "</li>
                        <li><i class=\"fa fa-link\" aria-hidden=\"true\"></i> IMDB: <a href=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getLinkImdb", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getLinkImdb", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getLinkImdb", array()), "Missing IMDB")) : ("Missing IMDB")), "html", null, true);
        echo "</a></li>
                        ";
        // line 119
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 120
            echo "                            <li><i class=\"fa fa-link\" aria-hidden=\"true\"></i> Income: <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_movie_income", array("id" => $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getId", array()))), "html", null, true);
            echo "\">Compute the income for this movie</a></li>
                        ";
        }
        // line 122
        echo "                    </ul>
                    <div class=\"booking\">
                    <form action=\"";
        // line 124
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("handle_booking", array("title" => $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getTitle", array()))), "html", null, true);
        echo "\" method=\"post\" id=\"book-movie\">   
                            <div class=\"row\">
                                <div class=\"col-lg-3\">
                                    <label for=\"date\"><i class=\"fa fa-calendar\" aria-hidden=\"true\"></i> Select Date</label>
                                    <select id=\"date_selector\" class=\"form-control\" name=\"dateSelect\">
                                        ";
        // line 129
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["schedules"]) ? $context["schedules"] : $this->getContext($context, "schedules")));
        foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
            // line 130
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["date"], "getDate", array(), "method"), "format", array(0 => "Y-m-d"), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["date"], "getDate", array(), "method"), "format", array(0 => "Y-m-d"), "method"), "html", null, true);
            echo "</option>                  
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 132
        echo "                                    </select>                                    
                                </div>  
                                <div class=\"col-lg-3\">
                                    <label for=\"time\"><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> Select Hour</label>
                                    <select id=\"hour_selector\" data-movie=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getId", array()), "html", null, true);
        echo "\" class=\"form-control\" name=\"hourSelect\">
                                        <!-- Future options -->
                                    </select>
                                </div>
                                <div class=\"col-lg-3\">
                                    <label for=\"seats\"><i class=\"fa fa-male\" aria-hidden=\"true\"></i> Select Seats</label>
                                    <input type=\"number\" id=\"numberSeats\" name=\"numberSeats\" class=\"form-control\" placeholder=\"Seats number\"/>
                                </div>                                      
                                <div class=\"col-lg-3\">
                                    <button id=\"confirm\" type=\"submit\" class=\"btn btn-lg btn-primary btn-block\">Book <i class=\"fa fa-book\" aria-hidden=\"true\"></i></button>
                                </div>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src=\"";
        // line 155
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxBookingPerDay.js\"></script>
";
        
        $__internal_fcc3af5961d15c68488d82502f7e0a6361703ae6056efff33b4579a6248e947a->leave($__internal_fcc3af5961d15c68488d82502f7e0a6361703ae6056efff33b4579a6248e947a_prof);

    }

    public function getTemplateName()
    {
        return "Movie/showmovie.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  322 => 155,  300 => 136,  294 => 132,  283 => 130,  279 => 129,  271 => 124,  267 => 122,  261 => 120,  259 => 119,  253 => 118,  249 => 117,  245 => 116,  241 => 114,  238 => 113,  229 => 111,  224 => 110,  219 => 107,  217 => 106,  210 => 104,  203 => 101,  193 => 98,  187 => 96,  184 => 95,  180 => 94,  172 => 93,  166 => 91,  163 => 90,  159 => 89,  149 => 81,  143 => 80,  129 => 72,  125 => 71,  114 => 63,  62 => 13,  56 => 12,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block pageIncludes %}*/
/*     <script src="{{ app.request.basepath }}/js/jquery.cookies.js"></script>*/
/*     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">*/
/*     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">*/
/*     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>*/
/*     <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>*/
/* {% endblock %}*/
/* */
/* */
/* {% block pageScripts %}*/
/* */
/*     $( ".datepicker" ).datepicker({*/
/*     dateFormat: "yy-mm-dd",*/
/*     minDate: 0,*/
/*     });*/
/*        */
/*     */
/*     if( Cookies.get('dateSelect') || Cookies.get('hourSelect') ) {*/
/*     */
/*         $.each(Cookies.get(), function( index, value ) {*/
/*         */
/*             if( index == 'dateSelect' || index == 'hourSelect' ) {*/
/* */
/*                 $('#book-movie select[name="' + index + '"] option').each(function() {*/
/*                     var self = $(this);*/
/*                     */
/*                     if(value === self.val())*/
/*                         self.attr("selected", "selected");*/
/*                 });            */
/*             }*/
/*             else if( index == 'numberSeats' ) {*/
/*                 $('#book-movie input[name="' + index + '"]').val(value);*/
/*             }*/
/*             populate_dates();*/
/*         });*/
/*     }*/
/* */
/*     */
/*     $('#book-movie select').on('click', function() {*/
/*        Cookies.set('dateSelect', $('#date_selector').val(), {expires: 7});*/
/*        Cookies.set('hourSelect', $('#hour_selector').val(), {expires: 7});*/
/*     });*/
/* */
/*     $('#book-movie input').on('change', function() {*/
/*        var name = $(this).attr('name');*/
/*        var value = $(this).val();*/
/*        Cookies.set(name, value, { expires: 7 });*/
/*        Cookies.set('dateSelect', $('#date_selector').val(), {expires: 7});*/
/*        Cookies.set('hourSelect', $('#hour_selector').val(), {expires: 7});*/
/*     });*/
/*     */
/*     $('#confirm').on('click',function(e) {*/
/*     var name = $(this).attr('name');*/
/*     var value = $(this).val();*/
/*     Cookies.set(name, value, { expires: 7 });*/
/*     Cookies.set('dateSelect', $('#date_selector').val(), {expires: 7});*/
/*     Cookies.set('hourSelect', $('#hour_selector').val(), {expires: 7});*/
/*     e.preventDefault();*/
/*     var date = new Date();*/
/*     swal({   title: "Booking details",   */
/*         text: "Exciting to watch {{movie.getTitle}}? In " + $('#date_selector').val() + " you will go at " + $('#hour_selector').val() + " for " + $('#numberSeats').val() + "!",   */
/*         imageUrl:"http://goo.gl/xWS6Qp",  */
/*         showCancelButton: true,   */
/*         confirmButtonColor: "#3276B1",   */
/*         confirmButtonText: "Yes, book it!",   */
/*         closeOnConfirm: true */
/*     },*/
/*     function(){ */
/*        var movieName = "{{movie.getTitle}}";*/
/*        var url = '{{ app.request.basepath }}' + '/index_dev.php/user/movie/' + movieName + '/booking';*/
/*        $(location).attr('href', url);*/
/*     });*/
/*     });*/
/*     */
/*     */
/* {% endblock %}*/
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
/*             {% for message in flashBag.get('error') %}*/
/*                         {% if message is defined and message is not empty %}*/
/*                                 <div class="alert alert-error" role="alert">{{ message }}</div>*/
/*                         {% endif %}*/
/*             {% endfor %} */
/*             {% for message in flashBag.get('success') %}*/
/*                        {% if message is defined and message is not empty %}*/
/*                                <div class="alert alert-success" role="alert">{{ message }}</div>*/
/*                        {% endif %}*/
/*             {% endfor %} */
/*             <div class="listMovie clearfix">*/
/*                 <div class="col-lg-4">*/
/*                     <img src="{{ app.request.basepath }}{{ movie.getPoster }}" class="img-responsive" />*/
/*                 </div>*/
/*                 <div class="details col-lg-8">*/
/*                     <span class="title">{{movie.getTitle|default("Missing title")}} ({{movie.getYear|default("Missing year")}})</span>*/
/*                     <span class="label label-primary">*/
/*                         {% if genreList is empty %}*/
/*                             No Genre Selected*/
/*                         */
/*                         {% else %}*/
/*                             {% for genre in genreList %}*/
/*                                 {{ genre }}*/
/*                             {% endfor %}*/
/*                         {% endif %}*/
/*                     </span><hr/>*/
/*                     <ul>*/
/*                         <li><i class="fa fa-users" aria-hidden="true"></i> Casting: {{ movie.getCast|default("Missing actors") }}</li>*/
/*                         <li><i class="fa fa-clock-o" aria-hidden="true"></i> Duration: {{ movie.getDuration|default("Missing duration") }}</li>*/
/*                         <li><i class="fa fa-link" aria-hidden="true"></i> IMDB: <a href="{{ movie.getLinkImdb }}">{{ movie.getLinkImdb|default("Missing IMDB") }}</a></li>*/
/*                         {% if is_granted('ROLE_ADMIN') %}*/
/*                             <li><i class="fa fa-link" aria-hidden="true"></i> Income: <a href="{{ path('admin_movie_income', {'id': movie.getId}) }}">Compute the income for this movie</a></li>*/
/*                         {% endif %}*/
/*                     </ul>*/
/*                     <div class="booking">*/
/*                     <form action="{{ path('handle_booking', {'title': movie.getTitle}) }}" method="post" id="book-movie">   */
/*                             <div class="row">*/
/*                                 <div class="col-lg-3">*/
/*                                     <label for="date"><i class="fa fa-calendar" aria-hidden="true"></i> Select Date</label>*/
/*                                     <select id="date_selector" class="form-control" name="dateSelect">*/
/*                                         {% for date in schedules %}*/
/*                                         <option value="{{date.getDate().format('Y-m-d')}}">{{date.getDate().format('Y-m-d')}}</option>                  */
/*                                         {% endfor %}*/
/*                                     </select>                                    */
/*                                 </div>  */
/*                                 <div class="col-lg-3">*/
/*                                     <label for="time"><i class="fa fa-clock-o" aria-hidden="true"></i> Select Hour</label>*/
/*                                     <select id="hour_selector" data-movie="{{ movie.getId}}" class="form-control" name="hourSelect">*/
/*                                         <!-- Future options -->*/
/*                                     </select>*/
/*                                 </div>*/
/*                                 <div class="col-lg-3">*/
/*                                     <label for="seats"><i class="fa fa-male" aria-hidden="true"></i> Select Seats</label>*/
/*                                     <input type="number" id="numberSeats" name="numberSeats" class="form-control" placeholder="Seats number"/>*/
/*                                 </div>                                      */
/*                                 <div class="col-lg-3">*/
/*                                     <button id="confirm" type="submit" class="btn btn-lg btn-primary btn-block">Book <i class="fa fa-book" aria-hidden="true"></i></button>*/
/*                                 </div>  */
/*                             </div>*/
/*                         </form>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* <script src="{{ app.request.basepath }}/js/AjaxBookingPerDay.js"></script>*/
/* {% endblock %}*/
/* */
