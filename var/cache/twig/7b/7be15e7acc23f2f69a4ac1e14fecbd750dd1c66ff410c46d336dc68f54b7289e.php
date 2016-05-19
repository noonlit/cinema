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
        $__internal_d5bfa135dd899a5c90e064cfec3df49d5c1f5dd3a4b2fd7b54faf5b1cb7b02d7 = $this->env->getExtension("native_profiler");
        $__internal_d5bfa135dd899a5c90e064cfec3df49d5c1f5dd3a4b2fd7b54faf5b1cb7b02d7->enter($__internal_d5bfa135dd899a5c90e064cfec3df49d5c1f5dd3a4b2fd7b54faf5b1cb7b02d7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d5bfa135dd899a5c90e064cfec3df49d5c1f5dd3a4b2fd7b54faf5b1cb7b02d7->leave($__internal_d5bfa135dd899a5c90e064cfec3df49d5c1f5dd3a4b2fd7b54faf5b1cb7b02d7_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_27febc8231f31f48bf51b084440e21ff43c731040e03b47037c3ebf68e38d208 = $this->env->getExtension("native_profiler");
        $__internal_27febc8231f31f48bf51b084440e21ff43c731040e03b47037c3ebf68e38d208->enter($__internal_27febc8231f31f48bf51b084440e21ff43c731040e03b47037c3ebf68e38d208_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_27febc8231f31f48bf51b084440e21ff43c731040e03b47037c3ebf68e38d208->leave($__internal_27febc8231f31f48bf51b084440e21ff43c731040e03b47037c3ebf68e38d208_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_d6ad417fcd146c747cf3b7f69318d3dc4902ddc84248ec81c987ab988a5b7527 = $this->env->getExtension("native_profiler");
        $__internal_d6ad417fcd146c747cf3b7f69318d3dc4902ddc84248ec81c987ab988a5b7527->enter($__internal_d6ad417fcd146c747cf3b7f69318d3dc4902ddc84248ec81c987ab988a5b7527_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_d6ad417fcd146c747cf3b7f69318d3dc4902ddc84248ec81c987ab988a5b7527->leave($__internal_d6ad417fcd146c747cf3b7f69318d3dc4902ddc84248ec81c987ab988a5b7527_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_b51df06d4cb0fd1cc56e33fa9a1e4c9330a7248a59cdaeafc6d3f358fc106bb0 = $this->env->getExtension("native_profiler");
        $__internal_b51df06d4cb0fd1cc56e33fa9a1e4c9330a7248a59cdaeafc6d3f358fc106bb0->enter($__internal_b51df06d4cb0fd1cc56e33fa9a1e4c9330a7248a59cdaeafc6d3f358fc106bb0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_b51df06d4cb0fd1cc56e33fa9a1e4c9330a7248a59cdaeafc6d3f358fc106bb0->leave($__internal_b51df06d4cb0fd1cc56e33fa9a1e4c9330a7248a59cdaeafc6d3f358fc106bb0_prof);

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
