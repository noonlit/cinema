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
        $__internal_766aa48349dc996eae1ebc244e851dacf42647591b22e1d0ac8be7a6576e98ea = $this->env->getExtension("native_profiler");
        $__internal_766aa48349dc996eae1ebc244e851dacf42647591b22e1d0ac8be7a6576e98ea->enter($__internal_766aa48349dc996eae1ebc244e851dacf42647591b22e1d0ac8be7a6576e98ea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Admin/users.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_766aa48349dc996eae1ebc244e851dacf42647591b22e1d0ac8be7a6576e98ea->leave($__internal_766aa48349dc996eae1ebc244e851dacf42647591b22e1d0ac8be7a6576e98ea_prof);

    }

    // line 4
    public function block_pageIncludes($context, array $blocks = array())
    {
        $__internal_eb8aeaa95f8682ee3fc5f332a7380a8e33d97185e4ad2071f2193a992abe5a84 = $this->env->getExtension("native_profiler");
        $__internal_eb8aeaa95f8682ee3fc5f332a7380a8e33d97185e4ad2071f2193a992abe5a84->enter($__internal_eb8aeaa95f8682ee3fc5f332a7380a8e33d97185e4ad2071f2193a992abe5a84_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageIncludes"));

        // line 5
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxToggleUserStatus.js\"></script>
    <script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basepath", array()), "html", null, true);
        echo "/js/AjaxDeleteTableRow.js\"></script>
";
        
        $__internal_eb8aeaa95f8682ee3fc5f332a7380a8e33d97185e4ad2071f2193a992abe5a84->leave($__internal_eb8aeaa95f8682ee3fc5f332a7380a8e33d97185e4ad2071f2193a992abe5a84_prof);

    }

    // line 9
    public function block_pageScripts($context, array $blocks = array())
    {
        $__internal_dcd1de3f5bbaea7f41ef4e0e1be18855f8194edde0e5d795e367584d3a57d740 = $this->env->getExtension("native_profiler");
        $__internal_dcd1de3f5bbaea7f41ef4e0e1be18855f8194edde0e5d795e367584d3a57d740->enter($__internal_dcd1de3f5bbaea7f41ef4e0e1be18855f8194edde0e5d795e367584d3a57d740_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageScripts"));

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
    
    \$('.users-per-page').on('change', function() {
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
        
        $__internal_dcd1de3f5bbaea7f41ef4e0e1be18855f8194edde0e5d795e367584d3a57d740->leave($__internal_dcd1de3f5bbaea7f41ef4e0e1be18855f8194edde0e5d795e367584d3a57d740_prof);

    }

    // line 53
    public function block_content($context, array $blocks = array())
    {
        $__internal_791c5c329da5597b40327a33c9590399fa56204b741c96c639e322833222ec5d = $this->env->getExtension("native_profiler");
        $__internal_791c5c329da5597b40327a33c9590399fa56204b741c96c639e322833222ec5d->enter($__internal_791c5c329da5597b40327a33c9590399fa56204b741c96c639e322833222ec5d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

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
                <span class=\"section-title text-center\">View all available users</span><hr/>
                Users per page:        
                <select id=\"users-per-page\" class='users-per-page'>
                    ";
        // line 69
        $context["values"] = array(0 => "all", 1 => 8, 2 => 16, 3 => 24);
        // line 70
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["values"]) ? $context["values"] : $this->getContext($context, "values")));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 71
            echo "                        <option value=\"";
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
        // line 73
        echo "                </select>
                
                
                <table class=\"table\">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["userList"]) ? $context["userList"] : $this->getContext($context, "userList")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 85
            echo "                        <tr>
                            <th scope=\"row\">";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getId", array()), "html", null, true);
            echo "</th>
                            <td data-id=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getEmail", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getEmail", array()), "html", null, true);
            echo "</td>
                            <td class=\"text-right\">
                                <div class=\"changeStatus\" data-id=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getId", array()), "html", null, true);
            echo "\">         
                                    <div data-status=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getActive", array()), "html", null, true);
            echo "\" class=\"changeUserStatus\">
                                        <button></button>
                                    </div>
                                    <span>Active</span>
                                </div>
                                <a href=\"#\" class=\"remove\" data-id=\"";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "getId", array()), "html", null, true);
            echo "\"><i class=\"fa fa-trash fa-1x\" aria-hidden=\"true\"></i> Remove</a>
                            </td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        echo "                    </tbody>
                </table>
                    ";
        // line 101
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) > 1)) {
            // line 102
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_all_users_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) - 1), "users_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\" class='btn btn-link' >Back</a>
                    ";
        }
        // line 104
        echo "                    ";
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) < $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getTotalPages", array()))) {
            // line 105
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("admin_show_all_users_paginated", array("page" => ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()) + 1), "users_per_page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getResultsPerPage", array()))), "html", null, true);
            echo "\" class='btn btn-link' >Next</a>
                    ";
        }
        // line 107
        echo "                    <a href='' id=\"next\" type=\"button\" value=\"Next\" onclick='load(\"users\", ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()), "html", null, true);
        echo ")'/></a>
                    <a href='' id=\"prev\" type=\"button\" value=\"Previous\" onclick='load(\"users\", ";
        // line 108
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "getCurrentPage", array()), "html", null, true);
        echo ")'/></a>
            </div>
        </div>
    </div>
