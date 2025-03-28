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

/* themes/custom/nice_theme/templates/paragraphs/paragraph--card-slider.html.twig */
class __TwigTemplate_8da2a0f54a15203ce8102ede5a23c552 extends Template
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
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_card_slider_container", [], "any", false, false, true, 3));
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
        $context["class"] = ("paragraph-type-card paragraph-type-card-slider paragraph-id-" . CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "id", [], "method", false, false, true, 10));
        // line 11
        yield "
";
        // line 12
        yield from $this->loadTemplate("@nice_theme/components/card_slider/card_slider.twig", "themes/custom/nice_theme/templates/paragraphs/paragraph--card-slider.html.twig", 12)->unwrap()->yield(CoreExtension::merge($context, ["class" =>         // line 13
($context["class"] ?? null), "items" =>         // line 14
($context["items"] ?? null)]));
        // line 15
        yield " ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "paragraph"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/nice_theme/templates/paragraphs/paragraph--card-slider.html.twig";
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
        return array (  76 => 15,  74 => 14,  73 => 13,  72 => 12,  69 => 11,  67 => 10,  63 => 8,  56 => 6,  53 => 5,  50 => 4,  46 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Paragraph template for Section Three Column #}
{% set items = [] %}
{% for item in content.field_card_slider_container %}
  {% if item['#paragraph'] %}
    {% set items = items|merge([item]) %}
  {% endif %}
{% endfor %}


{% set class = 'paragraph-type-card paragraph-type-card-slider paragraph-id-' ~ paragraph.id() %}

{% include '@nice_theme/components/card_slider/card_slider.twig' with {
  class: class,
  items: items,
} %} ", "themes/custom/nice_theme/templates/paragraphs/paragraph--card-slider.html.twig", "/var/www/html/web/themes/custom/nice_theme/templates/paragraphs/paragraph--card-slider.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "for" => 3, "if" => 4, "include" => 12];
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
