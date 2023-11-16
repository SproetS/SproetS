<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/themes/stable9/layouts/layout_builder/threecol_section/layout--threecol-section.html.twig */
class __TwigTemplate_e8f30d9454061b6f78f33a58d35b8712 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        if (($context["content"] ?? null)) {
            // line 13
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 13), 13, $this->source), "html", null, true);
            echo ">

    ";
            // line 15
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "first", [], "any", false, false, true, 15)) {
                // line 16
                echo "      <div ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "first", [], "any", false, false, true, 16), "addClass", [0 => "layout__region", 1 => "layout__region--first"], "method", false, false, true, 16), 16, $this->source), "html", null, true);
                echo ">
        ";
                // line 17
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "first", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 20
            echo "
    ";
            // line 21
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "second", [], "any", false, false, true, 21)) {
                // line 22
                echo "      <div ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "second", [], "any", false, false, true, 22), "addClass", [0 => "layout__region", 1 => "layout__region--second"], "method", false, false, true, 22), 22, $this->source), "html", null, true);
                echo ">
        ";
                // line 23
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "second", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 26
            echo "
    ";
            // line 27
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "third", [], "any", false, false, true, 27)) {
                // line 28
                echo "      <div ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "third", [], "any", false, false, true, 28), "addClass", [0 => "layout__region", 1 => "layout__region--third"], "method", false, false, true, 28), 28, $this->source), "html", null, true);
                echo ">
        ";
                // line 29
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "third", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 32
            echo "
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/stable9/layouts/layout_builder/threecol_section/layout--threecol-section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 32,  86 => 29,  81 => 28,  79 => 27,  76 => 26,  70 => 23,  65 => 22,  63 => 21,  60 => 20,  54 => 17,  49 => 16,  47 => 15,  41 => 13,  39 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for a three-column layout.
 *
 * Available variables:
 * - in_preview: Whether the plugin is being rendered in preview mode.
 * - content: The content for this layout.
 * - attributes: HTML attributes for the layout <div>.
 */
#}
{% if content %}
  <div{{ attributes.addClass(classes) }}>

    {% if content.first %}
      <div {{ region_attributes.first.addClass('layout__region', 'layout__region--first') }}>
        {{ content.first }}
      </div>
    {% endif %}

    {% if content.second %}
      <div {{ region_attributes.second.addClass('layout__region', 'layout__region--second') }}>
        {{ content.second }}
      </div>
    {% endif %}

    {% if content.third %}
      <div {{ region_attributes.third.addClass('layout__region', 'layout__region--third') }}>
        {{ content.third }}
      </div>
    {% endif %}

  </div>
{% endif %}
", "core/themes/stable9/layouts/layout_builder/threecol_section/layout--threecol-section.html.twig", "/Users/sjoerd/Sites/sproets/DEFAULT/core/themes/stable9/layouts/layout_builder/threecol_section/layout--threecol-section.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 12);
        static $filters = array("escape" => 13);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
