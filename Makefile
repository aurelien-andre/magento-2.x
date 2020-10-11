.PHONY: help docker-build docker-push docker-up docker-down install-file install-composer install-npm install-grunt install
.DEFAULT_GOAL= help

SHELL = /bin/sh

USER_ID     := $(shell id -u)
USER_GROUP  := $(shell id -g)
USERNAME    := $(whoami)

export USER_ID
export USER_GROUP
export USERNAME

DOCKER_REGISTRY_REPOSITORY ?= bureauvallee-fbi/front/frontweb
DOCKER_REGISTRY_TAG        ?= latest

COMPOSE_MAGENTO             = docker-compose exec magento
COMPOSE_MAGENTO_COMPOSER	= docker-compose exec magento composer
COMPOSE_MAGENTO_CONSOLE     = docker-compose exec magento bin/magento
COMPOSE_MAGENTO_NPM			= docker-compose exec magento npm

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-20s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

##Docker

docker-build: ## Build docker image
	docker build . -t $(DOCKER_REGISTRY_REPOSITORY):$(DOCKER_REGISTRY_TAG)

docker-push: ## Push docker image
	docker push $(DOCKER_REGISTRY_REPOSITORY):$(DOCKER_REGISTRY_TAG)

docker-up: ## Launch containers
	docker-compose up -d

docker-down: ## Stop containers
	docker-compose down

##Install

install-file: ## Install files dependencies
	cp -rf src/app/etc/env.php.sample src/app/etc/env.php

install-composer: ## Install composer dependencies
	$(COMPOSE_MAGENTO_COMPOSER) install --no-progress --no-suggest --no-interaction --no-scripts

install-npm: ## Install Npm
	$(COMPOSE_MAGENTO_NPM) install --ignore-scripts

install-grunt: ## Install Grunt
	$(COMPOSE_MAGENTO_NPM) install -g grunt-cli

install: docker-build docker-up install-file install-composer install-npm install-grunt ## Install all
