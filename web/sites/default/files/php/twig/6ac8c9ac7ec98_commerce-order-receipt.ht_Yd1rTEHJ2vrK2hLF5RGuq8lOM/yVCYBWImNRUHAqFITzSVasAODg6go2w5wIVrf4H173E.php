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

/* modules/contrib/commerce/modules/order/templates/commerce-order-receipt.html.twig */
class __TwigTemplate_64288c878bb3f10a7948e48e47683767 extends Template
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
            'order_items' => [$this, 'block_order_items'],
            'shipping_information' => [$this, 'block_shipping_information'],
            'billing_information' => [$this, 'block_billing_information'],
            'payment_method' => [$this, 'block_payment_method'],
            'additional_information' => [$this, 'block_additional_information'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 23
        yield "<table style=\"margin: 15px auto 0 auto; max-width: 768px; font-family: arial,sans-serif\">
  <tbody>
  <tr>
    <td>
      <table style=\"margin-left: auto; margin-right: auto; max-width: 768px; text-align: center;\">
        <tbody>
        <tr>
          <td>
            <a href=\"";
        // line 31
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        yield "\" style=\"color: #0e69be; text-decoration: none; font-weight: bold; margin-top: 15px;\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["order_entity"] ?? null), "getStore", [], "any", false, false, true, 31), "label", [], "any", false, false, true, 31), "html", null, true);
        yield "</a>
          </td>
        </tr>
        </tbody>
      </table>
      <table style=\"text-align: center; min-width: 450px; margin: 5px auto 0 auto; border: 1px solid #cccccc; border-radius: 5px; padding: 40px 30px 30px 30px;\">
        <tbody>
        <tr>
          <td style=\"font-size: 30px; padding-bottom: 30px\">";
        // line 39
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Order Confirmation"));
        yield "</td>
        </tr>
        <tr>
          <td style=\"padding-top:15px; padding-bottom: 15px; text-align: left; border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc\">
            <div><span style=\"font-weight: bold;\">";
        // line 43
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Order number:"));
        yield "</span> ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["order_entity"] ?? null), "getOrderNumber", [], "any", false, false, true, 43), "html", null, true);
        yield "</div>
            ";
        // line 44
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["order_entity"] ?? null), "getPlacedTime", [], "any", false, false, true, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 45
            yield "              <div style=\"margin-top: 5px;\"><span style=\"font-weight: bold;\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Order date:"));
            yield "</span> ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->env->getFilter('format_date')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["order_entity"] ?? null), "getPlacedTime", [], "any", false, false, true, 45), "short"), "html", null, true);
            yield "</div>
            ";
        }
        // line 47
        yield "          </td>
        </tr>
        <tr>
          <td>
            ";
        // line 51
        yield from $this->unwrap()->yieldBlock('order_items', $context, $blocks);
        // line 68
        yield "          </td>
        </tr>
        <tr>
          <td>
            ";
        // line 72
        if (((($tmp = ($context["billing_information"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = ($context["shipping_information"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 73
            yield "            <table style=\"width: 100%; padding-top:15px; padding-bottom: 15px; text-align: left; border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;\">
              <tbody>
              <tr>
                ";
            // line 76
            if ((($tmp = ($context["shipping_information"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 77
                yield "                  <td style=\"padding-top: 5px; font-weight: bold;\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Shipping Information"));
                yield "</td>
                ";
            }
            // line 79
            yield "                ";
            if ((($tmp = ($context["billing_information"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 80
                yield "                  <td style=\"padding-top: 5px; font-weight: bold;\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Billing Information"));
                yield "</td>
                ";
            }
            // line 82
            yield "              </tr>
              <tr style=\"vertical-align: top;\">
                ";
            // line 84
            if ((($tmp = ($context["shipping_information"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 85
                yield "                  <td>
                    ";
                // line 86
                yield from $this->unwrap()->yieldBlock('shipping_information', $context, $blocks);
                // line 89
                yield "                  </td>
                ";
            }
            // line 91
            yield "                ";
            if ((($tmp = ($context["billing_information"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 92
                yield "                  <td>
                    ";
                // line 93
                yield from $this->unwrap()->yieldBlock('billing_information', $context, $blocks);
                // line 96
                yield "                  </td>
                ";
            }
            // line 98
            yield "              </tr>
              ";
            // line 99
            if ((($tmp = ($context["payment_method"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 100
                yield "                <tr>
                  <td style=\"font-weight: bold; margin-top: 10px;\">";
                // line 101
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Payment Method"));
                yield "</td>
                </tr>
                <tr>
                  <td>
                    ";
                // line 105
                yield from $this->unwrap()->yieldBlock('payment_method', $context, $blocks);
                // line 108
                yield "                  </td>
                </tr>
              ";
            }
            // line 111
            yield "              </tbody>
            </table>
            ";
        }
        // line 114
        yield "          </td>
        </tr>
        <tr>
          <td>
            <p style=\"margin-bottom: 0;\">
              ";
        // line 119
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Subtotal: @subtotal", ["@subtotal" => $this->extensions['Drupal\commerce_price\TwigExtension\PriceTwigExtension']->formatPrice(CoreExtension::getAttribute($this->env, $this->source, ($context["totals"] ?? null), "subtotal", [], "any", false, false, true, 119))]));
        yield "
            </p>
          </td>
        </tr>
        ";
        // line 123
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["totals"] ?? null), "adjustments", [], "any", false, false, true, 123));
        foreach ($context['_seq'] as $context["_key"] => $context["adjustment"]) {
            // line 124
            yield "        <tr>
          <td>
            <p style=\"margin-bottom: 0;\">
              ";
            // line 127
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["adjustment"], "label", [], "any", false, false, true, 127), "html", null, true);
            yield ": ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\commerce_price\TwigExtension\PriceTwigExtension']->formatPrice(CoreExtension::getAttribute($this->env, $this->source, $context["adjustment"], "total", [], "any", false, false, true, 127)), "html", null, true);
            yield "
            </p>
          </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['adjustment'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 132
        yield "        <tr>
          <td>
            <p style=\"font-size: 24px; padding-top: 15px; padding-bottom: 5px;\">
              ";
        // line 135
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Order Total: @total", ["@total" => $this->extensions['Drupal\commerce_price\TwigExtension\PriceTwigExtension']->formatPrice(CoreExtension::getAttribute($this->env, $this->source, ($context["order_entity"] ?? null), "getTotalPrice", [], "any", false, false, true, 135))]));
        yield "
            </p>
          </td>
        </tr>
        ";
        // line 139
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["order_entity"] ?? null), "getCustomerComments", [], "any", false, false, true, 139)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 140
            yield "          <tr>
            <td>
              <table style=\"width: 100%; padding-top:15px; padding-bottom: 15px; text-align: left; border-top: 1px solid #cccccc; \">
                <tbody>
                <tr>
                  <td style=\"padding-top: 5px; font-weight: bold;\">";
            // line 145
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Customer comments"));
            yield "</td>
                </tr>
                <tr>
                  <td><p>";
            // line 148
            yield (string) Twig\Extension\CoreExtension::nl2br($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["order_entity"] ?? null), "getCustomerComments", [], "any", false, false, true, 148), "html", null, true));
            yield "</p></td>
                </tr>
                </tbody>
              </table>
            </td>
          </tr>
        ";
        }
        // line 155
        yield "        <tr>
          <td>
            ";
        // line 157
        yield from $this->unwrap()->yieldBlock('additional_information', $context, $blocks);
        // line 160
        yield "          </td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>
  </tbody>
</table>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["order_entity", "billing_information", "shipping_information", "payment_method", "totals"]);        return; yield;
    }

    // line 51
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_order_items(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 52
        yield "            <table style=\"padding-top: 15px; padding-bottom:15px; width: 100%\">
              <tbody style=\"text-align: left;\">
              ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["order_entity"] ?? null), "getItems", [], "any", false, false, true, 54));
        foreach ($context['_seq'] as $context["_key"] => $context["order_item"]) {
            // line 55
            yield "              <tr>
                <td>
                  ";
            // line 57
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["order_item"], "getQuantity", [], "any", false, false, true, 57)), "html", null, true);
            yield " x
                </td>
                <td>
                  <span>";
            // line 60
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["order_item"], "label", [], "any", false, false, true, 60), "html", null, true);
            yield "</span>
                  <span style=\"float: right;\">";
            // line 61
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\commerce_price\TwigExtension\PriceTwigExtension']->formatPrice(CoreExtension::getAttribute($this->env, $this->source, $context["order_item"], "getTotalPrice", [], "any", false, false, true, 61)), "html", null, true);
            yield "</span>
                </td>
              </tr>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['order_item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 65
        yield "              </tbody>
            </table>
            ";
        return; yield;
    }

    // line 86
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_shipping_information(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 87
        yield "                      ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["shipping_information"] ?? null), "html", null, true);
        yield "
                    ";
        return; yield;
    }

    // line 93
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_billing_information(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 94
        yield "                      ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["billing_information"] ?? null), "html", null, true);
        yield "
                    ";
        return; yield;
    }

    // line 105
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_payment_method(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 106
        yield "                      ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["payment_method"] ?? null), "html", null, true);
        yield "
                    ";
        return; yield;
    }

    // line 157
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_additional_information(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 158
        yield "              ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Thank you for your order!"));
        yield "
            ";
        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/commerce/modules/order/templates/commerce-order-receipt.html.twig";
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
        return array (  381 => 158,  374 => 157,  366 => 106,  359 => 105,  351 => 94,  344 => 93,  336 => 87,  329 => 86,  322 => 65,  311 => 61,  307 => 60,  301 => 57,  297 => 55,  293 => 54,  289 => 52,  282 => 51,  268 => 160,  266 => 157,  262 => 155,  252 => 148,  246 => 145,  239 => 140,  237 => 139,  230 => 135,  225 => 132,  211 => 127,  206 => 124,  202 => 123,  195 => 119,  188 => 114,  183 => 111,  178 => 108,  176 => 105,  169 => 101,  166 => 100,  164 => 99,  161 => 98,  157 => 96,  155 => 93,  152 => 92,  149 => 91,  145 => 89,  143 => 86,  140 => 85,  138 => 84,  134 => 82,  128 => 80,  125 => 79,  119 => 77,  117 => 76,  112 => 73,  110 => 72,  104 => 68,  102 => 51,  96 => 47,  88 => 45,  86 => 44,  80 => 43,  73 => 39,  60 => 31,  50 => 23,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/commerce/modules/order/templates/commerce-order-receipt.html.twig", "/var/www/html/web/modules/contrib/commerce/modules/order/templates/commerce-order-receipt.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 44, "block" => 51, "for" => 123];
        static $filters = ["escape" => 31, "t" => 39, "format_date" => 45, "commerce_price_format" => 119, "nl2br" => 148, "number_format" => 57];
        static $functions = ["url" => 31];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "block", 2 => "for"],
                [0 => "escape", 1 => "t", 2 => "format_date", 3 => "commerce_price_format", 4 => "nl2br", 5 => "number_format"],
                [0 => "url"],
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
