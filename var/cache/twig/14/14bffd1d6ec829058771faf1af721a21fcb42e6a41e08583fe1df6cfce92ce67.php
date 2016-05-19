<?php

/* Auth/login.html */
class __TwigTemplate_6c68c8efc90553cbfd79e17da02fa88cc987ef483fcff0674d7d5b8164e4a822 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Auth/login.html", 1);
        $this->blocks = array(
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
        $__internal_0d78c5eb22221867bcc1c80e17e56fea09b9262d7d60d292d8019959e814af43 = $this->env->getExtension("native_profiler");
        $__internal_0d78c5eb22221867bcc1c80e17e56fea09b9262d7d60d292d8019959e814af43->enter($__internal_0d78c5eb22221867bcc1c80e17e56fea09b9262d7d60d292d8019959e814af43_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Auth/login.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0d78c5eb22221867bcc1c80e17e56fea09b9262d7d60d292d8019959e814af43->leave($__internal_0d78c5eb22221867bcc1c80e17e56fea09b9262d7d60d292d8019959e814af43_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_2528a16651102d1fa69c94b6e65ba17dceae31c048acd58d30b93b986ccce2d2 = $this->env->getExtension("native_profiler");
        $__internal_2528a16651102d1fa69c94b6e65ba17dceae31c048acd58d30b93b986ccce2d2->enter($__internal_2528a16651102d1fa69c94b6e65ba17dceae31c048acd58d30b93b986ccce2d2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    Login
";
        
        $__internal_2528a16651102d1fa69c94b6e65ba17dceae31c048acd58d30b93b986ccce2d2->leave($__internal_2528a16651102d1fa69c94b6e65ba17dceae31c048acd58d30b93b986ccce2d2_prof);

    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        $__internal_cb4b5f5795caf63b14ddd3dc113db9348ffcee40e0f0ca015f3925fe97186f8c = $this->env->getExtension("native_profiler");
        $__internal_cb4b5f5795caf63b14ddd3dc113db9348ffcee40e0f0ca015f3925fe97186f8c->enter($__internal_cb4b5f5795caf63b14ddd3dc113db9348ffcee40e0f0ca015f3925fe97186f8c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 8
        echo "
    <div class=\"authArea\">
        <div class=\"container\">
            
          <div class=\"col-lg-6 col-centered\">
            
            <h1 class=\"text-center\"><i class=\"fa fa-video-camera\" aria-hidden=\"true\"></i> CinemaVillage</h1>
            
            ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 17
            echo "                ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 18
                echo "                        <div class=\"alert alert-danger\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                ";
            }
            // line 20
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  
            ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 22
            echo "                ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 23
                echo "                        <div class=\"alert alert-success\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                ";
            }
            // line 25
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  
            
            <form class=\"form-signin\" method=\"POST\" action=\"";
        // line 27
        echo $this->env->getExtension('routing')->getUrl("auth_dologin");
        echo "\">
                
                <span class=\"title text-center\">Sign in now</span><hr/>
                
                <label for=\"email\"><i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> Email address</label>
                <input class=\"form-control\" type=\"email\" id=\"email\" name=\"email\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, ((array_key_exists("last_email", $context)) ? (_twig_default_filter((isset($context["last_email"]) ? $context["last_email"] : $this->getContext($context, "last_email")), "")) : ("")), "html", null, true);
        echo "\" />
                
                <label for=\"password\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i> Password</label>
                <input class=\"form-control\" type=\"password\" id=\"email\" name=\"password\" />

                <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Login <i class=\"fa fa-paper-plane\" aria-hidden=\"true\"></i></button>
            </form>
            </div>
        </div>
    </div>

";
        
        $__internal_cb4b5f5795caf63b14ddd3dc113db9348ffcee40e0f0ca015f3925fe97186f8c->leave($__internal_cb4b5f5795caf63b14ddd3dc113db9348ffcee40e0f0ca015f3925fe97186f8c_prof);

    }

    public function getTemplateName()
    {
        return "Auth/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 32,  108 => 27,  99 => 25,  93 => 23,  90 => 22,  86 => 21,  78 => 20,  72 => 18,  69 => 17,  65 => 16,  55 => 8,  49 => 7,  41 => 4,  35 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.html' %}*/
/* */
/* {% block title %}*/
/*     Login*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="authArea">*/
/*         <div class="container">*/
/*             */
/*           <div class="col-lg-6 col-centered">*/
/*             */
/*             <h1 class="text-center"><i class="fa fa-video-camera" aria-hidden="true"></i> CinemaVillage</h1>*/
/*             */
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
/*             */
/*             <form class="form-signin" method="POST" action="{{ url('auth_dologin') }}">*/
/*                 */
/*                 <span class="title text-center">Sign in now</span><hr/>*/
/*                 */
/*                 <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Email address</label>*/
/*                 <input class="form-control" type="email" id="email" name="email" value="{{ last_email|default("") }}" />*/
/*                 */
/*                 <label for="password"><i class="fa fa-key" aria-hidden="true"></i> Password</label>*/
/*                 <input class="form-control" type="password" id="email" name="password" />*/
/* */
/*                 <button class="btn btn-lg btn-primary btn-block" type="submit">Login <i class="fa fa-paper-plane" aria-hidden="true"></i></button>*/
/*             </form>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
