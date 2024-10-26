FROM nginx:1.21-alpine

# Copier la configuration Nginx
COPY ./docker/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf

# Exposer le port 80
EXPOSE 80

# Lancer Nginx
CMD ["nginx", "-g", "daemon off;"]
