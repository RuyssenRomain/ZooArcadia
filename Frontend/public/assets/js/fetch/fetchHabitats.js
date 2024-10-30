export async function fetchHabitats() {
    try {
        const response = await fetch("http://localhost:8080/api/habitats");
        if (!response.ok) {
            throw new Error("Échec de la récupération des habitats");
        }
        const data = await response.json();

        // Test de renvoi des données
        console.log('Le fichier fetchHabitat a bien fonctionné', data);

        return data;
    } catch (error) {
        console.error("Erreur lors de la récupération des habitats :", error);
        return [];
    }
}
