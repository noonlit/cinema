<?php

/* Room/room.html */
class __TwigTemplate_160f79877fc8949f60d01a38ec61c7d19d5cdab8126dabe3c44081ef71cf561e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Room/room.html", 1);
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
        $__internal_cc01556768e0b3b8e9a8c751144d3590fc7dd24064b8a0fe940322b45690d59e = $this->env->getExtension("native_profiler");
        $__internal_cc01556768e0b3b8e9a8c751144d3590fc7dd24064b8a0fe940322b45690d59e->enter($__internal_cc01556768e0b3b8e9a8c751144d3590fc7dd24064b8a0fe940322b45690d59e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Room/room.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_cc01556768e0b3b8e9a8c751144d3590fc7dd24064b8a0fe940322b45690d59e->leave($__internal_cc01556768e0b3b8e9a8c751144d3590fc7dd24064b8a0fe940322b45690d59e_prof);

    }

    // line 2
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_cc6522731bb02a574224ad6d0a01aa9535a60498279241d9e928e324aded46a1 = $this->env->getExtension("native_profiler");
        $__internal_cc6522731bb02a574224ad6d0a01aa9535a60498279241d9e928e324aded46a1->enter($__internal_cc6522731bb02a574224ad6d0a01aa9535a60498279241d9e928e324aded46a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 3
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxEditableDoubleColumns.js\"></script>
<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxAddTableRow.js\"></script>
";
        
        $__internal_cc6522731bb02a574224ad6d0a01aa9535a60498279241d9e928e324aded46a1->leave($__internal_cc6522731bb02a574224ad6d0a01aa9535a60498279241d9e928e324aded46a1_prof);

    }

    // line 7
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_89ea1f6fe2de889c7e879764b0b474c023dd4dbd8c395b51356ef1f8476e7756 = $this->env->getExtension("native_profiler");
        $__internal_89ea1f6fe2de889c7e879764b0b474c023dd4dbd8c395b51356ef1f8476e7756->enter($__internal_89ea1f6fe2de889c7e879764b0b474c023dd4dbd8c395b51356ef1f8476e7756_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 8
        echo "
new AjaxEditableDoubleColumns({'name': 'name', 'capacity': 'capacity'},'#room-container', 'edit/{id}', function (data) {
swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
});

\$('#rooms-per-page').on('change', function() {
var roomsPerPage = \$(this).val();
var url = window.location.pathname + '?page=1&rooms_per_page=' + roomsPerPage;
\$(location).attr('href', url);
});

\$('#prev-page, #next-page').click(function(){
var url = window.location.pathname;
});

new AjaxAddTableRow('#room-container', 'add', function (data) {
swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});

if( data.type == 'success' ) {
var rowData = '<tr><th scope=\"row\">' + data.roomId + '</th><td contenteditable=\"true\" class=\"editable\" data-id=\"' + data.roomId + '\">' + data.roomName + '</td><td contenteditable=\"true\" class=\"editable\" data-id=\"' + data.roomId + '\">' + data.roomCapacity + '</td>';
    \$('table').append(rowData);
    }
    });   


    ";
        
        $__internal_89ea1f6fe2de889c7e879764b0b474c023dd4dbd8c395b51356ef1f8476e7756->leave($__internal_89ea1f6fe2de889c7e879764b0b474c023dd4dbd8c395b51356ef1f8476e7756_prof);

    }

    // line 35
    public function block_content($context, array $blocks = array())
    {
        $__internal_1929ed8744ef8f25a9826d826311c363fdde77ae85d704bb940f9d07e0f8ae15 = $this->env->getExtension("native_profiler");
        $__internal_1929ed8744ef8f25a9826d826311c363fdde77ae85d704bb940f9d07e0f8ae15->enter($__internal_1929ed8744ef8f25a9826d826311c363fdde77ae85d704bb940f9d07e0f8ae15_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 36
        echo "<div class=\"banner text-center\">
    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\" id=\"room-container\">
        <div class=\"wrapper col-lg-12 col-centered\">

            <div class=\"showList\">  

                <div class=\"section-title\">
                    <p class=\"pull-left\">View all available Rooms</p>

                    <div class=\"users-per-page pull-right\">
                        <span>Rooms per page</span>
                        <select class=\"form-control\" id=\"rooms-per-page\">
                            ";
        // line 53
        $context["values"] = array(0 => "all", 1 => 8, 2 => 16, 3 => 24);
        // line 54
        echo "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["values"]) ? $context["values"] : $this->getContext($context, "values")));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 55
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\" ";
            if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()) == $context["value"])) {
                echo " selected='selected' ";
            }
            echo " >";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "                        </select>
                    </div>                    
                </div>                

                <table class=\"table\">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Capacity</th>
                        </tr>
                    </thead>
                    <tbody>

                        ";
        // line 71
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["roomList"]) ? $context["roomList"] : $this->getContext($context, "roomList")));
        foreach ($context['_seq'] as $context["_key"] => $context["room"]) {
            // line 72
            echo "                        <tr>
                            <th scope=\"row\">";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getId", array()), "html", null, true);
            echo "</th>
                            <td contenteditable=\"true\" class=\"editable name\" data-id=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getId", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getName", array()), "html", null, true);
            echo "</td>
                            <td contenteditable=\"true\" class=\"editable capacity\" data-id=\"";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getId", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getCapacity", array()), "html", null, true);
            echo "</td>
                        </tr>                            
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['room'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "                        

                    </tbody>
                </table>

                <div class=\"pagination-container clearfix\">
                    <div class=\"col-lg-12\">
                        <ul class=\"pagination pull-right\">
                            ";
        // line 85
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) > 1)) {
            // line 86
            echo "                            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_all_rooms_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) - 1), "rooms_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\"><i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i> Previous</a></li>
                            ";
        }
        // line 88
        echo "
                            ";
        // line 89
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) < $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getTotalPages", array()))) {
            // line 90
            echo "                            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_all_rooms_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) + 1), "rooms_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\">Next <i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i></a></li>
                            ";
        }
        // line 91
        echo "    
                        </ul>
                    </div>
                </div>

                <span class=\"section-title text-left\">Add a new Room</span><hr/>

                <div class=\"row\">
                    <form method=\"post\" action=\"";
        // line 99
        echo $this->env->getExtension('routing')->getUrl("admin_room_add");
        echo "\" class=\"addRow\">
                        <div class=\"col-lg-12\">
                            <div class=\"row\">
                                <div class=\"col-lg-6\">
                                    <label for=\"roomName\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i> Room Name</label>
                                    <input class=\"form-control\" type=\"text\" id=\"roomName\" name=\"roomName\" placeholder=\"Enter room name\" />
                                </div>

                                <div class=\"col-lg-6\">
                                    <label for=\"roomCapacity\"><i class=\"fa fa-users\" aria-hidden=\"true\"></i> Room Capacity</label>
                                    <input class=\"form-control\" type=\"text\" id=\"roomCapacity\" name=\"roomCapacity\" placeholder=\"Enter the capacity of the room\" />
                                </div>

                                <div class=\"col-lg-12\">
                                    <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Add new Room</button>
                                </div>
                            </div>
                        </div>
                    </form>  
                </div>

            </div>

        </div>
    </div>
