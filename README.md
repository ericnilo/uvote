# uVote | An application that automates election in schools

This repository is the API for uVote application

## Installation in local

### Modifying Environment Settings and Running the Containers
1. Make a copy of the `.env.example` file and name the copy `.env`, which is the file Laravel expects to define its environment:
 
       $ cp .env.example .env 

2. Edit `.env` file and replace the default settings to:
        
       DB_CONNECTION=mysql
       DB_HOST=db
       DB_PORT=3306
       DB_DATABASE=auto_election
       DB_USERNAME=auto_election_user
       DB_PASSWORD=1aG^RV^kp&TcM7lQ%@6p0A3BiWcdZnW
       
3. Start the docker

       $ docker-compose up -d

4. Generate a key and copy it to your `.env` file, ensuring that your user sessions and encrypted data remain secure:

       $ docker exec -i app php artisan key:generate

5. To cache these settings into a file, which will boost your application’s load speed, run:

       $ docker exec -i app php artisan config:cache
       
6. Run on the browser to double check if running correctly by visiting

       http://api.uvote.local

### Creating a User for MySQL
1. Create a new user, execute an interactive bash shell on the db container:

       $ docker exec -it db bash
       $ mysql -u root -p // provide 1aG^RV^kp&TcM7lQ%@6p0A3BiWcdZnW as the password
       
2. Create a mysql user that we supplied on `.env` which is the `DB_USERNAME`

       mysql> GRANT ALL ON auto_election.* TO 'auto_election_user'@'%' IDENTIFIED BY '1aG^RV^kp&TcM7lQ%@6p0A3BiWcdZnW';

3. Flush the privileges to notify the MySQL server of the changes:

       mysql> FLUSH PRIVILEGES;
       
### Migrating Data and Working with the Tinker Console
1. Test the connection to MySQL by running the Laravel artisan migrate command, which creates a migrations table in the database from inside the container:

       $ docker exec -i app php artisan migrate
       
   This command will migrate the default Laravel tables. The output confirming the migration will look like this:
   
       Output
       
       Migration table created successfully.
       Migrating: 2014_10_12_000000_create_users_table
       Migrated:  2014_10_12_000000_create_users_table
       Migrating: 2014_10_12_100000_create_password_resets_table
       Migrated:  2014_10_12_100000_create_password_resets_table

2. Once the migration is complete, you can run a query to check if you are properly connected to the database using the tinker command:

       $ docker exec -i app php artisan tinker

3. Test the MySQL connection by getting the data you just migrated:

       >>> \DB::table('migrations')->get();
       
    You will see output that looks like this:
    
       Output
       => Illuminate\Support\Collection {#2856
            all: [
              {#2862
                +"id": 1,
                +"migration": "2014_10_12_000000_create_users_table",
                +"batch": 1,
              },
              {#2865
                +"id": 2,
                +"migration": "2014_10_12_100000_create_password_resets_table",
                +"batch": 1,
              },
            ],
          }
    
    You can use `tinker` to interact with your databases and to experiment with services and models.
    
    With your Laravel application in place, you are ready for further development and experimentation.

### Reference:
https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose
