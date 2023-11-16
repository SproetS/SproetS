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

/* themes/contrib/stable/templates/admin/views-ui-view-preview-section.html.twig */
class __TwigTemplate_6712b141278d7bbd3ee6d8423d14b8e3 extends Template
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
        // line 14
        echo "<h1 class=\"section-title\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 14, $this->source), "html", null, true);
        echo "</h1>
";
        // line 15
        if (($context["links"] ?? null)) {
            // line 16
            echo "  <div class=\"contextual\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["links"] ?? null), 16, $this->source), "html", null, true);
            echo "</div>
";
        }
        // line 18
        echo "<div class=\"preview-section\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 18, $this->source), "html", null, true);
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/stable/templates/admin/views-ui-view-preview-section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 18,  46 => 16,  44 => 15,  39 => 14,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for a views UI preview section.
 *
 * Available variables:
 * - title: The human readable section title.
 * - links: A list of contextual links.
 * - content: The content for this section preview.
 *
 * @see template_preprocess_views_ui_view_preview_section()
 */
#}
<h1 class=\"section-title\">{{ title }}</h1>
{% if links %}
  <div class=\"contextual\">{{ links }}</div>
{% endif %}
<div class=\"preview-section\">{{ content }}</div>
", "themes/contrib/stable/templates/admin/views-ui-view-preview-section.html.twig", "/Users/sjoerd/Sites/sproets/DEFAULT/themes/contrib/stable/templates/admin/views-ui-view-preview-section.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 15);
        static $filters = array("escape" => 14);
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
