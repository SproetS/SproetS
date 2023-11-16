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

/* themes/contrib/stable/templates/admin/admin-block-content.html.twig */
class __TwigTemplate_4372734679e245a8b4801a3b70e4e3a5 extends Template
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
        // line 20
        $context["classes"] = [0 => "list-group", 1 => ((        // line 22
($context["compact"] ?? null)) ? ("compact") : (""))];
        // line 25
        if (($context["content"] ?? null)) {
            // line 26
            echo "  <dl";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 26), 26, $this->source), "html", null, true);
            echo ">
    ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["content"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 28
                echo "      <dt class=\"list-group__link\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
                echo "</dt>
      ";
                // line 29
                if (twig_get_attribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, true, 29)) {
                    // line 30
                    echo "        <dd class=\"list-group__description\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, true, 30), 30, $this->source), "html", null, true);
                    echo "</dd>
      ";
                }
                // line 32
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "  </dl>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/contrib/stable/templates/admin/admin-block-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 33,  66 => 32,  60 => 30,  58 => 29,  53 => 28,  49 => 27,  44 => 26,  42 => 25,  40 => 22,  39 => 20,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for the content of an administrative block.
 *
 * Available variables:
 * - content: List of administrative menu items. Each menu item contains:
 *   - link: Link to the admin section.
 *   - title: Short name of the section.
 *   - description: Description of the administrative menu item.
 *   - url: URI to the admin section.
 *   - options: URL options. See \\Drupal\\Core\\Url::fromUri() for details.
 * - attributes: HTML attributes to be added to the element.
 * - compact: Boolean indicating whether compact mode is turned on or not.
 *
 * @see template_preprocess_admin_block_content()
 */
#}
{%
  set classes = [
    'list-group',
    compact ? 'compact',
  ]
%}
{% if content %}
  <dl{{ attributes.addClass(classes) }}>
    {% for item in content %}
      <dt class=\"list-group__link\">{{ item.link }}</dt>
      {% if item.description %}
        <dd class=\"list-group__description\">{{ item.description }}</dd>
      {% endif %}
    {% endfor %}
  </dl>
{% endif %}
", "themes/contrib/stable/templates/admin/admin-block-content.html.twig", "/Users/sjoerd/Sites/sproets/DEFAULT/themes/contrib/stable/templates/admin/admin-block-content.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 20, "if" => 25, "for" => 27);
        static $filters = array("escape" => 26);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
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
