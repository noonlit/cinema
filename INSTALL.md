# get the source code
git clone git@github.com:noonlit/cinema.git
cd cinema

# initialize the dev VM
vagrant up

# ssh into the VM
vagrant ssh

# initial project setup
cd /var/www/cinema
composer install

# install database
mysql -u root < /var/www/cinema/sqlScripts/cinemaScriptCreate.sql

# add test data
mysql -u root < /var/www/cinema/sqlScripts/cinemaPopulateDatabase.sql

# You are done, next add the host configuration into the hosts machine.
sudo sh -c 'echo "192.168.47.12 cinema.dev" > /etc/hosts'