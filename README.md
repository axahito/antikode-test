Laravel based CRUD API as requested by Antikode in order to pass the Technical Test for Backend Developer.

Preface :

I worked on this project for 4 days in total, starting from learning GraphQL and it's implementation on Laravel, designing the database structure,
actually developped the API, and testing it. By the time it's being submitted, all of the GraphQL queries included are already passed the test
except for the ```fileUpload``` mutation, hence why it's commented. I can't figure out a way to test it properly, so for substitute i created the
```/fileupload``` Laravel api endpoint. Hopefully this submission is acceptable to pass the technical test, however regardless of the outcome
i'm very grateful for the Antikode team for giving me the opporunity.

Tech Stack :

- Laravel 8.0 with packages :
    - nuwave/lighthouse
    - mll-lab/laravel-graphql-playground
- PHP 8.0
- Database : Mysql

How to Use : 

1. Clone the repository
2. Run ```composer update```
3. Setup ENV variables
4. Import the included database sql file in the ```Antikode_test_DB``` directory
5. Run ```php artisan serve```
6. access ```localhost:8000/graphql-playground``` for graphql query testing

GraphQL Schema :

GraphQL schema is available in ```graphql/``` directory

Database Structure :

![erd](./erd.png?raw=true "Entity Relationship Diagram")

Technical Question #2 :

The query asked in the technical test #2 is included in this repository as ```antikode_backendtechnicaltest_2.sql```