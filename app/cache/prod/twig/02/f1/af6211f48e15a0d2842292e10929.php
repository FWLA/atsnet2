<?php

/* AtemschutzNachweisBundle:Atemschutzgeraetetraeger:show.html.twig */
class __TwigTemplate_02f1af6211f48e15a0d2842292e10929 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "html", null, true);
    }

    // line 21
    public function block_moduleActions($context, array $blocks = array())
    {
        // line 22
        if ($this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_MANAGER")) {
            // line 23
            echo "<ul class=\"inline\">
\t<li><a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_edit", array("id" => $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getId", array(), "method"))), "html", null, true);
            echo "\">Bearbeiten</a>
\t";
            // line 25
            if (($this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getUser", array(), "method") == null)) {
                // line 26
                echo "\t<li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_new_atsgt", array("id" => $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getId", array(), "method"))), "html", null, true);
                echo "\">Login erzeugen</a>
\t";
            } else {
                // line 28
                echo "\t<li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getUser", array(), "method"), "getId", array(), "method"))), "html", null, true);
                echo "\">Login bearbeiten</a>
\t";
            }
            // line 30
            echo "\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("g26_new", array("atemschutzgeraetetraegerId" => $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getId", array(), "method"))), "html", null, true);
            echo "\">Neue G26</a>
\t<li><a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("nachweis_new", array("atemschutzgeraetetraegerId" => $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getId", array(), "method"))), "html", null, true);
            echo "\">Neuer Nachweis</a>
\t<li><a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("atemschutzgeraetetraeger_show", array("id" => $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getId", array(), "method"), "_format" => "pdf")), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/pdf.png"), "html", null, true);
            echo "\" alt=\"PDF\" />PDF Export</a>
</ul>
";
        }
    }

    // line 37
    public function block_moduleBody($context, array $blocks = array())
    {
        // line 38
        echo "
<div id=\"atemschutzgeraetetraeger_accordion\">
\t<h3>Persönliche Daten</h3>
\t<div>
\t\t<table>
\t\t\t<tbody>
\t\t\t\t<tr>
\t\t\t\t\t<th>Name
\t\t\t\t\t<td>";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getFirstname", array(), "method"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getLastname", array(), "method"), "html", null, true);
        echo "
\t\t\t\t<tr>
\t\t\t\t\t<th>Geburtsdatum
\t\t\t\t\t<td>";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getBirthdateFormatted", array(), "method"), "html", null, true);
        echo "
\t\t\t\t<tr>
\t\t\t\t\t<th>Organisation
\t\t\t\t\t<td>";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getOrganisation", array(), "method"), "html", null, true);
        echo "
\t\t</table>
\t</div>
\t
\t<h3>Atemschutz Daten</h3>
\t<div>
\t\t<h4>Lehrgänge</h4>
\t\t<table>
\t\t\t<tbody>
\t\t\t\t<tr>
\t\t\t\t\t<td>";
        // line 62
        if (($this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getAts1", array(), "method") != null)) {
            // line 63
            echo "\t\t\t\t\t\t<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/32x32/tick.png"), "html", null, true);
            echo "\" alt=\"Ja\" />
\t\t\t\t\t\t";
        } else {
            // line 65
            echo "\t\t\t\t\t\t<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/32x32/delete.png"), "html", null, true);
            echo "\" alt=\"Nein\" />
\t\t\t\t\t\t";
        }
        // line 67
        echo "\t\t\t\t\t<th>Atemschutzgeräteträgerlehrgang 1
\t\t\t\t\t<td>";
        // line 68
        if (($this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getAts1", array(), "method") == null)) {
            // line 69
            echo "\t\t\t\t\t\t<em>Nicht vorhanden</em>
\t\t\t\t\t\t";
        } else {
            // line 71
            echo "\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getAts1Formatted", array(), "method"), "html", null, true);
            echo "
\t\t\t\t\t\t";
        }
        // line 73
        echo "\t\t\t\t<tr>
\t\t\t\t\t<td>";
        // line 74
        if (($this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getAts2", array(), "method") != null)) {
            // line 75
            echo "\t\t\t\t\t\t<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/32x32/tick.png"), "html", null, true);
            echo "\" alt=\"Ja\" />
