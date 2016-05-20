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
        $__internal_995c50b8fe44695a2e0997f7fae54b8238c68a4aea7b0866d8cd1bfaee2b4a95 = $this->env->getExtension("native_profiler");
        $__internal_995c50b8fe44695a2e0997f7fae54b8238c68a4aea7b0866d8cd1bfaee2b4a95->enter($__internal_995c50b8fe44695a2e0997f7fae54b8238c68a4aea7b0866d8cd1bfaee2b4a95_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_995c50b8fe44695a2e0997f7fae54b8238c68a4aea7b0866d8cd1bfaee2b4a95->leave($__internal_995c50b8fe44695a2e0997f7fae54b8238c68a4aea7b0866d8cd1bfaee2b4a95_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_4ad9f49a48ee5c51f1cd1c97278290ab8155b2cb3f25487df9ce138a53f2228b = $this->env->getExtension("native_profiler");
        $__internal_4ad9f49a48ee5c51f1cd1c97278290ab8155b2cb3f25487df9ce138a53f2228b->enter($__internal_4ad9f49a48ee5c51f1cd1c97278290ab8155b2cb3f25487df9ce138a53f2228b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_4ad9f49a48ee5c51f1cd1c97278290ab8155b2cb3f25487df9ce138a53f2228b->leave($__internal_4ad9f49a48ee5c51f1cd1c97278290ab8155b2cb3f25487df9ce138a53f2228b_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_0642a09cb0d1a4df5d4f52462443b8d9e092b65565f56026d8b0c6531cfcbf87 = $this->env->getExtension("native_profiler");
        $__internal_0642a09cb0d1a4df5d4f52462443b8d9e092b65565f56026d8b0c6531cfcbf87->enter($__internal_0642a09cb0d1a4df5d4f52462443b8d9e092b65565f56026d8b0c6531cfcbf87_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_0642a09cb0d1a4df5d4f52462443b8d9e092b65565f56026d8b0c6531cfcbf87->leave($__internal_0642a09cb0d1a4df5d4f52462443b8d9e092b65565f56026d8b0c6531cfcbf87_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_ff2aecd719ce392093c4cdbe706870da1da4492eee0d4de73f7a32afc0b08511 = $this->env->getExtension("native_profiler");
        $__internal_ff2aecd719ce392093c4cdbe706870da1da4492eee0d4de73f7a32afc0b08511->enter($__internal_ff2aecd719ce392093c4cdbe706870da1da4492eee0d4de73f7a32afc0b08511_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_ff2aecd719ce392093c4cdbe706870da1da4492eee0d4de73f7a32afc0b08511->leave($__internal_ff2aecd719ce392093c4cdbe706870da1da4492eee0d4de73f7a32afc0b08511_prof);

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
