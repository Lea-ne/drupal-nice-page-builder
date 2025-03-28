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

/* @nice_theme/components/header/header.twig */
class __TwigTemplate_03d6751399b37089c0bc4f6edbf80346 extends Template
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
        yield "<div class=\"component-header page-container\">
  <div class=\"header__container\">
    
    <!-- Bloc gauche : logo, texte et réseaux sociaux -->
    <div class=\"header__brand-logo\">
        <img src=\"";
        // line 6
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["header_logo"] ?? null), "html", null, true);
        yield "\" alt=\"Logo\" />
    </div>
    
    <!-- Bloc droit : menu principal à colonnes (2 niveaux) -->
    <nav class=\"header__menu\">
      ";
        // line 11
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["header_menu"] ?? null), "html", null, true);
        yield "
    </nav>
    
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["header_logo", "header_menu"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@nice_theme/components/header/header.twig";
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
        return array (  59 => 11,  51 => 6,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"component-header page-container\">
  <div class=\"header__container\">
    
    <!-- Bloc gauche : logo, texte et réseaux sociaux -->
    <div class=\"header__brand-logo\">
        <img src=\"{{ header_logo }}\" alt=\"Logo\" />
    </div>
    
    <!-- Bloc droit : menu principal à colonnes (2 niveaux) -->
    <nav class=\"header__menu\">
      {{ header_menu }}
    </nav>
    
  </div>
</div>
", "@nice_theme/components/header/header.twig", "/var/www/html/web/themes/custom/nice_theme/components/header/header.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 6];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
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
