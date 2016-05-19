<?php

/* Occupancy/occupancy.html */
class __TwigTemplate_5f1120301044841afcc113d9edeff6a070d4f68b84deafebcc1c2ec3e09fa830 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Occupancy/occupancy.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f08f7a67fc447afd9fb339921015b3fa35756fc98d3e324f6e9c147757dc431b = $this->env->getExtension("native_profiler");
        $__internal_f08f7a67fc447afd9fb339921015b3fa35756fc98d3e324f6e9c147757dc431b->enter($__internal_f08f7a67fc447afd9fb339921015b3fa35756fc98d3e324f6e9c147757dc431b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Occupancy/occupancy.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f08f7a67fc447afd9fb339921015b3fa35756fc98d3e324f6e9c147757dc431b->leave($__internal_f08f7a67fc447afd9fb339921015b3fa35756fc98d3e324f6e9c147757dc431b_prof);

    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        $__internal_021bfebc356682e3ca5428af0bf9d81d0ca64d26e3207f9be75a9b8c65e5b67b = $this->env->getExtension("native_profiler");
        $__internal_021bfebc356682e3ca5428af0bf9d81d0ca64d26e3207f9be75a9b8c65e5b67b->enter($__internal_021bfebc356682e3ca5428af0bf9d81d0ca64d26e3207f9be75a9b8c65e5b67b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.1.4.min.js\"></script> 
<script src=\"//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js\"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
    \$.webshims.formcfg = {
        en: {
            dFormat: '-',
            dateSigns: '-',
            patterns: {
                d: \"yy-mm-dd\"
            }
        }
    };
</script>


<div class=\"banner text-center\">
    ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 22
            echo "    ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\">

        <div class=\"wrapper col-lg-12 col-centered\">
            <span class=\"section-title text-center\">View Occupancy Level</span><hr/>
            <ul>
                <li>
                    <label>Filter By Room</label>
                    <select id=\"room_id_selector\" name=\"room\">
                        <option value=\"all\">All</option>
                        ";
        // line 38
        if ((isset($context["rooms"]) ? $context["rooms"] : $this->getContext($context, "rooms"))) {
            // line 39
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["available_rooms"]) ? $context["available_rooms"] : $this->getContext($context, "available_rooms")));
            foreach ($context['_seq'] as $context["key"] => $context["room"]) {
                // line 40
                echo "                        ";
                if (($context["key"] == ((isset($context["selected"]) ? $context["selected"] : $this->getContext($context, "selected")) - 1))) {
                    // line 41
                    echo "                        <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getId", array(), "method"), "html", null, true);
                    echo "\" selected>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getName", array(), "method"), "html", null, true);
                    echo "</option>
                        ";
                } else {
                    // line 43
                    echo "                        <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getId", array(), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getName", array(), "method"), "html", null, true);
                    echo "</option>
                        ";
                }
                // line 45
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['room'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "                        ";
        }
        // line 47
        echo "                    </select>
                </li>
                <li><br></li>
                <li>
                    <label>Filter By Date</label>
                    <select id=\"schedule_date_selector\" name=\"room\">
                        <option value=\"all\">All</option>
                        ";
        // line 54
        if ((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates"))) {
            // line 55
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")));
            foreach ($context['_seq'] as $context["key"] => $context["date"]) {
                // line 56
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $context["date"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates_formated"]) ? $context["dates_formated"] : $this->getContext($context, "dates_formated")), $context["key"]), "html", null, true);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['date'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "                        ";
        }
        // line 59
        echo "                    </select>
                </li>
                <li><br></li>
                <li id=\"time_filter\">
                    <label>Filter By Time</label>
                    <select id=\"schedule_time_selector\" name=\"room\">
                        <option value=\"all\">All</option>
                        ";
        // line 66
        if ((isset($context["times"]) ? $context["times"] : $this->getContext($context, "times"))) {
            // line 67
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["times"]) ? $context["times"] : $this->getContext($context, "times")));
            foreach ($context['_seq'] as $context["key"] => $context["time"]) {
                // line 68
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $context["time"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["time"], "html", null, true);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['time'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "                        ";
        }
        // line 71
        echo "                    </select>
                </li>
            </ul>

            ";
        // line 75
        if ((isset($context["show_results"]) ? $context["show_results"] : $this->getContext($context, "show_results"))) {
            // line 76
            echo "            <div class=\"showList\">
                <table class=\"table\" style=\"color:#2c3e50\">
                    <thead>
                        <tr>
                            <th>Room Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Occupancy Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 87
            $this->loadTemplate("Occupancy/occupancy_table.html", "Occupancy/occupancy.html", 87)->display($context);
            // line 88
            echo "                    </tbody>
                </table>
            </div>

            ";
        }
        // line 93
        echo "        </div>
    </div>
</div>

<script src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/getoccupancy.js\"></script>
";
        
        $__internal_021bfebc356682e3ca5428af0bf9d81d0ca64d26e3207f9be75a9b8c65e5b67b->leave($__internal_021bfebc356682e3ca5428af0bf9d81d0ca64d26e3207f9be75a9b8c65e5b67b_prof);

    }

    public function getTemplateName()
    {
        return "Occupancy/occupancy.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 97,  214 => 93,  207 => 88,  205 => 87,  192 => 76,  190 => 75,  184 => 71,  181 => 70,  170 => 68,  165 => 67,  163 => 66,  154 => 59,  151 => 58,  140 => 56,  135 => 55,  133 => 54,  124 => 47,  121 => 46,  115 => 45,  107 => 43,  99 => 41,  96 => 40,  91 => 39,  89 => 38,  73 => 24,  64 => 22,  60 => 21,  40 => 3,  34 => 2,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* {% block content %}*/
/* <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> */
/* <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>*/
/* <script>*/
/*     webshims.setOptions('forms-ext', {types: 'date'});*/
/*     webshims.polyfill('forms forms-ext');*/
/*     $.webshims.formcfg = {*/
/*         en: {*/
/*             dFormat: '-',*/
/*             dateSigns: '-',*/
/*             patterns: {*/
/*                 d: "yy-mm-dd"*/
/*             }*/
/*         }*/
/*     };*/
/* </script>*/
/* */
/* */
/* <div class="banner text-center">*/
/*     {% for message in app.session.getFlashBag.get('error') %}*/
/*     {{ message }}*/
/*     {% endfor %}*/
/*     <h1>Cinema Village</h1>*/
/*     <h2>A new generation movie theater in your town. Try us!</h2>*/
/* </div>*/
/* */
/* <div class="wrapperArea">*/
/*     <div class="container">*/
/* */
/*         <div class="wrapper col-lg-12 col-centered">*/
/*             <span class="section-title text-center">View Occupancy Level</span><hr/>*/
/*             <ul>*/
/*                 <li>*/
/*                     <label>Filter By Room</label>*/
/*                     <select id="room_id_selector" name="room">*/
/*                         <option value="all">All</option>*/
/*                         {% if rooms %}*/
/*                         {% for key,room in available_rooms %}*/
/*                         {% if key==selected-1 %}*/
/*                         <option value="{{room.getId()}}" selected>{{room.getName()}}</option>*/
/*                         {% else %}*/
/*                         <option value="{{room.getId()}}">{{room.getName()}}</option>*/
/*                         {% endif %}*/
/*                         {% endfor %}*/
/*                         {% endif %}*/
/*                     </select>*/
/*                 </li>*/
/*                 <li><br></li>*/
/*                 <li>*/
/*                     <label>Filter By Date</label>*/
/*                     <select id="schedule_date_selector" name="room">*/
/*                         <option value="all">All</option>*/
/*                         {% if dates %}*/
/*                         {% for key,date in dates %}*/
/*                         <option value="{{date}}">{{attribute(dates_formated,key)}}</option>*/
/*                         {% endfor %}*/
/*                         {% endif %}*/
/*                     </select>*/
/*                 </li>*/
/*                 <li><br></li>*/
/*                 <li id="time_filter">*/
/*                     <label>Filter By Time</label>*/
/*                     <select id="schedule_time_selector" name="room">*/
/*                         <option value="all">All</option>*/
/*                         {% if times %}*/
/*                         {% for key,time in times %}*/
/*                         <option value="{{time}}">{{time}}</option>*/
/*                         {% endfor %}*/
/*                         {% endif %}*/
/*                     </select>*/
/*                 </li>*/
/*             </ul>*/
/* */
/*             {% if show_results %}*/
/*             <div class="showList">*/
/*                 <table class="table" style="color:#2c3e50">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>Room Name</th>*/
/*                             <th>Date</th>*/
/*                             <th>Time</th>*/
/*                             <th>Occupancy Level</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                         {% include 'Occupancy/occupancy_table.html' %}*/
/*                     </tbody>*/
/*                 </table>*/
/*             </div>*/
/* */
/*             {% endif %}*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* */
/* <script src="{{ app.request.basepath }}/js/getoccupancy.js"></script>*/
/* {% endblock %}*/
