<?php

/* AtemschutzNachweisBundle:Atemschutzgeraetetraeger:report.html.twig */
class __TwigTemplate_54f8a36c8c070d4838ef5dc6a3aa02e3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AtemschutzNachweisBundle:Atemschutzgeraetetraeger:base.html.twig");

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
        return "AtemschutzNachweisBundle:Atemschutzgeraetetraeger:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "\t";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
\t";
        // line 11
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "f829c62_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f829c62_0") : $this->env->getExtension('assets')->getAssetUrl("css/f829c62_atemschutzgeraetetraeger.report_1.css");
            // line 15
            echo "\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t";
        } else {
            // asset "f829c62"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f829c62") : $this->env->getExtension('assets')->getAssetUrl("css/f829c62.css");
            echo "\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t";
        }
        unset($context["asset_url"]);
    }

    // line 19
    public function block_moduleTitle($context, array $blocks = array())
    {
        echo "Übersicht";
    }

    // line 21
    public function block_moduleActions($context, array $blocks = array())
    {
        // line 22
        echo "<ul class=\"inline\">
\t<li><a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_report", array("_format" => "pdf"));
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/pdf.png"), "html", null, true);
        echo "\" alt=\"PDF\" />PDF Export</a>
</ul>
";
    }

    // line 27
    public function block_moduleBody($context, array $blocks = array())
    {
        // line 28
        echo "
";
        // line 29
        if ((((twig_length_filter($this->env, (isset($context["tauglich0"]) ? $context["tauglich0"] : null)) == 0) && (twig_length_filter($this->env, (isset($context["tauglich1"]) ? $context["tauglich1"] : null)) == 0)) && (twig_length_filter($this->env, (isset($context["tauglich2"]) ? $context["tauglich2"] : null)) == 0))) {
            // line 30
            echo "<em>Keine Einträge gefunden.</em>
";
        } else {
            // line 32
            echo "<table id=\"report\">
\t<thead>
\t\t<tr>
\t\t\t<th class=\"untauglich\">Untauglich
\t\t\t<th class=\"tauglich\">Tauglich ATS 1
\t\t\t<th class=\"tauglich\">Tauglich ATS 2 (CSA)
\t\t<tr>
\t\t\t<th class=\"count untauglich\">";
            // line 39
            echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["tauglich0"]) ? $context["tauglich0"] : null)), "html", null, true);
            echo "
\t\t\t<th class=\"count tauglich\">";
            // line 40
            echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["tauglich1"]) ? $context["tauglich1"] : null)), "html", null, true);
            echo "
\t\t\t<th class=\"count tauglich\">";
            // line 41
            echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["tauglich2"]) ? $context["tauglich2"] : null)), "html", null, true);
            echo "
