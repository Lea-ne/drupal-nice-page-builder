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

/* themes/custom/nice_theme/templates/paragraphs/paragraph--paragraph-card-basic-content.html.twig */
class __TwigTemplate_26ba88db0968f41f0dadbc095d86dc7a extends Template
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
        $context["title"] = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_title", [], "any", false, false, true, 2);
        // line 3
        $context["text"] = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_description", [], "any", false, false, true, 3);
        // line 4
        $context["link"] = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_link", [], "any", false, false, true, 4);
        // line 5
        $context["link_url"] = (($_v0 = (($_v1 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_link", [], "any", false, false, true, 5)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_link", [], "any", false, false, true, 5), 0, [], "array", false, false, true, 5))) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#url"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v2 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_link", [], "any", false, false, true, 5)) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_link", [], "any", false, false, true, 5), 0, [], "array", false, false, true, 5)), "#url", [], "array", false, false, true, 5));
        // line 6
        $context["link_title"] = (($_v3 = (($_v4 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_link", [], "any", false, false, true, 6)) && is_array($_v4) || $_v4 instanceof ArrayAccess && in_array($_v4::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v4[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_link", [], "any", false, false, true, 6), 0, [], "array", false, false, true, 6))) && is_array($_v3) || $_v3 instanceof ArrayAccess && in_array($_v3::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v3["#title"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v5 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_link", [], "any", false, false, true, 6)) && is_array($_v5) || $_v5 instanceof ArrayAccess && in_array($_v5::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v5[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_basic_link", [], "any", false, false, true, 6), 0, [], "array", false, false, true, 6)), "#title", [], "array", false, false, true, 6));
        // line 7
        yield "

";
        // line 10
        $context["media_entity"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_basic_media", [], "any", false, false, true, 10), "entity", [], "any", false, false, true, 10);
        // line 11
        $context["image"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["media_entity"] ?? null), "field_media_image", [], "any", false, false, true, 11), "entity", [], "any", false, false, true, 11);
        // line 12
        $context["media"] = Drupal\twig_tweak\TwigTweakExtension::fileUrlFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["image"] ?? null), "uri", [], "any", false, false, true, 12), "value", [], "any", false, false, true, 12));
        // line 13
        yield "
";
        // line 15
        $context["card_render"] = (($_v6 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_card_basic_content_render", [], "any", false, false, true, 15), 0, [], "any", false, false, true, 15)) && is_array($_v6) || $_v6 instanceof ArrayAccess && in_array($_v6::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v6["#markup"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_card_basic_content_render", [], "any", false, false, true, 15), 0, [], "any", false, false, true, 15), "#markup", [], "array", false, false, true, 15));
        // line 16
        yield "
";
        // line 18
        $context["class"] = ("paragraph-card paragraph-card-basic-content paragraph-id-" . CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "id", [], "method", false, false, true, 18));
        // line 19
        yield "

";
        // line 21
        if ((($context["card_render"] ?? null) == "card_article")) {
            // line 22
            yield "
    ";
            // line 23
            yield from $this->loadTemplate("@nice_theme/components/card_article/card_article.twig", "themes/custom/nice_theme/templates/paragraphs/paragraph--paragraph-card-basic-content.html.twig", 23)->unwrap()->yield(CoreExtension::merge($context, ["class" => (            // line 24
($context["class"] ?? null) . " paragraph-card-article"), "title" =>             // line 25
($context["title"] ?? null), "text" =>             // line 26
($context["text"] ?? null), "media" =>             // line 27
($context["media"] ?? null), "link" =>             // line 28
($context["link"] ?? null)]));
            // line 29
            yield " 

";
        } elseif ((        // line 31
($context["card_render"] ?? null) == "card_article_background_image")) {
            // line 32
            yield "
    ";
            // line 33
            yield from $this->loadTemplate("@nice_theme/components/card_article_background_image/card_article_background_image.twig", "themes/custom/nice_theme/templates/paragraphs/paragraph--paragraph-card-basic-content.html.twig", 33)->unwrap()->yield(CoreExtension::merge($context, ["class" => (            // line 34
($context["class"] ?? null) . " paragraph-card-article_background_image"), "title" =>             // line 35
($context["title"] ?? null), "text" =>             // line 36
($context["text"] ?? null), "media" =>             // line 37
($context["media"] ?? null), "link_url" =>             // line 38
($context["link_url"] ?? null), "link_title" =>             // line 39
($context["link_title"] ?? null)]));
            // line 40
            yield " 

";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "paragraph"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/nice_theme/templates/paragraphs/paragraph--paragraph-card-basic-content.html.twig";
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
        return array (  107 => 40,  105 => 39,  104 => 38,  103 => 37,  102 => 36,  101 => 35,  100 => 34,  99 => 33,  96 => 32,  94 => 31,  90 => 29,  88 => 28,  87 => 27,  86 => 26,  85 => 25,  84 => 24,  83 => 23,  80 => 22,  78 => 21,  74 => 19,  72 => 18,  69 => 16,  67 => 15,  64 => 13,  62 => 12,  60 => 11,  58 => 10,  54 => 7,  52 => 6,  50 => 5,  48 => 4,  46 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Paragraph template for Card Basic Content #}
{% set title = content.field_basic_title %}
{% set text = content.field_basic_description %}
{% set link = content.field_basic_link %}
{% set link_url = content.field_basic_link[0]['#url'] %}
{% set link_title = content.field_basic_link[0]['#title'] %}


{# Define media #}
{% set media_entity = paragraph.field_basic_media.entity %}
{% set image = media_entity.field_media_image.entity %}
{% set media = image.uri.value|file_url %}

{# Define card render #}
{% set card_render = content.field_card_basic_content_render.0['#markup'] %}

{# Define universal class for all cards #}
{% set class = \"paragraph-card paragraph-card-basic-content paragraph-id-\" ~ paragraph.id() %}


{% if card_render == 'card_article' %}

    {% include '@nice_theme/components/card_article/card_article.twig' with {
        class: class ~ ' paragraph-card-article',
        title: title,
        text: text,
        media: media,
        link: link
    } %} 

{% elseif card_render == 'card_article_background_image' %}

    {% include '@nice_theme/components/card_article_background_image/card_article_background_image.twig' with {
        class: class ~ ' paragraph-card-article_background_image',
        title: title,
        text: text,
        media: media,
        link_url: link_url,
        link_title: link_title,
    } %} 

{% endif %}", "themes/custom/nice_theme/templates/paragraphs/paragraph--paragraph-card-basic-content.html.twig", "/var/www/html/web/themes/custom/nice_theme/templates/paragraphs/paragraph--paragraph-card-basic-content.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "if" => 21, "include" => 23];
        static $filters = ["file_url" => 12];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'include'],
                ['file_url'],
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
