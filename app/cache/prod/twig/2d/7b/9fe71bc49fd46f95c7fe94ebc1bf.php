<?php

/* AtemschutzNachweisBundle:Default:menu.html.twig */
class __TwigTemplate_2d7b9fe71bc49fd46f95c7fe94ebc1bf extends Twig_Template
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
        // line 4
        echo "
";
        // line 5
        if ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getAtemschutzgeraetetraeger", array(), "method") != null) || $this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_VIEWER"))) {
            // line 6
            echo "<h3>Atemschutznachweis</h3>
<ul>
\t";
            // line 8
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getAtemschutzgeraetetraeger", array(), "method") != null)) {
                // line 9
                echo "\t<li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_showMy");
                echo "\">Mein Nachweis</a>
\t";
            }
            // line 11
            echo "\t";
            if ($this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_MANAGER")) {
                // line 12
                echo "\t<li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("nachweis_bulk");
                echo "\">Nachweise Eintragen</a>
\t";
            }
            // line 14
            echo "\t";
            if ($this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_VIEWER")) {
                // line 15
                echo "\t<li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_report", array("_format" => "html"));
                echo "\">Atemschutzgeräteträger</a>
\t\t";
                // line 16
                if ($this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_MANAGER")) {
                    // line 17
                    echo "\t\t<ul>
\t\t\t<li>
\t\t\t\t<a href=\"";
                    // line 19
                    echo $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_index");
                    echo "\">Liste</a>
\t\t\t<li>
\t\t\t\t<a href=\"";
                    // line 21
                    echo $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_new");
                    echo "\">Neu</a>
\t\t</ul>
\t\t";
                }
                // line 24
                echo "\t<li><a href=\"\">Berichte</a>
\t\t<ul>
\t\t\t<li><a id=\"menu_report_nachweis\" href=\"";
                // line 26
                echo $this->env->getExtension('routing')->getPath("report_search_nachweis");
                echo "\">Einsatz</a>
\t\t\t<li><a id=\"menu_report_year\" href=\"";
                // line 27
                echo $this->env->getExtension('routing')->getPath("report_select_year");
                echo "\">Jahresstatistik</a>
\t\t\t<li><a href=\"";
                // line 28
                echo $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_report", array("_format" => "pdf"));
                echo "\">Übersicht</a>
\t\t</ul>
\t";
            }
            // line 31
            echo "\t";
            if ($this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_ADMIN")) {
                // line 32
                echo "\t<li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("nachweisart_index");
                echo "\">Nachweisarten</a>
\t\t<ul>
\t\t\t<li><a href=\"";
                // line 34
                echo $this->env->getExtension('routing')->getPath("nachweisart_index");
                echo "\">Liste</a>
\t\t\t<li><a href=\"";
                // line 35
                echo $this->env->getExtension('routing')->getPath("nachweisart_new");
                echo "\">Neu</a>
\t\t</ul>
\t<li><a href=\"";
                // line 37
                echo $this->env->getExtension('routing')->getPath("einsatzart_index");
                echo "\">Einsatzarten</a>
\t\t<ul>
\t\t\t<li><a href=\"";
                // line 39
                echo $this->env->getExtension('routing')->getPath("einsatzart_index");
                echo "\">Liste</a>
\t\t\t<li><a href=\"";
                // line 40
                echo $this->env->getExtension('routing')->getPath("einsatzart_new");
                echo "\">Neu</a>
\t\t</ul>
\t";
            }
            // line 43
            echo "</ul>
