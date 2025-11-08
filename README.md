# This is test-assignment for Effective Mobile to vacancy Junior PHP-developer

[![tests](https://github.com/NikolaiProgramist/effective-mobile-test-assignment/actions/workflows/tests.yml/badge.svg)](https://github.com/NikolaiProgramist/effective-mobile-test-assignment/actions/workflows/tests.yml)

## Setup

1. Download this project:

```shell
git clone https://github.com/NikolaiProgramist/effective-mobile-test-assignment.git
cd effective-mobile-test-assignment
```

2. Select setup type:

    - [SQLite](#-sqlite)
    - [Docker](#-docker)

3. Now you can use the API at: http://localhost:8000

> [!TIP]
> You can to use `postman` collection for testing API.
> It placed to the `files/` directory.

### ✏️ SQLite

Run setup command:

```shell
make setup
```

Run server:

```shell
make start
```

### 🐋 Docker

Change the database environment variables in the .env.example as specified here:

```shell
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=effective_mobile_test_assignment
DB_USERNAME=root
DB_PASSWORD=root
```

Run `docker-compose.yml`:

```shell
docker compose up
```
