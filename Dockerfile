FROM php:8.2.5-alpine

CMD [ "php", "--server", "0.0.0.0:80", "/usr/src/app/website/index.php" ]
EXPOSE 80
HEALTHCHECK CMD wget --spider http://localhost || exit 1
VOLUME [ "/usr/src/app" ]
WORKDIR /usr/src/app

COPY [ "./admin", "/usr/src/app/admin" ]
COPY [ "./website", "/usr/src/app/website" ]
