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
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5ad571be92363600fc0b6c055115f86e52760f7101b64aa0e2cfe4909f239fa6 = $this->env->getExtension("native_profiler");
        $__internal_5ad571be92363600fc0b6c055115f86e52760f7101b64aa0e2cfe4909f239fa6->enter($__internal_5ad571be92363600fc0b6c055115f86e52760f7101b64aa0e2cfe4909f239fa6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Schedule/schedule.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5ad571be92363600fc0b6c055115f86e52760f7101b64aa0e2cfe4909f239fa6->leave($__internal_5ad571be92363600fc0b6c055115f86e52760f7101b64aa0e2cfe4909f239fa6_prof);

    }

    // line 3
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_bf9d72f879f7d1d2b70960497f693ec98e5816badf411644956af2e31eb27497 = $this->env->getExtension("native_profiler");
        $__internal_bf9d72f879f7d1d2b70960497f693ec98e5816badf411644956af2e31eb27497->enter($__internal_bf9d72f879f7d1d2b70960497f693ec98e5816badf411644956af2e31eb27497_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 4
        echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css\">
<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">
<script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js\"></script>
<script type=\"text/javascript\" src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>
";
        
        $__internal_bf9d72f879f7d1d2b70960497f693ec98e5816badf411644956af2e31eb27497->leave($__internal_bf9d72f879f7d1d2b70960497f693ec98e5816badf411644956af2e31eb27497_prof);

    }

    // line 10
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_8d42cb26ee42a29afc49afd41d7c866f8e370432b4cc20dedb5a255a0beaa764 = $this->env->getExtension("native_profiler");
        $__internal_8d42cb26ee42a29afc49afd41d7c866f8e370432b4cc20dedb5a255a0beaa764->enter($__internal_8d42cb26ee42a29afc49afd41d7c866f8e370432b4cc20dedb5a255a0beaa764_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 11
        echo "
\$('.time-select').timepicker({
'minTime': '8:00am',
'maxTime': '20:00pm',
'step': 120,
'timeFormat': 'H:i:s'
});

\$( \".datepicker\" ).datepicker({
dateFormat: \"yy-mm-dd\",
minDate: 0,
});


";
        
        $__internal_8d42cb26ee42a29afc49afd41d7c866f8e370432b4cc20dedb5a255a0beaa764->leave($__internal_8d42cb26ee42a29afc49afd41d7c866f8e370432b4cc20dedb5a255a0beaa764_prof);

    }

    // line 28
    public function block_title($context, array $blocks = array())
    {
        $__internal_cfaaa11356996ed6f74931e221d1e21f492149cb1d8806b2f1f9ce6b13f0e80e = $this->env->getExtension("native_profiler");
        $__internal_cfaaa11356996ed6f74931e221d1e21f492149cb1d8806b2f1f9ce6b13f0e80e->enter($__internal_cfaaa11356996ed6f74931e221d1e21f492149cb1d8806b2f1f9ce6b13f0e80e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " Schedule Movie ";
        
        $__internal_cfaaa11356996ed6f74931e221d1e21f492149cb1d8806b2f1f9ce6b13f0e80e->leave($__internal_cfaaa11356996ed6f74931e221d1e21f492149cb1d8806b2f1f9ce6b13f0e80e_prof);

    }

    // line 30
    public function block_content($context, array $blocks = array())
    {
        $__internal_a0738e3c0f2bed4c3535df5fc9db509c9eed02e8214e5d90b82f2655a87041a1 = $this->env->getExtension("native_profiler");
        $__internal_a0738e3c0f2bed4c3535df5fc9db509c9eed02e8214e5d90b82f2655a87041a1->enter($__internal_a0738e3c0f2bed4c3535df5fc9db509c9eed02e8214e5d90b82f2655a87041a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 31
        echo "<div class=\"authArea\">
    <div class=\"container\">         
         <span class=\"title text-center\">
                ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 35
            echo "                ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 38
            echo "                ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo " 
            </span><hr/>
        <form method=\"POST\" action=\"";
        // line 41
        echo $this->env->getExtension('routing')->getUrl("admin_handle_schedule");
        echo "\">           
            <span class=\"title text-center\">Schedule a movie</span><hr/>                
            
            <label for=\"movie\"><i class=\"fa fa-video-camera\" aria-hidden=\"true\"></i> Select Movie </label>
            <select name=\"movie\">
                ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["movies"]) ? $context["movies"] : $this->getContext($context, "movies")));
        foreach ($context['_seq'] as $context["_key"] => $context["movie"]) {
            // line 47
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "title", array()), "html", null, true);
            echo "</option>                
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movie'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "            </select>       
            <br><br>                 
            
            <label for=\"date\">Select Date</label>                 
