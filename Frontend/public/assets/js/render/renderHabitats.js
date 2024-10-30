import { fetchHabitats } from '../fetch/fetchHabitats';

export async function renderHabitats() {
    const habitats = await fetchHabitats();

    const habitatContainer = document.getElementById('habitats-container');
    habitatContainer.innerHTML = ''; // Vider le contenu précédent si nécessaire

    habitats.forEach(habitat => {
        const card = document.createElement('div');
        card.classList.add('habitat-card');
        
        const title = document.createElement('h3');
        title.textContent = habitat.nom;

        const description = document.createElement('p');
        description.textContent = habitat.description;

        const image = document.createElement('img');
        image.src = habitat.image.path;
        image.alt = habitat.image.description;
        image.setAttribute('loading', 'lazy');


        
        card.appendChild(title);
        card.appendChild(description);
        card.appendChild(image);

        habitatContainer.appendChild(card);
    });
}
