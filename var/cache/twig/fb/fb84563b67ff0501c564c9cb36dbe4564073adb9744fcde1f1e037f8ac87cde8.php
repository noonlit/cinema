<?php

/* Schedule/schedule.html */
class __TwigTemplate_c80c2b2c6a8164db4d949b1793ddf36b9fa3fc923d2e0e72b9c87b6db3a276e8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Schedule/schedule.html", 1);
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
        $__internal_be1f9f542af051e5a2c084d4695f8a3eb8666cb9ee9434c5d7b2df82bdc854aa = $this->env->getExtension("native_profiler");
        $__internal_be1f9f542af051e5a2c084d4695f8a3eb8666cb9ee9434c5d7b2df82bdc854aa->enter($__internal_be1f9f542af051e5a2c084d4695f8a3eb8666cb9ee9434c5d7b2df82bdc854aa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Schedule/schedule.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_be1f9f542af051e5a2c084d4695f8a3eb8666cb9ee9434c5d7b2df82bdc854aa->leave($__internal_be1f9f542af051e5a2c084d4695f8a3eb8666cb9ee9434c5d7b2df82bdc854aa_prof);

    }

    // line 4
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_4a220865c89d1ffe7d08371b91f754a1c0aec8d8853a276ba3cdd258e2a9b4ba = $this->env->getExtension("native_profiler");
        $__internal_4a220865c89d1ffe7d08371b91f754a1c0aec8d8853a276ba3cdd258e2a9b4ba->enter($__internal_4a220865c89d1ffe7d08371b91f754a1c0aec8d8853a276ba3cdd258e2a9b4ba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 5
        echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css\">
<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">
<script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js\"></script>
<script type=\"text/javascript\" src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>
<script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxScheduleMessages.js\"></script>
<script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxScheduleGetAvailableRooms.js\"></script> 

";
        
        $__internal_4a220865c89d1ffe7d08371b91f754a1c0aec8d8853a276ba3cdd258e2a9b4ba->leave($__internal_4a220865c89d1ffe7d08371b91f754a1c0aec8d8853a276ba3cdd258e2a9b4ba_prof);

    }

    // line 14
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_90bea5a30eaf28e2fdffa66a454fa4971fb2ba2feafce389759783b11cba8e36 = $this->env->getExtension("native_profiler");
        $__internal_90bea5a30eaf28e2fdffa66a454fa4971fb2ba2feafce389759783b11cba8e36->enter($__internal_90bea5a30eaf28e2fdffa66a454fa4971fb2ba2feafce389759783b11cba8e36_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 15
        echo "
\$('.time-select').timepicker({
'minTime': '8:00am',
'maxTime': '20:00pm',
'step': 120,
'timeFormat': 'H:i'
});

\$( \".datepicker\" ).datepicker({
dateFormat: \"yy-mm-dd\",
minDate: 0,
});

new AjaxScheduleMessages('#addschedule-container', 'add', function (data) {
swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
});   

