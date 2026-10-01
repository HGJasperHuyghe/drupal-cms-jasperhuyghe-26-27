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

/* modules/contrib/commerce/templates/commerce-copy-link.html.twig */
class __TwigTemplate_bf0c21684994949fba08e43d63ff02dc extends Template
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
        // line 14
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("commerce/copy-link"), "html", null, true);
        yield "
";
        // line 15
        if ((($tmp = ($context["link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 16
            yield "  <button type=\"button\" class=\"commerce-copy-link\" data-link=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["link"] ?? null), "html", null, true);
            yield "\" title=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
            yield "\"></button>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["link", "title"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/commerce/templates/commerce-copy-link.html.twig";
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
        return array (  51 => 16,  49 => 15,  45 => 14,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/commerce/templates/commerce-copy-link.html.twig", "/var/www/html/web/modules/contrib/commerce/templates/commerce-copy-link.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 15];
        static $filters = ["escape" => 14];
        static $functions = ["attach_library" => 14];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if"],
                [0 => "escape"],
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
