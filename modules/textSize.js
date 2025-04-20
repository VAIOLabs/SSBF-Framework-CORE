import { addCssRule } from './utils.js';

export function textSizeModule() {
  const elements = document.querySelectorAll('[class*="fs-"]');

  elements.forEach(el => {
    el.classList.forEach(cls => {
      const match = cls.match(/^fs-(\d{1,3})$/);
      if (match) {
        const size = match[1];
        addCssRule(`.${cls}`, `font-size: ${size}px`);
      }
    });
  });
}
