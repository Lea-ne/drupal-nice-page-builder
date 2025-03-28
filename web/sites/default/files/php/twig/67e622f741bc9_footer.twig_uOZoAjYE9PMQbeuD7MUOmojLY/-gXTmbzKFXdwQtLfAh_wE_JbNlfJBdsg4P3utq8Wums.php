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

/* @nice_theme/components/footer/footer.twig */
class __TwigTemplate_9f6c93647b5d24f980c6f521ee72af53 extends Template
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
        yield "<div class=\"component-footer\">
  <div class=\"footer__container\">
    
    <!-- Bloc gauche : logo, texte et réseaux sociaux -->
    <div class=\"footer__brand-infos\">
      <div class=\"footer__logo\">
        <img src=\"";
        // line 7
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["footer_logo"] ?? null), "html", null, true);
        yield "\" alt=\"Logo\" />
      </div>
      <div class=\"footer__description\">
        ";
        // line 10
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["text"] ?? null), "html", null, true);
        yield "
      </div>
      <nav class=\"footer__social-media\">
        ";
        // line 13
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["social_media_menu"] ?? null), "html", null, true);
        yield "
      </nav>
      <div class=\"footer__cta\">
        ";
        // line 16
        yield from $this->loadTemplate("@nice_theme/components/button_cta/button_cta.twig", "@nice_theme/components/footer/footer.twig", 16)->unwrap()->yield(CoreExtension::merge($context, ["link_url" =>         // line 17
($context["cta_button_url"] ?? null), "link_title" =>         // line 18
($context["cta_button_title"] ?? null), "color" => "white"]));
        // line 20
        yield " 
      </div>
    </div>
    
    <!-- Bloc droit : menu principal à colonnes (2 niveaux) -->
    <nav class=\"footer__menu\">
      ";
        // line 26
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["footer_menu"] ?? null), "html", null, true);
        yield "
    </nav>
    
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["footer_logo", "text", "social_media_menu", "cta_button_url", "cta_button_title", "footer_menu"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@nice_theme/components/footer/footer.twig";
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
        return array (  82 => 26,  74 => 20,  72 => 18,  71 => 17,  70 => 16,  64 => 13,  58 => 10,  52 => 7,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"component-footer\">
  <div class=\"footer__container\">
    
    <!-- Bloc gauche : logo, texte et réseaux sociaux -->
    <div class=\"footer__brand-infos\">
      <div class=\"footer__logo\">
        <img src=\"{{ footer_logo }}\" alt=\"Logo\" />
      </div>
      <div class=\"footer__description\">
        {{ text }}
      </div>
      <nav class=\"footer__social-media\">
        {{ social_media_menu }}
      </nav>
      <div class=\"footer__cta\">
        {% include '@nice_theme/components/button_cta/button_cta.twig' with {
              link_url: cta_button_url,
              link_title: cta_button_title,
              color: 'white',
          } %} 
      </div>
    </div>
    
    <!-- Bloc droit : menu principal à colonnes (2 niveaux) -->
    <nav class=\"footer__menu\">
      {{ footer_menu }}
    </nav>
    
  </div>
</div>
", "@nice_theme/components/footer/footer.twig", "/var/www/html/web/themes/custom/nice_theme/components/footer/footer.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 16];
        static $filters = ["escape" => 7];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['include'],
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