";
        
        $__internal_90bea5a30eaf28e2fdffa66a454fa4971fb2ba2feafce389759783b11cba8e36->leave($__internal_90bea5a30eaf28e2fdffa66a454fa4971fb2ba2feafce389759783b11cba8e36_prof);

    }

    // line 35
    public function block_content($context, array $blocks = array())
    {
        $__internal_4db1da07109c4b79c85c28ff729a18614894a1e920ba9ea55969f2bef9404352 = $this->env->getExtension("native_profiler");
        $__internal_4db1da07109c4b79c85c28ff729a18614894a1e920ba9ea55969f2bef9404352->enter($__internal_4db1da07109c4b79c85c28ff729a18614894a1e920ba9ea55969f2bef9404352_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 36
        echo "<div class=\"banner text-center\">
    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>
<div class=\"wrapperArea\">
    <div class=\"container\" id=\"addschedule-container\">
        <div class=\"wrapper col-lg-12 col-centered\">

            <div class=\"showList\">  

                <div class=\"section-title\">
                    <p class=\"pull-left\">Schedule a movie</p>                  
                </div>                    

                <form method=\"POST\" action=\"";
        // line 50
        echo $this->env->getExtension('routing')->getUrl("admin_handle_schedule");
        echo "\" class=\"addMessage\" enctype=\"multipart/form-data\">

                    <div class=\"add-movie col-lg-9 col-centered\">
                        
                        ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 55
            echo "                            ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 56
                echo "                                    <div class=\"alert alert-danger\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                            ";
            }
            // line 58
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  
                        ";
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 60
            echo "                            ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 61
                echo "                                    <div class=\"alert alert-success\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                            ";
            }
            // line 63
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  

                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <label for=\"movie\"><i class=\"fa fa-video-camera\" aria-hidden=\"true\"></i> Select Movie </label>
                                <select class=\"form-control\" name=\"movie\">
                                    ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["movies"]) ? $context["movies"] : $this->getContext($context, "movies")));
        foreach ($context['_seq'] as $context["_key"] => $context["movie"]) {
            // line 70
            echo "                                    ";
            if (((isset($context["last_movie"]) ? $context["last_movie"] : $this->getContext($context, "last_movie")) == $this->getAttribute($context["movie"], "getId", array(), "method"))) {
                // line 71
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getId", array(), "method"), "html", null, true);
                echo "\" selected>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getTitle", array(), "method"), "html", null, true);
                echo "</option>                
                                    ";
            } else {
                // line 73
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getId", array(), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getTitle", array(), "method"), "html", null, true);
                echo "</option>  
                                    ";
            }
            // line 75
            echo "                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movie'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "                                </select>
                            </div>
                        </div>

                        <div class=\"row\">                     

                            <div class=\"col-lg-6\">
                                <label for=\"date\">Select Date</label>                 
                                <input class=\"form-control date-select datepicker date\" name=\"date\" id=\"date\" placeholder=\"Choose date\" value=\"";
        // line 84
        echo twig_escape_filter($this->env, ((array_key_exists("last_date", $context)) ? (_twig_default_filter((isset($context["last_date"]) ? $context["last_date"] : $this->getContext($context, "last_date")), "")) : ("")), "html", null, true);
        echo "\">  
                            </div>

                            <div class=\"col-lg-6\">
                                <label for=\"time\"> Select Time </label>                
                                <input class=\"form-control time-select\" name=\"time\" id=\"time\" placeholder=\"Choose time\" value=\"";
        // line 89
        echo twig_escape_filter($this->env, ((array_key_exists("last_time", $context)) ? (_twig_default_filter((isset($context["last_time"]) ? $context["last_time"] : $this->getContext($context, "last_time")), "")) : ("")), "html", null, true);
        echo "\"> 
                            </div>

                            <div class=\"col-lg-6\">
                                <label for=\"room\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i> Room</label>
                                <select class=\"form-control\" id=\"room\" name=\"room\">
                                </select>    
                            </div>  

                            <div class=\"col-lg-6\">
                                <label for=\"price\"><i class=\"fa fa-usd\" aria-hidden=\"true\"></i> Price</label>
                                <input class=\"form-control\" type=\"text\" id=\"price\" name=\"price\" value=\"";
        // line 100
        echo twig_escape_filter($this->env, ((array_key_exists("last_price", $context)) ? (_twig_default_filter((isset($context["last_price"]) ? $context["last_price"] : $this->getContext($context, "last_price")), "")) : ("")), "html", null, true);
        echo "\" placeholder=\"Price\" />
                            </div>

                        </div>

                        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Schedule movie <i class=\"fa fa-paper-plane\" aria-hidden=\"true\"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_4db1da07109c4b79c85c28ff729a18614894a1e920ba9ea55969f2bef9404352->leave($__internal_4db1da07109c4b79c85c28ff729a18614894a1e920ba9ea55969f2bef9404352_prof);

    }

    public function getTemplateName()
    {
        return "Schedule/schedule.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 100,  215 => 89,  207 => 84,  197 => 76,  191 => 75,  183 => 73,  175 => 71,  172 => 70,  168 => 69,  155 => 63,  149 => 61,  146 => 60,  142 => 59,  134 => 58,  128 => 56,  125 => 55,  121 => 54,  114 => 50,  98 => 36,  92 => 35,  68 => 15,  62 => 14,  52 => 10,  48 => 9,  42 => 5,  36 => 4,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* */
/* {% block pageIncludes %}*/
/* <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">*/
/* <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">*/
/* <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>*/
/* <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>*/
/* <script src="{{ app.request.basepath }}/js/AjaxScheduleMessages.js"></script>*/
/* <script src="{{ app.request.basepath }}/js/AjaxScheduleGetAvailableRooms.js"></script> */
/* */
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/* $('.time-select').timepicker({*/
/* 'minTime': '8:00am',*/
/* 'maxTime': '20:00pm',*/
/* 'step': 120,*/
/* 'timeFormat': 'H:i'*/
/* });*/
/* */
/* $( ".datepicker" ).datepicker({*/
/* dateFormat: "yy-mm-dd",*/
/* minDate: 0,*/
/* });*/
/* */
/* new AjaxScheduleMessages('#addschedule-container', 'add', function (data) {*/
/* swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/* });   */
/* */
/* {% endblock %}*/
/* */
/* */
/* {% block content %}*/
/* <div class="banner text-center">*/
/*     <h1>Cinema Village</h1>*/
/*     <h2>A new generation movie theater in your town. Try us!</h2>*/
/* </div>*/
/* <div class="wrapperArea">*/
/*     <div class="container" id="addschedule-container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/* */
/*             <div class="showList">  */
/* */
/*                 <div class="section-title">*/
/*                     <p class="pull-left">Schedule a movie</p>                  */
/*                 </div>                    */
/* */
/*                 <form method="POST" action="{{ url('admin_handle_schedule') }}" class="addMessage" enctype="multipart/form-data">*/
/* */
/*                     <div class="add-movie col-lg-9 col-centered">*/
/*                         */
/*                         {% for message in flashBag.get('error') %}*/
/*                             {% if message is defined and message is not empty %}*/
/*                                     <div class="alert alert-danger" role="alert">{{ message }}</div>*/
/*                             {% endif %}*/
/*                         {% endfor %}  */
/*                         {% for message in flashBag.get('success') %}*/
/*                             {% if message is defined and message is not empty %}*/
/*                                     <div class="alert alert-success" role="alert">{{ message }}</div>*/
/*                             {% endif %}*/
/*                         {% endfor %}  */
/* */
/*                         <div class="row">*/
/*                             <div class="col-lg-12">*/
/*                                 <label for="movie"><i class="fa fa-video-camera" aria-hidden="true"></i> Select Movie </label>*/
/*                                 <select class="form-control" name="movie">*/
/*                                     {% for movie in movies %}*/
/*                                     {% if last_movie == movie.getId() %}*/
/*                                     <option value="{{movie.getId()}}" selected>{{movie.getTitle()}}</option>                */
/*                                     {% else %}*/
/*                                     <option value="{{movie.getId()}}">{{movie.getTitle()}}</option>  */
/*                                     {% endif %}*/
/*                                     {% endfor %}*/
/*                                 </select>*/
/*                             </div>*/
/*                         </div>*/
/* */
/*                         <div class="row">                     */
/* */
/*                             <div class="col-lg-6">*/
/*                                 <label for="date">Select Date</label>                 */
/*                                 <input class="form-control date-select datepicker date" name="date" id="date" placeholder="Choose date" value="{{ last_date|default("") }}">  */
/*                             </div>*/
/* */
/*                             <div class="col-lg-6">*/
/*                                 <label for="time"> Select Time </label>                */
/*                                 <input class="form-control time-select" name="time" id="time" placeholder="Choose time" value="{{ last_time|default("") }}"> */
/*                             </div>*/
/* */
/*                             <div class="col-lg-6">*/
/*                                 <label for="room"><i class="fa fa-map-marker" aria-hidden="true"></i> Room</label>*/
/*                                 <select class="form-control" id="room" name="room">*/
/*                                 </select>    */
/*                             </div>  */
/* */
/*                             <div class="col-lg-6">*/
/*                                 <label for="price"><i class="fa fa-usd" aria-hidden="true"></i> Price</label>*/
/*                                 <input class="form-control" type="text" id="price" name="price" value="{{ last_price|default("") }}" placeholder="Price" />*/
/*                             </div>*/
/* */
/*                         </div>*/
/* */
/*                         <button class="btn btn-lg btn-primary btn-block" type="submit">Schedule movie <i class="fa fa-paper-plane" aria-hidden="true"></i></button>*/
/*                 </form>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