\t\t\t\t\t\t";
        } else {
            // line 77
            echo "\t\t\t\t\t\t<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/32x32/delete.png"), "html", null, true);
            echo "\" alt=\"Nein\" />
\t\t\t\t\t\t";
        }
        // line 79
        echo "\t\t\t\t\t<th>Atemschutzgeräteträgerlehrgang 2 (CSA)
\t\t\t\t\t<td>";
        // line 80
        if (($this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getAts2", array(), "method") == null)) {
            // line 81
            echo "\t\t\t\t\t<em>Nicht vorhanden</em>
\t\t\t\t\t";
        } else {
            // line 83
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getAts2Formatted", array(), "method"), "html", null, true);
            echo "
\t\t\t\t\t";
        }
        // line 85
        echo "\t\t</table>
\t\t
\t\t";
        // line 87
        if ((($this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getAts1", array(), "method") != null) && ((twig_length_filter($this->env, $this->getAttribute((isset($context["info"]) ? $context["info"] : null), "getRequiredsForAts1", array(), "method")) > 0) || (twig_length_filter($this->env, $this->getAttribute((isset($context["info"]) ? $context["info"] : null), "getRequiredsForAts2", array(), "method")) > 0)))) {
            // line 88
            echo "\t\t\t<h4>Aktuelle Nachweise</h4>
\t\t\t
\t\t\t";
            // line 90
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["info"]) ? $context["info"] : null), "getRequiredsForAts1", array(), "method")) > 0)) {
                // line 91
                echo "\t\t\t\t<h5>Atemschutz 1</h5>
\t\t\t\t<table>
\t\t\t\t\t<tbody>
\t\t\t\t\t\t";
                // line 94
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["info"]) ? $context["info"] : null), "getRequiredsForAts1", array(), "method"));
                foreach ($context['_seq'] as $context["_key"] => $context["nachweisinfo"]) {
                    // line 95
                    echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
                    // line 96
                    if ((($this->getAttribute((isset($context["nachweisinfo"]) ? $context["nachweisinfo"] : null), "getNachweis", array(), "method") != null) && $this->getAttribute($this->getAttribute((isset($context["nachweisinfo"]) ? $context["nachweisinfo"] : null), "getNachweis", array(), "method"), "isValid", array(), "method"))) {
                        // line 97
                        echo "\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/32x32/tick.png"), "html", null, true);
                        echo "\" alt=\"Ja\" />
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 99
                        echo "\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/32x32/delete.png"), "html", null, true);
                        echo "\" alt=\"Nein\" />
\t\t\t\t\t\t\t\t";
                    }
                    // line 101
                    echo "\t\t\t\t\t\t\t<th>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nachweisinfo"]) ? $context["nachweisinfo"] : null), "getNachweisart", array(), "method"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t<td>";
                    // line 102
                    if (($this->getAttribute((isset($context["nachweisinfo"]) ? $context["nachweisinfo"] : null), "getNachweis", array(), "method") != null)) {
                        // line 103
                        echo "\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["nachweisinfo"]) ? $context["nachweisinfo"] : null), "getNachweis", array(), "method"), "getDateFormatted", array(), "method"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 105
                        echo "\t\t\t\t\t\t\t\tNicht erbracht.
\t\t\t\t\t\t\t\t";
                    }
                    // line 107
                    echo "\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nachweisinfo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 108
                echo "\t\t\t\t</table>
\t\t\t";
            }
            // line 110
            echo "\t\t\t";
            if ((($this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getAts2", array(), "method") != null) && ($this->getAttribute((isset($context["info"]) ? $context["info"] : null), "getRequiredsForAts2", array(), "method") > 0))) {
                // line 111
                echo "\t\t\t\t<h5>Atemschutz 2 (CSA)</h5>
\t\t\t\t<table>
\t\t\t\t\t<tbody>
\t\t\t\t\t\t";
                // line 114
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["info"]) ? $context["info"] : null), "getRequiredsForAts2", array(), "method"));
                foreach ($context['_seq'] as $context["_key"] => $context["nachweisinfo"]) {
                    // line 115
                    echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
                    // line 116
                    if ((($this->getAttribute((isset($context["nachweisinfo"]) ? $context["nachweisinfo"] : null), "getNachweis", array(), "method") != null) && $this->getAttribute($this->getAttribute((isset($context["nachweisinfo"]) ? $context["nachweisinfo"] : null), "getNachweis", array(), "method"), "isValid", array(), "method"))) {
                        // line 117
                        echo "\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/32x32/tick.png"), "html", null, true);
                        echo "\" alt=\"Ja\" />
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 119
                        echo "\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/32x32/delete.png"), "html", null, true);
                        echo "\" alt=\"Nein\" />
