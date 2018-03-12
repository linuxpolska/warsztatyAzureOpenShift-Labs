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