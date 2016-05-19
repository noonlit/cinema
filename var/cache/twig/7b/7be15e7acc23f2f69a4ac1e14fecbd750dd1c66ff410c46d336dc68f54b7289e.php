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
        $__internal_ce447424b3d5816d82e925a7a4802d26f430ca3636deb02130e04b1cb962d369 = $this->env->getExtension("native_profiler");
        $__internal_ce447424b3d5816d82e925a7a4802d26f430ca3636deb02130e04b1cb962d369->enter($__internal_ce447424b3d5816d82e925a7a4802d26f430ca3636deb02130e04b1cb962d369_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ce447424b3d5816d82e925a7a4802d26f430ca3636deb02130e04b1cb962d369->leave($__internal_ce447424b3d5816d82e925a7a4802d26f430ca3636deb02130e04b1cb962d369_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_d4599924e4bb0f7888fa7d13e55508d5b8f02d70dc8225d18d1cfa2ef2e05fd4 = $this->env->getExtension("native_profiler");
        $__internal_d4599924e4bb0f7888fa7d13e55508d5b8f02d70dc8225d18d1cfa2ef2e05fd4->enter($__internal_d4599924e4bb0f7888fa7d13e55508d5b8f02d70dc8225d18d1cfa2ef2e05fd4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_d4599924e4bb0f7888fa7d13e55508d5b8f02d70dc8225d18d1cfa2ef2e05fd4->leave($__internal_d4599924e4bb0f7888fa7d13e55508d5b8f02d70dc8225d18d1cfa2ef2e05fd4_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_25d84cdbe8da7ad1400fce8a637964a2b7b1d934634e15431156ead8675b6cb2 = $this->env->getExtension("native_profiler");
        $__internal_25d84cdbe8da7ad1400fce8a637964a2b7b1d934634e15431156ead8675b6cb2->enter($__internal_25d84cdbe8da7ad1400fce8a637964a2b7b1d934634e15431156ead8675b6cb2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_25d84cdbe8da7ad1400fce8a637964a2b7b1d934634e15431156ead8675b6cb2->leave($__internal_25d84cdbe8da7ad1400fce8a637964a2b7b1d934634e15431156ead8675b6cb2_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_6fe3f83ae35faf70a9eaf0731f5b4c4919315ef6893c2a3892fe9b9205198d42 = $this->env->getExtension("native_profiler");
        $__internal_6fe3f83ae35faf70a9eaf0731f5b4c4919315ef6893c2a3892fe9b9205198d42->enter($__internal_6fe3f83ae35faf70a9eaf0731f5b4c4919315ef6893c2a3892fe9b9205198d42_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_6fe3f83ae35faf70a9eaf0731f5b4c4919315ef6893c2a3892fe9b9205198d42->leave($__internal_6fe3f83ae35faf70a9eaf0731f5b4c4919315ef6893c2a3892fe9b9205198d42_prof);

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
