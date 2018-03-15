# Metype Worpress Plugin
This plugin is still **under development**

### Pre-requisites for Developer setup
* Docker Community Edition for mac **version 17.03.0 or higher**

### Installing docker
* Install docker from https://www.docker.com/community-edition
* Run `docker -v` to check the version of docker.

### Initial Developer setup
1. Clone the repo
2. cd metype-wordpress-plugin
3. To run the docker containers run __docker-compose up -d__ . This runs the mysql and wordpress containers locally.
4. Go to http://localhost:8000 to connect to local word press instance and do the initial wordpress setup by creating account.
5. After creating account on local wordpress instance go to http://localhost:8000/wp-admin/. On the sidebar go to *plugins -> click activate on Metype Engagement-engine*
6. On the sidebar select *metype* -> Enter *2* as account id and save to see metype commenting widget in action on every post.

### Useful commands:
* To stop the docker containers run the following command `docker-compose stop`
* To get the container ids run the following command `docker ps -a`. You can see ids under container ID column
* To stop the container run `docker stop container_id`
* To kill the container run `docker kill container_id`
