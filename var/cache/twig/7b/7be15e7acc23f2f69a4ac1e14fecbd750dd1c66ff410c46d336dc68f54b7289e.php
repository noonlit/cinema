<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_05203e5c568846bc0115292aa5c021b3a89e70954e14dec4e4747c71f16f67a8 extends Twig_Template
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
        $__internal_d536827934c0af73d5385715680cb7207904590c1121801807496ad5a1ce79c2 = $this->env->getExtension("native_profiler");
        $__internal_d536827934c0af73d5385715680cb7207904590c1121801807496ad5a1ce79c2->enter($__internal_d536827934c0af73d5385715680cb7207904590c1121801807496ad5a1ce79c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d536827934c0af73d5385715680cb7207904590c1121801807496ad5a1ce79c2->leave($__internal_d536827934c0af73d5385715680cb7207904590c1121801807496ad5a1ce79c2_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_beb4a820a66474f58062a4cb662c4ac5fcb37340a227b9b30639ceb275ea8057 = $this->env->getExtension("native_profiler");
        $__internal_beb4a820a66474f58062a4cb662c4ac5fcb37340a227b9b30639ceb275ea8057->enter($__internal_beb4a820a66474f58062a4cb662c4ac5fcb37340a227b9b30639ceb275ea8057_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_beb4a820a66474f58062a4cb662c4ac5fcb37340a227b9b30639ceb275ea8057->leave($__internal_beb4a820a66474f58062a4cb662c4ac5fcb37340a227b9b30639ceb275ea8057_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_4229b916f9569916c4184d8f013d08ee8cd7cd5e6ff4c78ff08925b5832fa688 = $this->env->getExtension("native_profiler");
        $__internal_4229b916f9569916c4184d8f013d08ee8cd7cd5e6ff4c78ff08925b5832fa688->enter($__internal_4229b916f9569916c4184d8f013d08ee8cd7cd5e6ff4c78ff08925b5832fa688_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_4229b916f9569916c4184d8f013d08ee8cd7cd5e6ff4c78ff08925b5832fa688->leave($__internal_4229b916f9569916c4184d8f013d08ee8cd7cd5e6ff4c78ff08925b5832fa688_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_b19a40e3ce1f9877e273068047ca2472a7db5ca33c98d4c567121594a6bb3dd0 = $this->env->getExtension("native_profiler");
        $__internal_b19a40e3ce1f9877e273068047ca2472a7db5ca33c98d4c567121594a6bb3dd0->enter($__internal_b19a40e3ce1f9877e273068047ca2472a7db5ca33c98d4c567121594a6bb3dd0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_b19a40e3ce1f9877e273068047ca2472a7db5ca33c98d4c567121594a6bb3dd0->leave($__internal_b19a40e3ce1f9877e273068047ca2472a7db5ca33c98d4c567121594a6bb3dd0_prof);

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
