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
        $__internal_ff7bc7a589bf9f670b1c2f5c474395639b9bd835be36f1a30db1d6d8133fe99d = $this->env->getExtension("native_profiler");
        $__internal_ff7bc7a589bf9f670b1c2f5c474395639b9bd835be36f1a30db1d6d8133fe99d->enter($__internal_ff7bc7a589bf9f670b1c2f5c474395639b9bd835be36f1a30db1d6d8133fe99d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "navbar.html"));

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
                echo $this->env->getExtension('routing')->getUrl("admin_show_all_rooms_paginated");
                echo "\">ROOMS</a></li>
                                    <li><a href=\"";
                // line 26
                echo $this->env->getExtension('routing')->getUrl("admin_show_genres_paginated");
                echo "\">GENRE</a></li>
                                    <li><a href=\"";
                // line 27
                echo $this->env->getExtension('routing')->getUrl("admin_show_all_users_paginated");
                echo "\">USERS</a></li>
                                    <li><a href=\"";
                // line 28
                echo $this->env->getExtension('routing')->getUrl("admin_movie_add");
                echo "\">Add a new movie</a></li>
                                    <li><a href=\"";
                // line 29
                echo $this->env->getExtension('routing')->getUrl("admin_list_movies");
                echo "\">List Movies</a></li>
                                    <li><a href=\"";
                // line 30
                echo $this->env->getExtension('routing')->getUrl("admin_show_schedule_page");
                echo "\">Schedule a movie</a></li>
                                    <li><a href=\"";
                // line 31
                echo $this->env->getExtension('routing')->getUrl("admin_show_schedule_list");
                echo "\">View schedules</a></li>
                                    <li><a href=\"";
                // line 32
                echo $this->env->getExtension('routing')->getUrl("admin_show_occupancy");
                echo "\">Occupancy</a></li>
                                    <li><a href=\"";
                // line 33
                echo $this->env->getExtension('routing')->getUrl("admin_show_scheduled_movies_paginated");
                echo "\">Scheduled movies</a></li>
                                </ul>
                        </li>                    
 
                    ";
            }
            // line 38
            echo "                   
                    <li><a href=\"";
            // line 39
            echo $this->env->getExtension('routing')->getUrl("show_profile");
            echo "\">Profile</a></li>
                    <li><a href=\"";
            // line 40
            echo $this->env->getExtension('routing')->getUrl("logout");
            echo "\">Logout</a></li>
                   
                ";
        } else {
            // line 43
            echo "                    <li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("show_register_page");
            echo "\">Register</a></li>
                    <li><a href=\"";
            // line 44
            echo $this->env->getExtension('routing')->getUrl("login");
            echo "\">Login</a></li>
                ";
        }
        // line 46
        echo "            </ul>
 
        </div>
    </div>
</nav>
";
        
        $__internal_ff7bc7a589bf9f670b1c2f5c474395639b9bd835be36f1a30db1d6d8133fe99d->leave($__internal_ff7bc7a589bf9f670b1c2f5c474395639b9bd835be36f1a30db1d6d8133fe99d_prof);

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
        return array (  122 => 46,  117 => 44,  112 => 43,  106 => 40,  102 => 39,  99 => 38,  91 => 33,  87 => 32,  83 => 31,  79 => 30,  75 => 29,  71 => 28,  67 => 27,  63 => 26,  59 => 25,  51 => 19,  48 => 18,  46 => 17,  42 => 16,  33 => 10,  22 => 1,);
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
/*                                     <li><a href="{{ url('admin_show_all_rooms_paginated') }}">ROOMS</a></li>*/
/*                                     <li><a href="{{ url('admin_show_genres_paginated') }}">GENRE</a></li>*/
/*                                     <li><a href="{{ url('admin_show_all_users_paginated') }}">USERS</a></li>*/
/*                                     <li><a href="{{ url('admin_movie_add') }}">Add a new movie</a></li>*/
/*                                     <li><a href="{{ url('admin_list_movies') }}">List Movies</a></li>*/
/*                                     <li><a href="{{ url('admin_show_schedule_page') }}">Schedule a movie</a></li>*/
/*                                     <li><a href="{{ url('admin_show_schedule_list') }}">View schedules</a></li>*/
/*                                     <li><a href="{{ url('admin_show_occupancy') }}">Occupancy</a></li>*/
/*                                     <li><a href="{{ url('admin_show_scheduled_movies_paginated') }}">Scheduled movies</a></li>*/
/*                                 </ul>*/
/*                         </li>                    */
/*  */
/*                     {% endif %}*/
/*                    */
/*                     <li><a href="{{url('show_profile')}}">Profile</a></li>*/
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