</div>
</div>
";
        
        $__internal_791c5c329da5597b40327a33c9590399fa56204b741c96c639e322833222ec5d->leave($__internal_791c5c329da5597b40327a33c9590399fa56204b741c96c639e322833222ec5d_prof);

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
        return array (  246 => 108,  241 => 107,  235 => 105,  232 => 104,  226 => 102,  224 => 101,  220 => 99,  210 => 95,  202 => 90,  198 => 89,  191 => 87,  187 => 86,  184 => 85,  180 => 84,  167 => 73,  152 => 71,  147 => 70,  145 => 69,  132 => 58,  123 => 56,  119 => 55,  116 => 54,  110 => 53,  62 => 10,  56 => 9,  47 => 6,  42 => 5,  36 => 4,  11 => 1,);
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
/*     $('.users-per-page').on('change', function() {*/
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
/*                 <span class="section-title text-center">View all available users</span><hr/>*/
/*                 Users per page:        */
/*                 <select id="users-per-page" class='users-per-page'>*/
/*                     {% set values = [ 'all', 8, 16, 24 ]%}*/
/*                     {% for value in values %}*/
/*                         <option value="{{ value }}" {% if paginator.getResultsPerPage == value %} selected='selected' {% endif %} >{{ value }}</option>*/
/*                     {% endfor %}*/
/*                 </select>*/
/*                 */
/*                 */
/*                 <table class="table">*/
/*                     <thead>*/
/*                         <tr>*/
/*                             <th>#</th>*/
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
/*                     {% if paginator.getCurrentPage > 1 %}*/
/*                         <a href="{{ url('admin_show_all_users_paginated', {'page': paginator.getCurrentPage - 1, 'users_per_page': paginator.getResultsPerPage}) }}" class='btn btn-link' >Back</a>*/
/*                     {% endif %}*/
/*                     {% if paginator.getCurrentPage < paginator.getTotalPages %}*/
/*                         <a href="{{ url('admin_show_all_users_paginated', {'page': paginator.getCurrentPage + 1, 'users_per_page': paginator.getResultsPerPage}) }}" class='btn btn-link' >Next</a>*/
/*                     {% endif %}*/
/*                     <a href='' id="next" type="button" value="Next" onclick='load("users", {{paginator.getCurrentPage}})'/></a>*/
/*                     <a href='' id="prev" type="button" value="Previous" onclick='load("users", {{paginator.getCurrentPage}})'/></a>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
