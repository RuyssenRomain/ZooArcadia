# Déclarer l'argument pour la version de MongoDB
ARG MONGO_VERSION

# Utiliser l'argument pour choisir l'image MongoDB
FROM mongo:${MONGO_VERSION}

# Copier le script d'initialisation
COPY ./docker/mongo/init.js /docker-entrypoint-initdb.d/init.js

# Exposer le port MongoDB
EXPOSE 27017

# Utiliser l'utilisateur root pour le développement
# En production, il est recommandé de créer un utilisateur non-root
