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
        $__internal_27cb895c573c836ac65542bbda47138fe4b392fb985230c03e636cb8073343c4 = $this->env->getExtension("native_profiler");
        $__internal_27cb895c573c836ac65542bbda47138fe4b392fb985230c03e636cb8073343c4->enter($__internal_27cb895c573c836ac65542bbda47138fe4b392fb985230c03e636cb8073343c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Auth/login.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_27cb895c573c836ac65542bbda47138fe4b392fb985230c03e636cb8073343c4->leave($__internal_27cb895c573c836ac65542bbda47138fe4b392fb985230c03e636cb8073343c4_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_3f4aa87c419ce9cbc490e509b8a5b1932aa4fe09c286ad988eb48983b84713e7 = $this->env->getExtension("native_profiler");
        $__internal_3f4aa87c419ce9cbc490e509b8a5b1932aa4fe09c286ad988eb48983b84713e7->enter($__internal_3f4aa87c419ce9cbc490e509b8a5b1932aa4fe09c286ad988eb48983b84713e7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    Login
";
        
        $__internal_3f4aa87c419ce9cbc490e509b8a5b1932aa4fe09c286ad988eb48983b84713e7->leave($__internal_3f4aa87c419ce9cbc490e509b8a5b1932aa4fe09c286ad988eb48983b84713e7_prof);

    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        $__internal_a499a42b3aaa13be4d02e52d9edc66e66d49db4199f2998ea6e74b51dde33185 = $this->env->getExtension("native_profiler");
        $__internal_a499a42b3aaa13be4d02e52d9edc66e66d49db4199f2998ea6e74b51dde33185->enter($__internal_a499a42b3aaa13be4d02e52d9edc66e66d49db4199f2998ea6e74b51dde33185_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

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
        
        $__internal_a499a42b3aaa13be4d02e52d9edc66e66d49db4199f2998ea6e74b51dde33185->leave($__internal_a499a42b3aaa13be4d02e52d9edc66e66d49db4199f2998ea6e74b51dde33185_prof);

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
