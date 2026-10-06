<?php

namespace Drupal\biershop_search\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Redirects the old global search endpoint to the public product search.
 */
final class BiershopSearchController extends ControllerBase {

  /**
   * Redirect to the beer catalog while preserving the entered search term.
   */
  public function redirectToCatalog(Request $request): RedirectResponse {
    $query = trim((string) $request->query->get('keys', ''));
    $parameters = $query === '' ? [] : ['search_api_fulltext' => $query];
    $url = Url::fromRoute('view.biercatalogus.page_1', [], ['query' => $parameters])->toString();

    return new RedirectResponse($url, 302);
  }
}
