.PHONY: help docker-build docker-push docker-up docker-down install-file install-composer install-npm install-grunt install
.DEFAULT_GOAL= help

SHELL = /bin/sh

USER_ID     := $(shell id -u)
USER_GROUP  := $(shell id -g)

export USER_ID
export USER_GROUP

DOCKER_REGISTRY_REPOSITORY ?= bureauvallee-fbi/front/frontweb
DOCKER_REGISTRY_TAG        ?= latest

COMPOSE_MAGENTO             = docker-compose exec magento
COMPOSE_MAGENTO_COMPOSER	= docker-compose exec magento composer
COMPOSE_MAGENTO_CONSOLE     = docker-compose exec magento bin/magento
COMPOSE_MAGENTO_NPM			= docker-compose exec magento npm
COMPOSE_MAGENTO_GRUNT		= docker-compose exec magento grunt
COMPOSE_REDIS_CACHE         = docker-compose exec redis-cache
COMPOSE_REDIS_SESSION       = docker-compose exec redis-session

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-20s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

##DOCKER

docker-build: ## Build docker image
	docker build . -t $(DOCKER_REGISTRY_REPOSITORY):$(DOCKER_REGISTRY_TAG)

docker-push: ## Push docker image
	docker push $(DOCKER_REGISTRY_REPOSITORY):$(DOCKER_REGISTRY_TAG)

docker-up: ## Launch all containers
	docker-compose up -d

docker-down: ## Stop all containers
	docker-compose down

##INSTALL

install-file: ## Install all files dependencies
	cp -rf app/etc/env.php.sample app/etc/env.php

install-composer: ## Install composer dependencies
	$(COMPOSE_MAGENTO_COMPOSER) install --no-progress --no-suggest --no-interaction --no-scripts

install-npm: ## Install Npm
	$(COMPOSE_MAGENTO_NPM) install --ignore-scripts

install-grunt: ## Install Grunt
	$(COMPOSE_MAGENTO_NPM) install -g grunt-cli

install: docker-build docker-up install-file install-composer install-npm install-grunt ## Install all