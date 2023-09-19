<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Movie Rating App

This project implements the functionality for selecting a country and displaying the top movies in the selected country with the ability to rate movies by users. The project is developed on the Laravel framework.
## Installation

```bash
git clone https://github.com/ange120/movie-rating-laravel.git
```
## Getting Started

To set up the Terminal Connector project locally, follow these steps:

1. Clone the repository: `git clone https://github.com/ange120/movie-rating-laravel.git`
2. Navigate to the project directory: `cd movie-rating-laravel`
3. Install dependencies: `composer install`
4. Configure your environment variables by renaming `.env.example` to `.env` and updating the necessary values.
5. tart the Laravel development server: `php artisan serve`
6. Access the application through your browser: `http://localhost:8000`

## Usage
Once the local server is running, open a web browser and go to http://localhost:8000.

On the main page, you will see a form with a drop-down list of countries and a "Select" button.

Select a country from the list and click the "Select" button.

After pressing the button, the system will download the list of TOP movies for the selected country from the API and display this list on the screen.

You can rate a movie by clicking the "Rate" button next to it. Your rating will be saved in the database.

If you have already rated a movie, your rating will be displayed next to the movie. You can delete or edit your rating.

## Task
# UA
```
Створіть форму з випадаючим списком країн та кнопкою «Вибрати». 
Після вибору країни та відправки форми за натисканням кнопки, 
потрібно підвантажити з API (наприклад, https://developer.themoviedb.org/reference/movie-top-rated-list) 
список ТОП фільмів за обраною країною, і відобразити цей список на екрані.

Додати можливість оцінювати фільм самостійно. 
Поставлену користувачем оцінку фільму зберігати в БД. 
Якщо користувач уже поставив оцінку фільму, ця оцінка повинна відображатися в списку фільмів поряд із відповідним фільмом. 
Оцінку можна видалити або відредагувати.
```
# EN
```
Create a form with a drop-down list of countries and a "Select" button. 
After selecting the country and submitting the form by clicking the button, 
you need to download from the API (for example, https://developer.themoviedb.org/reference/movie-top-rated-list) 
a list of top movies for the selected country and display this list on the screen.

Add the ability to rate the movie yourself. 
Store the movie rating given by the user in the database. 
If the user has already rated a movie, this rating should be displayed in the movie list next to the corresponding movie. 
The rating can be deleted or edited.
```
## License

This project is licensed under the [MIT License](LICENSE).
