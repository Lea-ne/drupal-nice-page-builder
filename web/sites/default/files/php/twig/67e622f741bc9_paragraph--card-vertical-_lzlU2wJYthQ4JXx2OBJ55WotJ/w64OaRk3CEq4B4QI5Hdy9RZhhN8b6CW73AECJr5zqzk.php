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

/* themes/custom/nice_theme/templates/paragraphs/paragraph--card-vertical-list.html.twig */
class __TwigTemplate_459c21c34ae7dd83ea78507b507aeac1 extends Template
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
        // line 1
        $context["items"] = [];
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_card_list_container", [], "any", false, false, true, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 3
            yield "  ";
            if ((($_v0 = $context["item"]) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#paragraph"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["item"], "#paragraph", [], "array", false, false, true, 3))) {
                // line 4
                yield "    ";
                $context["items"] = Twig\Extension\CoreExtension::merge(($context["items"] ?? null), [$context["item"]]);
                // line 5
                yield "  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        yield "
";
        // line 8
        $context["class"] = "component-type-card component-type-vertical-list";
        // line 9
        yield "
";
        // line 10
        yield from $this->loadTemplate("@nice_theme/components/card_vertical_list/card_vertical_list.twig", "themes/custom/nice_theme/templates/paragraphs/paragraph--card-vertical-list.html.twig", 10)->unwrap()->yield(CoreExtension::merge($context, ["class" =>         // line 11
($context["class"] ?? null), "items" =>         // line 12
($context["items"] ?? null)]));
        // line 13
        yield " ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/nice_theme/templates/paragraphs/paragraph--card-vertical-list.html.twig";
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
        return array (  75 => 13,  73 => 12,  72 => 11,  71 => 10,  68 => 9,  66 => 8,  63 => 7,  56 => 5,  53 => 4,  50 => 3,  46 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set items = [] %}
{% for item in content.field_card_list_container %}
  {% if item['#paragraph'] %}
    {% set items = items|merge([item]) %}
  {% endif %}
{% endfor %}

{% set class = 'component-type-card component-type-vertical-list' %}

{% include '@nice_theme/components/card_vertical_list/card_vertical_list.twig' with {
  class: class,
  items: items,
} %} ", "themes/custom/nice_theme/templates/paragraphs/paragraph--card-vertical-list.html.twig", "/var/www/html/web/themes/custom/nice_theme/templates/paragraphs/paragraph--card-vertical-list.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 1, "for" => 2, "if" => 3, "include" => 10];
        static $filters = ["merge" => 4];
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
