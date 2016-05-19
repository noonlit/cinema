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
        $__internal_ee399ccdd913c0fe0b8cacf2d17c0f289be15200a57f7f3f368c1cce09be824b = $this->env->getExtension("native_profiler");
        $__internal_ee399ccdd913c0fe0b8cacf2d17c0f289be15200a57f7f3f368c1cce09be824b->enter($__internal_ee399ccdd913c0fe0b8cacf2d17c0f289be15200a57f7f3f368c1cce09be824b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Movie/showmovie.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ee399ccdd913c0fe0b8cacf2d17c0f289be15200a57f7f3f368c1cce09be824b->leave($__internal_ee399ccdd913c0fe0b8cacf2d17c0f289be15200a57f7f3f368c1cce09be824b_prof);

    }

    // line 3
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_62c7862246ac7ec525cfa7d8b46c0762931b29f904ac9443d2e7f27c5e1b65f1 = $this->env->getExtension("native_profiler");
        $__internal_62c7862246ac7ec525cfa7d8b46c0762931b29f904ac9443d2e7f27c5e1b65f1->enter($__internal_62c7862246ac7ec525cfa7d8b46c0762931b29f904ac9443d2e7f27c5e1b65f1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 4
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/jquery.cookies.js\"></script>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css\">
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">
    <script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js\"></script>
    <script type=\"text/javascript\" src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>
";
        
        $__internal_62c7862246ac7ec525cfa7d8b46c0762931b29f904ac9443d2e7f27c5e1b65f1->leave($__internal_62c7862246ac7ec525cfa7d8b46c0762931b29f904ac9443d2e7f27c5e1b65f1_prof);

    }

    // line 12
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_5f7917f7d72c4c3f6d364f8cf663e5faab67a3742872c79e3e5da76ca54bead5 = $this->env->getExtension("native_profiler");
        $__internal_5f7917f7d72c4c3f6d364f8cf663e5faab67a3742872c79e3e5da76ca54bead5->enter($__internal_5f7917f7d72c4c3f6d364f8cf663e5faab67a3742872c79e3e5da76ca54bead5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

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
    });
    
    \$('#confirm').on('click',function(e) {
    e.preventDefault();
    var date = new Date();
    swal({   title: \"Booking details\",   
        text: \"Exciting to watch ";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getTitle", array()), "html", null, true);
        echo "? In \" + Cookies.get('dateSelect') + \" you will go at \" + Cookies.get('hourSelect') + \" for \" + Cookies.get('numberSeats') + \"!\",   
        imageUrl:\"http://goo.gl/xWS6Qp\",  
        showCancelButton: true,   
        confirmButtonColor: \"#3276B1\",   
        confirmButtonText: \"Yes, book it!\",   
        closeOnConfirm: true 
    },
    function(){ 
       var movieName = \"";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getTitle", array()), "html", null, true);
        echo "\";
       var url = '";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "' + '/index_dev.php/user/movie/' + movieName + '/booking';
       \$(location).attr('href', url);
    });
    });
    
    
