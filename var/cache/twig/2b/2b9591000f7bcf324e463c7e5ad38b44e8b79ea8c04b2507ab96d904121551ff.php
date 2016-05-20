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
        $__internal_2ca9f3e648937175268292fc691bff03416c38c8e2046b51b7d918f348925ded = $this->env->getExtension("native_profiler");
        $__internal_2ca9f3e648937175268292fc691bff03416c38c8e2046b51b7d918f348925ded->enter($__internal_2ca9f3e648937175268292fc691bff03416c38c8e2046b51b7d918f348925ded_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Schedule/showschedules.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2ca9f3e648937175268292fc691bff03416c38c8e2046b51b7d918f348925ded->leave($__internal_2ca9f3e648937175268292fc691bff03416c38c8e2046b51b7d918f348925ded_prof);

    }

    // line 3
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_8709aa7a10092ac69891f8f76ddecb56c9152cc20b05687f43a26db01ccbb443 = $this->env->getExtension("native_profiler");
        $__internal_8709aa7a10092ac69891f8f76ddecb56c9152cc20b05687f43a26db01ccbb443->enter($__internal_8709aa7a10092ac69891f8f76ddecb56c9152cc20b05687f43a26db01ccbb443_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        echo "    
<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxDeleteTableRow.js\"></script> 
<script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxSchedulesPerDay.js\"></script>  

";
        
        $__internal_8709aa7a10092ac69891f8f76ddecb56c9152cc20b05687f43a26db01ccbb443->leave($__internal_8709aa7a10092ac69891f8f76ddecb56c9152cc20b05687f43a26db01ccbb443_prof);

    }

    // line 9
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_ac852eb31a7167a6795f560bc8d7a62091374f2eaa97cde264c489bcf1f3b78b = $this->env->getExtension("native_profiler");
        $__internal_ac852eb31a7167a6795f560bc8d7a62091374f2eaa97cde264c489bcf1f3b78b->enter($__internal_ac852eb31a7167a6795f560bc8d7a62091374f2eaa97cde264c489bcf1f3b78b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 10
        echo "
ajaxDeleteTableRow = new AjaxDeleteTableRow('#schedule-container', 'schedules/delete/{id}', function (data) {
    swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
});

";
        
        $__internal_ac852eb31a7167a6795f560bc8d7a62091374f2eaa97cde264c489bcf1f3b78b->leave($__internal_ac852eb31a7167a6795f560bc8d7a62091374f2eaa97cde264c489bcf1f3b78b_prof);

    }

    // line 17
    public function block_title($context, array $blocks = array())
    {
        $__internal_51af9fe00b805440addd42c5ced6720cc47ce1ae4d554741683bdb21d185ff37 = $this->env->getExtension("native_profiler");
        $__internal_51af9fe00b805440addd42c5ced6720cc47ce1ae4d554741683bdb21d185ff37->enter($__internal_51af9fe00b805440addd42c5ced6720cc47ce1ae4d554741683bdb21d185ff37_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " View schedules ";
        
        $__internal_51af9fe00b805440addd42c5ced6720cc47ce1ae4d554741683bdb21d185ff37->leave($__internal_51af9fe00b805440addd42c5ced6720cc47ce1ae4d554741683bdb21d185ff37_prof);

    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        $__internal_b87b69d9db859b60bb3dd5ce4bb91d4ec632f8ee067da724ffbe312ee86a6f61 = $this->env->getExtension("native_profiler");
        $__internal_b87b69d9db859b60bb3dd5ce4bb91d4ec632f8ee067da724ffbe312ee86a6f61->enter($__internal_b87b69d9db859b60bb3dd5ce4bb91d4ec632f8ee067da724ffbe312ee86a6f61_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 20
        echo "<div class=\"banner text-center\">
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
    <div class=\"container\" id=\"schedule-container\">
        <div class=\"wrapper col-lg-12 col-centered\">   
            <div class=\"showList\"> 
               
                <div class=\"section-title\">
                    <p class=\"pull-left\">View all available Scheduled Movies</p>
                    <div class=\"users-per-page pull-right\">
                        <span>Select a date</span>

                        <select id=\"date_selector\" name=\"date\" class=\"form-control\" >
                            ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")));
        foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
            // line 40
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $context["date"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["date"], "html", null, true);
            echo "</option>                  
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                        </select>   
                    </div>                    
                </div>                 
                
                <table id=\"schedules\" class=\"table\" style=\"color:black\">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hour</th>
                            <th>Movie</th>
                            <th>Room</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>              
            </div>
        </div>
    </div>
</div>

";
        
        $__internal_b87b69d9db859b60bb3dd5ce4bb91d4ec632f8ee067da724ffbe312ee86a6f61->leave($__internal_b87b69d9db859b60bb3dd5ce4bb91d4ec632f8ee067da724ffbe312ee86a6f61_prof);

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
        return array (  143 => 42,  132 => 40,  128 => 39,  111 => 24,  102 => 22,  98 => 21,  95 => 20,  89 => 19,  77 => 17,  65 => 10,  59 => 9,  49 => 5,  45 => 4,  37 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block pageIncludes %}    */
/* <script src="{{ app.request.basepath }}/js/AjaxDeleteTableRow.js"></script> */
/* <script src="{{ app.request.basepath }}/js/AjaxSchedulesPerDay.js"></script>  */
/* */
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/* ajaxDeleteTableRow = new AjaxDeleteTableRow('#schedule-container', 'schedules/delete/{id}', function (data) {*/
/*     swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/* });*/
/* */
/* {% endblock %}*/
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
/*     <div class="container" id="schedule-container">*/
/*         <div class="wrapper col-lg-12 col-centered">   */
/*             <div class="showList"> */
/*                */
/*                 <div class="section-title">*/
/*                     <p class="pull-left">View all available Scheduled Movies</p>*/
/*                     <div class="users-per-page pull-right">*/
/*                         <span>Select a date</span>*/
/* */
/*                         <select id="date_selector" name="date" class="form-control" >*/
/*                             {% for date in dates %}*/
/*                             <option value="{{date}}">{{date}}</option>                  */
/*                             {% endfor %}*/
/*                         </select>   */
/*                     </div>                    */
/*                 </div>                 */
/*                 */
/*                 <table id="schedules" class="table" style="color:black">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>#</th>*/
/*                             <th>Hour</th>*/
/*                             <th>Movie</th>*/
/*                             <th>Room</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                         */
/*                     </tbody>*/
/*                 </table>              */
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* */
/* {% endblock %}*/
/* */
/* */
