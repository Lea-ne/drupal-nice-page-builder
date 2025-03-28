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

/* themes/custom/nice_theme/templates/block/block--block-footer.html.twig */
class __TwigTemplate_f441dcf7ef9656d673812d9ef55665c3 extends Template
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
        $context["footer_logo"] = Drupal\twig_tweak\TwigTweakExtension::fileUrlFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["image"] ?? null), "uri", [], "any", false, false, true, 5), "value", [], "any", false, false, true, 5));
        // line 6
        yield "
";
        // line 8
        $context["cta_button_url"] = (($_v1 = (($_v2 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_cta_button", [], "any", false, false, true, 8)) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_cta_button", [], "any", false, false, true, 8), 0, [], "array", false, false, true, 8))) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1["#url"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v3 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_cta_button", [], "any", false, false, true, 8)) && is_array($_v3) || $_v3 instanceof ArrayAccess && in_array($_v3::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v3[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_cta_button", [], "any", false, false, true, 8), 0, [], "array", false, false, true, 8)), "#url", [], "array", false, false, true, 8));
        // line 9
        $context["cta_button_title"] = (($_v4 = (($_v5 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_cta_button", [], "any", false, false, true, 9)) && is_array($_v5) || $_v5 instanceof ArrayAccess && in_array($_v5::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v5[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_cta_button", [], "any", false, false, true, 9), 0, [], "array", false, false, true, 9))) && is_array($_v4) || $_v4 instanceof ArrayAccess && in_array($_v4::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v4["#title"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v6 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_cta_button", [], "any", false, false, true, 9)) && is_array($_v6) || $_v6 instanceof ArrayAccess && in_array($_v6::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v6[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_cta_button", [], "any", false, false, true, 9), 0, [], "array", false, false, true, 9)), "#title", [], "array", false, false, true, 9));
        // line 10
        yield "

";
        // line 13
        $context["text"] = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_little_descritpion", [], "any", false, false, true, 13);
        // line 14
        yield "
";
        // line 16
        $context["social_media_menu_entity"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_social_media_menu_ref", [], "any", false, true, true, 16), 0, [], "any", false, true, true, 16), "#plain_text", [], "array", true, true, true, 16) &&  !(null === (($_v7 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_social_media_menu_ref", [], "any", false, false, true, 16), 0, [], "any", false, false, true, 16)) && is_array($_v7) || $_v7 instanceof ArrayAccess && in_array($_v7::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v7["#plain_text"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_social_media_menu_ref", [], "any", false, false, true, 16), 0, [], "any", false, false, true, 16), "#plain_text", [], "array", false, false, true, 16))))) ? ((($_v8 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_social_media_menu_ref", [], "any", false, false, true, 16), 0, [], "any", false, false, true, 16)) && is_array($_v8) || $_v8 instanceof ArrayAccess && in_array($_v8::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v8["#plain_text"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_social_media_menu_ref", [], "any", false, false, true, 16), 0, [], "any", false, false, true, 16), "#plain_text", [], "array", false, false, true, 16))) : (""));
        // line 17
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["social_media_menu_entity"] ?? null))) {
            // line 18
            yield "    ";
            $context["social_media_menu"] = Drupal\twig_tweak\TwigTweakExtension::drupalMenu(($context["social_media_menu_entity"] ?? null));
        }
        // line 20
        yield "
";
        // line 22
        $context["footer_menu_entity"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_test", [], "any", false, true, true, 22), 0, [], "any", false, true, true, 22), "#plain_text", [], "array", true, true, true, 22) &&  !(null === (($_v9 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_test", [], "any", false, false, true, 22), 0, [], "any", false, false, true, 22)) && is_array($_v9) || $_v9 instanceof ArrayAccess && in_array($_v9::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v9["#plain_text"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_test", [], "any", false, false, true, 22), 0, [], "any", false, false, true, 22), "#plain_text", [], "array", false, false, true, 22))))) ? ((($_v10 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_test", [], "any", false, false, true, 22), 0, [], "any", false, false, true, 22)) && is_array($_v10) || $_v10 instanceof ArrayAccess && in_array($_v10::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v10["#plain_text"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_test", [], "any", false, false, true, 22), 0, [], "any", false, false, true, 22), "#plain_text", [], "array", false, false, true, 22))) : (""));
        // line 23
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["footer_menu_entity"] ?? null))) {
            // line 24
            yield "    ";
            $context["footer_menu"] = Drupal\twig_tweak\TwigTweakExtension::drupalMenu(($context["footer_menu_entity"] ?? null));
        }
        // line 26
        yield "

";
        // line 28
        yield from $this->loadTemplate("@nice_theme/components/footer/footer.twig", "themes/custom/nice_theme/templates/block/block--block-footer.html.twig", 28)->unwrap()->yield(CoreExtension::merge($context, ["footer_menu" =>         // line 29
($context["footer_menu"] ?? null), "social_media_menu" =>         // line 30
($context["social_media_menu"] ?? null), "footer_logo" =>         // line 31
($context["footer_logo"] ?? null), "text" =>         // line 32
($context["text"] ?? null), "cta_button_url" =>         // line 33
($context["cta_button_url"] ?? null), "cta_button_title" =>         // line 34
($context["cta_button_title"] ?? null)]));
        // line 35
        yield " ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/nice_theme/templates/block/block--block-footer.html.twig";
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
        return array (  99 => 35,  97 => 34,  96 => 33,  95 => 32,  94 => 31,  93 => 30,  92 => 29,  91 => 28,  87 => 26,  83 => 24,  81 => 23,  79 => 22,  76 => 20,  72 => 18,  70 => 17,  68 => 16,  65 => 14,  63 => 13,  59 => 10,  57 => 9,  55 => 8,  52 => 6,  50 => 5,  48 => 4,  46 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Define footer logo #}
{% set block_content = content['#block_content'] %}
{% set media_entity = block_content.field_footer_logo.0.entity %}
{% set image = media_entity.field_media_image.entity %}
{% set footer_logo = image.uri.value|file_url %}

{# Define footer CTA #}
{% set cta_button_url = content.field_cta_button[0]['#url'] %}
{% set cta_button_title = content.field_cta_button[0]['#title'] %}


{# Define footer description #}
{% set text = content.field_little_descritpion %}

{# Define footer social media menu #}
{% set social_media_menu_entity = content.field_social_media_menu_ref.0['#plain_text'] ?? '' %}
{% if social_media_menu_entity is not empty %}
    {% set social_media_menu = drupal_menu(social_media_menu_entity) %}
{% endif %}

{# Define footer menu #}
{% set footer_menu_entity = content.field_test.0['#plain_text'] ?? '' %}
{% if footer_menu_entity is not empty %}
    {% set footer_menu = drupal_menu(footer_menu_entity) %}
{% endif %}


{% include '@nice_theme/components/footer/footer.twig' with {
    footer_menu: footer_menu,
    social_media_menu: social_media_menu,
    footer_logo: footer_logo,
    text: text,
    cta_button_url: cta_button_url,
    cta_button_title: cta_button_title,
} %} ", "themes/custom/nice_theme/templates/block/block--block-footer.html.twig", "/var/www/html/web/themes/custom/nice_theme/templates/block/block--block-footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "if" => 17, "include" => 28];
        static $filters = ["file_url" => 5];
        static $functions = ["drupal_menu" => 18];

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
