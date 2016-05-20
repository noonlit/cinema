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
        $__internal_580db5df7e2fab44b19c867dee62cf41233b74a12fa1c4631a18851d247de334 = $this->env->getExtension("native_profiler");
        $__internal_580db5df7e2fab44b19c867dee62cf41233b74a12fa1c4631a18851d247de334->enter($__internal_580db5df7e2fab44b19c867dee62cf41233b74a12fa1c4631a18851d247de334_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Occupancy/occupancy.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_580db5df7e2fab44b19c867dee62cf41233b74a12fa1c4631a18851d247de334->leave($__internal_580db5df7e2fab44b19c867dee62cf41233b74a12fa1c4631a18851d247de334_prof);

    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        $__internal_4b46ffe338eef4881092075c99e4fc54b857f47c5606a58f5b02c9e8567998a9 = $this->env->getExtension("native_profiler");
        $__internal_4b46ffe338eef4881092075c99e4fc54b857f47c5606a58f5b02c9e8567998a9->enter($__internal_4b46ffe338eef4881092075c99e4fc54b857f47c5606a58f5b02c9e8567998a9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

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
            
            ";
        // line 33
        if ((isset($context["show_results"]) ? $context["show_results"] : $this->getContext($context, "show_results"))) {
            // line 34
            echo "            
            <div class=\"showList\">
                
                <div class=\"section-title\">
                    <p class=\"pull-left\">View all available Genres</p>
                    <div class=\"users-per-page pull-right\">
                        <span>Filter by Room</span>
                        <select id=\"room_id_selector\" name=\"room\" class=\"form-control\">
                            <option value=\"all\">All</option>
                            ";
            // line 43
            if ((isset($context["rooms"]) ? $context["rooms"] : $this->getContext($context, "rooms"))) {
                // line 44
                echo "                            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["available_rooms"]) ? $context["available_rooms"] : $this->getContext($context, "available_rooms")));
                foreach ($context['_seq'] as $context["key"] => $context["room"]) {
                    // line 45
                    echo "                            ";
                    if (($context["key"] == ((isset($context["selected"]) ? $context["selected"] : $this->getContext($context, "selected")) - 1))) {
                        // line 46
                        echo "                            <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getId", array(), "method"), "html", null, true);
                        echo "\" selected>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getName", array(), "method"), "html", null, true);
                        echo "</option>
                            ";
                    } else {
                        // line 48
                        echo "                            <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getId", array(), "method"), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getName", array(), "method"), "html", null, true);
                        echo "</option>
                            ";
                    }
                    // line 50
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['room'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 51
                echo "                            ";
            }
            // line 52
            echo "                        </select>

                        <span>Filter by Date</span>
                        <select id=\"schedule_date_selector\" name=\"room\" class=\"form-control\">
                            <option value=\"all\">All</option>
                            ";
            // line 57
            if ((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates"))) {
                // line 58
                echo "                            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")));
                foreach ($context['_seq'] as $context["key"] => $context["date"]) {
                    // line 59
                    echo "                            <option value=\"";
                    echo twig_escape_filter($this->env, $context["date"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates_formated"]) ? $context["dates_formated"] : $this->getContext($context, "dates_formated")), $context["key"]), "html", null, true);
                    echo "</option>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['date'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 61
                echo "                            ";
            }
            // line 62
            echo "                        </select>     

                        <span>Filter by Time</span>
                        <select id=\"schedule_time_selector\" name=\"room\" class=\"form-control\">
                            <option value=\"all\">All</option>
                            ";
            // line 67
            if ((isset($context["times"]) ? $context["times"] : $this->getContext($context, "times"))) {
                // line 68
                echo "                            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["times"]) ? $context["times"] : $this->getContext($context, "times")));
                foreach ($context['_seq'] as $context["key"] => $context["time"]) {
                    // line 69
                    echo "                            <option value=\"";
                    echo twig_escape_filter($this->env, $context["time"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["time"], "html", null, true);
                    echo "</option>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['time'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 71
                echo "                            ";
            }
            // line 72
            echo "                        </select>                    
                    </div>                    
                </div>                 
                
                <table class=\"table\">
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
            // line 86
            $this->loadTemplate("Occupancy/occupancy_table.html", "Occupancy/occupancy.html", 86)->display($context);
            // line 87
            echo "                    </tbody>
                </table>
            </div>

            ";
        }
        // line 92
        echo "        </div>
    </div>
</div>

<script src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/getoccupancy.js\"></script>
";
        
        $__internal_4b46ffe338eef4881092075c99e4fc54b857f47c5606a58f5b02c9e8567998a9->leave($__internal_4b46ffe338eef4881092075c99e4fc54b857f47c5606a58f5b02c9e8567998a9_prof);

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
        return array (  219 => 96,  213 => 92,  206 => 87,  204 => 86,  188 => 72,  185 => 71,  174 => 69,  169 => 68,  167 => 67,  160 => 62,  157 => 61,  146 => 59,  141 => 58,  139 => 57,  132 => 52,  129 => 51,  123 => 50,  115 => 48,  107 => 46,  104 => 45,  99 => 44,  97 => 43,  86 => 34,  84 => 33,  73 => 24,  64 => 22,  60 => 21,  40 => 3,  34 => 2,  11 => 1,);
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
/*             */
/*             {% if show_results %}*/
/*             */
/*             <div class="showList">*/
/*                 */
/*                 <div class="section-title">*/
/*                     <p class="pull-left">View all available Genres</p>*/
/*                     <div class="users-per-page pull-right">*/
/*                         <span>Filter by Room</span>*/
/*                         <select id="room_id_selector" name="room" class="form-control">*/
/*                             <option value="all">All</option>*/
/*                             {% if rooms %}*/
/*                             {% for key,room in available_rooms %}*/
/*                             {% if key==selected-1 %}*/
/*                             <option value="{{room.getId()}}" selected>{{room.getName()}}</option>*/
/*                             {% else %}*/
/*                             <option value="{{room.getId()}}">{{room.getName()}}</option>*/
/*                             {% endif %}*/
/*                             {% endfor %}*/
/*                             {% endif %}*/
/*                         </select>*/
/* */
/*                         <span>Filter by Date</span>*/
/*                         <select id="schedule_date_selector" name="room" class="form-control">*/
/*                             <option value="all">All</option>*/
/*                             {% if dates %}*/
/*                             {% for key,date in dates %}*/
/*                             <option value="{{date}}">{{attribute(dates_formated,key)}}</option>*/
/*                             {% endfor %}*/
/*                             {% endif %}*/
/*                         </select>     */
/* */
/*                         <span>Filter by Time</span>*/
/*                         <select id="schedule_time_selector" name="room" class="form-control">*/
/*                             <option value="all">All</option>*/
/*                             {% if times %}*/
/*                             {% for key,time in times %}*/
/*                             <option value="{{time}}">{{time}}</option>*/
/*                             {% endfor %}*/
/*                             {% endif %}*/
/*                         </select>                    */
/*                     </div>                    */
/*                 </div>                 */
/*                 */
/*                 <table class="table">*/
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
