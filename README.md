# ubuntu18_lamp_server_docker
Experimental Ubuntu 18 Lamp server inside a docker container

Install Docker on your machine
Clone this repository
Place your html/php files in public_html
Place your sql dump in sql_dump/db_dump.sql
cd docker
execute docker-compose up --build

The container build will take 5 to 10 minutes depending of your machine specs

Once the build is complete, you can ssh to the container on port 2022 (ssh root@localhost -p 2022)
You can also access whatever you have put in public_html using http://localhost:2080

You can tweak your host config, by changing docker/configs/apache/000-default.conf

You can change by modifying docker/Dockerfile :
    
    ssh password by modifying Line 6 (ARG sshpass="123456")
    php version by modifying Line 7 (ENV php_version="7.1")
    MySql database name Line 8 (ENV sql_db_name="johannfe_test_db")
    MySql username Line 9 (ENV sql_db_user="johannfe_test_user")
    MySql Password Line 10 (ENV sql_db_pass="johannfe_db_pass")

    Php modules installed from lines 38 - 68
    
    Full Blog Post at https://blog.johannfenech.com/
