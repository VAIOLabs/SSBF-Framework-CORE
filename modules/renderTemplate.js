export async function renderTemplate() {
  const templateElements = document.querySelectorAll("[data-template]"); // Wybiera wszystkie elementy z data-template

  for (const templateElement of templateElements) {
    const templateId = templateElement.dataset.template;
    const instanceId = templateElement.dataset.instanceId;
    const templateURL = `../templates/${templateId}/index.html`;

    try {
      const htmlResponse = await fetch(templateURL);
      if (!htmlResponse.ok) {
        throw new Error(`Error fetching HTML template: ${htmlResponse.status} - ${htmlResponse.statusText}`);
      }
      const htmlTemplate = await htmlResponse.text();

      const jsonTemplate = document.getElementById(instanceId);

      if (!jsonTemplate) {
        console.error(`JSON template with id ${instanceId} not found.`);
        templateElement.innerHTML = "Error: JSON template not found.";
        continue;
      }

      let jsonData = JSON.parse(jsonTemplate.innerHTML);

      let renderedTemplate = htmlTemplate;
      for (const key in jsonData) {
  const value = (typeof jsonData[key] === 'object' && 'value' in jsonData[key])
    ? jsonData[key].value
    : jsonData[key];

  renderedTemplate = renderedTemplate.replace(new RegExp(`{{${key}}}`, 'g'), value);
  renderedTemplate = renderedTemplate.replace(new RegExp(`{{${key}\\.value}}`, 'g'), value);
}


      templateElement.innerHTML = renderedTemplate;

      console.log(`Rendered template ${templateId} with data:`, jsonData);

    } catch (error) {
      console.error(`Error rendering template ${templateId}:`, error);
      templateElement.innerHTML = "Error loading template.";
    }
  }
}