\t\t\t\t\t\t\t\t";
                    }
                    // line 121
                    echo "\t\t\t\t\t\t\t<th>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nachweisinfo"]) ? $context["nachweisinfo"] : null), "getNachweisart", array(), "method"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t<td>";
                    // line 122
                    if (($this->getAttribute((isset($context["nachweisinfo"]) ? $context["nachweisinfo"] : null), "getNachweis", array(), "method") != null)) {
                        // line 123
                        echo "\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["nachweisinfo"]) ? $context["nachweisinfo"] : null), "getNachweis", array(), "method"), "getDateFormatted", array(), "method"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 125
                        echo "\t\t\t\t\t\t\t\tNicht erbracht.
\t\t\t\t\t\t\t\t";
                    }
                    // line 127
                    echo "\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nachweisinfo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 128
                echo "\t\t\t\t</table>
\t\t\t";
            }
            // line 130
            echo "\t\t";
        }
        // line 131
        echo "\t</div>
\t
\t<h3>Untersuchungen nach G26</h3>
\t<div>
\t\t";
        // line 135
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getG26s", array(), "method")) == 0)) {
            // line 136
            echo "\t\t<em>Keine Einträge vorhanden.</em>
\t\t";
        } else {
            // line 138
            echo "\t\t<table id=\"g26_table\" class=\"tablesorter\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th>
\t\t\t\t\t<th>Klasse<img src=\"";
            // line 142
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t<th>Datum<img src=\"";
            // line 143
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t<th>Gültig bis<img src=\"";
            // line 144
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t<th>Bemerkungen
\t\t\t\t\t";
            // line 146
            if ($this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_MANAGER")) {
                // line 147
                echo "\t\t\t\t\t<th>
\t\t\t\t\t";
            }
            // line 149
            echo "\t\t\t<tbody>
\t\t\t";
            // line 150
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getG26s", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["g26"]) {
                // line 151
                echo "\t\t\t\t<tr>
\t\t\t\t\t<td>";
                // line 152
                if ($this->getAttribute((isset($context["g26"]) ? $context["g26"] : null), "isInvalid", array(), "method")) {
                    // line 153
                    echo "\t\t\t\t\t\t<img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/delete.png"), "html", null, true);
                    echo "\" alt=\"Nein\" />
\t\t\t\t\t\t";
                } else {
                    // line 155
                    echo "\t\t\t\t\t\t<img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/tick.png"), "html", null, true);
                    echo "\" alt=\"Ja\" />
\t\t\t\t\t\t";
                }
                // line 157
                echo "\t\t\t\t\t<td>G26.";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["g26"]) ? $context["g26"] : null), "getClassification", array(), "method"), "html", null, true);
                echo "
\t\t\t\t\t<td>";
                // line 158
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["g26"]) ? $context["g26"] : null), "getDateFormatted", array(), "method"), "html", null, true);
                echo "
\t\t\t\t\t<td>";
                // line 159
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["g26"]) ? $context["g26"] : null), "getDueDateFormatted", array(), "method"), "html", null, true);
                echo "
\t\t\t\t\t<td>";
                // line 160
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["g26"]) ? $context["g26"] : null), "getNotice", array(), "method"), "html", null, true);
                echo "
