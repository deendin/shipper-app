# An application to manage shippers, create new shipper, update an existing shipper and keeps track of a shippers primary contact and allows updating of an existing shipperall of it's contacts.
## What does this solution do?

At a minimum this solution has two different parts:

1. The Frontend
2. The Backend

1. The Frontend: This is a simple vuejs application that:
  - Renders the list of all shippers
  - Shows the shippers details such as the company name and it's address
  - Shows the primary contact of that Shipper
  - Has a "Contacts" button to allow the display of all of contacts associated to a Shipper
  - Gives ability to add new shipper by clicking on the "Add Shipper" button
  - Allows ability to update an existing shipper by clicking on the Shipper card/Shipper logo, which eventually redirects to a page where the shippers details will be pre-filled and allows ability to update the shipper

2. The Backend: The backend is a laravel application that:
    - Exposes an endpoint to create a new shipper `api/shippers/create`
    - Exposes an endpoint to lists all shippers `api/shippers/index` endpoint
    - Exposes an endpoint to show shippers details `api/shippers/{shipper_uuid}/show`
    - Exposes an endpoint to show all shippers contacts and it's primary contact `api/shippers/{shipper_uuid}/show` endpoint
    - Exposes an endpoint to update an existing shipper via `api/shippers/{shipper_uuid}/update` endpoint
    - Has a feature test which tests all of the endpoint points such as the : `Feature/ShipperIndexTest.php`, `Feature/ShipperStoreTest.php` and the `Feature/ShipperUpdateTest.php`.

### How has this been done?

- I have followed the TDD approach by having some feature testing in place by testing ability to create shipper and view shipper, update shipper and see all contacts of a shipper.
- After completing these tests, I started creating the application logic, controllers, routes, models and model factories.
- I used laravel's form requests for data validation and model resources and model resource collection to transform and expost the data to the enduser/api consumer.
- After successfully creating a contact, there is an observer that observes and automatically generates and assign a uuid to the new record.
- When a contact is saved, an admin receives this notification with the sender of the contact form, their email address and the message body.
- This implementation uses an action `App\Actions\CreateContact` to implement the business logic.
- This implementation uses model resources in exposing some information from our databases and can be found in `App\Http\Resources` and expose the data returned from the Contact Model to the user.

## Getting started and Tooling

Before setting up this repository, the following are the dependencies that needs to be available on your machine:

### Tooling

- [Composer] for dependency management.
- [PhpUnit] [PhpUnit] for the test suite.
- [Nodejs], [npm] and [Vuejs] for the frontend
- [Laravel] dependencies for the backend test suite.
- PHP (I have PHP 8.1.11 installed)


## Setup & Instruction for the backend:
1. Clone the repository: `git clone https://github.com/deendin/shipper-app.git`
2. Assuming that the Dependencies listed above are satisfied, you can ```cd``` into the directory called ```shipper-app.git```
3. `cd` into `server` directory. This is the directory where the backend logic resides. 
4. When in the `server` directory you can run `composer install` to install the project dependencies. When that is done, run  `php artisan migrate --seed` to create the tables and it's seeders.
5. In the server you can either run `php artisan serve` to start the laravel app or if you have valet setup, you can run `valet link` in this directory and then head to `http://server.test` to see the backend running.
6. To test, run `php artisan test`, which is expected to run this tests or continue to the next step which describes how to setup the frontend so that these endpoints from the backend can be tested.


## Setup & Instruction for the backend:

1. In this same repository `git clone https://github.com/deendin/shipper-app.git`, `cd` into `shipper-app` and `cd` into `client/shipper` directory
2. Assuming that the Dependencies(`nodejs`, `npm`) listed above are satisfied, you can ```run``` ```npm install```
3. copy and duplicate the content of the `.env.example` file in this directory and update the key called : `VITE_VUE_APP_SERVER_API_BASE` to reflect the backend url which we created above. This could be the valent link called : `http://server.test/` or if you used the traditional artisan serve command this may be: `http://localhost:8000` or `http://localhost:{PORT_NUMBER}`
3. After creating the frontend env with the appropriate content then a link might be generated from the terminal for me it is called `http://127.0.0.1:5173/` so this is where the vuejs frontend can be accessed.

## Example Input
<img width="1302" alt="example_input" src="https://user-images.githubusercontent.com/118926333/207013370-37eb23eb-d772-4cc6-a885-1de84234ec39.png">

## Example Output

<img width="1594" alt="example_output" src="https://user-images.githubusercontent.com/118926333/207013441-df6eef74-fb04-437a-b470-ed3ad46324e6.png">

## Postman Collection for testing
This can be found in the public directory. This file is called `shipper-app.postman_collection.json`

## What I could have done better if I had more time (Mostly out of the task specification):

1. More tests for each feature test to test for the form validations by using a dataProvider.
2. Lint to lint the files.
3. Have vue test for the frontend.
4. Handle pagination of the shippers listing on the frontend (home page).
5. Properly handle the API exceptions, possibly in the Handler file or have a custom exception that will be wrapped around a try catch just incase an unknown exception occurs.
6. Add api auth or user auth via laravel sanctum or a jwt / laravel passport to atleast have a token to authenticate and authorize a user before performing the request.
7. Add PHP-CS-Fixer for linting the the PHP files.