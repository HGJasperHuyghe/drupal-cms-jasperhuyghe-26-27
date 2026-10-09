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

/* modules/contrib/commerce/modules/promotion/templates/commerce-coupon-redemption-form.html.twig */
class __TwigTemplate_e9642276246d6d9ae2693a7a197c96ca extends Template
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
        if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "coupons", [], "any", false, false, true, 14))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 15
            yield "  ";
            if (((($_v0 = ($context["form"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#cardinality"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "#cardinality", [], "array", false, false, true, 15)) == 1)) {
                // line 16
                yield "    <div class=\"coupon-redemption-form__coupons coupon-redemption-form__coupons--single\">
      <p>
        <br>";
                // line 18
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("You applied the coupon %code to the order.", ["%code" => $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "coupons", [], "any", false, false, true, 18), 0, [], "any", false, false, true, 18), "code", [], "any", false, false, true, 18))]));
                yield "
      </p>
      ";
                // line 20
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "coupons", [], "any", false, false, true, 20), 0, [], "any", false, false, true, 20), "remove_button", [], "any", false, false, true, 20), "html", null, true);
                yield "
    </div>
  ";
            } else {
                // line 23
                yield "    <div class=\"coupon-redemption-form__coupons coupon-redemption-form__coupons--multiple\">
      <h3> ";
                // line 24
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Applied coupons"));
                yield " </h3>
      <table>
        ";
                // line 26
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, $this->env->hasExtension(\Twig\Extension\SandboxExtension::class) && $this->env->getExtension(\Twig\Extension\SandboxExtension::class)->getChecker()->isSandboxed($this->source), CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "coupons", [], "any", false, false, true, 26), function ($__coupon__, $__key__) use ($context, $macros) { $context["coupon"] = $__coupon__; $context["key"] = $__key__; return (Twig\Extension\CoreExtension::first($this->env->getCharset(), $context["key"]) != "#"); }));
                foreach ($context['_seq'] as $context["key"] => $context["coupon"]) {
                    // line 27
                    yield "          <tr>
            <td> ";
                    // line 28
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["coupon"], "code", [], "any", false, false, true, 28), "html", null, true);
                    yield " </td>
            <td> ";
                    // line 29
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["coupon"], "remove_button", [], "any", false, false, true, 29), "html", null, true);
                    yield " </td>
          </tr>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['key'], $context['coupon'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 32
                yield "      </table>
    </div>
  ";
            }
        }
        // line 36
        yield "
";
        // line 37
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["form"] ?? null), "coupons"), "html", null, true);
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["form"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/commerce/modules/promotion/templates/commerce-coupon-redemption-form.html.twig";
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
        return array (  103 => 37,  100 => 36,  94 => 32,  84 => 29,  80 => 28,  77 => 27,  73 => 26,  68 => 24,  65 => 23,  59 => 20,  54 => 18,  50 => 16,  47 => 15,  45 => 14,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/commerce/modules/promotion/templates/commerce-coupon-redemption-form.html.twig", "/var/www/html/web/modules/contrib/commerce/modules/promotion/templates/commerce-coupon-redemption-form.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 14, "for" => 26];
        static $filters = ["length" => 14, "t" => 18, "render" => 18, "escape" => 20, "filter" => 26, "first" => 26, "without" => 37];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "for"],
                [0 => "length", 1 => "t", 2 => "render", 3 => "escape", 4 => "filter", 5 => "first", 6 => "without"],
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
