<?php

/* Occupancy/occupancy_table.html */
class __TwigTemplate_616c994caa54d2c888813f8c1099170f6b3093e75de23380ca7edd5faa6be4a4 extends Twig_Template
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
        $__internal_96fbb95036243386a38da6f437e477877ebd1db84fef21e7adcc55413e12859c = $this->env->getExtension("native_profiler");
        $__internal_96fbb95036243386a38da6f437e477877ebd1db84fef21e7adcc55413e12859c->enter($__internal_96fbb95036243386a38da6f437e477877ebd1db84fef21e7adcc55413e12859c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Occupancy/occupancy_table.html"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sorted_movies"]) ? $context["sorted_movies"] : $this->getContext($context, "sorted_movies")));
        foreach ($context['_seq'] as $context["key"] => $context["schedule"]) {
            // line 2
            $context["room"] = $this->getAttribute((isset($context["rooms"]) ? $context["rooms"] : $this->getContext($context, "rooms")), $context["key"]);
            // line 3
            echo "<tr>
    <td colspan=\"4\" style=\"background-color:gray\">
        <a href=\"";
            // line 5
            echo $this->env->getExtension('routing')->getUrl("admin_show_all_rooms_paginated");
            echo "\">
            ";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["room"]) ? $context["room"] : $this->getContext($context, "room")), "getName", array()), "html", null, true);
            echo "
        </a>
    </td>   
</tr>
";
            // line 10
            if ($this->getAttribute((isset($context["sorted_schedules"]) ? $context["sorted_schedules"] : $this->getContext($context, "sorted_schedules")), $context["key"])) {
                // line 11
                $context["sorted_movie"] = $this->getAttribute((isset($context["sorted_movies"]) ? $context["sorted_movies"] : $this->getContext($context, "sorted_movies")), $context["key"]);
                // line 12
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["sorted_schedules"]) ? $context["sorted_schedules"] : $this->getContext($context, "sorted_schedules")), $context["key"]));
                foreach ($context['_seq'] as $context["key"] => $context["schedule"]) {
                    // line 13
                    echo "<tr>
    <td>";
                    // line 14
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sorted_movie"]) ? $context["sorted_movie"] : $this->getContext($context, "sorted_movie")), $context["key"]), "title", array()), "html", null, true);
                    echo "</td>
    <td>";
                    // line 15
                    echo twig_escape_filter($this->env, $this->getAttribute($context["schedule"], "getStringDate", array(0 => "d M"), "method"), "html", null, true);
                    echo "</td>
    <td>";
                    // line 16
                    echo twig_escape_filter($this->env, $this->getAttribute($context["schedule"], "getTime", array(), "method"), "html", null, true);
                    echo "</td>
    <td>";
                    // line 17
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sorted_movie"]) ? $context["sorted_movie"] : $this->getContext($context, "sorted_movie")), $context["key"]), "occupancy_level", array()), "html", null, true);
                    echo " %</td>
</tr>
";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['schedule'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            } else {
                // line 21
                echo "<tr>
    <td>N.A</td>
    <td>N.A</td>
    <td>N.A</td>
    <td>N.A</td>
</tr>
";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['schedule'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_96fbb95036243386a38da6f437e477877ebd1db84fef21e7adcc55413e12859c->leave($__internal_96fbb95036243386a38da6f437e477877ebd1db84fef21e7adcc55413e12859c_prof);

    }

    public function getTemplateName()
    {
        return "Occupancy/occupancy_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 21,  66 => 17,  62 => 16,  58 => 15,  54 => 14,  51 => 13,  47 => 12,  45 => 11,  43 => 10,  36 => 6,  32 => 5,  28 => 3,  26 => 2,  22 => 1,);
    }
}
/* {% for key,schedule in sorted_movies %}*/
/* {% set room = attribute(rooms,key) %}*/
/* <tr>*/
/*     <td colspan="4" style="background-color:gray">*/
/*         <a href="{{ url('admin_show_all_rooms_paginated') }}">*/
/*             {{room.getName}}*/
/*         </a>*/
/*     </td>   */
/* </tr>*/
/* {% if attribute(sorted_schedules,key) %}*/
/* {% set sorted_movie = attribute(sorted_movies,key) %}*/
/* {% for key,schedule in attribute(sorted_schedules,key) %}*/
/* <tr>*/
/*     <td>{{attribute(sorted_movie,key).title}}</td>*/
/*     <td>{{schedule.getStringDate('d M')}}</td>*/
/*     <td>{{schedule.getTime()}}</td>*/
/*     <td>{{attribute(sorted_movie,key).occupancy_level}} %</td>*/
/* </tr>*/
/* {% endfor %}*/
/* {% else %}*/
/* <tr>*/
/*     <td>N.A</td>*/
/*     <td>N.A</td>*/
/*     <td>N.A</td>*/
/*     <td>N.A</td>*/
/* </tr>*/
/* {% endif %}*/
/* {% endfor %}*/
