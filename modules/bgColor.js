import { addCssRule } from './utils.js';

export function bgColorModule() {
  const elements = document.querySelectorAll('[class*="bc-"]');
  elements.forEach(el => {
    el.classList.forEach(cls => {
      const match = cls.match(/^bc-([0-9a-fA-F]{6})$/); // poprawione!
      if (match) {
        const hex = match[1];
        addCssRule(`.${cls}`, `background-color: #${hex}`);
      }
    });
  });
}

