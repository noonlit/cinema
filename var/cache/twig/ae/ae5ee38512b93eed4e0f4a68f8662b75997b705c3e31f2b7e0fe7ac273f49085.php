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
        $__internal_393165f5f649432c9070cc6b7ad7b971a52a88b18ef06c0ce7ba353e5a206af5 = $this->env->getExtension("native_profiler");
        $__internal_393165f5f649432c9070cc6b7ad7b971a52a88b18ef06c0ce7ba353e5a206af5->enter($__internal_393165f5f649432c9070cc6b7ad7b971a52a88b18ef06c0ce7ba353e5a206af5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Room/room.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_393165f5f649432c9070cc6b7ad7b971a52a88b18ef06c0ce7ba353e5a206af5->leave($__internal_393165f5f649432c9070cc6b7ad7b971a52a88b18ef06c0ce7ba353e5a206af5_prof);

    }

    // line 2
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_fa3e84ac1ca4195f00982932c36f6cdfc8d72db23db5b6114573050f2640a2d6 = $this->env->getExtension("native_profiler");
        $__internal_fa3e84ac1ca4195f00982932c36f6cdfc8d72db23db5b6114573050f2640a2d6->enter($__internal_fa3e84ac1ca4195f00982932c36f6cdfc8d72db23db5b6114573050f2640a2d6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 3
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxEditableElements.js\"></script>
<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxAddTableRow.js\"></script>
";
        
        $__internal_fa3e84ac1ca4195f00982932c36f6cdfc8d72db23db5b6114573050f2640a2d6->leave($__internal_fa3e84ac1ca4195f00982932c36f6cdfc8d72db23db5b6114573050f2640a2d6_prof);

    }

    // line 7
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_a2ad5fafd1ad345626adb6c2f93ff90e9842a8b3e92065b70b92cd2c0db90c0b = $this->env->getExtension("native_profiler");
        $__internal_a2ad5fafd1ad345626adb6c2f93ff90e9842a8b3e92065b70b92cd2c0db90c0b->enter($__internal_a2ad5fafd1ad345626adb6c2f93ff90e9842a8b3e92065b70b92cd2c0db90c0b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 8
        echo "
new AjaxEditableElements('#room-container', 'edit/{id}', function (data) {
swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
});


\$('.rooms-per-page').on('change', function() {
var roomsPerPage = \$(this).val();
var url = window.location.pathname + '?page=1&rooms_per_page=' + roomsPerPage;
\$(location).attr('href', url);
});

\$('#prev-page, #next-page').click(function(){
var url = window.location.pathname;
console.log();
});

new AjaxAddTableRow('#room-container', 'add', function (data) {
        swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
        
        var rowData = '<tr><th scope=\"row\">' + data.roomId + '</th><td contenteditable=\"true\" class=\"editable\" data-id=\"' + data.roomId + '\">' + data.roomName + '</td><td contenteditable=\"true\" class=\"editable\" data-id=\"' + data.roomId + '\">' + data.roomCapacity + '</td>';
        \$('table').append(rowData);
    });   


";
        
        $__internal_a2ad5fafd1ad345626adb6c2f93ff90e9842a8b3e92065b70b92cd2c0db90c0b->leave($__internal_a2ad5fafd1ad345626adb6c2f93ff90e9842a8b3e92065b70b92cd2c0db90c0b_prof);

    }

    // line 35
    public function block_content($context, array $blocks = array())
    {
        $__internal_fa75b35b12e22061979e93aec90f204cf06f6143c67c961af60fabbae1ac03c5 = $this->env->getExtension("native_profiler");
        $__internal_fa75b35b12e22061979e93aec90f204cf06f6143c67c961af60fabbae1ac03c5->enter($__internal_fa75b35b12e22061979e93aec90f204cf06f6143c67c961af60fabbae1ac03c5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 36
        echo "<div class=\"banner text-center\">
    ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 38
            echo "    ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\" id=\"room-container\">
        <div class=\"wrapper col-lg-12 col-centered\">

            <div class=\"showList\">  

                <span class=\"section-title text-center\">View all available rooms</span><hr/>

                Rooms per page:        
                <select id=\"rooms-per-page\" class='rooms-per-page'>
                    ";
        // line 54
        $context["values"] = array(0 => 1, 1 => 2, 2 => 4, 3 => 8, 4 => "all");
        // line 55
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["values"]) ? $context["values"] : $this->getContext($context, "values")));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 56
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\" ";
            if (((isset($context["roomsPerPage"]) ? $context["roomsPerPage"] : $this->getContext($context, "roomsPerPage")) == $context["value"])) {
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
        // line 58
        echo "                </select>

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
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["roomList"]) ? $context["roomList"] : $this->getContext($context, "roomList")));
        foreach ($context['_seq'] as $context["_key"] => $context["room"]) {
            // line 71
            echo "                        <tr>
                            <th scope=\"row\">";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getId", array()), "html", null, true);
            echo "</th>
                            <td contenteditable=\"true\" class=\"editable\" data-id=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getId", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["room"], "getName", array()), "html", null, true);
            echo "</td>
                            <td contenteditable=\"true\" class=\"editable\" date-id=\"";
            // line 74
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
        // line 76
        echo "                        

                    </tbody>
                </table>

                ";
        // line 81
        if (((isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")) > 1)) {
            // line 82
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_all_rooms_paginated", array("page" => ((isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")) - 1), "rooms_per_page" => (isset($context["roomsPerPage"]) ? $context["roomsPerPage"] : $this->getContext($context, "roomsPerPage")))), "html", null, true);
            echo "\" class='btn btn-link' >Back</a>
                ";
        }
        // line 84
        echo "                ";
        if (((isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")) < (isset($context["maxPage"]) ? $context["maxPage"] : $this->getContext($context, "maxPage")))) {
            // line 85
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_all_rooms_paginated", array("page" => ((isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")) + 1), "rooms_per_page" => (isset($context["roomsPerPage"]) ? $context["roomsPerPage"] : $this->getContext($context, "roomsPerPage")))), "html", null, true);
            echo "\" class='btn btn-link' >Next</a>
                ";
        }
        // line 87
        echo "                <a href='' id=\"next\" type=\"button\" value=\"Next\" onclick='load(\"room\", ";
        echo twig_escape_filter($this->env, (isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")), "html", null, true);
        echo ")'/></a>
                <a href='' id=\"prev\" type=\"button\" value=\"Previous\" onclick='load(\"room\", ";
        // line 88
        echo twig_escape_filter($this->env, (isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")), "html", null, true);
        echo ")'/></a>

                <span class=\"section-title text-center\">Add Room</span><hr/>

                <div class=\"row\">
                    <form method=\"post\" action=\"";
        // line 93
        echo $this->env->getExtension('routing')->getUrl("admin_room_add");
        echo "\" class=\"addRow\">

                        <div class=\"col-lg-9\">
                            <label for=\"roomName\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> New Room Name</label>
                            <input class=\"form-control\" type=\"text\" id=\"roomName\" name=\"roomName\" placeholder=\"Enter a new Room name\" />

                            <label for=\"roomCapacity\"><i class=\"fa fa-film\" aria-hidden=\"true\"></i> New capacity</label>
                            <input class=\"form-control\" type=\"text\" id=\"roomCapacity\" name=\"roomCapacity\" placeholder=\"Enter the capacity of the room\" />
                        </div>

                        <div class=\"col-lg-3\">
                            <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Add new Room</button>
                        </div>
                    </form>  
                </div>

            </div>

        </div>
    </div>
</div>
";
        
        $__internal_fa75b35b12e22061979e93aec90f204cf06f6143c67c961af60fabbae1ac03c5->leave($__internal_fa75b35b12e22061979e93aec90f204cf06f6143c67c961af60fabbae1ac03c5_prof);

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
        return array (  233 => 93,  225 => 88,  220 => 87,  214 => 85,  211 => 84,  205 => 82,  203 => 81,  196 => 76,  185 => 74,  179 => 73,  175 => 72,  172 => 71,  168 => 70,  154 => 58,  139 => 56,  134 => 55,  132 => 54,  116 => 40,  107 => 38,  103 => 37,  100 => 36,  94 => 35,  62 => 8,  56 => 7,  47 => 4,  42 => 3,  36 => 2,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* {% block pageIncludes %}*/
/* <script src="{{ app.request.basepath }}/js/AjaxEditableElements.js"></script>*/
/* <script src="{{ app.request.basepath }}/js/AjaxAddTableRow.js"></script>*/
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/* new AjaxEditableElements('#room-container', 'edit/{id}', function (data) {*/
/* swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/* });*/
/* */
/* */
/* $('.rooms-per-page').on('change', function() {*/
/* var roomsPerPage = $(this).val();*/
/* var url = window.location.pathname + '?page=1&rooms_per_page=' + roomsPerPage;*/
/* $(location).attr('href', url);*/
/* });*/
/* */
/* $('#prev-page, #next-page').click(function(){*/
/* var url = window.location.pathname;*/
/* console.log();*/
/* });*/
/* */
/* new AjaxAddTableRow('#room-container', 'add', function (data) {*/
/*         swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/*         */
/*         var rowData = '<tr><th scope="row">' + data.roomId + '</th><td contenteditable="true" class="editable" data-id="' + data.roomId + '">' + data.roomName + '</td><td contenteditable="true" class="editable" data-id="' + data.roomId + '">' + data.roomCapacity + '</td>';*/
/*         $('table').append(rowData);*/
/*     });   */
/* */
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
/*     <div class="container" id="room-container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/* */
/*             <div class="showList">  */
/* */
/*                 <span class="section-title text-center">View all available rooms</span><hr/>*/
/* */
/*                 Rooms per page:        */
/*                 <select id="rooms-per-page" class='rooms-per-page'>*/
/*                     {% set values = [ 1, 2, 4, 8, 'all' ]%}*/
/*                     {% for value in values %}*/
/*                     <option value="{{ value }}" {% if roomsPerPage == value %} selected='selected' {% endif %} >{{ value }}</option>*/
/*                     {% endfor %}*/
/*                 </select>*/
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
/*                             <td contenteditable="true" class="editable" data-id="{{ room.getId }}" >{{ room.getName }}</td>*/
/*                             <td contenteditable="true" class="editable" date-id="{{ room.getId }}" >{{ room.getCapacity }}</td>*/
/*                         </tr>                            */
/*                         {% endfor %}                        */
/* */
/*                     </tbody>*/
/*                 </table>*/
/* */
/*                 {% if currentPage > 1 %}*/
/*                     <a href="{{ url('admin_show_all_rooms_paginated', {'page': currentPage - 1, 'rooms_per_page': roomsPerPage}) }}" class='btn btn-link' >Back</a>*/
/*                 {% endif %}*/
/*                 {% if currentPage < maxPage %}*/
/*                     <a href="{{ url('admin_show_all_rooms_paginated', {'page': currentPage + 1, 'rooms_per_page': roomsPerPage}) }}" class='btn btn-link' >Next</a>*/
/*                 {% endif %}*/
/*                 <a href='' id="next" type="button" value="Next" onclick='load("room", {{currentPage}})'/></a>*/
/*                 <a href='' id="prev" type="button" value="Previous" onclick='load("room", {{currentPage}})'/></a>*/
/* */
/*                 <span class="section-title text-center">Add Room</span><hr/>*/
/* */
/*                 <div class="row">*/
/*                     <form method="post" action="{{ url('admin_room_add') }}" class="addRow">*/
/* */
/*                         <div class="col-lg-9">*/
/*                             <label for="roomName"><i class="fa fa-film" aria-hidden="true"></i> New Room Name</label>*/
/*                             <input class="form-control" type="text" id="roomName" name="roomName" placeholder="Enter a new Room name" />*/
/* */
/*                             <label for="roomCapacity"><i class="fa fa-film" aria-hidden="true"></i> New capacity</label>*/
/*                             <input class="form-control" type="text" id="roomCapacity" name="roomCapacity" placeholder="Enter the capacity of the room" />*/
/*                         </div>*/
/* */
/*                         <div class="col-lg-3">*/
/*                             <button class="btn btn-lg btn-primary btn-block" type="submit">Add new Room</button>*/
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
