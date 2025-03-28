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

/* @nice_theme/components/card_article_background_image/card_article_background_image.twig */
class __TwigTemplate_581a350cab1c327a7a9dc3c6b5d62f2c extends Template
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
        if (($context["link_url"] ?? null)) {
            yield " 
  <a href=\"";
            // line 3
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["link_url"] ?? null), "html", null, true);
            yield "\" class=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["class"] ?? null), "html", null, true);
            yield "\" ";
            if (($context["media"] ?? null)) {
                yield "style=\"background-image: url('";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["media"] ?? null), "html", null, true);
                yield "');\"";
            }
            yield ">
";
        } else {
            // line 5
            yield "  <div class=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["class"] ?? null), "html", null, true);
            yield "\" ";
            if (($context["media"] ?? null)) {
                yield "style=\"background-image: url('";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["media"] ?? null), "html", null, true);
                yield "');\"";
            }
            yield ">
";
        }
        // line 7
        yield "
<div class=\"card__container\">
  <div class=\"card__content\">

    ";
        // line 11
        if (($context["title"] ?? null)) {
            // line 12
            yield "      <h3 class=\"card__title\">
        ";
            // line 13
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
            yield "
      </h3>
    ";
        }
        // line 16
        yield "    
    ";
        // line 17
        if (($context["text"] ?? null)) {
            // line 18
            yield "      <div class=\"card__text\">
        ";
            // line 19
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["text"] ?? null), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 22
        yield "
    ";
        // line 23
        if (($context["link_title"] ?? null)) {
            // line 24
            yield "      <div class=\"card__link article-link\">
        <p>";
            // line 25
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["link_title"] ?? null), "html", null, true);
            yield "</p>
      </div>
    ";
        }
        // line 28
        yield "
  </div> 

</div> 

";
        // line 33
        if (($context["link_url"] ?? null)) {
            // line 34
            yield "  </a> 
";
        } else {
            // line 36
            yield "  </div> 
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["link_url", "class", "media", "title", "text", "link_title"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@nice_theme/components/card_article_background_image/card_article_background_image.twig";
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
        return array (  131 => 36,  127 => 34,  125 => 33,  118 => 28,  112 => 25,  109 => 24,  107 => 23,  104 => 22,  98 => 19,  95 => 18,  93 => 17,  90 => 16,  84 => 13,  81 => 12,  79 => 11,  73 => 7,  61 => 5,  48 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Card Article Component #}
{% if link_url %} 
  <a href=\"{{ link_url }}\" class=\"{{ class }}\" {% if media %}style=\"background-image: url('{{ media }}');\"{% endif %}>
{% else %}
  <div class=\"{{ class }}\" {% if media %}style=\"background-image: url('{{ media }}');\"{% endif %}>
{% endif %}

<div class=\"card__container\">
  <div class=\"card__content\">

    {% if title %}
      <h3 class=\"card__title\">
        {{ title }}
      </h3>
    {% endif %}
    
    {% if text %}
      <div class=\"card__text\">
        {{ text }}
      </div>
    {% endif %}

    {% if link_title %}
      <div class=\"card__link article-link\">
        <p>{{ link_title }}</p>
      </div>
    {% endif %}

  </div> 

</div> 

{% if link_url %}
  </a> 
{% else %}
  </div> 
{% endif %}", "@nice_theme/components/card_article_background_image/card_article_background_image.twig", "/var/www/html/web/themes/custom/nice_theme/components/card_article_background_image/card_article_background_image.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 2];
        static $filters = ["escape" => 3];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
