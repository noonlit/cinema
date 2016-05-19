<?php

/* Schedule/showschedules.html */
class __TwigTemplate_bacb2af6c0d95ee3d7841f7c18aa3f7e8f057c999f7d7b686c86e93a72c396ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Schedule/showschedules.html", 1);
        $this->blocks = array(
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
        $__internal_345b503d72a031f9d69c918c9c1ec2cd28968d65ff1cd3a507f884a6a26ee079 = $this->env->getExtension("native_profiler");
        $__internal_345b503d72a031f9d69c918c9c1ec2cd28968d65ff1cd3a507f884a6a26ee079->enter($__internal_345b503d72a031f9d69c918c9c1ec2cd28968d65ff1cd3a507f884a6a26ee079_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Schedule/showschedules.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_345b503d72a031f9d69c918c9c1ec2cd28968d65ff1cd3a507f884a6a26ee079->leave($__internal_345b503d72a031f9d69c918c9c1ec2cd28968d65ff1cd3a507f884a6a26ee079_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_3ec0a277b61bf949fc71c50e60b318fec3b5219edc9239260d8bcb994d817292 = $this->env->getExtension("native_profiler");
        $__internal_3ec0a277b61bf949fc71c50e60b318fec3b5219edc9239260d8bcb994d817292->enter($__internal_3ec0a277b61bf949fc71c50e60b318fec3b5219edc9239260d8bcb994d817292_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " View schedules ";
        
        $__internal_3ec0a277b61bf949fc71c50e60b318fec3b5219edc9239260d8bcb994d817292->leave($__internal_3ec0a277b61bf949fc71c50e60b318fec3b5219edc9239260d8bcb994d817292_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_92542eeb5a56f483f7adb6b4c4828750d325e70a26ee90cd141dfd516c61777b = $this->env->getExtension("native_profiler");
        $__internal_92542eeb5a56f483f7adb6b4c4828750d325e70a26ee90cd141dfd516c61777b->enter($__internal_92542eeb5a56f483f7adb6b4c4828750d325e70a26ee90cd141dfd516c61777b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "<div class=\"banner text-center\">
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 8
            echo "    ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\">
        <div class=\"wrapper col-lg-12 col-centered\">           
            <label for=\"date\"> Select date </label>                
            <select id =date_selector name=\"date\">
                ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["schedules"]) ? $context["schedules"] : $this->getContext($context, "schedules")));
        foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
            // line 20
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, $context["date"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["date"], "html", null, true);
            echo "</option>                  
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "            </select>            
            <div class=\"showList\">    
                <table id=\"schedules\" class=\"table\" style=\"color:black\">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hour</th>
                            <th>Movie</th
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxSchedulesPerDay.js\"></script>
";
        
        $__internal_92542eeb5a56f483f7adb6b4c4828750d325e70a26ee90cd141dfd516c61777b->leave($__internal_92542eeb5a56f483f7adb6b4c4828750d325e70a26ee90cd141dfd516c61777b_prof);

    }

    public function getTemplateName()
    {
        return "Schedule/showschedules.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 40,  95 => 22,  84 => 20,  80 => 19,  69 => 10,  60 => 8,  56 => 7,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block title%} View schedules {% endblock %}*/
/* */
/* {% block content %}*/
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
/*         <div class="wrapper col-lg-12 col-centered">           */
/*             <label for="date"> Select date </label>                */
/*             <select id =date_selector name="date">*/
/*                 {% for date in schedules %}*/
/*                 <option value="{{date}}">{{date}}</option>                  */
/*                 {% endfor %}*/
/*             </select>            */
/*             <div class="showList">    */
/*                 <table id="schedules" class="table" style="color:black">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>#</th>*/
/*                             <th>Hour</th>*/
/*                             <th>Movie</th*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                         */
/*                     </tbody>*/
/*                 </table>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* <script src="{{ app.request.basepath }}/js/AjaxSchedulesPerDay.js"></script>*/
/* {% endblock %}*/
/* */
/* */
