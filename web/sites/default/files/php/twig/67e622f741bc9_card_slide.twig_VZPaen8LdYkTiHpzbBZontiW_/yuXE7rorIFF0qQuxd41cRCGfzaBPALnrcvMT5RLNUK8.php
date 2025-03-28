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

/* @nice_theme/components/card_slide/card_slide.twig */
class __TwigTemplate_02ed16ae1478a2fdce8ac1b26f437c7d extends Template
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
        yield "\" ";
        if (($context["media"] ?? null)) {
            yield "style=\"background-image: url('";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["media"] ?? null), "html", null, true);
            yield "');\"";
        }
        yield ">
  <div class=\"card__container\">
    <div class=\"card__content\">
      ";
        // line 5
        if (($context["title"] ?? null)) {
            // line 6
            yield "        <h3 class=\"card__title\">
          ";
            // line 7
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
            yield "
        </h3>
      ";
        }
        // line 10
        yield "      
      ";
        // line 11
        if (($context["text"] ?? null)) {
            // line 12
            yield "        <div class=\"card__text\">
          ";
            // line 13
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["text"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 16
        yield "    </div>
  </div>
</div> 
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["class", "media", "title", "text"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@nice_theme/components/card_slide/card_slide.twig";
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
        return array (  82 => 16,  76 => 13,  73 => 12,  71 => 11,  68 => 10,  62 => 7,  59 => 6,  57 => 5,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Card Article Component #}
<div class=\"{{ class }}\" {% if media %}style=\"background-image: url('{{ media }}');\"{% endif %}>
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
    </div>
  </div>
</div> 
", "@nice_theme/components/card_slide/card_slide.twig", "/var/www/html/web/themes/custom/nice_theme/components/card_slide/card_slide.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 2];
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
