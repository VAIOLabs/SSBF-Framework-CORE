import { addCssRule } from './utils.js';

export function heightModule() {
  const elements = document.querySelectorAll('[class*="h-"]');

  elements.forEach(el => {
    el.classList.forEach(cls => {
      const match = cls.match(/^h-(\d{1,3})$/);
      if (match) {
        const size = match[1];
        addCssRule(`.${cls}`, `height: ${size}px`);
      }
    });
  });
}