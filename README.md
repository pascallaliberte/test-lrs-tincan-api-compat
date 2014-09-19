# Test for querying statements from an LRS

## Installation

### Install composer

Optional: If you don't want to install php or composer, you can first install a vagrant box by using `vagrant up`.

### Install composer dependencies

Run composer to install the components.

    composer update

### Configure the connection to the LRS

Copy the .env.example to .env

    cp .env.example .env

Edit the `.env` file with your configurations to connect to the LRS

### Configure sample data to check in the LRS

Copy the .example.yml files in the samples/ directory to .yml

    cp samples/CompletionDate.example.yml samples/CompletionDate.yml

Edit the `samples/CompletionDate.yml` file with the `agent_mbox`, `activity_id` and the `expected_statement_id` you expect to get from the LRS.

## Run the tests

    vendor/bin/phpunit
