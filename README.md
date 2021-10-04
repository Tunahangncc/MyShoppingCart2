<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# MY SHOPPING CART

## _#INSTALLATION_

First download the master branch of the project.
After downloading the file, extract the zip.
Latter On;
- Open terminal from your computer
```sh
For Windows operating system, simply type CMD instead of search.
For MacOs operating system, you can open the terminal with the help of finder.
```
- First you have to install brew. [Homebrew](https://brew.sh/index_tr)
- After downloading Brewi, you have to install the composer via brew `brew install composer`
- Connect terminal to project
- Then type `composer update`
- Rename the `.env.example` file in the project to `.env`
- Type `php artisan key:generate` to generate the key that will help us run the project later.
- After generating the key, enter the .env folder
-- Look where it says DB_DATABASE.
-- Create a database with this name in your local network
- After creating the database, type `php artisan migrate` in the terminal connected to the project file
```sh
If you are not going to assign a data yourself and work with fake data, you can type `php artisan migrate:fresh --seed` in the terminal.
```
- Finally, there is only one step left to do.
-- Start the project on local host by typing `php artisan serve`

## _#USER TYPE_
There are two types of users in the project.
- Admin
- Customer

### 1- Admin
- If you are going to login as admin, you should type localhost:8888/admin/dashboard
```sh
host and port may vary according to you
If you install valet you can also enter the project name by typing 'projectName.test/admin/dashboard'
```
- Admin user does not come automatically.
- Open the terminal where you installed the project and enter your admin information by typing `php artisan users:create_admin` into it.

### 2- Customer
- If you are going to log in as a customer, you can enter the home page by typing localhost:8888.
```sh
host and port may vary according to you
If you install valet you can also enter the project name by typing 'projectName.test/'
```
- Customer registration can be done in 3 ways
-- After opening the site, you can create a member registration.
-- You can create a record by typing `php artisan users:create_user` in the terminal where you installed the project.
-- The command you type in the terminal will give you two options
```sh
1- Manual
2- Automatic
```
> Manual: You must enter the new user's information
> Automatic: Randomly fills in the new user's information

**I hope you have fun while working, TUNAHAN GENÇ**
