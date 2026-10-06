/**
 * @file
 * biershop_thema behaviors.
 */
(function (Drupal) {

  'use strict';

  Drupal.behaviors.biershopThema = {
    attach (context) {
      const menuToggle = context.querySelector('[data-biershop-menu-toggle]');
      const menu = context.querySelector('[data-biershop-menu]');

      if (menuToggle && menu && !menuToggle.dataset.biershopReady) {
        menuToggle.dataset.biershopReady = 'true';
        menuToggle.addEventListener('click', () => {
          const isOpen = menu.classList.toggle('is-open');
          menuToggle.setAttribute('aria-expanded', String(isOpen));
        });
      }

      const ageGate = context.querySelector('[data-age-gate]');
      if (ageGate && !ageGate.dataset.biershopReady) {
        ageGate.dataset.biershopReady = 'true';
        ageGate.querySelector('[data-age-gate-confirm]')?.addEventListener('click', () => {
          ageGate.hidden = true;
          window.sessionStorage.setItem('biershop-age-confirmed', 'true');
        });
        ageGate.querySelector('[data-age-gate-decline]')?.addEventListener('click', () => {
          window.location.href = 'https://www.druglijn.be/drugs/alcohol/wet/';
        });
        if (window.sessionStorage.getItem('biershop-age-confirmed') === 'true') {
          ageGate.hidden = true;
        }
      }

    }
  };

} (Drupal));