\t\t\t\t\t";
                // line 161
                if ($this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_MANAGER")) {
                    // line 162
                    echo "\t\t\t\t\t<td>
\t\t\t\t\t\t<ul class=\"action_menu\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 166
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/gear.png"), "html", null, true);
                    echo "\" alt=\"Optionen\" />
\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t";
                    // line 170
                    if ($this->getAttribute((isset($context["g26"]) ? $context["g26"] : null), "getValid", array(), "method")) {
                        // line 171
                        echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a class=\"void_g26\" href=\"";
                        // line 172
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("g26_void", array("id" => $this->getAttribute((isset($context["g26"]) ? $context["g26"] : null), "getId", array(), "method"))), "html", null, true);
                        echo "\" title=\"G26 ungültig machen\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        // line 173
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/block.png"), "html", null, true);
                        echo "\" alt=\"Ungültig machen\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 177
                    echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 178
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("g26_edit", array("id" => $this->getAttribute((isset($context["g26"]) ? $context["g26"] : null), "getId", array(), "method"))), "html", null, true);
                    echo "\" title=\"G26 bearbeiten\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 179
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/edit.png"), "html", null, true);
                    echo "\" alt=\"Bearbeiten\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                    // line 182
                    if ($this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_ADMIN")) {
                        // line 183
                        echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a class=\"delete_g26\" href=\"";
                        // line 184
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("g26_delete", array("id" => $this->getAttribute((isset($context["g26"]) ? $context["g26"] : null), "getId", array(), "method"))), "html", null, true);
                        echo "\" title=\"G26 löschen\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        // line 185
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/delete.png"), "html", null, true);
                        echo "\" alt=\"Löschen\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 189
                    echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</ul>
\t\t\t\t\t";
                }
                // line 192
                echo "\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['g26'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 193
            echo "\t\t</table>
\t\t<em>";
            // line 194
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getG26s", array(), "method")), "html", null, true);
            echo " ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getG26s", array(), "method")) == 1)) {
                echo "Eintrag";
            } else {
                echo "Einträge";
            }
            echo "</em>
\t\t";
        }
        // line 196
        echo "\t</div>
\t
\t<h3>Atemschutznachweise</h3>
\t<div>
\t\t";
        // line 200
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getNachweise", array(), "method")) == 0)) {
            // line 201
            echo "\t\t<em>Keine Einträge vorhanden.</em>
\t\t";
        } else {
            // line 203
            echo "\t\t<table id=\"nachweis_table\" class=\"tablesorter\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th>Datum<img src=\"";
            // line 206
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t<th>Nachweisart<img src=\"";
            // line 207
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t<th>Ort<img src=\"";
            // line 208
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t<th>Dauer<img src=\"";
            // line 209
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/sortable_blank.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t<th>
\t\t\t<tbody>
\t\t\t";
            // line 212
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getNachweise", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["nachweis"]) {
                // line 213
                echo "\t\t\t\t<tr>
\t\t\t\t\t<td>";
                // line 214
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nachweis"]) ? $context["nachweis"] : null), "getDateFormatted", array(), "method"), "html", null, true);
                echo "
\t\t\t\t\t<td>";
                // line 215
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nachweis"]) ? $context["nachweis"] : null), "getNachweisart", array(), "method"), "html", null, true);
                echo "
\t\t\t\t\t<td>";
                // line 216
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nachweis"]) ? $context["nachweis"] : null), "getLocation", array(), "method"), "html", null, true);
                echo "
\t\t\t\t\t<td>";
                // line 217
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nachweis"]) ? $context["nachweis"] : null), "getTime", array(), "method"), "html", null, true);
                echo "
\t\t\t\t\t<td>
\t\t\t\t\t\t<ul class=\"action_menu\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t<img src=\"";
                // line 222
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/gear.png"), "html", null, true);
                echo "\" alt=\"Optionen\" />
\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 227
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("nachweis_show", array("id" => $this->getAttribute((isset($context["nachweis"]) ? $context["nachweis"] : null), "getId", array(), "method"), "_format" => "html")), "html", null, true);
                echo "\" title=\"Nachweis anzeigen\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                // line 228
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/search.png"), "html", null, true);
                echo "\" alt=\"Anzeigen\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 233
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("nachweis_show", array("id" => $this->getAttribute((isset($context["nachweis"]) ? $context["nachweis"] : null), "getId", array(), "method"), "_format" => "pdf")), "html", null, true);
                echo "\" title=\"Nachweis Exportieren\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                // line 234
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/pdf.png"), "html", null, true);
                echo "\" alt=\"Anzeigen\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                // line 237
                if ($this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_MANAGER")) {
                    // line 238
                    echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 239
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("nachweis_edit", array("id" => $this->getAttribute((isset($context["nachweis"]) ? $context["nachweis"] : null), "getId", array(), "method"))), "html", null, true);
                    echo "\" title=\"Nachweis bearbeiten\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 240
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/edit.png"), "html", null, true);
                    echo "\" alt=\"Bearbeiten\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 244
                echo "\t\t\t\t\t\t\t\t\t";
                if ($this->env->getExtension('security')->isGranted("ROLE_NACHWEIS_ADMIN")) {
                    // line 245
                    echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a class=\"delete_nachweis\" href=\"";
                    // line 246
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("nachweis_delete", array("id" => $this->getAttribute((isset($context["nachweis"]) ? $context["nachweis"] : null), "getId", array(), "method"))), "html", null, true);
                    echo "\" title=\"Nachweis löschen\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 247
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/atemschutzcore/images/icons/16x16/delete.png"), "html", null, true);
                    echo "\" alt=\"Löschen\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 251
                echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</ul>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nachweis'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 254
            echo "\t\t</table>
