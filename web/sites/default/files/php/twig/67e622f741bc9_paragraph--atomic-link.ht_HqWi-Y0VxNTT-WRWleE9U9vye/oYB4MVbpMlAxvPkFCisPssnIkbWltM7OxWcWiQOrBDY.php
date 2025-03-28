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

/* themes/custom/nice_theme/templates/paragraphs/paragraph--atomic-link.html.twig */
class __TwigTemplate_249414467ce92e94368e5325fda81c17 extends Template
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
        $context["link_url"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_atomic_link", [], "any", false, false, true, 1), 0, [], "any", false, false, true, 1), "url", [], "any", false, false, true, 1);
        // line 2
        $context["link_title"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["paragraph"] ?? null), "field_atomic_link", [], "any", false, false, true, 2), 0, [], "any", false, false, true, 2), "title", [], "any", false, false, true, 2);
        // line 3
        yield "
";
        // line 4
        yield from $this->loadTemplate("@nice_theme/components/button_cta/button_cta.twig", "themes/custom/nice_theme/templates/paragraphs/paragraph--atomic-link.html.twig", 4)->unwrap()->yield(CoreExtension::merge($context, ["link_url" =>         // line 5
($context["link_url"] ?? null), "link_title" =>         // line 6
($context["link_title"] ?? null)]));
        // line 7
        yield " ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["paragraph"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/nice_theme/templates/paragraphs/paragraph--atomic-link.html.twig";
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
        return array (  55 => 7,  53 => 6,  52 => 5,  51 => 4,  48 => 3,  46 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set link_url = paragraph.field_atomic_link.0.url %}
{% set link_title = paragraph.field_atomic_link.0.title %}

{% include '@nice_theme/components/button_cta/button_cta.twig' with {
    link_url: link_url,
    link_title: link_title
} %} ", "themes/custom/nice_theme/templates/paragraphs/paragraph--atomic-link.html.twig", "/var/www/html/web/themes/custom/nice_theme/templates/paragraphs/paragraph--atomic-link.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 1, "include" => 4];
        static $filters = [];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'include'],
                [],
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
