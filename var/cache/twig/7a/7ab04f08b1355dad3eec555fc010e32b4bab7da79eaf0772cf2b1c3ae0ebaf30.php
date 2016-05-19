<?php

/* Main/index.html */
class __TwigTemplate_5c60fdffe3653fc11b2dd0c2dac4a50237959faa2e1913474aa890dbba2e3a1c extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pageIncludes($context, array $blocks = array())
    {
        // line 4
        echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css\">
<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">
<script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js\"></script>
<script type=\"text/javascript\" src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>
";
    }

    // line 10
    public function block_pageScripts($context, array $blocks = array())
    {
        // line 11
        echo "
\$('.time-select').timepicker({
'minTime': '8:00am',
'maxTime': '20:00pm',
'step': 120,
'timeFormat': 'H:i:s'
});

\$( \".datepicker\" ).datepicker({
dateFormat: \"yy-mm-dd\",
minDate: 0,
});

function getCurrentYear() {

var now = new Date();
return now.getFullYear();
}
var currentYear = getCurrentYear();
\$(\"#year\").attr(\"max\", currentYear);

";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
        // line 35
        echo "<div class=\"banner text-center\">
    ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 37
            echo "    ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\">
        <div class=\"wrapper col-lg-12 col-centered\">
            <div class=\"filters clearfix\">
                <br>
                <form class=\"form-horizontal\" method=\"post\" action=\"";
        // line 48
        echo $this->env->getExtension('routing')->getUrl("filter");
        echo "\">
                    <label for=\"genre-select\">Genre:</label>
                    <select id=\"genre-select\" name=\"conditions[filters][genre_id]\" class=\"form-control\">
                        <option value=\"all\">All genres</option>
                        <option value=\"1\">Comedy</option>
                        <option value=\"2\">Action</option>
                        <option value=\"3\">Drama</option>
                        <option value=\"4\">SF</option>
                        <option value=\"5\">Thriller</option>
                        <option value=\"6\">Horror</option>
                        <option value=\"7\">Adventure</option>
                        <option value=\"8\">Fantasy</option>
                    </select>

                    <label for=\"year\">Released in:</label>
                    <input type=\"number\" class=\"form-control\" id=\"year\" name=\"conditions[filters][year]\" min=\"1900\" placeholder=\"Type a year (1900-present)\">

                    <label for=\"date-select\">Scheduled starting from date:</label>
                    <input class=\"form-control date-select datepicker date\" name=\"conditions[between][start_date]\" placeholder=\"Choose date\">

                    <label for=\"date-select\">Scheduled before date:</label>
                    <input class=\"form-control date-select datepicker date\" name=\"conditions[between][end_date]\" placeholder=\"Choose date\">

                    <label for=\"time-select\">Scheduled starting from time:</label>
                    <input class=\"form-control time-select\" name=\"conditions[between][start_time]\" placeholder=\"Choose time\">

                    <label for=\"time-select\">Scheduled before time:</label>
                    <input class=\"form-control time-select\" name=\"conditions[between][end_time]\" placeholder=\"Choose time\">

                    <label for=\"sort-select\">Sorted by:</label>
                    <select id=\"sort-select\" name=\"conditions[sort][column]\" class=\"form-control\">
                        <option value=\"title\">Title</option>
                        <option value=\"year\">Year</option>
                        <option value=\"date\">Date</option>
                        <option value=\"time\">Time</option>
                    </select>

                    <label for=\"sort-order-select\">Sort order:</label>
                    <select id=\"sort-order-select\" name=\"conditions[sort][flag]\" class=\"form-control\">
                        <option value=\"asc\">Ascending</option>
                        <option value=\"desc\">Descending</option>
                    </select>

                    <label for=\"pagination-select\">Results per page:</label>
                    <select id=\"pagination-select\" name=\"conditions[pagination][per_page]\" class=\"form-control\">
                        <!-- to do: fix pagination! -->
                        <option value=\"100\">All</option>
                    </select>

                    <button class=\"btn btn-primary\" type=\"submit\">Submit <i class=\"fa fa-paper-plane\" aria-hidden=\"true\"></i></button>
                </form>

                <br>

                <form>
                    <label for=\"search\">Search</label>
                    <input type=\"text\" id=\"search\" class=\"form-control\">
                    <button class=\"btn btn-primary\" type=\"submit\">Search <i class=\"fa fa-paper-plane\" aria-hidden=\"true\"></i></button>
                </form>
                <br>
            </div>

            <div class=\"movies-container clearfix\">

                ";
        // line 112
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "movieList", array(), "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["movies"]) {
            // line 113
            echo "                <div class=\"movie col-lg-3\">
                    <p>";
            // line 114
            echo twig_escape_filter($this->env, $this->getAttribute($context["movies"], "title", array(), "array"), "html", null, true);
            echo "</p>
                    <a href=\"movie/";
            // line 115
            echo twig_escape_filter($this->env, $this->getAttribute($context["movies"], "title", array(), "array"), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["movies"], "poster", array(), "array"), "html", null, true);
            echo "\" class=\"img-responsive\" /></a>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movies'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        echo "        </div>
    </div>
