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

/* modules/contrib/commerce/templates/commerce-dashboard-inbox.html.twig */
class __TwigTemplate_2cc95ec831ca064f33962e1dbcc15da9 extends Template
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
        // line 1
        yield "<div class=\"commerce-dashboard--inbox\">
  <div class=\"inbox-header\">
    <h2 class=\"inbox-header__title\">";
        // line 3
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Inbox"));
        yield "</h2>
    ";
        // line 4
        if ((($tmp = ($context["unread_text"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 5
            yield "      <h4 class=\"inbox-header__unread-text\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["unread_text"] ?? null), "html", null, true);
            yield "</h4>
    ";
        }
        // line 7
        yield "  </div>
  <div class=\"inbox-message--wrapper card\">
  ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["messages"] ?? null));
        foreach ($context['_seq'] as $context["id"] => $context["message"]) {
            // line 10
            yield "    <div class=\"inbox-message ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "state", [], "any", false, false, true, 10)), "html", null, true);
            yield "\" data-message-id=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["message"], "id", [], "any", false, false, true, 10), "html", null, true);
            yield "\">
      <div class=\"inbox-message__status\">";
            // line 11
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["message"], "time_ago", [], "any", false, false, true, 11), "html", null, true);
            yield "<button type=\"button\" class=\"close\" aria-label=\"Close\"></button></div>
      <h6 class=\"inbox-message__subject\">";
            // line 12
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["message"], "subject", [], "any", false, false, true, 12), "html", null, true);
            yield "</h6>
      <div class=\"inbox-message__message\">";
            // line 13
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["message"], "message", [], "any", false, false, true, 13), "html", null, true);
            yield "</div>
      <div class=\"inbox-message__actions\">
        ";
            // line 15
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "link", [], "any", false, false, true, 15))) {
                // line 16
                yield "          ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["message"], "link", [], "any", false, false, true, 16), "html", null, true);
                yield "
        ";
            }
            // line 18
            yield "        <a class=\"use-ajax message-dismiss action-link--danger\" href=\" ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("commerce.inbox_message.dismiss", ["message_id" => CoreExtension::getAttribute($this->env, $this->source, $context["message"], "id", [], "any", false, false, true, 18)]), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Dismiss"));
            yield " </a>
      </div>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['id'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 22
        yield "  ";
        if ( !(($tmp = ($context["messages"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 23
            yield "    <div class=\"inbox-message__empty\">
      ";
            // line 24
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("No messages at the moment."));
            yield "
    </div>
  ";
        }
        // line 27
        yield "  </div>
  <div class=\"inbox-footer--wrapper\">
    <div class=\"inbox-footer\">
      <h5 class=\"inbox-footer__subject\">";
        // line 30
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Get the most out of Drupal Commerce."));
        yield "</h5>
      <div class=\"inbox-footer__message\">
        ";
        // line 32
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Learn how in the <a href=\"@docs\" target=\"_blank\">project documentation</a> and community support channels, or <a href=\"@support\" target=\"_blank\">hire the maintainers</a> for professional support or development.", ["@docs" => "https://docs.drupalcommerce.org", "@support" => "https://www.centarro.io/drupal-commerce/development-services"]));
        yield "
      </div>
    </div>
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["unread_text", "messages"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/commerce/templates/commerce-dashboard-inbox.html.twig";
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
        return array (  133 => 32,  128 => 30,  123 => 27,  117 => 24,  114 => 23,  111 => 22,  97 => 18,  91 => 16,  89 => 15,  84 => 13,  80 => 12,  76 => 11,  69 => 10,  65 => 9,  61 => 7,  55 => 5,  53 => 4,  49 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/commerce/templates/commerce-dashboard-inbox.html.twig", "/var/www/html/web/modules/contrib/commerce/templates/commerce-dashboard-inbox.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 4, "for" => 9];
        static $filters = ["t" => 3, "escape" => 5, "clean_class" => 10];
        static $functions = ["path" => 18];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "for"],
                [0 => "t", 1 => "escape", 2 => "clean_class"],
                [0 => "path"],
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
