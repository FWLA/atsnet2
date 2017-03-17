<?php

/* AtemschutzCoreBundle:Default:flash.html.twig */
class __TwigTemplate_a6ddb46b9e8afaaae09effeb83208fa6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 2
            echo "<div class=\"flash flash-error ui-widget\">
\t<div class=\"ui-state-error ui-corner-all\">
\t\t<p><span class=\"ui-icon ui-icon-info\"></span>";
            // line 4
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "</p>
\t</div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 9
            echo "<div class=\"flash flash-notice ui-widget\">
\t<div class=\"ui-state-highlight ui-corner-all\">
\t\t<p><span class=\"ui-icon ui-icon-alert\"></span>";
            // line 11
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "</p>
\t</div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "AtemschutzCoreBundle:Default:flash.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 8,  96 => 28,  74 => 22,  191 => 70,  185 => 66,  134 => 42,  97 => 31,  83 => 20,  77 => 18,  65 => 22,  63 => 18,  58 => 15,  34 => 7,  76 => 25,  59 => 19,  53 => 5,  23 => 2,  239 => 107,  207 => 105,  197 => 97,  194 => 71,  155 => 67,  152 => 66,  150 => 49,  137 => 58,  131 => 55,  129 => 54,  118 => 45,  104 => 37,  100 => 35,  90 => 24,  81 => 26,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 59,  143 => 56,  140 => 59,  132 => 51,  128 => 49,  119 => 38,  111 => 41,  107 => 36,  71 => 21,  177 => 65,  165 => 64,  160 => 61,  139 => 50,  135 => 57,  126 => 40,  114 => 42,  84 => 26,  70 => 22,  67 => 21,  61 => 16,  47 => 12,  98 => 28,  93 => 27,  88 => 22,  78 => 17,  40 => 12,  94 => 22,  89 => 29,  85 => 25,  79 => 26,  75 => 22,  68 => 24,  56 => 15,  50 => 13,  27 => 4,  201 => 92,  196 => 90,  183 => 70,  171 => 81,  166 => 71,  163 => 70,  158 => 54,  156 => 58,  151 => 57,  142 => 44,  138 => 43,  136 => 56,  123 => 47,  121 => 46,  117 => 44,  115 => 37,  105 => 33,  101 => 32,  91 => 31,  69 => 21,  62 => 17,  49 => 16,  43 => 10,  32 => 8,  28 => 8,  87 => 20,  72 => 25,  66 => 19,  55 => 18,  44 => 10,  41 => 9,  25 => 3,  21 => 2,  46 => 15,  35 => 7,  31 => 7,  29 => 7,  38 => 9,  26 => 6,  24 => 7,  22 => 5,  19 => 1,  209 => 82,  203 => 76,  199 => 72,  193 => 73,  189 => 66,  187 => 84,  182 => 66,  176 => 64,  173 => 60,  168 => 66,  164 => 59,  162 => 55,  154 => 54,  149 => 51,  147 => 58,  144 => 61,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 39,  116 => 36,  112 => 42,  109 => 34,  106 => 33,  103 => 37,  99 => 30,  95 => 27,  92 => 33,  86 => 28,  82 => 22,  80 => 24,  73 => 19,  64 => 17,  60 => 19,  57 => 18,  54 => 14,  51 => 14,  48 => 13,  45 => 11,  42 => 10,  39 => 9,  36 => 11,  33 => 9,  30 => 9,);
    }
}
