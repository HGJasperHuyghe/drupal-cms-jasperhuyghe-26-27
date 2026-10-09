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

/* modules/custom/biershop_free_shipping/templates/biershop-free-shipping-progress.html.twig */
class __TwigTemplate_4d3d58a7cf13dc5a58e3d34231259000 extends Template
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
        // line 13
        $context["classes"] = ["free-shipping-progress", (((($tmp =         // line 15
($context["qualifies"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("free-shipping-progress--complete") : (""))];
        // line 17
        yield "<div";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 17), "html", null, true);
        yield ">
  <p class=\"free-shipping-progress__message\" aria-live=\"polite\">
    ";
        // line 19
        if ((($tmp = ($context["qualifies"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "      ";
            yield t("Top! Je bestelling wordt <strong>gratis geleverd</strong>.", []);
            // line 21
            yield "    ";
        } else {
            // line 22
            yield "      ";
            yield t("Nog <strong>@remaining</strong> tot gratis levering.", ["@remaining" => $this->env->getExtension(\Drupal\Core\Template\TwigExtension::class)->renderVar(($context["remaining"] ?? null)), ]);
            // line 23
            yield "    ";
        }
        // line 24
        yield "  </p>
  <div class=\"free-shipping-progress__track\"
       role=\"progressbar\"
       aria-valuemin=\"0\"
       aria-valuemax=\"100\"
       aria-valuenow=\"";
        // line 29
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["percent"] ?? null), "html", null, true);
        yield "\"
       aria-label=\"";
        // line 30
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Voortgang naar gratis levering vanaf @threshold", ["@threshold" => ($context["threshold"] ?? null)]));
        yield "\">
    <span class=\"free-shipping-progress__bar\" style=\"width: ";
        // line 31
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["percent"] ?? null), "html", null, true);
        yield "%\"></span>
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["qualifies", "attributes", "remaining", "percent", "threshold"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/biershop_free_shipping/templates/biershop-free-shipping-progress.html.twig";
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
        return array (  83 => 31,  79 => 30,  75 => 29,  68 => 24,  65 => 23,  62 => 22,  59 => 21,  56 => 20,  54 => 19,  48 => 17,  46 => 15,  45 => 13,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/biershop_free_shipping/templates/biershop-free-shipping-progress.html.twig", "/var/www/html/web/modules/custom/biershop_free_shipping/templates/biershop-free-shipping-progress.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 13, "if" => 19, "trans" => 20];
        static $filters = ["escape" => 17, "t" => 30];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if", 2 => "trans"],
                [0 => "escape", 1 => "t"],
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
