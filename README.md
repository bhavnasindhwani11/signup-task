STEPS TO RUN THE PROJECT :<br><br>
    1. Import the project from github.<br>
    2. run composer update <br>
    3. run cp .env.example .env <br>
    4. create the database same as the DB_DATABASE in the env file in the local server if you dont have <br>
    4. run php artisan migrate <br>
    5. run php artisan key:generate <br>
    6. run php artisan serve <br>
    7. enable two step verification in your gmail account from which you want to send email for otp <br>
    8. create app password after enabling two step verification <br>
    9. write the email address in the env file <br>
