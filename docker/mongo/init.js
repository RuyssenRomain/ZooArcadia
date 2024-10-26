// Initialisation de la base de données MongoDB avec des collections et des documents

// Sélection de la base de données (elle sera créée automatiquement si elle n'existe pas)
db = db.getSiblingDB('arcadia_zoo_db');

//// Création de la collection "habitats"
db.createCollection('db.test.habitats')
  //insertion de documents
db.habitats.insertMany([
  { name: "Savane", description: "Habitat pour les lions" },
  { name: "Jungle", description: "Habitat pour les tigres" },
  { name: "Océan", description: "Habitat pour les dauphins" }
]);
