 const styleSheet = (() => {
  let styleTag = document.getElementById('style-injector');
  if (!styleTag) {
    styleTag = document.createElement('style');
    styleTag.id = 'style-injector';
    document.head.appendChild(styleTag);
  }
  return styleTag.sheet;
})();

const insertedRules = new Set();

export function addCssRule(selector, rule) {
  const css = `${selector} { ${rule} }`;
  if (!insertedRules.has(css)) {
    styleSheet.insertRule(css, styleSheet.cssRules.length);
    insertedRules.add(css);
  }
}