\t<tbody>
\t\t<tr>
\t\t\t<td class=\"untauglich\">
\t\t\t\t<ul>
\t\t\t\t\t";
            // line 46
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tauglich0"]) ? $context["tauglich0"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["atemschutzgeraetetraeger"]) {
                // line 47
                echo "\t\t\t\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_show", array("id" => $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getId", array(), "method"), "_format" => "html")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "html", null, true);
                echo "
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atemschutzgeraetetraeger'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "\t\t\t\t</ul>
\t\t\t<td class=\"tauglich\">
\t\t\t\t<ul>
\t\t\t\t\t";
            // line 52
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tauglich1"]) ? $context["tauglich1"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["atemschutzgeraetetraeger"]) {
                // line 53
                echo "\t\t\t\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_show", array("id" => $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getId", array(), "method"), "_format" => "html")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "html", null, true);
                echo "
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atemschutzgeraetetraeger'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "\t\t\t\t</ul>
\t\t\t<td class=\"tauglich\">
\t\t\t\t<ul>
\t\t\t\t\t";
            // line 58
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tauglich2"]) ? $context["tauglich2"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["atemschutzgeraetetraeger"]) {
                // line 59
                echo "\t\t\t\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_show", array("id" => $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getId", array(), "method"), "_format" => "html")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "html", null, true);
                echo "
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atemschutzgeraetetraeger'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "\t\t\t\t</ul>
</table>
";
        }
    }

    // line 66
    public function block_javascripts($context, array $blocks = array())
    {
        // line 67
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "AtemschutzNachweisBundle:Atemschutzgeraetetraeger:report.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  671 => 267,  667 => 263,  662 => 262,  659 => 261,  653 => 257,  642 => 255,  639 => 254,  631 => 251,  624 => 247,  620 => 246,  617 => 245,  614 => 244,  607 => 240,  603 => 239,  600 => 238,  598 => 237,  592 => 234,  588 => 233,  580 => 228,  576 => 227,  568 => 222,  560 => 217,  556 => 216,  552 => 215,  548 => 214,  545 => 213,  541 => 212,  535 => 209,  531 => 208,  527 => 207,  523 => 206,  518 => 203,  514 => 201,  512 => 200,  506 => 196,  495 => 194,  492 => 193,  486 => 192,  481 => 189,  470 => 184,  467 => 183,  465 => 182,  459 => 179,  455 => 178,  452 => 177,  445 => 173,  441 => 172,  438 => 171,  436 => 170,  429 => 166,  421 => 161,  417 => 160,  404 => 157,  392 => 153,  390 => 152,  383 => 150,  380 => 149,  376 => 147,  369 => 144,  361 => 142,  351 => 136,  349 => 135,  343 => 131,  340 => 130,  336 => 128,  330 => 127,  326 => 125,  320 => 123,  318 => 122,  313 => 121,  307 => 119,  301 => 117,  292 => 114,  287 => 111,  284 => 110,  270 => 105,  257 => 101,  251 => 99,  245 => 97,  240 => 95,  236 => 94,  231 => 91,  223 => 87,  219 => 85,  213 => 83,  204 => 79,  192 => 75,  181 => 71,  172 => 67,  108 => 32,  124 => 46,  113 => 40,  308 => 123,  304 => 119,  299 => 116,  296 => 115,  290 => 113,  275 => 109,  272 => 108,  266 => 107,  259 => 103,  248 => 98,  244 => 97,  237 => 93,  233 => 92,  226 => 88,  206 => 77,  202 => 76,  198 => 77,  190 => 67,  174 => 67,  153 => 60,  146 => 57,  179 => 70,  170 => 66,  167 => 64,  161 => 60,  145 => 52,  110 => 39,  20 => 4,  289 => 100,  286 => 111,  280 => 108,  274 => 107,  269 => 91,  262 => 102,  255 => 102,  253 => 84,  243 => 96,  230 => 72,  228 => 71,  225 => 88,  222 => 87,  216 => 67,  210 => 65,  195 => 58,  180 => 61,  178 => 52,  175 => 68,  157 => 48,  148 => 46,  37 => 8,  96 => 30,  74 => 22,  191 => 70,  185 => 66,  134 => 51,  97 => 31,  83 => 24,  77 => 18,  65 => 19,  63 => 18,  58 => 16,  34 => 7,  76 => 22,  59 => 16,  53 => 5,  23 => 5,  239 => 107,  207 => 80,  197 => 97,  194 => 74,  155 => 67,  152 => 66,  150 => 64,  137 => 43,  131 => 46,  129 => 47,  118 => 37,  104 => 31,  100 => 32,  90 => 24,  81 => 24,  480 => 162,  474 => 185,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 162,  413 => 159,  409 => 158,  407 => 131,  402 => 130,  398 => 155,  393 => 126,  387 => 151,  384 => 121,  381 => 120,  379 => 119,  374 => 146,  368 => 112,  365 => 143,  362 => 110,  360 => 109,  355 => 138,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 105,  294 => 101,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 103,  258 => 86,  252 => 80,  247 => 81,  241 => 77,  235 => 75,  229 => 90,  224 => 71,  220 => 70,  214 => 82,  208 => 78,  169 => 59,  143 => 45,  140 => 49,  132 => 51,  128 => 48,  119 => 38,  111 => 34,  107 => 35,  71 => 21,  177 => 69,  165 => 58,  160 => 55,  139 => 49,  135 => 55,  126 => 43,  114 => 37,  84 => 26,  70 => 21,  67 => 19,  61 => 16,  47 => 11,  98 => 28,  93 => 28,  88 => 27,  78 => 23,  40 => 9,  94 => 29,  89 => 29,  85 => 25,  79 => 23,  75 => 22,  68 => 20,  56 => 15,  50 => 13,  27 => 7,  201 => 60,  196 => 90,  183 => 91,  171 => 81,  166 => 65,  163 => 70,  158 => 62,  156 => 58,  151 => 59,  142 => 44,  138 => 56,  136 => 56,  123 => 47,  121 => 38,  117 => 41,  115 => 37,  105 => 33,  101 => 31,  91 => 28,  69 => 21,  62 => 17,  49 => 16,  43 => 10,  32 => 7,  28 => 8,  87 => 23,  72 => 16,  66 => 17,  55 => 18,  44 => 10,  41 => 9,  25 => 3,  21 => 2,  46 => 11,  35 => 9,  31 => 7,  29 => 6,  38 => 9,  26 => 6,  24 => 6,  22 => 5,  19 => 4,  209 => 81,  203 => 76,  199 => 72,  193 => 73,  189 => 56,  187 => 66,  182 => 66,  176 => 68,  173 => 60,  168 => 66,  164 => 59,  162 => 73,  154 => 54,  149 => 53,  147 => 58,  144 => 61,  141 => 44,  133 => 42,  130 => 41,  125 => 46,  122 => 45,  116 => 42,  112 => 42,  109 => 39,  106 => 33,  103 => 34,  99 => 30,  95 => 29,  92 => 34,  86 => 25,  82 => 20,  80 => 26,  73 => 21,  64 => 17,  60 => 16,  57 => 15,  54 => 14,  51 => 15,  48 => 13,  45 => 12,  42 => 10,  39 => 9,  36 => 11,  33 => 7,  30 => 7,);
    }
}
