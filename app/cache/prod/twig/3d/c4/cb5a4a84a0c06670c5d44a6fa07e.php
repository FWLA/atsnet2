<?php

/* AtemschutzCoreBundle:User:index.html.twig */
class __TwigTemplate_3dc4cb5a4a84a0c06670c5d44a6fa07e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AtemschutzCoreBundle:User:base.html.twig");

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
        return "AtemschutzCoreBundle:User:base.html.twig";
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
            // asset "eb4d3e0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_eb4d3e0_0") : $this->env->getExtension('assets')->getAssetUrl("css/eb4d3e0_style_1.css");
            // line 16
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t";
            // asset "eb4d3e0_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_eb4d3e0_1") : $this->env->getExtension('assets')->getAssetUrl("css/eb4d3e0_user.index_2.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t";
        } else {
            // asset "eb4d3e0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_eb4d3e0") : $this->env->getExtension('assets')->getAssetUrl("css/eb4d3e0.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t";
        }
        unset($context["asset_url"]);
    }

    // line 20
    public function block_moduleTitle($context, array $blocks = array())
    {
        echo "Übersicht";
    }

    // line 22
    public function block_moduleBody($context, array $blocks = array())
    {
        // line 23
        echo "
";
        // line 24
        if ((twig_length_filter($this->env, (isset($context["users"]) ? $context["users"] : null)) == 0)) {
            // line 25
            echo "<em>Keine Benutzer angelegt.</em>
";
        } else {
            // line 27
            echo "<table id=\"user_table\" class=\"tablesorter\">
\t<thead>
\t\t<tr>
\t\t\t<th>Nachname<img src=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Vorname<img src=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Email<img src=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Organisation<img src=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Rollen<img src=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Aktiv
\t\t\t<th>
\t<tbody>
\t\t";
            // line 38
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 39
                echo "\t\t<tr>
\t\t\t<td>";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getLastname", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getFirstname", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getEmail", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getOrganisation", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 44
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getNamedRoles", array(), "method")) == 1)) {
                    // line 45
                    echo "\t\t\t\t\t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getNamedRoles"));
                    foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                        // line 46
                        echo "\t\t\t\t\t";
                        echo twig_escape_filter($this->env, (isset($context["role"]) ? $context["role"] : null), "html", null, true);
                        echo "
\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 48
                    echo "\t\t\t\t";
                } else {
                    // line 49
                    echo "\t\t\t\t\t<span class=\"roles\" title=\"<ul>";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getNamedRoles", array(), "method"));
                    foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                        echo "<li>";
                        echo twig_escape_filter($this->env, (isset($context["role"]) ? $context["role"] : null), "html", null, true);
                        echo "</li>";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    echo "</ul>\">Mehrere Rollen</span>
\t\t\t\t";
                }
                // line 51
                echo "\t\t\t<td>
\t\t\t\t";
                // line 52
                if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "isAllowedToEdit", array(0 => (isset($context["user"]) ? $context["user"] : null)), "method")) {
                    // line 53
                    echo "\t\t\t\t<ul class=\"action_menu\">
\t\t\t\t\t<li><a href=\"";
                    // line 54
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_status", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getId", array(), "method"))), "html", null, true);
                    echo "\">
\t\t\t\t\t\t";
                    // line 55
                    if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getIsActive", array(), "method") == true)) {
                        // line 56
                        echo "\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/tick.png"), "html", null, true);
                        echo "\" alt=\"Ja\" />
\t\t\t\t\t\t";
                    } else {
                        // line 58
                        echo "\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/delete.png"), "html", null, true);
                        echo "\" alt=\"Nein\" />
\t\t\t\t\t\t";
                    }
                    // line 60
                    echo "\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</a>
\t\t\t\t</ul>
\t\t\t\t";
                } else {
                    // line 64
                    echo "\t\t\t\t\t";
                    if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getIsActive", array(), "method") == true)) {
                        // line 65
                        echo "\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/tick.png"), "html", null, true);
                        echo "\" alt=\"Ja\" />
\t\t\t\t\t";
                    } else {
                        // line 67
                        echo "\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/delete.png"), "html", null, true);
                        echo "\" alt=\"Nein\" />
\t\t\t\t\t";
                    }
                    // line 69
                    echo "\t\t\t\t";
                }
                // line 70
                echo "\t\t\t<td>
\t\t\t\t";
                // line 71
                if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "isAllowedToEdit", array(0 => (isset($context["user"]) ? $context["user"] : null)), "method")) {
                    // line 72
                    echo "\t\t\t\t<ul class=\"action_menu\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t<img src=\"";
                    // line 75
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/gear.png"), "html", null, true);
                    echo "\" alt=\"Optionen\" />
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</a>
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                    // line 80
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_edit", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getId", array(), "method"))), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t<img src=\"";
                    // line 81
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/edit.png"), "html", null, true);
                    echo "\" alt=\"Bearbeiten\" />
