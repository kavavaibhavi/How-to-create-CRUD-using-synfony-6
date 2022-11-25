# How-to-create-CRUD-using-synfony-6

step:1 Create a new project 
      
      i. symfony new project_name
      
      ii. cd project_name
      
      iii. symfony server:start
      
stpe:2 Download Doctrine/ORM Pack

      composer require symfony/orm-pack
      
      -> change .env file
      
      DATABASE_URL="mysql://app:your_password@127.0.0.1:3306/dbName?serverVersion=8&charset=utf8mb4"
      
step:3 Create a Database and Migrate using the following commands

       symfony console doctrine:database:create
       
step:4 Download maker 

      composer require symfony/maker-bundle --dev
      
step: 5 Create Entity 

      symfony console make:entity 
      
      After that give Entity Class name and give name of you want to enity feild
      
step:6 Create a migration

      i. symfony console make:migration
      ii. symfony console doctrine:migrations:migrate
      
stpe:7 Genrate controller 

      symfony console make:controller ControllerName
      
step:8 Create a form 

      Before you create a form download the form pack using the following command
      
      i. composer require symfony/form
      ii. composer require form validator
      
      Command for form create
      
      symfony console make:form nameType EntityName
      
 step:9 Create an HTML view 
 
      Before creating HTML file you need to download Twig Template using the following command 
      
      composer require twig
      
