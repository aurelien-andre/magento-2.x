![magento 2](/data/dist/m2-logo.png)

## Requirements

| Service           | Version |
| ----------------- | ------- |
| OS Unix           | *       |
| Docker            | 19      |
| Docker-Compose    | 1.27    |

## Image

| Service           | Version       |
| ----------------- | ------------- |
| OS                | debian-slim   |
| Apache            | 2.4           |
| PHP               | 7.4           |
| NodeJs            | 12            |
| Magento           | 2.4           |
| Composer          | latest        |

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

Change auth.json.dist into auth.json with good data.

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

Run all installation requirements 

```shell
make install
```

Import database

```text
Open phpmyadmin and import "data/dump/install.sql" in "magento" database. 
```

Import Magento configs

```shell
docker-compose exec magento bin/magento app:config:import
```

## Usages

Show make commands
```shell
make help

DOCKER             
docker-build         Build docker image
docker-push          Push docker image
docker-up            Launch containers
docker-down          Stop containers
INSTALL            
install-file         Install files dependencies
install-composer     Install composer dependencies
install-npm          Install npm
install-grunt        Install grunt
install              Install all
```

Admin authenticate 

```text
Login       : admin
Password    : admin123
```