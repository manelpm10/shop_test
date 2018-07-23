FROM debian:8.3

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get clean &&  apt-get update
RUN apt-get install -y mysql-server

ADD templates/my.cnf /etc/mysql/my.cnf

RUN /usr/sbin/mysqld & \
    sleep 10s &&\
    echo "CREATE USER 'master_user'@'%' IDENTIFIED BY 'can_all';GRANT ALL PRIVILEGES ON *.* TO 'master_user'@'%' WITH GRANT OPTION; FLUSH PRIVILEGES" | mysql
RUN /usr/sbin/mysqld & \
    sleep 10s &&\
    echo "CREATE USER 'slave_user'@'%' IDENTIFIED BY 'only_read';GRANT SELECT ON *.* TO 'slave_user'@'%'; FLUSH PRIVILEGES" | mysql

EXPOSE 3306
CMD ["/usr/bin/mysqld_safe"]