\t    <input class=\"form-control date-select datepicker date\" name=\"date\" placeholder=\"Choose date\">                          
            
            <label for=\"time\"> Select Time </label>                
            <input class=\"form-control time-select\" name=\"time\" placeholder=\"Choose time\">            
                
            <br><br>
            
            <label for=\"room\"> Select Room </label>
            <select name=\"room\">
                ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rooms"]) ? $context["rooms"] : $this->getContext($context, "rooms")));
        foreach ($context['_seq'] as $context["_key"] => $context["room"]) {
            // line 63
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "name", array()), "html", null, true);
            echo "</option>                
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['room'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "            </select>                  
            <br><br>
            
            <label for=\"price\"> Ticket price </label>
            <input type=\"text\" name=\"price\" value=\"\">
            <br><br>
            
            <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Done</button>
        </form>
    </div>       
</div>
";
        
        $__internal_a0738e3c0f2bed4c3535df5fc9db509c9eed02e8214e5d90b82f2655a87041a1->leave($__internal_a0738e3c0f2bed4c3535df5fc9db509c9eed02e8214e5d90b82f2655a87041a1_prof);

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
        return array (  188 => 65,  177 => 63,  173 => 62,  158 => 49,  147 => 47,  143 => 46,  135 => 41,  131 => 39,  122 => 38,  117 => 37,  108 => 35,  104 => 34,  99 => 31,  93 => 30,  81 => 28,  60 => 11,  54 => 10,  43 => 4,  37 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.html' %}*/
/* */
/* {% block pageIncludes %}*/
/* <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">*/
/* <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">*/
/* <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>*/
/* <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>*/
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/* $('.time-select').timepicker({*/
/* 'minTime': '8:00am',*/
/* 'maxTime': '20:00pm',*/
/* 'step': 120,*/
/* 'timeFormat': 'H:i:s'*/
/* });*/
/* */
/* $( ".datepicker" ).datepicker({*/
/* dateFormat: "yy-mm-dd",*/
/* minDate: 0,*/
/* });*/
/* */
/* */
/* {% endblock %}*/
/* */
/* */
/* {% block title%} Schedule Movie {% endblock %}*/
/* */
/* {% block content %}*/
/* <div class="authArea">*/
/*     <div class="container">         */
/*          <span class="title text-center">*/
/*                 {% for message in flashBag.get('error') %}*/
/*                 {{ message }}*/
/*                 {% endfor %}*/
/*                 {% for message in flashBag.get('success') %}*/
/*                 {{ message }}*/
/*                 {% endfor %} */
/*             </span><hr/>*/
/*         <form method="POST" action="{{ url('admin_handle_schedule') }}">           */
/*             <span class="title text-center">Schedule a movie</span><hr/>                */
/*             */
/*             <label for="movie"><i class="fa fa-video-camera" aria-hidden="true"></i> Select Movie </label>*/
/*             <select name="movie">*/
/*                 {% for movie in movies %}*/
/*                 <option value="{{movie.id}}">{{movie.title}}</option>                */
/*                 {% endfor %}*/
/*             </select>       */
/*             <br><br>                 */
/*             */
/*             <label for="date">Select Date</label>                 */
/* 	    <input class="form-control date-select datepicker date" name="date" placeholder="Choose date">                          */
/*             */
/*             <label for="time"> Select Time </label>                */
/*             <input class="form-control time-select" name="time" placeholder="Choose time">            */
/*                 */
/*             <br><br>*/
/*             */
/*             <label for="room"> Select Room </label>*/
/*             <select name="room">*/
/*                 {% for room in rooms %}*/
/*                 <option value="{{room.id}}">{{room.name}}</option>                */
/*                 {% endfor %}*/
/*             </select>                  */
/*             <br><br>*/
/*             */
/*             <label for="price"> Ticket price </label>*/
/*             <input type="text" name="price" value="">*/
/*             <br><br>*/
/*             */
/*             <button class="btn btn-lg btn-primary btn-block" type="submit">Done</button>*/
/*         </form>*/
/*     </div>       */
/* </div>*/
/* {% endblock %}*/
/* */
/* */
/* */