";
        
        $__internal_5f7917f7d72c4c3f6d364f8cf663e5faab67a3742872c79e3e5da76ca54bead5->leave($__internal_5f7917f7d72c4c3f6d364f8cf663e5faab67a3742872c79e3e5da76ca54bead5_prof);

    }

    // line 73
    public function block_content($context, array $blocks = array())
    {
        $__internal_e083fd4ad5d993e6b0d446e95163d7665d22ecf36bd499a9d4a05ec899eac45f = $this->env->getExtension("native_profiler");
        $__internal_e083fd4ad5d993e6b0d446e95163d7665d22ecf36bd499a9d4a05ec899eac45f->enter($__internal_e083fd4ad5d993e6b0d446e95163d7665d22ecf36bd499a9d4a05ec899eac45f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 74
        echo "<div class=\"banner text-center\">
    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\">
        <div class=\"wrapper col-lg-12 col-centered\">
            ";
        // line 82
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 83
            echo "                        ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 84
                echo "                                <div class=\"alert alert-error\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                        ";
            }
            // line 86
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " 
            ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 88
            echo "                       ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 89
                echo "                               <div class=\"alert alert-success\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                       ";
            }
            // line 91
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " 
            <div class=\"listMovie clearfix\">
                <div class=\"col-lg-4\">
                    <img src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getPoster", array()), "html", null, true);
        echo "\" class=\"img-responsive\" />
                </div>
                <div class=\"details col-lg-8\">
                    <span class=\"title\">";
        // line 97
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getTitle", array()), "Missing title")) : ("Missing title")), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getYear", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getYear", array()), "Missing year")) : ("Missing year")), "html", null, true);
        echo ")</span>
                    <span class=\"label label-primary\">
                        ";
        // line 99
        if (twig_test_empty((isset($context["genreList"]) ? $context["genreList"] : $this->getContext($context, "genreList")))) {
            // line 100
            echo "                            No Genre Selected
                        
                        ";
        } else {
            // line 103
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["genreList"]) ? $context["genreList"] : $this->getContext($context, "genreList")));
            foreach ($context['_seq'] as $context["_key"] => $context["genre"]) {
                // line 104
                echo "                                ";
                echo twig_escape_filter($this->env, $context["genre"], "html", null, true);
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['genre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 106
            echo "                        ";
        }
        // line 107
        echo "                    </span><hr/>
                    <ul>
                        <li><i class=\"fa fa-users\" aria-hidden=\"true\"></i> Casting: ";
        // line 109
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getCast", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getCast", array()), "Missing actors")) : ("Missing actors")), "html", null, true);
        echo "</li>
                        <li><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> Duration: ";
        // line 110
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getDuration", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getDuration", array()), "Missing duration")) : ("Missing duration")), "html", null, true);
        echo "</li>
                        <li><i class=\"fa fa-link\" aria-hidden=\"true\"></i> IMDB: <a href=\"";
        // line 111
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getLinkImdb", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getLinkImdb", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getLinkImdb", array()), "Missing IMDB")) : ("Missing IMDB")), "html", null, true);
        echo "</a></li>
                        ";
        // line 112
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 113
            echo "                            <li><i class=\"fa fa-link\" aria-hidden=\"true\"></i> Income: <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_movie_income", array("id" => $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getId", array()))), "html", null, true);
            echo "\">Compute the income for this movie</a></li>
                        ";
        }
        // line 115
        echo "                    </ul>
                    <div class=\"booking\">
                    <form action=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("handle_booking", array("title" => $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getTitle", array()))), "html", null, true);
        echo "\" method=\"post\" id=\"book-movie\">   
                            <div class=\"row\">
                                <div class=\"col-lg-3\">
                                    <label for=\"date\"><i class=\"fa fa-calendar\" aria-hidden=\"true\"></i> Select Date</label>
                                    <select id=\"date_selector\" class=\"form-control\" name=\"dateSelect\">
                                        ";
        // line 122
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["schedules"]) ? $context["schedules"] : $this->getContext($context, "schedules")));
        foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
            // line 123
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
        // line 125
        echo "                                    </select>                                    
                                </div>  
                                <div class=\"col-lg-3\">
                                    <label for=\"time\"><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> Select Hour</label>
                                    <select id=\"hour_selector\" data-movie=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getId", array()), "html", null, true);
        echo "\" class=\"form-control\" name=\"hourSelect\">
                                        <!-- Future options -->
                                    </select>
                                </div>
                                <div class=\"col-lg-3\">
                                    <label for=\"seats\"><i class=\"fa fa-male\" aria-hidden=\"true\"></i> Select Seats</label>
                                    <input type=\"number\" name=\"numberSeats\" class=\"form-control\" placeholder=\"Seats number\"/>
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
        // line 148
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxBookingPerDay.js\"></script>
";
        
        $__internal_e083fd4ad5d993e6b0d446e95163d7665d22ecf36bd499a9d4a05ec899eac45f->leave($__internal_e083fd4ad5d993e6b0d446e95163d7665d22ecf36bd499a9d4a05ec899eac45f_prof);

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
        return array (  315 => 148,  293 => 129,  287 => 125,  276 => 123,  272 => 122,  264 => 117,  260 => 115,  254 => 113,  252 => 112,  246 => 111,  242 => 110,  238 => 109,  234 => 107,  231 => 106,  222 => 104,  217 => 103,  212 => 100,  210 => 99,  203 => 97,  196 => 94,  186 => 91,  180 => 89,  177 => 88,  173 => 87,  165 => 86,  159 => 84,  156 => 83,  152 => 82,  142 => 74,  136 => 73,  122 => 65,  118 => 64,  107 => 56,  62 => 13,  56 => 12,  42 => 4,  36 => 3,  11 => 1,);
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
/*             */
/*             populate_dates();*/
/*         });*/
/*     }*/
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
/*     });*/
/*     */
/*     $('#confirm').on('click',function(e) {*/
/*     e.preventDefault();*/
/*     var date = new Date();*/
/*     swal({   title: "Booking details",   */
/*         text: "Exciting to watch {{movie.getTitle}}? In " + Cookies.get('dateSelect') + " you will go at " + Cookies.get('hourSelect') + " for " + Cookies.get('numberSeats') + "!",   */
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
/*                                     <input type="number" name="numberSeats" class="form-control" placeholder="Seats number"/>*/
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
