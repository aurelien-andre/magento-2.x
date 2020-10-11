![magento 2](/data/magento2-logo.png)

## Install

Open hosts
```
sudo nano /etc/hosts
```

Copy rules
```
127.0.0.1       www.traefik.lan
127.0.0.1       www.phpmyadmin.lan
127.0.0.1       www.magento.lan
127.0.0.1       www.redisinsight.lan
127.0.0.1       www.kibana.lan
127.0.0.1       www.elasticsearch.lan
127.0.0.1       www.mailhog.lan
```

Change auth.json.dist into auth.json with your auth information.

```json
{
  "http-basic": {
      "repo.magento.com": {
          "username": "Public Key",
          "password": "Private Key"
      }
  }
}
```

Open phpmyadmin and import "data/dump/install.sql" in "magento" database. 

## Usages

Show make commands
```
make help

DOCKER             
docker-build         Build docker image
docker-push          Push docker image
docker-up            Launch all containers
docker-down          Stop all containers
INSTALL            
install-file         Install all files dependencies
install-composer     Install composer dependencies
install-npm          Install Npm
install-grunt        Install Grunt
install              Install all
```
