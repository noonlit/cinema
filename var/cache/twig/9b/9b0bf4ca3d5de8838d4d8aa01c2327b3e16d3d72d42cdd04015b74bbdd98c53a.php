<?php

/* Genre/genre.html */
class __TwigTemplate_2c81d8a98550033f6d8e9ec542d8d2c6994e79ef5b5eb1ffa92c7e25455c5eea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Genre/genre.html", 1);
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
        $__internal_c83431718554561e717ba72e27d6085cd6912e46061207b56655f13bada92a92 = $this->env->getExtension("native_profiler");
        $__internal_c83431718554561e717ba72e27d6085cd6912e46061207b56655f13bada92a92->enter($__internal_c83431718554561e717ba72e27d6085cd6912e46061207b56655f13bada92a92_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Genre/genre.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c83431718554561e717ba72e27d6085cd6912e46061207b56655f13bada92a92->leave($__internal_c83431718554561e717ba72e27d6085cd6912e46061207b56655f13bada92a92_prof);

    }

    // line 2
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_46c9c8b9e3fb7d7195433c78e5b465ea57ec2e503c2674de354f498e9ff86bd3 = $this->env->getExtension("native_profiler");
        $__internal_46c9c8b9e3fb7d7195433c78e5b465ea57ec2e503c2674de354f498e9ff86bd3->enter($__internal_46c9c8b9e3fb7d7195433c78e5b465ea57ec2e503c2674de354f498e9ff86bd3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 3
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxEditableElements.js\"></script>
    <script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxDeleteTableRow.js\"></script>
    <script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxAddTableRow.js\"></script>
";
        
        $__internal_46c9c8b9e3fb7d7195433c78e5b465ea57ec2e503c2674de354f498e9ff86bd3->leave($__internal_46c9c8b9e3fb7d7195433c78e5b465ea57ec2e503c2674de354f498e9ff86bd3_prof);

    }

    // line 8
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_ca95086acb107b4c6a9ef5c7f6742cfe65fb24c31f753043caf358ad638ac483 = $this->env->getExtension("native_profiler");
        $__internal_ca95086acb107b4c6a9ef5c7f6742cfe65fb24c31f753043caf358ad638ac483->enter($__internal_ca95086acb107b4c6a9ef5c7f6742cfe65fb24c31f753043caf358ad638ac483_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 9
        echo "
    new AjaxEditableElements('#genre-container', 'edit/{id}', function (data) {
        swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
    });
    
    new AjaxDeleteTableRow('#genre-container', 'delete/{id}', function (data) {
        swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
    });
    
    new AjaxAddTableRow('#genre-container', 'add', function (data) {
        swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
        
        var rowData = '<tr><th scope=\"row\">' + data.genreId + '</th><td contenteditable=\"true\" class=\"editable\" data-id=\"' + data.genreId + '\">' + data.genreName + '</td><td class=\"text-right\"><a href=\"#\" class=\"remove\" data-id=\"' + data.genreId + '\"><i class=\"fa fa-trash fa-1x\" aria-hidden=\"true\"></i> Remove</a></td></tr>';
        \$('table').append(rowData);
    });   
    
";
        
        $__internal_ca95086acb107b4c6a9ef5c7f6742cfe65fb24c31f753043caf358ad638ac483->leave($__internal_ca95086acb107b4c6a9ef5c7f6742cfe65fb24c31f753043caf358ad638ac483_prof);

    }

    // line 27
    public function block_content($context, array $blocks = array())
    {
        $__internal_b6d45ca8e66c55c7ce795eb0cb60058f3058263368faaab8697f986470fad212 = $this->env->getExtension("native_profiler");
        $__internal_b6d45ca8e66c55c7ce795eb0cb60058f3058263368faaab8697f986470fad212->enter($__internal_b6d45ca8e66c55c7ce795eb0cb60058f3058263368faaab8697f986470fad212_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 28
        echo "<div class=\"banner text-center\">
    ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 30
            echo "    ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\" id=\"genre-container\">
        <div class=\"wrapper col-lg-12 col-centered\">

            <div class=\"showList\">  

                <span class=\"section-title text-center\">View all available genres</span><hr/>

                <table class=\"table\">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["genreList"]) ? $context["genreList"] : $this->getContext($context, "genreList")));
        foreach ($context['_seq'] as $context["_key"] => $context["genre"]) {
            // line 53
            echo "                        <tr>
                            <th scope=\"row\">";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "</th>
                            <td contenteditable=\"true\" class=\"editable\" data-id=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getName", array()), "html", null, true);
            echo "</td>
                            <td class=\"text-right\">
                                <a href=\"#\" class=\"remove\" data-id=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getId", array()), "html", null, true);
            echo "\"><i class=\"fa fa-trash fa-1x\" aria-hidden=\"true\"></i> Remove</a>
                            </td>
                        </tr>                            
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['genre'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "                  

                    </tbody>
                </table>

                <span class=\"section-title text-center\">Add Genre</span><hr/>

                <div class=\"row\">
                    <form method=\"post\" action=\"";
        // line 68
        echo $this->env->getExtension('routing')->getUrl("admin_genre_add");
        echo "\" class=\"addRow add-genre\">

                        <div class=\"col-lg-9\">
                            <label for=\"genreName\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> New Genre Name</label>
                            <input class=\"form-control\" type=\"text\" id=\"genreName\" name=\"genreName\" placeholder=\"Enter a new Genre name\" />
                        </div>

                        <div class=\"col-lg-3\">
                            <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Add new Genre</button>
                        </div>
                    </form>  
                </div>

            </div>

        </div>
    </div>
</div>
";
        
        $__internal_b6d45ca8e66c55c7ce795eb0cb60058f3058263368faaab8697f986470fad212->leave($__internal_b6d45ca8e66c55c7ce795eb0cb60058f3058263368faaab8697f986470fad212_prof);

    }

    public function getTemplateName()
    {
        return "Genre/genre.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 68,  161 => 60,  151 => 57,  144 => 55,  140 => 54,  137 => 53,  133 => 52,  111 => 32,  102 => 30,  98 => 29,  95 => 28,  89 => 27,  66 => 9,  60 => 8,  51 => 5,  47 => 4,  42 => 3,  36 => 2,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* {% block pageIncludes %}*/
/*     <script src="{{ app.request.basepath }}/js/AjaxEditableElements.js"></script>*/
/*     <script src="{{ app.request.basepath }}/js/AjaxDeleteTableRow.js"></script>*/
/*     <script src="{{ app.request.basepath }}/js/AjaxAddTableRow.js"></script>*/
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/*     new AjaxEditableElements('#genre-container', 'edit/{id}', function (data) {*/
/*         swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/*     });*/
/*     */
/*     new AjaxDeleteTableRow('#genre-container', 'delete/{id}', function (data) {*/
/*         swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/*     });*/
/*     */
/*     new AjaxAddTableRow('#genre-container', 'add', function (data) {*/
/*         swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/*         */
/*         var rowData = '<tr><th scope="row">' + data.genreId + '</th><td contenteditable="true" class="editable" data-id="' + data.genreId + '">' + data.genreName + '</td><td class="text-right"><a href="#" class="remove" data-id="' + data.genreId + '"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> Remove</a></td></tr>';*/
/*         $('table').append(rowData);*/
/*     });   */
/*     */
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
/*     <div class="container" id="genre-container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/* */
/*             <div class="showList">  */
/* */
/*                 <span class="section-title text-center">View all available genres</span><hr/>*/
/* */
/*                 <table class="table">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>#</th>*/
/*                             <th>Name</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                         {% for genre in genreList %}*/
/*                         <tr>*/
/*                             <th scope="row">{{ genre.getId }}</th>*/
/*                             <td contenteditable="true" class="editable" data-id="{{ genre.getId }}">{{ genre.getName }}</td>*/
/*                             <td class="text-right">*/
/*                                 <a href="#" class="remove" data-id="{{ genre.getId }}"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> Remove</a>*/
/*                             </td>*/
/*                         </tr>                            */
/*                         {% endfor %}                  */
/* */
/*                     </tbody>*/
/*                 </table>*/
/* */
/*                 <span class="section-title text-center">Add Genre</span><hr/>*/
/* */
/*                 <div class="row">*/
/*                     <form method="post" action="{{ url('admin_genre_add') }}" class="addRow add-genre">*/
/* */
/*                         <div class="col-lg-9">*/
/*                             <label for="genreName"><i class="fa fa-film" aria-hidden="true"></i> New Genre Name</label>*/
/*                             <input class="form-control" type="text" id="genreName" name="genreName" placeholder="Enter a new Genre name" />*/
/*                         </div>*/
/* */
/*                         <div class="col-lg-3">*/
/*                             <button class="btn btn-lg btn-primary btn-block" type="submit">Add new Genre</button>*/
/*                         </div>*/
/*                     </form>  */
/*                 </div>*/
/* */
/*             </div>*/
/* */
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
