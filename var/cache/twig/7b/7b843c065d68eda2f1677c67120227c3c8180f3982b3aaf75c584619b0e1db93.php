<?php

/* navbar.html */
class __TwigTemplate_578c297f1f556aee8d545cb4f3132f6932fea42370d2a3d17b2e4e70dfcc1a1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9349746a55aceaf93563e9c5a0018f45637ddc312db34fca949a00e2c2889c4f = $this->env->getExtension("native_profiler");
        $__internal_9349746a55aceaf93563e9c5a0018f45637ddc312db34fca949a00e2c2889c4f->enter($__internal_9349746a55aceaf93563e9c5a0018f45637ddc312db34fca949a00e2c2889c4f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "navbar.html"));

        // line 1
        echo "<nav class=\"navbar navbar-fixed-top\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getUrl("homepage");
        echo "\"><i class=\"fa fa-video-camera\" aria-hidden=\"true\"></i> Cinema Village</a>
        </div>
 
 
        <div id=\"navbar\" class=\"navbar-collapse collapse navbar-right\">
            <ul class=\"nav navbar-nav\">
                <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getUrl("homepage");
        echo "\">Home</a></li>
                ";
        // line 17
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 18
            echo "                    ";
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 19
                echo "                   
                        <li class=\"dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                    Admin <span class=\"caret\"></span>
                                </a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"";
                // line 25
                echo $this->env->getExtension('routing')->getUrl("admin_show_all_users_paginated");
                echo "\">USERS MANAGEMENT</a></li>
                                    <li><a href=\"";
                // line 26
                echo $this->env->getExtension('routing')->getUrl("admin_show_genres_paginated");
                echo "\">GENRES MANAGEMENT</a></li>
                                    <li><a href=\"";
                // line 27
                echo $this->env->getExtension('routing')->getUrl("admin_show_all_rooms_paginated");
                echo "\">ROOMS MANAGEMENT</a></li>
                                    <li><a href=\"";
                // line 28
                echo $this->env->getExtension('routing')->getUrl("admin_movie_add");
                echo "\">ADD A NEW MOVIE</a></li>
                                    <li><a href=\"";
                // line 29
                echo $this->env->getExtension('routing')->getUrl("admin_show_schedule_page");
                echo "\">SCHEDULE A MOVIE</a></li>
                                    <li><a href=\"";
                // line 30
                echo $this->env->getExtension('routing')->getUrl("admin_show_scheduled_movies_paginated");
                echo "\">EDIT SCHEDULED MOVIE</a></li>
                                    <li><a href=\"";
                // line 31
                echo $this->env->getExtension('routing')->getUrl("admin_show_schedule_list");
                echo "\">VIEW SCHEDULES</a></li>
                                    <li><a href=\"";
                // line 32
                echo $this->env->getExtension('routing')->getUrl("admin_show_occupancy");
                echo "\">SEE OCCUPANCY</a></li>
                                </ul>
                        </li>                    
 
                    ";
            }
            // line 37
            echo "                   
                    <li><a href=\"";
            // line 38
            echo $this->env->getExtension('routing')->getUrl("logout");
            echo "\">Logout</a></li>
                   
                ";
        } else {
            // line 41
            echo "                    <li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("show_register_page");
            echo "\">Register</a></li>
                    <li><a href=\"";
            // line 42
            echo $this->env->getExtension('routing')->getUrl("login");
            echo "\">Login</a></li>
                ";
        }
        // line 44
        echo "            </ul>
 
        </div>
    </div>
</nav>
";
        
        $__internal_9349746a55aceaf93563e9c5a0018f45637ddc312db34fca949a00e2c2889c4f->leave($__internal_9349746a55aceaf93563e9c5a0018f45637ddc312db34fca949a00e2c2889c4f_prof);

    }

    public function getTemplateName()
    {
        return "navbar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 44,  109 => 42,  104 => 41,  98 => 38,  95 => 37,  87 => 32,  83 => 31,  79 => 30,  75 => 29,  71 => 28,  67 => 27,  63 => 26,  59 => 25,  51 => 19,  48 => 18,  46 => 17,  42 => 16,  33 => 10,  22 => 1,);
    }
}
/* <nav class="navbar navbar-fixed-top">*/
/*     <div class="container">*/
/*         <div class="navbar-header">*/
/*             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">*/
/*                 <span class="sr-only">Toggle navigation</span>*/
/*                 <span class="icon-bar"></span>*/
/*                 <span class="icon-bar"></span>*/
/*                 <span class="icon-bar"></span>*/
/*             </button>*/
/*             <a class="navbar-brand" href="{{ url('homepage') }}"><i class="fa fa-video-camera" aria-hidden="true"></i> Cinema Village</a>*/
/*         </div>*/
/*  */
/*  */
/*         <div id="navbar" class="navbar-collapse collapse navbar-right">*/
/*             <ul class="nav navbar-nav">*/
/*                 <li><a href="{{ url('homepage') }}">Home</a></li>*/
/*                 {% if is_granted('IS_AUTHENTICATED_FULLY') %}*/
/*                     {% if is_granted('ROLE_ADMIN') %}*/
/*                    */
/*                         <li class="dropdown">*/
/*                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">*/
/*                                     Admin <span class="caret"></span>*/
/*                                 </a>*/
/*                                 <ul class="dropdown-menu">*/
/*                                     <li><a href="{{ url('admin_show_all_users_paginated') }}">USERS MANAGEMENT</a></li>*/
/*                                     <li><a href="{{ url('admin_show_genres_paginated') }}">GENRES MANAGEMENT</a></li>*/
/*                                     <li><a href="{{ url('admin_show_all_rooms_paginated') }}">ROOMS MANAGEMENT</a></li>*/
/*                                     <li><a href="{{ url('admin_movie_add') }}">ADD A NEW MOVIE</a></li>*/
/*                                     <li><a href="{{ url('admin_show_schedule_page') }}">SCHEDULE A MOVIE</a></li>*/
/*                                     <li><a href="{{ url('admin_show_scheduled_movies_paginated') }}">EDIT SCHEDULED MOVIE</a></li>*/
/*                                     <li><a href="{{ url('admin_show_schedule_list') }}">VIEW SCHEDULES</a></li>*/
/*                                     <li><a href="{{ url('admin_show_occupancy') }}">SEE OCCUPANCY</a></li>*/
/*                                 </ul>*/
/*                         </li>                    */
/*  */
/*                     {% endif %}*/
/*                    */
/*                     <li><a href="{{url('logout')}}">Logout</a></li>*/
/*                    */
/*                 {% else %}*/
/*                     <li><a href="{{ url('show_register_page') }}">Register</a></li>*/
/*                     <li><a href="{{ url('login') }}">Login</a></li>*/
/*                 {% endif %}*/
/*             </ul>*/
/*  */
/*         </div>*/
/*     </div>*/
/* </nav>*/
/* */
