<?php

/* AtemschutzNachweisBundle:Nachweis:edit.html.twig */
class __TwigTemplate_55b1d609d43576e9f82b26985072ebc6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AtemschutzNachweisBundle:Nachweis:base.html.twig");

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
        return "AtemschutzNachweisBundle:Nachweis:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Bearbeiten";
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
        echo "Nachweis ";
        echo twig_escape_filter($this->env, (isset($context["nachweis"]) ? $context["nachweis"] : null), "html", null, true);
        echo " bearbeiten";
    }

    // line 15
    public function block_moduleActions($context, array $blocks = array())
    {
        // line 16
        echo "<ul class=\"inline\">
\t<li><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("nachweis_show", array("id" => $this->getAttribute((isset($context["nachweis"]) ? $context["nachweis"] : null), "getId", array(), "method"), "_format" => "html")), "html", null, true);
        echo "\">Abbrechen</a>
</ul>
";
    }

    // line 21
    public function block_moduleBody($context, array $blocks = array())
    {
        // line 22
        $this->env->loadTemplate("AtemschutzNachweisBundle:Nachweis:form.html.twig")->display($context);
    }

    // line 25
    public function block_javascripts($context, array $blocks = array())
    {
        // line 26
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t<script type=\"text/javascript\">
\t\$(function() {
\t\t\$( \".date\" ).datepicker({
\t\t\tdateFormat: 'dd.mm.yy',
\t\t\tshowOn: \"both\",
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tbuttonImage: \"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/calendar.png"), "html", null, true);
        echo "\",
\t\t\tbuttonImageOnly: true,
\t\t\tshowOtherMonths: true,
\t\t\tselectOtherMonths: true
\t\t});
\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "AtemschutzNachweisBundle:Nachweis:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 46,  113 => 44,  308 => 123,  304 => 119,  299 => 118,  296 => 117,  290 => 113,  275 => 109,  272 => 108,  266 => 107,  259 => 103,  248 => 98,  244 => 97,  237 => 93,  233 => 92,  226 => 88,  206 => 77,  202 => 76,  198 => 75,  190 => 73,  174 => 67,  153 => 60,  146 => 57,  179 => 70,  170 => 66,  167 => 64,  161 => 60,  145 => 53,  110 => 39,  20 => 4,  289 => 100,  286 => 111,  280 => 95,  274 => 94,  269 => 91,  262 => 87,  255 => 102,  253 => 84,  243 => 80,  230 => 72,  228 => 71,  225 => 70,  222 => 87,  216 => 67,  210 => 65,  195 => 58,  180 => 70,  178 => 52,  175 => 66,  157 => 48,  148 => 46,  37 => 8,  96 => 26,  74 => 22,  191 => 70,  185 => 66,  134 => 51,  97 => 31,  83 => 24,  77 => 25,  65 => 19,  63 => 17,  58 => 15,  34 => 7,  76 => 23,  59 => 16,  53 => 5,  23 => 5,  239 => 107,  207 => 64,  197 => 97,  194 => 74,  155 => 67,  152 => 66,  150 => 64,  137 => 43,  131 => 55,  129 => 41,  118 => 38,  104 => 36,  100 => 35,  90 => 24,  81 => 26,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 105,  294 => 101,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 86,  252 => 80,  247 => 81,  241 => 77,  235 => 75,  229 => 73,  224 => 71,  220 => 70,  214 => 82,  208 => 78,  169 => 59,  143 => 45,  140 => 54,  132 => 51,  128 => 48,  119 => 38,  111 => 34,  107 => 35,  71 => 21,  177 => 65,  165 => 64,  160 => 49,  139 => 50,  135 => 55,  126 => 43,  114 => 37,  84 => 26,  70 => 21,  67 => 19,  61 => 16,  47 => 11,  98 => 28,  93 => 34,  88 => 22,  78 => 25,  40 => 9,  94 => 22,  89 => 29,  85 => 25,  79 => 23,  75 => 22,  68 => 20,  56 => 15,  50 => 13,  27 => 7,  201 => 60,  196 => 90,  183 => 91,  171 => 81,  166 => 65,  163 => 70,  158 => 63,  156 => 58,  151 => 59,  142 => 44,  138 => 56,  136 => 56,  123 => 47,  121 => 46,  117 => 44,  115 => 37,  105 => 33,  101 => 31,  91 => 28,  69 => 21,  62 => 17,  49 => 16,  43 => 10,  32 => 7,  28 => 8,  87 => 23,  72 => 16,  66 => 17,  55 => 18,  44 => 10,  41 => 9,  25 => 3,  21 => 2,  46 => 11,  35 => 9,  31 => 7,  29 => 6,  38 => 9,  26 => 6,  24 => 6,  22 => 5,  19 => 4,  209 => 82,  203 => 76,  199 => 72,  193 => 73,  189 => 56,  187 => 72,  182 => 66,  176 => 68,  173 => 60,  168 => 66,  164 => 59,  162 => 73,  154 => 54,  149 => 54,  147 => 58,  144 => 61,  141 => 44,  133 => 42,  130 => 41,  125 => 40,  122 => 45,  116 => 42,  112 => 42,  109 => 43,  106 => 33,  103 => 34,  99 => 31,  95 => 29,  92 => 34,  86 => 25,  82 => 20,  80 => 26,  73 => 22,  64 => 17,  60 => 16,  57 => 15,  54 => 17,  51 => 13,  48 => 13,  45 => 12,  42 => 11,  39 => 9,  36 => 11,  33 => 7,  30 => 7,);
    }
}
