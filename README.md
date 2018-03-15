# Metype Worpress Plugin
This plugin is still **under development**

### Pre-requisites for Developer setup
* Docker Community Edition for mac **version 17.03.0 or higher**

### Initial Developer setup
1. Clone the repo
2. cd metype-wordpress-plugin
3. To run the docker containers run __docker-compose up -d__ . This runs the mysql and wordpress containers locally.
4. Go to http://localhost:8000 to connect to local word press instance and do the initial wordpress setup by creating account.
5. After creating account on local wordpress instance go to http://localhost:8000/wp-admin/. On the sidebar go to *plugins -> click activate on Metype Engagement-engine*
6. On the sidebar select *metype* -> Enter *2* as account id and save to see metype commenting widget in action on every post.