<?php

/* Auth/register.html */
class __TwigTemplate_1cf147bcbe1c6eb73f292083b0f78689b54a9fd91b1f6682247701e09c9214d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "Auth/register.html", 1);
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
        $__internal_53f0d03c82971e0bafb43bd84bab0c021475fe3047d83e272b61919f9772232c = $this->env->getExtension("native_profiler");
        $__internal_53f0d03c82971e0bafb43bd84bab0c021475fe3047d83e272b61919f9772232c->enter($__internal_53f0d03c82971e0bafb43bd84bab0c021475fe3047d83e272b61919f9772232c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "Auth/register.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_53f0d03c82971e0bafb43bd84bab0c021475fe3047d83e272b61919f9772232c->leave($__internal_53f0d03c82971e0bafb43bd84bab0c021475fe3047d83e272b61919f9772232c_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_d892bfc5178536fb9cf2821f6b286b474a2d0d93b7feb9d7397280f912bdf873 = $this->env->getExtension("native_profiler");
        $__internal_d892bfc5178536fb9cf2821f6b286b474a2d0d93b7feb9d7397280f912bdf873->enter($__internal_d892bfc5178536fb9cf2821f6b286b474a2d0d93b7feb9d7397280f912bdf873_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 3
        echo "    Register
";
        
        $__internal_d892bfc5178536fb9cf2821f6b286b474a2d0d93b7feb9d7397280f912bdf873->leave($__internal_d892bfc5178536fb9cf2821f6b286b474a2d0d93b7feb9d7397280f912bdf873_prof);

    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        $__internal_03fb0aa50ecca499c53eb40d94ec296966b7992f0d1fb746b3c53061bf3641c2 = $this->env->getExtension("native_profiler");
        $__internal_03fb0aa50ecca499c53eb40d94ec296966b7992f0d1fb746b3c53061bf3641c2->enter($__internal_03fb0aa50ecca499c53eb40d94ec296966b7992f0d1fb746b3c53061bf3641c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 7
        echo "
    <div class=\"authArea\">
        <div class=\"container\">
            
          <div class=\"col-lg-6 col-centered\">
                
            <h1 class=\"text-center\"><i class=\"fa fa-video-camera\" aria-hidden=\"true\"></i> CinemaVillage</h1>
            
            ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 16
            echo "                ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 17
                echo "                        <div class=\"alert alert-danger\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                ";
            }
            // line 19
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "            
            ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 21
            echo "                ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 22
                echo "                        <div class=\"alert alert-success\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                ";
            }
            // line 24
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "     
            <form class=\"form-signin\" method=\"POST\" action=\"";
        // line 25
        echo $this->env->getExtension('routing')->getUrl("handle_register");
        echo "\">
                
                <span class=\"title text-center\">Create a new account</span><hr/>
                
                <label for=\"email\"><i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> Email address</label>
                <input class=\"form-control\" type=\"email\" id=\"email\" name=\"email\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, ((array_key_exists("last_email", $context)) ? (_twig_default_filter((isset($context["last_email"]) ? $context["last_email"] : $this->getContext($context, "last_email")), "")) : ("")), "html", null, true);
        echo "\"/>
                
                <label for=\"password\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i> Password</label>
                <input class=\"form-control\" type=\"password\" id=\"email\" name=\"password\" />
                
                <label for=\"confirmPassword\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i> Confirm Password</label>
                <input class=\"form-control\" type=\"password\" id=\"confirmPassword\" name=\"password_retype\" />
                
                <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Register <i class=\"fa fa-paper-plane\" aria-hidden=\"true\"></i></button>
            </form>

        </div>
    </div>

";
        
        $__internal_03fb0aa50ecca499c53eb40d94ec296966b7992f0d1fb746b3c53061bf3641c2->leave($__internal_03fb0aa50ecca499c53eb40d94ec296966b7992f0d1fb746b3c53061bf3641c2_prof);

    }

    public function getTemplateName()
    {
        return "Auth/register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 30,  107 => 25,  99 => 24,  93 => 22,  90 => 21,  86 => 20,  78 => 19,  72 => 17,  69 => 16,  65 => 15,  55 => 7,  49 => 6,  41 => 3,  35 => 2,  11 => 1,);
    }
}
/* {% extends 'layout.html' %}*/
/* {% block title %}*/
/*     Register*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="authArea">*/
/*         <div class="container">*/
/*             */
/*           <div class="col-lg-6 col-centered">*/
/*                 */
/*             <h1 class="text-center"><i class="fa fa-video-camera" aria-hidden="true"></i> CinemaVillage</h1>*/
/*             */
/*             {% for message in flashBag.get('error') %}*/
/*                 {% if message is defined and message is not empty %}*/
/*                         <div class="alert alert-danger" role="alert">{{ message }}</div>*/
/*                 {% endif %}*/
/*             {% endfor %}            */
/*             {% for message in flashBag.get('error') %}*/
/*                 {% if message is defined and message is not empty %}*/
/*                         <div class="alert alert-success" role="alert">{{ message }}</div>*/
/*                 {% endif %}*/
/*             {% endfor %}     */
/*             <form class="form-signin" method="POST" action="{{ url('handle_register') }}">*/
/*                 */
/*                 <span class="title text-center">Create a new account</span><hr/>*/
/*                 */
/*                 <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Email address</label>*/
/*                 <input class="form-control" type="email" id="email" name="email" value="{{ last_email|default("") }}"/>*/
/*                 */
/*                 <label for="password"><i class="fa fa-key" aria-hidden="true"></i> Password</label>*/
/*                 <input class="form-control" type="password" id="email" name="password" />*/
/*                 */
/*                 <label for="confirmPassword"><i class="fa fa-key" aria-hidden="true"></i> Confirm Password</label>*/
/*                 <input class="form-control" type="password" id="confirmPassword" name="password_retype" />*/
/*                 */
/*                 <button class="btn btn-lg btn-primary btn-block" type="submit">Register <i class="fa fa-paper-plane" aria-hidden="true"></i></button>*/
/*             </form>*/
/* */
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
