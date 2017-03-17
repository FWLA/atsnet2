<?php

/* AtemschutzNachweisBundle:Nachweisart:index.html.twig */
class __TwigTemplate_9c0d629dd1428080b6afe26fc996e44c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AtemschutzNachweisBundle:Nachweisart:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'moduleTitle' => array($this, 'block_moduleTitle'),
            'moduleBody' => array($this, 'block_moduleBody'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AtemschutzNachweisBundle:Nachweisart:base.html.twig";
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
            // asset "56595eb_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_56595eb_0") : $this->env->getExtension('assets')->getAssetUrl("css/56595eb_style_1.css");
            // line 15
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t";
        } else {
            // asset "56595eb"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_56595eb") : $this->env->getExtension('assets')->getAssetUrl("css/56595eb.css");
            echo "\t\t<link href=\"";
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
    public function block_moduleBody($context, array $blocks = array())
    {
        // line 22
        echo "
";
        // line 23
        if ((twig_length_filter($this->env, (isset($context["nachweisarts"]) ? $context["nachweisarts"] : null)) == 0)) {
            // line 24
            echo "<em>Keine Nachweisarten angelegt.</em>
";
        } else {
            // line 26
            echo "<table id=\"nachweisart_table\" class=\"tablesorter\">
\t<thead>
\t\t<tr>
\t\t\t<th>Name<img src=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Vorraussetzung<img src=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Gültigkeit<img src=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>
\t<tbody>
\t\t";
            // line 34
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["nachweisarts"]) ? $context["nachweisarts"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["nachweisart"]) {
                // line 35
                echo "\t\t<tr>
\t\t\t<td>";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nachweisart"]) ? $context["nachweisart"] : null), "getName", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nachweisart"]) ? $context["nachweisart"] : null), "getRequiredForTitle", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nachweisart"]) ? $context["nachweisart"] : null), "getTimeValid", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>
\t\t\t\t<ul class=\"action_menu\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t<img src=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/gear.png"), "html", null, true);
                echo "\" alt=\"Optionen\" />
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</a>
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                // line 48
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("nachweisart_edit", array("id" => $this->getAttribute((isset($context["nachweisart"]) ? $context["nachweisart"] : null), "getId", array(), "method"))), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t<img src=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/edit.png"), "html", null, true);
                echo "\" alt=\"Bearbeiten\" />
\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a class=\"delete\" href=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("nachweisart_delete", array("id" => $this->getAttribute((isset($context["nachweisart"]) ? $context["nachweisart"] : null), "getId", array(), "method"))), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t<img src=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/delete.png"), "html", null, true);
                echo "\" alt=\"Löschen\" />
\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t</ul>
\t\t\t\t</ul>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nachweisart'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "</table>
";
        }
    }

    // line 64
    public function block_javascripts($context, array $blocks = array())
    {
        // line 65
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 66
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "9c5a756_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9c5a756_0") : $this->env->getExtension('assets')->getAssetUrl("js/9c5a756_jquery.tablesorter.min_1.js");
            // line 70
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
            // asset "9c5a756_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9c5a756_1") : $this->env->getExtension('assets')->getAssetUrl("js/9c5a756_nachweisart.index_2.js");
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
        } else {
            // asset "9c5a756"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9c5a756") : $this->env->getExtension('assets')->getAssetUrl("js/9c5a756.js");
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "AtemschutzNachweisBundle:Nachweisart:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 70,  170 => 65,  167 => 64,  161 => 60,  145 => 53,  110 => 36,  20 => 4,  289 => 100,  286 => 99,  280 => 95,  274 => 94,  269 => 91,  262 => 87,  255 => 85,  253 => 84,  243 => 80,  230 => 72,  228 => 71,  225 => 70,  222 => 69,  216 => 67,  210 => 65,  195 => 58,  180 => 53,  178 => 52,  175 => 66,  157 => 48,  148 => 46,  37 => 8,  96 => 26,  74 => 22,  191 => 70,  185 => 66,  134 => 48,  97 => 31,  83 => 20,  77 => 18,  65 => 23,  63 => 18,  58 => 16,  34 => 7,  76 => 25,  59 => 16,  53 => 5,  23 => 5,  239 => 107,  207 => 64,  197 => 97,  194 => 71,  155 => 67,  152 => 66,  150 => 49,  137 => 43,  131 => 55,  129 => 41,  118 => 38,  104 => 32,  100 => 35,  90 => 24,  81 => 26,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 105,  294 => 101,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 86,  252 => 80,  247 => 81,  241 => 77,  235 => 75,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 59,  143 => 45,  140 => 59,  132 => 51,  128 => 49,  119 => 38,  111 => 34,  107 => 35,  71 => 21,  177 => 65,  165 => 64,  160 => 49,  139 => 50,  135 => 57,  126 => 43,  114 => 37,  84 => 26,  70 => 21,  67 => 25,  61 => 16,  47 => 12,  98 => 28,  93 => 30,  88 => 22,  78 => 23,  40 => 9,  94 => 22,  89 => 29,  85 => 25,  79 => 26,  75 => 22,  68 => 24,  56 => 15,  50 => 15,  27 => 7,  201 => 60,  196 => 90,  183 => 54,  171 => 81,  166 => 71,  163 => 70,  158 => 54,  156 => 58,  151 => 57,  142 => 44,  138 => 49,  136 => 56,  123 => 47,  121 => 46,  117 => 44,  115 => 37,  105 => 33,  101 => 31,  91 => 31,  69 => 21,  62 => 17,  49 => 16,  43 => 10,  32 => 7,  28 => 8,  87 => 20,  72 => 21,  66 => 19,  55 => 18,  44 => 10,  41 => 10,  25 => 3,  21 => 2,  46 => 11,  35 => 7,  31 => 7,  29 => 6,  38 => 9,  26 => 6,  24 => 6,  22 => 5,  19 => 4,  209 => 82,  203 => 76,  199 => 72,  193 => 73,  189 => 56,  187 => 55,  182 => 66,  176 => 64,  173 => 60,  168 => 66,  164 => 59,  162 => 55,  154 => 54,  149 => 54,  147 => 58,  144 => 61,  141 => 44,  133 => 42,  130 => 41,  125 => 40,  122 => 39,  116 => 36,  112 => 42,  109 => 34,  106 => 33,  103 => 34,  99 => 31,  95 => 27,  92 => 33,  86 => 25,  82 => 22,  80 => 24,  73 => 22,  64 => 17,  60 => 16,  57 => 15,  54 => 14,  51 => 13,  48 => 13,  45 => 11,  42 => 10,  39 => 9,  36 => 11,  33 => 7,  30 => 9,);
    }
}
