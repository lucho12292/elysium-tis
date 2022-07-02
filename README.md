## Steps to restore dependencies

# Copy and paste .env.example in the same folder
# Rename the file to ".env"
# Update the file with your database credentials
# Run "php artisan key:generate"
# Run "composer update"
# Run "php artisan serve"

## Steps to create the initial database

# Create database "maxi_basquet" using phpMyAdmin
# Open a bash/powershell console
# Run "php artisan migrate:fresh"
# Run "php artisan db:seed"

*Note: Apache and MySQL services must be running*