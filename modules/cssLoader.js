 export function cssLoader() {
  const tag = document.querySelector('lib');

  if (tag && tag.getAttribute('static')?.toLowerCase() === 'true') {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = '../lib/ssbf-static/static.css';
    document.head.appendChild(link);
    console.log('✅ Plik static.css został załadowany.');
  } else {
    console.log('ℹ️ static.css nie został załadowany (brak tagu lub css != true).');
  }
}
