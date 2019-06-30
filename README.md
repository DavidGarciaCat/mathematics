# Mathematics

[![Build Status](https://scrutinizer-ci.com/g/DavidGarciaCat/mathematics/badges/build.png?b=master)](https://scrutinizer-ci.com/g/DavidGarciaCat/mathematics/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/DavidGarciaCat/mathematics/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/DavidGarciaCat/mathematics/?branch=master)

## Prerequisites

**Docker** https://docs.docker.com/install/

This repository includes the required Docker containers to run the source code.

**GIT** https://git-scm.com/downloads

Just in case you want to clone the repository; GIT is included into the PHP's Docker Container.

## Install

Clone the repository:

```bash
$ git clone git@github.com:DavidGarciaCat/mathematics.git
$ cd mathematics
```

Build the Docker containers:

```bash
$ docker-compose up --build --no-start
```

Run the containers:

```bash
$ docker-compose start
```

Don't forget to stop the containers once you've finished, so you can release the ports and resources:

```bash
$ docker-compose stop
```

## Web interface

Just browse: http://localhost:8000/

## Automated tests

**BeHat** BDD included into the `features` folder

```bash
$ docker exec -it mathematics-php vendor/bin/behat
```

**PHP Spec** TDD included into the `spec` folder

```bash
$ docker exec -it mathematics-php vendor/bin/phpspec run
```

**PHP Unit** TDD included into the `tests` folder

```bash
$ docker exec -it mathematics-php vendor/bin/simple-phpunit
```

## Comments

- The code is split into 2 main folders:
  - `Application` where the application's logic runs; and
  - `Adapters` where the Symfony's logic runs
- The Symfony Adapter manages:
  - `Controllers` to provide both the public homepage & the API endpoints to return the logic
  - `Forms` to render the HTML's form into the homepage
  - `ParamConverters` to process the JSON request and manage the operations using DTOs
- The `HomepageController` includes some logic because
  - The purpose is just to give you an interactive way to test the source code
  - Any real, production-ready project will have their own Frontend environment, so this one won't be needed
  - The Twig code has an adjustment to update the URLs that we target to get the data from the API:
    - We replace `localhost:8000` by `nginx` through the `replace`'s function because the PHP container needs the Nginx container's name to reach it
- Although some JavaScript logic could run the calls to the API, I've opted to use an HTTP Client:
  - HTTPlug has been installed and runs through the Guzzle adapter
  - HTTPlug can be very useful in case that 3rd party APIs need to be included, so thanks to this we now can reuse code
