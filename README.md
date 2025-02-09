
## Royal Apps

### Steps

- Make clone using below command:

````
> git clone <reponame>
````

- Install dependecies

````
> composer Install
> npm install
> npm run build
````

- Copy .env.example to .env using command OR copy .env.example, paste it or rename to .env

````
> cp .env.example .env
````

- Paste below credentials

````
# Change log channel
LOG_CHANNEL=daily


# At the bottom of the .env file
API_URL="https://candidate-testing.api.royal-apps.io"
ROYAL_APPS_EMAIL="ahsoka.tano@royal-apps.io"
ROYAL_APPS_PASSWORD="Kryze4President"
````

- Use below credentials for login

````
Email: bhavik2422@gmail.com
Password: Bhavik123345345
````

- Create an Author using below command

````
> php artisan create:author
````