</div>
";
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
        return array (  188 => 118,  177 => 115,  173 => 114,  170 => 113,  166 => 112,  99 => 48,  88 => 39,  79 => 37,  75 => 36,  72 => 35,  69 => 34,  44 => 11,  41 => 10,  33 => 4,  30 => 3,  11 => 1,);
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
/* 'timeFormat': 'H:i:s'*/
/* });*/
/* */
/* $( ".datepicker" ).datepicker({*/
/* dateFormat: "yy-mm-dd",*/
/* minDate: 0,*/
/* });*/
/* */
/* function getCurrentYear() {*/
/* */
/* var now = new Date();*/
/* return now.getFullYear();*/
/* }*/
/* var currentYear = getCurrentYear();*/
/* $("#year").attr("max", currentYear);*/
/* */
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
/*     <div class="container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/*             <div class="filters clearfix">*/
/*                 <br>*/
/*                 <form class="form-horizontal" method="post" action="{{ url( 'filter' ) }}">*/
/*                     <label for="genre-select">Genre:</label>*/
/*                     <select id="genre-select" name="conditions[filters][genre_id]" class="form-control">*/
/*                         <option value="all">All genres</option>*/
/*                         <option value="1">Comedy</option>*/
/*                         <option value="2">Action</option>*/
/*                         <option value="3">Drama</option>*/
/*                         <option value="4">SF</option>*/
/*                         <option value="5">Thriller</option>*/
/*                         <option value="6">Horror</option>*/
/*                         <option value="7">Adventure</option>*/
/*                         <option value="8">Fantasy</option>*/
/*                     </select>*/
/* */
/*                     <label for="year">Released in:</label>*/
/*                     <input type="number" class="form-control" id="year" name="conditions[filters][year]" min="1900" placeholder="Type a year (1900-present)">*/
/* */
/*                     <label for="date-select">Scheduled starting from date:</label>*/
/*                     <input class="form-control date-select datepicker date" name="conditions[between][start_date]" placeholder="Choose date">*/
/* */
/*                     <label for="date-select">Scheduled before date:</label>*/
/*                     <input class="form-control date-select datepicker date" name="conditions[between][end_date]" placeholder="Choose date">*/
/* */
/*                     <label for="time-select">Scheduled starting from time:</label>*/
/*                     <input class="form-control time-select" name="conditions[between][start_time]" placeholder="Choose time">*/
/* */
/*                     <label for="time-select">Scheduled before time:</label>*/
/*                     <input class="form-control time-select" name="conditions[between][end_time]" placeholder="Choose time">*/
/* */
/*                     <label for="sort-select">Sorted by:</label>*/
/*                     <select id="sort-select" name="conditions[sort][column]" class="form-control">*/
/*                         <option value="title">Title</option>*/
/*                         <option value="year">Year</option>*/
/*                         <option value="date">Date</option>*/
/*                         <option value="time">Time</option>*/
/*                     </select>*/
/* */
/*                     <label for="sort-order-select">Sort order:</label>*/
/*                     <select id="sort-order-select" name="conditions[sort][flag]" class="form-control">*/
/*                         <option value="asc">Ascending</option>*/
/*                         <option value="desc">Descending</option>*/
/*                     </select>*/
/* */
/*                     <label for="pagination-select">Results per page:</label>*/
/*                     <select id="pagination-select" name="conditions[pagination][per_page]" class="form-control">*/
/*                         <!-- to do: fix pagination! -->*/
/*                         <option value="100">All</option>*/
/*                     </select>*/
/* */
/*                     <button class="btn btn-primary" type="submit">Submit <i class="fa fa-paper-plane" aria-hidden="true"></i></button>*/
/*                 </form>*/
/* */
/*                 <br>*/
/* */
/*                 <form>*/
/*                     <label for="search">Search</label>*/
/*                     <input type="text" id="search" class="form-control">*/
/*                     <button class="btn btn-primary" type="submit">Search <i class="fa fa-paper-plane" aria-hidden="true"></i></button>*/
/*                 </form>*/
/*                 <br>*/
/*             </div>*/
/* */
/*             <div class="movies-container clearfix">*/
/* */
/*                 {% for movies in context['movieList'] %}*/
/*                 <div class="movie col-lg-3">*/
/*                     <p>{{ movies['title'] }}</p>*/
/*                     <a href="movie/{{ movies['title'] }}"><img src="{{ movies['poster'] }}" class="img-responsive" /></a>*/
/*                 </div>*/
/*                 {% endfor %}*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