\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
                    // line 84
                    if ($this->env->getExtension('security')->isGranted("ROLE_CORE_ADMIN")) {
                        // line 85
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a class=\"delete\" href=\"";
                        // line 86
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_delete", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getId", array(), "method"))), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t<img src=\"";
                        // line 87
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/delete.png"), "html", null, true);
                        echo "\" alt=\"Löschen\" />
\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
                    }
                    // line 91
                    echo "\t\t\t\t\t</ul>
\t\t\t\t</ul>
\t\t\t\t";
                }
                // line 94
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "</table>
";
        }
    }

    // line 99
    public function block_javascripts($context, array $blocks = array())
    {
        // line 100
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 101
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "1a3a9ed_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1a3a9ed_0") : $this->env->getExtension('assets')->getAssetUrl("js/1a3a9ed_jquery.tablesorter.min_1.js");
            // line 105
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
            // asset "1a3a9ed_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1a3a9ed_1") : $this->env->getExtension('assets')->getAssetUrl("js/1a3a9ed_user.index_2.js");
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
        } else {
            // asset "1a3a9ed"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1a3a9ed") : $this->env->getExtension('assets')->getAssetUrl("js/1a3a9ed.js");
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "AtemschutzCoreBundle:User:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  289 => 100,  286 => 99,  280 => 95,  274 => 94,  269 => 91,  262 => 87,  255 => 85,  253 => 84,  243 => 80,  230 => 72,  228 => 71,  225 => 70,  222 => 69,  216 => 67,  210 => 65,  195 => 58,  180 => 53,  178 => 52,  175 => 51,  157 => 48,  148 => 46,  37 => 8,  96 => 26,  74 => 22,  191 => 70,  185 => 66,  134 => 42,  97 => 31,  83 => 20,  77 => 18,  65 => 20,  63 => 18,  58 => 15,  34 => 7,  76 => 25,  59 => 17,  53 => 5,  23 => 2,  239 => 107,  207 => 64,  197 => 97,  194 => 71,  155 => 67,  152 => 66,  150 => 49,  137 => 43,  131 => 55,  129 => 41,  118 => 38,  104 => 32,  100 => 35,  90 => 27,  81 => 23,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 105,  294 => 101,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 86,  252 => 80,  247 => 81,  241 => 77,  235 => 75,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 59,  143 => 45,  140 => 59,  132 => 51,  128 => 49,  119 => 38,  111 => 34,  107 => 33,  71 => 21,  177 => 65,  165 => 64,  160 => 49,  139 => 50,  135 => 57,  126 => 40,  114 => 42,  84 => 24,  70 => 26,  67 => 25,  61 => 16,  47 => 12,  98 => 28,  93 => 27,  88 => 22,  78 => 22,  40 => 9,  94 => 22,  89 => 22,  85 => 25,  79 => 26,  75 => 22,  68 => 24,  56 => 15,  50 => 16,  27 => 4,  201 => 60,  196 => 90,  183 => 54,  171 => 81,  166 => 71,  163 => 70,  158 => 54,  156 => 58,  151 => 57,  142 => 44,  138 => 43,  136 => 56,  123 => 47,  121 => 46,  117 => 44,  115 => 37,  105 => 33,  101 => 31,  91 => 31,  69 => 21,  62 => 17,  49 => 16,  43 => 10,  32 => 7,  28 => 8,  87 => 20,  72 => 20,  66 => 19,  55 => 18,  44 => 10,  41 => 10,  25 => 3,  21 => 2,  46 => 11,  35 => 7,  31 => 7,  29 => 7,  38 => 9,  26 => 6,  24 => 7,  22 => 5,  19 => 1,  209 => 82,  203 => 76,  199 => 72,  193 => 73,  189 => 56,  187 => 55,  182 => 66,  176 => 64,  173 => 60,  168 => 66,  164 => 59,  162 => 55,  154 => 54,  149 => 51,  147 => 58,  144 => 61,  141 => 44,  133 => 42,  130 => 41,  125 => 40,  122 => 39,  116 => 36,  112 => 42,  109 => 34,  106 => 33,  103 => 32,  99 => 31,  95 => 30,  92 => 33,  86 => 25,  82 => 22,  80 => 24,  73 => 19,  64 => 17,  60 => 19,  57 => 18,  54 => 14,  51 => 13,  48 => 13,  45 => 11,  42 => 10,  39 => 9,  36 => 11,  33 => 7,  30 => 9,);
    }
}
