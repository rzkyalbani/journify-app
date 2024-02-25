# Journify: Mini Blog/Article App

## Screenshots
<img src="https://github.com/rzkyalbani/journify-app/blob/main/screenshots/login.png?raw=true" alt="Login Page" />
<img src="https://github.com/rzkyalbani/journify-app/blob/main/screenshots/register.png?raw=true" alt="Register Page" />
<img src="https://github.com/rzkyalbani/journify-app/blob/main/screenshots/home.png?raw=true" alt="Home Page" />
<img src="https://github.com/rzkyalbani/journify-app/blob/main/screenshots/category-post.png?raw=true" alt="Post by Category Page" />
<img src="https://github.com/rzkyalbani/journify-app/blob/main/screenshots/my-posts.png?raw=true" alt="My Posts Page" />
<img src="https://github.com/rzkyalbani/journify-app/blob/main/screenshots/create-post.png?raw=true" alt="Create Post Page" />
<img src="https://github.com/rzkyalbani/journify-app/blob/main/screenshots/edit-profile.png?raw=true" alt="Edit Profile Page" />

## Installation
### Requirement
<ul>
    <li>PHP Version >=8</li>
    <li>Composer</li>
    <li>MySQL</li>
    <li>Node JS</li>
</ul> 

## 1. Clone Project
```
git clone https://github.com/rzkyalbani/journify-app.git
```
### 2. Install Dependecies
```
composer install
npm install
```
### 3. Rename File env
Rename file ```.env.example``` to ```.env```
### 4. Generate Key
``` 
php artisan key:generate
```
### 5. Create and Migrate The Database
``` 
php artisan migrate
```
### 6. Run
``` 
php artisan serve
```
Don't forget to 
```
npm run build
npm run dev
```
