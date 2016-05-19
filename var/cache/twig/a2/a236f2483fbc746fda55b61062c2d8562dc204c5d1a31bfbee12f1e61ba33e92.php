<?php

/* Movie/income.html */
class __TwigTemplate_7a5683214bb05e5d0e2e8788fc73171d1caab7564e2021b12a701958bb394922 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Movie/income.html", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'pageIncludes' => array($this, 'block_pageIncludes'),
            'pageScripts' => array($this, 'block_pageScripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_092d2f1d86b009426d704b5f73334cf6d8c2829c19f2d8d90d18d91fad489203 = $this->env->getExtension("native_profiler");
        $__internal_092d2f1d86b009426d704b5f73334cf6d8c2829c19f2d8d90d18d91fad489203->enter($__internal_092d2f1d86b009426d704b5f73334cf6d8c2829c19f2d8d90d18d91fad489203_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Movie/income.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_092d2f1d86b009426d704b5f73334cf6d8c2829c19f2d8d90d18d91fad489203->leave($__internal_092d2f1d86b009426d704b5f73334cf6d8c2829c19f2d8d90d18d91fad489203_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_4f56cdabc18818cdb3edf4d8f65eff9f76256a27dcedd672902bfe0d2af7cd4d = $this->env->getExtension("native_profiler");
        $__internal_4f56cdabc18818cdb3edf4d8f65eff9f76256a27dcedd672902bfe0d2af7cd4d->enter($__internal_4f56cdabc18818cdb3edf4d8f65eff9f76256a27dcedd672902bfe0d2af7cd4d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 3
        echo "Income calculator
";
        
        $__internal_4f56cdabc18818cdb3edf4d8f65eff9f76256a27dcedd672902bfe0d2af7cd4d->leave($__internal_4f56cdabc18818cdb3edf4d8f65eff9f76256a27dcedd672902bfe0d2af7cd4d_prof);

    }

    // line 6
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_7467c748a425e1cce55f769443d904e6031be8c9c87304abdc1903b233451fa5 = $this->env->getExtension("native_profiler");
        $__internal_7467c748a425e1cce55f769443d904e6031be8c9c87304abdc1903b233451fa5->enter($__internal_7467c748a425e1cce55f769443d904e6031be8c9c87304abdc1903b233451fa5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 7
        echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css\">
<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">
<script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js\"></script>
<script type=\"text/javascript\" src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>
";
        
        $__internal_7467c748a425e1cce55f769443d904e6031be8c9c87304abdc1903b233451fa5->leave($__internal_7467c748a425e1cce55f769443d904e6031be8c9c87304abdc1903b233451fa5_prof);

    }

    // line 14
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_17951384a380845c153b948e431d05c98ff5602b7f7856c9ffabc2a715d4a048 = $this->env->getExtension("native_profiler");
        $__internal_17951384a380845c153b948e431d05c98ff5602b7f7856c9ffabc2a715d4a048->enter($__internal_17951384a380845c153b948e431d05c98ff5602b7f7856c9ffabc2a715d4a048_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 15
        echo "    \$('.time-select').timepicker({
    'minTime': '8:00am',
    'maxTime': '20:00pm',
    'step': 120,
    'timeFormat': 'H:i:s'
    });

    \$( \".datepicker\" ).datepicker({
    dateFormat: \"yy-mm-dd\",
    });

    \$(\"#form-income\").submit(function (e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = \$(this);
        var url = form.attr('action'); // the script where you handle the form input.
        \$.ajax({
            method: \"POST\",
            url: url,
            dataType: \"json\",
            data: form.serialize(), // serializes the form's elements.
            success: function (data)
            {
                swal({title: data.title, text: data.message, type: data.type, timer: 15000000, showConfirmButton: true});
            }
        });
    });

