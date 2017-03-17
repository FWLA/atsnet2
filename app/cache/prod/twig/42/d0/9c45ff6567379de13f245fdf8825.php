<?php

/* AtemschutzCoreBundle:Organisation:new.html.twig */
class __TwigTemplate_42d09c45ff6567379de13f245fdf8825 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AtemschutzCoreBundle:Organisation:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'moduleTitle' => array($this, 'block_moduleTitle'),
            'moduleActions' => array($this, 'block_moduleActions'),
            'moduleBody' => array($this, 'block_moduleBody'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AtemschutzCoreBundle:Organisation:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Neu";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "\t";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 13
    public function block_moduleTitle($context, array $blocks = array())
    {
        echo "Neue Organisation";
    }

    // line 15
    public function block_moduleActions($context, array $blocks = array())
    {
        // line 16
        echo "<ul class=\"inline\">
\t<li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("organisation_index");
        echo "\">Abbrechen</a>
</ul>
";
    }

    // line 21
    public function block_moduleBody($context, array $blocks = array())
    {
        // line 22
        $this->env->loadTemplate("AtemschutzCoreBundle:Organisation:form.html.twig")->display($context);
    }

    // line 25
    public function block_javascripts($context, array $blocks = array())
    {
        // line 26
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "AtemschutzCoreBundle:Organisation:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 25,  59 => 16,  53 => 5,  23 => 1,  239 => 107,  207 => 105,  197 => 97,  194 => 96,  155 => 67,  152 => 66,  150 => 65,  137 => 58,  131 => 55,  129 => 54,  118 => 45,  104 => 37,  100 => 35,  90 => 29,  81 => 22,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 56,  140 => 59,  132 => 51,  128 => 49,  119 => 42,  111 => 41,  107 => 36,  71 => 17,  177 => 65,  165 => 64,  160 => 61,  139 => 50,  135 => 57,  126 => 45,  114 => 42,  84 => 28,  70 => 20,  67 => 15,  61 => 13,  47 => 12,  98 => 34,  93 => 28,  88 => 6,  78 => 21,  40 => 9,  94 => 22,  89 => 20,  85 => 25,  79 => 26,  75 => 23,  68 => 14,  56 => 15,  50 => 13,  27 => 4,  201 => 92,  196 => 90,  183 => 70,  171 => 81,  166 => 71,  163 => 70,  158 => 67,  156 => 58,  151 => 57,  142 => 59,  138 => 57,  136 => 56,  123 => 47,  121 => 46,  117 => 44,  115 => 43,  105 => 40,  101 => 32,  91 => 31,  69 => 21,  62 => 17,  49 => 19,  43 => 10,  32 => 7,  28 => 3,  87 => 20,  72 => 22,  66 => 24,  55 => 15,  44 => 11,  41 => 10,  25 => 3,  21 => 2,  46 => 11,  35 => 7,  31 => 4,  29 => 5,  38 => 9,  26 => 6,  24 => 3,  22 => 1,  19 => 1,  209 => 82,  203 => 99,  199 => 67,  193 => 73,  189 => 66,  187 => 84,  182 => 66,  176 => 64,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 58,  144 => 61,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 36,  112 => 42,  109 => 41,  106 => 33,  103 => 37,  99 => 30,  95 => 34,  92 => 33,  86 => 28,  82 => 22,  80 => 41,  73 => 19,  64 => 10,  60 => 13,  57 => 11,  54 => 10,  51 => 14,  48 => 8,  45 => 8,  42 => 10,  39 => 9,  36 => 5,  33 => 7,  30 => 7,);
    }
}
