import { bgColorModule } from './modules/bgColor.js';
import { textColorModule } from './modules/textColor.js';
import { textSizeModule } from './modules/textSize.js';
import { normalizeLoader } from './modules/normalizeLoader.js';
import { cssLoader } from './modules/cssLoader.js';
import { marginModule } from './modules/margin.js';
import { widthModule } from './modules/width.js';
import { heightModule } from './modules/height.js';
import { renderTemplate } from './modules/renderTemplate.js';
import { loadModule } from './modules/includesLoader.js';          
import { badgeModule } from './modules/badgeModule.js';     


async function frameworkLoad() {
  try {
    await badgeModule();
    await normalizeLoader();
    await cssLoader();
    await bgColorModule();
    await marginModule();
    await widthModule();
    await heightModule();
    await textSizeModule();
    await textColorModule();
    await renderTemplate();


    console.log('SSBF loaded succesfully');
  } catch (error) {
    console.error('Error loading SSBF:', error);
  }
}

document.addEventListener('DOMContentLoaded', frameworkLoad);