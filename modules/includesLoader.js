export function loadModule(moduleName) {
    const moduleJsonFile = `../includes/${moduleName}.json`;  // Ścieżka do pliku JSON dla modułu

    fetch(moduleJsonFile)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Błąd sieciowy: ${response.statusText}`);
            }
            return response.json();
        })
        .then(moduleData => {
            if (!Array.isArray(moduleData.scripts)) {
                throw new Error("Dane JSON nie zawierają poprawnej tablicy 'scripts'.");
            }
            
            const scripts = moduleData.scripts;

            // Ładowanie zależności modułu w odpowiedniej kolejności
            scripts.forEach(script => {
                const scriptElement = document.createElement('script');
                scriptElement.src = script;
                scriptElement.type = 'text/javascript';

                scriptElement.onload = () => {
                    console.log(`${script} załadowany pomyślnie.`);
                };

                scriptElement.onerror = () => {
                    console.error(`Błąd podczas ładowania skryptu: ${script}`);
                };

                document.head.appendChild(scriptElement);
            });
        })
        .catch(error => {
            console.error("Błąd podczas ładowania modułu:", error);
        });
}