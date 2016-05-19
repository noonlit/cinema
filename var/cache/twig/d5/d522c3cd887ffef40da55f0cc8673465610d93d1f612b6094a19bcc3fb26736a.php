<?php

/* Main/index.html */
class __TwigTemplate_70fb1e28e069d3204aa22e12d3167823f8bed3bf56989a07176305453165334b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Main/index.html", 1);
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
        $__internal_474f143fc2da0b02792e282b40c6dd8d500ee94411d0b7c107cab8c38ff2028d = $this->env->getExtension("native_profiler");
        $__internal_474f143fc2da0b02792e282b40c6dd8d500ee94411d0b7c107cab8c38ff2028d->enter($__internal_474f143fc2da0b02792e282b40c6dd8d500ee94411d0b7c107cab8c38ff2028d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Main/index.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_474f143fc2da0b02792e282b40c6dd8d500ee94411d0b7c107cab8c38ff2028d->leave($__internal_474f143fc2da0b02792e282b40c6dd8d500ee94411d0b7c107cab8c38ff2028d_prof);

    }

    // line 3
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_c45786c4b4f7e5023e1358218fd1463aac872c2345632a1a5d68e5465d39c4b2 = $this->env->getExtension("native_profiler");
        $__internal_c45786c4b4f7e5023e1358218fd1463aac872c2345632a1a5d68e5465d39c4b2->enter($__internal_c45786c4b4f7e5023e1358218fd1463aac872c2345632a1a5d68e5465d39c4b2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 4
        echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css\">
<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">
<script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js\"></script>
<script type=\"text/javascript\" src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>
";
        
        $__internal_c45786c4b4f7e5023e1358218fd1463aac872c2345632a1a5d68e5465d39c4b2->leave($__internal_c45786c4b4f7e5023e1358218fd1463aac872c2345632a1a5d68e5465d39c4b2_prof);

    }

    // line 10
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_d7bed0e21fc6f74917f3465ca62edeb02597b11e323fa3a345ae8ec81f2a5334 = $this->env->getExtension("native_profiler");
        $__internal_d7bed0e21fc6f74917f3465ca62edeb02597b11e323fa3a345ae8ec81f2a5334->enter($__internal_d7bed0e21fc6f74917f3465ca62edeb02597b11e323fa3a345ae8ec81f2a5334_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 11
        echo "
\$('.time-select').timepicker({
'minTime': '8:00am',
'maxTime': '20:00pm',
'step': 120,
'timeFormat': 'H:i'
});

\$( \".datepicker\" ).datepicker({
dateFormat: \"yy-mm-dd\",
});

