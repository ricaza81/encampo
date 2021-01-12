#
# REQUIRES:
#       - server (the forge server instance)
#       - event (the forge event instance)
#       - sudo_password (random password for sudo)
#       - db_password (random password for database user)
#       - callback (the callback URL)
#       - recipe_id (recipe id to run at the end)
#

sudo sed -i "s/#precedence ::ffff:0:0\/96  100/precedence ::ffff:0:0\/96  100/" /etc/gai.conf

# Upgrade The Base Packages

export DEBIAN_FRONTEND=noninteractive

apt-get update
apt-get upgrade -y

# Add A Few PPAs To Stay Current

apt-get install -y --force-yes software-properties-common

# apt-add-repository ppa:fkrull/deadsnakes-python2.7 -y
apt-add-repository ppa:nginx/development -y
apt-add-repository ppa:chris-lea/redis-server -y
apt-add-repository ppa:ondrej/apache2 -y

    apt-add-repository ppa:ondrej/php -y
	# apt-add-repository ppa:ondrej/php5-5.6 -y

# Setup MariaDB Repositories



# Update Package Lists

apt-get update
# Base Packages

add-apt-repository universe

apt-get install -y --force-yes build-essential curl fail2ban gcc git libmcrypt4 libpcre3-dev \
make python2.7 python-pip sendmail supervisor ufw unattended-upgrades unzip whois zsh ncdu

# Install Python Httpie

pip install httpie

# Disable Password Authentication Over SSH

sed -i "/PasswordAuthentication yes/d" /etc/ssh/sshd_config
echo "" | sudo tee -a /etc/ssh/sshd_config
echo "" | sudo tee -a /etc/ssh/sshd_config
echo "PasswordAuthentication no" | sudo tee -a /etc/ssh/sshd_config

# Restart SSH

ssh-keygen -A
service ssh restart

# Set The Hostname If Necessary


echo "agronielsen-campo" > /etc/hostname
sed -i 's/127\.0\.0\.1.*localhost/127.0.0.1	agronielsen-campo.localdomain agronielsen-campo localhost/' /etc/hosts
hostname agronielsen-campo


# Set The Timezone

# ln -sf /usr/share/zoneinfo/UTC /etc/localtime
ln -sf /usr/share/zoneinfo/UTC /etc/localtime

# Create The Root SSH Directory If Necessary

if [ ! -d /root/.ssh ]
then
	mkdir -p /root/.ssh
	touch /root/.ssh/authorized_keys
fi

# Setup Forge User

useradd forge
mkdir -p /home/forge/.ssh
mkdir -p /home/forge/.forge
adduser forge sudo

# Setup Bash For Forge User

chsh -s /bin/bash forge
cp /root/.profile /home/forge/.profile
cp /root/.bashrc /home/forge/.bashrc

# Set The Sudo Password For Forge

PASSWORD=$(mkpasswd 5ovb4YOHFOdFHjAVGL0F)
usermod --password $PASSWORD forge

# Build Formatted Keys & Copy Keys To Forge


cat > /root/.ssh/authorized_keys << EOF
# Laravel Forge
ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCsZK3SH05ntDOeLKZuDI0Fi9RmEn1rGyiSmg+fsYYh7YtKgMEim5sPrpOkLqf0P71NpEuxhvXyHb6TidWzZ15l/r+J1Zd6XbDmjx8nXc279LnxVg2FH6rnjvj97R8t6NFB/BsXXIevawnCkKcTU+0TkaGA2Vyx4bnmI/mGJNTUb1NgZXGcuAqejXmzvHA5JXJ84YPAiqWyZ54hRx5ElWNAtmhogyvXPgryeV1ueKqqWF19g1eDJqxrDsfxnaJUnotExTcMtk+X1JVnAoaciwRE1cNvPUnOLfBPsBgOtNiKCy9XUDn01FLwDZy/pXCKJxEp5uHIpibp3FOoNxmoIK5n worker@forge.laravel.com


EOF


cp /root/.ssh/authorized_keys /home/forge/.ssh/authorized_keys

# Create The Server SSH Key

ssh-keygen -f /home/forge/.ssh/id_rsa -t rsa -N ''

# Copy Source Control Public Keys Into Known Hosts File

ssh-keyscan -H github.com >> /home/forge/.ssh/known_hosts
ssh-keyscan -H bitbucket.org >> /home/forge/.ssh/known_hosts
ssh-keyscan -H gitlab.com >> /home/forge/.ssh/known_hosts

# Configure Git Settings

git config --global user.name "Ricardo Zambrano"
git config --global user.email "ricaza81@gmail.com"

# Add The Reconnect Script Into Forge Directory

