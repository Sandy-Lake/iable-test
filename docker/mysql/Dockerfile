FROM mysql:8.0

# Copy content from .sql to Docker mysql container
COPY ../../dumps/database.sql /docker-entrypoint-initdb.d/init.sql

EXPOSE 3306