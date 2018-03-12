# Ustawienia środowiska

### Instalacja Putty

   https://the.earth.li/~sgtatham/putty/latest/w64/putty.exe

#### Konfiguracja połączenia ssh z tunelowanie dynamicznie portu dla Windows
1. Adres IP + port
2. SSH -> Tunnels
3. Source port - 45678
4. Dynamic
5. Instalacja Firefox’a i ustawienie proxy
   https://www.mozilla.org/pl/firefox/
6. SOCKS Host
7. Proxy DNS when using SOCKS v5 

#### Konfiguracja połaczenia ssh z tunelowaniem dynamicznie portu dla Linux
1. Otwieramy terminal
2. 'ssh -D 45678 user@ip -p <numer_portu>'

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