# Ustawienia środowiska

### Instalacja Putty

   https://the.earth.li/~sgtatham/putty/latest/w64/putty.exe

#### Konfiguracja połączenia ssh z tunelowanie dynamicznie portu
1. Adres IP + port
2. SSH -> Tunnels
3. Source port - 45678
4. Dynamic
5. Instalacja Firefox’a i ustawienie proxy
   https://www.mozilla.org/pl/firefox/
6. SOCKS Host
7. Proxy DNS when using SOCKS v5 

### Instalacja Dockera i OC 
##### Docker:

1. https://store.docker.com/editions/community/docker-ce-server-centos
  https://docs.docker.com/install/linux/docker-ce/centos/

2. `ssh na admin1`

3. `sudo yum-config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo`

4. `sudo yum install -y docker-ce`

5. `sudo systemctl start docker`

6. `sudo usermod -a -G docker vagrant`

7. przelogować się na admin1

8. `docker version`

##### atomic-openshift-clients (oc):

9. ssh na admin1`

10. `sudo subscription-manager list`

11. `sudo yum install -y atomic-openshift-clients`

22. `oc version`

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

### OpenShift
##### Instalacja podsystemu metryk
1. https://docs.openshift.com/container-platform/3.6/install_config/install/advanced_install.html
  https://docs.openshift.com/container-platform/3.6/install_config/install/quick_install.html
  https://docs.openshift.com/container-platform/3.6/install_config/cluster_metrics.html

2. `ssh na admin1`

3. `vi /usr/share/ansible/openshift-ansible/playbooks/byo/openshift-cluster/openshift-metrics.yml`

4. `vi /tmp/vagrant-ansible/inventory/vagrant_ansible_local_inventory`

5. `ansible-playbook -i /tmp/vagrant-ansible/inventory/vagrant_ansible_local_inventory /usr/share/ansible/openshift-ansible/playbooks/byo/openshift-cluster/openshift-metrics.yml -e openshift_metrics_install_metrics=True -e openshift_metrics_hawkular_hostname=hawkular-metrics.apps.lab<numer>.example.com` (ok. 5 minut)

6. `ssh master1`

7. `oc project openshift-infra`

8. `oc get pods -o wide`

9. `oc get route`

10. `logout`

11. wejść na `https://hawkular-metrics.apps.lab<numer>.example.com/hawkular/metrics` i zaakceptować certyfikat self-signed

12. `oc login https://master1.lab<numer>.example.com:8443 -u admin -p admin123`

13. `oc new-project load`

14. `oc new-app https://github.com/openshift/ruby-hello-world.git`

15. `oc get pods -w`

16. `oc expose svc ruby-hello-world`

17. `oc get route`

18. `ab -n 100000 http://ruby-hello-world-load.apps.lab<numer>.example.com/` (ok. 15 minut, można przerwać wcześniej Ctrl-C)

19. wejść na GUI, obserwować statystyki obciążenia (np. w panelu “Overview” projektu “load”)

20. `oc delete project load`

##### Wykorzystanie s2i do budowy kontenera w oparciu o kod dostępny na GitHub-ie

1. index.php z pokazaniem IP noda