cat > /home/forge/.forge/reconnect << EOF
#!/usr/bin/env bash

echo "# Laravel Forge" | tee -a /home/forge/.ssh/authorized_keys > /dev/null
echo \$1 | tee -a /home/forge/.ssh/authorized_keys > /dev/null

echo "# Laravel Forge" | tee -a /root/.ssh/authorized_keys > /dev/null
echo \$1 | tee -a /root/.ssh/authorized_keys > /dev/null

echo "Keys Added!"
EOF

# Setup Forge Home Directory Permissions

chown -R forge:forge /home/forge
chmod -R 755 /home/forge
chmod 700 /home/forge/.ssh/id_rsa

# Setup UFW Firewall

ufw allow 22
ufw allow 80
ufw allow 443
ufw --force enable

# Allow FPM Restart

echo "forge ALL=NOPASSWD: /usr/sbin/service php7.3-fpm reload" > /etc/sudoers.d/php-fpm
echo "forge ALL=NOPASSWD: /usr/sbin/service php7.2-fpm reload" >> /etc/sudoers.d/php-fpm
echo "forge ALL=NOPASSWD: /usr/sbin/service php7.1-fpm reload" >> /etc/sudoers.d/php-fpm
echo "forge ALL=NOPASSWD: /usr/sbin/service php7.0-fpm reload" >> /etc/sudoers.d/php-fpm
echo "forge ALL=NOPASSWD: /usr/sbin/service php5.6-fpm reload" >> /etc/sudoers.d/php-fpm
echo "forge ALL=NOPASSWD: /usr/sbin/service php5-fpm reload" >> /etc/sudoers.d/php-fpm


    #
# REQUIRES:
#       - server (the forge server instance)
#		- site_name (the name of the site folder)
#

# Install Nginx

apt-get install -y --force-yes nginx

# Configure Primary Nginx Settings

sed -i "s/user www-data;/user forge;/" /etc/nginx/nginx.conf
sed -i "s/worker_processes.*/worker_processes auto;/" /etc/nginx/nginx.conf
sed -i "s/# multi_accept.*/multi_accept on;/" /etc/nginx/nginx.conf
sed -i "s/# server_names_hash_bucket_size.*/server_names_hash_bucket_size 64;/" /etc/nginx/nginx.conf

# Disable The Default Nginx Site

rm /etc/nginx/sites-enabled/default
rm /etc/nginx/sites-available/default
service nginx restart

# Install A Catch All Server

cat > /etc/nginx/sites-available/catch-all << EOF
server {
	return 404;
}
EOF

ln -s /etc/nginx/sites-available/catch-all /etc/nginx/sites-enabled/catch-all

# Restart Nginx

# Restart Nginx & PHP-FPM Services

#service nginx restart
service nginx reload

if [ ! -z "\$(ps aux | grep php-fpm | grep -v grep)" ]
then
    service php7.3-fpm restart > /dev/null 2>&1
    service php7.2-fpm restart > /dev/null 2>&1
    service php7.1-fpm restart > /dev/null 2>&1
    service php7.0-fpm restart > /dev/null 2>&1
    service php5.6-fpm restart > /dev/null 2>&1
    service php5-fpm restart > /dev/null 2>&1
fi

# Add Forge User To www-data Group

usermod -a -G www-data forge
id forge
groups forge



# Configure Supervisor Autostart

systemctl enable supervisor.service
service supervisor start

# Configure Swap Disk

if [ -f /swapfile ]; then
    echo "Swap exists."
else
    fallocate -l 1G /swapfile
    chmod 600 /swapfile
    mkswap /swapfile
    swapon /swapfile
    echo "/swapfile none swap sw 0 0" >> /etc/fstab
    echo "vm.swappiness=30" >> /etc/sysctl.conf
    echo "vm.vfs_cache_pressure=50" >> /etc/sysctl.conf
fi

# Setup Unattended Security Upgrades

cat > /etc/apt/apt.conf.d/50unattended-upgrades << EOF
Unattended-Upgrade::Allowed-Origins {
    "Ubuntu bionic-security";
};
Unattended-Upgrade::Package-Blacklist {
    //
};
EOF

cat > /etc/apt/apt.conf.d/10periodic << EOF
APT::Periodic::Update-Package-Lists "1";
APT::Periodic::Download-Upgradeable-Packages "1";
APT::Periodic::AutocleanInterval "7";
APT::Periodic::Unattended-Upgrade "1";
EOF

curl --insecure --data "event_id=23635046&server_id=254930&sudo_password=5ovb4YOHFOdFHjAVGL0F&db_password=evUikwkLKjJ4iWYSfBoJ&recipe_id=" https://forge.laravel.com/provisioning/callback/app