function getCurrentYear() {

var now = new Date();
return now.getFullYear();

}
var currentYear = getCurrentYear();
\$(\"#year\").attr(\"max\", currentYear);


\$('.filters ul.filter-options li').on('click', function() {
\$(this).toggleClass('active');
var option = \$(this).data('id');

\$('.filters ul.filter-options li').each(function() {
if(\$(this).hasClass('active'))
\$(this).toggleClass('active');
});

\$('.filters .display-options #' + option).slideToggle().addClass('active');

\$('#end-date').on('change', function(){
start_date = \$('#start-date').val();
if(start_date !== '' && start_date > \$(this).val()){
\$(\"#date-err\").remove();
\$('#date-err-display').append('<span id=\"date-err\" style=\"color: red\"> (temporal paradox: start date > end date) </span>');
} else {
\$(\"#date-err\").remove();
}
});

\$('#start-date').on('change', function(){
end_date = \$('#end-date').val();
if(end_date !== '' && end_date < \$(this).val()){
\$(\"#date-err\").remove();
\$('#date-err-display').append('<span id=\"date-err\" style=\"color: red\"> (temporal paradox: start date > end date) </span>');
} else {
\$(\"#date-err\").remove();
}
});

\$('#end-time').on('change', function(){
start_time = \$('#start-time').val();
if(start_time !== '' && start_time > \$(this).val()){
\$(\"#time-err\").remove();
\$('#time-err-display').append('<span id=\"time-err\" style=\"color: red\"> (temporal paradox: start time > end time) </span>');
} else {
\$(\"#time-err\").remove();
}
});

\$('#start-time').on('change', function(){
end_time = \$('#end-time').val();
if(end_time !== '' && end_time < \$(this).val()){
\$('#time-err-display').append('<span id=\"time-err\" style=\"color: red\"> (temporal paradox: start time > end time) </span>');
} else {
\$(\"#time-err\").remove();
}
});

});
";
        
        $__internal_d7bed0e21fc6f74917f3465ca62edeb02597b11e323fa3a345ae8ec81f2a5334->leave($__internal_d7bed0e21fc6f74917f3465ca62edeb02597b11e323fa3a345ae8ec81f2a5334_prof);

    }

    // line 85
    public function block_content($context, array $blocks = array())
    {
        $__internal_800c834e426bbcc00788c2223fc2bd02b43eadb2bf262209b9958d107d9057ce = $this->env->getExtension("native_profiler");
        $__internal_800c834e426bbcc00788c2223fc2bd02b43eadb2bf262209b9958d107d9057ce->enter($__internal_800c834e426bbcc00788c2223fc2bd02b43eadb2bf262209b9958d107d9057ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 86
        echo "<div class=\"banner text-center\">
    ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 88
            echo "    ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            // line 89
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\" id=\"homepage\">
        <div class=\"wrapper col-lg-12 col-centered\">
            <div class=\"filters clearfix\">
                <form class=\"form-horizontal\" method=\"post\" action=\"";
        // line 99
        echo $this->env->getExtension('routing')->getUrl("filter");
        echo "\">
                    <div class=\"col-lg-6 options\">
                        <div class=\"row\">
                            <label>Search options</label>
                            <ul class=\"filter-options\">
                                <li data-id=\"genre\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> Genre</li>
                                <li data-id=\"release\"><i class=\"fa fa-rocket\" aria-hidden=\"true\"></i> Release year</li>
                                <li data-id=\"schedule\"><i class=\"fa fa-book\" aria-hidden=\"true\"></i> Schedule</li>
                                <li data-id=\"sort\"><i class=\"fa fa-sort-amount-asc\" aria-hidden=\"true\"></i> Sort</li>
                                <li data-id=\"results\"><i class=\"fa fa-sort-amount-asc\" aria-hidden=\"true\"></i> Pagination</li>
                            </ul>
                        </div>
                    </div>

                    <div class=\"col-lg-6 searchbox\">
                        <label><br></label>
                        <div class=\"row\">
                            <div class=\"col-lg-10\">
                                <input type=\"text\" id=\"search\" name = conditions[title] placeholder=\"Title similar to ...\" class=\"form-control\">
                            </div>
                            <div class=\"col-lg-2\">
                                <button class=\"btn btn-primary\" type=\"submit\">Search <i class=\"fa fa-search\" aria-hidden=\"true\"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class=\"display-options col-lg-12 clearfix\">
                        <div class=\"row\">

                            <div id=\"genre\" class=\"option\">
                                <label for=\"genre-select\">Genre:</label>
                                <select id=\"genre-select\" name=\"conditions[filters][name]\" class=\"form-control\">
                                    <option value=\"all\">All genres</option>
                                    ";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["genreList"]) ? $context["genreList"] : $this->getContext($context, "genreList")));
        foreach ($context['_seq'] as $context["_key"] => $context["genre"]) {
            // line 133
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getName", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["genre"], "getName", array()), "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['genre'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo "                                </select>
                            </div>

                            <div id=\"release\" class=\"option\">
                                <label for=\"year\">Released in:</label>
                                <input type=\"number\" class=\"form-control\" id=\"year\" name=\"conditions[filters][year]\" min=\"1900\" placeholder=\"Type a year (1900-present)\">
                            </div>

                            <div id=\"schedule\" class=\"option\">
                                <div class=\"row\">
                                    <div class=\"col-lg-6\">
                                        <label for=\"date-select\" id=\"date-err-display\">Scheduled starting from date:</label>
                                        <input class=\"form-control date-select datepicker date\" id=\"start-date\" name=\"conditions[between][start_date]\" placeholder=\"Choose date\">
                                    </div>

                                    <div class=\"col-lg-6\">
                                        <label for=\"time-select\" id=\"time-err-display\">Scheduled starting from time:</label>
                                        <input class=\"form-control time-select\" id=\"start-time\" name=\"conditions[between][start_time]\" placeholder=\"Choose time\">
                                    </div>

                                    <div class=\"col-lg-6\">
                                        <label for=\"date-select\">Scheduled before date:</label>
                                        <input class=\"form-control date-select datepicker date\" id=\"end-date\" name=\"conditions[between][end_date]\" placeholder=\"Choose date\">
                                    </div>

                                    <div class=\"col-lg-6\">
                                        <label for=\"time-select\">Scheduled before time:</label>
                                        <input class=\"form-control time-select\" id=\"end-time\" name=\"conditions[between][end_time]\" placeholder=\"Choose time\">
                                    </div>
                                </div>
                            </div>

                            <div id=\"sort\" class=\"option\">
                                <div class=\"row\">
                                    <div class=\"col-lg-6\">
                                        <label for=\"sort-select\">Sorted by:</label>
                                        <select id=\"sort-select\" name=\"conditions[sort][column]\" class=\"form-control\">
                                            ";
        // line 172
        $context["sorts"] = $this->getAttribute($this->getAttribute((isset($context["search_options"]) ? $context["search_options"] : $this->getContext($context, "search_options")), "homepage_filters", array(), "array"), "sortable_by", array(), "array");
        // line 173
        echo "                                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sorts"]) ? $context["sorts"] : $this->getContext($context, "sorts")));
        foreach ($context['_seq'] as $context["_key"] => $context["sort"]) {
            // line 174
            echo "                                            <option value=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $context["sort"]), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $context["sort"], "html", null, true);
            echo " </option>
                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sort'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        echo "                                        </select>
                                    </div>

                                    <div class=\"col-lg-6\">
                                        <label for=\"sort-order-select\">Sort order:</label>
                                        <select id=\"sort-order-select\" name=\"conditions[sort][flag]\" class=\"form-control\">
                                            ";
        // line 182
        $context["flags"] = $this->getAttribute($this->getAttribute((isset($context["search_options"]) ? $context["search_options"] : $this->getContext($context, "search_options")), "homepage_filters", array(), "array"), "sort_flag", array(), "array");
        // line 183
        echo "                                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["flags"]) ? $context["flags"] : $this->getContext($context, "flags")));
        foreach ($context['_seq'] as $context["_key"] => $context["flag"]) {
            // line 184
            echo "                                            <option value=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $context["flag"]), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $context["flag"], "html", null, true);
            echo " </option>
                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 186
        echo "                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id=\"results\" class=\"option\">
                                <label for=\"pagination-select\">Results per page:</label>
                                <select id=\"pagination-select\" name=\"conditions[pagination][movies_per_page]\" class=\"form-control\">
                                    ";
        // line 194
        $context["per_pages"] = $this->getAttribute($this->getAttribute((isset($context["search_options"]) ? $context["search_options"] : $this->getContext($context, "search_options")), "homepage_filters", array(), "array"), "per_page", array(), "array");
        // line 195
        echo "                                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["per_pages"]) ? $context["per_pages"] : $this->getContext($context, "per_pages")));
        foreach ($context['_seq'] as $context["_key"] => $context["per_page"]) {
            // line 196
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $context["per_page"], "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $context["per_page"], "html", null, true);
            echo " </option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['per_page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 198
        echo "                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                
                ";
        // line 204
        if ((array_key_exists("conditions", $context) &&  !(null === (isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions"))))) {
            // line 205
            echo "                    <div class=\"search-criteria clearfix\">
                    <p> <strong><i class=\"fa fa-search\" aria-hidden=\"true\"></i> Search criteria</strong>: 
                    ";
            // line 207
            if (($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : null), "filters", array(), "array", false, true), "name", array(), "array", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "filters", array(), "array"), "name", array(), "array")))) {
                // line 208
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "filters", array(), "array"), "name", array(), "array"), "html", null, true);
                echo " movies
                    ";
            }
            // line 210
            echo "                    
                    ";
            // line 211
            if (($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : null), "title", array(), "array", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "title", array(), "array")))) {
                // line 212
                echo "                        + with a title similar to ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "title", array(), "array"), "html", null, true);
                echo "
                    ";
            }
            // line 214
            echo "
                    ";
            // line 215
            if (($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : null), "filters", array(), "array", false, true), "year", array(), "array", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "filters", array(), "array"), "year", array(), "array")))) {
                // line 216
                echo "                        + released in ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "filters", array(), "array"), "year", array(), "array"), "html", null, true);
                echo "
                    ";
            }
            // line 218
            echo "
                    ";
            // line 219
            if (($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : null), "between", array(), "array", false, true), "start_date", array(), "array", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "between", array(), "array"), "start_date", array(), "array")))) {
                // line 220
                echo "                        + scheduled before ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "between", array(), "array"), "start_date", array(), "array"), "html", null, true);
                echo "
                    ";
            }
            // line 222
            echo "

                    ";
            // line 224
            if (($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : null), "between", array(), "array", false, true), "end_date", array(), "array", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "between", array(), "array"), "end_date", array(), "array")))) {
                echo "                        
                        + scheduled after ";
                // line 225
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "between", array(), "array"), "end_date", array(), "array"), "html", null, true);
                echo "
                    ";
            }
            // line 227
            echo "
                    ";
            // line 228
            if (($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : null), "between", array(), "array", false, true), "start_time", array(), "array", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "between", array(), "array"), "start_time", array(), "array")))) {
                echo "    
                        + scheduled after ";
                // line 229
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "between", array(), "array"), "start_time", array(), "array"), "html", null, true);
                echo "
                    ";
            }
            // line 231
            echo "
                    ";
            // line 232
            if (($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : null), "between", array(), "array", false, true), "end_time", array(), "array", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "between", array(), "array"), "end_time", array(), "array")))) {
                // line 233
                echo "                        + scheduled before ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "between", array(), "array"), "end_time", array(), "array"), "html", null, true);
                echo "                       
                    ";
            }
            // line 235
            echo "
                    ";
            // line 236
            if (($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : null), "sort", array(), "array", false, true), "column", array(), "array", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "sort", array(), "array"), "column", array(), "array")))) {
                // line 237
                echo "                        + sorted by ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "sort", array(), "array"), "column", array(), "array"), "html", null, true);
                echo "
                    ";
            }
            // line 239
            echo "
                    ";
            // line 240
            if (($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : null), "sort", array(), "array", false, true), "flag", array(), "array", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "sort", array(), "array"), "flag", array(), "array")))) {
                // line 241
                echo "                        + displayed in ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["conditions"]) ? $context["conditions"] : $this->getContext($context, "conditions")), "sort", array(), "array"), "flag", array(), "array"), "html", null, true);
                echo " order
                    ";
            }
            // line 243
            echo "                    </p>
                    </div>
                ";
        }
        // line 246
        echo "                
            </div>

            <div class=\"movies-container clearfix\" id=\"scroll\">
                ";
        // line 250
        if ( !twig_test_empty((isset($context["movieList"]) ? $context["movieList"] : $this->getContext($context, "movieList")))) {
            // line 251
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["movieList"]) ? $context["movieList"] : $this->getContext($context, "movieList")));
            foreach ($context['_seq'] as $context["_key"] => $context["movie"]) {
                // line 252
                echo "                    <div class=\"movie col-lg-3\">
                        <p>";
                // line 253
                echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getTitle", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getYear", array()), "html", null, true);
                echo "</p>
                        <a href=\"";
                // line 254
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("show_movie", array("id" => $this->getAttribute($context["movie"], "getId", array()))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute($context["movie"], "getPoster", array()), "html", null, true);
                echo "\" class=\"img-responsive\" /></a>
                    </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movie'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 257
            echo "                ";
        } else {
            // line 258
            echo "                <br>
                <p> Sorry, no results to show. <p>
                ";
        }
        // line 261
        echo "            </div>
            
            <div class=\"pagination-container clearfix\">
                <div class=\"col-lg-12\">
                        <ul class=\"pagination pull-right\">
                            ";
        // line 266
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) > 1)) {
            // line 267
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("homepage", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) - 1), "movies_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\"><i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i> Previous</a></li>
                            ";
        }
        // line 268
        echo "                

                            ";
        // line 270
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) < $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getTotalPages", array()))) {
            // line 271
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("homepage", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) + 1), "movies_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\">Next <i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i></a></li>
                            ";
        }
        // line 272
        echo "    
                        </ul>
                </div>
            </div>
            
        </div>

    </div>
