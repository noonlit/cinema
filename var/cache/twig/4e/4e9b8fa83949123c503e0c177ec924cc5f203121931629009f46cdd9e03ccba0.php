<?php

/* Admin/users.html */
class __TwigTemplate_740c2e4306650092e0594cca8576f0914e5249946b0c6d9ee87d1eb4d9075ea4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Admin/users.html", 1);
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
        $__internal_0e3ce6a393479f69ddfc2479b64af7974fa8d06b77c81a04bda9ecb91729305b = $this->env->getExtension("native_profiler");
        $__internal_0e3ce6a393479f69ddfc2479b64af7974fa8d06b77c81a04bda9ecb91729305b->enter($__internal_0e3ce6a393479f69ddfc2479b64af7974fa8d06b77c81a04bda9ecb91729305b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Admin/users.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0e3ce6a393479f69ddfc2479b64af7974fa8d06b77c81a04bda9ecb91729305b->leave($__internal_0e3ce6a393479f69ddfc2479b64af7974fa8d06b77c81a04bda9ecb91729305b_prof);

    }

    // line 4
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_e4bbd032d78ca2ec98091c6f7b421400bb10c28312b0bb4dc4563b630ebc9ecb = $this->env->getExtension("native_profiler");
        $__internal_e4bbd032d78ca2ec98091c6f7b421400bb10c28312b0bb4dc4563b630ebc9ecb->enter($__internal_e4bbd032d78ca2ec98091c6f7b421400bb10c28312b0bb4dc4563b630ebc9ecb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 5
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxToggleUserStatus.js\"></script>
    <script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxDeleteTableRow.js\"></script>
";
        
        $__internal_e4bbd032d78ca2ec98091c6f7b421400bb10c28312b0bb4dc4563b630ebc9ecb->leave($__internal_e4bbd032d78ca2ec98091c6f7b421400bb10c28312b0bb4dc4563b630ebc9ecb_prof);

    }

    // line 9
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_4cc30da969c6f26227d82237fcb1a9c592ffb50e1cae6ab2a489866202306346 = $this->env->getExtension("native_profiler");
        $__internal_4cc30da969c6f26227d82237fcb1a9c592ffb50e1cae6ab2a489866202306346->enter($__internal_4cc30da969c6f26227d82237fcb1a9c592ffb50e1cae6ab2a489866202306346_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

        // line 10
        echo "
    \$('#user-container table .changeStatus').find('.changeUserStatus').each(function(index, element) {
       if( \$(this).data('status') == 1) {
           \$(this).addClass('selected');
       } else {
           \$(this).parent().find('span').text('Inactive').addClass('inactive');
       }
    });

    \$('#user-container table .changeUserStatus').on('click', function () {
        \$(this).toggleClass('selected');

        if( \$(this).parent().find('span').hasClass('inactive') ) {
            \$(this).parent().find('span').text('Active');
            \$(this).parent().find('span').toggleClass('inactive');
        } else {
            \$(this).parent().find('span').text('Inactive');
            \$(this).parent().find('span').toggleClass('inactive');
        }
  
    });

    new AjaxToggleUserStatus('#user-container', 'changeStatus/{id}', function () {
    });
    
    \$('#users-per-page').on('change', function() {
       var usersPerPage = \$(this).val();
       var url = window.location.pathname + '?page=1&users_per_page=' + usersPerPage;
       \$(location).attr('href', url);
    });
    
    new AjaxDeleteTableRow('#user-container', 'remove/{id}', function (data) {
        swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});
    });
    
 
    \$('#prev-page, #next-page').click(function(){
        var url = window.location.pathname;
        console.log();
    });
    
