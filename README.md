1. Extract Zip file
2. Open terminal and go to the app directory
3. Run "composer install"
4. Run "npm install"
5. Create database "hitachi_pos" in PostgreSQL or MySql
6. Update .env file for "DB_DATABASE" , 'mysql' or 'pgsql'
7. Run "php artisan migrate"
8. Run "php artisan db:seed"
9. Run "php artisan serve"
10. Open other terminal. Go to the app directory again
11. Run "npm run dev"
12. Open Browser. type http://localhost:8000
13. Login using whatever email (ex: sanford77@example.org), from table users, all password will be "password"
14. Test the dashboard

So far, I can only finish almost full app data flow & schema, you can see in DB folder. Migration & Seeder.
for me, making sure the data flow make sense is the very first step in application bootstrapping.

thank you.
