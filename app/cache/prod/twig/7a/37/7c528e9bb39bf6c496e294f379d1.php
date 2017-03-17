<?php

/* AtemschutzCoreBundle:Organisation:index.html.twig */
class __TwigTemplate_7a377c528e9bb39bf6c496e294f379d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AtemschutzCoreBundle:Organisation:base.html.twig");

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
        if ((twig_length_filter($this->env, (isset($context["organisations"]) ? $context["organisations"] : null)) == 0)) {
            // line 24
            echo "<em>Keine Organisationen angelegt.</em>
";
        } else {
            // line 26
            echo "<table id=\"organisation_table\" class=\"tablesorter\">
\t<thead>
\t\t<tr>
\t\t\t<th>Name<img src=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Adresse<img src=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Adresszusatz<img src=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>PLZ<img src=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Ort<img src=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>Telefon<img src=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t<th>
\t<tbody>
\t\t";
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["organisations"]) ? $context["organisations"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["organisation"]) {
                // line 38
                echo "\t\t<tr>
\t\t\t<td>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organisation"]) ? $context["organisation"] : null), "getName", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organisation"]) ? $context["organisation"] : null), "getAddress1", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organisation"]) ? $context["organisation"] : null), "getAddress2", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organisation"]) ? $context["organisation"] : null), "getPLZ", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organisation"]) ? $context["organisation"] : null), "getOrt", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>";
                // line 44
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organisation"]) ? $context["organisation"] : null), "getTelefon", array(), "method"), "html", null, true);
                echo "
\t\t\t<td>
\t\t\t\t<ul class=\"action_menu\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t<img src=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/gear.png"), "html", null, true);
                echo "\" alt=\"Optionen\" />
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</a>
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("organisation_edit", array("id" => $this->getAttribute((isset($context["organisation"]) ? $context["organisation"] : null), "getId", array(), "method"))), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t<img src=\"";
                // line 55
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/edit.png"), "html", null, true);
                echo "\" alt=\"Bearbeiten\" />
\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a class=\"delete\" href=\"";
                // line 59
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("organisation_delete", array("id" => $this->getAttribute((isset($context["organisation"]) ? $context["organisation"] : null), "getId", array(), "method"))), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t<img src=\"";
                // line 60
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/delete.png"), "html", null, true);
                echo "\" alt=\"Löschen\" />
\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t</ul>
\t\t\t\t</ul>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['organisation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "</table>
";
        }
    }

    // line 70
    public function block_javascripts($context, array $blocks = array())
    {
        // line 71
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 72
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "1b643b1_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1b643b1_0") : $this->env->getExtension('assets')->getAssetUrl("js/1b643b1_jquery.tablesorter.min_1.js");
            // line 76
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
            // asset "1b643b1_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1b643b1_1") : $this->env->getExtension('assets')->getAssetUrl("js/1b643b1_organisation.index_2.js");
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
        } else {
            // asset "1b643b1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1b643b1") : $this->env->getExtension('assets')->getAssetUrl("js/1b643b1.js");
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "AtemschutzCoreBundle:Organisation:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 70,  185 => 66,  134 => 42,  97 => 31,  83 => 20,  77 => 18,  65 => 23,  63 => 18,  58 => 16,  34 => 7,  76 => 25,  59 => 16,  53 => 5,  23 => 1,  239 => 107,  207 => 105,  197 => 97,  194 => 71,  155 => 67,  152 => 66,  150 => 49,  137 => 58,  131 => 55,  129 => 54,  118 => 45,  104 => 37,  100 => 35,  90 => 24,  81 => 22,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 59,  143 => 56,  140 => 59,  132 => 51,  128 => 49,  119 => 38,  111 => 41,  107 => 36,  71 => 17,  177 => 65,  165 => 64,  160 => 61,  139 => 50,  135 => 57,  126 => 40,  114 => 42,  84 => 26,  70 => 20,  67 => 15,  61 => 13,  47 => 12,  98 => 28,  93 => 30,  88 => 6,  78 => 23,  40 => 9,  94 => 22,  89 => 29,  85 => 25,  79 => 26,  75 => 22,  68 => 24,  56 => 15,  50 => 15,  27 => 4,  201 => 92,  196 => 90,  183 => 70,  171 => 81,  166 => 71,  163 => 70,  158 => 54,  156 => 58,  151 => 57,  142 => 44,  138 => 43,  136 => 56,  123 => 47,  121 => 46,  117 => 44,  115 => 37,  105 => 33,  101 => 32,  91 => 31,  69 => 21,  62 => 17,  49 => 19,  43 => 10,  32 => 7,  28 => 3,  87 => 20,  72 => 21,  66 => 19,  55 => 15,  44 => 10,  41 => 10,  25 => 3,  21 => 2,  46 => 11,  35 => 7,  31 => 4,  29 => 5,  38 => 9,  26 => 6,  24 => 3,  22 => 1,  19 => 1,  209 => 82,  203 => 76,  199 => 72,  193 => 73,  189 => 66,  187 => 84,  182 => 66,  176 => 64,  173 => 60,  168 => 66,  164 => 59,  162 => 55,  154 => 54,  149 => 51,  147 => 58,  144 => 61,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 39,  116 => 36,  112 => 42,  109 => 34,  106 => 33,  103 => 37,  99 => 30,  95 => 27,  92 => 33,  86 => 28,  82 => 22,  80 => 24,  73 => 19,  64 => 10,  60 => 13,  57 => 11,  54 => 14,  51 => 13,  48 => 8,  45 => 8,  42 => 10,  39 => 9,  36 => 5,  33 => 7,  30 => 7,);
    }
}