\t\t<em>";
            // line 255
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getNachweise", array(), "method")), "html", null, true);
            echo " ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["atemschutzgeraetetraeger"]) ? $context["atemschutzgeraetetraeger"] : null), "getNachweise", array(), "method")) == 1)) {
                echo "Eintrag";
            } else {
                echo "Einträge";
            }
            echo "</em>
\t\t";
        }
        // line 257
        echo "\t</div>
</div>
";
    }

    // line 261
    public function block_javascripts($context, array $blocks = array())
    {
        // line 262
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 263
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "bdd5d08_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_bdd5d08_0") : $this->env->getExtension('assets')->getAssetUrl("js/bdd5d08_jquery.tablesorter.min_1.js");
            // line 267
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
            // asset "bdd5d08_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_bdd5d08_1") : $this->env->getExtension('assets')->getAssetUrl("js/bdd5d08_atemschutzgeraetetraeger.show_2.js");
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
        } else {
            // asset "bdd5d08"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_bdd5d08") : $this->env->getExtension('assets')->getAssetUrl("js/bdd5d08.js");
            echo "\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
\t";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "AtemschutzNachweisBundle:Atemschutzgeraetetraeger:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  671 => 267,  667 => 263,  662 => 262,  659 => 261,  653 => 257,  642 => 255,  639 => 254,  631 => 251,  624 => 247,  620 => 246,  617 => 245,  614 => 244,  607 => 240,  603 => 239,  600 => 238,  598 => 237,  592 => 234,  588 => 233,  580 => 228,  576 => 227,  568 => 222,  560 => 217,  556 => 216,  552 => 215,  548 => 214,  545 => 213,  541 => 212,  535 => 209,  531 => 208,  527 => 207,  523 => 206,  518 => 203,  514 => 201,  512 => 200,  506 => 196,  495 => 194,  492 => 193,  486 => 192,  481 => 189,  470 => 184,  467 => 183,  465 => 182,  459 => 179,  455 => 178,  452 => 177,  445 => 173,  441 => 172,  438 => 171,  436 => 170,  429 => 166,  421 => 161,  417 => 160,  404 => 157,  392 => 153,  390 => 152,  383 => 150,  380 => 149,  376 => 147,  369 => 144,  361 => 142,  351 => 136,  349 => 135,  343 => 131,  340 => 130,  336 => 128,  330 => 127,  326 => 125,  320 => 123,  318 => 122,  313 => 121,  307 => 119,  301 => 117,  292 => 114,  287 => 111,  284 => 110,  270 => 105,  257 => 101,  251 => 99,  245 => 97,  240 => 95,  236 => 94,  231 => 91,  223 => 87,  219 => 85,  213 => 83,  204 => 79,  192 => 75,  181 => 71,  172 => 67,  108 => 32,  124 => 46,  113 => 44,  308 => 123,  304 => 119,  299 => 116,  296 => 115,  290 => 113,  275 => 109,  272 => 108,  266 => 107,  259 => 103,  248 => 98,  244 => 97,  237 => 93,  233 => 92,  226 => 88,  206 => 77,  202 => 76,  198 => 77,  190 => 74,  174 => 67,  153 => 60,  146 => 57,  179 => 70,  170 => 66,  167 => 64,  161 => 60,  145 => 52,  110 => 39,  20 => 4,  289 => 100,  286 => 111,  280 => 108,  274 => 107,  269 => 91,  262 => 102,  255 => 102,  253 => 84,  243 => 96,  230 => 72,  228 => 71,  225 => 88,  222 => 87,  216 => 67,  210 => 65,  195 => 58,  180 => 70,  178 => 52,  175 => 68,  157 => 48,  148 => 46,  37 => 8,  96 => 26,  74 => 22,  191 => 70,  185 => 66,  134 => 51,  97 => 31,  83 => 24,  77 => 25,  65 => 19,  63 => 17,  58 => 15,  34 => 7,  76 => 22,  59 => 16,  53 => 5,  23 => 5,  239 => 107,  207 => 80,  197 => 97,  194 => 74,  155 => 67,  152 => 66,  150 => 64,  137 => 43,  131 => 46,  129 => 41,  118 => 37,  104 => 31,  100 => 35,  90 => 24,  81 => 24,  480 => 162,  474 => 185,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 162,  413 => 159,  409 => 158,  407 => 131,  402 => 130,  398 => 155,  393 => 126,  387 => 151,  384 => 121,  381 => 120,  379 => 119,  374 => 146,  368 => 112,  365 => 143,  362 => 110,  360 => 109,  355 => 138,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 105,  294 => 101,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 103,  258 => 86,  252 => 80,  247 => 81,  241 => 77,  235 => 75,  229 => 90,  224 => 71,  220 => 70,  214 => 82,  208 => 78,  169 => 59,  143 => 45,  140 => 54,  132 => 51,  128 => 48,  119 => 38,  111 => 34,  107 => 35,  71 => 21,  177 => 69,  165 => 64,  160 => 63,  139 => 49,  135 => 55,  126 => 43,  114 => 37,  84 => 26,  70 => 21,  67 => 19,  61 => 16,  47 => 11,  98 => 28,  93 => 28,  88 => 22,  78 => 23,  40 => 9,  94 => 22,  89 => 29,  85 => 25,  79 => 23,  75 => 22,  68 => 20,  56 => 15,  50 => 13,  27 => 7,  201 => 60,  196 => 90,  183 => 91,  171 => 81,  166 => 65,  163 => 70,  158 => 62,  156 => 58,  151 => 59,  142 => 44,  138 => 56,  136 => 56,  123 => 47,  121 => 38,  117 => 44,  115 => 37,  105 => 33,  101 => 31,  91 => 28,  69 => 21,  62 => 17,  49 => 16,  43 => 10,  32 => 7,  28 => 8,  87 => 26,  72 => 16,  66 => 17,  55 => 18,  44 => 10,  41 => 9,  25 => 3,  21 => 2,  46 => 11,  35 => 9,  31 => 7,  29 => 6,  38 => 9,  26 => 6,  24 => 6,  22 => 5,  19 => 4,  209 => 81,  203 => 76,  199 => 72,  193 => 73,  189 => 56,  187 => 73,  182 => 66,  176 => 68,  173 => 60,  168 => 66,  164 => 59,  162 => 73,  154 => 54,  149 => 54,  147 => 58,  144 => 61,  141 => 44,  133 => 42,  130 => 41,  125 => 40,  122 => 45,  116 => 42,  112 => 42,  109 => 43,  106 => 33,  103 => 34,  99 => 30,  95 => 29,  92 => 34,  86 => 25,  82 => 20,  80 => 26,  73 => 21,  64 => 17,  60 => 16,  57 => 15,  54 => 17,  51 => 15,  48 => 13,  45 => 12,  42 => 10,  39 => 9,  36 => 11,  33 => 7,  30 => 7,);
    }
}
