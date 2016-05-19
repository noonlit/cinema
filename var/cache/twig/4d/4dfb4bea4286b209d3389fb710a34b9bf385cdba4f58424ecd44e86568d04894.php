<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_8393743f6e7f9c19fb3bc262eb03fc546085c0afe7d1ae8014cbfca5818ce230 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_92276010d0cb2f671e334bb18762eac27aea50c1a104314e6647ac78f4250d73 = $this->env->getExtension("native_profiler");
        $__internal_92276010d0cb2f671e334bb18762eac27aea50c1a104314e6647ac78f4250d73->enter($__internal_92276010d0cb2f671e334bb18762eac27aea50c1a104314e6647ac78f4250d73_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_92276010d0cb2f671e334bb18762eac27aea50c1a104314e6647ac78f4250d73->leave($__internal_92276010d0cb2f671e334bb18762eac27aea50c1a104314e6647ac78f4250d73_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_05117048dc70fbf5c410fc3dd5be7e8673032d078306abf8506f30c1a95dd03a = $this->env->getExtension("native_profiler");
        $__internal_05117048dc70fbf5c410fc3dd5be7e8673032d078306abf8506f30c1a95dd03a->enter($__internal_05117048dc70fbf5c410fc3dd5be7e8673032d078306abf8506f30c1a95dd03a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_05117048dc70fbf5c410fc3dd5be7e8673032d078306abf8506f30c1a95dd03a->leave($__internal_05117048dc70fbf5c410fc3dd5be7e8673032d078306abf8506f30c1a95dd03a_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_b00a5cc9cc1c8c795026e9da52aa35d6013a7928c57b8edabc463c5e3d7a17fd = $this->env->getExtension("native_profiler");
        $__internal_b00a5cc9cc1c8c795026e9da52aa35d6013a7928c57b8edabc463c5e3d7a17fd->enter($__internal_b00a5cc9cc1c8c795026e9da52aa35d6013a7928c57b8edabc463c5e3d7a17fd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_b00a5cc9cc1c8c795026e9da52aa35d6013a7928c57b8edabc463c5e3d7a17fd->leave($__internal_b00a5cc9cc1c8c795026e9da52aa35d6013a7928c57b8edabc463c5e3d7a17fd_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_dc6a41ecc09718b7b362e1a9f2d90be4de2c978c6a756c2d34789243b89cc838 = $this->env->getExtension("native_profiler");
        $__internal_dc6a41ecc09718b7b362e1a9f2d90be4de2c978c6a756c2d34789243b89cc838->enter($__internal_dc6a41ecc09718b7b362e1a9f2d90be4de2c978c6a756c2d34789243b89cc838_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_dc6a41ecc09718b7b362e1a9f2d90be4de2c978c6a756c2d34789243b89cc838->leave($__internal_dc6a41ecc09718b7b362e1a9f2d90be4de2c978c6a756c2d34789243b89cc838_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
