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
