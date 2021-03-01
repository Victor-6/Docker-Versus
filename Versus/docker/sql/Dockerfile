FROM mariadb:latest


ADD .sql/ /docker-entrypoint-initdb.d

ENV MYSQL_USER: root
ENV MYSQL_ROOT_PASSWORD: docker
ENV MYSQL_DATABASE: DOCKER



EXPOSE 3306