# Initializes configuration
.env:
#	@cp env.example .env
	@cp .env .env

# Install dependencies and initializes the project
prepare: .env
	@composer install
	@php artisan key:generate
	@npm install --save-dev sass-loader@7.1.0
	@npm install --save-dev node-sass@4.14.1


# Starts the environment for development
start:
	@docker-compose up -d
	@npm run watch

# Stops all project dependencies
stop:
	@docker-compose down
