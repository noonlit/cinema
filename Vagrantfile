# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.47.12"
    config.vm.hostname = "cinema"
    #
    # If the nfs protocol (version 3) is not supported by machine, uncommment the next line to activate the
    # VirtualBox default sync folder implementation and comment the nfs sync file config, run vagrant up,
    # ssh into vagrant, revert the comments made and run
    # "mount -o 'vers=2,udp' 192.168.56.1:'/local/path/to/cinema' /var/www/cinema" to sync files with
    # the second version of the nfs protocol, which should work. The differences between the protocols are limited
    # and will not impact functionality.
    #
    config.vm.synced_folder ".", "/var/www/cinema", :mount_options => ["dmode=777", "fmode=666"]
    
    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www/cinema", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

    config.vm.provision "shell", path: "shell/nginx.sh"

    config.vm.provision "shell", inline: <<-SHELL
        # disable apache
        service apache2 stop

        apt-get install -q -y php5-dev

        # configure fpm
        cp -R /var/www/cinema/shell/files/php5/* /etc/php5
        service php5-fpm restart
    SHELL

    config.vm.provision "shell", inline: <<-SHELL
        cp /var/www/cinema/shell/files/nginx/sites-enabled/cinema.conf /etc/nginx/sites-enabled/cinema.conf
        service nginx restart
    SHELL

    config.vm.provision "shell", inline: <<-SHELL
        cd /var/www/cinema

        composer self-update

        if [ ! -d "vendor/twig/" ]; then
            composer install

            cd vendor/twig/twig/ext/twig
            phpize
            ./configure
            make
            make install

            echo "extension=twig.so" > /etc/php5/mods-available/twig.ini
            service nginx restart
        fi
    SHELL
end