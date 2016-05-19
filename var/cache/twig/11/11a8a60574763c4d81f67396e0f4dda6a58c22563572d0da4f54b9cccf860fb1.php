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
        $__internal_dedeeb2c6e4e11d6ce86721fd2dcdc0a8aaa61a7bfff0779e85f4b59dbddb580 = $this->env->getExtension("native_profiler");
        $__internal_dedeeb2c6e4e11d6ce86721fd2dcdc0a8aaa61a7bfff0779e85f4b59dbddb580->enter($__internal_dedeeb2c6e4e11d6ce86721fd2dcdc0a8aaa61a7bfff0779e85f4b59dbddb580_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Occupancy/occupancy.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_dedeeb2c6e4e11d6ce86721fd2dcdc0a8aaa61a7bfff0779e85f4b59dbddb580->leave($__internal_dedeeb2c6e4e11d6ce86721fd2dcdc0a8aaa61a7bfff0779e85f4b59dbddb580_prof);

    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        $__internal_c3e1b4d716278343dc415701c78ce90f9e1e322b1ee54f56dbd2f202865aab5f = $this->env->getExtension("native_profiler");
        $__internal_c3e1b4d716278343dc415701c78ce90f9e1e322b1ee54f56dbd2f202865aab5f->enter($__internal_c3e1b4d716278343dc415701c78ce90f9e1e322b1ee54f56dbd2f202865aab5f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

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
            <form class=\"occupancy_form\" style=\"color:black\" method=\"GET\" action=\"";
        // line 33
        echo $this->env->getExtension('routing')->getUrl("admin_query_occupancy");
        echo "\"> 
                <select id=\"room_id_selector\" name=\"room\">
                    ";
        // line 35
        if ((isset($context["rooms"]) ? $context["rooms"] : $this->getContext($context, "rooms"))) {
            // line 36
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["rooms"]) ? $context["rooms"] : $this->getContext($context, "rooms")));
            foreach ($context['_seq'] as $context["key"] => $context["room"]) {
                // line 37
                echo "                    ";
                if (($context["key"] == ((isset($context["selected"]) ? $context["selected"] : $this->getContext($context, "selected")) - 1))) {
                    // line 38
                    echo "                    <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "id", array()), "html", null, true);
                    echo "\" selected>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "name", array()), "html", null, true);
                    echo "</option>
                    ";
                } else {
                    // line 40
                    echo "                    <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "id", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "name", array()), "html", null, true);
                    echo "</option>
                    ";
                }
                // line 42
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['room'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "                    ";
        }
        // line 44
        echo "                </select>
     
                <select id=date_selector name=\"date\">
                    ";
        // line 47
        if ((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates"))) {
            // line 48
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")));
            foreach ($context['_seq'] as $context["key"] => $context["date"]) {
                // line 49
                echo "                    ";
                if (($context["key"] == (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")))) {
                    // line 50
                    echo "                    <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "date", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "time", array()), "html", null, true);
                    echo "\" selected>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "date", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "time", array()), "html", null, true);
                    echo "</option>
                    ";
                } else {
                    // line 52
                    echo "                    <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "date", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "time", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "date", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["date"], "time", array()), "html", null, true);
                    echo "</option>
                    ";
                }
                // line 54
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['date'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "                    ";
        }
        // line 56
        echo "                </select>
                <button name=\"search_occupancy\">Get Occupancy Level</button>
            </form>
            ";
        // line 59
        if ((isset($context["show_results"]) ? $context["show_results"] : $this->getContext($context, "show_results"))) {
            // line 60
            echo "            <div class=\"showList\">
                <table class=\"table\" style=\"color:#2c3e50\">
                    <thead>
                        <tr>
                            <th>Room Name</th>
                            <th>Date</th>
                            <th>Hours</th>
                            <th>Occupancy Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope=\"row\">";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["schedule"]) ? $context["schedule"] : $this->getContext($context, "schedule")), "name", array()), "html", null, true);
            echo " </td>
                            <td>";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["schedule"]) ? $context["schedule"] : $this->getContext($context, "schedule")), "date", array()), "html", null, true);
            echo "</td>
                            <td>";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["schedule"]) ? $context["schedule"] : $this->getContext($context, "schedule")), "time", array()), "html", null, true);
            echo "</td>
                            <td>";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["schedule"]) ? $context["schedule"] : $this->getContext($context, "schedule")), "percent", array()), "html", null, true);
            echo "% </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            ";
        }
        // line 82
        echo "        </div>
    </div>
</div>

<script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/getoccupancy.js\"></script>
";
        
        $__internal_c3e1b4d716278343dc415701c78ce90f9e1e322b1ee54f56dbd2f202865aab5f->leave($__internal_c3e1b4d716278343dc415701c78ce90f9e1e322b1ee54f56dbd2f202865aab5f_prof);

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
        return array (  221 => 86,  215 => 82,  205 => 75,  201 => 74,  197 => 73,  193 => 72,  179 => 60,  177 => 59,  172 => 56,  169 => 55,  163 => 54,  151 => 52,  139 => 50,  136 => 49,  131 => 48,  129 => 47,  124 => 44,  121 => 43,  115 => 42,  107 => 40,  99 => 38,  96 => 37,  91 => 36,  89 => 35,  84 => 33,  73 => 24,  64 => 22,  60 => 21,  40 => 3,  34 => 2,  11 => 1,);
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
/*         */
/*         <div class="wrapper col-lg-12 col-centered">*/
/*             <span class="section-title text-center">View Occupancy Level</span><hr/>*/
/*             <form class="occupancy_form" style="color:black" method="GET" action="{{ url('admin_query_occupancy') }}"> */
/*                 <select id="room_id_selector" name="room">*/
/*                     {% if rooms %}*/
/*                     {% for key,room in rooms %}*/
/*                     {% if key==selected-1 %}*/
/*                     <option value="{{room.id}}" selected>{{room.name}}</option>*/
/*                     {% else %}*/
/*                     <option value="{{room.id}}">{{room.name}}</option>*/
/*                     {% endif %}*/
/*                     {% endfor %}*/
/*                     {% endif %}*/
/*                 </select>*/
/*      */
/*                 <select id=date_selector name="date">*/
/*                     {% if dates %}*/
/*                     {% for key,date in dates %}*/
/*                     {% if key == selected_date %}*/
/*                     <option value="{{ date.date }} {{ date.time }}" selected>{{ date.date }} {{ date.time }}</option>*/
/*                     {% else %}*/
/*                     <option value="{{ date.date }} {{ date.time }}">{{ date.date }} {{ date.time }}</option>*/
/*                     {% endif %}*/
/*                     {% endfor %}*/
/*                     {% endif %}*/
/*                 </select>*/
/*                 <button name="search_occupancy">Get Occupancy Level</button>*/
/*             </form>*/
/*             {% if show_results %}*/
/*             <div class="showList">*/
/*                 <table class="table" style="color:#2c3e50">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>Room Name</th>*/
/*                             <th>Date</th>*/
/*                             <th>Hours</th>*/
/*                             <th>Occupancy Level</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                         <tr>*/
/*                             <td scope="row">{{schedule.name}} </td>*/
/*                             <td>{{schedule.date}}</td>*/
/*                             <td>{{schedule.time}}</td>*/
/*                             <td>{{schedule.percent}}% </td>*/
/*                         </tr>*/
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