";
        
        $__internal_17951384a380845c153b948e431d05c98ff5602b7f7856c9ffabc2a715d4a048->leave($__internal_17951384a380845c153b948e431d05c98ff5602b7f7856c9ffabc2a715d4a048_prof);

    }

    // line 44
    public function block_content($context, array $blocks = array())
    {
        $__internal_096a1111e1cd8355c402bf70b1433849e4f8cbc22a7b52dcdaa876d35e0feb12 = $this->env->getExtension("native_profiler");
        $__internal_096a1111e1cd8355c402bf70b1433849e4f8cbc22a7b52dcdaa876d35e0feb12->enter($__internal_096a1111e1cd8355c402bf70b1433849e4f8cbc22a7b52dcdaa876d35e0feb12_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 45
        echo "
<div class=\"authArea\">
    <div class=\"container\">

        <div class=\"col-lg-6 col-centered\">
            ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 51
            echo "                ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 52
                echo "                        <div class=\"alert alert-danger\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                ";
            }
            // line 54
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  
            ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 56
            echo "                ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 57
                echo "                        <div class=\"alert alert-success\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                ";
            }
            // line 59
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  

            <h1 class=\"text-center\"><i class=\"fa fa-video-camera\" aria-hidden=\"true\"></i> CinemaVillage</h1>

            <form id=\"form-income\" class=\"form-income\" method=\"POST\" action=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_movie_income", array("id" => $this->getAttribute((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")), "getId", array()))), "html", null, true);
        echo "\">

                <span class=\"title text-center\">Compute income for movie \"";
        // line 65
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["movie"]) ? $context["movie"] : null), "getTitle", array()), "")) : ("")), "html", null, true);
        echo "\"</span><hr/>

                <label for=\"start_date\"><i class=\"fa fa-book\" aria-hidden=\"true\"></i> Start date</label>
                <input autocomplete=\"off\" required class=\"form-control date-select datepicker date\" name=\"start_date\" min=\"";
        // line 68
        echo twig_escape_filter($this->env, (isset($context["min_date"]) ? $context["min_date"] : $this->getContext($context, "min_date")), "html", null, true);
        echo "\" max=\"";
        echo twig_escape_filter($this->env, (isset($context["max_date"]) ? $context["max_date"] : $this->getContext($context, "max_date")), "html", null, true);
        echo "\"><br>

                <label for=\"end_date\"><i class=\"fa fa-book\" aria-hidden=\"true\"></i> End date</label>
                <input autocomplete=\"off\" required class=\"form-control date-select datepicker date\" id=\"end_date\" name=\"end_date\" min=\"";
        // line 71
        echo twig_escape_filter($this->env, (isset($context["min_date"]) ? $context["min_date"] : $this->getContext($context, "min_date")), "html", null, true);
        echo "\" max=\"";
        echo twig_escape_filter($this->env, (isset($context["max_date"]) ? $context["max_date"] : $this->getContext($context, "max_date")), "html", null, true);
        echo "\"><br>
                <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Get income <i class=\"fa fa-paper-plane\" aria-hidden=\"true\"></i></button>
            </form>
            <div id='result' class='showList'>

            </div>
        </div>
    </div>
    ";
        
        $__internal_096a1111e1cd8355c402bf70b1433849e4f8cbc22a7b52dcdaa876d35e0feb12->leave($__internal_096a1111e1cd8355c402bf70b1433849e4f8cbc22a7b52dcdaa876d35e0feb12_prof);

    }

    public function getTemplateName()
    {
        return "Movie/income.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 71,  177 => 68,  171 => 65,  166 => 63,  155 => 59,  149 => 57,  146 => 56,  142 => 55,  134 => 54,  128 => 52,  125 => 51,  121 => 50,  114 => 45,  108 => 44,  74 => 15,  68 => 14,  57 => 7,  51 => 6,  43 => 3,  37 => 2,  11 => 1,);
    }
}
/* {% extends 'layout.html' %}*/
/* {% block title %}*/
/* Income calculator*/
/* {% endblock %}*/
/* */
/* {% block pageIncludes %}*/
/* <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">*/
/* <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">*/
/* <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>*/
/* <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>*/
/* {% endblock %}*/
/* */
/* */
/* {% block pageScripts %}*/
/*     $('.time-select').timepicker({*/
/*     'minTime': '8:00am',*/
/*     'maxTime': '20:00pm',*/
/*     'step': 120,*/
/*     'timeFormat': 'H:i:s'*/
/*     });*/
/* */
/*     $( ".datepicker" ).datepicker({*/
/*     dateFormat: "yy-mm-dd",*/
/*     });*/
/* */
/*     $("#form-income").submit(function (e) {*/
/*         e.preventDefault(); // avoid to execute the actual submit of the form.*/
/*         var form = $(this);*/
/*         var url = form.attr('action'); // the script where you handle the form input.*/
/*         $.ajax({*/
/*             method: "POST",*/
/*             url: url,*/
/*             dataType: "json",*/
/*             data: form.serialize(), // serializes the form's elements.*/
/*             success: function (data)*/
/*             {*/
/*                 swal({title: data.title, text: data.message, type: data.type, timer: 15000000, showConfirmButton: true});*/
/*             }*/
/*         });*/
/*     });*/
/* */
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/* <div class="authArea">*/
/*     <div class="container">*/
/* */
/*         <div class="col-lg-6 col-centered">*/
/*             {% for message in flashBag.get('error') %}*/
/*                 {% if message is defined and message is not empty %}*/
/*                         <div class="alert alert-danger" role="alert">{{ message }}</div>*/
/*                 {% endif %}*/
/*             {% endfor %}  */
/*             {% for message in flashBag.get('success') %}*/
/*                 {% if message is defined and message is not empty %}*/
/*                         <div class="alert alert-success" role="alert">{{ message }}</div>*/
/*                 {% endif %}*/
/*             {% endfor %}  */
/* */
/*             <h1 class="text-center"><i class="fa fa-video-camera" aria-hidden="true"></i> CinemaVillage</h1>*/
/* */
/*             <form id="form-income" class="form-income" method="POST" action="{{ url('admin_movie_income', {'id': movie.getId}) }}">*/
/* */
/*                 <span class="title text-center">Compute income for movie "{{movie.getTitle|default("")}}"</span><hr/>*/
/* */
/*                 <label for="start_date"><i class="fa fa-book" aria-hidden="true"></i> Start date</label>*/
/*                 <input autocomplete="off" required class="form-control date-select datepicker date" name="start_date" min="{{min_date}}" max="{{ max_date }}"><br>*/
/* */
/*                 <label for="end_date"><i class="fa fa-book" aria-hidden="true"></i> End date</label>*/
/*                 <input autocomplete="off" required class="form-control date-select datepicker date" id="end_date" name="end_date" min="{{min_date}}" max="{{ max_date }}"><br>*/
/*                 <button class="btn btn-lg btn-primary btn-block" type="submit">Get income <i class="fa fa-paper-plane" aria-hidden="true"></i></button>*/
/*             </form>*/
/*             <div id='result' class='showList'>*/
/* */
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     {% endblock %}*/
/* */
