import { renderHabitats } from "../js/render/renderHabitats.js";
// import { renderAnimals } from './render/renderAnimals';
// import { renderServices } from './render/renderServices';
// import { renderAvis } from './render/renderServices';

document.addEventListener("DOMContentLoaded", DetectorPageForJS);
function DetectorPageForJS() {
	const currentPath = window.location.pathname;

	switch (currentPath) {
		case "/":
		case "/pages/accueil":
			renderHabitats();
			// renderAnimals();
			// renderServices();
			// renderAvis();
			break;
		case "/habitats":
			// renderHabitats();
			// renderAnimals();
			break;
		case "/animaux":
			// renderAnimals();
			break;
		case "/services":
			// renderServices();
			break;
		default:
			console.error("Page non reconnue pour le rendu spécifique.");
			break;
	}
}

