import { addCssRule } from './utils.js';

export function textColorModule() {
  const elements = document.querySelectorAll('[class*="c-"]');
  elements.forEach(el => {
    el.classList.forEach(cls => {
      const match = cls.match(/^c-([0-9a-fA-F]{6})$/);
      if (match) {
        const hex = match[1];
        addCssRule(`.${cls}`, `color: #${hex}`);
      }
    });
  });
}
