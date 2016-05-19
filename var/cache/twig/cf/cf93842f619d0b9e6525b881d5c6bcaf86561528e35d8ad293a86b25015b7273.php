<?php

/* navbar.html */
class __TwigTemplate_327394f333c6186683c8e48c0e56e780c50a13b9a5f6f87678845caf664d1ff2 extends Twig_Template
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
        // line 15
        echo $this->env->getExtension('routing')->getUrl("homepage");
        echo "\">Home</a></li>
                ";
        // line 16
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 17
            echo "                ";
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 18
                echo "                <li><a href=\"";
                echo $this->env->getExtension('routing')->getUrl("admin_room_show_all");
                echo "\">ROOMS</a></li>
                <li><a href=\"";
                // line 19
                echo $this->env->getExtension('routing')->getUrl("admin_genre_show_all");
                echo "\">GENRE</a></li>
                <li><a href=\"";
                // line 20
                echo $this->env->getExtension('routing')->getUrl("admin_show_all_users_paginated");
                echo "\">USERS</a></li>
                <li><a href=\"";
                // line 21
                echo $this->env->getExtension('routing')->getUrl("admin_movie_add");
                echo "\">Add a new movie</a></li>
                <li><a href=\"";
                // line 22
                echo $this->env->getExtension('routing')->getUrl("admin_show_schedule_page");
                echo "\">Schedule a movie</a></li>
                <li> <a href=\"";
                // line 23
                echo $this->env->getExtension('routing')->getUrl("admin_show_schedule_list");
                echo "\">View schedules</a></li>
                <li><a href=\"";
                // line 24
                echo $this->env->getExtension('routing')->getUrl("admin_show_occupancy");
                echo "\">Occupancy</a></li>
                <li><a href=\"";
                // line 25
                echo $this->env->getExtension('routing')->getUrl("admin_show_scheduled_movies_paginated");
                echo "\">Scheduled movies</a></li>
                ";
            }
            // line 27
            echo "                <li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("show_profile");
            echo "\">Profile</a></li>
                <li><a href=\"";
            // line 28
            echo $this->env->getExtension('routing')->getUrl("logout");
            echo "\">Logout</a></li>
                ";
        } else {
            // line 30
            echo "                <li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("show_register_page");
            echo "\">Register</a></li>
                <li><a href=\"";
            // line 31
            echo $this->env->getExtension('routing')->getUrl("login");
            echo "\">Login</a></li>
                ";
        }
        // line 33
        echo "            </ul>

        </div>
    </div>
</nav>
";
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
        return array (  101 => 33,  96 => 31,  91 => 30,  86 => 28,  81 => 27,  76 => 25,  72 => 24,  68 => 23,  64 => 22,  60 => 21,  56 => 20,  52 => 19,  47 => 18,  44 => 17,  42 => 16,  38 => 15,  30 => 10,  19 => 1,);
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
/* */
/*         <div id="navbar" class="navbar-collapse collapse navbar-right">*/
/*             <ul class="nav navbar-nav">*/
/*                 <li><a href="{{ url('homepage') }}">Home</a></li>*/
/*                 {% if is_granted('IS_AUTHENTICATED_FULLY') %}*/
/*                 {% if is_granted('ROLE_ADMIN') %}*/
/*                 <li><a href="{{ url('admin_room_show_all') }}">ROOMS</a></li>*/
/*                 <li><a href="{{ url('admin_genre_show_all') }}">GENRE</a></li>*/
/*                 <li><a href="{{ url('admin_show_all_users_paginated') }}">USERS</a></li>*/
/*                 <li><a href="{{ url('admin_movie_add') }}">Add a new movie</a></li>*/
/*                 <li><a href="{{ url('admin_show_schedule_page') }}">Schedule a movie</a></li>*/
/*                 <li> <a href="{{ url('admin_show_schedule_list') }}">View schedules</a></li>*/
/*                 <li><a href="{{ url('admin_show_occupancy') }}">Occupancy</a></li>*/
/*                 <li><a href="{{ url('admin_show_scheduled_movies_paginated') }}">Scheduled movies</a></li>*/
/*                 {% endif %}*/
/*                 <li><a href="{{url('show_profile')}}">Profile</a></li>*/
/*                 <li><a href="{{url('logout')}}">Logout</a></li>*/
/*                 {% else %}*/
/*                 <li><a href="{{ url('show_register_page') }}">Register</a></li>*/
/*                 <li><a href="{{ url('login') }}">Login</a></li>*/
/*                 {% endif %}*/
/*             </ul>*/
/* */
/*         </div>*/
/*     </div>*/
/* </nav>*/
/* */
