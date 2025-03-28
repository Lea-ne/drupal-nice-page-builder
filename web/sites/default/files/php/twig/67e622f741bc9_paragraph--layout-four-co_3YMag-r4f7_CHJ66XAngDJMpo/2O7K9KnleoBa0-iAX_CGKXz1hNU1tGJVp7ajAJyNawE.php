<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/custom/nice_theme/templates/paragraphs/paragraph--layout-four-column.html.twig */
class __TwigTemplate_3657c6f7d3cdebf93c66ec7d0073e168 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 2
        $context["items"] = [];
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_layout_four_col_container", [], "any", false, false, true, 3));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 4
            yield "  ";
            if ((($_v0 = $context["item"]) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#paragraph"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["item"], "#paragraph", [], "array", false, false, true, 4))) {
                // line 5
                yield "    ";
                $context["items"] = Twig\Extension\CoreExtension::merge(($context["items"] ?? null), [$context["item"]]);
                // line 6
                yield "  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        yield "

";
        // line 10
        $context["title"] = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_section_title", [], "any", false, false, true, 10);
        // line 11
        $context["use_container"] = ((($_v1 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_boolean_column_container", [], "any", false, false, true, 11), 0, [], "any", false, false, true, 11)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1["#markup"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_boolean_column_container", [], "any", false, false, true, 11), 0, [], "any", false, false, true, 11), "#markup", [], "array", false, false, true, 11)) == "On");
        // line 12
        $context["class"] = ("paragraph-type-layout paragraph-type-layout-four-column paragraph-id-" . CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "id", [], "method", false, false, true, 12));
        // line 13
        $context["column_layout"] = 4;
        // line 14
        yield "
";
        // line 15
        yield from $this->loadTemplate("@nice_theme/components/layout_column/layout_column.twig", "themes/custom/nice_theme/templates/paragraphs/paragraph--layout-four-column.html.twig", 15)->unwrap()->yield(CoreExtension::merge($context, ["class" =>         // line 16
($context["class"] ?? null), "column_layout" =>         // line 17
($context["column_layout"] ?? null), "title" =>         // line 18
($context["title"] ?? null), "items" =>         // line 19
($context["items"] ?? null), "container_value" => ((        // line 20
($context["use_container"] ?? null)) ? ("page-container") : (""))]));
        // line 21
        yield " ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "paragraph"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/nice_theme/templates/paragraphs/paragraph--layout-four-column.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  85 => 21,  83 => 20,  82 => 19,  81 => 18,  80 => 17,  79 => 16,  78 => 15,  75 => 14,  73 => 13,  71 => 12,  69 => 11,  67 => 10,  63 => 8,  56 => 6,  53 => 5,  50 => 4,  46 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Paragraph template for Section Four Column #}
{% set items = [] %}
{% for item in content.field_layout_four_col_container %}
  {% if item['#paragraph'] %}
    {% set items = items|merge([item]) %}
  {% endif %}
{% endfor %}


{% set title = content.field_section_title %}
{% set use_container = content.field_boolean_column_container.0['#markup'] == 'On' %}
{% set class = 'paragraph-type-layout paragraph-type-layout-four-column paragraph-id-' ~ paragraph.id() %}
{% set column_layout = 4 %}

{% include '@nice_theme/components/layout_column/layout_column.twig' with {
  class: class,
  column_layout: column_layout,
  title: title,
  items: items,
  container_value: use_container ? 'page-container' : ''
} %} ", "themes/custom/nice_theme/templates/paragraphs/paragraph--layout-four-column.html.twig", "/var/www/html/web/themes/custom/nice_theme/templates/paragraphs/paragraph--layout-four-column.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "for" => 3, "if" => 4, "include" => 15];
        static $filters = ["merge" => 5];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if', 'include'],
                ['merge'],
                [],
                $this->source
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
