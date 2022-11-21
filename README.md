## Laravel Blog 

## Installation Steps

1 - Install composer

```sh
   composer install
   ```
2 - Install npm packages
```sh
   npm install
   ```
3 - Build npm
```sh
   npm run dev
   ```

4 - ENV configuration
> Create a new database and set config variables in .env file

5 - Link storage
```sh
   php artisan storage:link
   ```

6 - Migrations
There will be only a user in the database.
```sh
   php artisan migrate
   ```
You can migrate all tables with dummy data
```sh
   php artisan migrate:fresh --seed
   ```

7 - Run application
```sh
   php artisan serve
   ```

8- Run queue
First set QUEUE_CONNECTION=database in .env file

```sh
   php artisan queue:work --timeout=120
   ```

## Project Features

```sh

1) Users will enter our site and register.


2) After registration, verified users will be able to share blog posts.


3) Verified users will be able to edit and delete their blog after sharing.


4) Unverified users will be only be able to see posts on the homepage.


5) There will be an admin panel for editors.


6) Admin can delete users, delete and edit posts.


7) Admin will be able to share posts from their own panel.


8) Users can send messages to the editors from the contact section.


9) Users can get information about the website from the about us section. 

   ```
## What The Project Offers Us
```sh
User will be able to register and share their own blog posts on this website.
Each user will be able to edit and delete their own posts. You will be able to use
the feature of adding images to the posts. Editors will be able to delete users via
the admin panel. Users will be able to edit and delete their posts and create new
posts.
   ```


    