</div>
";
        
        $__internal_800c834e426bbcc00788c2223fc2bd02b43eadb2bf262209b9958d107d9057ce->leave($__internal_800c834e426bbcc00788c2223fc2bd02b43eadb2bf262209b9958d107d9057ce_prof);

    }

    public function getTemplateName()
    {
        return "Main/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  521 => 272,  515 => 271,  513 => 270,  509 => 268,  503 => 267,  501 => 266,  494 => 261,  489 => 258,  486 => 257,  474 => 254,  468 => 253,  465 => 252,  460 => 251,  458 => 250,  452 => 246,  447 => 243,  441 => 241,  439 => 240,  436 => 239,  430 => 237,  428 => 236,  425 => 235,  419 => 233,  417 => 232,  414 => 231,  409 => 229,  405 => 228,  402 => 227,  397 => 225,  393 => 224,  389 => 222,  383 => 220,  381 => 219,  378 => 218,  372 => 216,  370 => 215,  367 => 214,  361 => 212,  359 => 211,  356 => 210,  350 => 208,  348 => 207,  344 => 205,  342 => 204,  334 => 198,  323 => 196,  318 => 195,  316 => 194,  306 => 186,  295 => 184,  290 => 183,  288 => 182,  280 => 176,  269 => 174,  264 => 173,  262 => 172,  223 => 135,  212 => 133,  208 => 132,  172 => 99,  162 => 91,  155 => 89,  152 => 88,  148 => 87,  145 => 86,  139 => 85,  59 => 11,  53 => 10,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block pageIncludes %}*/
/* <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">*/
/* <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">*/
/* <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>*/
/* <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>*/
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/* $('.time-select').timepicker({*/
/* 'minTime': '8:00am',*/
/* 'maxTime': '20:00pm',*/
/* 'step': 120,*/
/* 'timeFormat': 'H:i'*/
/* });*/
/* */
/* $( ".datepicker" ).datepicker({*/
/* dateFormat: "yy-mm-dd",*/
/* });*/
/* */
/* function getCurrentYear() {*/
/* */
/* var now = new Date();*/
/* return now.getFullYear();*/
/* */
/* }*/
/* var currentYear = getCurrentYear();*/
/* $("#year").attr("max", currentYear);*/
/* */
/* */
/* $('.filters ul.filter-options li').on('click', function() {*/
/* $(this).toggleClass('active');*/
/* var option = $(this).data('id');*/
/* */
/* $('.filters ul.filter-options li').each(function() {*/
/* if($(this).hasClass('active'))*/
/* $(this).toggleClass('active');*/
/* });*/
/* */
/* $('.filters .display-options #' + option).slideToggle().addClass('active');*/
/* */
/* $('#end-date').on('change', function(){*/
/* start_date = $('#start-date').val();*/
/* if(start_date !== '' && start_date > $(this).val()){*/
/* $("#date-err").remove();*/
/* $('#date-err-display').append('<span id="date-err" style="color: red"> (temporal paradox: start date > end date) </span>');*/
/* } else {*/
/* $("#date-err").remove();*/
/* }*/
/* });*/
/* */
/* $('#start-date').on('change', function(){*/
/* end_date = $('#end-date').val();*/
/* if(end_date !== '' && end_date < $(this).val()){*/
/* $("#date-err").remove();*/
/* $('#date-err-display').append('<span id="date-err" style="color: red"> (temporal paradox: start date > end date) </span>');*/
/* } else {*/
/* $("#date-err").remove();*/
/* }*/
/* });*/
/* */
/* $('#end-time').on('change', function(){*/
/* start_time = $('#start-time').val();*/
/* if(start_time !== '' && start_time > $(this).val()){*/
/* $("#time-err").remove();*/
/* $('#time-err-display').append('<span id="time-err" style="color: red"> (temporal paradox: start time > end time) </span>');*/
/* } else {*/
/* $("#time-err").remove();*/
/* }*/
/* });*/
/* */
/* $('#start-time').on('change', function(){*/
/* end_time = $('#end-time').val();*/
/* if(end_time !== '' && end_time < $(this).val()){*/
/* $('#time-err-display').append('<span id="time-err" style="color: red"> (temporal paradox: start time > end time) </span>');*/
/* } else {*/
/* $("#time-err").remove();*/
/* }*/
/* });*/
/* */
/* });*/
/* {% endblock %}*/
/* {% block content %}*/
/* <div class="banner text-center">*/
/*     {% for message in app.session.getFlashBag.get('error') %}*/
/*     {{ message*/
/*     }}*/
/*     {% endfor %}*/
/*     <h1>Cinema Village</h1>*/
/*     <h2>A new generation movie theater in your town. Try us!</h2>*/
/* </div>*/
/* */
/* <div class="wrapperArea">*/
/*     <div class="container" id="homepage">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/*             <div class="filters clearfix">*/
/*                 <form class="form-horizontal" method="post" action="{{ url( 'filter' ) }}">*/
/*                     <div class="col-lg-6 options">*/
/*                         <div class="row">*/
/*                             <label>Search options</label>*/
/*                             <ul class="filter-options">*/
/*                                 <li data-id="genre"><i class="fa fa-film" aria-hidden="true"></i> Genre</li>*/
/*                                 <li data-id="release"><i class="fa fa-rocket" aria-hidden="true"></i> Release year</li>*/
/*                                 <li data-id="schedule"><i class="fa fa-book" aria-hidden="true"></i> Schedule</li>*/
/*                                 <li data-id="sort"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Sort</li>*/
/*                                 <li data-id="results"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Pagination</li>*/
/*                             </ul>*/
/*                         </div>*/
/*                     </div>*/
/* */
/*                     <div class="col-lg-6 searchbox">*/
/*                         <label><br></label>*/
/*                         <div class="row">*/
/*                             <div class="col-lg-10">*/
/*                                 <input type="text" id="search" name = conditions[title] placeholder="Title similar to ..." class="form-control">*/
/*                             </div>*/
/*                             <div class="col-lg-2">*/
/*                                 <button class="btn btn-primary" type="submit">Search <i class="fa fa-search" aria-hidden="true"></i></button>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/* */
/*                     <div class="display-options col-lg-12 clearfix">*/
/*                         <div class="row">*/
/* */
/*                             <div id="genre" class="option">*/
/*                                 <label for="genre-select">Genre:</label>*/
/*                                 <select id="genre-select" name="conditions[filters][name]" class="form-control">*/
/*                                     <option value="all">All genres</option>*/
/*                                     {% for genre in genreList %}*/
/*                                     <option value="{{ genre.getName }}">{{ genre.getName }}</option>*/
/*                                     {% endfor %}*/
/*                                 </select>*/
/*                             </div>*/
/* */
/*                             <div id="release" class="option">*/
/*                                 <label for="year">Released in:</label>*/
/*                                 <input type="number" class="form-control" id="year" name="conditions[filters][year]" min="1900" placeholder="Type a year (1900-present)">*/
/*                             </div>*/
/* */
/*                             <div id="schedule" class="option">*/
/*                                 <div class="row">*/
/*                                     <div class="col-lg-6">*/
/*                                         <label for="date-select" id="date-err-display">Scheduled starting from date:</label>*/
/*                                         <input class="form-control date-select datepicker date" id="start-date" name="conditions[between][start_date]" placeholder="Choose date">*/
/*                                     </div>*/
/* */
/*                                     <div class="col-lg-6">*/
/*                                         <label for="time-select" id="time-err-display">Scheduled starting from time:</label>*/
/*                                         <input class="form-control time-select" id="start-time" name="conditions[between][start_time]" placeholder="Choose time">*/
/*                                     </div>*/
/* */
/*                                     <div class="col-lg-6">*/
/*                                         <label for="date-select">Scheduled before date:</label>*/
/*                                         <input class="form-control date-select datepicker date" id="end-date" name="conditions[between][end_date]" placeholder="Choose date">*/
/*                                     </div>*/
/* */
/*                                     <div class="col-lg-6">*/
/*                                         <label for="time-select">Scheduled before time:</label>*/
/*                                         <input class="form-control time-select" id="end-time" name="conditions[between][end_time]" placeholder="Choose time">*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/* */
/*                             <div id="sort" class="option">*/
/*                                 <div class="row">*/
/*                                     <div class="col-lg-6">*/
/*                                         <label for="sort-select">Sorted by:</label>*/
/*                                         <select id="sort-select" name="conditions[sort][column]" class="form-control">*/
/*                                             {% set sorts = search_options['homepage_filters']['sortable_by'] %}*/
/*                                             {% for sort in sorts %}*/
/*                                             <option value="{{ sort|lower }}"> {{ sort }} </option>*/
/*                                             {% endfor %}*/
/*                                         </select>*/
/*                                     </div>*/
/* */
/*                                     <div class="col-lg-6">*/
/*                                         <label for="sort-order-select">Sort order:</label>*/
/*                                         <select id="sort-order-select" name="conditions[sort][flag]" class="form-control">*/
/*                                             {% set flags = search_options['homepage_filters']['sort_flag'] %}*/
/*                                             {% for flag in flags %}*/
/*                                             <option value="{{ flag|lower }}"> {{ flag }} </option>*/
/*                                             {% endfor %}*/
/*                                         </select>*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/* */
/*                             <div id="results" class="option">*/
/*                                 <label for="pagination-select">Results per page:</label>*/
/*                                 <select id="pagination-select" name="conditions[pagination][movies_per_page]" class="form-control">*/
/*                                     {% set per_pages = search_options['homepage_filters']['per_page'] %}*/
/*                                     {% for per_page in per_pages %}*/
/*                                     <option value="{{ per_page }}"> {{ per_page }} </option>*/
/*                                     {% endfor %}*/
/*                                 </select>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                 </form>*/
/*                 */
/*                 {% if conditions is defined and conditions is not null %}*/
/*                     <div class="search-criteria clearfix">*/
/*                     <p> <strong><i class="fa fa-search" aria-hidden="true"></i> Search criteria</strong>: */
/*                     {% if conditions['filters']['name'] is defined and conditions['filters']['name'] is not empty %}*/
/*                         {{ conditions['filters']['name'] }} movies*/
/*                     {% endif %}*/
/*                     */
/*                     {% if conditions['title'] is defined and conditions['title'] is not empty %}*/
/*                         + with a title similar to {{ conditions['title'] }}*/
/*                     {% endif %}*/
/* */
/*                     {% if conditions['filters']['year'] is defined and conditions['filters']['year'] is not empty  %}*/
/*                         + released in {{ conditions['filters']['year'] }}*/
/*                     {% endif %}*/
/* */
/*                     {% if conditions['between']['start_date'] is defined and conditions['between']['start_date'] is not empty %}*/
/*                         + scheduled before {{ conditions['between']['start_date'] }}*/
/*                     {% endif %}*/
/* */
/* */
/*                     {% if conditions['between']['end_date'] is defined and conditions['between']['end_date'] is not empty  %}                        */
/*                         + scheduled after {{ conditions['between']['end_date'] }}*/
/*                     {% endif %}*/
/* */
/*                     {% if conditions['between']['start_time'] is defined and conditions['between']['start_time'] is not empty  %}    */
/*                         + scheduled after {{ conditions['between']['start_time'] }}*/
/*                     {% endif %}*/
/* */
/*                     {% if conditions['between']['end_time'] is defined and conditions['between']['end_time'] is not empty  %}*/
/*                         + scheduled before {{ conditions['between']['end_time'] }}                       */
/*                     {% endif %}*/
/* */
/*                     {% if conditions['sort']['column'] is defined and conditions['sort']['column'] is not empty  %}*/
/*                         + sorted by {{ conditions['sort']['column'] }}*/
/*                     {% endif %}*/
/* */
/*                     {% if conditions['sort']['flag'] is defined and conditions['sort']['flag'] is not empty  %}*/
/*                         + displayed in {{ conditions['sort']['flag'] }} order*/
/*                     {% endif %}*/
/*                     </p>*/
/*                     </div>*/
/*                 {% endif %}*/
/*                 */
/*             </div>*/
/* */
/*             <div class="movies-container clearfix" id="scroll">*/
/*                 {% if movieList is not empty %}*/
/*                     {% for movie in movieList %}*/
/*                     <div class="movie col-lg-3">*/
/*                         <p>{{ movie.getTitle }} {{movie.getYear}}</p>*/
/*                         <a href="{{ url('show_movie', {'id' : movie.getId}) }}"><img src="{{ app.request.basepath }}{{ movie.getPoster }}" class="img-responsive" /></a>*/
/*                     </div>*/
/*                     {% endfor %}*/
/*                 {% else %}*/
/*                 <br>*/
/*                 <p> Sorry, no results to show. <p>*/
/*                 {% endif %}*/
/*             </div>*/
/*             */
/*             <div class="pagination-container clearfix">*/
/*                 <div class="col-lg-12">*/
/*                         <ul class="pagination pull-right">*/
/*                             {% if paginator.getCurrentPage > 1 %}*/
/*                                 <li><a href="{{ url('homepage', {'page': paginator.getCurrentPage - 1, 'movies_per_page': paginator.getResultsPerPage}) }}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Previous</a></li>*/
/*                             {% endif %}                */
/* */
/*                             {% if paginator.getCurrentPage < paginator.getTotalPages %}*/
/*                                 <li><a href="{{ url('homepage', {'page': paginator.getCurrentPage + 1, 'movies_per_page': paginator.getResultsPerPage}) }}">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>*/
/*                             {% endif %}    */
/*                         </ul>*/
/*                 </div>*/
/*             </div>*/
/*             */
/*         </div>*/
/* */
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
