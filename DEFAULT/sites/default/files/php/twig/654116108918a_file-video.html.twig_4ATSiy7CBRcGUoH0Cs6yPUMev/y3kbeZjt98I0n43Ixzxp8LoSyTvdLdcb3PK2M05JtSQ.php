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

/* themes/contrib/bootstrap5/templates/field/file-video.html.twig */
class __TwigTemplate_22f245afa00911deb703181840255598 extends Template
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
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap5/file"), "html", null, true);
        echo "
<video ";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 19, $this->source), "html", null, true);
        echo ">
  ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["files"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 21
            echo "    <source ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["file"], "source_attributes", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
            echo " />
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "</video>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap5/templates/field/file-video.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 23,  51 => 21,  47 => 20,  43 => 19,  39 => 18,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
* @file
* Default theme implementation to display the file entity as a video tag.
*
* Available variables:
* - attributes: An array of HTML attributes, intended to be added to the
*   video tag.
* - files: And array of files to be added as sources for the video tag. Each
*   element is an array with the following elements:
*   - file: The full file object.
*   - source_attributes: An array of HTML attributes for to be added to the
*     source tag.
*
* @ingroup themeable
*/
#}
{{ attach_library('bootstrap5/file') }}
<video {{ attributes }}>
  {% for file in files %}
    <source {{ file.source_attributes }} />
  {% endfor %}
</video>
", "themes/contrib/bootstrap5/templates/field/file-video.html.twig", "/Users/sjoerd/Sites/sproets/DEFAULT/themes/contrib/bootstrap5/templates/field/file-video.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 20);
        static $filters = array("escape" => 18);
        static $functions = array("attach_library" => 18);

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape'],
                ['attach_library']
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
