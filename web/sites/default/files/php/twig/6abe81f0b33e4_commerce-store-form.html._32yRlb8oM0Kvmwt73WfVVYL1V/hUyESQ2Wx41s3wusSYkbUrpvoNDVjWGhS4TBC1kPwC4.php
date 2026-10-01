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

/* modules/contrib/commerce/modules/store/templates/commerce-store-form.html.twig */
class __TwigTemplate_5ad904ff86da53115793062a5d0cbc32 extends Template
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
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("commerce/admin-layout"), "html", null, true);
        yield "
<div class=\"layout-store-form layout-commerce-form\">
  <div class=\"layout-region layout-region--commerce-main\">
    <div class=\"layout-region__content\">
      ";
        // line 16
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["form"] ?? null), "advanced", "actions"), "html", null, true);
        yield "
    </div>
  </div>
  <div class=\"layout-region layout-region--commerce-secondary\">
    ";
        // line 20
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "advanced", [], "any", false, false, true, 20), "html", null, true);
        yield "
  </div>
  <div class=\"layout-region layout-region--commerce-footer\">
    ";
        // line 23
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "actions", [], "any", false, false, true, 23), "html", null, true);
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
        return "modules/contrib/commerce/modules/store/templates/commerce-store-form.html.twig";
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
        return array (  65 => 23,  59 => 20,  52 => 16,  45 => 12,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/commerce/modules/store/templates/commerce-store-form.html.twig", "/var/www/html/web/modules/contrib/commerce/modules/store/templates/commerce-store-form.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 12, "without" => 16];
        static $functions = ["attach_library" => 12];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                [0 => "escape", 1 => "without"],
                [0 => "attach_library"],
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
