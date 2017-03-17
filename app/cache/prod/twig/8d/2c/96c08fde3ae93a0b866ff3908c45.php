<?php

/* AtemschutzCoreBundle::base.html.twig */
class __TwigTemplate_8d2c96c08fde3ae93a0b866ff3908c45 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'bundleBody' => array($this, 'block_bundleBody'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "ATS.net 2";
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
            // asset "63092a1_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_63092a1_0") : $this->env->getExtension('assets')->getAssetUrl("css/63092a1_cssgrids_1.css");
            // line 17
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t";
            // asset "63092a1_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_63092a1_1") : $this->env->getExtension('assets')->getAssetUrl("css/63092a1_jquery-ui_2.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t";
            // asset "63092a1_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_63092a1_2") : $this->env->getExtension('assets')->getAssetUrl("css/63092a1_style_3.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t";
        } else {
            // asset "63092a1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_63092a1") : $this->env->getExtension('assets')->getAssetUrl("css/63092a1.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t";
        }
        unset($context["asset_url"]);
    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        // line 22
        echo "\t<div id=\"body\">
\t\t<div id=\"content_body\">
\t\t\t<header>
\t\t\t\t<div class=\"yui3-g\">
\t\t\t\t\t<div id=\"header\">
\t\t\t\t\t\t<div class=\"yui3-u-3-4\">
\t\t\t\t\t\t\t<h1>
\t\t\t\t\t\t\t\t<a id=\"logo\" href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("default_home");
        echo "\"></a>
\t\t\t\t\t\t\t</h1>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"yui3-u-1-4\">
\t\t\t\t\t\t\t<div id=\"user_information\">
\t\t\t\t\t\t\t\t";
        // line 34
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 35
            echo "\t\t\t\t\t\t\t\t<div id=\"user_menu\">
\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t<button id=\"user_button\">";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "html", null, true);
            echo "</button>
\t\t\t\t\t\t\t\t\t\t<button id=\"user_select_action\">Auswählen</button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 41
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\">Abmelden</a></li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 45
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</header>
\t\t
\t\t\t<div id=\"content-wrapper\">
\t\t\t\t<div class=\"yui3-g\">
\t\t\t\t\t<div class=\"yui3-u-1-5\">
\t\t\t\t\t\t";
        // line 54
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 55
            echo "\t\t\t\t\t\t<div id=\"menu\">
\t\t\t\t\t\t\t<h2>Menü</h2>
\t\t\t\t\t\t\t";
            // line 57
            $this->env->loadTemplate("AtemschutzCoreBundle:Default:menu.html.twig")->display($context);
            // line 58
            echo "\t\t\t\t\t\t\t";
            $this->env->loadTemplate("AtemschutzNachweisBundle:Default:menu.html.twig")->display($context);
            // line 59
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 61
        echo "\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"yui3-u-4-5\">
\t\t\t\t\t\t<div id=\"content\">
\t\t\t\t\t\t\t";
        // line 65
        $this->env->loadTemplate("AtemschutzCoreBundle:Default:flash.html.twig")->display($context);
        // line 66
        echo "\t\t\t\t\t\t\t";
        $this->displayBlock('bundleBody', $context, $blocks);
        // line 67
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<footer>
\t\t\t<div id=\"footer_content\">
\t\t\t\t<div id=\"footer_info\">
\t\t\t\t\t<div class=\"yui3-g\">
\t\t\t\t\t\t<div class=\"yui3-u-1-4\">
\t\t\t\t\t\t\t<div class=\"version\">Version 2.0.7</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"yui3-u-1-2\">
\t\t\t\t\t\t\t<div class=\"copyright\">Copyright 2012 - ";
        // line 81
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " Benjamin Ihrig</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"yui3-u-1-4\">
\t\t\t\t\t\t\t<div class=\"bugtracker\">
\t\t\t\t\t\t\t\t<a href=\"http://bug.atsnet.org\" target=\"_blank\">Bugtracker</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</footer>
\t</div>
\t
";
    }

    // line 66
    public function block_bundleBody($context, array $blocks = array())
    {
    }

    // line 96
    public function block_javascripts($context, array $blocks = array())
    {
        // line 97
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t
\t";
        // line 99
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "188f81e_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_188f81e_0") : $this->env->getExtension('assets')->getAssetUrl("js/188f81e_jquery-1.9.1_1.js");
            // line 105
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
            // asset "188f81e_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_188f81e_1") : $this->env->getExtension('assets')->getAssetUrl("js/188f81e_jquery-ui.custom_2.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
            // asset "188f81e_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_188f81e_2") : $this->env->getExtension('assets')->getAssetUrl("js/188f81e_script_3.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
            // asset "188f81e_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_188f81e_3") : $this->env->getExtension('assets')->getAssetUrl("js/188f81e_menu_4.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
        } else {
            // asset "188f81e"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_188f81e") : $this->env->getExtension('assets')->getAssetUrl("js/188f81e.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
        }
        unset($context["asset_url"]);
        // line 107
        echo "\t
";
    }

    public function getTemplateName()
    {
        return "AtemschutzCoreBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 107,  207 => 105,  197 => 97,  194 => 96,  155 => 67,  152 => 66,  150 => 65,  137 => 58,  131 => 55,  129 => 54,  118 => 45,  104 => 37,  100 => 35,  90 => 29,  81 => 22,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 56,  140 => 59,  132 => 51,  128 => 49,  119 => 42,  111 => 41,  107 => 36,  71 => 17,  177 => 65,  165 => 64,  160 => 61,  139 => 50,  135 => 57,  126 => 45,  114 => 42,  84 => 28,  70 => 20,  67 => 15,  61 => 13,  47 => 9,  98 => 34,  93 => 28,  88 => 6,  78 => 21,  40 => 8,  94 => 22,  89 => 20,  85 => 25,  79 => 18,  75 => 23,  68 => 14,  56 => 9,  50 => 17,  27 => 4,  201 => 92,  196 => 90,  183 => 70,  171 => 81,  166 => 71,  163 => 70,  158 => 67,  156 => 58,  151 => 57,  142 => 59,  138 => 57,  136 => 56,  123 => 47,  121 => 46,  117 => 44,  115 => 43,  105 => 40,  101 => 32,  91 => 31,  69 => 25,  62 => 23,  49 => 19,  43 => 8,  32 => 7,  28 => 3,  87 => 20,  72 => 16,  66 => 24,  55 => 15,  44 => 12,  41 => 10,  25 => 3,  21 => 2,  46 => 11,  35 => 5,  31 => 4,  29 => 3,  38 => 9,  26 => 6,  24 => 3,  22 => 1,  19 => 1,  209 => 82,  203 => 99,  199 => 67,  193 => 73,  189 => 66,  187 => 84,  182 => 66,  176 => 64,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 58,  144 => 61,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 36,  112 => 42,  109 => 41,  106 => 33,  103 => 37,  99 => 30,  95 => 34,  92 => 33,  86 => 28,  82 => 22,  80 => 41,  73 => 19,  64 => 14,  60 => 13,  57 => 11,  54 => 10,  51 => 14,  48 => 8,  45 => 8,  42 => 7,  39 => 9,  36 => 5,  33 => 4,  30 => 7,);
    }
}
