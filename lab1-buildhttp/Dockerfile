FROM centos:latest

MAINTAINER Qwiatu <myemail@mail.com>
LABEL description="This is simplest httpd server"

RUN yum install httpd -y && \
    yum clean all 

EXPOSE 80

CMD ["/usr/sbin/httpd","-D","FOREGROUND"]
