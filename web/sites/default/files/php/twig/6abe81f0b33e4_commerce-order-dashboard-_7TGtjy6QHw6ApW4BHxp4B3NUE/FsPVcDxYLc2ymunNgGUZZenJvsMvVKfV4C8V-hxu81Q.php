<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\MacroNamespace;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* modules/contrib/commerce/modules/order/templates/commerce-order-dashboard-metrics-form.html.twig */
class __TwigTemplate_62c440121e65d144ab3d04a95a5e0079 extends Template
{
    private Source $source;
    /**
     * @var array<string, MacroNamespace>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        $this->sandbox = $env->getExtension(SandboxExtension::class)->getChecker();
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 12
        yield "<div class=\"commerce-dashboard__actions\">
  <div class=\"commerce-dashboard__periods\">
    ";
        // line 14
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "periods", [], "any", false, false, true, 14), "html", null, true);
        yield "
  </div>
  ";
        // line 16
        if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "refresh", [], "any", false, false, true, 16))) {
            // line 17
            yield "    <div class=\"commerce-dashboard__refresh\">
      ";
            // line 18
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "refresh", [], "any", false, false, true, 18), "button", [], "any", false, false, true, 18), "html", null, true);
            yield "
      <span>";
            // line 19
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "refresh", [], "any", false, false, true, 19), "refreshed", [], "any", false, false, true, 19), "html", null, true);
            yield "</span>
    </div>
  ";
        }
        // line 22
        yield "</div>
<div class=\"commerce-dashboard__metrics card\">
    <div class=\"metrics__actions\">
      ";
        // line 25
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "filters", [], "any", false, false, true, 25), "html", null, true);
        yield "
    </div>
    <div class=\"metrics\">
      ";
        // line 28
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "metrics", [], "any", false, false, true, 28), "html", null, true);
        yield "
    </div>
    <div class=\"metrics__tables\">
      ";
        // line 31
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["form"] ?? null), "periods", "metrics", "filters", "refresh"), "html", null, true);
        yield "
    </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["form"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/commerce/modules/order/templates/commerce-order-dashboard-metrics-form.html.twig";
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
    public function getDefaultEscapeStrategy(): string|false
    {
        return "html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  86 => 31,  80 => 28,  74 => 25,  69 => 22,  63 => 19,  59 => 18,  56 => 17,  54 => 16,  49 => 14,  45 => 12,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/commerce/modules/order/templates/commerce-order-dashboard-metrics-form.html.twig", "/var/www/html/web/modules/contrib/commerce/modules/order/templates/commerce-order-dashboard-metrics-form.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 16];
        static $filters = ["escape" => 14, "without" => 31];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if"],
                [0 => "escape", 1 => "without"],
                [],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            } elseif ($e instanceof SecurityNotAllowedTestError && isset($tests[$e->getTestName()])) {
                $e->setTemplateLine($tests[$e->getTestName()]);
            }

            throw $e;
        }

    }
}
