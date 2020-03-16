<p align="center"><b>Covid Community Response</b></p>
 
The Covid Community Response Team was set up in an effort to help coordinate ongoing national & local community campaigns/efforts in the fight against Covid 19.
 
Practical steps can be taken to harvest synergies on a national level resulting in a net benefit for communities on both a national and local level.
 
In practical terms, the low hanging fruit for the accrual of synergies is through standardisation of communication and the standardisations of campaigns.  This is as true for any organisation as it is for us as a community.

## Steps to set up local environment 
1. Assume you already have LAMP stack set up. If not follow the steps here: https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04

2. Assume you have composer installed. If not go here: https://getcomposer.org/download/

3. Assume you have node modules installed. If not go here: https://nodejs.org/en/download/

4. Clone the repo 

5. copy .env.example to a new file called .env

6. In your terminal navigate to the folder where you have cloned the repo and run "php artisan key:generate"

7. Go to .env file you created and replace the following: 
    
    a. Default APP_URL to APP_URL=http://localhost/Covid19CommunityResponse/public/ <br>
    b. Change your Database name in DB_DATABASE if you want to and create a new Databse with the same name in your phpmyadmin. <br>
    c. Set your DB_USERNAME and DB_PASSWORD

8. To build npm run dev or npm run watch.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
