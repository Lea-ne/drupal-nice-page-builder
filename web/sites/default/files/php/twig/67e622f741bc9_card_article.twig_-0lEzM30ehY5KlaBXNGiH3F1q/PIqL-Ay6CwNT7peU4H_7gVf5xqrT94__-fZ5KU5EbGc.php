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

/* @nice_theme/components/card_article/card_article.twig */
class __TwigTemplate_5be9f573c07576276130a41c1ced056c extends Template
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
        yield "<div class=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["class"] ?? null), "html", null, true);
        yield "\">
  <div class=\"card__container\">

    ";
        // line 5
        if (($context["media"] ?? null)) {
            // line 6
            yield "      <div class=\"card__media\">
        <img src=\"";
            // line 7
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["media"] ?? null), "html", null, true);
            yield "\" alt=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["media_alt"] ?? null), "html", null, true);
            yield "\">
      </div>
    ";
        }
        // line 10
        yield "    
    <div class=\"card__content\">

      ";
        // line 13
        if (($context["title"] ?? null)) {
            // line 14
            yield "        <h3 class=\"card__title\">
          ";
            // line 15
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
            yield "
        </h3>
      ";
        }
        // line 18
        yield "      
      ";
        // line 19
        if (($context["text"] ?? null)) {
            // line 20
            yield "        <div class=\"card__text\">
          ";
            // line 21
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["text"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 24
        yield "
      ";
        // line 25
        if (($context["link"] ?? null)) {
            // line 26
            yield "        <div class=\"card__link article-link\">
          ";
            // line 27
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["link"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 30
        yield "
    </div>
  </div>
</div> ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["class", "media", "media_alt", "title", "text", "link"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@nice_theme/components/card_article/card_article.twig";
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
        return array (  108 => 30,  102 => 27,  99 => 26,  97 => 25,  94 => 24,  88 => 21,  85 => 20,  83 => 19,  80 => 18,  74 => 15,  71 => 14,  69 => 13,  64 => 10,  56 => 7,  53 => 6,  51 => 5,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Card Article Component #}
<div class=\"{{ class }}\">
  <div class=\"card__container\">

    {% if media %}
      <div class=\"card__media\">
        <img src=\"{{ media }}\" alt=\"{{ media_alt }}\">
      </div>
    {% endif %}
    
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

      {% if link %}
        <div class=\"card__link article-link\">
          {{ link }}
        </div>
      {% endif %}

    </div>
  </div>
</div> ", "@nice_theme/components/card_article/card_article.twig", "/var/www/html/web/themes/custom/nice_theme/components/card_article/card_article.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 5];
        static $filters = ["escape" => 2];
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
