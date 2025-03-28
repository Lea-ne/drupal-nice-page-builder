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

/* themes/custom/nice_theme/templates/block/block--block-header.html.twig */
class __TwigTemplate_80fe2d0b1f8c566286cad269cfb301ef extends Template
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
        $context["block_content"] = (($_v0 = ($context["content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#block_content"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "#block_content", [], "array", false, false, true, 2));
        // line 3
        $context["media_entity"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["block_content"] ?? null), "field_footer_logo", [], "any", false, false, true, 3), 0, [], "any", false, false, true, 3), "entity", [], "any", false, false, true, 3);
        // line 4
        $context["image"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["media_entity"] ?? null), "field_media_image", [], "any", false, false, true, 4), "entity", [], "any", false, false, true, 4);
        // line 5
        $context["header_logo"] = Drupal\twig_tweak\TwigTweakExtension::fileUrlFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["image"] ?? null), "uri", [], "any", false, false, true, 5), "value", [], "any", false, false, true, 5));
        // line 6
        yield "
";
        // line 8
        $context["header_menu_entity"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_main_header_ref", [], "any", false, true, true, 8), 0, [], "any", false, true, true, 8), "#plain_text", [], "array", true, true, true, 8) &&  !(null === (($_v1 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_main_header_ref", [], "any", false, false, true, 8), 0, [], "any", false, false, true, 8)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1["#plain_text"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_main_header_ref", [], "any", false, false, true, 8), 0, [], "any", false, false, true, 8), "#plain_text", [], "array", false, false, true, 8))))) ? ((($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_main_header_ref", [], "any", false, false, true, 8), 0, [], "any", false, false, true, 8)) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2["#plain_text"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_main_header_ref", [], "any", false, false, true, 8), 0, [], "any", false, false, true, 8), "#plain_text", [], "array", false, false, true, 8))) : (""));
        // line 9
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["header_menu_entity"] ?? null))) {
            // line 10
            yield "    ";
            $context["header_menu"] = Drupal\twig_tweak\TwigTweakExtension::drupalMenu(($context["header_menu_entity"] ?? null));
        }
        // line 12
        yield "
";
        // line 13
        yield from $this->loadTemplate("@nice_theme/components/header/header.twig", "themes/custom/nice_theme/templates/block/block--block-header.html.twig", 13)->unwrap()->yield(CoreExtension::merge($context, ["header_logo" =>         // line 14
($context["header_logo"] ?? null), "header_menu" =>         // line 15
($context["header_menu"] ?? null)]));
        // line 16
        yield " ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/nice_theme/templates/block/block--block-header.html.twig";
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
        return array (  70 => 16,  68 => 15,  67 => 14,  66 => 13,  63 => 12,  59 => 10,  57 => 9,  55 => 8,  52 => 6,  50 => 5,  48 => 4,  46 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Define footer logo #}
{% set block_content = content['#block_content'] %}
{% set media_entity = block_content.field_footer_logo.0.entity %}
{% set image = media_entity.field_media_image.entity %}
{% set header_logo = image.uri.value|file_url %}

{# Define footer social media menu #}
{% set header_menu_entity = content.field_main_header_ref.0['#plain_text'] ?? '' %}
{% if header_menu_entity is not empty %}
    {% set header_menu = drupal_menu(header_menu_entity) %}
{% endif %}

{% include '@nice_theme/components/header/header.twig' with {
    header_logo: header_logo,
    header_menu: header_menu,
} %} ", "themes/custom/nice_theme/templates/block/block--block-header.html.twig", "/var/www/html/web/themes/custom/nice_theme/templates/block/block--block-header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "if" => 9, "include" => 13];
        static $filters = ["file_url" => 5];
        static $functions = ["drupal_menu" => 10];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'include'],
                ['file_url'],
                ['drupal_menu'],
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