";
        }
    }

    public function getTemplateName()
    {
        return "AtemschutzNachweisBundle:Default:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 62,  102 => 34,  250 => 99,  217 => 84,  211 => 81,  200 => 76,  671 => 267,  667 => 263,  662 => 262,  659 => 261,  653 => 257,  642 => 255,  639 => 254,  631 => 251,  624 => 247,  620 => 246,  617 => 245,  614 => 244,  607 => 240,  603 => 239,  600 => 238,  598 => 237,  592 => 234,  588 => 233,  580 => 228,  576 => 227,  568 => 222,  560 => 217,  556 => 216,  552 => 215,  548 => 214,  545 => 213,  541 => 212,  535 => 209,  531 => 208,  527 => 207,  523 => 206,  518 => 203,  514 => 201,  512 => 200,  506 => 196,  495 => 194,  492 => 193,  486 => 192,  481 => 189,  470 => 184,  467 => 183,  465 => 182,  459 => 179,  455 => 178,  452 => 177,  445 => 173,  441 => 172,  438 => 171,  436 => 170,  429 => 166,  421 => 161,  417 => 160,  404 => 157,  392 => 153,  390 => 152,  383 => 150,  380 => 149,  376 => 147,  369 => 144,  361 => 142,  351 => 136,  349 => 135,  343 => 131,  340 => 130,  336 => 128,  330 => 127,  326 => 125,  320 => 123,  318 => 122,  313 => 121,  307 => 119,  301 => 117,  292 => 114,  287 => 111,  284 => 110,  270 => 105,  257 => 101,  251 => 99,  245 => 97,  240 => 95,  236 => 94,  231 => 91,  223 => 87,  219 => 85,  213 => 83,  204 => 79,  192 => 75,  181 => 71,  172 => 68,  108 => 37,  124 => 46,  113 => 40,  308 => 123,  304 => 119,  299 => 116,  296 => 115,  290 => 113,  275 => 109,  272 => 108,  266 => 107,  259 => 104,  248 => 98,  244 => 97,  237 => 93,  233 => 91,  226 => 87,  206 => 77,  202 => 76,  198 => 77,  190 => 67,  174 => 67,  153 => 60,  146 => 57,  179 => 70,  170 => 66,  167 => 64,  161 => 60,  145 => 56,  110 => 39,  20 => 4,  289 => 100,  286 => 111,  280 => 108,  274 => 107,  269 => 91,  262 => 102,  255 => 100,  253 => 84,  243 => 96,  230 => 72,  228 => 71,  225 => 88,  222 => 86,  216 => 67,  210 => 65,  195 => 58,  180 => 61,  178 => 52,  175 => 69,  157 => 48,  148 => 46,  37 => 8,  96 => 30,  74 => 26,  191 => 70,  185 => 70,  134 => 51,  97 => 34,  83 => 20,  77 => 18,  65 => 23,  63 => 18,  58 => 15,  34 => 7,  76 => 25,  59 => 19,  53 => 16,  23 => 5,  239 => 107,  207 => 80,  197 => 97,  194 => 74,  155 => 67,  152 => 66,  150 => 52,  137 => 43,  131 => 51,  129 => 49,  118 => 44,  104 => 31,  100 => 32,  90 => 24,  81 => 26,  480 => 162,  474 => 185,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 162,  413 => 159,  409 => 158,  407 => 131,  402 => 130,  398 => 155,  393 => 126,  387 => 151,  384 => 121,  381 => 120,  379 => 119,  374 => 146,  368 => 112,  365 => 143,  362 => 110,  360 => 109,  355 => 138,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 105,  294 => 101,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 103,  258 => 86,  252 => 80,  247 => 98,  241 => 94,  235 => 75,  229 => 90,  224 => 71,  220 => 70,  214 => 82,  208 => 78,  169 => 59,  143 => 45,  140 => 57,  132 => 46,  128 => 48,  119 => 45,  111 => 39,  107 => 35,  71 => 21,  177 => 65,  165 => 58,  160 => 55,  139 => 49,  135 => 55,  126 => 43,  114 => 39,  84 => 26,  70 => 24,  67 => 19,  61 => 16,  47 => 11,  98 => 28,  93 => 34,  88 => 31,  78 => 27,  40 => 9,  94 => 28,  89 => 29,  85 => 25,  79 => 26,  75 => 22,  68 => 24,  56 => 15,  50 => 13,  27 => 7,  201 => 60,  196 => 75,  183 => 91,  171 => 81,  166 => 65,  163 => 66,  158 => 62,  156 => 54,  151 => 60,  142 => 44,  138 => 56,  136 => 47,  123 => 47,  121 => 43,  117 => 41,  115 => 40,  105 => 33,  101 => 35,  91 => 32,  69 => 21,  62 => 17,  49 => 11,  43 => 10,  32 => 7,  28 => 8,  87 => 23,  72 => 21,  66 => 19,  55 => 17,  44 => 10,  41 => 10,  25 => 3,  21 => 2,  46 => 11,  35 => 9,  31 => 7,  29 => 6,  38 => 9,  26 => 6,  24 => 6,  22 => 5,  19 => 4,  209 => 81,  203 => 76,  199 => 72,  193 => 73,  189 => 71,  187 => 66,  182 => 66,  176 => 68,  173 => 60,  168 => 58,  164 => 65,  162 => 56,  154 => 61,  149 => 53,  147 => 59,  144 => 58,  141 => 44,  133 => 50,  130 => 41,  125 => 48,  122 => 45,  116 => 42,  112 => 42,  109 => 39,  106 => 37,  103 => 34,  99 => 33,  95 => 32,  92 => 30,  86 => 25,  82 => 28,  80 => 24,  73 => 21,  64 => 21,  60 => 16,  57 => 15,  54 => 14,  51 => 13,  48 => 15,  45 => 14,  42 => 10,  39 => 12,  36 => 11,  33 => 9,  30 => 9,);
    }
}