</div>
";
        
        $__internal_1929ed8744ef8f25a9826d826311c363fdde77ae85d704bb940f9d07e0f8ae15->leave($__internal_1929ed8744ef8f25a9826d826311c363fdde77ae85d704bb940f9d07e0f8ae15_prof);

    }

    public function getTemplateName()
    {
        return "Room/room.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 99,  214 => 91,  208 => 90,  206 => 89,  203 => 88,  197 => 86,  195 => 85,  185 => 77,  174 => 75,  168 => 74,  164 => 73,  161 => 72,  157 => 71,  141 => 57,  126 => 55,  121 => 54,  119 => 53,  100 => 36,  94 => 35,  62 => 8,  56 => 7,  47 => 4,  42 => 3,  36 => 2,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* {% block pageIncludes %}*/
/* <script src="{{ app.request.basepath }}/js/AjaxEditableDoubleColumns.js"></script>*/
/* <script src="{{ app.request.basepath }}/js/AjaxAddTableRow.js"></script>*/
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/* new AjaxEditableDoubleColumns({'name': 'name', 'capacity': 'capacity'},'#room-container', 'edit/{id}', function (data) {*/
/* swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/* });*/
/* */
/* $('#rooms-per-page').on('change', function() {*/
/* var roomsPerPage = $(this).val();*/
/* var url = window.location.pathname + '?page=1&rooms_per_page=' + roomsPerPage;*/
/* $(location).attr('href', url);*/
/* });*/
/* */
/* $('#prev-page, #next-page').click(function(){*/
/* var url = window.location.pathname;*/
/* });*/
/* */
/* new AjaxAddTableRow('#room-container', 'add', function (data) {*/
/* swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/* */
/* if( data.type == 'success' ) {*/
/* var rowData = '<tr><th scope="row">' + data.roomId + '</th><td contenteditable="true" class="editable" data-id="' + data.roomId + '">' + data.roomName + '</td><td contenteditable="true" class="editable" data-id="' + data.roomId + '">' + data.roomCapacity + '</td>';*/
/*     $('table').append(rowData);*/
/*     }*/
/*     });   */
/* */
/* */
/*     {% endblock %}*/
/* */
/*     {% block content %}*/
/* <div class="banner text-center">*/
/*     <h1>Cinema Village</h1>*/
/*     <h2>A new generation movie theater in your town. Try us!</h2>*/
/* </div>*/
/* */
/* <div class="wrapperArea">*/
/*     <div class="container" id="room-container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/* */
/*             <div class="showList">  */
/* */
/*                 <div class="section-title">*/
/*                     <p class="pull-left">View all available Rooms</p>*/
/* */
/*                     <div class="users-per-page pull-right">*/
/*                         <span>Rooms per page</span>*/
/*                         <select class="form-control" id="rooms-per-page">*/
/*                             {% set values = [ 'all', 8, 16, 24 ]%}*/
/*                             {% for value in values %}*/
/*                             <option value="{{ value }}" {% if paginator.getResultsPerPage == value %} selected='selected' {% endif %} >{{ value }}</option>*/
/*                             {% endfor %}*/
/*                         </select>*/
/*                     </div>                    */
/*                 </div>                */
/* */
/*                 <table class="table">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>#</th>*/
/*                             <th>Name</th>*/
/*                             <th>Capacity</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/* */
/*                         {% for room in roomList %}*/
/*                         <tr>*/
/*                             <th scope="row">{{ room.getId }}</th>*/
/*                             <td contenteditable="true" class="editable name" data-id="{{ room.getId }}" >{{ room.getName }}</td>*/
/*                             <td contenteditable="true" class="editable capacity" data-id="{{ room.getId }}" >{{ room.getCapacity }}</td>*/
/*                         </tr>                            */
/*                         {% endfor %}                        */
/* */
/*                     </tbody>*/
/*                 </table>*/
/* */
/*                 <div class="pagination-container clearfix">*/
/*                     <div class="col-lg-12">*/
/*                         <ul class="pagination pull-right">*/
/*                             {% if paginator.getCurrentPage > 1 %}*/
/*                             <li><a href="{{ url('admin_show_all_rooms_paginated', {'page': paginator.getCurrentPage - 1, 'rooms_per_page': paginator.getResultsPerPage}) }}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Previous</a></li>*/
/*                             {% endif %}*/
/* */
/*                             {% if paginator.getCurrentPage < paginator.getTotalPages %}*/
/*                             <li><a href="{{ url('admin_show_all_rooms_paginated', {'page': paginator.getCurrentPage + 1, 'rooms_per_page': paginator.getResultsPerPage}) }}">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>*/
/*                             {% endif %}    */
/*                         </ul>*/
/*                     </div>*/
/*                 </div>*/
/* */
/*                 <span class="section-title text-left">Add a new Room</span><hr/>*/
/* */
/*                 <div class="row">*/
/*                     <form method="post" action="{{ url('admin_room_add') }}" class="addRow">*/
/*                         <div class="col-lg-12">*/
/*                             <div class="row">*/
/*                                 <div class="col-lg-6">*/
/*                                     <label for="roomName"><i class="fa fa-map-marker" aria-hidden="true"></i> Room Name</label>*/
/*                                     <input class="form-control" type="text" id="roomName" name="roomName" placeholder="Enter room name" />*/
/*                                 </div>*/
/* */
/*                                 <div class="col-lg-6">*/
/*                                     <label for="roomCapacity"><i class="fa fa-users" aria-hidden="true"></i> Room Capacity</label>*/
/*                                     <input class="form-control" type="text" id="roomCapacity" name="roomCapacity" placeholder="Enter the capacity of the room" />*/
/*                                 </div>*/
/* */
/*                                 <div class="col-lg-12">*/
/*                                     <button class="btn btn-lg btn-primary btn-block" type="submit">Add new Room</button>*/
/*                                 </div>*/
/*                             </div>*/
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
