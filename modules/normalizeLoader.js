 export function normalizeLoader() {
  const tag = document.querySelector('normalize');

  if (tag && tag.getAttribute('css')?.toLowerCase() === 'true') {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = '../lib/normalize-css/normalize.css';
    document.head.appendChild(link);
    console.log('✅ Plik normalize.css został załadowany.');
  } else {
    console.log('ℹ️ normalize.css nie został załadowany (brak tagu lub css != true).');
  }
}
