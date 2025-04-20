import { addCssRule } from './utils.js';

export function widthModule() {
  const elements = document.querySelectorAll('[class*="w-"]');

  elements.forEach(el => {
    el.classList.forEach(cls => {
      const match = cls.match(/^w-(\d{1,3})$/);
      if (match) {
        const size = match[1];
        addCssRule(`.${cls}`, `width: ${size}px`);
      }
    });
  });
}