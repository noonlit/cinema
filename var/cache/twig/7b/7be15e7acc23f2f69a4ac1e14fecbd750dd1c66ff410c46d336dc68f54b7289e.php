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
        $__internal_d06d6c9e51b203737b913eb894677197b5b25e80799f90d43aaa07dc5bfda70e = $this->env->getExtension("native_profiler");
        $__internal_d06d6c9e51b203737b913eb894677197b5b25e80799f90d43aaa07dc5bfda70e->enter($__internal_d06d6c9e51b203737b913eb894677197b5b25e80799f90d43aaa07dc5bfda70e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d06d6c9e51b203737b913eb894677197b5b25e80799f90d43aaa07dc5bfda70e->leave($__internal_d06d6c9e51b203737b913eb894677197b5b25e80799f90d43aaa07dc5bfda70e_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_83ff8a58e9d3fb68e2fe274fbae8d9880088c01c5aad5a1de899473b8c83b459 = $this->env->getExtension("native_profiler");
        $__internal_83ff8a58e9d3fb68e2fe274fbae8d9880088c01c5aad5a1de899473b8c83b459->enter($__internal_83ff8a58e9d3fb68e2fe274fbae8d9880088c01c5aad5a1de899473b8c83b459_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_83ff8a58e9d3fb68e2fe274fbae8d9880088c01c5aad5a1de899473b8c83b459->leave($__internal_83ff8a58e9d3fb68e2fe274fbae8d9880088c01c5aad5a1de899473b8c83b459_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_e885bb2c7720142e9f7198b2d8d35720b14cf057287568d316bdf874fcbf45ed = $this->env->getExtension("native_profiler");
        $__internal_e885bb2c7720142e9f7198b2d8d35720b14cf057287568d316bdf874fcbf45ed->enter($__internal_e885bb2c7720142e9f7198b2d8d35720b14cf057287568d316bdf874fcbf45ed_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_e885bb2c7720142e9f7198b2d8d35720b14cf057287568d316bdf874fcbf45ed->leave($__internal_e885bb2c7720142e9f7198b2d8d35720b14cf057287568d316bdf874fcbf45ed_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_2baee333fc793299a8a0b1a4b81d87763fd9da4d19a785111fd2d3d7e7861490 = $this->env->getExtension("native_profiler");
        $__internal_2baee333fc793299a8a0b1a4b81d87763fd9da4d19a785111fd2d3d7e7861490->enter($__internal_2baee333fc793299a8a0b1a4b81d87763fd9da4d19a785111fd2d3d7e7861490_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_2baee333fc793299a8a0b1a4b81d87763fd9da4d19a785111fd2d3d7e7861490->leave($__internal_2baee333fc793299a8a0b1a4b81d87763fd9da4d19a785111fd2d3d7e7861490_prof);

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
