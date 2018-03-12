### Zapoznanie się z poleceniem docker oraz Docker Hub
##### Podstawowe polecenia (docker run, docker ps, docker pull, docker inspect, docker exec, docker logs, docker tag)
1. `docker pull kaminskypavel/mario`

2. `docker images`

##### Uruchomienie prostego kontenera

3. `docker run -d -p 8080:8080 --name mario kaminskypavel/mario`

4. `docker ps`
##### Wejście do kontenera
5. `docker inspect mario`
6. `docker exec -it mario bash`
7. `docker tag kaminskypavel/mario mario:1.1`