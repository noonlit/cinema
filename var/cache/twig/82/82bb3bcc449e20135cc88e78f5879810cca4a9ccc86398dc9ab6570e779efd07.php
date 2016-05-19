<?php

/* Schedule/showscheduledmovies.html */
class __TwigTemplate_e380b9cdf38e4a136907270013de47f29d389f0f9fc61667ea557fe4154b3c40 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Schedule/showscheduledmovies.html", 1);
        $this->blocks = array(
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
        $__internal_f744ecefd9002c6bc63056fa626cbb97aa95328bec331e23dbc7e148e9ff44f9 = $this->env->getExtension("native_profiler");
        $__internal_f744ecefd9002c6bc63056fa626cbb97aa95328bec331e23dbc7e148e9ff44f9->enter($__internal_f744ecefd9002c6bc63056fa626cbb97aa95328bec331e23dbc7e148e9ff44f9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Schedule/showscheduledmovies.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f744ecefd9002c6bc63056fa626cbb97aa95328bec331e23dbc7e148e9ff44f9->leave($__internal_f744ecefd9002c6bc63056fa626cbb97aa95328bec331e23dbc7e148e9ff44f9_prof);

    }

    // line 3
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_cbbf6ddb7ca9a16827d2e85a65068633a08654376c6105c28fc6c61b2fbe84c9 = $this->env->getExtension("native_profiler");
        $__internal_cbbf6ddb7ca9a16827d2e85a65068633a08654376c6105c28fc6c61b2fbe84c9->enter($__internal_cbbf6ddb7ca9a16827d2e85a65068633a08654376c6105c28fc6c61b2fbe84c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 4
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxEditableElements.js\"></script>
";
        
        $__internal_cbbf6ddb7ca9a16827d2e85a65068633a08654376c6105c28fc6c61b2fbe84c9->leave($__internal_cbbf6ddb7ca9a16827d2e85a65068633a08654376c6105c28fc6c61b2fbe84c9_prof);

    }

    // line 7
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_25747d6367f67eea27c6fad75d2365fe8d57edc3b00ffea7f1c4af379ecced25 = $this->env->getExtension("native_profiler");
        $__internal_25747d6367f67eea27c6fad75d2365fe8d57edc3b00ffea7f1c4af379ecced25->enter($__internal_25747d6367f67eea27c6fad75d2365fe8d57edc3b00ffea7f1c4af379ecced25_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 8
        echo "
    new AjaxEditableElements('#movie-container', 'movie/edit/{id}', function (data) {
        swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
    });  
";
        
        $__internal_25747d6367f67eea27c6fad75d2365fe8d57edc3b00ffea7f1c4af379ecced25->leave($__internal_25747d6367f67eea27c6fad75d2365fe8d57edc3b00ffea7f1c4af379ecced25_prof);

    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        $__internal_2c8a10f4a5dafe4add2517e7f9b1be2142871b17d28c87048019cbcbc449e7ef = $this->env->getExtension("native_profiler");
        $__internal_2c8a10f4a5dafe4add2517e7f9b1be2142871b17d28c87048019cbcbc449e7ef->enter($__internal_2c8a10f4a5dafe4add2517e7f9b1be2142871b17d28c87048019cbcbc449e7ef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 15
        echo "<div class=\"banner text-center\">
    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 17
            echo "    ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\" id=\"movie-container\">
        <div class=\"wrapper col-lg-12 col-centered\">
            <div class=\"showList\">
                <span class=\"section-title text-center\">View all scheduled movies</span><hr/>
                Users per page:                
                <select id=\"movies-per-page\" class='movies-per-page'>
                    <option value=\"6\">6</option>
                    <option value=\"12\">12</option>
                    <option value=\"18\">18</option>
                </select>
                <table class=\"table\">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["movieList"]) ? $context["movieList"] : $this->getContext($context, "movieList")));
        foreach ($context['_seq'] as $context["_key"] => $context["movie"]) {
            // line 43
            echo "                        <tr>
                            <th scope=\"row\">";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getId", array()), "html", null, true);
            echo "</th>
                            <td contenteditable=\"true\" class=\"editable\" data-id=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getTitle", array()), "html", null, true);
            echo "</td>
                            <td contenteditable=\"true\" class=\"editable\" data-id=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getDuration", array()), "html", null, true);
            echo " hours</td>
                                <td class=\"text-right\">
                                    <a href=\"#\" class=\"\" data-id=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getId", array()), "html", null, true);
            echo "\"><i class=\"fa fa-trash fa-1x\" aria-hidden=\"true\"></i> Save</a>
                            </td>
                            </td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movie'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
";
        
        $__internal_2c8a10f4a5dafe4add2517e7f9b1be2142871b17d28c87048019cbcbc449e7ef->leave($__internal_2c8a10f4a5dafe4add2517e7f9b1be2142871b17d28c87048019cbcbc449e7ef_prof);

    }

    public function getTemplateName()
    {
        return "Schedule/showscheduledmovies.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 53,  140 => 48,  133 => 46,  127 => 45,  123 => 44,  120 => 43,  116 => 42,  91 => 19,  82 => 17,  78 => 16,  75 => 15,  69 => 14,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block pageIncludes %}*/
/*     <script src="{{ app.request.basepath }}/js/AjaxEditableElements.js"></script>*/
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/*     new AjaxEditableElements('#movie-container', 'movie/edit/{id}', function (data) {*/
/*         swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/*     });  */
/* {% endblock %}*/
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
/*     <div class="container" id="movie-container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/*             <div class="showList">*/
/*                 <span class="section-title text-center">View all scheduled movies</span><hr/>*/
/*                 Users per page:                */
/*                 <select id="movies-per-page" class='movies-per-page'>*/
/*                     <option value="6">6</option>*/
/*                     <option value="12">12</option>*/
/*                     <option value="18">18</option>*/
/*                 </select>*/
/*                 <table class="table">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>#</th>*/
/*                             <th>Title</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                         {% for movie in movieList %}*/
/*                         <tr>*/
/*                             <th scope="row">{{ movie.getId }}</th>*/
/*                             <td contenteditable="true" class="editable" data-id="{{ movie.getId }}">{{ movie.getTitle }}</td>*/
/*                             <td contenteditable="true" class="editable" data-id="{{ movie.getId }}">{{ movie.getDuration}} hours</td>*/
/*                                 <td class="text-right">*/
/*                                     <a href="#" class="" data-id="{{ movie.getId }}"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> Save</a>*/
/*                             </td>*/
/*                             </td>*/
/*                         </tr>*/
/*                         {% endfor %}*/
/*                     </tbody>*/
/*                 </table>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* </div>*/
/* {% endblock %}*/
