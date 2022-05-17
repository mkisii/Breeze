### Making Basic Admin Panel with Laravel BREEZE

1.  # Step One: Installation 

    Creating of Laravel project

        Composer create-project laravel/laravel Basic_Admin
    
2.  ##  Step Two: Install Laravel BREEZE Package 

    Composer require laravel/breeze --dev

    followed by

    php artsen breeze:install

    ## Install Spatie package 

    composer require spatie/laravel-permission

    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"



3. ### Intall the Node Scafold for css py runing the following commands

    npm install && npm run dev

    npm run watch
