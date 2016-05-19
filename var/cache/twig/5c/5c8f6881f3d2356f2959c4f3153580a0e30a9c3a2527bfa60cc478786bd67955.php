<?php

/* User/profile.html */
class __TwigTemplate_808124362ed7bb59bb9d1ee2c6fd4b6c48c78a952717f989114c382c4465b981 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "User/profile.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_998bddc82f5777c34e7d1acfb56dd3ec5b2597716a3819e78c012c62abe97475 = $this->env->getExtension("native_profiler");
        $__internal_998bddc82f5777c34e7d1acfb56dd3ec5b2597716a3819e78c012c62abe97475->enter($__internal_998bddc82f5777c34e7d1acfb56dd3ec5b2597716a3819e78c012c62abe97475_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "User/profile.html"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_998bddc82f5777c34e7d1acfb56dd3ec5b2597716a3819e78c012c62abe97475->leave($__internal_998bddc82f5777c34e7d1acfb56dd3ec5b2597716a3819e78c012c62abe97475_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_77a8f36bc4bc6cc9326b95648a88d43133fa6b6de58900768a0718487f0460ff = $this->env->getExtension("native_profiler");
        $__internal_77a8f36bc4bc6cc9326b95648a88d43133fa6b6de58900768a0718487f0460ff->enter($__internal_77a8f36bc4bc6cc9326b95648a88d43133fa6b6de58900768a0718487f0460ff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    <div class=\"banner text-center\">
        ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashBag"]) ? $context["flashBag"] : $this->getContext($context, "flashBag")), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 6
            echo "                ";
            if ((array_key_exists("message", $context) &&  !twig_test_empty($context["message"]))) {
                // line 7
                echo "                        <div class=\"alert alert-success\" role=\"alert\">";
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "</div>
                ";
            }
            // line 9
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  
        <h1>Cinema Village</h1>
        <h2>Hello ";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getEmail", array()), "html", null, true);
        echo "</h2>
        ";
        // line 12
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 13
            echo "            <h2>You are admin!</h2>          
        ";
        }
        // line 15
        echo "    </div>
";
        
        $__internal_77a8f36bc4bc6cc9326b95648a88d43133fa6b6de58900768a0718487f0460ff->leave($__internal_77a8f36bc4bc6cc9326b95648a88d43133fa6b6de58900768a0718487f0460ff_prof);

    }

    public function getTemplateName()
    {
        return "User/profile.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 15,  71 => 13,  69 => 12,  65 => 11,  56 => 9,  50 => 7,  47 => 6,  43 => 5,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block content %}*/
/*     <div class="banner text-center">*/
/*         {% for message in flashBag.get('success') %}*/
/*                 {% if message is defined and message is not empty %}*/
/*                         <div class="alert alert-success" role="alert">{{ message }}</div>*/
/*                 {% endif %}*/
/*             {% endfor %}  */
/*         <h1>Cinema Village</h1>*/
/*         <h2>Hello {{ user.getEmail }}</h2>*/
/*         {% if is_granted('ROLE_ADMIN') %}*/
/*             <h2>You are admin!</h2>          */
/*         {% endif %}*/
/*     </div>*/
/* {% endblock %}*/
/* */