";
        
        $__internal_4cc30da969c6f26227d82237fcb1a9c592ffb50e1cae6ab2a489866202306346->leave($__internal_4cc30da969c6f26227d82237fcb1a9c592ffb50e1cae6ab2a489866202306346_prof);

    }

    // line 53
    public function block_content($context, array $blocks = array())
    {
        $__internal_961b00beb5badcf35de47ff19b4074addb381b9b32ca720d3e714719b5f242fd = $this->env->getExtension("native_profiler");
        $__internal_961b00beb5badcf35de47ff19b4074addb381b9b32ca720d3e714719b5f242fd->enter($__internal_961b00beb5badcf35de47ff19b4074addb381b9b32ca720d3e714719b5f242fd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 54
        echo "<div class=\"banner text-center\">
    ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 56
            echo "    ";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "    <h1>Cinema Village</h1>
    <h2>A new generation movie theater in your town. Try us!</h2>
</div>

<div class=\"wrapperArea\">
    <div class=\"container\" id=\"user-container\">
        <div class=\"wrapper col-lg-12 col-centered\">
            <div class=\"showList\">
                
                <div class=\"section-title\">
                    <p class=\"pull-left\">View all available users</p>
                    
                    <div class=\"users-per-page pull-right\">
                        <span>Users per page</span>
                        <select class=\"form-control\" id=\"users-per-page\">
                            ";
        // line 73
        $context["values"] = array(0 => "all", 1 => 8, 2 => 16, 3 => 24);
        // line 74
        echo "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["values"]) ? $context["values"] : $this->getContext($context, "values")));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 75
            echo "                                <option value=\"";
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
        // line 77
        echo "                        </select>
                    </div>                    
                </div>
                
                <table class=\"table\">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["userList"]) ? $context["userList"] : $this->getContext($context, "userList")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 90
            echo "                        <tr>
                            <th scope=\"row\">";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getId", array()), "html", null, true);
            echo "</th>
                            <td data-id=\"";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getEmail", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getEmail", array()), "html", null, true);
            echo "</td>
                            <td class=\"text-right\">
                                <div class=\"changeStatus\" data-id=\"";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getId", array()), "html", null, true);
            echo "\">         
                                    <div data-status=\"";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getActive", array()), "html", null, true);
            echo "\" class=\"changeUserStatus\">
                                        <button></button>
                                    </div>
                                    <span>Active</span>
                                </div>
                                <a href=\"#\" class=\"remove\" data-id=\"";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getId", array()), "html", null, true);
            echo "\"><i class=\"fa fa-trash fa-1x\" aria-hidden=\"true\"></i> Remove</a>
                            </td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "                    </tbody>
                </table>
                <div class=\"pagination-container clearfix\">
                    <div class=\"col-lg-12\">
                            <ul class=\"pagination pull-right\">
                                ";
        // line 109
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) > 1)) {
            // line 110
            echo "                                    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_all_users_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) - 1), "users_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\"><i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i> Previous</a></li>
                                ";
        }
        // line 111
        echo "                

                                ";
        // line 113
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) < $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getTotalPages", array()))) {
            // line 114
            echo "                                    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_all_users_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) + 1), "users_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\">Next <i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i></a></li>
                                ";
        }
        // line 115
        echo "    
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_961b00beb5badcf35de47ff19b4074addb381b9b32ca720d3e714719b5f242fd->leave($__internal_961b00beb5badcf35de47ff19b4074addb381b9b32ca720d3e714719b5f242fd_prof);

    }

    public function getTemplateName()
    {
        return "Admin/users.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  252 => 115,  246 => 114,  244 => 113,  240 => 111,  234 => 110,  232 => 109,  225 => 104,  215 => 100,  207 => 95,  203 => 94,  196 => 92,  192 => 91,  189 => 90,  185 => 89,  171 => 77,  156 => 75,  151 => 74,  149 => 73,  132 => 58,  123 => 56,  119 => 55,  116 => 54,  110 => 53,  62 => 10,  56 => 9,  47 => 6,  42 => 5,  36 => 4,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* */
/* {% block pageIncludes %}*/
/*     <script src="{{ app.request.basepath }}/js/AjaxToggleUserStatus.js"></script>*/
/*     <script src="{{ app.request.basepath }}/js/AjaxDeleteTableRow.js"></script>*/
/* {% endblock %}*/
/* */
/* {% block pageScripts %}*/
/* */
/*     $('#user-container table .changeStatus').find('.changeUserStatus').each(function(index, element) {*/
/*        if( $(this).data('status') == 1) {*/
/*            $(this).addClass('selected');*/
/*        } else {*/
/*            $(this).parent().find('span').text('Inactive').addClass('inactive');*/
/*        }*/
/*     });*/
/* */
/*     $('#user-container table .changeUserStatus').on('click', function () {*/
/*         $(this).toggleClass('selected');*/
/* */
/*         if( $(this).parent().find('span').hasClass('inactive') ) {*/
/*             $(this).parent().find('span').text('Active');*/
/*             $(this).parent().find('span').toggleClass('inactive');*/
/*         } else {*/
/*             $(this).parent().find('span').text('Inactive');*/
/*             $(this).parent().find('span').toggleClass('inactive');*/
/*         }*/
/*   */
/*     });*/
/* */
/*     new AjaxToggleUserStatus('#user-container', 'changeStatus/{id}', function () {*/
/*     });*/
/*     */
/*     $('#users-per-page').on('change', function() {*/
/*        var usersPerPage = $(this).val();*/
/*        var url = window.location.pathname + '?page=1&users_per_page=' + usersPerPage;*/
/*        $(location).attr('href', url);*/
/*     });*/
/*     */
/*     new AjaxDeleteTableRow('#user-container', 'remove/{id}', function (data) {*/
/*         swal({title: data.title, text: data.message, type: data.type, timer: 1500, showConfirmButton: false});*/
/*     });*/
/*     */
/*  */
/*     $('#prev-page, #next-page').click(function(){*/
/*         var url = window.location.pathname;*/
/*         console.log();*/
/*     });*/
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
/*     <div class="container" id="user-container">*/
/*         <div class="wrapper col-lg-12 col-centered">*/
/*             <div class="showList">*/
/*                 */
/*                 <div class="section-title">*/
/*                     <p class="pull-left">View all available users</p>*/
/*                     */
/*                     <div class="users-per-page pull-right">*/
/*                         <span>Users per page</span>*/
/*                         <select class="form-control" id="users-per-page">*/
/*                             {% set values = [ 'all', 8, 16, 24 ]%}*/
/*                             {% for value in values %}*/
/*                                 <option value="{{ value }}" {% if paginator.getResultsPerPage == value %} selected='selected' {% endif %} >{{ value }}</option>*/
/*                             {% endfor %}*/
/*                         </select>*/
/*                     </div>                    */
/*                 </div>*/
/*                 */
/*                 <table class="table">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>ID</th>*/
/*                             <th>Email</th>*/
/*                         </tr>*/
/*                     </thead>*/
/*                     <tbody>*/
/*                         {% for user in userList %}*/
/*                         <tr>*/
/*                             <th scope="row">{{ user.getId }}</th>*/
/*                             <td data-id="{{ user.getEmail }}">{{ user.getEmail }}</td>*/
/*                             <td class="text-right">*/
/*                                 <div class="changeStatus" data-id="{{ user.getId }}">         */
/*                                     <div data-status="{{ user.getActive }}" class="changeUserStatus">*/
/*                                         <button></button>*/
/*                                     </div>*/
/*                                     <span>Active</span>*/
/*                                 </div>*/
/*                                 <a href="#" class="remove" data-id="{{ user.getId }}"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> Remove</a>*/
/*                             </td>*/
/*                         </tr>*/
/*                         {% endfor %}*/
/*                     </tbody>*/
/*                 </table>*/
/*                 <div class="pagination-container clearfix">*/
/*                     <div class="col-lg-12">*/
/*                             <ul class="pagination pull-right">*/
/*                                 {% if paginator.getCurrentPage > 1 %}*/
/*                                     <li><a href="{{ url('admin_show_all_users_paginated', {'page': paginator.getCurrentPage - 1, 'users_per_page': paginator.getResultsPerPage}) }}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Previous</a></li>*/
/*                                 {% endif %}                */
/* */
/*                                 {% if paginator.getCurrentPage < paginator.getTotalPages %}*/
/*                                     <li><a href="{{ url('admin_show_all_users_paginated', {'page': paginator.getCurrentPage + 1, 'users_per_page': paginator.getResultsPerPage}) }}">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>*/
/*                                 {% endif %}    */
/*                             </ul>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
