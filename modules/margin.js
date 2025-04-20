import { addCssRule } from './utils.js';

export function marginModule() {
  const elements = document.querySelectorAll('[class*="m-"]');

  elements.forEach(el => {
    el.classList.forEach(cls => {
      const match = cls.match(/^m-(\d{1,3})$/);
      if (match) {
        const size = match[1];
        addCssRule(`.${cls}`, `margin: ${size}px`);
      }
    });
  });
}